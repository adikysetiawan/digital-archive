<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Document::with(['documentType.service.parent', 'uploader']);

        // Search functionality (title, description, document type name)
        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where(function($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('description', 'LIKE', "%{$search}%")
                  ->orWhereHas('documentType', function ($q2) use ($search) {
                      $q2->where('name', 'LIKE', "%{$search}%");
                  });
            });
        }

        // Category filter via slug or id (top-level Service)
        if ($request->filled('category')) {
            $slug = strtolower(str_replace(' ', '-', $request->get('category')));
            $query->whereHas('documentType.service.parent', function ($q) use ($slug) {
                $q->whereRaw('LOWER(REPLACE(name, " ", "-")) = ?', [$slug]);
            });
        }
        if ($request->filled('category_id')) {
            $catId = $request->get('category_id');
            $query->whereHas('documentType.service.parent', function ($q) use ($catId) {
                $q->where('id', $catId);
            });
        }

        // Date range filters
        $range = $request->input('range');
        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');
        if ($range && $dateFrom) {
            try {
                $from = \Carbon\Carbon::parse($dateFrom)->startOfDay();
                switch ($range) {
                    case 'week':
                        $to = (clone $from)->addDays(6)->endOfDay();
                        break;
                    case 'month':
                        $to = (clone $from)->addDays(29)->endOfDay();
                        break;
                    case 'year':
                        $to = (clone $from)->addDays(364)->endOfDay();
                        break;
                    default:
                        $to = $dateTo ? \Carbon\Carbon::parse($dateTo)->endOfDay() : (clone $from)->endOfDay();
                }
                $query->whereBetween('created_at', [$from, $to]);
            } catch (\Exception $e) {
                // ignore parsing errors
            }
        } elseif ($dateFrom || $dateTo) {
            try {
                $from = $dateFrom ? \Carbon\Carbon::parse($dateFrom)->startOfDay() : \Carbon\Carbon::minValue();
                $to = $dateTo ? \Carbon\Carbon::parse($dateTo)->endOfDay() : \Carbon\Carbon::maxValue();
                $query->whereBetween('created_at', [$from, $to]);
            } catch (\Exception $e) {}
        }

        // Semua user bisa akses semua dokumen (tidak ada kolom is_public lagi)

        // Sorting
        $sort = $request->input('sort', 'recent');
        switch ($sort) {
            case 'oldest':
                $query->orderBy('created_at');
                break;
            case 'title_asc':
                $query->orderBy('title');
                break;
            case 'title_desc':
                $query->orderByDesc('title');
                break;
            case 'popular':
                $query->orderByDesc('download_count')->orderByDesc('created_at');
                break;
            default: // recent
                $query->orderByDesc('created_at');
                break;
        }

        // Pagination size (show entries)
        $allowedPer = [10, 25, 50, 100, 250, 500];
        $per = (int) $request->input('per', 12);
        if (!in_array($per, $allowedPer, true)) {
            $per = 12; // keep existing default
        }

        $documents = $query->paginate($per);
        // untuk kompatibilitas view yang masih menggunakan variabel $categories
        $categories = Service::whereNull('parent_id')->orderBy('name')->get();

        return view('documents.index', compact('documents', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Service::whereNull('parent_id')->orderBy('name')->get();
        return view('documents.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            // gunakan service_id yang menunjuk ke Sub Category atau level yang dipakai upload
            'service_id' => 'required|exists:services,id',
            'file' => 'required|file|mimes:pdf|max:10240', // 10MB max
        ]);

        $file = $request->file('file');
        $fileName = time() . '_' . Str::slug($request->title) . '.pdf';
        $filePath = $file->storeAs('documents', $fileName, 'public');

        Document::create([
            'title' => $request->title,
            'description' => $request->description,
            'file_name' => $file->getClientOriginalName(),
            'file_path' => $filePath,
            'file_size' => $file->getSize(),
            'mime_type' => $file->getMimeType(),
            'service_id' => $request->service_id,
            'uploader_id' => Auth::id(),
        ]);

        return redirect()->route('documents.index')
                        ->with('success', 'Dokumen berhasil diunggah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        $document->load(['documentType.service.parent', 'uploader']);
        return view('documents.show', compact('document'));
    }

    /**
     * Download the specified document.
     */
    public function download(Document $document)
    {
        if (!$document->getFileExists()) {
            abort(404, 'File tidak ditemukan');
        }

        $document->incrementDownloadCount();

        return Storage::disk('public')->download(
            $document->file_path,
            $document->file_name
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        // Only allow owner or admin to edit
        if ($document->uploader_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        $categories = Service::whereNull('parent_id')->orderBy('name')->get();
        return view('documents.edit', compact('document', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        // Only allow owner or admin to update
        if ($document->uploader_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'service_id' => 'required|exists:services,id',
        ]);

        $document->update([
            'title' => $request->title,
            'description' => $request->description,
            'service_id' => $request->service_id,
        ]);

        return redirect()->route('documents.show', $document)
                        ->with('success', 'Dokumen berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        // Only allow owner or admin to delete
        if ($document->uploader_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        // Delete file from storage
        if ($document->getFileExists()) {
            Storage::disk('public')->delete($document->file_path);
        }

        $document->delete();

        return redirect()->route('documents.index')
                        ->with('success', 'Dokumen berhasil dihapus!');
    }
}
