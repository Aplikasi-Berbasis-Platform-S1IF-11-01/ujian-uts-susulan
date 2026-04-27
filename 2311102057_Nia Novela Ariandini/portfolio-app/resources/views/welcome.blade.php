<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Website Profile | Nia Novela Ariandini</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">        rel="stylesheet">

    <style>
        :root {
            --bg: #fffafb;
            --bg-soft: #fff5f8;
            --card: rgba(255, 255, 255, 0.96);
            --line: #f2dfe6;
            --pink: #e78aa9;
            --pink-dark: #c96f8d;
            --pink-soft: #fdeef3;
            --text: #5b4d54;
            --text-soft: #7b6c73;
            --shadow: 0 14px 34px rgba(209, 126, 154, 0.09);
            --shadow-hover: 0 18px 38px rgba(209, 126, 154, 0.14);
            --radius-xl: 28px;
            --radius-lg: 22px;
            --radius-md: 16px;
            --nav-h: 74px;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 90px;
        }

        body {
            font-family: 'Inter', sans-serif;
            background:
                radial-gradient(circle at top left, rgba(250, 215, 226, 0.25), transparent 26%),
                radial-gradient(circle at bottom right, rgba(252, 232, 239, 0.48), transparent 28%),
                linear-gradient(180deg, #fff9fb 0%, #ffffff 100%);
            color: var(--text);
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
        }

        .container {
            position: relative;
            z-index: 2;
        }

        .navbar {
            min-height: var(--nav-h);
            background: rgba(255, 255, 255, 0.86) !important;
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.04);
            border-bottom: 1px solid rgba(244, 221, 229, 0.65);
        }

        .navbar-brand {
            color: var(--pink-dark) !important;
            font-weight: 700;
            font-size: 1.42rem;
            letter-spacing: 0.2px;
        }

        .navbar-toggler {
            border: none;
            box-shadow: none !important;
        }

        .nav-link {
            color: var(--text) !important;
            font-size: 0.92rem;
            font-weight: 500;
            padding: 10px 12px !important;
            transition: 0.25s ease;
        }

        .nav-link:hover,
        .nav-link.active-link {
            color: var(--pink-dark) !important;
        }

        section {
            position: relative;
            padding-top: 70px;
            padding-bottom: 40px;
        }

        .section-subtitle {
            margin: 0 auto 24px;
        }

        .section-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--pink-dark);
            text-align: center;
            margin-bottom: 10px;
        }

        .section-subtitle {
            max-width: 680px;
            margin: 0 auto 30px;
            text-align: center;
            color: var(--text-soft);
            font-size: 0.95rem;
            line-height: 1.85;
        }

        .decor-dot {
            position: absolute;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(231, 138, 169, 0.12) 0%, rgba(231, 138, 169, 0.05) 55%, rgba(231, 138, 169, 0) 100%);
            filter: blur(1px);
            z-index: 1;
            pointer-events: none;
        }

        .decor-dot.one {
            width: 72px;
            height: 72px;
            top: 52px;
            left: 2%;
            opacity: 0.55;
        }

        .decor-dot.two {
            width: 54px;
            height: 54px;
            top: 88px;
            right: 6%;
            opacity: 0.45;
        }

        .decor-dot.three {
            width: 64px;
            height: 64px;
            top: 40px;
            left: 8%;
            opacity: 0.45;
        }

        .decor-dot.four {
            width: 46px;
            height: 46px;
            top: 60px;
            right: 9%;
            opacity: 0.4;
        }

        #education::before,
        #portfolio::before,
        #experience::before,
        #contact::before {
            content: "";
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            z-index: 1;
            background: radial-gradient(circle, rgba(231, 138, 169, 0.10) 0%, rgba(231, 138, 169, 0.04) 55%, rgba(231, 138, 169, 0) 100%);
        }

        #education::before {
            width: 58px;
            height: 58px;
            top: 34px;
            right: 7%;
        }

        #portfolio::before {
            width: 70px;
            height: 70px;
            bottom: 42px;
            left: 4%;
        }

        #experience::before {
            width: 52px;
            height: 52px;
            top: 36px;
            left: 5%;
        }

        #contact::before {
            width: 62px;
            height: 62px;
            bottom: 30px;
            right: 6%;
        }

        .hero {
            min-height: 92vh;
            display: flex;
            align-items: center;
            padding-top: 110px;
            padding-bottom: 1px;
            overflow: hidden;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 15px;
            border-radius: 999px;
            background: rgba(255, 241, 246, 0.96);
            border: 1px solid rgba(244, 221, 229, 0.9);
            color: var(--pink-dark);
            font-size: 0.8rem;
            font-weight: 600;
            box-shadow: 0 8px 20px rgba(231, 138, 169, 0.06);
            margin-bottom: 16px;
        }

        .hero-title {
            font-size: clamp(2.1rem, 3.8vw, 3.35rem);
            font-weight: 700;
            line-height: 1.12;
            margin-bottom: 12px;
            color: var(--text);
            white-space: nowrap;
        }

        @media (min-width: 992px) {
            .hero-title {
                font-size: 3rem;
            }

            .hero-desc {
                max-width: 620px;
            }
        }

        .hero-meta {
            color: var(--pink-dark);
            font-weight: 600;
            font-size: 0.92rem;
            margin-bottom: 16px;
        }

        .hero-desc {
            max-width: 520px;
            color: var(--text-soft);
            font-size: 0.95rem;
            line-height: 1.9;
            margin-bottom: 24px;
        }

        .hero-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .btn-main {
            border: none;
            background: linear-gradient(135deg, var(--pink), var(--pink-dark));
            color: #fff;
            padding: 11px 22px;
            border-radius: 999px;
            font-size: 0.88rem;
            font-weight: 600;
            box-shadow: 0 12px 22px rgba(231, 138, 169, 0.15);
            transition: 0.3s ease;
        }

        .btn-main:hover {
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 16px 28px rgba(231, 138, 169, 0.20);
        }

        .btn-soft {
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid var(--line);
            color: var(--pink-dark);
            padding: 11px 22px;
            border-radius: 999px;
            font-size: 0.88rem;
            font-weight: 600;
            transition: 0.3s ease;
        }

        .btn-soft:hover {
            background: #fff4f8;
            color: var(--pink-dark);
            transform: translateY(-2px);
        }

        .hero-visual {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 420px;
            transform: translateX(-30px);
        }

        @media (min-width: 992px) {
            #home .row {
                align-items: center;
            }

            #home .col-lg-6:first-child {
                transform: translateX(50px);
            }

            #home .col-lg-6:last-child {
                display: flex;
                justify-content: flex-end;
                transform: translateX(-50px);
            }
        }

        .hero-ring {
            position: absolute;
            width: 340px;
            height: 340px;
            border-radius: 50%;
            background: linear-gradient(135deg, #fdeaf0, #fff8fb);
            box-shadow: var(--shadow);
            z-index: 1;
        }

        .hero-ring::before {
            content: "";
            position: absolute;
            inset: 18px;
            border-radius: 50%;
            border: 1px solid rgba(231, 138, 169, 0.18);
        }

        .hero-photo {
            position: relative;
            z-index: 2;
            width: 285px;
            height: 285px;
            object-fit: cover;
            border-radius: 50%;
            border: 10px solid rgba(255, 255, 255, 0.98);
            box-shadow: 0 22px 40px rgba(204, 111, 143, 0.14);
            background: #fff;
        }

        .floating-bubble {
            position: absolute;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(231, 138, 169, 0.15) 0%, rgba(231, 138, 169, 0.06) 60%, rgba(231, 138, 169, 0) 100%);
            z-index: 0;
        }

        .floating-bubble.a {
            width: 52px;
            height: 52px;
            top: 42px;
            left: 70px;
            opacity: 0.55;
        }

        .floating-bubble.b {
            width: 44px;
            height: 44px;
            right: 64px;
            bottom: 62px;
            opacity: 0.45;
        }

        .floating-bubble.c {
            width: 26px;
            height: 26px;
            right: 110px;
            top: 92px;
            opacity: 0.4;
        }

        .glass-card,
        .soft-card {
            background: var(--card);
            border: 1px solid rgba(244, 221, 229, 0.95);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow);
            transition: 0.32s ease;
        }

        .glass-card:hover,
        .soft-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-hover);
        }

        .about-simple,
        .edu-card,
        .exp-card,
        .github-panel,
        .contact-card {
            padding: 26px;
            height: 100%;
        }

        .about-simple p,
        .edu-card p,
        .exp-card p,
        .github-panel p,
        .contact-card p {
            color: var(--text-soft);
            font-size: 0.94rem;
            line-height: 1.9;
            margin-bottom: 0;
        }

        .about-simple p+p {
            margin-top: 14px;
        }

        .card-meta {
            font-size: 0.86rem;
            color: var(--pink-dark);
            font-weight: 600;
            margin-top: 10px;
            display: inline-block;
        }

        .edu-card h5,
        .exp-card h5,
        .portfolio-body h5 {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--text);
            line-height: 1.55;
        }

        .edu-card p,
        .exp-card p,
        .portfolio-body p {
            font-size: 0.92rem;
            color: var(--text-soft);
            line-height: 1.85;
            margin-bottom: 0;
        }

        .skills-wrap {
            padding: 26px;
            text-align: center;
        }

        .skill-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin: 7px;
            padding: 10px 18px;
            border-radius: 999px;
            background: linear-gradient(135deg, #fff0f5, #fff9fc);
            color: var(--pink-dark);
            border: 1px solid rgba(244, 221, 229, 0.95);
            font-size: 0.87rem;
            font-weight: 500;
            box-shadow: 0 8px 18px rgba(231, 138, 169, 0.06);
            transition: 0.28s ease;
        }

        .skill-badge:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 22px rgba(231, 138, 169, 0.11);
        }

        .portfolio-grid .col-md-4 {
            display: flex;
        }

        .portfolio-card {
            background: rgba(255, 255, 255, 0.96);
            border: 1px solid rgba(244, 221, 229, 0.95);
            border-radius: 24px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: 0.35s ease;
            height: 100%;
            width: 100%;
        }

        .portfolio-card:hover {
            transform: translateY(-7px);
            box-shadow: var(--shadow-hover);
        }

        .portfolio-img-wrap {
            height: 245px;
            overflow: hidden;
            background: linear-gradient(135deg, #fff1f6, #fff9fb);
        }

        .portfolio-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .portfolio-card:hover .portfolio-img-wrap img {
            transform: scale(1.04);
        }

        .portfolio-body {
            padding: 20px 20px 22px;
        }

        .portfolio-tag {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 999px;
            background: #fff1f6;
            color: var(--pink-dark);
            font-size: 0.76rem;
            font-weight: 600;
            margin-bottom: 12px;
        }

        .text-link {
            display: inline-block;
            margin-top: 14px;
            color: var(--pink-dark);
            font-weight: 600;
            font-size: 0.88rem;
            transition: 0.25s ease;
        }

        .text-link:hover {
            color: var(--pink);
        }

        .portfolio-note {
            padding: 22px 24px;
            text-align: center;
        }

        .portfolio-note h5 {
            color: var(--text);
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .portfolio-note p {
            margin: 0;
            color: var(--text-soft);
            font-size: 0.92rem;
            line-height: 1.8;
        }

        .github-shell {
            background: linear-gradient(180deg, #fff6f9 0%, #fff 100%);
            border: 1px solid rgba(244, 221, 229, 0.95);
            border-radius: 26px;
            padding: 20px;
        }

        .github-profile-box {
            background: white;
            border: 1px solid var(--line);
            border-radius: 22px;
            padding: 22px;
            text-align: center;
            box-shadow: 0 10px 24px rgba(231, 138, 169, 0.06);
            min-height: 100%;
        }

        .github-profile-box img {
            width: 88px;
            height: 88px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 12px;
            border: 4px solid #fff;
            box-shadow: 0 10px 20px rgba(231, 138, 169, 0.12);
        }

        .github-profile-box h5 {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 6px;
            color: var(--text);
        }

        .github-profile-box p {
            font-size: 0.9rem;
            color: var(--text-soft);
            line-height: 1.75;
        }

        .github-topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
            margin-bottom: 18px;
        }

        .github-topbar p {
            margin: 0;
            font-size: 0.91rem;
            color: var(--text-soft);
        }

        .repo-title {
            color: var(--pink-dark);
            font-size: 0.95rem;
            font-weight: 700;
            margin-bottom: 14px;
        }

        .repo-card {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 18px;
            padding: 15px 17px;
            box-shadow: 0 8px 18px rgba(231, 138, 169, 0.05);
            transition: 0.28s ease;
            margin-bottom: 12px;
        }

        .repo-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 24px rgba(231, 138, 169, 0.09);
        }

        .repo-card a {
            color: var(--pink-dark);
            font-size: 0.94rem;
            font-weight: 600;
        }

        .repo-card p {
            margin: 7px 0 10px;
            font-size: 0.88rem;
            color: var(--text-soft);
            line-height: 1.7;
        }

        .repo-meta {
            font-size: 0.8rem;
            color: var(--pink-dark);
            font-weight: 500;
        }

        .contact-card {
            text-align: center;
        }

        .contact-list {
            display: grid;
            gap: 14px;
        }

        .contact-item {
            padding: 14px 16px;
            border-radius: 16px;
            background: linear-gradient(180deg, #fff9fb 0%, #fff 100%);
            border: 1px solid var(--line);
            color: var(--text-soft);
            font-size: 0.92rem;
        }

        .contact-item strong {
            color: var(--text);
            font-weight: 600;
        }

        .contact-item a {
            color: var(--pink-dark);
            font-weight: 500;
            word-break: break-word;
        }

        footer {
            background: linear-gradient(180deg, #fff2f7 0%, #fde9f0 100%);
            border-top: 1px solid rgba(244, 221, 229, 0.95);
            padding: 22px 0;
            text-align: center;
        }

        footer p {
            margin: 0;
            color: var(--text-soft);
            font-size: 0.87rem;
        }

        @media (max-width: 991.98px) {
            .navbar-collapse {
                background: rgba(255, 255, 255, 0.97);
                margin-top: 12px;
                padding: 12px 6px;
                border-radius: 16px;
                border: 1px solid var(--line);
            }

            .hero {
                text-align: center;
                min-height: auto;
                padding-top: 120px;
                padding-bottom: 40px;
            }

            .hero-desc {
                margin-left: auto;
                margin-right: auto;
            }

            .hero-buttons {
                justify-content: center;
            }

            .hero-visual {
                min-height: 360px;
                margin-top: 4px;
            }

            .github-topbar {
                justify-content: center;
                text-align: center;
            }
        }

        @media (max-width: 767.98px) {
            section {
                padding: 60px 0;
            }

            .section-title {
                font-size: 1.55rem;
            }

            .section-subtitle {
                font-size: 0.91rem;
                margin-bottom: 24px;
            }

            .hero-title {
                font-size: 2rem;
            }

            .hero-ring {
                width: 285px;
                height: 285px;
            }

            .hero-photo {
                width: 230px;
                height: 230px;
            }

            .portfolio-img-wrap {
                height: 220px;
            }

            .decor-dot.one,
            .decor-dot.two,
            .decor-dot.three,
            .decor-dot.four {
                display: none;
            }
        }

        @media (max-width: 575.98px) {
            .navbar-brand {
                font-size: 1.28rem;
            }

            .hero-title {
                font-size: 1.85rem;
            }

            .hero-badge {
                font-size: 0.76rem;
            }

            .hero-desc,
            .about-simple p,
            .edu-card p,
            .exp-card p,
            .portfolio-body p,
            .contact-card p {
                font-size: 0.9rem;
            }

            .about-simple,
            .edu-card,
            .exp-card,
            .github-panel,
            .portfolio-body,
            .skills-wrap,
            .contact-card {
                padding: 22px;
            }

            .btn-main,
            .btn-soft {
                width: 100%;
                text-align: center;
            }
        }

        /* ===== GitHub Section Update ===== */
        .github-shell {
            background: linear-gradient(180deg, #fff6f9 0%, #fff 100%);
            border: 1px solid rgba(244, 221, 229, 0.95);
            border-radius: 26px;
            padding: 24px;
        }

        .github-header {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 14px;
            margin-bottom: 24px;
            text-align: center;
        }

        .github-topbar {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
            margin-bottom: 0;
        }

        .github-topbar p {
            margin: 0;
            font-size: 0.91rem;
            color: var(--text-soft);
        }

        .github-profile-wrap {
            display: flex;
            justify-content: center;
            margin-bottom: 26px;
        }

        .github-profile-box {
            background: white;
            border: 1px solid var(--line);
            border-radius: 22px;
            padding: 24px;
            text-align: center;
            box-shadow: 0 10px 24px rgba(231, 138, 169, 0.06);
            width: 100%;
            max-width: 380px;
        }

        .github-profile-box img {
            width: 92px;
            height: 92px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 14px;
            border: 4px solid #fff;
            box-shadow: 0 10px 20px rgba(231, 138, 169, 0.12);
        }

        .github-profile-box h5 {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 6px;
            color: var(--text);
        }

        .github-profile-box p {
            font-size: 0.9rem;
            color: var(--text-soft);
            line-height: 1.75;
            margin-bottom: 0;
        }

        .repo-title {
            color: var(--pink-dark);
            font-size: 0.95rem;
            font-weight: 700;
            margin-bottom: 14px;
            text-align: center;
        }

        .repo-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
        }

        .repo-card {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 18px;
            padding: 16px 18px;
            box-shadow: 0 8px 18px rgba(231, 138, 169, 0.05);
            transition: 0.28s ease;
            margin-bottom: 0;
            height: 100%;
        }

        .repo-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 24px rgba(231, 138, 169, 0.09);
        }

        .repo-card a {
            color: var(--pink-dark);
            font-size: 0.94rem;
            font-weight: 600;
            line-height: 1.5;
            display: inline-block;
        }

        .repo-card p {
            margin: 8px 0 10px;
            font-size: 0.88rem;
            color: var(--text-soft);
            line-height: 1.7;
        }

        .repo-meta {
            font-size: 0.8rem;
            color: var(--pink-dark);
            font-weight: 500;
        }

        @media (max-width: 767.98px) {
            .repo-grid {
                grid-template-columns: 1fr;
            }

            .github-shell {
                padding: 18px;
            }

            .github-profile-box {
                max-width: 100%;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#home">Nia Profile</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#education">Education</a></li>
                    <li class="nav-item"><a class="nav-link" href="#skills">Skills</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#experience">Experience</a></li>
                    <li class="nav-item"><a class="nav-link" href="#api">GitHub</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    <li class="nav-item ms-lg-3">
    <a href="{{ route('login') }}" class="btn btn-soft">
        Login
    </a>
</li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="home" class="hero">
    <div class="decor-dot one"></div>
    <div class="decor-dot two"></div>

    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="hero-badge">Personal Website • <span id="profile-title">UI/UX Designer</span></div>
                <h1 id="profile-name" class="hero-title">Nia Novela Ariandini</h1>
                <div id="profile-nim" class="hero-meta">NIM 2311102057</div>
                <p id="profile-description" class="hero-desc">
                    Saya tertarik pada desain antarmuka yang rapi, nyaman digunakan, dan punya alur yang jelas.
                    Fokus saya ada pada layout, wireframe, dan visual yang tetap lembut tanpa mengurangi fungsi.
                </p>

                <div class="hero-buttons">
                    <a href="#portfolio" class="btn btn-main">Lihat Portfolio</a>
                    <a id="profile-dribbble" href="https://dribbble.com/Nianovela" target="_blank" class="btn btn-soft">Dribbble Saya</a>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="hero-visual">
                    <div class="floating-bubble a"></div>
                    <div class="floating-bubble b"></div>
                    <div class="floating-bubble c"></div>
                    <div class="hero-ring"></div>
                    <img id="profile-photo" src="{{ asset('images/foto-nia.jpg') }}" alt="Foto Profile" class="hero-photo">
                </div>
            </div>
        </div>
    </div>
</section>

    <section id="about">
        <div class="decor-dot three"></div>
        <div class="container">
            <h2 class="section-title">About Me</h2>
            <p class="section-subtitle">
                Sedikit cerita tentang saya, cara saya melihat desain, dan hal-hal yang paling saya nikmati dalam proses
                membuat antarmuka.
            </p>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="glass-card about-simple">
                        <p>
                            Saya adalah mahasiswa Telkom University Purwokerto yang memiliki ketertarikan besar di
                            bidang
                            UI/UX. Saya senang mempelajari bagaimana sebuah tampilan bisa terasa sederhana, enak
                            dilihat,
                            dan tetap mudah dipahami oleh pengguna.
                        </p>
                        <p>
                            Dalam proses desain, saya terbiasa menyusun layout, membuat wireframe, memperhatikan detail
                            visual, serta mencoba menghasilkan tampilan yang tidak hanya menarik secara estetis, tetapi
                            juga nyaman digunakan. Saya menyukai gaya desain yang soft, clean, dan tetap terasa rapi di
                            setiap bagiannya.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="education">
    <div class="container">
        <h2 class="section-title">Education</h2>
        <p class="section-subtitle">
            Latar pendidikan yang membentuk dasar saya dalam memahami teknologi, desain, dan proses berpikir yang lebih terstruktur.
        </p>

        <div class="row g-4">
            @if($education->count() > 0)
                @foreach($education as $edu)
                <div class="col-md-6">
                    <div class="soft-card edu-card">
                        <h5>{{ $edu->institution }}</h5>
                        <p>{{ $edu->degree }}</p>
                        <span class="card-meta">{{ $edu->period }}</span>
                        @if($edu->description)
                            <p class="mt-2" style="font-size: 0.85rem; opacity: 0.8;">{{ $edu->description }}</p>
                        @endif
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-12 text-center">
                    <p class="text-muted">Data pendidikan belum ditambahkan.</p>
                </div>
            @endif
        </div>
    </div>
</section>

    <section id="skills">
        <div class="decor-dot four"></div>
        <div class="container">
            <h2 class="section-title">Skills</h2>
            <p class="section-subtitle">
                Beberapa kemampuan yang paling sering saya gunakan dalam proses desain, kolaborasi, dan penyelesaian
                masalah.
            </p>

            <div class="glass-card skills-wrap">
                <span class="skill-badge">UI/UX Design</span>
                <span class="skill-badge">Figma</span>
                <span class="skill-badge">Canva</span>
                <span class="skill-badge">Wireframing</span>
                <span class="skill-badge">Prototype</span>
                <span class="skill-badge">Visual Design</span>
                <span class="skill-badge">Problem Solving</span>
                <span class="skill-badge">Communication</span>
                <span class="skill-badge">Teamwork</span>
                <span class="skill-badge">Time Management</span>
                <span class="skill-badge">Attention to Detail</span>
            </div>
        </div>
    </section>

    <section id="portfolio">
        <div class="container">
            <h2 class="section-title">Portfolio</h2>
            <p class="section-subtitle">
                Beberapa karya desain UI yang saya unggah di Dribbble. Semua project ini menampilkan ketertarikan saya
                pada layout yang rapi, visual yang lembut, dan tampilan yang tetap nyaman dilihat.
            </p>

            <div class="row g-4 portfolio-grid">
                <div class="col-md-4">
                    <div class="portfolio-card">
                        <div class="portfolio-img-wrap">
                            <img src="images/desain-1.png" alt="Desain UI Dribbble 1">
                        </div>
                        <div class="portfolio-body">
                            <span class="portfolio-tag">Dribbble Project</span>
                            <h5>Dashboard UI Exploration</h5>
                            <p>
                                Desain antarmuka dengan susunan layout yang terstruktur, tampilan bersih, dan visual
                                modern yang tetap terasa ringan untuk dilihat.
                            </p>
                            <a href="https://dribbble.com/Nianovela" target="_blank" class="text-link">Lihat di
                                Dribbble</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="portfolio-card">
                        <div class="portfolio-img-wrap">
                            <img src="images/desain-2.png" alt="Desain UI Dribbble 2">
                        </div>
                        <div class="portfolio-body">
                            <span class="portfolio-tag">Dribbble Project</span>
                            <h5>Mobile App Interface Design</h5>
                            <p>
                                Eksplorasi tampilan aplikasi dengan pendekatan soft visual, hierarchy yang jelas, dan
                                penyusunan elemen yang lebih konsisten.
                            </p>
                            <a href="https://dribbble.com/Nianovela" target="_blank" class="text-link">Lihat di
                                Dribbble</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="portfolio-card">
                        <div class="portfolio-img-wrap">
                            <img src="images/desain-3.png" alt="Desain UI Dribbble 3">
                        </div>
                        <div class="portfolio-body">
                            <span class="portfolio-tag">Dribbble Project</span>
                            <h5>Website UI Concept</h5>
                            <p>
                                Konsep desain website yang menonjolkan komposisi visual yang seimbang, warna lembut, dan
                                pengalaman pengguna yang terasa lebih nyaman.
                            </p>
                            <a href="https://dribbble.com/Nianovela" target="_blank" class="text-link">Lihat di
                                Dribbble</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mt-4">
                <div class="col-lg-10">
                    <div class="glass-card portfolio-note">
                        <h5>More on Dribbble</h5>
                        <p>
                            Kumpulan karya lainnya bisa dilihat lebih lengkap melalui
                            <a href="https://dribbble.com/Nianovela" target="_blank"
                                class="text-link">dribbble.com/Nianovela</a>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="experience">
        <div class="container">
            <h2 class="section-title">Experience</h2>
            <p class="section-subtitle">
                Pengalaman yang membantu saya berkembang dalam desain visual, kolaborasi tim, dan penyusunan solusi
                antarmuka yang lebih terarah.
            </p>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="soft-card exp-card">
                        <h5>UI Designer Intern – Selaras Studio</h5>
                        <p>
                            Membuat desain antarmuka web, memahami kebutuhan klien, dan belajar menyusun tampilan yang
                            lebih rapi dengan standar kerja profesional.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="soft-card exp-card">
                        <h5>Freelance UI Designer – Selaras Studio</h5>
                        <p>
                            Mendesain template presentasi dan kebutuhan visual lainnya dengan pendekatan yang fleksibel,
                            tetap rapi, dan sesuai karakter proyek.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="soft-card exp-card">
                        <h5>UI/UX Designer Intern – Universitas Jenderal Soedirman</h5>
                        <p>
                            Terlibat dalam pengembangan desain antarmuka selama kegiatan magang dan membantu penyusunan
                            tampilan yang lebih nyaman digunakan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="api">
        <div class="container">
            <h2 class="section-title">GitHub Profile & Projects</h2>
            <p class="section-subtitle">
                Bagian ini menampilkan profil GitHub serta beberapa repository terbaru secara otomatis menggunakan
                JavaScript dan GitHub Public API.
            </p>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="glass-card github-panel">
                        <div class="github-shell">

                            <div class="github-header">
                                <div class="github-topbar">
                                    <p>
                                        Username GitHub:
                                        <strong style="color: var(--pink-dark);">nianovela16</strong>
                                    </p>
                                    <button class="btn btn-main" onclick="getGithubProfile()">Refresh GitHub</button>
                                </div>
                            </div>

                            <div class="github-profile-wrap">
                                <div id="githubResult" class="github-profile-box">
                                    Data profil GitHub akan tampil di sini.
                                </div>
                            </div>

                            <div id="repoList"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="container">
            <h2 class="section-title">Contact</h2>
            <p class="section-subtitle">
                Beberapa informasi yang bisa digunakan untuk terhubung dengan saya.
            </p>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="glass-card contact-card">
                        <div class="contact-list">
                            <div class="contact-item">
                                <strong>Email</strong><br>
                                <a href="mailto:novelaariandini@gmail.com">novelaariandini@gmail.com</a>
                            </div>

                            <div class="contact-item">
                                <strong>No HP</strong><br>
                                0813-9215-0129
                            </div>

                            <div class="contact-item">
                                <strong>Alamat</strong><br>
                                Sokaraja
                            </div>

                            <div class="contact-item">
                                <strong>Dribbble</strong><br>
                                <a href="https://dribbble.com/Nianovela" target="_blank">dribbble.com/Nianovela</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2026 Nia Novela Ariandini • Personal Website</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        async function getGithubProfile() {
            const username = "nianovela16";
            const githubResult = document.getElementById("githubResult");
            const repoList = document.getElementById("repoList");

            githubResult.innerHTML = "Sedang mengambil data GitHub...";
            repoList.innerHTML = "";

            try {
                const response = await fetch(`https://api.github.com/users/${username}`);

                if (!response.ok) {
                    throw new Error("User GitHub tidak ditemukan.");
                }

                const data = await response.json();

                githubResult.innerHTML = `
                    <img src="${data.avatar_url}" alt="Avatar GitHub">
                    <h5>${data.name ? data.name : data.login}</h5>
                    <p>${data.bio ? data.bio : "Bio belum tersedia."}</p>
                    <p style="margin: 10px 0 14px;">
                        Followers: ${data.followers} • Following: ${data.following}
                    </p>
                    <a href="${data.html_url}" target="_blank" class="btn btn-soft">Lihat Profil GitHub</a>
                `;

                const repoResponse = await fetch(`https://api.github.com/users/${username}/repos?sort=updated&per_page=6`);

                if (!repoResponse.ok) {
                    throw new Error("Repository GitHub tidak dapat diambil.");
                }

                const repos = await repoResponse.json();

                if (repos.length === 0) {
                    repoList.innerHTML = `
                        <div class="repo-card">
                            <p class="mb-0">Belum ada repository yang bisa ditampilkan.</p>
                        </div>
                    `;
                    return;
                }

                let repoHTML = `<h6 class="repo-title">Repository Terbaru</h6><div class="repo-grid">`;

                repos.forEach(repo => {
                    repoHTML += `
        <div class="repo-card">
            <a href="${repo.html_url}" target="_blank">${repo.name}</a>
            <p>${repo.description ? repo.description : "Deskripsi belum tersedia."}</p>
            <div class="repo-meta">
                ${repo.language ? `Language: ${repo.language}` : "Language: -"}
            </div>
        </div>
    `;
                });

                repoHTML += `</div>`;
                repoList.innerHTML = repoHTML;

            } catch (error) {
                githubResult.innerHTML = `<span style="color: var(--pink-dark); font-weight: 600;">${error.message}</span>`;
                repoList.innerHTML = "";
                console.error(error);
            }
        }

        window.addEventListener("load", getGithubProfile);

        const sections = document.querySelectorAll("section[id]");
        const navLinks = document.querySelectorAll(".nav-link");

        window.addEventListener("scroll", () => {
            let current = "";

            sections.forEach(section => {
                const sectionTop = section.offsetTop - 120;
                const sectionHeight = section.offsetHeight;
                if (pageYOffset >= sectionTop && pageYOffset < sectionTop + sectionHeight) {
                    current = section.getAttribute("id");
                }
            });

            navLinks.forEach(link => {
                link.classList.remove("active-link");
                if (link.getAttribute("href") === `#${current}`) {
                    link.classList.add("active-link");
                }
            });
        });
    </script>
    <script>
    async function loadProfile() {
        try {
            const response = await fetch('/api/profile');
            const data = await response.json();

            if (!data || !data.id) return;

            document.getElementById('profile-title').textContent = data.title ?? 'UI/UX Designer';
            document.getElementById('profile-name').textContent = data.name ?? 'Nia Novela Ariandini';
            document.getElementById('profile-nim').textContent = data.nim ? `NIM ${data.nim}` : 'NIM -';
            document.getElementById('profile-description').textContent = data.description ?? '-';

            const dribbbleBtn = document.getElementById('profile-dribbble');
            if (data.dribbble) {
                dribbbleBtn.href = data.dribbble;
            }

            const profilePhoto = document.getElementById('profile-photo');

if (data.photo && data.photo.trim() !== '') {
    profilePhoto.src = `/storage/${data.photo}`;
    profilePhoto.onerror = function () {
        this.src = `{{ asset('images/foto-nia.jpg') }}`;
    };
} else {
    profilePhoto.src = `{{ asset('images/foto-nia.jpg') }}`;
}
        } catch (error) {
            console.error('Gagal memuat profile:', error);
        }
    }

    window.addEventListener('load', () => {
        loadProfile();
    });
</script>
</body>

</html>