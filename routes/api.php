<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DocumentApiController;

Route::get('/documents', [DocumentApiController::class, 'index']);
Route::get('/documents/{id}', [DocumentApiController::class, 'show']);