<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Nia Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --bg-body: #f8f9fa;
            --sidebar-bg: #ffffff;
            --primary: #e78aa9;
            --primary-dark: #d16d8d;
            --text-main: #2d3436;
            --text-muted: #636e72;
            --white: #ffffff;
            --shadow-sm: 0 2px 4px rgba(0,0,0,0.02);
            --shadow-md: 0 4px 12px rgba(231, 138, 169, 0.08);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            margin: 0;
            background-color: var(--bg-body);
            color: var(--text-main);
            overflow-x: hidden;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* --- SIDEBAR --- */
        .sidebar {
            width: 260px;
            background: var(--sidebar-bg);
            border-right: 1px solid #edf2f7;
            padding: 30px 20px;
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
            z-index: 100;
        }

        .brand {
            font-size: 1.4rem;
            font-weight: 800;
            color: var(--primary-dark);
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 40px;
            padding-left: 10px;
        }

        .menu-title {
            font-size: 0.75rem;
            font-weight: 700;
            color: #b2bec3;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            margin: 20px 0 15px 10px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 5px;
            flex-grow: 1;
        }

        .menu a {
            text-decoration: none;
            color: var(--text-muted);
            padding: 12px 16px;
            border-radius: 10px;
            font-weight: 500;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: var(--transition);
        }

        .menu a i {
            width: 20px;
            font-size: 1.1rem;
        }

        .menu a:hover {
            background: #fff5f8;
            color: var(--primary);
        }

        .menu a.active {
            background: var(--primary);
            color: white;
            box-shadow: 0 4px 12px rgba(231, 138, 169, 0.3);
        }

        .sidebar-footer {
            border-top: 1px solid #f1f3f5;
            padding-top: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        /* --- MAIN CONTENT --- */
        .main {
            flex: 1;
            margin-left: 260px;
            padding: 40px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        .page-title h1 {
            font-size: 1.75rem;
            margin: 0;
            font-weight: 700;
            color: #2d3436;
        }

        .page-title p {
            margin: 5px 0 0;
            color: var(--text-muted);
            font-size: 0.95rem;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 15px;
            background: white;
            padding: 8px 15px;
            border-radius: 50px;
            border: 1px solid #edf2f7;
            box-shadow: var(--shadow-sm);
        }

        .user-info span {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
        }

        /* --- CARDS GRID --- */
        .cards {
            display: grid;
            /* Mengatur grid agar lebih rapi dan seimbang */
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }

        .card {
            background: var(--white);
            border-radius: 20px;
            padding: 25px;
            border: 1px solid #f1f3f5;
            transition: var(--transition);
            display: flex;
            flex-direction: column;
            position: relative;
            overflow: hidden;
            /* Memastikan tinggi card seragam */
            height: 100%;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(231, 138, 169, 0.1);
            border-color: var(--primary);
        }

        .card-icon {
            width: 45px;
            height: 45px;
            background: #fff5f8;
            color: var(--primary);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            margin-bottom: 15px;
        }

        .card h3 {
            margin: 0 0 10px;
            font-size: 1.15rem;
            color: var(--text-main);
        }

        .card p {
            color: var(--text-muted);
            font-size: 0.88rem;
            line-height: 1.5;
            margin-bottom: 20px;
            flex-grow: 1;
        }

        .card-link {
            text-decoration: none;
            color: var(--primary-dark);
            font-weight: 600;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: gap 0.2s;
        }

        .card-link:hover {
            gap: 12px;
        }

        /* --- BUTTONS --- */
        .btn-outline {
            padding: 10px;
            border: 1px solid #edf2f7;
            border-radius: 10px;
            text-align: center;
            text-decoration: none;
            color: var(--text-muted);
            font-size: 0.85rem;
            font-weight: 600;
            transition: var(--transition);
        }

        .btn-outline:hover {
            background: #f8f9fa;
            color: var(--text-main);
        }

        .btn-logout {
            background: #fff;
            border: 1px solid #ffe3ec;
            color: #e74c3c;
            padding: 10px;
            border-radius: 10px;
            width: 100%;
            cursor: pointer;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: var(--transition);
        }

        .btn-logout:hover {
            background: #fff5f5;
            border-color: #fab1a0;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .sidebar { width: 80px; padding: 20px 10px; }
            .brand span, .menu-title, .menu a span, .sidebar-footer span { display: none; }
            .main { margin-left: 80px; padding: 20px; }
            .menu a { justify-content: center; padding: 15px; }
        }
    </style>
</head>
<body>
    <div class="layout">
        <aside class="sidebar">
            <div class="brand">
                <i class="fas fa-gem"></i>
                <span>Nia Admin</span>
            </div>

            <div class="menu-title">Main Menu</div>
            <nav class="menu">
                <a href="{{ route('dashboard') }}" class="active">
                    <i class="fas fa-home"></i> <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.profile') }}" class="{{ request()->routeIs('admin.profile') ? 'active' : '' }}">
        <i class="fas fa-user-circle"></i> <span>Profile</span>
    </a>
    <a href="{{ route('admin.education') }}" class="{{ request()->routeIs('admin.education') ? 'active' : '' }}">
        <i class="fas fa-graduation-cap"></i> <span>Education</span>
    </a>
    <a href="#"><i class="fas fa-tools"></i> <span>Skills</span></a>
    <a href="#"><i class="fas fa-briefcase"></i> <span>Portfolio</span></a>
    <a href="#"><i class="fas fa-history"></i> <span>Experience</span></a>
    <a href="#"><i class="fas fa-envelope"></i> <span>Contact</span></a>
</nav>

            <div class="sidebar-footer">
                <a href="{{ url('/') }}" class="btn-outline">
                    <i class="fas fa-external-link-alt"></i> <span>Landing Page</span>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn-logout">
                        <i class="fas fa-sign-out-alt"></i> <span>Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <main class="main">
            <header class="topbar">
                <div class="page-title">
                    <h1>Selamat Datang, Nia!</h1>
                    <p>Kelola konten portfolio kamu dalam satu tempat.</p>
                </div>

                <div class="user-profile">
                    <div class="user-info">
                        <span>Admin Mode</span>
                    </div>
                    <i class="fas fa-user-shield" style="color: var(--primary);"></i>
                </div>
            </header>

            <div class="cards">
                <div class="card">
                    <div class="card-icon"><i class="fas fa-id-card"></i></div>
                    <h3>Profile</h3>
                    <p>Ubah identitas diri, foto profil, dan tagline utama pada website Anda.</p>
                    <a href="{{ route('admin.profile') }}" class="card-link">Kelola Profile <i class="fas fa-arrow-right"></i></a>
                </div>

                <div class="card">
                    <div class="card-icon"><i class="fas fa-university"></i></div>
                    <h3>Education</h3>
                    <p>Atur riwayat pendidikan formal maupun informal yang telah Anda selesaikan.</p>
                    <a href="#" class="card-link">Kelola Education <i class="fas fa-arrow-right"></i></a>
                </div>

                <div class="card">
                    <div class="card-icon"><i class="fas fa-bolt"></i></div>
                    <h3>Skills</h3>
                    <p>Update daftar keahlian teknis dan software yang Anda kuasai saat ini.</p>
                    <a href="#" class="card-link">Kelola Skills <i class="fas fa-arrow-right"></i></a>
                </div>

                <div class="card">
                    <div class="card-icon"><i class="fas fa-project-diagram"></i></div>
                    <h3>Portfolio</h3>
                    <p>Dokumentasikan proyek-proyek terbaik Anda lengkap dengan deskripsi dan link.</p>
                    <a href="#" class="card-link">Kelola Portfolio <i class="fas fa-arrow-right"></i></a>
                </div>

                <div class="card">
                    <div class="card-icon"><i class="fas fa-business-time"></i></div>
                    <h3>Experience</h3>
                    <p>Tambahkan pengalaman kerja, magang, atau organisasi untuk memperkuat profil.</p>
                    <a href="#" class="card-link">Kelola Experience <i class="fas fa-arrow-right"></i></a>
                </div>

                <div class="card">
                    <div class="card-icon"><i class="fas fa-address-book"></i></div>
                    <h3>Contact</h3>
                    <p>Perbarui informasi kontak dan tautan media sosial agar mudah dihubungi.</p>
                    <a href="#" class="card-link">Kelola Contact <i class="fas fa-arrow-right"></i></a>
                </div>
            </div> </main>
    </div>
</body>
</html>