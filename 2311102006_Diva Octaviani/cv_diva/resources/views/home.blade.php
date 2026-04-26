@extends('layouts.app')
@section('title', 'CV - Diva')

@section('content')

{{-- HERO --}}
<section id="hero" class="min-h-[80vh] flex items-center px-6">
    <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-12 items-center">
        <div>
            <p class="text-white text-sm tracking-widest uppercase mb-4">Welcome to my portfolio</p>
            <h1 class="text-5xl md:text-7xl font-display font-bold mb-6">
                <span class="gold-gradient" id="hero-name">...</span>
            </h1>
            <p class="text-xl text-gray-300 mb-8" id="hero-title">...</p>
            <p class="text-gray-400 max-w-lg mb-8" id="hero-tagline">...</p>
            <a href="#portfolio" class="inline-block bg-gold text-navy-900 font-semibold px-8 py-3 rounded-lg hover:opacity-90 transition">
                View My Work
            </a>
        </div>
        <div class="flex justify-center">
            <div id="hero-image-wrapper" class="w-72 h-72 rounded-full border-4 border-gold-400 overflow-hidden flex items-center justify-center bg-navy-800 text-7xl font-display gold-gradient">
                <span id="hero-initial">D</span>
            </div>
        </div>
    </div>
</section>

{{-- ABOUT --}}
<section id="about" class="py-20 px-6 bg-navy-800">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-4xl font-display font-bold mb-4">About <span class="text-gold">Me</span></h2>
        <div class="w-20 h-1 bg-gold mb-8"></div>

        {{-- About Text Full Width --}}
        <div class="bg-navy-700 border border-gold/20 rounded-xl p-6 mb-12">
            <p class="text-gray-300 leading-relaxed" id="about-text">...</p>
        </div>

        {{-- Experiences --}}
        <div>
            <h3 class="text-xl font-semibold text-white mb-4 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                Experiences
            </h3>
            <div class="gap-4" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));" id="experiences-list">
                <div class="text-gray-400">Loading...</div>
            </div>
        </div>

        {{-- Organization --}}
        <div class="mt-8">
            <h3 class="text-xl font-semibold text-white mb-4 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                Organization
            </h3>
            <div class="gap-4 items-start" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));" id="organizations-list">
                <div class="text-gray-400">Loading...</div>
            </div>
        </div>
    </div>
</section>

{{-- EDUCATION --}}
<section id="education" class="py-20 px-6">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-4xl font-display font-bold mb-4">Education</h2>
        <div class="w-20 h-1 bg-gold mb-12"></div>
        <div class="space-y-6" id="education-list">
            <div class="text-gray-400">Loading...</div>
        </div>
    </div>
</section>

{{-- SKILLS --}}
<section id="skills" class="py-20 px-6 bg-navy-800">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-4xl font-display font-bold mb-4">Skills</h2>
        <div class="w-20 h-1 bg-gold mb-12"></div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4" id="skills-list">
            <div class="text-gray-400">Loading...</div>
        </div>
    </div>
</section>

{{-- PORTFOLIO --}}
<section id="portfolio" class="py-20 px-6">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-4xl font-display font-bold mb-4">Portfolio</h2>
        <div class="w-20 h-1 bg-gold mb-12"></div>
        <div class="flex gap-6 overflow-x-auto pb-4 snap-x snap-mandatory scrollbar-thin scrollbar-thumb-gold/40 scrollbar-track-transparent" id="portfolio-list">
            <div class="text-gray-400">Loading...</div>
        </div>
    </div>
</section>

{{-- CONTACT --}}
<section id="contact" class="py-20 px-6 bg-navy-800">
    <div class="max-w-6xl mx-auto text-center">
        <h2 class="text-4xl font-display font-bold mb-4">Contact <span class="text-gold">Me</span></h2>
        <div class="w-20 h-1 bg-gold mb-12 mx-auto"></div>
        <p class="text-gray-400 mb-8" id="contact-email"></p>
        <div id="contact-links" class="flex justify-center gap-4 flex-wrap"></div>
    </div>
</section>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    // Fetch Profile
    fetch('/api/profile')
        .then(r => r.json())
        .then(p => {
            if (!p) return;

            document.getElementById('hero-name').textContent    = p.name        ?? '';
            document.getElementById('hero-title').textContent   = p.title       ?? '';
            document.getElementById('hero-tagline').textContent = p.description ?? '';

            const aboutText = document.getElementById('about-text');
            if (aboutText) aboutText.textContent = p.about_description ?? '';

            const wrapper = document.getElementById('hero-image-wrapper');
            if (p.image_url && !p.image_url.startsWith('http')) {
                wrapper.innerHTML = `<img src="/storage/${p.image_url}" class="w-full h-full object-cover" alt="${p.name ?? ''}">`;
            } else {
                const initial = p.name ? p.name.charAt(0).toUpperCase() : 'D';
                wrapper.innerHTML = `<span class="gold-gradient">${initial}</span>`;
            }

            const boxClass = "px-6 py-3 bg-navy-700 border border-gold/20 rounded-lg hover:border-gold transition text-white font-semibold flex items-center gap-2";
            const sosmed = [];

            if (p.email)         sosmed.push(`<a href="https://mail.google.com/mail/?view=cm&to=${p.email}" target="_blank" class="${boxClass}"><svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>${p.email}</a>`);
            if (p.github_url)    sosmed.push(`<a href="${p.github_url}" target="_blank" class="${boxClass}"><svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>GitHub</a>`);
            if (p.instagram_url) sosmed.push(`<a href="${p.instagram_url}" target="_blank" class="${boxClass}"><svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>Instagram</a>`);
            if (p.linkedin_url)  sosmed.push(`<a href="${p.linkedin_url}" target="_blank" class="${boxClass}"><svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>LinkedIn</a>`);
            if (p.whatsapp_url)  sosmed.push(`<a href="${p.whatsapp_url}" target="_blank" class="${boxClass}"><svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>WhatsApp</a>`);

            document.getElementById('contact-links').innerHTML = sosmed.join('');
            document.getElementById('contact-email').innerHTML = '';
        });

    // Fetch Experiences
    fetch('/api/experiences')
        .then(r => r.json())
        .then(items => {
            const el = document.getElementById('experiences-list');
            el.innerHTML = items.length
                ? items.map(e => `
                    <div class="bg-navy-700 border border-gold/20 rounded-xl p-4">
                        <span class="inline-block text-xs font-semibold text-gold mb-2">${e.period}</span>
                        <h4 class="text-white font-bold">${e.position}</h4>
                        <p class="text-gray-400 italic text-sm mb-2">${e.company}</p>
                        ${e.responsibilities?.length ? `<ul class="space-y-1">${e.responsibilities.map(r => `<li class="text-gray-300 text-sm flex gap-2"><span class="text-gold">•</span>${r}</li>`).join('')}</ul>` : ''}
                    </div>`).join('')
                : '<div class="text-gray-400">Belum ada data</div>';
        });

    // Fetch Organizations
    fetch('/api/organizations')
        .then(r => r.json())
        .then(items => {
            const el = document.getElementById('organizations-list');
            el.innerHTML = items.length
                ? items.map(o => `
                    <div class="bg-navy-700 border border-gold/20 rounded-xl p-4">
                        <span class="inline-block text-xs font-semibold text-gold mb-2">${o.period}</span>
                        <h4 class="text-white font-bold">${o.position}</h4>
                        <p class="text-gray-400 italic text-sm mb-2">${o.organization_name}</p>
                        ${o.responsibilities?.length ? `<ul class="space-y-1">${o.responsibilities.map(r => `<li class="text-gray-300 text-sm flex gap-2"><span class="text-gold">•</span>${r}</li>`).join('')}</ul>` : ''}
                    </div>`).join('')
                : '<div class="text-gray-400">Belum ada data</div>';
        });

    // Fetch Education
    fetch('/api/educations')
        .then(r => r.json())
        .then(items => {
            const el = document.getElementById('education-list');
            el.innerHTML = items.length
                ? items.map(e => `
                    <div class="bg-navy-800 border border-gold/20 rounded-xl p-6 card-hover">
                        <p class="text-gold text-sm mb-2">${e.period ?? ''}</p>
                        <h3 class="text-2xl font-display font-bold mb-1">${e.institution ?? ''}</h3>
                        <p class="mb-3">${e.major ?? ''}</p>
                        <p class="text-gray-400 text-sm">${e.description ?? ''}</p>
                    </div>`).join('')
                : '<div class="text-gray-400">Belum ada data</div>';
        });

    // Fetch Skills
    fetch('/api/skills')
        .then(r => r.json())
        .then(items => {
            const el = document.getElementById('skills-list');
            el.innerHTML = items.length
                ? items.map(s => `
                    <div class="bg-navy-700 border border-gold/20 rounded-lg p-4 text-center card-hover">
                        <p class="font-semibold">${s.name}</p>
                        ${s.category ? `<p class="text-xs text-gold mt-1">${s.category}</p>` : ''}
                    </div>`).join('')
                : '<div class="text-gray-400">Belum ada data</div>';
        });

    // Fetch Portfolio
    fetch('/api/portfolios')
        .then(r => r.json())
        .then(items => {
            const el = document.getElementById('portfolio-list');
            el.innerHTML = items.length
                ? items.map((p, i) => {
                    const imgSrc = p.image_url
                        ? (p.image_url.startsWith('http') ? p.image_url : `/storage/${p.image_url}`)
                        : null;

                    return `
                    <div class="bg-navy-800 border border-gold/20 rounded-xl overflow-hidden card-hover flex-shrink-0 w-72 snap-start flex flex-col">
                        <div class="h-40 overflow-hidden">
                            ${imgSrc
                                ? `<img src="${imgSrc}" class="w-full h-full object-cover" alt="${p.title}">`
                                : `<div class="w-full h-full bg-navy-700 flex items-center justify-center">
                                    <span class="text-5xl gold-gradient font-display">${i + 1}</span>
                                   </div>`
                            }
                        </div>
                        <div class="p-6 flex flex-col flex-1">
                            <h3 class="text-xl font-display font-bold mb-2">${p.title}</h3>
                            <p class="text-gray-400 text-sm mb-4 flex-1">${p.description ? p.description.substring(0, 100) : ''}</p>
                            ${p.link
                                ? `<a href="${p.link}" target="_blank"
                                      class="inline-block text-center bg-gold text-navy-900 font-semibold text-sm px-4 py-2 rounded-lg hover:opacity-90 transition mt-auto">
                                       Lihat Project →
                                   </a>`
                                : `<span class="inline-block text-center bg-gold/20 text-gold/40 font-semibold text-sm px-4 py-2 rounded-lg cursor-not-allowed mt-auto">
                                       Tidak ada link
                                   </span>`
                            }
                        </div>
                    </div>`;
                }).join('')
                : '<div class="text-gray-400">Belum ada data</div>';
        });

});
</script>
@endpush