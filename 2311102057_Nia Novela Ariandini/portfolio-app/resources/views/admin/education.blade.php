<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Education | Nia Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

        * { box-sizing: border-box; font-family: 'Inter', sans-serif; }
        body { margin: 0; background-color: var(--bg-body); color: var(--text-main); overflow-x: hidden; }
        .layout { display: flex; min-height: 100vh; }

        /* --- SIDEBAR (Sama dengan Dashboard) --- */
        .sidebar {
            width: 260px; background: var(--sidebar-bg); border-right: 1px solid #edf2f7;
            padding: 30px 20px; display: flex; flex-direction: column;
            position: fixed; height: 100vh; z-index: 100;
        }
        .brand {
            font-size: 1.4rem; font-weight: 800; color: var(--primary-dark);
            display: flex; align-items: center; gap: 10px; margin-bottom: 40px; padding-left: 10px;
        }
        .menu-title {
            font-size: 0.75rem; font-weight: 700; color: #b2bec3;
            text-transform: uppercase; letter-spacing: 1.2px; margin: 20px 0 15px 10px;
        }
        .menu { display: flex; flex-direction: column; gap: 5px; flex-grow: 1; }
        .menu a {
            text-decoration: none; color: var(--text-muted); padding: 12px 16px;
            border-radius: 10px; font-weight: 500; font-size: 0.95rem;
            display: flex; align-items: center; gap: 12px; transition: var(--transition);
        }
        .menu a i { width: 20px; font-size: 1.1rem; }
        .menu a:hover { background: #fff5f8; color: var(--primary); }
        .menu a.active { background: var(--primary); color: white; box-shadow: 0 4px 12px rgba(231, 138, 169, 0.3); }

        .sidebar-footer { border-top: 1px solid #f1f3f5; padding-top: 20px; display: flex; flex-direction: column; gap: 10px; }

        /* --- MAIN CONTENT --- */
        .main { flex: 1; margin-left: 260px; padding: 40px; }
        .topbar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
        .page-title h1 { font-size: 1.75rem; margin: 0; font-weight: 700; color: #2d3436; }
        .page-title p { margin: 5px 0 0; color: var(--text-muted); font-size: 0.95rem; }

        .btn-add {
            background: linear-gradient(135deg, #e78aa9, #d16d8d); color: white;
            padding: 12px 22px; border: none; border-radius: 999px;
            cursor: pointer; font-weight: 700; font-size: 0.95rem;
            display: flex; align-items: center; gap: 8px; transition: var(--transition);
        }
        .btn-add:hover { opacity: 0.9; transform: translateY(-2px); }

        .content-card { background: #fff; border-radius: 20px; padding: 30px; border: 1px solid #f1f3f5; box-shadow: var(--shadow-md); }
        table { width: 100%; border-collapse: collapse; }
        th { text-align: left; padding: 15px; border-bottom: 2px solid var(--line); color: var(--text-muted); font-size: 0.9rem; }
        td { padding: 15px; border-bottom: 1px solid #f1f3f5; font-size: 0.95rem; }

        .actions { display: flex; gap: 12px; }
        .btn-edit { color: #3498db; cursor: pointer; background: none; border: none; font-size: 1.1rem; transition: 0.2s; }
        .btn-delete { color: #e74c3c; cursor: pointer; background: none; border: none; font-size: 1.1rem; transition: 0.2s; }
        .btn-edit:hover, .btn-delete:hover { transform: scale(1.2); }

        /* --- MODAL --- */
        .modal {
            display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%;
            background: rgba(0,0,0,0.4); backdrop-filter: blur(4px);
        }
        .modal-content {
            background: white; margin: 5% auto; padding: 30px; border-radius: 20px;
            width: 500px; box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        .form-group { display: flex; flex-direction: column; gap: 8px; margin-bottom: 15px; }
        label { font-size: 0.92rem; font-weight: 600; }
        input, textarea {
            width: 100%; padding: 12px 14px; border-radius: 12px;
            border: 1px solid var(--line); font-size: 0.95rem; outline: none;
        }
        textarea { min-height: 100px; resize: vertical; }

        .btn-outline {
            padding: 10px; border: 1px solid #edf2f7; border-radius: 10px;
            text-align: center; text-decoration: none; color: var(--text-muted);
            font-size: 0.85rem; font-weight: 600; transition: var(--transition);
        }
        .btn-logout {
            background: #fff; border: 1px solid #ffe3ec; color: #e74c3c;
            padding: 10px; border-radius: 10px; width: 100%; cursor: pointer;
            font-weight: 600; display: flex; align-items: center; justify-content: center; gap: 8px;
        }

        @media (max-width: 992px) {
            .sidebar { width: 80px; padding: 20px 10px; }
            .brand span, .menu-title, .menu a span, .sidebar-footer span { display: none; }
            .main { margin-left: 80px; padding: 20px; }
        }
    </style>
</head>
<body>
    <div class="layout">
        <aside class="sidebar">
            <div class="brand"><i class="fas fa-gem"></i> <span>Nia Admin</span></div>
            <div class="menu-title">Main Menu</div>
            <nav class="menu">
                <a href="{{ route('dashboard') }}"><i class="fas fa-home"></i> <span>Dashboard</span></a>
                <a href="{{ route('admin.profile') }}" class="{{ request()->routeIs('admin.profile') ? 'active' : '' }}"><i class="fas fa-user-circle"></i> <span>Profile</span></a>
                <a href="{{ route('admin.education') }}" class="{{ request()->routeIs('admin.education') ? 'active' : '' }}"><i class="fas fa-graduation-cap"></i> <span>Education</span></a>
                <a href="#"><i class="fas fa-tools"></i> <span>Skills</span></a>
                <a href="#"><i class="fas fa-briefcase"></i> <span>Portfolio</span></a>
                <a href="#"><i class="fas fa-history"></i> <span>Experience</span></a>
                <a href="#"><i class="fas fa-envelope"></i> <span>Contact</span></a>
            </nav>
            <div class="sidebar-footer">
                <a href="{{ url('/') }}" class="btn-outline"><i class="fas fa-external-link-alt"></i> <span>Landing Page</span></a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn-logout"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></button>
                </form>
            </div>
        </aside>

        <main class="main">
            <header class="topbar">
                <div class="page-title">
                    <h1>Education</h1>
                    <p>Kelola riwayat pendidikan kamu di sini.</p>
                </div>
                <button class="btn-add" onclick="openModal('add')">
                    <i class="fas fa-plus"></i> Tambah Data
                </button>
            </header>

            <section class="content-card">
                <table>
                    <thead>
                        <tr>
                            <th>Institusi</th>
                            <th>Gelar/Jurusan</th>
                            <th>Periode</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($education as $item)
                        <tr>
                            <td><strong>{{ $item->institution }}</strong></td>
                            <td>{{ $item->degree }}</td>
                            <td>{{ $item->period }}</td>
                            <td class="actions">
                                <button class="btn-edit" onclick="handleEdit(this)" data-edu='@json($item)'>
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-delete" onclick="handleDelete(this)" data-id="{{ $item->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </main>
    </div>

    <div id="eduModal" class="modal">
        <div class="modal-content">
            <h2 id="modalTitle" style="color: var(--primary-dark); margin-top:0; margin-bottom: 20px;">Tambah Pendidikan</h2>
            <form id="eduForm">
                @csrf
                <input type="hidden" id="eduId" name="id">
                <div class="form-group">
                    <label>Institusi</label>
                    <input type="text" name="institution" id="institution" required placeholder="Nama Kampus/Sekolah">
                </div>
                <div class="form-group">
                    <label>Gelar / Jurusan</label>
                    <input type="text" name="degree" id="degree" required placeholder="Contoh: S1 Informatika">
                </div>
                <div class="form-group">
                    <label>Periode</label>
                    <input type="text" name="period" id="period" required placeholder="Contoh: 2022 - Sekarang">
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="description" id="description" placeholder="Ceritakan pengalaman singkat..."></textarea>
                </div>
                <div style="display:flex; gap:10px; margin-top:20px;">
                    <button type="submit" class="btn-add" style="flex:1; justify-content:center;">Simpan Data</button>
                    <button type="button" onclick="closeModal()" class="btn-add" style="background:#dfe6e9; color:#636e72; flex:1; justify-content:center;">Batal</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const modal = document.getElementById('eduModal');
        const form = document.getElementById('eduForm');

        function openModal(mode, data = null) {
            modal.style.display = 'block';
            if(mode === 'edit' && data) {
                document.getElementById('modalTitle').innerText = 'Edit Pendidikan';
                document.getElementById('eduId').value = data.id;
                document.getElementById('institution').value = data.institution;
                document.getElementById('degree').value = data.degree;
                document.getElementById('period').value = data.period;
                document.getElementById('description').value = data.description || '';
            } else {
                document.getElementById('modalTitle').innerText = 'Tambah Pendidikan';
                form.reset();
                document.getElementById('eduId').value = '';
            }
        }

        function closeModal() { modal.style.display = 'none'; }

        function handleEdit(button) {
            const data = JSON.parse(button.getAttribute('data-edu'));
            openModal('edit', data);
        }

        form.addEventListener('submit', async function(e) {
            e.preventDefault();
            const id = document.getElementById('eduId').value;
            const url = id ? `/admin/education/${id}/update` : "{{ route('admin.education.store') }}";
            const formData = new FormData(this);

            try {
                const response = await fetch(url, {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}", 'Accept': 'application/json' },
                    body: formData
                });
                const data = await response.json();
                if(data.success) {
                    Swal.fire('Berhasil!', data.message, 'success').then(() => location.reload());
                }
            } catch (error) {
                Swal.fire('Error', 'Gagal menyimpan data', 'error');
            }
        });

        async function handleDelete(button) {
            const id = button.getAttribute('data-id');
            const result = await Swal.fire({
                title: 'Yakin hapus?',
                text: "Data ini akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e78aa9',
                confirmButtonText: 'Ya, Hapus!'
            });

            if (result.isConfirmed) {
                try {
                    const response = await fetch(`/admin/education/${id}/delete`, {
                        method: 'DELETE',
                        headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}", 'Accept': 'application/json' }
                    });
                    const data = await response.json();
                    if(data.success) {
                        Swal.fire('Terhapus!', data.message, 'success').then(() => location.reload());
                    }
                } catch (error) {
                    Swal.fire('Error', 'Gagal menghapus data', 'error');
                }
            }
        }

        window.onclick = function(event) {
            if (event.target == modal) closeModal();
        }
    </script>
</body>
</html>