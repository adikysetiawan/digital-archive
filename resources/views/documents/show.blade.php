@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-0"><i class="fas fa-file-pdf text-danger me-2"></i>{{ $document->title }}</h5>
                        <small class="text-muted">Diunggah {{ $document->created_at->diffForHumans() }}</small>
                    </div>
                    <div>
                        <a href="{{ route('documents.index') }}" class="btn btn-outline-secondary btn-sm me-2">
                            <i class="fas fa-arrow-left me-1"></i>Kembali
                        </a>
                        @if($document->uploaded_by === Auth::id())
                        <a href="{{ route('documents.edit', $document) }}" class="btn btn-outline-primary btn-sm me-2">
                            <i class="fas fa-edit me-1"></i>Edit
                        </a>
                        @endif
                        <a href="{{ route('documents.download', $document) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-download me-1"></i>Unduh
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h6 class="text-muted mb-2">Deskripsi</h6>
                                <p class="mb-0">{{ $document->description ?: 'Tidak ada deskripsi' }}</p>
                            </div>

                            <div class="mb-4">
                                <h6 class="text-muted mb-2">Kategori</h6>
                                <span class="badge fs-6 px-3 py-2" style="background-color: {{ $document->category->color }}">
                                    {{ $document->category->name }}
                                </span>
                            </div>

                            @if($document->description && $document->category->description)
                            <div class="mb-4">
                                <h6 class="text-muted mb-2">Tentang Kategori</h6>
                                <p class="text-muted mb-0">{{ $document->category->description }}</p>
                            </div>
                            @endif
                        </div>

                        <div class="col-md-4">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h6 class="card-title mb-3">Informasi File</h6>
                                    
                                    <div class="mb-3">
                                        <small class="text-muted d-block">Nama File</small>
                                        <span class="fw-medium">{{ $document->file_name }}</span>
                                    </div>

                                    <div class="mb-3">
                                        <small class="text-muted d-block">Ukuran File</small>
                                        <span class="fw-medium">{{ $document->file_size_human }}</span>
                                    </div>

                                    <div class="mb-3">
                                        <small class="text-muted d-block">Diunggah Oleh</small>
                                        <span class="fw-medium">{{ $document->uploader->name }}</span>
                                    </div>

                                    <div class="mb-3">
                                        <small class="text-muted d-block">Tanggal Upload</small>
                                        <span class="fw-medium">{{ $document->uploaded_at->format('d M Y, H:i') }}</span>
                                    </div>

                                    <div class="mb-0">
                                        <small class="text-muted d-block">Jumlah Unduhan</small>
                                        <span class="fw-medium">{{ $document->download_count }} kali</span>
                                    </div>
                                </div>
                            </div>

                            @if($document->uploaded_by === Auth::id())
                            <div class="mt-3">
                                <button type="button" class="btn btn-outline-danger btn-sm w-100" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                    <i class="fas fa-trash me-1"></i>Hapus Dokumen
                                </button>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Documents -->
            @php
                $relatedDocuments = \App\Models\Document::where('category_id', $document->category_id)
                    ->where('id', '!=', $document->id)
                    ->where('is_public', true)
                    ->latest()
                    ->take(3)
                    ->get();
            @endphp

            @if($relatedDocuments->count() > 0)
            <div class="card mt-4">
                <div class="card-header">
                    <h6 class="mb-0">Dokumen Terkait</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($relatedDocuments as $related)
                        <div class="col-md-4 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-start">
                                        <i class="fas fa-file-pdf text-danger me-2 mt-1"></i>
                                        <div>
                                            <h6 class="card-title mb-1">{{ Str::limit($related->title, 40) }}</h6>
                                            <p class="card-text text-muted small mb-2">
                                                {{ Str::limit($related->description, 60) }}
                                            </p>
                                            <small class="text-muted">{{ $related->created_at->diffForHumans() }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-transparent pt-0">
                                    <a href="{{ route('documents.show', $related) }}" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-eye me-1"></i>Lihat
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

@if($document->uploaded_by === Auth::id())
<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus dokumen <strong>"{{ $document->title }}"</strong>?</p>
                <p class="text-danger mb-0"><i class="fas fa-exclamation-triangle me-1"></i>Tindakan ini tidak dapat dibatalkan.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form action="{{ route('documents.destroy', $document) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash me-1"></i>Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endpush
