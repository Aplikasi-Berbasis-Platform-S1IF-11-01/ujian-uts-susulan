<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Nia Profile</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --bg: #fffafb;
            --card: rgba(255, 255, 255, 0.96);
            --line: #f2dfe6;
            --pink: #e78aa9;
            --pink-dark: #c96f8d;
            --text: #5b4d54;
            --text-soft: #7b6c73;
            --shadow: 0 18px 38px rgba(209, 126, 154, 0.14);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background:
                radial-gradient(circle at top left, rgba(250, 215, 226, 0.25), transparent 26%),
                radial-gradient(circle at bottom right, rgba(252, 232, 239, 0.48), transparent 28%),
                linear-gradient(180deg, #fff9fb 0%, #ffffff 100%);
            color: var(--text);
            min-height: 100vh;
        }

        .login-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 32px 18px;
        }

        .login-card {
            width: 100%;
            max-width: 520px;
            background: var(--card);
            border: 1px solid rgba(244, 221, 229, 0.95);
            border-radius: 30px;
            box-shadow: var(--shadow);
            padding: 42px 38px 34px;
            position: relative;
            overflow: hidden;
        }

        .login-card::before {
            content: "";
            position: absolute;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            top: -30px;
            right: -30px;
            background: radial-gradient(circle, rgba(231, 138, 169, 0.10) 0%, rgba(231, 138, 169, 0.03) 60%, rgba(231, 138, 169, 0) 100%);
            pointer-events: none;
        }

        .login-card::after {
            content: "";
            position: absolute;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            bottom: -70px;
            right: -60px;
            background: radial-gradient(circle, rgba(231, 138, 169, 0.10) 0%, rgba(231, 138, 169, 0.03) 60%, rgba(231, 138, 169, 0) 100%);
            pointer-events: none;
        }

        .login-logo {
            display: block;
            text-align: center;
            margin-bottom: 16px;
            position: relative;
            z-index: 2;
        }

        .login-logo svg {
            width: 46px;
            height: 46px;
            color: var(--pink-dark);
            opacity: 0.85;
        }

        .login-title {
            text-align: center;
            font-size: 2rem;
            font-weight: 700;
            color: var(--pink-dark);
            margin: 0 0 8px;
            position: relative;
            z-index: 2;
        }

        .login-subtitle {
            text-align: center;
            color: var(--text-soft);
            font-size: 0.96rem;
            line-height: 1.8;
            margin: 0 0 30px;
            position: relative;
            z-index: 2;
        }

        .field-group {
            margin-bottom: 22px;
            position: relative;
            z-index: 2;
        }

        .field-label {
            display: block;
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--text);
            margin-bottom: 9px;
        }

        .field-input {
            width: 100%;
            border: 1px solid var(--line);
            background: #fffdfd;
            color: var(--text);
            border-radius: 18px;
            padding: 14px 16px;
            font-family: 'Inter', sans-serif;
            font-size: 0.95rem;
            outline: none;
            transition: 0.25s ease;
        }

        .field-input:focus {
            border-color: var(--pink);
            box-shadow: 0 0 0 4px rgba(231, 138, 169, 0.10);
        }

        .remember-row {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 22px;
            color: var(--text-soft);
            font-size: 0.94rem;
            position: relative;
            z-index: 2;
        }

        .remember-row input[type="checkbox"] {
            width: 17px;
            height: 17px;
            accent-color: var(--pink-dark);
        }

        .form-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-top: 8px;
            position: relative;
            z-index: 2;
        }

        .forgot-link {
            font-size: 0.92rem;
            color: var(--pink-dark);
            font-weight: 500;
            text-decoration: none;
        }

        .forgot-link:hover {
            color: var(--pink);
        }

        .login-button {
            border: none;
            background: linear-gradient(135deg, var(--pink), var(--pink-dark));
            color: #fff;
            padding: 12px 26px;
            border-radius: 999px;
            font-size: 0.95rem;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
            cursor: pointer;
            box-shadow: 0 12px 22px rgba(231, 138, 169, 0.15);
            transition: 0.3s ease;
        }

        .login-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 16px 28px rgba(231, 138, 169, 0.20);
        }

        .back-link {
            text-align: center;
            margin-top: 30px;
            position: relative;
            z-index: 2;
        }

        .back-link a {
            color: #9b8a91;
            text-decoration: none;
            font-size: 0.92rem;
            font-weight: 500;
        }

        .back-link a span {
            color: var(--pink-dark);
            font-weight: 700;
        }

        .back-link a:hover span {
            color: var(--pink);
        }

        .error-wrap {
            margin-top: 8px;
            font-size: 0.86rem;
            color: #d35f86;
        }

        .session-status {
            margin-bottom: 18px;
            color: var(--pink-dark);
            font-size: 0.9rem;
            text-align: center;
            position: relative;
            z-index: 2;
        }

        @media (max-width: 575.98px) {
            .login-card {
                padding: 32px 22px 28px;
                border-radius: 24px;
            }

            .login-title {
                font-size: 1.75rem;
            }

            .form-footer {
                flex-direction: column;
                align-items: stretch;
            }

            .login-button {
                width: 100%;
            }

            .forgot-link {
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="login-page">
        <div class="login-card">
            <div class="login-logo">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <path d="M12 2 4 7v10l8 5 8-5V7l-8-5Z"/>
                    <path d="M12 22V12"/>
                    <path d="m20 7-8 5-8-5"/>
                </svg>
            </div>

            <h1 class="login-title">Admin Login</h1>
            <p class="login-subtitle">
                Silakan masuk menggunakan akun admin untuk mengelola isi website portfolio.
            </p>

            @if (session('status'))
                <div class="session-status">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="field-group">
                    <label for="email" class="field-label">Email</label>
                    <input
                        id="email"
                        class="field-input"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        autocomplete="username"
                    >
                    @error('email')
                        <div class="error-wrap">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field-group">
                    <label for="password" class="field-label">Password</label>
                    <input
                        id="password"
                        class="field-input"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                    >
                    @error('password')
                        <div class="error-wrap">{{ $message }}</div>
                    @enderror
                </div>

                <div class="remember-row">
                    <input id="remember_me" type="checkbox" name="remember">
                    <label for="remember_me">Remember me</label>
                </div>

                <div class="form-footer">
                    @if (Route::has('password.request'))
                        <a class="forgot-link" href="{{ route('password.request') }}">
                            Forgot password?
                        </a>
                    @endif

                    <button type="submit" class="login-button">
                        Log in
                    </button>
                </div>
            </form>

            <div class="back-link">
                <a href="{{ url('/') }}">Kembali ke <span>landing page</span></a>
            </div>
        </div>
    </div>
</body>
</html>