<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg: #0a0a0f;
            --bg2: #111118;
            --accent: #c8f065;
            --accent2: #7c5cfc;
            --text: #e8e8f0;
            --muted: #666680;
            --border: rgba(200,240,101,0.12);
            --card: rgba(255,255,255,0.03);
        }

        html { scroll-behavior: smooth; }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            overflow-x: hidden;
        }

        /* NOISE TEXTURE */
        body::before {
            content: '';
            position: fixed; inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
            pointer-events: none; z-index: 0;
        }

        /* NAV */
        nav {
            position: fixed; top: 0; left: 0; right: 0;
            padding: 1.5rem 5%;
            display: flex; align-items: center; justify-content: space-between;
            border-bottom: 1px solid var(--border);
            backdrop-filter: blur(20px);
            background: rgba(10,10,15,0.8);
            z-index: 100;
        }

        .nav-logo {
            font-family: 'Syne', sans-serif;
            font-size: 1.4rem; font-weight: 800;
            color: var(--accent);
            letter-spacing: -0.02em;
        }

        .nav-links { display: flex; gap: 2.5rem; list-style: none; }
        .nav-links a {
            color: var(--muted); text-decoration: none;
            font-size: 0.9rem; font-weight: 500;
            transition: color 0.2s;
        }
        .nav-links a:hover { color: var(--text); }

        /* HERO */
        .hero {
            min-height: 100vh;
            display: flex; align-items: center;
            padding: 8rem 5% 4rem;
            position: relative;
        }

        .hero-glow {
            position: absolute;
            width: 600px; height: 600px;
            background: radial-gradient(circle, rgba(124,92,252,0.15) 0%, transparent 70%);
            top: 50%; left: 50%;
            transform: translate(-50%, -50%);
            pointer-events: none;
        }

        .hero-inner {
            max-width: 1200px; width: 100%;
            margin: 0 auto;
            display: grid; grid-template-columns: 1fr 1fr;
            gap: 4rem; align-items: center;
        }

        .hero-tag {
            display: inline-flex; align-items: center; gap: 0.5rem;
            background: rgba(200,240,101,0.08);
            border: 1px solid var(--border);
            color: var(--accent);
            padding: 0.4rem 1rem; border-radius: 99px;
            font-size: 0.8rem; font-weight: 500;
            margin-bottom: 1.5rem;
        }

        .hero-tag span { width: 6px; height: 6px; background: var(--accent); border-radius: 50%; animation: pulse 2s infinite; }

        @keyframes pulse { 0%,100% { opacity:1; } 50% { opacity:0.3; } }

        .hero-name {
            font-family: 'Syne', sans-serif;
            font-size: clamp(3rem, 6vw, 5.5rem);
            font-weight: 800;
            line-height: 1.0;
            letter-spacing: -0.03em;
            margin-bottom: 1rem;
        }

        .hero-name .line2 { color: var(--accent); }

        .hero-desc {
            color: var(--muted);
            font-size: 1.1rem;
            line-height: 1.7;
            max-width: 480px;
            margin-bottom: 2.5rem;
        }

        .hero-cta { display: flex; gap: 1rem; flex-wrap: wrap; }

        .btn-primary {
            background: var(--accent); color: #0a0a0f;
            padding: 0.85rem 2rem; border-radius: 8px;
            font-weight: 600; font-size: 0.95rem;
            text-decoration: none;
            transition: all 0.2s;
            display: inline-flex; align-items: center; gap: 0.5rem;
        }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 8px 30px rgba(200,240,101,0.3); }

        .btn-outline {
            border: 1px solid var(--border); color: var(--text);
            padding: 0.85rem 2rem; border-radius: 8px;
            font-weight: 500; font-size: 0.95rem;
            text-decoration: none;
            transition: all 0.2s;
        }
        .btn-outline:hover { border-color: var(--accent); color: var(--accent); }

        /* PHOTO */
        .hero-photo-wrap {
            display: flex; justify-content: flex-end;
            position: relative;
        }

        .photo-frame {
            width: 340px; height: 420px;
            border-radius: 24px;
            overflow: hidden;
            border: 1px solid var(--border);
            position: relative;
            background: var(--card);
        }

        .photo-frame::before {
            content: '';
            position: absolute; inset: 0;
            background: linear-gradient(135deg, rgba(124,92,252,0.2), transparent 60%);
            z-index: 1;
        }

        .photo-frame img {
            width: 100%; height: 100%;
            object-fit: cover;
        }

        .photo-placeholder {
            width: 100%; height: 100%;
            display: flex; flex-direction: column;
            align-items: center; justify-content: center;
            gap: 1rem; color: var(--muted);
        }
        .photo-placeholder i { font-size: 4rem; color: var(--accent2); }

        .photo-decoration {
            position: absolute;
            bottom: -20px; right: -20px;
            width: 100px; height: 100px;
            border-radius: 12px;
            background: var(--accent);
            z-index: -1;
        }

        /* SECTIONS */
        section { padding: 6rem 5%; }
        .section-inner { max-width: 1200px; margin: 0 auto; }

        .section-label {
            font-size: 0.75rem; font-weight: 600;
            letter-spacing: 0.15em; text-transform: uppercase;
            color: var(--accent);
            margin-bottom: 0.75rem;
        }

        .section-title {
            font-family: 'Syne', sans-serif;
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            letter-spacing: -0.02em;
            margin-bottom: 3rem;
            line-height: 1.1;
        }

        /* ABOUT */
        #about { background: var(--bg2); }

        .about-grid {
            display: grid; grid-template-columns: 1fr 1fr;
            gap: 4rem; align-items: start;
        }

        .about-text { color: var(--muted); line-height: 1.8; font-size: 1.05rem; }

        .about-stats {
            display: grid; grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .stat-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 1.5rem;
            text-align: center;
        }

        .stat-number {
            font-family: 'Syne', sans-serif;
            font-size: 2.5rem; font-weight: 800;
            color: var(--accent);
        }

        .stat-label { font-size: 0.85rem; color: var(--muted); margin-top: 0.25rem; }

        /* SKILLS */
        .skills-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1rem;
        }

        .skill-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 1.25rem 1.5rem;
            transition: all 0.25s;
            position: relative;
            overflow: hidden;
        }

        .skill-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; height: 2px;
            background: linear-gradient(90deg, var(--accent2), var(--accent));
            opacity: 0; transition: opacity 0.25s;
        }

        .skill-card:hover { border-color: rgba(200,240,101,0.3); transform: translateY(-3px); }
        .skill-card:hover::before { opacity: 1; }

        .skill-name { font-weight: 600; margin-bottom: 0.75rem; }
        .skill-bar-bg {
            height: 4px; background: rgba(255,255,255,0.06);
            border-radius: 99px; overflow: hidden;
        }
        .skill-bar {
            height: 100%;
            background: linear-gradient(90deg, var(--accent2), var(--accent));
            border-radius: 99px;
            width: 0%;
            transition: width 1s ease;
        }
        .skill-level {
            font-size: 0.78rem; color: var(--muted);
            margin-top: 0.5rem;
            text-align: right;
        }

        /* PROJECTS */
        #projects { background: var(--bg2); }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
            gap: 1.5rem;
        }

        .project-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.3s;
        }

        .project-card:hover { border-color: rgba(200,240,101,0.25); transform: translateY(-4px); }

        .project-img {
            width: 100%; height: 200px;
            object-fit: cover;
            background: linear-gradient(135deg, rgba(124,92,252,0.3), rgba(200,240,101,0.1));
            display: flex; align-items: center; justify-content: center;
        }

        .project-img i { font-size: 3rem; color: var(--muted); }

        .project-body { padding: 1.5rem; }
        .project-title {
            font-family: 'Syne', sans-serif;
            font-size: 1.2rem; font-weight: 700;
            margin-bottom: 0.5rem;
        }
        .project-desc { color: var(--muted); font-size: 0.9rem; line-height: 1.6; margin-bottom: 1rem; }
        .project-link {
            color: var(--accent); font-size: 0.85rem; font-weight: 600;
            text-decoration: none;
            display: inline-flex; align-items: center; gap: 0.3rem;
        }
        .project-link:hover { gap: 0.6rem; }

        /* CONTACT */
        .contact-grid {
            display: grid; grid-template-columns: 1fr 1fr;
            gap: 4rem; align-items: start;
        }

        .contact-info { display: flex; flex-direction: column; gap: 1.5rem; }

        .contact-item {
            display: flex; align-items: center; gap: 1rem;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 1.25rem;
        }

        .contact-icon {
            width: 42px; height: 42px;
            background: rgba(200,240,101,0.1);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            color: var(--accent); flex-shrink: 0;
        }

        .contact-detail { font-size: 0.85rem; color: var(--muted); }
        .contact-value { font-weight: 500; color: var(--text); margin-top: 0.15rem; }

        .contact-form-wrapper {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 2rem;
        }

        .form-group { margin-bottom: 1.25rem; }
        .form-group label {
            display: block; font-size: 0.85rem;
            font-weight: 500; color: var(--muted);
            margin-bottom: 0.5rem;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            background: rgba(255,255,255,0.04);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 0.85rem 1rem;
            color: var(--text); font-family: inherit;
            font-size: 0.95rem;
            transition: border-color 0.2s;
            outline: none;
        }
        .form-group input:focus, .form-group textarea:focus {
            border-color: var(--accent);
        }
        .form-group textarea { min-height: 120px; resize: vertical; }

        .form-submit {
            background: var(--accent); color: #0a0a0f;
            border: none; border-radius: 10px;
            padding: 0.85rem 2rem;
            font-weight: 600; font-size: 0.95rem;
            cursor: pointer; width: 100%;
            transition: all 0.2s;
        }
        .form-submit:hover { opacity: 0.9; }

        /* FOOTER */
        footer {
            border-top: 1px solid var(--border);
            padding: 2rem 5%;
            text-align: center;
            color: var(--muted); font-size: 0.85rem;
        }

        /* LOADING */
        .skeleton {
            background: linear-gradient(90deg, rgba(255,255,255,0.04) 25%, rgba(255,255,255,0.08) 50%, rgba(255,255,255,0.04) 75%);
            background-size: 200% 100%;
            animation: shimmer 1.5s infinite;
            border-radius: 8px;
        }
        @keyframes shimmer { 0% { background-position: -200% 0; } 100% { background-position: 200% 0; } }

        .alert {
            padding: 0.75rem 1rem; border-radius: 10px;
            margin-bottom: 1rem; font-size: 0.9rem;
            display: none;
        }
        .alert-success { background: rgba(200,240,101,0.1); color: var(--accent); border: 1px solid rgba(200,240,101,0.2); }
        .alert-error { background: rgba(255,80,80,0.1); color: #ff8080; border: 1px solid rgba(255,80,80,0.2); }

        @media (max-width: 768px) {
            .hero-inner, .about-grid, .contact-grid { grid-template-columns: 1fr; }
            .hero-photo-wrap { justify-content: center; }
            .nav-links { display: none; }
        }
    </style>
</head>
<body>

<nav>
    <div class="nav-logo" id="nav-name">Portfolio</div>
    <ul class="nav-links">
        <li><a href="#about">About</a></li>
        <li><a href="#skills">Skills</a></li>
        <li><a href="#projects">Projects</a></li>
        <li><a href="#contact">Contact</a></li>
    </ul>
    <a href="{{ route('admin.login') }}" class="btn-outline" style="font-size:0.8rem; padding:0.5rem 1rem;">Admin</a>
</nav>

<!-- HERO -->
<section class="hero" id="home">
    <div class="hero-glow"></div>
    <div class="hero-inner">
        <div class="hero-content">
            <div class="hero-tag"><span></span> Open to opportunities</div>
            <h1 class="hero-name">
                <div class="line1" id="hero-name-line1">Loading...</div>
                <div class="line2" id="hero-role"></div>
            </h1>
            <p class="hero-desc" id="hero-desc">—</p>
            <div class="hero-cta">
                <a href="#projects" class="btn-primary"><i class="fas fa-rocket"></i> See My Work</a>
                <a href="#contact" class="btn-outline">Get In Touch</a>
            </div>
        </div>
        <div class="hero-photo-wrap">
            <div style="position:relative">
                <div class="photo-frame" id="photo-frame">
                    <div class="photo-placeholder">
                        <i class="fas fa-user-circle"></i>
                        <span>Loading photo...</span>
                    </div>
                </div>
                <div class="photo-decoration"></div>
            </div>
        </div>
    </div>
</section>

<!-- ABOUT -->
<section id="about">
    <div class="section-inner">
        <div class="section-label">About Me</div>
        <h2 class="section-title">A little bit<br>about myself.</h2>
        <div class="about-grid">
            <div>
                <p class="about-text" id="about-bio">Loading...</p>
            </div>
            <div class="about-stats" id="about-stats">
                <div class="stat-card skeleton" style="height:110px"></div>
                <div class="stat-card skeleton" style="height:110px"></div>
                <div class="stat-card skeleton" style="height:110px"></div>
                <div class="stat-card skeleton" style="height:110px"></div>
            </div>
        </div>
    </div>
</section>

<!-- SKILLS -->
<section id="skills">
    <div class="section-inner">
        <div class="section-label">Expertise</div>
        <h2 class="section-title">Skills &<br>Technologies.</h2>
        <div class="skills-grid" id="skills-container">
            <div class="skill-card skeleton" style="height:90px"></div>
            <div class="skill-card skeleton" style="height:90px"></div>
            <div class="skill-card skeleton" style="height:90px"></div>
            <div class="skill-card skeleton" style="height:90px"></div>
        </div>
    </div>
</section>

<!-- PROJECTS -->
<section id="projects">
    <div class="section-inner">
        <div class="section-label">Portfolio</div>
        <h2 class="section-title">Featured<br>Projects.</h2>
        <div class="projects-grid" id="projects-container">
            <div class="project-card skeleton" style="height:320px"></div>
            <div class="project-card skeleton" style="height:320px"></div>
        </div>
    </div>
</section>

<!-- CONTACT -->
<section id="contact">
    <div class="section-inner">
        <div class="section-label">Get In Touch</div>
        <h2 class="section-title">Let's work<br>together.</h2>
        <div class="contact-grid">
            <div class="contact-info" id="contact-info">
                <div class="stat-card skeleton" style="height:70px"></div>
                <div class="stat-card skeleton" style="height:70px"></div>
                <div class="stat-card skeleton" style="height:70px"></div>
            </div>
            <div class="contact-form-wrapper">
                <div id="form-alert" class="alert"></div>
                <form id="contact-form">
                    @csrf
                    <div class="form-group">
                        <label>Arjun Werdho Kumoro</label>
                        <input type="text" name="name" placeholder="John Doe" required>
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" placeholder="john@email.com" required>
                    </div>
                    <div class="form-group">
                        <label>Subject</label>
                        <input type="text" name="subject" placeholder="Project Collaboration">
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <textarea name="message" placeholder="Tell me about your project..." required></textarea>
                    </div>
                    <button type="submit" class="form-submit" id="form-btn">
                        <i class="fas fa-paper-plane"></i> Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<footer>
    <p>© <span id="year"></span> <span id="footer-name">Portfolio</span>. Built with Laravel &amp; ❤️</p>
</footer>

<script>
document.getElementById('year').textContent = new Date().getFullYear();

const API = {
    profile: '/api/profile',
    skills: '/api/skills',
    projects: '/api/projects',
    contact: '/api/contact'
};

async function fetchData(url) {
    const r = await fetch(url, { headers: { 'Accept': 'application/json' } });
    if (!r.ok) throw new Error(`HTTP ${r.status}`);
    return r.json();
}

// Load Profile
async function loadProfile() {
    try {
        const data = await fetchData(API.profile);
        const p = data.data || data;

        document.getElementById('nav-name').textContent = p.name || 'Portfolio';
        document.getElementById('footer-name').textContent = p.name || 'Portfolio';
        document.getElementById('hero-name-line1').textContent = p.name || 'My Name';
        document.getElementById('hero-role').textContent = p.role || 'Developer';
        document.getElementById('hero-desc').textContent = p.short_bio || '';
        document.getElementById('about-bio').textContent = p.bio || p.short_bio || '';

        // Photo
        const frame = document.getElementById('photo-frame');
        if (p.photo) {
            frame.innerHTML = `<img src="/storage/${p.photo}" alt="${p.name}">`;
        } else {
            frame.innerHTML = `<div class="photo-placeholder"><i class="fas fa-user-circle"></i><span>${p.name || 'No Photo'}</span></div>`;
        }

        // Stats
        document.getElementById('about-stats').innerHTML = `
            <div class="stat-card"><div class="stat-number">${p.experience_years || '0'}+</div><div class="stat-label">Years Exp.</div></div>
            <div class="stat-card"><div class="stat-number">${p.projects_done || '0'}+</div><div class="stat-label">Projects Done</div></div>
            <div class="stat-card"><div class="stat-number">${p.clients || '0'}+</div><div class="stat-label">Clients</div></div>
            <div class="stat-card"><div class="stat-number">100%</div><div class="stat-label">Dedication</div></div>
        `;

        // Contact info
        document.getElementById('contact-info').innerHTML = `
            ${p.email ? `<div class="contact-item"><div class="contact-icon"><i class="fas fa-envelope"></i></div><div><div class="contact-detail">Email</div><div class="contact-value">${p.email}</div></div></div>` : ''}
            ${p.phone ? `<div class="contact-item"><div class="contact-icon"><i class="fas fa-phone"></i></div><div><div class="contact-detail">Phone</div><div class="contact-value">${p.phone}</div></div></div>` : ''}
            ${p.location ? `<div class="contact-item"><div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div><div><div class="contact-detail">Location</div><div class="contact-value">${p.location}</div></div></div>` : ''}
            ${p.github ? `<div class="contact-item"><div class="contact-icon"><i class="fab fa-github"></i></div><div><div class="contact-detail">GitHub</div><div class="contact-value">${p.github}</div></div></div>` : ''}
        `;

        document.title = `${p.name || 'Portfolio'} — ${p.role || ''}`;
    } catch(e) {
        console.error('Profile load error:', e);
    }
}

// Load Skills
async function loadSkills() {
    try {
        const data = await fetchData(API.skills);
        const skills = data.data || data;
        const container = document.getElementById('skills-container');
        if (!skills.length) { container.innerHTML = '<p style="color:var(--muted)">No skills yet.</p>'; return; }
        container.innerHTML = skills.map(s => `
            <div class="skill-card">
                <div class="skill-name">${s.name}</div>
                <div class="skill-bar-bg"><div class="skill-bar" data-level="${s.level || 0}"></div></div>
                <div class="skill-level">${s.level || 0}%</div>
            </div>
        `).join('');
        setTimeout(() => {
            document.querySelectorAll('.skill-bar').forEach(bar => {
                bar.style.width = bar.dataset.level + '%';
            });
        }, 200);
    } catch(e) { console.error('Skills error:', e); }
}

// Load Projects
async function loadProjects() {
    try {
        const data = await fetchData(API.projects);
        const projects = data.data || data;
        const container = document.getElementById('projects-container');
        if (!projects.length) { container.innerHTML = '<p style="color:var(--muted)">No projects yet.</p>'; return; }
        container.innerHTML = projects.map(p => `
            <div class="project-card">
                <div class="project-img">${p.image ? `<img src="/storage/${p.image}" style="width:100%;height:100%;object-fit:cover">` : '<i class="fas fa-code"></i>'}</div>
                <div class="project-body">
                    <div class="project-title">${p.title}</div>
                    <div class="project-desc">${p.description || ''}</div>
                    ${p.link ? `<a href="${p.link}" target="_blank" class="project-link">View Project <i class="fas fa-arrow-right"></i></a>` : ''}
                </div>
            </div>
        `).join('');
    } catch(e) { console.error('Projects error:', e); }
}

// Contact Form
document.getElementById('contact-form').addEventListener('submit', async function(e) {
    e.preventDefault();
    const btn = document.getElementById('form-btn');
    const alert = document.getElementById('form-alert');
    btn.disabled = true; btn.textContent = 'Sending...';

    const fd = new FormData(this);
    try {
        const r = await fetch(API.contact, {
            method: 'POST',
            headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': document.querySelector('[name=_token]').value },
            body: fd
        });
        const res = await r.json();
        if (r.ok) {
            alert.className = 'alert alert-success'; alert.style.display = 'block';
            alert.textContent = res.message || 'Message sent successfully!';
            this.reset();
        } else {
            throw new Error(res.message || 'Failed to send');
        }
    } catch(err) {
        alert.className = 'alert alert-error'; alert.style.display = 'block';
        alert.textContent = err.message;
    }
    btn.disabled = false; btn.innerHTML = '<i class="fas fa-paper-plane"></i> Send Message';
});

// Initialize
loadProfile();
loadSkills();
loadProjects();
</script>
</body>
</html>