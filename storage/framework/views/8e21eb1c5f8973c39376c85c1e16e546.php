<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atur Ulang Password - SI-ARSIP DPMPTSP</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        *{margin:0;padding:0;box-sizing:border-box}
        body{font-family:'Inter',sans-serif;min-height:100vh;display:flex;background:linear-gradient(135deg,#365F8D 0%,#2A4A6B 100%)}
        .wrapper{display:flex;flex:1}
        .left{flex:1.5;color:#fff;position:relative;padding:60px 80px;display:flex;align-items:flex-start;justify-content:flex-start}
        .logo{position:absolute;top:40px;left:80px;display:flex;align-items:center;gap:12px}
        .logo img{width:50px;height:50px;border-radius:50%;box-shadow:0 4px 12px rgba(0,0,0,.2)}
        .logo span{font-size:28px;font-weight:700;letter-spacing:-.5px}
        .headline{margin-top:140px;max-width:520px}
        .headline h1{font-size:48px;font-weight:800;line-height:1.2;letter-spacing:-1px;margin-bottom:24px}
        .headline p{font-size:18px;opacity:.92;line-height:1.7}

        .right{flex:3;background:rgba(255,255,255,.96);display:flex;align-items:center;justify-content:center;padding:60px}
        .card{width:100%;max-width:440px;background:#fff;border-radius:16px;padding:28px;border:1px solid #e9ecef;box-shadow:0 12px 28px rgba(54,95,141,.12)}
        .title{font-size:28px;font-weight:800;color:#2c3e50;margin-bottom:6px}
        .subtitle{font-size:14px;color:#6c757d;margin-bottom:18px}
        .alert{background:#e8f5e8;border:1px solid #c8e6c9;color:#2e7d32;padding:12px 14px;border-radius:10px;font-size:14px;margin-bottom:12px}
        .error{background:#fee;border:1px solid #fcc;color:#c66;padding:12px 14px;border-radius:10px;font-size:14px;margin-bottom:12px}
        .form-group{margin-bottom:14px;position:relative}
        .input-icon{position:absolute;left:14px;top:50%;transform:translateY(-50%);color:#95a5a6}
        .toggle-visibility{position:absolute;right:14px;top:50%;transform:translateY(-50%);color:#95a5a6;cursor:pointer}
        .input{width:100%;padding:14px 16px 14px 42px;border:2px solid #e1e8ed;border-radius:12px;font-size:15px;transition:.25s;background:#fff}
        .input:focus{outline:none;border-color:#365F8D;box-shadow:0 0 0 3px rgba(54,95,141,.1)}
        .btn-primary{width:100%;padding:14px 18px;border:none;border-radius:12px;color:#fff;font-weight:700;font-size:15px;cursor:pointer;background:linear-gradient(135deg,#365F8D 0%,#2A4A6B 100%);box-shadow:0 8px 22px rgba(54,95,141,.22);transition:.25s;margin-top:6px}
        .btn-primary:hover{transform:translateY(-1px);box-shadow:0 10px 26px rgba(54,95,141,.28)}
        .back{margin-top:14px;text-align:center}
        .back a{color:#365F8D;text-decoration:none;font-weight:600;display:inline-flex;align-items:center;gap:8px}
        .back a i{font-size:14px}
        .row{display:block}
        .row .col{flex:none}
        @media(max-width:768px){.left{display:none}.right{flex:1;padding:24px}}
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="left">
            <div class="logo">
                <img src="<?php echo e(asset('assets/logos/logo_dpmptsp.jpg')); ?>" alt="Logo DPMPTSP">
                <span>SI-ARSIP</span>
            </div>
            <div class="headline">
                <h1>Atur Ulang Password</h1>
                <p>Masukkan password baru Anda dan konfirmasi ulang. Setelah berhasil, Anda akan diarahkan kembali untuk login.</p>
            </div>
        </div>
        <div class="right">
            <div class="card">
                <div class="title">Buat Password Baru</div>
                <div class="subtitle">Pastikan password kuat dan mudah diingat</div>

                <?php if($errors->any()): ?>
                    <div class="error">
                        <ul style="margin:0 0 0 18px;">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form method="POST" action="<?php echo e(route('password.update')); ?>">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="token" value="<?php echo e($token); ?>">

                    <div class="form-group">
                        <i class="fas fa-envelope input-icon"></i>
                        <input id="email" type="email" class="input" name="email" value="<?php echo e($email ?? old('email')); ?>" required autocomplete="email" placeholder="Alamat Email">
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <i class="fas fa-lock input-icon"></i>
                                <input id="password" type="password" class="input" name="password" required autocomplete="new-password" placeholder="Password Baru">
                                <i class="fas fa-eye toggle-visibility" data-target="password"></i>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <i class="fas fa-check-double input-icon"></i>
                                <input id="password-confirm" type="password" class="input" name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi Password">
                                <i class="fas fa-eye toggle-visibility" data-target="password-confirm"></i>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn-primary">Simpan Password</button>
                </form>

                <div class="back"><a href="/"><i class="fas fa-arrow-left"></i> Kembali ke Halaman Login</a></div>
            </div>
        </div>
    </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function(){
        document.querySelectorAll('.toggle-visibility').forEach(function(btn){
            btn.addEventListener('click', function(){
                const id = this.getAttribute('data-target');
                const input = document.getElementById(id);
                if(!input) return;
                if(input.type === 'password'){
                    input.type = 'text';
                    this.classList.remove('fa-eye');
                    this.classList.add('fa-eye-slash');
                } else {
                    input.type = 'password';
                    this.classList.remove('fa-eye-slash');
                    this.classList.add('fa-eye');
                }
            });
        });
    });
</script>
</html>
<?php /**PATH C:\laragon\www\arsip-digital\resources\views/auth/passwords/reset.blade.php ENDPATH**/ ?>