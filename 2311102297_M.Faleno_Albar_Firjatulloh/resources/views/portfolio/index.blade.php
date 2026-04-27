<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');
        * { font-family: 'Inter', sans-serif; }
        .gradient-text {
            background: linear-gradient(135deg, #6366f1, #a855f7, #ec4899);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .glass {
            background: rgba(255,255,255,0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.1);
        }
        .skill-bar { transition: width 1.5s cubic-bezier(0.4, 0, 0.2, 1); }
        html { scroll-behavior: smooth; }
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-8px); }
        .nav-link { position: relative; }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(135deg, #6366f1, #a855f7);
            transition: width 0.3s ease;
        }
        .nav-link:hover::after { width: 100%; }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        .float { animation: float 6s ease-in-out infinite; }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-in { animation: fadeInUp 0.8s ease forwards; }
        .skeleton {
            background: linear-gradient(90deg, #1e1b4b 25%, #312e81 50%, #1e1b4b 75%);
            background-size: 200% 100%;
            animation: shimmer 1.5s infinite;
            border-radius: 8px;
        }
        @keyframes shimmer {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #0f0a2e; }
        ::-webkit-scrollbar-thumb { background: #6366f1; border-radius: 3px; }
        .particle {
            position: absolute;
            border-radius: 50%;
            animation: particleFloat linear infinite;
            pointer-events: none;
        }
        @keyframes particleFloat {
            0% { transform: translateY(100vh) rotate(0deg); opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { transform: translateY(-100px) rotate(720deg); opacity: 0; }
        }
    </style>
</head>
<body class="bg-gray-950 text-white overflow-x-hidden">

<!-- Particles Background -->
<div id="particles" class="fixed inset-0 pointer-events-none z-0 overflow-hidden"></div>

<!-- Navbar -->
<nav class="fixed top-0 left-0 right-0 z-50 glass border-b border-white/10">
    <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
        <div class="text-xl font-bold gradient-text" id="nav-name">Loading...</div>
        <div class="hidden md:flex items-center gap-8">
            <a href="#hero" class="nav-link text-gray-300 hover:text-white transition-colors text-sm">Home</a>
            <a href="#about" class="nav-link text-gray-300 hover:text-white transition-colors text-sm">About</a>
            <a href="#skills" class="nav-link text-gray-300 hover:text-white transition-colors text-sm">Skills</a>
            <a href="#projects" class="nav-link text-gray-300 hover:text-white transition-colors text-sm">Projects</a>
            <a href="#experience" class="nav-link text-gray-300 hover:text-white transition-colors text-sm">Experience</a>
            <a href="#contact" class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white px-4 py-2 rounded-full text-sm font-medium hover:opacity-90 transition-opacity">Contact</a>
            @auth
                <a href="/admin" class="border border-indigo-500/50 text-indigo-400 hover:bg-indigo-500/10 px-4 py-2 rounded-full text-sm font-medium transition-all flex items-center gap-2">
                    <i class="fas fa-shield-halved text-xs"></i> Admin Panel
                </a>
            @else
                <a href="/login" class="border border-indigo-500/50 text-indigo-400 hover:bg-indigo-500/10 px-4 py-2 rounded-full text-sm font-medium transition-all flex items-center gap-2">
                    <i class="fas fa-lock text-xs"></i> Admin Panel
                </a>
            @endauth
        </div>
        <button id="mobile-menu-btn" class="md:hidden text-gray-300">
            <i class="fas fa-bars text-xl"></i>
        </button>
    </div>
    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-gray-900/95 backdrop-blur px-6 py-4 flex flex-col gap-4">
        <a href="#hero" class="text-gray-300 hover:text-white">Home</a>
        <a href="#about" class="text-gray-300 hover:text-white">About</a>
        <a href="#skills" class="text-gray-300 hover:text-white">Skills</a>
        <a href="#projects" class="text-gray-300 hover:text-white">Projects</a>
        <a href="#experience" class="text-gray-300 hover:text-white">Experience</a>
        <a href="#contact" class="text-gray-300 hover:text-white">Contact</a>
        @auth
            <a href="/admin" class="text-indigo-400 hover:text-indigo-300 flex items-center gap-2">
                <i class="fas fa-shield-halved text-xs"></i> Admin Panel
            </a>
        @else
            <a href="/login" class="text-indigo-400 hover:text-indigo-300 flex items-center gap-2">
                <i class="fas fa-lock text-xs"></i> Admin Panel
            </a>
        @endauth
    </div>
</nav>

<!-- HERO SECTION -->
<section id="hero" class="relative min-h-screen flex items-center justify-center pt-20">
    <div class="absolute inset-0 bg-gradient-to-br from-indigo-950 via-gray-950 to-purple-950"></div>
    <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-indigo-500/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-purple-500/10 rounded-full blur-3xl"></div>

    <div class="relative z-10 max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
        <!-- Left Content -->
        <div class="fade-in" id="hero-content">
            <div class="inline-flex items-center gap-2 bg-indigo-500/10 border border-indigo-500/20 text-indigo-400 text-sm px-4 py-2 rounded-full mb-6">
                <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                Available for work
            </div>
            <div id="hero-name-skeleton" class="skeleton h-16 w-3/4 mb-4"></div>
            <h1 id="hero-name" class="hidden text-5xl md:text-6xl font-black mb-4 leading-tight">
                Hi, I'm <span class="gradient-text" id="profile-name">...</span>
            </h1>
            <div id="hero-title-skeleton" class="skeleton h-8 w-1/2 mb-6"></div>
            <div id="hero-title-wrap" class="hidden mb-6">
                <p class="text-2xl text-gray-400 font-light">
                    <span class="text-purple-400 font-semibold" id="profile-title">...</span>
                </p>
            </div>
            <div id="hero-bio-skeleton" class="skeleton h-20 w-full mb-8"></div>
            <p id="hero-bio" class="hidden text-gray-400 leading-relaxed mb-8 max-w-lg"></p>
            <div id="hero-buttons-skeleton" class="skeleton h-12 w-64 mb-8"></div>
            <div id="hero-buttons" class="hidden flex gap-4 mb-8 flex-wrap">
                <a href="#projects" class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white px-6 py-3 rounded-full font-semibold hover:opacity-90 transition-all hover:scale-105 shadow-lg shadow-indigo-500/25">
                    View My Work <i class="fas fa-arrow-right ml-2"></i>
                </a>
                <a id="cv-download" href="#" class="border border-white/20 text-white px-6 py-3 rounded-full font-semibold hover:bg-white/10 transition-all">
                    Download CV <i class="fas fa-download ml-2"></i>
                </a>
            </div>
            <div id="hero-social" class="flex gap-4 mt-2"></div>
        </div>

        <!-- Right - Photo -->
        <div class="flex justify-center float">
            <div class="relative">
                <div class="absolute inset-0 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full blur-2xl opacity-30"></div>
                <div id="photo-skeleton" class="skeleton w-72 h-72 md:w-80 md:h-80 rounded-full"></div>
                <img id="profile-photo"
                    src=""
                    alt="Profile Photo"
                    class="hidden relative w-72 h-72 md:w-80 md:h-80 rounded-full object-cover border-4 border-white/10 shadow-2xl"
                    onerror="this.src='https://ui-avatars.com/api/?name=Dev&background=6366f1&color=fff&size=300'"
                >
                <div class="absolute -inset-4 border border-indigo-500/20 rounded-full animate-spin" style="animation-duration:20s"></div>
                <div class="absolute -inset-8 border border-purple-500/10 rounded-full animate-spin" style="animation-duration:30s; animation-direction: reverse;"></div>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 text-gray-500 animate-bounce">
        <span class="text-xs">Scroll Down</span>
        <i class="fas fa-chevron-down"></i>
    </div>
</section>

<!-- ABOUT SECTION -->
<section id="about" class="py-24 relative">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-16">
            <p class="text-indigo-400 font-semibold text-sm uppercase tracking-widest mb-2">Get To Know</p>
            <h2 class="text-4xl md:text-5xl font-black">About <span class="gradient-text">Me</span></h2>
        </div>
        <div class="grid md:grid-cols-3 gap-8 mb-16">
            <div class="glass rounded-2xl p-6 text-center card-hover">
                <div class="w-14 h-14 bg-indigo-500/20 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-code text-indigo-400 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">Developer</h3>
                <p class="text-gray-400 text-sm">Building robust and scalable web applications with modern technologies.</p>
            </div>
            <div class="glass rounded-2xl p-6 text-center card-hover">
                <div class="w-14 h-14 bg-purple-500/20 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-palette text-purple-400 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">Designer</h3>
                <p class="text-gray-400 text-sm">Crafting beautiful and intuitive user interfaces and experiences.</p>
            </div>
            <div class="glass rounded-2xl p-6 text-center card-hover">
                <div class="w-14 h-14 bg-pink-500/20 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-lightbulb text-pink-400 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">Problem Solver</h3>
                <p class="text-gray-400 text-sm">Turning complex problems into elegant, efficient solutions.</p>
            </div>
        </div>
        <div class="glass rounded-3xl p-8 md:p-12">
            <div class="grid md:grid-cols-2 gap-10 items-center">
                <div>
                    <h3 class="text-2xl font-bold mb-4">My Story</h3>
                    <p id="about-bio" class="text-gray-400 leading-relaxed mb-6"></p>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-gray-500 text-sm">Email</p>
                            <p id="about-email" class="text-white font-medium text-sm"></p>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Location</p>
                            <p id="about-location" class="text-white font-medium text-sm"></p>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Phone</p>
                            <p id="about-phone" class="text-white font-medium text-sm"></p>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="glass rounded-2xl p-6 text-center">
                        <p class="text-4xl font-black gradient-text" id="projects-count">0</p>
                        <p class="text-gray-400 text-sm mt-1">Projects</p>
                    </div>
                    <div class="glass rounded-2xl p-6 text-center">
                        <p class="text-4xl font-black gradient-text" id="skills-count">0</p>
                        <p class="text-gray-400 text-sm mt-1">Skills</p>
                    </div>
                    <div class="glass rounded-2xl p-6 text-center col-span-2">
                        <p class="text-4xl font-black gradient-text" id="exp-count">0+</p>
                        <p class="text-gray-400 text-sm mt-1">Years Experience</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SKILLS SECTION -->
<section id="skills" class="py-24 bg-gray-900/30 relative">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-16">
            <p class="text-purple-400 font-semibold text-sm uppercase tracking-widest mb-2">What I Know</p>
            <h2 class="text-4xl md:text-5xl font-black">My <span class="gradient-text">Skills</span></h2>
        </div>
        <div id="skills-container" class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="skeleton h-48 rounded-2xl"></div>
            <div class="skeleton h-48 rounded-2xl"></div>
            <div class="skeleton h-48 rounded-2xl"></div>
        </div>
    </div>
</section>

<!-- PROJECTS SECTION -->
<section id="projects" class="py-24 relative">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-16">
            <p class="text-pink-400 font-semibold text-sm uppercase tracking-widest mb-2">My Work</p>
            <h2 class="text-4xl md:text-5xl font-black">Featured <span class="gradient-text">Projects</span></h2>
        </div>
        <div id="projects-container" class="grid md:grid-cols-2 gap-8">
            <div class="skeleton h-80 rounded-2xl"></div>
            <div class="skeleton h-80 rounded-2xl"></div>
        </div>
    </div>
</section>

<!-- EXPERIENCE SECTION -->
<section id="experience" class="py-24 bg-gray-900/30 relative">
    <div class="max-w-4xl mx-auto px-6">
        <div class="text-center mb-16">
            <p class="text-indigo-400 font-semibold text-sm uppercase tracking-widest mb-2">My Journey</p>
            <h2 class="text-4xl md:text-5xl font-black">Work <span class="gradient-text">Experience</span></h2>
        </div>
        <div id="experience-container" class="relative">
            <div class="absolute left-8 top-0 bottom-0 w-0.5 bg-gradient-to-b from-indigo-500 to-purple-600"></div>
            <div class="skeleton h-32 rounded-2xl mb-6 ml-16"></div>
            <div class="skeleton h-32 rounded-2xl mb-6 ml-16"></div>
        </div>
    </div>
</section>

<!-- CONTACT SECTION -->
<section id="contact" class="py-24 relative">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <p class="text-indigo-400 font-semibold text-sm uppercase tracking-widest mb-2">Get In Touch</p>
        <h2 class="text-4xl md:text-5xl font-black mb-6">Let's <span class="gradient-text">Connect</span></h2>
        <p class="text-gray-400 mb-12 max-w-xl mx-auto">Saya selalu terbuka untuk diskusi project baru, peluang kerja, atau sekadar say hello!</p>
        <div id="contact-links" class="flex flex-wrap justify-center gap-4 mb-12"></div>
        <a id="contact-email-btn" href="#" class="inline-block bg-gradient-to-r from-indigo-500 to-purple-600 text-white px-8 py-4 rounded-full font-semibold text-lg hover:opacity-90 transition-all hover:scale-105 shadow-xl shadow-indigo-500/30">
            Say Hello <i class="fas fa-paper-plane ml-2"></i>
        </a>
    </div>
</section>

<!-- Footer -->
<footer class="border-t border-white/10 py-8 text-center text-gray-500 text-sm">
    <div class="max-w-6xl mx-auto px-6">
        <p>© 2024 <span id="footer-name" class="gradient-text font-semibold">Portfolio</span>. Built with ❤️ using Laravel</p>
    </div>
</footer>

<script>
const API_BASE = '/api';

// Particles
function createParticles() {
    const container = document.getElementById('particles');
    const colors = ['#6366f1', '#a855f7', '#ec4899', '#06b6d4'];
    for (let i = 0; i < 30; i++) {
        const p = document.createElement('div');
        p.className = 'particle';
        const size = Math.random() * 4 + 2;
        p.style.cssText = `
            width: ${size}px; height: ${size}px;
            left: ${Math.random() * 100}%;
            background: ${colors[Math.floor(Math.random() * colors.length)]};
            animation-duration: ${Math.random() * 20 + 15}s;
            animation-delay: ${Math.random() * 20}s;
            opacity: 0.3;
        `;
        container.appendChild(p);
    }
}
createParticles();

// Mobile menu
document.getElementById('mobile-menu-btn').addEventListener('click', () => {
    document.getElementById('mobile-menu').classList.toggle('hidden');
});

// Counter animation
function animateCount(el, target) {
    let current = 0;
    const step = target / 60;
    const timer = setInterval(() => {
        current += step;
        if (current >= target) { el.textContent = target + (el.dataset.suffix || ''); clearInterval(timer); }
        else el.textContent = Math.floor(current) + (el.dataset.suffix || '');
    }, 20);
}

// Skill bar animation on scroll
const skillObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.querySelectorAll('.skill-bar').forEach(bar => {
                const width = bar.dataset.width;
                setTimeout(() => { bar.style.width = width + '%'; }, 300);
            });
            skillObserver.unobserve(entry.target);
        }
    });
}, { threshold: 0.3 });

// Load Profile
async function loadProfile() {
    try {
        const res = await fetch(`${API_BASE}/profile`);
        const data = await res.json();

        document.getElementById('nav-name').textContent = data.name;
        document.getElementById('profile-name').textContent = data.name;
        document.getElementById('profile-title').textContent = data.title;
        document.getElementById('hero-bio').textContent = data.bio;

        ['hero-name-skeleton','hero-title-skeleton','hero-bio-skeleton','hero-buttons-skeleton'].forEach(id => {
            document.getElementById(id).style.display = 'none';
        });
        document.getElementById('hero-name').classList.remove('hidden');
        document.getElementById('hero-title-wrap').classList.remove('hidden');
        document.getElementById('hero-bio').classList.remove('hidden');
        document.getElementById('hero-buttons').classList.remove('hidden');

        if (data.photo_url) {
            document.getElementById('profile-photo').src = data.photo_url;
        } else {
            document.getElementById('profile-photo').src = `https://ui-avatars.com/api/?name=${encodeURIComponent(data.name)}&background=6366f1&color=fff&size=300`;
        }
        document.getElementById('photo-skeleton').style.display = 'none';
        document.getElementById('profile-photo').classList.remove('hidden');

        if (data.cv_file) {
            document.getElementById('cv-download').href = `/storage/${data.cv_file}`;
        }

        document.getElementById('about-bio').textContent = data.bio;
        document.getElementById('about-email').textContent = data.email;
        document.getElementById('about-location').textContent = data.location || 'Indonesia';
        document.getElementById('about-phone').textContent = data.phone || '-';
        document.getElementById('footer-name').textContent = data.name;
        document.getElementById('contact-email-btn').href = `mailto:${data.email}`;

        const socialContainer = document.getElementById('hero-social');
        const contactLinks = document.getElementById('contact-links');
        const socials = [
            { key: 'github', icon: 'fab fa-github', label: 'GitHub', color: 'hover:text-white' },
            { key: 'linkedin', icon: 'fab fa-linkedin', label: 'LinkedIn', color: 'hover:text-blue-400' },
            { key: 'instagram', icon: 'fab fa-instagram', label: 'Instagram', color: 'hover:text-pink-400' },
        ];
        socials.forEach(s => {
            if (data[s.key]) {
                const href = s.key === 'instagram' ? `https://instagram.com/${data[s.key].replace('@','')}` : data[s.key];
                socialContainer.innerHTML += `<a href="${href}" target="_blank" class="w-10 h-10 glass rounded-full flex items-center justify-center text-gray-400 ${s.color} transition-all hover:scale-110"><i class="${s.icon}"></i></a>`;
                contactLinks.innerHTML += `<a href="${href}" target="_blank" class="glass border border-white/10 text-gray-300 hover:text-white px-6 py-3 rounded-full transition-all hover:border-indigo-500/50 font-medium"><i class="${s.icon} mr-2"></i>${s.label}</a>`;
            }
        });
    } catch (e) {
        console.error('Error loading profile:', e);
    }
}

// Load Skills
async function loadSkills() {
    try {
        const res = await fetch(`${API_BASE}/skills`);
        const grouped = await res.json();
        const container = document.getElementById('skills-container');
        container.innerHTML = '';

        const categoryColors = {
            'Backend':   'from-indigo-500/20 to-indigo-600/10 border-indigo-500/30',
            'Frontend':  'from-purple-500/20 to-purple-600/10 border-purple-500/30',
            'Tools':     'from-pink-500/20 to-pink-600/10 border-pink-500/30',
            'UI Design': 'from-cyan-500/20 to-cyan-600/10 border-cyan-500/30',
        };
        const iconColors = {
            'Backend':   'text-indigo-400',
            'Frontend':  'text-purple-400',
            'Tools':     'text-pink-400',
            'UI Design': 'text-cyan-400',
        };
        const barColors = {
            'Backend':   'from-indigo-500 to-indigo-400',
            'Frontend':  'from-purple-500 to-purple-400',
            'Tools':     'from-pink-500 to-pink-400',
            'UI Design': 'from-cyan-500 to-cyan-400',
        };

        let totalSkills = 0;

        Object.entries(grouped).forEach(([category, skills]) => {
            totalSkills += skills.length;
            const cardColor = categoryColors[category] || 'from-gray-500/20 to-gray-600/10 border-gray-500/30';
            const iColor   = iconColors[category]    || 'text-gray-400';
            const bColor   = barColors[category]     || 'from-gray-500 to-gray-400';

            const skillItems = skills.map(skill => `
                <div class="mb-3">
                    <div class="flex justify-between items-center mb-1">
                        <span class="text-sm text-gray-300 flex items-center gap-2">
                            <i class="${skill.icon || 'fas fa-code'} ${iColor} text-xs"></i>
                            ${skill.name}
                        </span>
                        <span class="text-xs text-gray-500">${skill.level}%</span>
                    </div>
                    <div class="h-2 bg-gray-800 rounded-full overflow-hidden">
                        <div class="skill-bar h-full bg-gradient-to-r ${bColor} rounded-full w-0" data-width="${skill.level}"></div>
                    </div>
                </div>
            `).join('');

            const card = document.createElement('div');
            card.className = `glass bg-gradient-to-br ${cardColor} border rounded-2xl p-6 card-hover`;
            card.innerHTML = `
                <h3 class="font-bold text-lg mb-4 flex items-center gap-2">
                    <span class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center text-sm">${skills.length}</span>
                    ${category}
                </h3>
                ${skillItems}
            `;
            container.appendChild(card);
            skillObserver.observe(card);
        });

        const skillEl = document.getElementById('skills-count');
        skillEl.dataset.suffix = '';
        animateCount(skillEl, totalSkills);

    } catch (e) {
        console.error('Error loading skills:', e);
    }
}

// Load Projects
async function loadProjects() {
    try {
        const res = await fetch(`${API_BASE}/projects`);
        const projects = await res.json();
        const container = document.getElementById('projects-container');
        container.innerHTML = '';

        const projectEl = document.getElementById('projects-count');
        projectEl.dataset.suffix = '+';
        animateCount(projectEl, projects.length);

        projects.forEach((project) => {
            const techBadges = Array.isArray(project.tech_stack)
                ? project.tech_stack.map(t => `<span class="text-xs bg-indigo-500/20 text-indigo-300 px-2 py-1 rounded-full">${t}</span>`).join('')
                : '';

            const imgSrc = project.image_url || `https://picsum.photos/seed/${project.id}/600/400`;

            const card = document.createElement('div');
            card.className = 'glass rounded-2xl overflow-hidden card-hover group';
            card.innerHTML = `
                <div class="relative overflow-hidden h-52">
                    <img src="${imgSrc}" alt="${project.title}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                         onerror="this.src='https://picsum.photos/seed/${project.id}/600/400'">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent"></div>
                    ${project.featured ? '<div class="absolute top-3 right-3 bg-gradient-to-r from-yellow-500 to-orange-500 text-black text-xs font-bold px-3 py-1 rounded-full">⭐ Featured</div>' : ''}
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2">${project.title}</h3>
                    <p class="text-gray-400 text-sm mb-4 line-clamp-2">${project.description}</p>
                    <div class="flex flex-wrap gap-2 mb-4">${techBadges}</div>
                    <div class="flex gap-3">
                        ${project.github_url ? `<a href="${project.github_url}" target="_blank" class="flex items-center gap-2 text-gray-400 hover:text-white text-sm transition-colors"><i class="fab fa-github"></i> Code</a>` : ''}
                        ${project.live_url ? `<a href="${project.live_url}" target="_blank" class="flex items-center gap-2 text-indigo-400 hover:text-indigo-300 text-sm transition-colors"><i class="fas fa-external-link-alt"></i> Live Demo</a>` : ''}
                    </div>
                </div>
            `;
            container.appendChild(card);
        });
    } catch (e) {
        console.error('Error loading projects:', e);
    }
}

// Load Experience
async function loadExperience() {
    try {
        const res = await fetch(`${API_BASE}/experiences`);
        const experiences = await res.json();
        const container = document.getElementById('experience-container');
        container.innerHTML = '<div class="absolute left-8 top-0 bottom-0 w-0.5 bg-gradient-to-b from-indigo-500 to-purple-600"></div>';

        const expEl = document.getElementById('exp-count');
        expEl.dataset.suffix = '+';

        if (experiences.length > 0) {
            const startYears = experiences.map(e => parseInt(e.start_date));
            const earliestYear = Math.min(...startYears);
            const yearsExp = new Date().getFullYear() - earliestYear;
            animateCount(expEl, yearsExp);
        }

        experiences.forEach((exp) => {
            const endDate = exp.is_current ? '<span class="text-green-400 font-semibold">Present</span>' : exp.end_date;
            const item = document.createElement('div');
            item.className = 'ml-20 mb-8 relative';
            item.innerHTML = `
                <div class="absolute -left-12 top-2 w-4 h-4 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full border-4 border-gray-950"></div>
                <div class="glass rounded-2xl p-6 card-hover">
                    <div class="flex flex-wrap justify-between items-start gap-2 mb-2">
                        <div>
                            <h3 class="text-lg font-bold">${exp.position}</h3>
                            <p class="text-indigo-400 font-medium">${exp.company}</p>
                        </div>
                        <span class="text-xs glass px-3 py-1 rounded-full text-gray-400">${exp.start_date} — ${endDate}</span>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed">${exp.description}</p>
                </div>
            `;
            container.appendChild(item);
        });
    } catch (e) {
        console.error('Error loading experience:', e);
    }
}

// Init
document.addEventListener('DOMContentLoaded', async () => {
    await Promise.all([loadProfile(), loadSkills(), loadProjects(), loadExperience()]);
});
</script>
</body>
</html>