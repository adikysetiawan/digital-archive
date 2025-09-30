<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - SI-ARSIP DPMPTSP</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body {
            font-family:'Inter',sans-serif;
            min-height:100vh;
            display:flex;
            background: linear-gradient(135deg, #365F8D 0%, #2A4A6B 100%);
            color:#2c3e50;
        }
        .wrapper { display:flex; flex:1; }
        .left {
            flex:1.5; color:#fff; position:relative; padding:60px 80px;
            display:flex; align-items:flex-start; justify-content:flex-start;
        }
        .logo { position:absolute; top:40px; left:80px; display:flex; align-items:center; gap:12px; }
        .logo img { width:50px; height:50px; border-radius:50%; box-shadow:0 4px 12px rgba(0,0,0,0.2); }
        .logo span { font-size:28px; font-weight:700; letter-spacing:-0.5px; }
        .headline { margin-top:140px; max-width:520px; }
        .headline h1 { font-size:48px; font-weight:800; line-height:1.2; letter-spacing:-1px; margin-bottom:24px; }
        .headline p { font-size:18px; opacity:.92; line-height:1.7; }

        .right { flex:3; background:rgba(255,255,255,.96); display:flex; align-items:center; justify-content:center; padding:60px; }
        .card {
            width:100%; max-width:420px; background:#fff; border-radius:16px; padding:28px 28px 24px;
            border:1px solid #e9ecef; box-shadow:0 12px 28px rgba(54,95,141,.12);
        }
        .title { font-size:28px; font-weight:800; color:#2c3e50; margin-bottom:6px; }
        .subtitle { font-size:14px; color:#6c757d; margin-bottom:22px; }
        .form-group { margin-bottom:16px; position:relative; }
        .input-icon { position:absolute; left:14px; top:50%; transform:translateY(-50%); color:#95a5a6; }
        .input { width:100%; padding:14px 16px 14px 42px; border:2px solid #e1e8ed; border-radius:12px; font-size:15px; transition:.25s; }
        .input:focus { outline:none; border-color:#365F8D; box-shadow:0 0 0 3px rgba(54,95,141,.1); }
        .btn-primary { width:100%; padding:14px 18px; border:none; border-radius:12px; color:#fff; font-weight:700; font-size:15px; cursor:pointer;
            background:linear-gradient(135deg,#365F8D 0%,#2A4A6B 100%); box-shadow:0 8px 22px rgba(54,95,141,.22); transition:.25s; }
        .btn-primary:hover { transform:translateY(-1px); box-shadow:0 10px 26px rgba(54,95,141,.28); }
        .back-login { margin-top:14px; text-align:center; }
        .back-login a { color:#365F8D; text-decoration:none; font-weight:600; }
        .alert-success { background:#e8f5e8; border:1px solid #c8e6c9; color:#2e7d32; padding:12px 14px; border-radius:10px; font-size:14px; margin-bottom:12px; }
        .error { background:#fee; border:1px solid #fcc; color:#c66; padding:12px 14px; border-radius:10px; font-size:14px; margin-bottom:12px; }
        @media (max-width: 768px) {
            .left { display:none; }
            .right { flex:1; padding:24px; }
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="left">
            <div class="logo">
                <img src="{{ asset('assets/logos/logo_dpmptsp.jpg') }}" alt="Logo DPMPTSP">
                <span>SI-ARSIP</span>
            </div>
            <div class="headline">
                <h1>Lupa Password?</h1>
                <p>Masukkan alamat email Anda. Kami akan mengirim tautan untuk mengatur ulang password. Pastikan email aktif dan dapat menerima pesan.</p>
            </div>
        </div>
        <div class="right">
            <div class="card">
                <div class="title">Reset Password</div>
                <div class="subtitle">Kami akan mengirim tautan reset ke email Anda</div>

                @if (session('status'))
                    <div class="alert-success">{{ session('status') }}</div>
                @endif
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group">
                        <i class="fas fa-envelope input-icon"></i>
                        <input id="email" type="email" class="input" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Alamat Email">
                    </div>
                    <button type="submit" class="btn-primary">
                        Kirim Tautan Reset Password
                    </button>
                </form>

                <div class="back-login" style="margin-top:16px;">
                    <a href="/"><i class="fas fa-arrow-left" style="margin-right:6px;"></i>Kembali ke Halaman Login</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
