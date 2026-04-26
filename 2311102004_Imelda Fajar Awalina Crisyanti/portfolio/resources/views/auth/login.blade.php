<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | Imelda Portfolio</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #fff7fb, #ffe8f1);
            color: #3b2c35;
        }

        .navbar {
            height: 80px;
            padding: 0 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #fff;
            border-bottom: 1px solid #f5cddd;
        }

        .logo {
            font-size: 26px;
            font-weight: 800;
            color: #d85c8c;
        }

        .nav-link {
            text-decoration: none;
            color: #3b2c35;
            font-weight: 600;
            padding: 10px 22px;
            border: 1px solid #f2bdd2;
            border-radius: 25px;
        }

        .login-wrapper {
            min-height: calc(100vh - 80px);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
        }

        .login-card {
            width: 420px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 28px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(216, 92, 140, 0.18);
            border: 1px solid #f6cfe0;
        }

        .login-card h2 {
            text-align: center;
            margin-bottom: 10px;
            color: #3b2c35;
            font-size: 30px;
        }

        .login-card p {
            text-align: center;
            margin-bottom: 30px;
            color: #8a6f7d;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #6a4a5a;
        }

        input {
            width: 100%;
            padding: 14px 16px;
            border-radius: 18px;
            border: 1px solid #f1bfd3;
            outline: none;
            font-size: 14px;
            background: #fff;
        }

        input:focus {
            border-color: #d85c8c;
            box-shadow: 0 0 0 4px rgba(216, 92, 140, 0.12);
        }

        .btn-login {
            width: 100%;
            margin-top: 12px;
            padding: 14px;
            border: none;
            border-radius: 25px;
            background: #d85c8c;
            color: white;
            font-weight: 700;
            font-size: 15px;
            cursor: pointer;
        }

        .btn-login:hover {
            background: #c9487b;
        }

        .error {
            background: #ffe1e8;
            color: #c0395f;
            padding: 12px;
            border-radius: 14px;
            margin-bottom: 20px;
            text-align: center;
        }

        .back-home {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #d85c8c;
            text-decoration: none;
            font-weight: 600;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <div class="logo">Imelda Portfolio</div>
        <a href="/" class="nav-link">Home</a>
    </div>

    <div class="login-wrapper">
        <div class="login-card">
            <h2>Login Admin</h2>
            <p>Masuk untuk mengelola data portofolio</p>

            @if(session('error'))
                <div class="error">{{ session('error') }}</div>
            @endif

            <form method="POST" action="/login">
                @csrf

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Masukkan email admin" required>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Masukkan password" required>
                </div>

                <button type="submit" class="btn-login">Login</button>
            </form>

            <a href="/" class="back-home">← Kembali ke Portfolio</a>
        </div>
    </div>

</body>
</html>