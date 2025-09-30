<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;
use App\Http\Resources\DocumentResource;

class DocumentApiController extends Controller
{
    public function index()
{
    $documents = Document::with('documentType', 'service')->get();
    return response()->json([
        'success' => true,
        'data' => $documents
    ]);

    return DocumentResource::collection(Document::all());
}
}
