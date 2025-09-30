<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SI-ARSIP DPMPTSP</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            height: 100vh;
            display: flex;
            background: linear-gradient(135deg, #365F8D 0%, #2A4A6B 100%);
            overflow: hidden;
        }

        .left-section {
            flex: 1.5;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
            padding: 60px 80px;
            color: white;
            position: relative;
        }

        .logo-section {
            display: flex;
            align-items: center;
            margin-bottom: 40px;
            position: absolute;
            top: 40px;
            left: 80px;
        }

        .logo-section img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }

        .logo-text {
            font-size: 28px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .welcome-content {
            max-width: 500px;
            margin-top: 140px;
        }

        .welcome-title {
            font-size: 48px;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 24px;
            letter-spacing: -1px;
        }

        .welcome-subtitle {
            font-size: 18px;
            font-weight: 400;
            line-height: 1.6;
            opacity: 0.9;
            margin-bottom: 40px;
        }

        .register-link {
            background: rgba(255, 255, 255, 0.2);
            border: 2px solid rgba(255, 255, 255, 0.3);
            color: white;
            padding: 16px 32px;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            backdrop-filter: blur(10px);
        }

        .register-link:hover {
            background: rgba(255, 255, 255, 0.3);
            border-color: rgba(255, 255, 255, 0.5);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
            color: white;
            text-decoration: none;
        }

        .right-section {
            flex: 3;
            background: rgba(255, 255, 255, 0.95);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 60px;
            backdrop-filter: blur(20px);
        }

        .login-form {
            width: 100%;
            max-width: 400px;
        }

        .login-title {
            font-size: 32px;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 8px;
        }

        .login-subtitle {
            font-size: 14px;
            color: #7f8c8d;
            margin-bottom: 40px;
        }

        .form-group {
            margin-bottom: 24px;
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #95a5a6;
            cursor: pointer;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        .password-toggle:hover {
            color: #365F8D;
        }

        .form-input {
            width: 100%;
            padding: 16px 20px 16px 50px;
            border: 2px solid #e1e8ed;
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: white;
            font-family: 'Inter', sans-serif;
        }

        .form-input:focus {
            outline: none;
            border-color: #365F8D;
            box-shadow: 0 0 0 3px rgba(54, 95, 141, 0.1);
        }

        .form-input::placeholder {
            color: #bdc3c7;
            font-weight: 400;
        }

        .input-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #95a5a6;
            font-size: 16px;
        }

        .login-btn {
            width: 100%;
            background: linear-gradient(135deg, #365F8D 0%, #2A4A6B 100%);
            color: white;
            border: none;
            padding: 16px;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 20px;
            font-family: 'Inter', sans-serif;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(54, 95, 141, 0.3);
        }

        .remember-forgot-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .remember-me input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: #365F8D;
        }

        .remember-me label {
            font-size: 14px;
            color: #7f8c8d;
            cursor: pointer;
        }

        .forgot-password a {
            color: #365F8D;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        .error-message {
            background: #fee;
            border: 1px solid #fcc;
            color: #c66;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .features {
            position: absolute;
            bottom: 40px;
            left: 80px;
            display: flex;
            gap: 40px;
            color: rgba(255, 255, 255, 0.8);
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
        }

        .feature-icon {
            width: 20px;
            height: 20px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
        }

        @media (max-width: 768px) {
            body {
                flex-direction: column;
                overflow-y: auto;
            }
            
            .left-section, .right-section {
                flex: none;
                padding: 40px 20px;
            }
            
            .logo-section {
                position: relative;
                top: auto;
                left: auto;
                margin-bottom: 40px;
            }
            
            .welcome-content {
                margin-top: 0;
            }
            
            .welcome-title {
                font-size: 36px;
            }
            
            .features {
                position: relative;
                bottom: auto;
                left: auto;
                margin-top: 40px;
                flex-direction: column;
                gap: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="left-section">
        <div class="logo-section">
            <img src="<?php echo e(asset('assets/logos/logo_dpmptsp.jpg')); ?>" alt="Logo DPMPTSP">
            <div class="logo-text">SI-ARSIP</div>
        </div>
        
        <div class="welcome-content">
            <h1 class="welcome-title">Selamat Datang</h1>
            <p class="welcome-subtitle">
                Sistem Informasi Arsip Digital DPMPTSP Kota Surabaya. 
                Masuk ke sistem untuk mengelola dokumen digital Anda dengan mudah, aman, dan efisien.
            </p>
        </div>
        
        <div class="features">
            <div class="feature-item">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <span>Keamanan Terjamin</span>
            </div>
            <div class="feature-item">
                <div class="feature-icon">
                    <i class="fas fa-search"></i>
                </div>
                <span>Pencarian Cepat</span>
            </div>
        </div>
    </div>
    
    <div class="right-section">
        <form class="login-form" method="POST" action="<?php echo e(url('/login')); ?>">
            <?php echo csrf_field(); ?>
            <h2 class="login-title">Masuk ke Sistem</h2>
            <p class="login-subtitle">Masukkan NIP/NIK/Email dan password untuk mengakses sistem arsip digital</p>
            
            <?php if($errors->any()): ?>
                <div class="error-message">
                    <ul style="margin: 0; padding-left: 20px;">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            
            <div class="form-group">
                <i class="fas fa-user input-icon"></i>
                <input type="text" class="form-input" name="login" placeholder="NIP / NIK / Email" value="<?php echo e(old('login')); ?>" required autofocus>
            </div>
            
            <div class="form-group">
                <i class="fas fa-lock input-icon"></i>
                <input type="password" class="form-input" name="password" id="login_password" placeholder="Password" required>
                <i class="fas fa-eye password-toggle" onclick="togglePassword('login_password')"></i>
            </div>
            
            <div class="remember-forgot-row">
                <div class="remember-me">
                    <input type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                    <label for="remember">Ingat saya</label>
                </div>
                
                <div class="forgot-password">
                    <a href="<?php echo e(route('password.request')); ?>">
                        Lupa password?
                    </a>
                </div>
            </div>
            
            <button type="submit" class="login-btn">
                Masuk ke Sistem
            </button>
            
        </form>
    </div>
    
    <script>
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const icon = field.nextElementSibling;
            
            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                field.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>
<?php /**PATH C:\laragon\www\arsip-digital\resources\views/auth/login.blade.php ENDPATH**/ ?>