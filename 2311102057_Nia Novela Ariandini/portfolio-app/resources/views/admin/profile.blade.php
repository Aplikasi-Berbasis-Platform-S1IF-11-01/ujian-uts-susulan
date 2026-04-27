<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Profile | Nia Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
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
            --line: #f1d6de;
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

        .main {
            flex: 1;
            margin-left: 260px;
            padding: 40px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
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

        .content-card {
            background: #fff;
            border-radius: 20px;
            padding: 30px;
            border: 1px solid #f1f3f5;
            box-shadow: var(--shadow-md);
        }

        .section-head {
            margin-bottom: 24px;
        }

        .section-head h2 {
            margin: 0 0 8px;
            font-size: 1.35rem;
            color: var(--primary-dark);
        }

        .section-head p {
            margin: 0;
            color: var(--text-muted);
            font-size: 0.92rem;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        label {
            font-size: 0.92rem;
            font-weight: 600;
            color: var(--text-main);
        }

        input, textarea {
            width: 100%;
            padding: 12px 14px;
            border-radius: 12px;
            border: 1px solid var(--line);
            font-size: 0.95rem;
            outline: none;
            transition: var(--transition);
        }

        input:focus, textarea:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(231, 138, 169, 0.10);
        }

        textarea {
            min-height: 130px;
            resize: vertical;
        }

        .photo-preview-wrap {
            display: flex;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .photo-preview {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #fff;
            box-shadow: 0 10px 24px rgba(231, 138, 169, 0.12);
            background: #f6f6f6;
        }

        .form-actions {
            margin-top: 24px;
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn-save {
            background: linear-gradient(135deg, #e78aa9, #d16d8d);
            color: white;
            padding: 12px 22px;
            border: none;
            border-radius: 999px;
            cursor: pointer;
            font-weight: 700;
            font-size: 0.95rem;
        }

        .btn-save:hover {
            opacity: 0.95;
        }

        .btn-upload {
            background: #fff5f8;
            color: var(--primary-dark);
            padding: 12px 22px;
            border: 1px solid #f3c9d6;
            border-radius: 999px;
            cursor: pointer;
            font-weight: 700;
            font-size: 0.95rem;
        }

        .notif {
            margin-top: 14px;
            font-size: 0.92rem;
            font-weight: 600;
            color: var(--primary-dark);
        }

        @media (max-width: 992px) {
            .sidebar { width: 80px; padding: 20px 10px; }
            .brand span, .menu-title, .menu a span, .sidebar-footer span { display: none; }
            .main { margin-left: 80px; padding: 20px; }
            .menu a { justify-content: center; padding: 15px; }
            .form-grid { grid-template-columns: 1fr; }
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
    <a href="{{ route('dashboard') }}">
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
                    <h1>Edit Profile</h1>
                    <p>Kelola identitas utama yang tampil pada landing page portfolio.</p>
                </div>

                <div class="user-profile">
                    <div class="user-info">
                        <span>Admin Mode</span>
                    </div>
                    <i class="fas fa-user-shield" style="color: var(--primary);"></i>
                </div>
            </header>

            <section class="content-card">
                <div class="section-head">
                    <h2>Form Profile</h2>
                    <p>Update nama, title, deskripsi, kontak, link, dan foto profile.</p>
                </div>

                <form id="profileForm">
                    @csrf

                    <div class="form-grid">
                        <div class="form-group full">
                            <label>Foto Profile</label>
                            <div class="photo-preview-wrap">
                                <img
                                    id="photoPreview"
                                    class="photo-preview"
                                    src="{{ $profile && $profile->photo ? asset('storage/' . $profile->photo) : asset('images/foto-nia.jpg') }}"
                                    alt="Preview Foto">
                                <input type="file" id="photoInput" name="photo" accept="image/*">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="name" value="{{ $profile->name ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" value="{{ $profile->title ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label>NIM</label>
                            <input type="text" name="nim" value="{{ $profile->nim ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" value="{{ $profile->email ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" value="{{ $profile->phone ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" value="{{ $profile->address ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label>Github</label>
                            <input type="text" name="github" value="{{ $profile->github ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label>Dribbble</label>
                            <input type="text" name="dribbble" value="{{ $profile->dribbble ?? '' }}">
                        </div>

                        <div class="form-group full">
                            <label>Deskripsi</label>
                            <textarea name="description">{{ $profile->description ?? '' }}</textarea>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn-save">Simpan Profile</button>
                    </div>

                    <div id="notifProfile" class="notif"></div>
                </form>
            </section>
        </main>
    </div>

    <script>
    const photoInput = document.getElementById('photoInput');
    const photoPreview = document.getElementById('photoPreview');

    photoInput.addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            photoPreview.src = URL.createObjectURL(file);
        }
    });

    document.getElementById('profileForm').addEventListener('submit', async function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        const notif = document.getElementById('notifProfile');

        notif.innerText = 'Menyimpan...';

        try {
            const response = await fetch("{{ route('admin.profile.update') }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "Accept": "application/json"
                },
                body: formData
            });

            const data = await response.json();

            if (!response.ok) {
                if (data.errors) {
                    const firstError = Object.values(data.errors)[0][0];
                    notif.innerText = firstError;
                } else {
                    notif.innerText = data.message || 'Gagal menyimpan profile!';
                }
                return;
            }

            notif.innerText = data.message || 'Profile berhasil disimpan!';

            if (data.photo_url) {
                photoPreview.src = data.photo_url;
            }
        } catch (error) {
            notif.innerText = 'Terjadi error! Cek console / server.';
            console.error(error);
        }
    });
</script>
</body>
</html>