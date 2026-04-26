<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shasya's Portofolio</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #FFE8BE;
        }

         .maroon {
        background: #4a0000;
    }

    .card-dark {
        background: #2a0000;
        border: 1px solid #5a0000;
        border-radius: 16px;
    }

    .fade-in {
        animation: fadeIn 1s ease-in;
    }

    @keyframes fadeIn {
        from {opacity: 0; transform: translateY(20px);}
        to {opacity: 1; transform: translateY(0);}
    }

    .btn-maroon {
        background: #6b0000;
        color: white;
        border-radius: 10px;
        padding: 8px 16px;
        transition: 0.3s;
    }
    

    .btn-maroon:hover {
        background: #8b0000;
    }

        .navbar {
            background-color: #800000 !important;
            position: sticky;
            top: 0;
            z-index: 999;
            backdrop-filter: blur(10px);
        }

        .hero-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.08);
            animation: fadeIn 1s ease;
        }

        .text-maroon {
            color: #800000;
        }

        /* FOTO PROFILE */
        .profile-img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #800000;
            margin-bottom: 15px;
        }

        /* CARD */
        .card-skill {
            background: white;
            border-radius: 12px;
            transition: 0.3s;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            opacity: 0;
            transform: translateY(20px);
            animation: fadeUp 0.6s forwards;
        }

        .card-skill:hover {
            transform: translateY(-5px);
        }

        .exp-card {
            background: white;
            border-left: 5px solid #800000;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            opacity: 0;
            transform: translateY(20px);
            animation: fadeUp 0.6s forwards;
        }

        /* ANIMASI */
        @keyframes fadeIn {
            from {opacity: 0;}
            to {opacity: 1;}
        }

        @keyframes fadeUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        section {
            scroll-margin-top: 80px;
        }

        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg px-4 py-3"
     style="background:#1a0000; box-shadow:0 10px 30px rgba(0,0,0,0.3);">

    <!-- LOGO -->
    <a class="navbar-brand text-white fw-bold" href="#">
        Shasya<span style="color: #FFE8BE;">.dev</span>
    </a>

    <!-- MENU -->
    <div class="mx-auto d-none d-lg-flex gap-4">
        <a href="#home" class="text-white text-decoration-none">Home</a>
        <a href="#skills" class="text-white text-decoration-none">Skills</a>
        <a href="#experience" class="text-white text-decoration-none">Experience</a>
    </div>

    <div class="dropdown">

    <!-- BUTTON TRIGGER -->
    <button class="btn text-white px-4 py-2 dropdown-toggle"
        style="background: #FFE8BE);
               border-radius:999px;"
        data-bs-toggle="dropdown">

        Dashboard
    </button>

    <!-- DROPDOWN FORM -->
    <div class="dropdown-menu dropdown-menu-end p-4"
         style="min-width:280px; border-radius:12px;">

        <!-- LOGIN FORM -->
        <form method="POST" action="/login">
            @csrf

            <input type="email"
                   name="email"
                   class="form-control mb-2"
                   placeholder="Email"
                   required>

            <input type="password"
                   name="password"
                   class="form-control mb-2"
                   placeholder="Password"
                   required>

            <button type="submit"
                    class="btn w-100 text-white"
                    style="background:#6b0000;">
                Login
            </button>
        </form>

        <hr>

        <!-- LINKS -->
        <div class="d-flex justify-content-between small">

            <a href="/forgot-password" class="text-decoration-none text-danger">
                Forgot?
            </a>

            <a href="/register" class="text-decoration-none text-danger">
                Register
            </a>

        </div>

    </div>
</div>



</nav>

<body>


<!-- HERO -->
<section id="home" class="vh-100 d-flex align-items-center justify-content-center text-center">

    <div class="hero-card p-5" style="min-width:350px;">

        <!-- LOADING -->
        <div id="loading">
            <div class="spinner-border text-maroon"></div>
            <p class="mt-2 text-muted">Loading profile...</p>
        </div>

        <!-- CONTENT -->
        <div id="content" style="display:none;">

            <!-- FOTO -->
            <img id="photo" class="profile-img" src="/img/profile.jpg">

            <h1 id="name" class="fw-bold text-maroon"></h1>
            <p id="desc" class="text-muted"></p>

        </div>

    </div>

</section>

<!-- SKILLS -->
<section id="skills" class="container py-5">
    <h2 class="text-center mb-4 text-maroon">Skills</h2>
    <div class="row" id="skillContainer"></div>
</section>

<!-- EXPERIENCE -->
<section id="experience" class="container py-5">
    <h2 class="text-center mb-4 text-maroon">Experience</h2>
    <div id="expContainer"></div>
</section>

<section id="education" class="container py-5">
    <h2 class="text-center mb-4 text-maroon">Education</h2>
    <div id="eduContainer"></div>
</section>

<!-- ================= JS ================= -->
<script>

// PROFILE
fetch('/api/profile')
.then(res => res.json())
.then(data => {

    if (!data) return;

    document.getElementById('name').innerText = data.name ?? '-';
    document.getElementById('desc').innerText = data.description ?? '-';

    // FOTO (kalau ada)
    if (data.photo) {
        document.getElementById('photo').src = '/storage/' + data.photo;
    }

    document.getElementById('loading').style.display = 'none';
    document.getElementById('content').style.display = 'block';

});


// SKILLS
function loadSkills() {
    fetch('/api/skills')
    .then(res => res.json())
    .then(data => {

        let html = '';

        if (data.length === 0) {
            html = "<p class='text-center text-muted'>Belum ada skill</p>";
        }

        data.forEach((s, i) => {
            html += `
            <div class="col-md-3 mb-3">
                <div class="card-skill p-3 text-center" style="animation-delay:${i*0.1}s">
                    <h5 class="text-maroon">${s.name}</h5>
                    <small class="text-muted">${s.level}</small>
                </div>
            </div>`;
        });

        document.getElementById('skillContainer').innerHTML = html;
    });
}


// EXPERIENCE
function loadExp() {
    fetch('/api/experiences')
    .then(res => res.json())
    .then(data => {

        let html = '';

        if (data.length === 0) {
            html = "<p class='text-center text-muted'>Belum ada experience</p>";
        }

        data.forEach((e, i) => {
            html += `
            <div class="exp-card p-3 mb-3" style="animation-delay:${i*0.1}s">
                <h5 class="text-maroon">${e.position}</h5>
                <p class="mb-1">${e.company}</p>
                <small class="text-muted">${e.year}</small>
            </div>`;
        });

        document.getElementById('expContainer').innerHTML = html;
    });
}

function loadEdu() {
    fetch('/api/educations')
    .then(res => res.json())
    .then(data => {

        let html = '';

        if (data.length === 0) {
            html = "<p class='text-center text-muted'>Belum ada pendidikan</p>";
        }

        data.forEach(e => {
            html += `
            <div class="exp-card p-3 mb-3">
                <h5 class="text-maroon">${e.school}</h5>
                <p class="mb-1">${e.major}</p>
                <small class="text-muted">${e.year}</small>
            </div>`;
        });

        document.getElementById('eduContainer').innerHTML = html;
    });
}

loadEdu();


// INIT
loadSkills();
loadExp();

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>