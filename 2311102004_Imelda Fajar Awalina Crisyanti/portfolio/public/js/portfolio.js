async function getJson(url) {
    const response = await fetch(url);
    return await response.json();
}

async function loadProfile() {
    const profile = await getJson('/api/profile');
    document.getElementById('brandName').textContent = profile.name.split(' ')[0] + ' Portfolio';
    document.getElementById('profileName').textContent = profile.name;
    document.getElementById('profileRole').textContent = profile.role || '';
    document.getElementById('profileDescription').textContent = profile.description || '';
    document.getElementById('profileNim').textContent = profile.nim || '-';
    document.getElementById('profileEmail').textContent = profile.email || '-';
    document.getElementById('profilePhone').textContent = profile.phone || '-';
    document.getElementById('profileAddress').textContent = profile.address || '-';
    document.getElementById('profilePhoto').src = profile.photo || '/images/profile.svg';
    document.getElementById('emailButton').href = 'mailto:' + (profile.email || '');
}

async function loadSkills() {
    const skills = await getJson('/api/skills');
    const skillList = document.getElementById('skillList');
    skillList.innerHTML = '';

    skills.forEach(skill => {
        skillList.innerHTML += `
            <div class="skill-item">
                <div class="skill-head">
                    <span>${skill.name}</span>
                    <span>${skill.level}%</span>
                </div>
                <div class="skill-bar">
                    <div class="skill-fill" style="width: ${skill.level}%"></div>
                </div>
            </div>
        `;
    });
}

async function loadProjects() {
    const projects = await getJson('/api/projects');
    const projectList = document.getElementById('projectList');
    projectList.innerHTML = '';

    projects.forEach(project => {
        projectList.innerHTML += `
            <div class="project-card">
                <h3>${project.title}</h3>
                <p>${project.description || ''}</p>
                <a href="${project.link || '#'}">Lihat Project</a>
            </div>
        `;
    });
}

loadProfile();
loadSkills();
loadProjects();
