<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body class="admin-body">
    <header class="navbar">
        <div class="brand">Dashboard Admin</div>
        <nav>
            <a href="/">Landing Page</a>
        </nav>
    </header>

    <main class="admin-container">
        <section class="admin-card">
            <h2>Edit Data Diri</h2>
            <form id="profileForm">
                <input name="name" placeholder="Nama lengkap" required>
                <input name="nim" placeholder="NIM">
                <input name="role" placeholder="Role / Bidang">
                <textarea name="description" placeholder="Deskripsi singkat"></textarea>
                <input name="email" placeholder="Email">
                <input name="phone" placeholder="No HP">
                <input name="address" placeholder="Alamat">
                <input name="photo" placeholder="Path foto, contoh: /images/profile.svg">
                <button type="submit">Simpan Profil</button>
            </form>
        </section>

        <section class="admin-card">
            <h2>Kelola Skill</h2>
            <form id="skillForm">
                <input type="hidden" name="id">
                <input name="name" placeholder="Nama skill" required>
                <input name="level" type="number" min="1" max="100" placeholder="Level 1-100" required>
                <button type="submit">Simpan Skill</button>
            </form>
            <div id="adminSkillList" class="admin-list"></div>
        </section>

        <section class="admin-card">
            <h2>Kelola Project</h2>
            <form id="projectForm">
                <input type="hidden" name="id">
                <input name="title" placeholder="Judul project" required>
                <textarea name="description" placeholder="Deskripsi project"></textarea>
                <input name="link" placeholder="Link project">
                <button type="submit">Simpan Project</button>
            </form>
            <div id="adminProjectList" class="admin-list"></div>
        </section>
    </main>

    <script src="/js/admin.js"></script>
</body>
</html>
