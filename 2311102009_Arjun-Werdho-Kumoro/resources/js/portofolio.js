const API = '/api';

async function loadProfile() {
    const res  = await fetch(`${API}/profile`);
    const data = await res.json();

    document.getElementById('profile-name').textContent    = data.name    ?? '';
    document.getElementById('profile-tagline').textContent = data.tagline ?? '';
    document.getElementById('profile-about').textContent   = data.about   ?? '';

    if (data.photo_path) {
        document.getElementById('profile-photo').src = `/storage/${data.photo_path}`;
    }
}

async function loadSkills() {
    const res    = await fetch(`${API}/skills`);
    const skills = await res.json();
    const box    = document.getElementById('skills-container');

    box.innerHTML = skills.map(s => `
        <div class="skill-card">
            <span>${s.name}</span>
            <div class="skill-bar">
                <div class="skill-fill" style="width:${s.level}%"></div>
            </div>
            <small>${s.level}%</small>
        </div>
    `).join('');
}

async function loadProjects() {
    const res      = await fetch(`${API}/projects`);
    const projects = await res.json();
    const box      = document.getElementById('projects-container');

    box.innerHTML = projects.map(p => `
        <div class="project-card">
            <img src="/storage/${p.thumbnail}" alt="${p.title}">
            <h3>${p.title}</h3>
            <p>${p.description}</p>
            <div class="tags">
                ${(p.tech_stack ?? []).map(t => `<span>${t}</span>`).join('')}
            </div>
            ${p.demo_url ? `<a href="${p.demo_url}" target="_blank">Demo</a>` : ''}
            ${p.repo_url ? `<a href="${p.repo_url}" target="_blank">Repo</a>` : ''}
        </div>
    `).join('');
}

document.addEventListener('DOMContentLoaded', () => {
    loadProfile();
    loadSkills();
    loadProjects();
});