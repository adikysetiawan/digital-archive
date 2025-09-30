@extends('layouts.app')

@push('styles')
<style>
    /* Hide search bar on this page */
    .search-container { display:none !important; }
    .content-card { background:#fff; border-radius:18px; padding:28px; border:1px solid #e9ecef; box-shadow:0 10px 24px rgba(0,0,0,.07); width:100%; max-width:none; margin:0; }
    .section-title { font-size:18px; font-weight:800; color:#2c3e50; display:flex; align-items:center; gap:10px; margin-bottom:18px; }
    .section-title i { color:#365F8D; }
    .form-label { font-weight:700; color:#2c3e50; margin-bottom:10px; }
    .hint { display:none; }
    .form-control, .form-select { border:1px solid #e4e8ee; border-radius:8px; padding:12px 16px; background:#f9fbfd; width:100%; }
    .form-control:focus, .form-select:focus { border-color:#365F8D; box-shadow:0 0 0 4px rgba(54,95,141,.10); background:#fff; }
    .btn-gradient { background:linear-gradient(135deg,#365F8D,#2A4A6B); border:none; color:#fff; padding:12px 24px; border-radius:999px; font-weight:700; letter-spacing:.2px; }
    .btn-outline { border:2px solid #e9ecef; color:#2c3e50; padding:12px 18px; border-radius:12px; background:#fff; font-weight:600; }
    .upload-area { cursor:pointer; transition:all .25s ease; border:2px dashed #e1e8ed; border-radius:8px; padding:24px; text-align:center; min-height:200px; display:flex; flex-direction:column; align-items:center; justify-content:center; background:#fcfdff; }
    .upload-area:hover { background:#f7f9fc; }
    .file-info { display:none; align-items:center; justify-content:center; gap:8px; margin-top:10px; }
    .form-grid { display:grid; grid-template-columns: 1.2fr 1fr; gap:20px; }
    .divider { height:1px; background:#f0f2f5; margin:20px 0; }
    .page-header { margin-bottom:20px; }
    .page-title { font-size:28px; font-weight:700; color:#2c3e50; margin-bottom:6px; }
    .page-subtitle { color:#6c757d; }
    .field-wrap { position:relative; }
    .mb-3.field-wrap { margin-bottom:14px; }
    .invalid-icon { position:absolute; right:12px; top:50%; transform:translateY(-50%); color:#e74c3c; font-size:14px; }
    .is-invalid { border-color:#e74c3c !important; box-shadow:0 0 0 3px rgba(231,76,60,.10) !important; }
    .btn-loading { opacity:.85; pointer-events:none; }
    @media (max-width: 900px){ .form-grid{ grid-template-columns: 1fr; } }
</style>
@endpush

@section('header-title', 'Sistem Informasi Arsip Surat Keputusan')
@section('header-subtitle', 'Unggah Dokumen Baru')

@section('content')
<div class="content-card">
    <div class="section-title"><i class="fas fa-cloud-upload-alt"></i> Unggah Dokumen Baru</div>
    <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-grid">
                            <div>
                                <div class="mb-3 field-wrap">
                                    <label for="nomor" class="form-label">Nomor</label>
                                    <input type="text" id="nomor" name="nomor" class="form-control" placeholder="Masukkan nomor dokumen">
                                    <div class="hint">Opsional. Nomor arsip jika tersedia.</div>
                                </div>

                                <div class="mb-3 field-wrap">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" id="tanggal" name="tanggal" class="form-control">
                                    <div class="hint">Opsional. Tanggal dokumen dibuat/diterbitkan.</div>
                                </div>

                                <div class="mb-3 field-wrap">
                                    <label for="category_id" class="form-label">Bidang Penelitian <span class="text-danger">*</span></label>
                                    <select class="form-select @error('category_id') is-invalid @enderror" 
                                            id="category_id" name="category_id" required>
                                        <option value="">Pilih Bidang</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <div class="hint">Pilih bidang paling sesuai.</div>
                                    @error('category_id')
                                        <i class="fas fa-circle-exclamation invalid-icon" title="{{ $message }}"></i>
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <div class="mb-3 field-wrap">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan nama">
                                    <div class="hint">Opsional. Nama pemohon/pihak terkait.</div>
                                </div>

                                <div class="mb-3 field-wrap">
                                    <label for="instansi" class="form-label">Instansi / Organisasi</label>
                                    <input type="text" id="instansi" name="instansi" class="form-control" placeholder="Masukkan instansi/organisasi">
                                    <div class="hint">Opsional. Instansi atau organisasi terkait.</div>
                                </div>

                                <div class="mb-3 field-wrap">
                                    <label for="title" class="form-label">Judul / Tema <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                           id="title" name="title" value="{{ old('title') }}" 
                                           placeholder="Masukkan judul atau tema" required>
                                    <div class="hint">Gunakan judul singkat dan jelas, maks. 255 karakter.</div>
                                    @error('title')
                                        <i class="fas fa-circle-exclamation invalid-icon" title="{{ $message }}"></i>
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="divider"></div>

                        <div class="mb-3 field-wrap">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="3" 
                                      placeholder="Masukkan deskripsi dokumen (opsional)">{{ old('description') }}</textarea>
                            <div class="hint">Opsional. Beri ringkasan isi dokumen untuk memudahkan pencarian.</div>
                            @error('description')
                                <i class="fas fa-circle-exclamation invalid-icon" title="{{ $message }}"></i>
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4 field-wrap">
                            <label for="file" class="form-label">File PDF <span class="text-danger">*</span></label>
                            <div class="upload-area">
                                <input type="file" class="form-control @error('file') is-invalid @enderror" 
                                       id="file" name="file" accept=".pdf" required style="display:none;">
                                <div class="upload-content">
                                    <i class="fas fa-cloud-upload-alt" style="font-size: 44px; color:#6c757d;"></i>
                                    <div style="font-weight:700; margin-top:8px;">Klik untuk memilih file PDF</div>
                                    <div style="color:#6c757d; font-size:14px;">atau seret dan lepas file di sini</div>
                                    <div style="color:#9aa3ac; font-size:12px; margin-top:6px;">Hanya PDF, maksimal 10MB</div>
                                </div>
                                <div class="file-info">
                                    <i class="fas fa-file-pdf" style="color:#d63031;"></i>
                                    <span class="file-name"></span>
                                    <button type="button" class="btn-outline remove-file" style="padding:6px 10px; border-radius:8px;"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            @error('file')
                                <i class="fas fa-circle-exclamation invalid-icon" title="{{ $message }}" style="top:36px;"></i>
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="divider"></div>
                        <div style="display:flex; justify-content:center;">
                            <button id="btnSubmit" type="submit" class="btn-gradient"><i class="fas fa-save" style="margin-right:8px;"></i>Simpan Dokumen</button>
                        </div>
    </form>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const uploadArea = document.querySelector('.upload-area');
    const fileInput = document.getElementById('file');
    const uploadContent = document.querySelector('.upload-content');
    const fileInfo = document.querySelector('.file-info');
    const fileName = document.querySelector('.file-name');
    const removeBtn = document.querySelector('.remove-file');

    // Click to upload
    uploadArea.addEventListener('click', function() {
        fileInput.click();
    });

    // File input change
    fileInput.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            showFileInfo(this.files[0]);
        }
    });

    // Drag and drop
    uploadArea.addEventListener('dragover', function(e) {
        e.preventDefault();
        this.classList.add('dragover');
    });

    uploadArea.addEventListener('dragleave', function(e) {
        e.preventDefault();
        this.classList.remove('dragover');
    });

    uploadArea.addEventListener('drop', function(e) {
        e.preventDefault();
        this.classList.remove('dragover');
        
        const files = e.dataTransfer.files;
        if (files.length > 0 && files[0].type === 'application/pdf') {
            fileInput.files = files;
            showFileInfo(files[0]);
        }
    });

    // Remove file
    removeBtn.addEventListener('click', function(e) {
        e.stopPropagation();
        fileInput.value = '';
        uploadContent.style.display = 'block';
        fileInfo.style.display = 'none';
    });

    function showFileInfo(file) {
        fileName.textContent = file.name;
        uploadContent.style.display = 'none';
        fileInfo.style.display = 'block';
    }

    // Loading state on submit
    const form = document.querySelector('form[action*="documents/store"]') || document.querySelector('form[action$="{{ route('documents.store') }}"]') || document.querySelector('form');
    const btnSubmit = document.getElementById('btnSubmit');
    if (form && btnSubmit) {
        form.addEventListener('submit', function(){
            btnSubmit.classList.add('btn-loading');
            btnSubmit.innerHTML = '<i class="fas fa-circle-notch fa-spin" style="margin-right:8px;"></i>Menyimpan…';
        });
    }
});
</script>
@endpush
