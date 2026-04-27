<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root { --bg: #0a0a0f; --accent: #c8f065; --accent2: #7c5cfc; --text: #e8e8f0; --muted: #666680; --border: rgba(200,240,101,0.12); --card: rgba(255,255,255,0.04); }
        body { background: var(--bg); color: var(--text); font-family: 'DM Sans', sans-serif; min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        .bg-glow { position: fixed; width: 500px; height: 500px; background: radial-gradient(circle, rgba(124,92,252,0.12) 0%, transparent 70%); top: 50%; left: 50%; transform: translate(-50%,-50%); pointer-events: none; }
        .card {
            width: 100%; max-width: 420px;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 3rem;
            position: relative;
        }
        .logo { font-family: 'Syne', sans-serif; font-size: 1.5rem; font-weight: 800; color: var(--accent); margin-bottom: 0.5rem; }
        .subtitle { color: var(--muted); font-size: 0.9rem; margin-bottom: 2rem; }
        .form-group { margin-bottom: 1.25rem; }
        .form-group label { display: block; font-size: 0.82rem; font-weight: 500; color: var(--muted); margin-bottom: 0.5rem; }
        .form-group input {
            width: 100%; background: rgba(255,255,255,0.04); border: 1px solid var(--border);
            border-radius: 10px; padding: 0.85rem 1rem; color: var(--text); font-family: inherit;
            font-size: 0.95rem; outline: none; transition: border-color 0.2s;
        }
        .form-group input:focus { border-color: var(--accent); }
        .btn {
            width: 100%; background: var(--accent); color: #0a0a0f;
            border: none; border-radius: 10px; padding: 0.9rem;
            font-weight: 700; font-size: 1rem; cursor: pointer; margin-top: 0.5rem;
            transition: all 0.2s;
        }
        .btn:hover { opacity: 0.9; }
        .error { background: rgba(255,80,80,0.1); border: 1px solid rgba(255,80,80,0.2); color: #ff8080; border-radius: 10px; padding: 0.75rem 1rem; font-size: 0.85rem; margin-bottom: 1rem; }
        .back-link { display: block; text-align: center; margin-top: 1.5rem; color: var(--muted); font-size: 0.85rem; text-decoration: none; }
        .back-link:hover { color: var(--accent); }
    </style>
</head>
<body>
<div class="bg-glow"></div>
<div class="card">
    <div class="logo">Admin Panel</div>
    <div class="subtitle">Sign in to manage your portfolio</div>

    @if($errors->any())
        <div class="error">{{ $errors->first() }}</div>
    @endif
    @if(session('error'))
        <div class="error">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.login.post') }}">
        @csrf
        <div class="form-group">
            <label>Email Address</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="admin@example.com" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="••••••••" required>
        </div>
        <button type="submit" class="btn">Sign In →</button>
    </form>
    <a href="{{ route('portfolio') }}" class="back-link">← Back to Portfolio</a>
</div>
</body>
</html>