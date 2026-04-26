<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Web Portofolio</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header class="navbar">
        <div class="brand" id="brandName">My Portfolio</div>
        <nav>
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#skills">Skills</a>
            <a href="#projects">Projects</a>
            <a href="#contact">Contact</a>
            <a href="/admin" class="nav-button">Admin</a>
        </nav>
    </header>

    <main>
        <section class="hero" id="home">
            <div class="hero-text">
                <span class="badge">Personal Portfolio</span>
                <h1 id="profileName">Memuat data...</h1>
                <h3 id="profileRole"></h3>
                <p id="profileDescription"></p>
                <div class="hero-actions">
                    <a href="#projects" class="primary-button">Lihat Project</a>
                    <a href="#contact" class="secondary-button">Hubungi Saya</a>
                </div>
            </div>
            <div class="hero-photo-wrap">
                <img id="profilePhoto" class="hero-photo" src="/images/profile.svg" alt="Foto Profil">
            </div>
        </section>

        <section class="section" id="about">
            <h2>Data Diri</h2>
            <div class="info-grid">
                <div class="info-card"><b>NIM</b><span id="profileNim"></span></div>
                <div class="info-card"><b>Email</b><span id="profileEmail"></span></div>
                <div class="info-card"><b>Telepon</b><span id="profilePhone"></span></div>
                <div class="info-card"><b>Alamat</b><span id="profileAddress"></span></div>
            </div>
        </section>

        <section class="section" id="skills">
            <h2>Skills</h2>
            <div id="skillList" class="skill-list"></div>
        </section>

        <section class="section" id="projects">
            <h2>Portfolio Project</h2>
            <div id="projectList" class="project-grid"></div>
        </section>

        <section class="section contact" id="contact">
            <h2>Contact</h2>
            <p>Data kontak diambil otomatis dari backend melalui AJAX.</p>
            <a id="emailButton" href="#" class="primary-button">Kirim Email</a>
        </section>
    </main>

    <footer>
        <p>© 2026 Web Portofolio AJAX Laravel</p>
    </footer>

    <script src="/js/portfolio.js"></script>
</body>
</html>
