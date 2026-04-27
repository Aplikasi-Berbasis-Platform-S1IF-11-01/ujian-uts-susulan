<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #0a0a0f; --bg2: #111118; --bg3: #1a1a24;
            --accent: #7c6af7; --accent2: #a78bfa;
            --text: #e8e8f0; --muted: #6b6b80;
            --border: rgba(255,255,255,0.07);
            --sidebar: 240px;
        }
        * { margin:0; padding:0; box-sizing:border-box; }
        body { background:var(--bg); color:var(--text); font-family:'DM Sans',sans-serif; display:flex; min-height:100vh; }

        /* Sidebar */
        .sidebar {
            width: var(--sidebar);
            background: var(--bg2);
            border-right: 1px solid var(--border);
            display: flex; flex-direction: column;
            position: fixed; top:0; left:0; bottom:0;
            z-index: 50;
        }
        .sidebar-brand {
            padding: 28px 24px;
            border-bottom: 1px solid var(--border);
            font-family: 'Syne', sans-serif;
            font-weight: 800;
            font-size: 18px;
        }
        .sidebar-brand span { color: var(--accent); }
        .sidebar-sub { font-size: 11px; color: var(--muted); margin-top: 2px; font-weight: 400; font-family: 'DM Sans', sans-serif; }

        .sidebar-nav { flex: 1; padding: 16px 12px; }
        .nav-section-label { font-size: 10px; font-weight: 600; letter-spacing: 0.15em; text-transform: uppercase; color: var(--muted); padding: 8px 12px; margin-bottom: 4px; }
        .sidebar-link {
            display: flex; align-items: center; gap: 10px;
            padding: 10px 12px;
            border-radius: 10px;
            color: var(--muted);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.15s;
            margin-bottom: 2px;
        }
        .sidebar-link:hover { background: rgba(255,255,255,0.04); color: var(--text); }
        .sidebar-link.active { background: rgba(124,106,247,0.12); color: var(--accent2); }
        .sidebar-link .icon { font-size: 16px; width: 20px; text-align: center; }

        .sidebar-footer {
            padding: 16px 12px;
            border-top: 1px solid var(--border);
        }
        .user-info {
            display: flex; align-items: center; gap: 10px;
            padding: 10px 12px;
            margin-bottom: 8px;
        }
        .user-avatar {
            width: 32px; height: 32px;
            background: var(--accent);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 13px; font-weight: 700; color: #fff;
        }
        .user-name { font-size: 13px; font-weight: 500; }
        .logout-btn {
            display: flex; align-items: center; gap: 10px;
            padding: 10px 12px;
            border-radius: 10px;
            color: #f87171;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            border: none;
            background: none;
            width: 100%;
            font-family: 'DM Sans', sans-serif;
            transition: background 0.15s;
        }
        .logout-btn:hover { background: rgba(248,113,113,0.1); }

        /* Main */
        .main { margin-left: var(--sidebar); flex: 1; display: flex; flex-direction: column; min-height: 100vh; }
        .topbar {
            padding: 20px 36px;
            border-bottom: 1px solid var(--border);
            background: var(--bg2);
        }
        .topbar h1 { font-family: 'Syne', sans-serif; font-size: 22px; font-weight: 700; letter-spacing: -0.5px; }
        .topbar p  { font-size: 13px; color: var(--muted); margin-top: 2px; }

        .content { padding: 36px; flex: 1; }

        /* Shared components */
        .card {
            background: rgba(255,255,255,0.02);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 24px;
        }
        .card-title { font-family: 'Syne', sans-serif; font-size: 16px; font-weight: 700; margin-bottom: 20px; }

        .form-group { margin-bottom: 18px; }
        label { display:block; font-size:12px; font-weight:500; color:var(--muted); margin-bottom:6px; letter-spacing:0.04em; text-transform:uppercase; }
        input[type=text], input[type=email], input[type=url], input[type=number], textarea, select {
            width: 100%;
            background: rgba(255,255,255,0.04);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 11px 14px;
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            outline: none;
            transition: border-color 0.2s;
        }
        input:focus, textarea:focus, select:focus { border-color: var(--accent); }
        textarea { resize: vertical; min-height: 100px; }

        .btn {
            display: inline-flex; align-items: center; gap: 6px;
            padding: 10px 20px;
            border-radius: 10px;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            border: none;
            transition: all 0.2s;
        }
        .btn-primary { background: var(--accent); color: #fff; }
        .btn-primary:hover { background: var(--accent2); }
        .btn-danger { background: rgba(220,38,38,0.15); color: #f87171; border: 1px solid rgba(220,38,38,0.2); }
        .btn-danger:hover { background: rgba(220,38,38,0.25); }
        .btn-ghost { background: rgba(255,255,255,0.04); color: var(--muted); border: 1px solid var(--border); }
        .btn-ghost:hover { color: var(--text); }

        table { width: 100%; border-collapse: collapse; }
        th { font-size: 11px; font-weight: 600; letter-spacing: 0.1em; text-transform: uppercase; color: var(--muted); padding: 8px 12px; text-align: left; border-bottom: 1px solid var(--border); }
        td { padding: 14px 12px; font-size: 14px; border-bottom: 1px solid rgba(255,255,255,0.04); vertical-align: middle; }
        tr:last-child td { border-bottom: none; }
        tr:hover td { background: rgba(255,255,255,0.02); }

        .badge {
            display: inline-flex; align-items: center;
            padding: 3px 10px;
            border-radius: 100px;
            font-size: 11px;
            font-weight: 600;
        }
        .badge-purple { background: rgba(124,106,247,0.15); color: var(--accent2); }

        .toast {
            position: fixed; bottom: 24px; right: 24px;
            background: var(--bg3);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 14px 20px;
            font-size: 14px;
            z-index: 999;
            transform: translateY(80px); opacity: 0;
            transition: all 0.3s;
        }
        .toast.show { transform: translateY(0); opacity: 1; }
        .toast.success { border-color: rgba(52,211,153,0.3); color: #6ee7b7; }
        .toast.error   { border-color: rgba(220,38,38,0.3);  color: #fca5a5; }

        .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
        .grid-3 { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 16px; }
    </style>
    @yield('style')
</head>
<body>

<!-- Sidebar -->
<aside class="sidebar">
    <div class="sidebar-brand">
        dev<span>.</span>admin
        <div class="sidebar-sub">Portfolio Manager</div>
    </div>
    <nav class="sidebar-nav">
        <div class="nav-section-label">Menu</div>
        <a href="/admin/dashboard" class="sidebar-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
            <span class="icon">⊞</span> Dashboard
        </a>
        <a href="/admin/profile" class="sidebar-link {{ request()->is('admin/profile') ? 'active' : '' }}">
            <span class="icon">◉</span> Profile
        </a>
        <a href="/admin/skills" class="sidebar-link {{ request()->is('admin/skills') ? 'active' : '' }}">
            <span class="icon">◈</span> Skills
        </a>
        <a href="/admin/projects" class="sidebar-link {{ request()->is('admin/projects') ? 'active' : '' }}">
            <span class="icon">◧</span> Projects
        </a>
        <div class="nav-section-label" style="margin-top:16px">Lainnya</div>
        <a href="/" target="_blank" class="sidebar-link">
            <span class="icon">↗</span> Lihat Portfolio
        </a>
    </nav>
    <div class="sidebar-footer">
        <div class="user-info">
            <div class="user-avatar">{{ substr(Auth::user()->name ?? 'A', 0, 1) }}</div>
            <div class="user-name">{{ Auth::user()->name ?? 'Admin' }}</div>
        </div>
        <form method="POST" action="/admin/logout">
            @csrf
            <button type="submit" class="logout-btn">⤢ Logout</button>
        </form>
    </div>
</aside>

<!-- Main -->
<main class="main">
    <div class="topbar">
        <h1>@yield('title')</h1>
        <p>@yield('subtitle')</p>
    </div>
    <div class="content">
        @yield('content')
    </div>
</main>

<div class="toast" id="toast"></div>

<script>
const CSRF    = document.querySelector('meta[name="csrf-token"]').content;
const headers = { 'Content-Type':'application/json', 'X-CSRF-TOKEN':CSRF, 'Accept':'application/json' };

function showToast(msg, type='success') {
    const t = document.getElementById('toast');
    t.textContent = msg;
    t.className   = `toast ${type} show`;
    setTimeout(() => t.classList.remove('show'), 3000);
}
</script>
@yield('scripts')
</body>
</html>