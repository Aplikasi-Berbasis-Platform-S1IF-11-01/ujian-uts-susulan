const token = document.querySelector('meta[name="csrf-token"]').content;

async function request(url, method = 'GET', data = null) {
    const options = {
        method,
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token,
            'Accept': 'application/json'
        }
    };
    if (data) options.body = JSON.stringify(data);
    const response = await fetch(url, options);
    return await response.json();
}

function formDataToObject(form) {
    return Object.fromEntries(new FormData(form).entries());
}

async function loadProfileForm() {
    const profile = await request('/api/profile');
    const form = document.getElementById('profileForm');
    Object.keys(profile).forEach(key => {
        if (form.elements[key]) form.elements[key].value = profile[key] || '';
    });
}

document.getElementById('profileForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    await request('/api/profile', 'PUT', formDataToObject(this));
    alert('Profil berhasil disimpan');
});

async function loadAdminSkills() {
    const skills = await request('/api/skills');
    const list = document.getElementById('adminSkillList');
    list.innerHTML = '';
    skills.forEach(skill => {
        list.innerHTML += `
            <div class="admin-item">
                <div><b>${skill.name}</b><br>Level: ${skill.level}%</div>
                <div class="admin-actions">
                    <button onclick="editSkill(${skill.id}, '${skill.name}', ${skill.level})">Edit</button>
                    <button onclick="deleteSkill(${skill.id})">Hapus</button>
                </div>
            </div>
        `;
    });
}

function editSkill(id, name, level) {
    const form = document.getElementById('skillForm');
    form.id.value = id;
    form.name.value = name;
    form.level.value = level;
}

async function deleteSkill(id) {
    await request('/api/skills/' + id, 'DELETE');
    loadAdminSkills();
}

document.getElementById('skillForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    const data = formDataToObject(this);
    if (data.id) {
        await request('/api/skills/' + data.id, 'PUT', data);
    } else {
        await request('/api/skills', 'POST', data);
    }
    this.reset();
    loadAdminSkills();
});

async function loadAdminProjects() {
    const projects = await request('/api/projects');
    const list = document.getElementById('adminProjectList');
    list.innerHTML = '';
    projects.forEach(project => {
        list.innerHTML += `
            <div class="admin-item">
                <div><b>${project.title}</b><br>${project.description || ''}</div>
                <div class="admin-actions">
                    <button onclick="editProject(${project.id}, '${project.title}', '${project.description || ''}', '${project.link || ''}')">Edit</button>
                    <button onclick="deleteProject(${project.id})">Hapus</button>
                </div>
            </div>
        `;
    });
}

function editProject(id, title, description, link) {
    const form = document.getElementById('projectForm');
    form.id.value = id;
    form.title.value = title;
    form.description.value = description;
    form.link.value = link;
}

async function deleteProject(id) {
    await request('/api/projects/' + id, 'DELETE');
    loadAdminProjects();
}

document.getElementById('projectForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    const data = formDataToObject(this);
    if (data.id) {
        await request('/api/projects/' + data.id, 'PUT', data);
    } else {
        await request('/api/projects', 'POST', data);
    }
    this.reset();
    loadAdminProjects();
});

loadProfileForm();
loadAdminSkills();
loadAdminProjects();
