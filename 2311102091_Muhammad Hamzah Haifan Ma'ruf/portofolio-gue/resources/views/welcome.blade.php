<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio - Haifan</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html, body {
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #050505;
            color: #fff;
            cursor: default;
        }

        button,
        a,
        input,
        textarea,
        select {
            font-family: 'Poppins', sans-serif;
        }

        :root {
            --ease-smooth: cubic-bezier(.22,1,.36,1);
            --glass: rgba(255,255,255,0.03);
            --line: rgba(255,255,255,0.09);
            --muted: #8f8f98;
            --muted-2: #6b7280;
        }

        .page-bg {
            position: fixed;
            inset: 0;
            z-index: -30;
            background:
                radial-gradient(circle at 14% 18%, rgba(255,255,255,0.08), transparent 20%),
                radial-gradient(circle at 85% 74%, rgba(255,255,255,0.05), transparent 24%),
                linear-gradient(135deg, #020202 0%, #080808 36%, #101010 72%, #030303 100%);
            overflow: hidden;
        }

        .page-bg::before {
            content: "";
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(255,255,255,0.022) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.022) 1px, transparent 1px);
            background-size: 34px 34px;
            opacity: 0.28;
        }

        .page-bg::after {
            content: "";
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at 20% 15%, rgba(255,255,255,0.04), transparent 16%),
                radial-gradient(circle at 70% 28%, rgba(255,255,255,0.03), transparent 16%),
                radial-gradient(circle at 80% 80%, rgba(255,255,255,0.03), transparent 22%);
            filter: blur(44px);
        }

        .cursor-glow {
            position: fixed;
            width: 360px;
            height: 360px;
            border-radius: 50%;
            pointer-events: none;
            z-index: -5;
            background: radial-gradient(circle, rgba(255,255,255,0.11) 0%, rgba(255,255,255,0.05) 20%, rgba(255,255,255,0.02) 40%, transparent 70%);
            filter: blur(28px);
            transform: translate(-50%, -50%);
            transition: left 0.16s ease, top 0.16s ease, opacity 0.25s ease;
            opacity: 0.9;
            mix-blend-mode: screen;
        }

        .metal-text {
            background: linear-gradient(
                90deg,
                #ffffff 0%,
                #d4d4d8 18%,
                #ffffff 42%,
                #a1a1aa 72%,
                #ffffff 100%
            );
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .site-shell {
            width: 100%;
            height: 100vh;
            position: relative;
            overflow: hidden;
        }

        .floating-nav {
            position: fixed;
            top: 30px;
            right: 34px;
            z-index: 60;
            display: flex;
            align-items: center;
            gap: 18px;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        .nav-btn {
            border: none;
            background: transparent;
            color: rgba(255,255,255,0.54);
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            letter-spacing: 0.01em;
            position: relative;
            transition: transform 0.35s ease, color 0.35s ease, opacity 0.35s ease;
        }

        .nav-btn:hover {
            color: rgba(255,255,255,0.9);
            transform: translateY(-1px);
        }

        .nav-btn.active {
            color: #ffffff;
        }

        .nav-btn.active::after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            bottom: -7px;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.95), transparent);
        }

        .secret-entry {
            position: fixed;
            top: 24px;
            left: 24px;
            z-index: 70;
            width: 28px;
            height: 28px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            opacity: 0.15;
            transition: 0.35s ease;
            transform: rotate(45deg);
        }

        .secret-entry::before {
            content: "";
            width: 10px;
            height: 10px;
            border: 1px solid rgba(255,255,255,0.65);
            display: block;
        }

        .secret-entry:hover {
            opacity: 0.55;
            transform: rotate(45deg) scale(1.08);
        }

        .viewport {
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
        }

        .slide {
            position: absolute;
            inset: 0;
            padding: 94px 52px 38px;
            display: grid;
            align-items: center;
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            z-index: 1;
            transition:
                opacity .75s var(--ease-smooth),
                transform .95s var(--ease-smooth),
                filter .9s var(--ease-smooth);
            transform: scale(1.015);
            filter: blur(12px);
        }

        .slide.active {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
            z-index: 2;
            transform: scale(1);
            filter: blur(0);
        }

        .slide-content {
            width: 100%;
            height: 100%;
            max-width: 1400px;
            margin: 0 auto;
            overflow: hidden;
        }

        .eyebrow {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.34em;
            color: var(--muted-2);
            margin-bottom: 16px;
        }

        .section-note {
            color: #7c7c84;
            font-size: 14px;
            line-height: 1.9;
            max-width: 360px;
        }

        .empty-state {
            color: #71717a;
            font-size: 14px;
            line-height: 1.8;
        }

        .reveal {
            opacity: 0;
            transform: translateY(28px);
            filter: blur(10px);
            transition:
                opacity 0.78s var(--ease-smooth),
                transform 0.78s var(--ease-smooth),
                filter 0.78s var(--ease-smooth);
            will-change: transform, opacity, filter;
        }

        .slide.active .reveal {
            opacity: 1;
            transform: translateY(0);
            filter: blur(0);
        }

        .slide.active .delay-1 { transition-delay: .06s; }
        .slide.active .delay-2 { transition-delay: .14s; }
        .slide.active .delay-3 { transition-delay: .24s; }
        .slide.active .delay-4 { transition-delay: .34s; }
        .slide.active .delay-5 { transition-delay: .46s; }
        .slide.active .delay-6 { transition-delay: .58s; }
        .slide.active .delay-7 { transition-delay: .70s; }

        .slide-hero {
            transform: scale(1.04);
        }

        .slide-hero.active {
            transform: scale(1);
        }

        .slide-hero .reveal { transform: translateY(34px) scale(.985); }
        .slide-hero.active .reveal { transform: translateY(0) scale(1); }

        .slide-about {
            transform: translateX(22px) scale(1.01);
        }

        .slide-about.active {
            transform: translateX(0) scale(1);
        }

        .slide-about .reveal {
            opacity: 0;
            filter: blur(14px);
        }

        .slide-about .about-eyebrow,
        .slide-about .about-note {
            transform: translateY(24px);
        }

        .slide-about .about-side-title {
            transform: translateY(52px) scale(.95);
            letter-spacing: -0.075em;
        }

        .slide-about .about-rule {
            transform: scaleY(0);
            transform-origin: top;
            opacity: 0;
            filter: blur(2px);
            transition:
                opacity 0.9s var(--ease-smooth),
                transform 0.9s var(--ease-smooth),
                filter 0.9s var(--ease-smooth);
        }

        .slide-about .about-content-top {
            transform: translateX(58px);
        }

        .slide-about .about-content-bottom {
            transform: translateY(26px);
        }

        .slide-about .about-contact-item {
            transform: translateY(22px);
            clip-path: inset(0 0 100% 0);
        }

        .slide-about .about-quote-mark {
            opacity: 0;
            transform: scale(.85) translateY(18px);
            filter: blur(8px);
        }

        .slide-about.active .reveal {
            opacity: 1;
            filter: blur(0);
        }

        .slide-about.active .about-eyebrow,
        .slide-about.active .about-note,
        .slide-about.active .about-side-title,
        .slide-about.active .about-content-top,
        .slide-about.active .about-content-bottom,
        .slide-about.active .about-contact-item,
        .slide-about.active .about-quote-mark {
            transform: none;
            clip-path: inset(0 0 0 0);
        }

        .slide-about.active .about-rule {
            opacity: 1;
            transform: scaleY(1);
            filter: blur(0);
        }

        .slide-skills {
            transform: translateY(20px) scale(1.01);
        }

        .slide-skills.active {
            transform: translateY(0) scale(1);
        }

        .slide-skills .reveal { transform: scale(.92); }
        .slide-skills.active .reveal { transform: scale(1); }

        .slide-education {
            transform: translateY(30px) scale(1.01);
        }

        .slide-education.active {
            transform: translateY(0) scale(1);
        }

        .slide-education .reveal { transform: translateY(24px); clip-path: inset(0 0 100% 0); }
        .slide-education.active .reveal { transform: translateY(0); clip-path: inset(0 0 0 0); }

        .slide-experience {
            transform: translateX(-26px) scale(1.01);
        }

        .slide-experience.active {
            transform: translateX(0) scale(1);
        }

        .slide-experience .reveal { transform: translateX(52px); }
        .slide-experience.active .reveal { transform: translateX(0); }

        .slide-organization {
            transform: translateY(26px) scale(1.02);
        }

        .slide-organization.active {
            transform: translateY(0) scale(1);
        }

        .slide-organization .reveal { transform: translateY(24px); }
        .slide-organization.active .reveal { transform: translateY(0); }

        .slide-projects {
            transform: translateX(18px) scale(1.02);
        }

        .slide-projects.active {
            transform: translateX(0) scale(1);
        }

        .slide-projects .reveal { transform: translateY(24px); }
        .slide-projects.active .reveal { transform: translateY(0); }

        .hero-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 46px;
            width: 100%;
            height: 100%;
            align-items: center;
        }

        .hero-copy {
            max-width: 760px;
        }

        .hero-name {
            font-size: clamp(2.7rem, 6.2vw, 5.8rem);
            line-height: 0.92;
            font-weight: 800;
            letter-spacing: -0.055em;
            max-width: 760px;
            text-wrap: balance;
        }

        .hero-role {
            margin-top: 20px;
            font-size: clamp(1rem, 1.8vw, 1.55rem);
            font-weight: 600;
            color: #d4d4d8;
            max-width: 620px;
            line-height: 1.45;
        }

        .hero-visual {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .photo-wrap {
            position: relative;
            width: min(34vw, 460px);
            height: min(34vw, 460px);
            display: flex;
            justify-content: center;
            align-items: center;
            perspective: 1200px;
            transform-style: preserve-3d;
        }

        .photo-wrap::before {
            content: "";
            position: absolute;
            width: 76%;
            height: 76%;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255,255,255,0.13), rgba(255,255,255,0.03) 40%, transparent 72%);
            filter: blur(30px);
            z-index: 0;
        }

        .photo-wrap::after {
            content: "";
            position: absolute;
            width: 54%;
            height: 10%;
            left: 50%;
            bottom: 8%;
            transform: translateX(-50%) translateZ(-80px);
            border-radius: 50%;
            background: radial-gradient(circle, rgba(0,0,0,0.65) 0%, rgba(0,0,0,0.34) 42%, transparent 78%);
            filter: blur(18px);
            z-index: 0;
            animation: shadowFloat 4.8s ease-in-out infinite;
        }

        @keyframes shadowFloat {
            0%, 100% {
                transform: translateX(-50%) translateY(0) scale(1) translateZ(-80px);
                opacity: 0.72;
            }
            50% {
                transform: translateX(-50%) translateY(10px) scale(0.9) translateZ(-80px);
                opacity: 0.5;
            }
        }

        .photo-3d {
            position: relative;
            z-index: 2;
            transform-style: preserve-3d;
            transition: transform 0.22s ease-out;
            animation: photoFloat 5.2s ease-in-out infinite;
            will-change: transform;
        }

        @keyframes photoFloat {
            0%, 100% {
                transform: translateY(0) rotateX(0deg) rotateY(0deg);
            }
            50% {
                transform: translateY(-10px) rotateX(2deg) rotateY(-2deg);
            }
        }

        .photo-depth-glow {
            position: absolute;
            inset: 12% 18%;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255,255,255,0.12), transparent 70%);
            filter: blur(20px);
            transform: translateZ(-40px);
            z-index: 1;
        }

        .profile-photo {
            position: relative;
            z-index: 3;
            width: min(25.5vw, 310px);
            max-width: 310px;
            max-height: 420px;
            object-fit: contain;
            border: none;
            border-radius: 0;
            background: transparent;
            box-shadow: none;
            transform: translateZ(48px);
            filter:
                drop-shadow(0 36px 40px rgba(0,0,0,0.42))
                drop-shadow(16px 18px 30px rgba(0,0,0,0.30))
                drop-shadow(-10px 10px 20px rgba(255,255,255,0.04))
                drop-shadow(0 0 22px rgba(255,255,255,0.05));
        }

        .about-layout {
            display: grid;
            grid-template-columns: 0.72fr 0.05fr 1.23fr;
            gap: 46px;
            height: 100%;
            align-items: center;
        }

        .about-left {
            align-self: center;
            padding-right: 10px;
        }

        .about-side-title {
            font-size: clamp(3.2rem, 7vw, 6.4rem);
            line-height: 0.82;
            font-weight: 800;
            letter-spacing: -0.07em;
        }

        .about-note {
            margin-top: 28px;
            max-width: 300px;
            color: #7f7f87;
            font-size: 14px;
            line-height: 2;
        }

        .about-rule-wrap {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .about-rule {
            width: 1px;
            height: 72%;
            background: linear-gradient(
                180deg,
                transparent 0%,
                rgba(255,255,255,0.12) 10%,
                rgba(255,255,255,0.58) 48%,
                rgba(255,255,255,0.14) 86%,
                transparent 100%
            );
            box-shadow: 0 0 22px rgba(255,255,255,0.05);
        }

        .about-right {
            display: grid;
            grid-template-rows: auto auto;
            gap: 42px;
            align-self: center;
            max-width: 900px;
            position: relative;
        }

        .about-quote-mark {
            position: absolute;
            right: -10px;
            top: -34px;
            font-size: clamp(7rem, 10vw, 10rem);
            line-height: 1;
            color: rgba(255,255,255,0.035);
            font-weight: 800;
            pointer-events: none;
            user-select: none;
        }

        .about-content-top {
            max-width: 840px;
            position: relative;
            z-index: 2;
        }

        .about-kicker {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.34em;
            color: #676772;
            margin-bottom: 18px;
        }

        .about-text {
            color: #ececef;
            font-size: clamp(19px, 1.6vw, 28px);
            line-height: 1.85;
            letter-spacing: -0.02em;
            max-width: 820px;
        }

        .about-content-bottom {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 10px 42px;
            align-items: start;
            max-width: 820px;
            padding-top: 6px;
            position: relative;
            z-index: 2;
        }

        .about-contact-item {
            padding: 16px 0 18px;
            border-bottom: 1px solid rgba(255,255,255,0.07);
            transition: transform 0.35s ease, border-color 0.35s ease;
        }

        .about-contact-item:hover {
            transform: translateX(6px);
            border-color: rgba(255,255,255,0.18);
        }

        .about-contact-label {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.28em;
            color: #72727b;
            margin-bottom: 10px;
        }

        .about-contact-value,
        .about-contact-value a {
            color: #f5f5f5;
            text-decoration: none;
            font-size: 16px;
            line-height: 1.8;
            word-break: break-word;
        }

        .about-contact-value a:hover {
            color: #ffffff;
        }

        .skills-layout {
            height: 100%;
            display: grid;
            grid-template-rows: auto 1fr;
            gap: 28px;
            align-items: center;
        }

        .skills-head {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 30px;
        }

        .skills-title {
            font-size: clamp(2.4rem, 5.3vw, 4.8rem);
            line-height: 0.95;
            font-weight: 800;
            letter-spacing: -0.05em;
        }

        .skills-cloud {
            display: flex;
            flex-wrap: wrap;
            align-content: center;
            gap: 18px 18px;
            max-height: 70vh;
            overflow: hidden;
        }

        .skill-chip {
            display: inline-flex;
            align-items: center;
            gap: 14px;
            padding: 14px 18px;
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 999px;
            background: rgba(255,255,255,0.02);
            color: #fff;
            min-width: fit-content;
            transition: 0.35s ease;
            backdrop-filter: blur(8px);
        }

        .skill-chip:hover {
            transform: translateY(-4px) scale(1.01);
            border-color: rgba(255,255,255,0.18);
            background: rgba(255,255,255,0.05);
        }

        .skill-index {
            color: #6b7280;
            font-size: 10px;
            letter-spacing: 0.25em;
            text-transform: uppercase;
        }

        .skill-name {
            font-size: 15px;
            font-weight: 600;
            color: #ffffff;
        }

        .skill-desc {
            color: #8f8f98;
            font-size: 12px;
            max-width: 210px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .education-layout {
            height: 100%;
            display: grid;
            grid-template-columns: 0.66fr 1.34fr;
            gap: 56px;
            align-items: center;
        }

        .education-title {
            font-size: clamp(2.3rem, 5vw, 4.7rem);
            line-height: 0.95;
            font-weight: 800;
            letter-spacing: -0.05em;
        }

        .education-timeline {
            position: relative;
            display: flex;
            flex-direction: column;
            gap: 28px;
            max-height: 76vh;
            overflow: hidden;
            padding-left: 34px;
        }

        .education-timeline::before {
            content: "";
            position: absolute;
            left: 8px;
            top: 0;
            width: 1px;
            height: 100%;
            background: linear-gradient(180deg, rgba(255,255,255,0.28), transparent);
        }

        .education-item {
            position: relative;
        }

        .education-item::before {
            content: "";
            position: absolute;
            left: -30px;
            top: 8px;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #fff;
            box-shadow: 0 0 18px rgba(255,255,255,0.25);
        }

        .education-years {
            font-size: 11px;
            color: #71717a;
            letter-spacing: 0.24em;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .education-school {
            font-size: 23px;
            font-weight: 700;
            color: #fff;
        }

        .education-major {
            margin-top: 8px;
            color: #b4b4bc;
            font-size: 14px;
        }

        .experience-layout {
            height: 100%;
            display: grid;
            grid-template-rows: auto 1fr;
            gap: 34px;
        }

        .experience-head {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 32px;
        }

        .experience-title {
            font-size: clamp(2.4rem, 5.5vw, 4.8rem);
            line-height: 0.95;
            font-weight: 800;
            letter-spacing: -0.05em;
        }

        .experience-list {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 26px 34px;
            max-height: 68vh;
            overflow: hidden;
        }

        .experience-item {
            padding-top: 14px;
            border-top: 1px solid rgba(255,255,255,0.08);
            position: relative;
        }

        .experience-item::before {
            content: "";
            position: absolute;
            left: 0;
            top: -1px;
            width: 68px;
            height: 1px;
            background: linear-gradient(90deg, rgba(255,255,255,0.9), transparent);
        }

        .experience-year {
            font-size: 11px;
            letter-spacing: 0.24em;
            text-transform: uppercase;
            color: #6b7280;
            margin-bottom: 10px;
        }

        .experience-company {
            font-size: 23px;
            font-weight: 700;
            color: #fff;
        }

        .experience-position {
            margin-top: 8px;
            font-size: 14px;
            color: #d4d4d8;
            font-weight: 500;
        }

        .experience-desc {
            margin-top: 14px;
            font-size: 13px;
            color: #92929a;
            line-height: 1.85;
        }

        /* =========================
           ORGANIZATION - NEW FLOW
           ========================= */
        .organization-layout {
            height: 100%;
            display: grid;
            grid-template-columns: 0.88fr 1.12fr;
            gap: 72px;
            align-items: center;
        }

        .organization-side {
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100%;
        }

        .organization-title {
            font-size: clamp(2.8rem, 6vw, 5.6rem);
            line-height: 0.88;
            font-weight: 800;
            letter-spacing: -0.06em;
            max-width: 500px;
        }

        .organization-side-note {
            margin-top: 24px;
            max-width: 380px;
            color: #85858d;
            font-size: 15px;
            line-height: 2;
        }

        .organization-side-stat {
            margin-top: 38px;
            display: flex;
            align-items: flex-end;
            gap: 18px;
        }

        .organization-side-number {
            font-size: clamp(3rem, 6vw, 5rem);
            line-height: .85;
            font-weight: 800;
            letter-spacing: -0.06em;
            color: #fff;
        }

        .organization-side-label {
            padding-bottom: 8px;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.28em;
            color: #686871;
        }

        .organization-stage {
            position: relative;
            height: 72vh;
            display: flex;
            align-items: center;
        }

        .organization-stage::before {
            content: "";
            position: absolute;
            left: 84px;
            top: 4%;
            bottom: 4%;
            width: 1px;
            background: linear-gradient(
                180deg,
                transparent 0%,
                rgba(255,255,255,0.12) 12%,
                rgba(255,255,255,0.22) 50%,
                rgba(255,255,255,0.08) 82%,
                transparent 100%
            );
        }

        .organization-stack {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 34px;
            max-height: 100%;
            overflow: hidden;
        }

        .organization-flow-item {
            display: grid;
            grid-template-columns: 112px minmax(0, 1fr);
            gap: 30px;
            align-items: start;
            position: relative;
            padding-left: 0;
        }

        .organization-flow-year {
            position: relative;
            font-size: 12px;
            color: #74747d;
            letter-spacing: 0.26em;
            text-transform: uppercase;
            padding-top: 6px;
        }

        .organization-flow-year::after {
            content: "";
            position: absolute;
            right: -10px;
            top: 10px;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: radial-gradient(circle, #ffffff 0%, #d4d4d8 52%, #7c7c84 100%);
            box-shadow: 0 0 18px rgba(255,255,255,0.16);
        }

        .organization-flow-content {
            position: relative;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(255,255,255,0.07);
            transition: transform .38s ease, border-color .38s ease;
        }

        .organization-flow-item:hover .organization-flow-content {
            transform: translateX(8px);
            border-color: rgba(255,255,255,0.16);
        }

        .organization-flow-top {
            display: flex;
            align-items: baseline;
            justify-content: space-between;
            gap: 20px;
        }

        .organization-name {
            font-size: clamp(1.6rem, 2.3vw, 2.4rem);
            line-height: 1.08;
            font-weight: 700;
            color: #fff;
            letter-spacing: -0.04em;
            max-width: 560px;
        }

        .organization-role {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.22em;
            color: #8b8b94;
            white-space: nowrap;
            padding-top: 8px;
        }

        .organization-desc {
            margin-top: 14px;
            max-width: 620px;
            color: #9a9aa2;
            font-size: 14px;
            line-height: 1.95;
        }

        /* ======================
           PROJECTS - NEW FLOW
           ====================== */
        .projects-layout {
            height: 100%;
            display: grid;
            grid-template-columns: 0.9fr 1.1fr;
            gap: 72px;
            align-items: center;
        }

        .projects-side {
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100%;
        }

        .projects-title {
            font-size: clamp(2.8rem, 6vw, 5.8rem);
            line-height: 0.88;
            font-weight: 800;
            letter-spacing: -0.065em;
            max-width: 520px;
        }

        .projects-note {
            margin-top: 24px;
            max-width: 380px;
            color: #86868f;
            font-size: 15px;
            line-height: 2;
        }

        .projects-stage {
            position: relative;
            height: 72vh;
            display: flex;
            align-items: center;
        }

        .projects-grid-flow {
            width: 100%;
            display: grid;
            grid-template-columns: 1.12fr 0.88fr;
            grid-template-rows: repeat(2, minmax(0, 1fr));
            gap: 28px 42px;
            height: 100%;
            max-height: 100%;
            overflow: hidden;
        }

        .project-featured-flow {
            grid-row: 1 / span 2;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            position: relative;
            padding: 0 0 18px 0;
            border-bottom: 1px solid rgba(255,255,255,0.09);
            transition: transform .42s ease, border-color .42s ease;
        }

        .project-featured-flow::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            width: 1px;
            height: 160px;
            background: linear-gradient(180deg, rgba(255,255,255,0.22), transparent);
        }

        .project-featured-flow:hover {
            transform: translateY(-4px);
            border-color: rgba(255,255,255,0.18);
        }

        .project-featured-label {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.30em;
            color: #70707a;
            margin-bottom: 18px;
            padding-left: 18px;
        }

        .project-featured-type {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.28em;
            color: #8e8e97;
            margin-bottom: 18px;
            padding-left: 18px;
        }

        .project-featured-name {
            font-size: clamp(2.6rem, 4.7vw, 4.7rem);
            line-height: 0.9;
            font-weight: 800;
            letter-spacing: -0.06em;
            color: #fff;
            max-width: 620px;
            padding-left: 18px;
        }

        .project-featured-desc {
            margin-top: 24px;
            max-width: 520px;
            font-size: 15px;
            line-height: 2;
            color: #a2a2aa;
            padding-left: 18px;
        }

        .project-featured-meta {
            display: flex;
            gap: 24px;
            flex-wrap: wrap;
            margin-top: 28px;
            padding-left: 18px;
        }

        .project-meta-inline {
            font-size: 11px;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: #6e6e77;
        }

        .project-meta-inline span {
            color: #f1f1f3;
            margin-left: 8px;
            letter-spacing: 0.06em;
        }

        .projects-list-flow {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            gap: 26px;
            height: 100%;
        }

        .project-line-item {
            position: relative;
            padding-bottom: 18px;
            border-bottom: 1px solid rgba(255,255,255,0.07);
            transition: transform .38s ease, border-color .38s ease;
        }

        .project-line-item::before {
            content: "";
            position: absolute;
            left: 0;
            bottom: -1px;
            width: 0;
            height: 1px;
            background: linear-gradient(90deg, rgba(255,255,255,0.92), transparent);
            transition: width .42s ease;
        }

        .project-line-item:hover {
            transform: translateX(8px);
            border-color: rgba(255,255,255,0.14);
        }

        .project-line-item:hover::before {
            width: 110px;
        }

        .project-line-type {
            font-size: 10px;
            letter-spacing: 0.26em;
            text-transform: uppercase;
            color: #6d6d76;
            margin-bottom: 12px;
        }

        .project-line-name {
            font-size: clamp(1.35rem, 2vw, 2rem);
            font-weight: 700;
            line-height: 1.12;
            letter-spacing: -0.035em;
            color: #fff;
            margin-bottom: 12px;
            max-width: 420px;
        }

        .project-line-desc {
            font-size: 13px;
            line-height: 1.9;
            color: #94949d;
            max-width: 420px;
        }

        @media (max-width: 1180px) {
            .hero-layout,
            .education-layout,
            .organization-layout,
            .projects-layout {
                grid-template-columns: 1fr;
                gap: 28px;
            }

            .about-layout {
                grid-template-columns: 1fr;
                gap: 24px;
            }

            .about-rule-wrap {
                display: none;
            }

            .experience-list {
                grid-template-columns: 1fr;
            }

            .hero-visual {
                justify-content: flex-start;
            }

            .photo-wrap {
                width: 310px;
                height: 310px;
            }

            .profile-photo {
                width: 240px;
                max-height: 340px;
            }

            .about-right {
                gap: 26px;
            }

            .about-quote-mark {
                right: 0;
                top: -12px;
            }

            .organization-stage,
            .projects-stage {
                height: auto;
                max-height: 72vh;
            }

            .projects-grid-flow {
                grid-template-columns: 1fr;
                grid-template-rows: auto;
                height: auto;
            }

            .project-featured-flow {
                grid-row: auto;
            }

            .projects-list-flow {
                height: auto;
            }
        }

        @media (max-width: 900px) {
            .floating-nav {
                top: 22px;
                right: 20px;
                gap: 12px;
                max-width: calc(100% - 70px);
            }

            .nav-btn {
                font-size: 13px;
            }

            .slide {
                padding: 92px 20px 24px;
            }

            .skills-head,
            .experience-head {
                flex-direction: column;
                align-items: flex-start;
            }

            .experience-list {
                grid-template-columns: 1fr;
            }

            .cursor-glow {
                width: 240px;
                height: 240px;
            }

            .about-content-bottom {
                grid-template-columns: 1fr;
                gap: 4px;
            }

            .organization-stage::before {
                left: 62px;
            }

            .organization-flow-item {
                grid-template-columns: 86px minmax(0, 1fr);
                gap: 24px;
            }
        }

        @media (max-width: 640px) {
            .hero-name {
                font-size: 3rem;
            }

            .about-text,
            .experience-desc,
            .organization-desc,
            .project-line-desc,
            .project-featured-desc {
                font-size: 13px;
            }

            .photo-wrap {
                width: 250px;
                height: 250px;
            }

            .profile-photo {
                width: 200px;
                max-height: 300px;
            }

            .skills-cloud {
                gap: 12px;
            }

            .skill-chip {
                width: 100%;
                justify-content: space-between;
            }

            .about-side-title {
                font-size: 3.5rem;
            }

            .about-contact-value,
            .about-contact-value a {
                font-size: 14px;
            }

            .organization-stage::before {
                left: 52px;
            }

            .organization-flow-item {
                grid-template-columns: 74px minmax(0, 1fr);
                gap: 18px;
            }

            .organization-name {
                font-size: 1.35rem;
            }

            .project-featured-name {
                font-size: 2.4rem;
            }

            .project-line-name {
                font-size: 1.25rem;
            }

            .organization-flow-top {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }
        }
    </style>
</head>
<body class="selection:bg-white selection:text-black">
    <div class="page-bg"></div>
    <div class="cursor-glow" id="cursorGlow"></div>

    @auth
        <a href="{{ route('admin.profile.index') }}" class="secret-entry" aria-label="Dashboard"></a>
    @else
        <a href="{{ route('login') }}" class="secret-entry" aria-label="Login"></a>
    @endauth

    <div class="site-shell">
        <nav class="floating-nav">
            <button type="button" class="nav-btn active" data-slide="hero">Home</button>
            <button type="button" class="nav-btn" data-slide="about">About</button>
            <button type="button" class="nav-btn" data-slide="skills">Skills</button>
            <button type="button" class="nav-btn" data-slide="education">Education</button>
            <button type="button" class="nav-btn" data-slide="experience">Experience</button>
            <button type="button" class="nav-btn" data-slide="organization">Organization</button>
            <button type="button" class="nav-btn" data-slide="projects">Projects</button>
        </nav>

        <main class="viewport">
            {{-- HOME --}}
            <section id="slide-hero" class="slide slide-hero active">
                <div class="slide-content hero-layout">
                    <div class="hero-copy">
                        <div class="eyebrow reveal delay-1">Digital Identity</div>
                        <h1 id="hero-name" class="hero-name metal-text reveal delay-2">Loading...</h1>
                        <div id="hero-title" class="hero-role reveal delay-3">Loading...</div>
                    </div>

                    <div class="hero-visual">
                        <div class="photo-wrap reveal delay-4" id="photoWrap">
                            <div class="photo-depth-glow"></div>
                            <div class="photo-3d" id="photo3d">
                                <img
                                    id="profile-photo"
                                    src="https://via.placeholder.com/300x300?text=Photo"
                                    alt="Profile Photo"
                                    class="profile-photo"
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- ABOUT --}}
            <section id="slide-about" class="slide slide-about">
                <div class="slide-content about-layout">
                    <div class="about-left">
                        <div class="eyebrow about-eyebrow reveal delay-1">About</div>
                        <h2 class="about-side-title metal-text reveal delay-2">STORY<br>& VISION</h2>
                        <p class="about-note reveal delay-3">
                            Sebuah ruang singkat untuk menggambarkan cara saya belajar, berkembang, dan membangun identitas di bidang teknologi.
                        </p>
                    </div>

                    <div class="about-rule-wrap">
                        <div class="about-rule"></div>
                    </div>

                    <div class="about-right">
                        <div class="about-quote-mark reveal delay-3">“</div>

                        <div class="about-content-top reveal delay-4">
                            <div class="about-kicker">Personal Overview</div>
                            <div id="profile-about" class="about-text">Loading...</div>
                        </div>

                        <div class="about-content-bottom reveal delay-5">
                            <div class="about-contact-item reveal delay-5">
                                <div class="about-contact-label">Phone</div>
                                <div id="about-phone" class="about-contact-value">Loading...</div>
                            </div>

                            <div class="about-contact-item reveal delay-6">
                                <div class="about-contact-label">Email</div>
                                <div id="about-email" class="about-contact-value">Loading...</div>
                            </div>

                            <div class="about-contact-item reveal delay-6">
                                <div class="about-contact-label">Instagram</div>
                                <div id="about-instagram" class="about-contact-value">Loading...</div>
                            </div>

                            <div class="about-contact-item reveal delay-7">
                                <div class="about-contact-label">Address</div>
                                <div id="about-address" class="about-contact-value">Loading...</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- SKILLS --}}
            <section id="slide-skills" class="slide slide-skills">
                <div class="slide-content skills-layout">
                    <div class="skills-head">
                        <div>
                            <div class="eyebrow reveal delay-1">Skills</div>
                            <h2 class="skills-title metal-text reveal delay-2">WHAT I CAN DO</h2>
                        </div>
                        <p class="section-note reveal delay-3">
                            Kemampuan yang saya pelajari dari praktik, eksplorasi, dan proses membangun sesuatu.
                        </p>
                    </div>

                    <div id="skills-list" class="skills-cloud"></div>
                </div>
            </section>

            {{-- EDUCATION --}}
            <section id="slide-education" class="slide slide-education">
                <div class="slide-content education-layout">
                    <div>
                        <div class="eyebrow reveal delay-1">Education</div>
                        <h2 class="education-title metal-text reveal delay-2">ACADEMIC<br>PATH</h2>
                        <p class="section-note reveal delay-3" style="margin-top:20px;">
                            Jejak pendidikan yang membentuk fondasi pengetahuan, pola pikir, dan arah perjalanan saya.
                        </p>
                    </div>

                    <div id="educations-list" class="education-timeline"></div>
                </div>
            </section>

            {{-- EXPERIENCE --}}
            <section id="slide-experience" class="slide slide-experience">
                <div class="slide-content experience-layout">
                    <div class="experience-head">
                        <div>
                            <div class="eyebrow reveal delay-1">Experience</div>
                            <h2 class="experience-title metal-text reveal delay-2">REAL WORK<br>EXPERIENCE</h2>
                        </div>
                        <p class="section-note reveal delay-3">
                            Pengalaman yang membantu saya memahami ritme kerja nyata, tanggung jawab, dan adaptasi.
                        </p>
                    </div>

                    <div id="experiences-list" class="experience-list"></div>
                </div>
            </section>

            {{-- ORGANIZATION --}}
            <section id="slide-organization" class="slide slide-organization">
                <div class="slide-content organization-layout">
                    <div class="organization-side">
                        <div class="eyebrow reveal delay-1">Organization</div>
                        <h2 class="organization-title metal-text reveal delay-2">LEADERSHIP<br>FLOW</h2>
                        <p class="organization-side-note reveal delay-3">
                            Pengalaman organisasi yang mengalir sebagai proses belajar, kolaborasi, komunikasi, dan tanggung jawab.
                        </p>
                    </div>

                    <div class="organization-stage">
                        <div id="organizations-list" class="organization-stack"></div>
                    </div>
                </div>
            </section>

            {{-- PROJECTS --}}
            <section id="slide-projects" class="slide slide-projects">
                <div class="slide-content projects-layout">
                    <div class="projects-side">
                        <div class="eyebrow reveal delay-1">Projects</div>
                        <h2 class="projects-title metal-text reveal delay-2">SELECTED<br>WORKS</h2>
                        <p class="projects-note reveal delay-3">
                            Kumpulan proyek yang merepresentasikan eksplorasi, implementasi, dan style saya dalam membangun sesuatu.
                        </p>
                    </div>

                    <div class="projects-stage">
                        <div id="projects-list" class="projects-grid-flow"></div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script>
        function safeArray(value) {
            return Array.isArray(value) ? value : [];
        }

        function setText(id, value, fallback = '-') {
            const el = document.getElementById(id);
            if (el) {
                el.textContent = value && value !== '' ? value : fallback;
            }
        }

        function setHtml(id, value, fallback = '-') {
            const el = document.getElementById(id);
            if (el) {
                el.innerHTML = value && value !== '' ? value : fallback;
            }
        }

        function renderEmptyText(containerId, message) {
            const container = document.getElementById(containerId);
            if (!container) return;
            container.innerHTML = `<div class="empty-state reveal delay-4">${message}</div>`;
        }

        function makeRevealDelay(index, base = 4, cycle = 4) {
            const step = (index % cycle) + base;
            return `reveal delay-${Math.min(step, 7)}`;
        }

        function resetRevealState(slide) {
            const revealItems = slide.querySelectorAll('.reveal');

            revealItems.forEach(el => {
                el.style.transition = 'none';
                el.style.opacity = '0';
                el.style.filter = 'blur(10px)';

                if (slide.classList.contains('slide-about')) {
                    if (el.classList.contains('about-eyebrow') || el.classList.contains('about-note')) {
                        el.style.transform = 'translateY(24px)';
                    } else if (el.classList.contains('about-side-title')) {
                        el.style.transform = 'translateY(52px) scale(.95)';
                    } else if (el.classList.contains('about-content-top')) {
                        el.style.transform = 'translateX(58px)';
                    } else if (el.classList.contains('about-content-bottom')) {
                        el.style.transform = 'translateY(26px)';
                    } else if (el.classList.contains('about-contact-item')) {
                        el.style.transform = 'translateY(22px)';
                        el.style.clipPath = 'inset(0 0 100% 0)';
                    } else if (el.classList.contains('about-quote-mark')) {
                        el.style.transform = 'scale(.85) translateY(18px)';
                    } else {
                        el.style.transform = 'translateY(22px)';
                    }
                } else if (slide.classList.contains('slide-skills')) {
                    el.style.transform = 'scale(.92)';
                } else if (slide.classList.contains('slide-education')) {
                    el.style.transform = 'translateY(24px)';
                    el.style.clipPath = 'inset(0 0 100% 0)';
                } else if (slide.classList.contains('slide-experience')) {
                    el.style.transform = 'translateX(52px)';
                } else if (slide.classList.contains('slide-organization')) {
                    el.style.transform = 'translateY(24px)';
                } else if (slide.classList.contains('slide-projects')) {
                    el.style.transform = 'translateY(24px)';
                } else {
                    el.style.transform = 'translateY(34px) scale(.985)';
                }

                void el.offsetWidth;
                el.style.transition = '';
                el.style.opacity = '';
                el.style.filter = '';
                el.style.transform = '';
                el.style.clipPath = '';
            });

            if (slide.classList.contains('slide-about')) {
                const aboutRule = slide.querySelector('.about-rule');
                if (aboutRule) {
                    aboutRule.style.transition = 'none';
                    aboutRule.style.opacity = '0';
                    aboutRule.style.filter = 'blur(2px)';
                    aboutRule.style.transform = 'scaleY(0)';
                    void aboutRule.offsetWidth;
                    aboutRule.style.transition = '';
                    aboutRule.style.opacity = '';
                    aboutRule.style.filter = '';
                    aboutRule.style.transform = '';
                }
            }
        }

        function changeSlide(target) {
            const slides = document.querySelectorAll('.slide');
            const navButtons = document.querySelectorAll('.nav-btn');

            slides.forEach(slide => slide.classList.remove('active'));
            navButtons.forEach(btn => btn.classList.remove('active'));

            const targetSlide = document.getElementById(`slide-${target}`);
            const targetButtons = document.querySelectorAll(`.nav-btn[data-slide="${target}"]`);

            if (targetSlide) {
                resetRevealState(targetSlide);
                targetSlide.classList.add('active');
            }

            targetButtons.forEach(btn => btn.classList.add('active'));
        }

        function formatInstagram(value) {
            if (!value || value.trim() === '') return '-';

            let username = value.trim();

            if (username.startsWith('http://') || username.startsWith('https://')) {
                return `<a href="${username}" target="_blank">${username}</a>`;
            }

            username = username.replace(/^@/, '');
            return `<a href="https://instagram.com/${username}" target="_blank">@${username}</a>`;
        }

        function formatEmail(value) {
            if (!value || value.trim() === '') return '-';
            return `<a href="mailto:${value}">${value}</a>`;
        }

        function formatPhone(value) {
            if (!value || value.trim() === '') return '-';
            return `<a href="tel:${value}">${value}</a>`;
        }

        async function loadPortofolio() {
            try {
                const response = await fetch('/api/portofolio', {
                    headers: {
                        'Accept': 'application/json'
                    }
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }

                const data = await response.json();
                const profile = data.profile ?? null;

                if (profile) {
                    setText('hero-name', profile.name, 'Nama belum tersedia');
                    setText('hero-title', profile.title, 'Title belum tersedia');

                    setText('profile-about', profile.about, 'Deskripsi belum tersedia');
                    setHtml('about-phone', formatPhone(profile.phone));
                    setHtml('about-email', formatEmail(profile.email));
                    setHtml('about-instagram', formatInstagram(profile.instagram));
                    setText('about-address', profile.address, '-');

                    if (profile.photo && profile.photo !== '') {
                        const photo = document.getElementById('profile-photo');
                        if (photo) {
                            photo.src = `/storage/${profile.photo}`;
                        }
                    }
                } else {
                    setText('hero-name', 'Data profil belum ada');
                    setText('hero-title', 'Silakan isi data profil di dashboard admin');

                    setText('profile-about', 'Data tentang saya belum tersedia.');
                    setText('about-phone', '-');
                    setText('about-email', '-');
                    setText('about-instagram', '-');
                    setText('about-address', '-');
                }

                const skills = safeArray(data.skills);
                const educations = safeArray(data.educations);
                const experiences = safeArray(data.experiences);
                const organizations = safeArray(data.organizations);
                const projects = safeArray(data.projects);

                const skillsList = document.getElementById('skills-list');
                skillsList.innerHTML = '';

                if (skills.length > 0) {
                    skills.forEach((skill, index) => {
                        skillsList.innerHTML += `
                            <div class="skill-chip ${makeRevealDelay(index, 4, 4)}">
                                <div>
                                    <div class="skill-name">${skill.skill_name || '-'}</div>
                                </div>
                                <div class="skill-desc">${skill.description || 'Skill description'}</div>
                            </div>
                        `;
                    });
                } else {
                    renderEmptyText('skills-list', 'Data skill belum tersedia.');
                }

                const educationsList = document.getElementById('educations-list');
                educationsList.innerHTML = '';

                if (educations.length > 0) {
                    educations.forEach((education, index) => {
                        educationsList.innerHTML += `
                            <div class="education-item ${makeRevealDelay(index, 4, 4)}">
                                <div class="education-years">${education.start_year || '-'} - ${education.end_year || '-'}</div>
                                <div class="education-school">${education.institution || '-'}</div>
                                <div class="education-major">${education.major || '-'}</div>
                            </div>
                        `;
                    });
                } else {
                    renderEmptyText('educations-list', 'Data pendidikan belum tersedia.');
                }

                const experiencesList = document.getElementById('experiences-list');
                experiencesList.innerHTML = '';

                if (experiences.length > 0) {
                    experiences.forEach((experience, index) => {
                        experiencesList.innerHTML += `
                            <div class="experience-item ${makeRevealDelay(index, 4, 4)}">
                                <div class="experience-year">${experience.year || '-'}</div>
                                <div class="experience-company">${experience.company || '-'}</div>
                                <div class="experience-position">${experience.position || '-'}</div>
                                <div class="experience-desc">${experience.description || 'Tidak ada deskripsi pengalaman.'}</div>
                            </div>
                        `;
                    });
                } else {
                    renderEmptyText('experiences-list', 'Data pengalaman belum tersedia.');
                }

                const organizationsList = document.getElementById('organizations-list');
                organizationsList.innerHTML = '';
                setText('organization-total', String(organizations.length).padStart(2, '0'), '00');

                if (organizations.length > 0) {
                    organizations.forEach((org, index) => {
                        organizationsList.innerHTML += `
                            <article class="organization-flow-item ${makeRevealDelay(index, 4, 4)}">
                                <div class="organization-flow-year">${org.year || '-'}</div>
                                <div class="organization-flow-content">
                                    <div class="organization-flow-top">
                                        <div class="organization-name">${org.organization_name || '-'}</div>
                                        <div class="organization-role">${org.role || '-'}</div>
                                    </div>
                                    <div class="organization-desc">${org.description || 'Tidak ada deskripsi organisasi.'}</div>
                                </div>
                            </article>
                        `;
                    });
                } else {
                    renderEmptyText('organizations-list', 'Data organisasi belum tersedia.');
                }

                const projectsList = document.getElementById('projects-list');
                projectsList.innerHTML = '';

                if (projects.length > 0) {
                    const featured = projects[0];
                    const sideProjects = projects.slice(1, 4);

                    let sideHtml = '';
                    if (sideProjects.length > 0) {
                        sideProjects.forEach((project, index) => {
                            sideHtml += `
                                <article class="project-line-item ${makeRevealDelay(index + 1, 4, 4)}">
                                    <div class="project-line-type">${project.project_type || '-'}</div>
                                    <div class="project-line-name">${project.project_name || '-'}</div>
                                    <div class="project-line-desc">${project.description || 'Tidak ada deskripsi proyek.'}</div>
                                </article>
                            `;
                        });
                    } else {
                        sideHtml = `
                            <div class="empty-state reveal delay-5">
                                Belum ada project tambahan untuk ditampilkan.
                            </div>
                        `;
                    }

                    projectsList.innerHTML = `
                        <article class="project-featured-flow ${makeRevealDelay(0, 4, 4)}">
                            <div class="project-featured-label">Featured Project</div>
                            <div class="project-featured-type">${featured.project_type || 'Project'}</div>
                            <div class="project-featured-name">${featured.project_name || '-'}</div>
                            <div class="project-featured-desc">${featured.description || 'Tidak ada deskripsi proyek.'}</div>
                            <div class="project-featured-meta">
                            </div>
                        </article>

                        <div class="projects-list-flow">
                            ${sideHtml}
                        </div>
                    `;
                } else {
                    renderEmptyText('projects-list', 'Data proyek belum tersedia.');
                }
            } catch (error) {
                console.error('Error loading portofolio:', error);

                setText('hero-name', 'Gagal memuat data');
                setText('hero-title', 'Periksa route, controller, dan database');

                setText('profile-about', 'Terjadi kesalahan saat mengambil data dari server.');
                setText('about-phone', '-');
                setText('about-email', '-');
                setText('about-instagram', '-');
                setText('about-address', '-');
                setText('organization-total', '00');

                renderEmptyText('skills-list', 'Gagal memuat data skill.');
                renderEmptyText('educations-list', 'Gagal memuat data pendidikan.');
                renderEmptyText('experiences-list', 'Gagal memuat data pengalaman.');
                renderEmptyText('organizations-list', 'Gagal memuat data organisasi.');
                renderEmptyText('projects-list', 'Gagal memuat data proyek.');
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            loadPortofolio();

            const triggers = document.querySelectorAll('[data-slide]');
            triggers.forEach(trigger => {
                trigger.addEventListener('click', () => {
                    const target = trigger.getAttribute('data-slide');
                    changeSlide(target);
                });
            });

            const glow = document.getElementById('cursorGlow');
            window.addEventListener('mousemove', (e) => {
                glow.style.left = `${e.clientX}px`;
                glow.style.top = `${e.clientY}px`;
            });

            window.addEventListener('mouseleave', () => {
                glow.style.opacity = '0';
            });

            window.addEventListener('mouseenter', () => {
                glow.style.opacity = '0.9';
            });

            const photoWrap = document.getElementById('photoWrap');
            const photo3d = document.getElementById('photo3d');

            if (photoWrap && photo3d) {
                photoWrap.addEventListener('mousemove', (e) => {
                    const rect = photoWrap.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;

                    const centerX = rect.width / 2;
                    const centerY = rect.height / 2;

                    const rotateY = ((x - centerX) / centerX) * 10;
                    const rotateX = ((centerY - y) / centerY) * 10;

                    photo3d.style.transform = `
                        translateY(-6px)
                        rotateX(${rotateX}deg)
                        rotateY(${rotateY}deg)
                        scale(1.03)
                    `;
                });

                photoWrap.addEventListener('mouseleave', () => {
                    photo3d.style.transform = '';
                });
            }
        });
    </script>
</body>
</html>