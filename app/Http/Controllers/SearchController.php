<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Document;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function suggest(Request $request)
    {
        $q = trim($request->get('q', ''));
        $page = max(1, (int) $request->get('page', 1));
        $per = max(1, min(20, (int) $request->get('per', 8))); // default 8 per page, max 20

        if ($q === '') {
            return response()->json([
                'query' => $q,
                'documents' => [],
                'categories' => [],
                'has_more' => false,
                'page' => $page,
            ]);
        }

        $baseQuery = Document::query()
            ->with(['documentType.subCategory.category', 'uploader'])
            ->where(function ($query) use ($q) {
                $query->where('title', 'like', "%{$q}%")
                    ->orWhereHas('documentType', function ($q2) use ($q) {
                        $q2->where('name', 'like', "%{$q}%");
                    })
                    ->orWhere('description', 'like', "%{$q}%");
            })
            ->orderByDesc('uploaded_at')
            ->orderByDesc('created_at');

        $documents = (clone $baseQuery)
            ->skip(($page - 1) * $per)
            ->take($per + 1) // fetch one extra to detect has_more
            ->get();

        $hasMore = $documents->count() > $per;
        if ($hasMore) {
            $documents = $documents->slice(0, $per);
        }

        $documents = $documents->map(function ($doc) {
            return [
                'id' => $doc->id,
                'title' => $doc->title,
                'type' => $doc->documentType->name ?? null,
                'category' => optional(optional($doc->documentType->subCategory)->category)->name,
            ];
        })->values();

        // Only send categories for first page
        $categories = [];
        if ($page === 1) {
            $categories = Category::query()
                ->where('is_active', true)
                ->where('name', 'like', "%{$q}%")
                ->limit(5)
                ->get(['id', 'name']);
        }

        return response()->json([
            'query' => $q,
            'documents' => $documents,
            'categories' => $categories,
            'has_more' => $hasMore,
            'page' => $page,
        ]);
    }
}
