<h1 align="center">LAPORAN PRAKTIKUM</h1>
<h1 align="center">APLIKASI BERBASIS PLATFORM</h1>

<br>

<h2 align="center">UJIAN-UTS</h2>
<h2 align="center">WEB PORTOFOLIO</h2>

<br><br>

<p align="center">
  <img src="asset/logo.png" width="300">
</p>

<br><br>

<h2 align="center">Disusun Oleh :</h2>

<p align="center" style="font-size:28px;">
  <b>Imelda Fajar</b><br>
  <b>2311102004</b><br>
  <b>SI IF 11 REG 01</b>
</p>

<br>

<h2 align="center">Dosen Pengampu :</h2>

<p align="center" style="font-size:28px;">
  <b>Dimas Fanny Hebrasianto Permadi, S.ST., M.Kom</b>
</p>

<br>

<h2 align="center">Asisten Praktikum :</h2>

<p align="center" style="font-size:28px;">
  <b>Apri Pandu Wicaksono</b><br> 
  <b>Rangga Pradarrell Fathi</b>
</p>

<br>

<h1 align="center">LABORATORIUM HIGH PERFORMANCE</h1>
<h1 align="center">FAKULTAS INFORMATIKA</h1>
<h1 align="center">UNIVERSITAS TELKOM PURWOKERTO</h1>
<h1 align="center">TAHUN 2026</h1>

<hr>

## DASAR TEORI

Laravel merupakan framework PHP modern yang menggunakan arsitektur MVC (Model-View-Controller) untuk membangun aplikasi web secara terstruktur dan efisien. Dengan konsep ini, pengelolaan kode menjadi lebih rapi karena setiap bagian aplikasi memiliki tanggung jawab masing-masing, seperti pengolahan data, tampilan, dan logika program.

Pada project web profile ini, Laravel digunakan sebagai backend untuk mengelola data seperti informasi diri, daftar skill, dan project. Data tersebut disimpan di dalam database dan diakses melalui Model, kemudian diproses oleh Controller sebelum ditampilkan ke pengguna melalui View.

Selain itu, project ini memanfaatkan API (Application Programming Interface) yang dibuat menggunakan Laravel. API berfungsi sebagai penghubung antara backend dan frontend, sehingga data profile, skill, dan project tidak ditampilkan secara langsung, melainkan diambil terlebih dahulu dari server.

Untuk meningkatkan interaktivitas, digunakan teknologi AJAX (Asynchronous JavaScript and XML) dalam pengambilan data. Dengan AJAX, halaman web dapat menampilkan atau memperbarui data tanpa perlu melakukan reload halaman. Hal ini membuat website profile menjadi lebih dinamis dan memberikan pengalaman pengguna yang lebih baik.

Laravel juga menyediakan fitur migration dan seeder yang digunakan untuk mengatur struktur database serta mengisi data awal. Fitur ini membantu dalam proses pengembangan karena memudahkan pembuatan tabel dan pengelolaan data secara sistematis.

Dengan kombinasi Laravel, API, dan AJAX, web profile yang dibuat mampu menampilkan informasi secara dinamis serta menyediakan dashboard admin untuk mengelola konten seperti deskripsi, foto profile, skill, dan project. Hal ini menjadikan aplikasi lebih fleksibel dan mudah dikembangkan di masa depan.


## SOURCE CODE

Source code untuk pengerjaan project PORTOFOLIO secara lengkap dapat dilihat pada repositori dan folder proyek aplikasi ini, khususnya berada di dalam folder /portfolio.

### login.blade.php

```

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

```
### home.blade.php

```

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

```

### admin.blade.php

```

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

```

## OUTPUT

### Login

<p align="center">
  <img src="asset/login.png" width="800">
</p>

### Landing Page

<p align="center">
  <img src="asset/landing-page1.png" width="800">
</p>

<p align="center">
  <img src="asset/landing-page2.png" width="800">
</p>

<p align="center">
  <img src="asset/landing-page3.png" width="800">
</p>

### Admin

<p align="center">
  <img src="asset/admin1.png" width="800">
</p>

<p align="center">
  <img src="asset/admin2.png" width="800">
</p>

<p align="center">
  <img src="asset/admin3.png" width="800">
</p>


## PENJELASAN SOURCE CODE

### 1. login.blade.php

File 'login.blade.php' digunakan sebagai halaman login admin sebelum masuk ke dashboard. Pada halaman ini terdapat form login yang berisi input email dan password. Form tersebut menggunakan method 'POST' dan diarahkan ke route '/login'.

Bagian @csrf digunakan sebagai keamanan bawaan Laravel agar form terlindungi dari serangan CSRF. Jika login gagal, sistem akan menampilkan pesan error melalui 'session('error')'.

Tampilan halaman login dibuat langsung menggunakan CSS internal. Desainnya menggunakan warna dominan pink muda, card login di tengah halaman, serta tombol login yang disesuaikan dengan tema web portfolio. Terdapat juga tombol Kembali ke Portfolio yang mengarahkan pengguna kembali ke halaman utama.

### 2. home.blade.php

File 'home.blade.php' merupakan halaman utama atau landing page dari web portfolio. Halaman ini menampilkan informasi pribadi, data diri, skill, project, dan kontak.

Pada bagian awal terdapat navbar yang berisi menu navigasi seperti Home, About, Skills, Projects, Contact, dan Admin. Bagian hero digunakan untuk menampilkan nama, role, deskripsi, dan foto profil.

Data pada halaman ini tidak ditulis langsung secara statis, tetapi ditampilkan menggunakan elemen dengan 'id', seperti:

```

<h1 id="profileName">Memuat data...</h1>
<h3 id="profileRole"></h3>
<p id="profileDescription"></p>

```

ID tersebut nantinya akan diisi secara otomatis melalui file JavaScript portfolio.js dengan mengambil data dari backend menggunakan AJAX/API.

Selain itu, terdapat bagian:

'profileNim' untuk menampilkan NIM
'profileEmail' untuk menampilkan email
'profilePhone' untuk menampilkan nomor telepon
'profileAddress' untuk menampilkan alamat
'skillList' untuk menampilkan daftar skill
'projectList' untuk menampilkan daftar project

Dengan cara ini, halaman portfolio menjadi lebih dinamis karena data dapat berubah sesuai data yang dikelola dari dashboard admin.

### 3. admin.blade.php

File 'admin.blade.php' digunakan sebagai halaman dashboard admin. Halaman ini berfungsi untuk mengelola seluruh konten yang tampil pada landing page.

Pada halaman admin terdapat tiga bagian utama, yaitu:

#### a. Edit Data Diri

Bagian ini digunakan untuk mengubah informasi profil seperti:

nama lengkap
NIM
role atau bidang
deskripsi singkat
email
nomor HP
alamat
path foto profil

Form ini memiliki 'id="profileForm"', sehingga proses penyimpanan datanya dilakukan melalui JavaScript pada file 'admin.js'.

#### b. Kelola Skill

Bagian ini digunakan untuk menambah dan mengedit skill. Form skill memiliki input nama skill dan level skill dari 1 sampai 100. Data skill yang sudah tersimpan akan ditampilkan pada elemen:

```

<div id="adminSkillList" class="admin-list"></div>

```
Elemen tersebut akan diisi secara otomatis melalui AJAX.

##### c. Kelola Project

Bagian ini digunakan untuk menambah dan mengedit data project. Form project memiliki input judul project, deskripsi project, dan link project. Daftar project yang sudah dibuat akan ditampilkan pada:

```
<div id="adminProjectList" class="admin-list"></div>

```

Sama seperti skill, data project juga dikelola menggunakan JavaScript dan API Laravel.

#### d. Penggunaan AJAX

Pada project ini, data tidak ditampilkan langsung dari file Blade, tetapi diambil dari backend menggunakan JavaScript. File portfolio.js digunakan untuk menampilkan data pada landing page, sedangkan admin.js digunakan untuk mengelola data pada dashboard admin.

Dengan AJAX, halaman tidak perlu melakukan reload ketika mengambil atau memperbarui data. Hal ini membuat web portfolio menjadi lebih interaktif dan sesuai dengan konsep aplikasi dinamis.


## Kesimpulan

Secara keseluruhan, source code project ini terbagi menjadi tiga tampilan utama, yaitu halaman login, landing page, dan dashboard admin. Halaman login digunakan untuk akses admin, halaman landing page digunakan untuk menampilkan data portfolio, sedangkan dashboard admin digunakan untuk mengelola data diri, skill, dan project.

Project ini menerapkan konsep Laravel Blade sebagai tampilan, JavaScript sebagai penghubung AJAX, dan API Laravel sebagai backend untuk mengelola data secara dinamis.
