@extends('layouts.app')

@section('title', 'Pengaturan Akun - SI-ARSIP DPMPTSP')

@section('header-title', 'Sistem Informasi Arsip Surat Keputusan')
@section('header-subtitle', 'Pengaturan Akun')

@push('styles')
<style>
    /* Hide search bar in top-header for this page only */
    .search-container {
        display: none !important;
    }
</style>
@endpush

@section('content')
<style>
    .page-header {
        margin-bottom: 30px;
    }
    
    .page-title {
        font-size: 32px;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 8px;
    }
    
    .page-subtitle {
        font-size: 16px;
        color: #6c757d;
        margin-bottom: 0;
    }
    
    .profile-container {
        display: grid;
        grid-template-columns: 1fr 2fr;
        gap: 30px;
        align-items: start;
    }
    
    .profile-card {
        background: white;
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        border: 1px solid #e9ecef;
        text-align: center;
    }
    
    .profile-avatar-section {
        position: relative;
        margin-bottom: 20px;
    }
    
    .profile-banner {
        background: linear-gradient(135deg, #365F8D 0%, #2A4A6B 100%);
        height: 120px;
        border-radius: 12px;
        position: relative;
        margin-bottom: -40px;
    }
    
    .profile-avatar-large {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: linear-gradient(135deg, #365F8D 0%, #2A4A6B 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 700;
        font-size: 32px;
        margin: 0 auto;
        border: 4px solid white;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        position: relative;
        z-index: 1;
    }
    
    .profile-name {
        font-size: 24px;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 4px;
    }
    
    .profile-role {
        font-size: 14px;
        color: #6c757d;
        margin-bottom: 0;
    }
    
    .data-form-card {
        background: white;
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        border: 1px solid #e9ecef;
    }
    
    .form-title {
        font-size: 20px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 24px;
    }
    
    .form-group {
        margin-bottom: 20px;
    }
    
    .form-label {
        display: block;
        font-size: 14px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 8px;
    }
    
    .form-input {
        width: 100%;
        padding: 12px 16px;
        border: 2px solid #e9ecef;
        border-radius: 8px;
        font-size: 14px;
        transition: all 0.3s ease;
        background: white;
    }
    
    .form-input:focus {
        outline: none;
        border-color: #365F8D;
        box-shadow: 0 0 0 3px rgba(54, 95, 141, 0.1);
    }
    
    .file-upload-section {
        margin-bottom: 20px;
    }
    
    .file-upload-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 16px;
        background: #f8f9fa;
        border: 2px solid #e9ecef;
        border-radius: 8px;
        color: #6c757d;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
    }
    
    .file-upload-btn:hover {
        border-color: #365F8D;
        color: #365F8D;
    }
    
    .file-upload-text {
        font-size: 12px;
        color: #6c757d;
        margin-top: 8px;
    }
    
    .btn-primary-custom {
        background: linear-gradient(135deg, #365F8D 0%, #2A4A6B 100%);
        border: none;
        color: white;
        padding: 12px 24px;
        border-radius: 8px;
        font-weight: 500;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
    }
    
    .btn-primary-custom:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(54, 95, 141, 0.3);
        color: white;
    }
    
    @media (max-width: 768px) {
        .profile-container {
            grid-template-columns: 1fr;
            gap: 20px;
        }
        
        .profile-card,
        .data-form-card {
            padding: 20px;
        }
        
        .profile-banner {
            height: 80px;
            margin-bottom: -30px;
        }
        
        .profile-avatar-large {
            width: 60px;
            height: 60px;
            font-size: 24px;
        }
        
        .profile-name {
            font-size: 20px;
        }
    }
</style>

<div class="page-header">
    <h2 class="page-title">Pengaturan Akun</h2>
    <p class="page-subtitle">Kelola informasi akun dan pengaturan profil Anda</p>
</div>

<div class="profile-container">
    <!-- Profile Card -->
    <div class="profile-card">
        <div class="profile-avatar-section">
            <div class="profile-banner"></div>
            <div class="profile-avatar-large">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
        </div>
        <div class="profile-name">{{ Auth::user()->name }}</div>
        <div class="profile-role">User</div>
    </div>
    
    <!-- Data Form Card -->
    <div class="data-form-card">
        <h3 class="form-title">Data Diri</h3>
        
        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label class="form-label" for="name">Nama</label>
                <input type="text" id="name" name="name" class="form-input" 
                       value="{{ old('name', Auth::user()->name) }}" required>
                @error('name')
                    <div style="color: #dc3545; font-size: 12px; margin-top: 4px;">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label class="form-label" for="email">Username</label>
                <input type="email" id="email" name="email" class="form-input" 
                       value="{{ old('email', Auth::user()->email) }}" required>
                @error('email')
                    <div style="color: #dc3545; font-size: 12px; margin-top: 4px;">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="file-upload-section">
                <label class="form-label">Foto</label>
                <div>
                    <label for="avatar" class="file-upload-btn">
                        <i class="fas fa-upload"></i>
                        Choose File
                    </label>
                    <input type="file" id="avatar" name="avatar" style="display: none;" accept="image/*">
                    <div class="file-upload-text">
                        Gambar JPG, GIF atau PNG. Maksimal 500KB
                    </div>
                </div>
                @error('avatar')
                    <div style="color: #dc3545; font-size: 12px; margin-top: 4px;">{{ $message }}</div>
                @enderror
            </div>
            
            <button type="submit" class="btn-primary-custom">
                <i class="fas fa-save"></i>
                Simpan
            </button>
        </form>
    </div>
</div>

@if(session('success'))
<div style="position: fixed; top: 20px; right: 20px; background: #d4edda; color: #155724; padding: 12px 20px; border-radius: 8px; border: 1px solid #c3e6cb; z-index: 1000;">
    {{ session('success') }}
</div>
@endif

@endsection

@push('scripts')
<script>
    // File upload preview
    document.getElementById('avatar').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const label = document.querySelector('.file-upload-btn');
            label.innerHTML = `<i class="fas fa-check"></i> ${file.name}`;
        }
    });
    
    // Auto-hide success message
    setTimeout(function() {
        const successMsg = document.querySelector('[style*="position: fixed"]');
        if (successMsg) {
            successMsg.style.display = 'none';
        }
    }, 3000);
</script>
@endpush
