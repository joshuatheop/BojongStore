<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - BojongStore</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --green-primary: #2e7d32;
            --text-dark: #333;
            --text-light: #999;
            --border: #eee;
            --radius-sm: 8px;
        }

        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
        }

        .auth-container {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1fr 1fr;
            overflow: hidden;
        }

        .auth-image-section {
            position: relative;
            background: linear-gradient(135deg, rgba(76, 175, 80, 0.3) 0%, rgba(56, 142, 60, 0.3) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .auth-image-section img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .auth-form-section {
            background: #f8f8f8;
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .auth-form-wrapper {
            width: 100%;
            max-width: 380px;
        }

        .auth-form-section h1 {
            font-size: 28px;
            font-weight: 700;
            color: var(--green-primary);
            margin-bottom: 30px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-size: 13px;
            font-weight: 600;
            color: var(--text-dark);
            display: block;
            margin-bottom: 8px;
        }

        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 1.5px solid var(--border);
            border-radius: var(--radius-sm);
            font-size: 14px;
            outline: none;
            transition: border-color 0.3s;
            background: white;
            box-sizing: border-box;
        }

        .form-group input:focus {
            border-color: var(--green-primary);
        }

        .btn-submit {
            width: 100%;
            padding: 13px 20px;
            background: var(--green-primary);
            color: white;
            border: none;
            border-radius: var(--radius-sm);
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        .btn-submit:hover {
            background: #235d25;
        }

        .auth-divider {
            display: flex;
            align-items: center;
            margin: 25px 0;
            color: var(--text-light);
            font-size: 12px;
        }

        .auth-divider::before,
        .auth-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--border);
        }

        .auth-divider::before { margin-right: 12px; }
        .auth-divider::after { margin-left: 12px; }

        .social-login {
            display: flex;
            gap: 12px;
            justify-content: center;
            margin-top: 20px;
        }

        .social-btn {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            border: 1.5px solid var(--border);
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 18px;
            color: var(--text-dark);
            text-decoration: none;
            font-weight: 700;
        }

        .social-btn:hover {
            border-color: var(--green-primary);
            transform: scale(1.05);
        }

        .auth-footer-link {
            text-align: center;
            margin-top: 25px;
            font-size: 13px;
            color: #666;
        }

        .auth-footer-link a {
            color: var(--green-primary);
            font-weight: 600;
            text-decoration: none;
        }

        .error-msg {
            background: #ffebee;
            color: #c62828;
            padding: 10px;
            border-radius: 4px;
            font-size: 13px;
            margin-bottom: 20px;
            list-style: none;
            padding-left: 10px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .auth-container { grid-template-columns: 1fr; }
            .auth-image-section { display: none; }
            .auth-form-section { padding: 40px 20px; }
        }

        /* Toast */
        .auth-toast-login {
            position: fixed;
            top: 24px;
            right: 24px;
            background: #1a1a2e;
            color: white;
            padding: 13px 20px;
            border-radius: 10px;
            font-size: 13.5px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.2);
            z-index: 9999;
            border-left: 4px solid #2e7d32;
            animation: toastIn 0.3s ease;
        }
        @keyframes toastIn {
            from { opacity: 0; transform: translateX(60px); }
            to   { opacity: 1; transform: translateX(0); }
        }
        .toast-hide { animation: toastOut 0.4s ease forwards; }
        @keyframes toastOut {
            from { opacity: 1; transform: translateX(0); }
            to   { opacity: 0; transform: translateX(60px); }
        }
    </style>
</head>
<body>
    @if(session('auth_required'))
    <div id="loginToast" class="auth-toast-login">
        ⚠️ <span>{{ session('auth_required') }}</span>
    </div>
    <script>
        setTimeout(() => {
            const t = document.getElementById('loginToast');
            if (t) { t.classList.add('toast-hide'); setTimeout(() => t.remove(), 400); }
        }, 4000);
    </script>
    @endif
    <div class="auth-container">
        <div class="auth-image-section">
            <img src="{{ asset('images/auth_bg.png') }}" alt="BojongStore">
        </div>

        <div class="auth-form-section">
            <div class="auth-form-wrapper">
                <h1>Selamat Datang!</h1>

                @if ($errors->any())
                    <div class="error-msg">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email anda" required autofocus />
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" type="password" name="password" placeholder="Masukkan password anda" required />
                    </div>

                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                        <label style="font-size: 13px; color: #666; display: flex; align-items: center; cursor: pointer;">
                            <input type="checkbox" name="remember" style="margin-right: 8px;"> Ingat saya
                        </label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" style="font-size: 13px; color: var(--green-primary); text-decoration: none;">Lupa password?</a>
                        @endif
                    </div>

                    <button type="submit" class="btn-submit">Masuk</button>
                </form>

                <div class="auth-divider">Atau lanjutkan dengan</div>

                <div class="social-login">
                    <a href="#" class="social-btn">f</a>
                    <a href="#" class="social-btn">G</a>
                </div>

                <div class="auth-footer-link">
                    Belum punya akun? <a href="{{ route('register') }}">Buat akun</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
