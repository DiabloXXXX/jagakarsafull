<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Kelurahan Jagakarsa</title>
    
    <!-- Favicon -->
    <link href="<?= base_url() ?>/favicon.ico" rel="icon">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="<?= base_url() ?>/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #f5f7fa;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            max-width: 420px;
            width: 100%;
        }

        .login-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .login-header {
            background: #1e293b;
            color: white;
            padding: 32px 32px 28px;
            border-bottom: 3px solid #99BD49;
        }

        .logo-section {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 8px;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: #99BD49;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-header h1 {
            font-size: 20px;
            font-weight: 600;
            margin: 0;
            color: white;
        }

        .login-header p {
            margin: 0;
            opacity: 0.8;
            font-size: 14px;
            font-weight: 400;
        }

        .login-body {
            padding: 32px;
        }

        .form-label {
            font-weight: 500;
            color: #334155;
            margin-bottom: 8px;
            font-size: 14px;
            display: block;
        }

        .form-control {
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            padding: 11px 14px;
            font-size: 15px;
            transition: all 0.2s;
            width: 100%;
        }

        .form-control:focus {
            outline: none;
            border-color: #99BD49;
            box-shadow: 0 0 0 3px rgba(153, 189, 73, 0.1);
        }

        .input-group {
            position: relative;
        }

        .input-group .form-control {
            padding-right: 45px;
        }

        .input-group-text {
            position: absolute;
            right: 0;
            top: 0;
            height: 100%;
            padding: 0 14px;
            background: transparent;
            border: none;
            cursor: pointer;
            color: #64748b;
            display: flex;
            align-items: center;
        }

        .input-group-text:hover {
            color: #334155;
        }

        .btn-login {
            background: #99BD49;
            color: white;
            border: none;
            border-radius: 6px;
            padding: 12px;
            font-size: 15px;
            font-weight: 600;
            width: 100%;
            cursor: pointer;
            transition: all 0.2s;
            margin-top: 8px;
        }

        .btn-login:hover {
            background: #8aaa3f;
        }

        .btn-login:active {
            transform: scale(0.98);
        }

        .btn-login:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        .alert {
            border-radius: 6px;
            border: none;
            padding: 12px 14px;
            margin-bottom: 20px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .alert-danger {
            background: #fef2f2;
            color: #991b1b;
            border-left: 3px solid #dc2626;
        }

        .alert-info {
            background: #eff6ff;
            color: #1e40af;
            border-left: 3px solid #3b82f6;
        }

        .back-home {
            text-align: center;
            margin-top: 20px;
        }

        .back-home a {
            color: #64748b;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            border-radius: 6px;
            transition: all 0.2s;
        }

        .back-home a:hover {
            background: white;
            color: #334155;
        }

        .mb-4 {
            margin-bottom: 20px;
        }

        @media (max-width: 480px) {
            .login-body {
                padding: 24px;
            }
            
            .login-header {
                padding: 24px;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="logo-section">
                    <div class="logo-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 3L2 8V10H22V8L12 3Z" fill="white"/>
                            <path d="M4 11V19H8V15H16V19H20V11H4Z" fill="white"/>
                            <path d="M2 19H22V21H2V19Z" fill="white"/>
                        </svg>
                    </div>
                    <div>
                        <h1>Admin Panel</h1>
                        <p>Kelurahan Jagakarsa</p>
                    </div>
                </div>
            </div>
            
            <div class="login-body">
                <?php if (session()->getFlashdata('msg')): ?>
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-circle"></i>
                        <span><?= session()->getFlashdata('msg') ?></span>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('auth/login') ?>" method="POST">
                    <?= csrf_field() ?>
                    
                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input 
                            type="email" 
                            class="form-control" 
                            id="email" 
                            name="email" 
                            placeholder="admin@jagakarsa.go.id"
                            required 
                            autofocus>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input 
                                type="password" 
                                class="form-control" 
                                id="password" 
                                name="password" 
                                placeholder="Masukkan password"
                                required>
                            <span class="input-group-text" onclick="togglePassword()">
                                <i class="fas fa-eye" id="toggleIcon"></i>
                            </span>
                        </div>
                    </div>

                    <button type="submit" class="btn-login">
                        Masuk
                    </button>
                </form>
            </div>
        </div>

        <div class="back-home">
            <a href="<?= base_url('/') ?>">
                <i class="fas fa-arrow-left"></i>
                Kembali ke Website
            </a>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>