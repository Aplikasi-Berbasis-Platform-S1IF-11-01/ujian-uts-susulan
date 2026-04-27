// ===========================
// ADMIN.JS — Portfolio Admin
// ===========================

const CSRF = document.querySelector('meta[name="csrf-token"]')?.content || '';
const API = { profile: '/api/profile', skills: '/api/skills', projects: '/api/projects', contacts: '/api/contacts' };

function req(url, opts = {}) {
    return fetch(url, {
        headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': CSRF, ...(opts.headers || {}) },
        ...opts
    }).then(async r => {
        const json = await r.json().catch(() => ({}));
        if (!r.ok) throw new Error(json.message || `Error ${r.status}`);
        return json;
    });
}

function showAlert(id, msg, type = 'success') {
    const el = document.getElementById(id);
    if (!el) return;
    el.className = `alert-inline ${type} show`;
    el.textContent = msg;
    setTimeout(() => { el.className = 'alert-inline'; }, 4000);
}

// ===== TAB NAVIGATION =====
const tabs = document.querySelectorAll('.nav-item[data-tab]');
const panels = document.querySelectorAll('.tab-content');
const pageTitle = document.getElementById('page-title');

function switchTab(name) {
    tabs.forEach(t => t.classList.toggle('active', t.dataset.tab === name));
    panels.forEach(p => p.classList.toggle('active', p.id === `tab-${name}`));
    pageTitle.textContent = name.charAt(0).toUpperCase() + name.slice(1);

    if (name === 'dashboard') loadDashboard();
    if (name === 'skills') loadSkills();
    if (name === 'projects') loadProjects();
    if (name === 'messages') loadMessages();
}

tabs.forEach(t => t.addEventListener('click', e => { e.preventDefault(); switchTab(t.dataset.tab); }));

// ===== MOBILE SIDEBAR =====
document.getElementById('menuBtn')?.addEventListener('click', () => {
    document.getElementById('sidebar').classList.toggle('open');
});
document.getElementById('sidebarClose')?.addEventListener('click', () => {
    document.getElementById('sidebar').classList.remove('open');
});

// ===== DASHBOARD =====
async function loadDashboard() {
    try {
        const [profile, skills, projects, contacts] = await Promise.all([
            req(API.profile), req(API.skills), req(API.projects), req(API.contacts)
        ]);
        const p = profile.data || profile;
        const skCount = (skills.data || skills).length;
        const prCount = (projects.data || projects).length;
        const msgs = contacts.data || contacts;

        document.getElementById('dash-stats').innerHTML = `
            <div class="stat-box">
                <div class="stat-icon" style="background:rgba(200,240,101,0.1);color:var(--accent)"><i class="fas fa-user"></i></div>
                <div class="stat-num">${p.name ? '✓' : '—'}</div>
                <div class="stat-lbl">Profile Status</div>
            </div>
            <div class="stat-box">
                <div class="stat-icon" style="background:rgba(124,92,252,0.1);color:var(--accent2)"><i class="fas fa-code"></i></div>
                <div class="stat-num">${skCount}</div>
                <div class="stat-lbl">Skills Listed</div>
            </div>
            <div class="stat-box">
                <div class="stat-icon" style="background:rgba(200,240,101,0.1);color:var(--accent)"><i class="fas fa-rocket"></i></div>
                <div class="stat-num">${prCount}</div>
                <div class="stat-lbl">Projects</div>
            </div>
            <div class="stat-box">
                <div class="stat-icon" style="background:rgba(255,170,85,0.1);color:#ffaa55"><i class="fas fa-envelope"></i></div>
                <div class="stat-num">${msgs.length}</div>
                <div class="stat-lbl">Messages</div>
            </div>
        `;

        const recent = msgs.slice(0, 5);
        document.getElementById('recent-messages').innerHTML = recent.length
            ? recent.map(m => `
                <div class="msg-card">
                    <div class="msg-meta"><span class="msg-name">${m.name}</span><span class="msg-email">${m.email}</span></div>
                    <div class="msg-subject">${m.subject || '(no subject)'}</div>
                    <div class="msg-body">${m.message.substring(0, 120)}${m.message.length > 120 ? '...' : ''}</div>
                </div>
            `).join('')
            : '<div class="empty"><i class="fas fa-inbox"></i>No messages yet.</div>';

        const badge = document.getElementById('msg-badge');
        if (msgs.length > 0) { badge.textContent = msgs.length; badge.style.display = 'inline'; }
    } catch(e) { console.error('Dashboard error:', e); }
}

// ===== PROFILE =====
async function loadProfile() {
    try {
        const data = await req(API.profile);
        const p = data.data || data;
        ['name','role','email','phone','location','github','bio','short_bio'].forEach(f => {
            const el = document.getElementById(`p_${f}`);
            if (el) el.value = p[f] || '';
        });
        ['exp','proj','clients'].forEach(f => {
            const map = { exp: 'experience_years', proj: 'projects_done', clients: 'clients' };
            const el = document.getElementById(`p_${f}`);
            if (el) el.value = p[map[f]] || '';
        });
        if (p.photo) {
            document.getElementById('photo-preview').innerHTML = `<img src="/storage/${p.photo}" alt="Profile">`;
        }
    } catch(e) { console.error('Profile load:', e); }
}

document.getElementById('photo-area')?.addEventListener('click', () => {
    document.getElementById('photo-input').click();
});

document.getElementById('photo-input')?.addEventListener('change', function() {
    if (this.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
            document.getElementById('photo-preview').innerHTML = `<img src="${e.target.result}" alt="Preview">`;
        };
        reader.readAsDataURL(this.files[0]);
    }
});

document.getElementById('profile-form')?.addEventListener('submit', async function(e) {
    e.preventDefault();
    const fd = new FormData(this);
    try {
        await req('/admin/profile', { method: 'POST', body: fd });
        showAlert('profile-alert', '✓ Profile saved successfully!', 'success');
        loadProfile(); // reload form dengan data terbaru
    } catch(err) {
        showAlert('profile-alert', err.message, 'error');
    }
});

// ===== SKILLS =====
async function loadSkills() {
    try {
        const data = await req(API.skills);
        const skills = data.data || data;
        const list = document.getElementById('skills-list');
        list.innerHTML = skills.length
            ? skills.map(s => `
                <div class="list-row" id="skill-row-${s.id}">
                    <div>
                        <div class="list-name">${s.name}</div>
                        <div class="list-meta">${s.category || ''}</div>
                    </div>
                    <div class="mini-bar"><div class="mini-fill" style="width:${s.level || 0}%"></div></div>
                    <span class="list-meta">${s.level || 0}%</span>
                    <div class="list-actions">
                        <button class="btn-icon" onclick="editSkill(${JSON.stringify(s).replace(/"/g,'&quot;')})"><i class="fas fa-edit"></i></button>
                        <button class="btn-icon danger" onclick="deleteSkill(${s.id})"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            `).join('')
            : '<div class="empty"><i class="fas fa-code"></i>No skills yet. Add your first skill!</div>';
    } catch(e) { console.error('Skills:', e); }
}

function openModal(id) { document.getElementById(id)?.classList.add('open'); }
function closeModal(id) { document.getElementById(id)?.classList.remove('open'); }

document.querySelectorAll('[data-close]').forEach(btn => {
    btn.addEventListener('click', () => closeModal(btn.dataset.close));
});
document.querySelectorAll('.modal-overlay').forEach(overlay => {
    overlay.addEventListener('click', function(e) {
        if (e.target === this) closeModal(this.id);
    });
});

document.getElementById('add-skill-btn')?.addEventListener('click', () => {
    document.getElementById('skill-modal-title').textContent = 'Add Skill';
    document.getElementById('skill-form').reset();
    document.getElementById('skill_id').value = '';
    document.getElementById('range-fill').style.width = '0%';
    openModal('skill-modal');
});

document.getElementById('skill_level')?.addEventListener('input', function() {
    document.getElementById('range-fill').style.width = (this.value || 0) + '%';
});

function editSkill(s) {
    document.getElementById('skill-modal-title').textContent = 'Edit Skill';
    document.getElementById('skill_id').value = s.id;
    document.getElementById('skill_name').value = s.name;
    document.getElementById('skill_level').value = s.level || 0;
    document.getElementById('skill_category').value = s.category || '';
    document.getElementById('range-fill').style.width = (s.level || 0) + '%';
    openModal('skill-modal');
}

document.getElementById('skill-form')?.addEventListener('submit', async function(e) {
    e.preventDefault();
    const id = document.getElementById('skill_id').value;
    const body = JSON.stringify({
        name: document.getElementById('skill_name').value,
        level: document.getElementById('skill_level').value,
        category: document.getElementById('skill_category').value
    });
    try {
        if (id) {
            await req(`/admin/skills/${id}`, { method: 'PUT', body, headers: { 'Content-Type': 'application/json' } });
        } else {
            await req('/admin/skills', { method: 'POST', body, headers: { 'Content-Type': 'application/json' } });
        }
        closeModal('skill-modal');
        loadSkills();
    } catch(err) { alert(err.message); }
});

async function deleteSkill(id) {
    if (!confirm('Delete this skill?')) return;
    try {
        await req(`/admin/skills/${id}`, { method: 'DELETE' });
        loadSkills();
    } catch(err) { alert(err.message); }
}

// ===== PROJECTS =====
async function loadProjects() {
    try {
        const data = await req(API.projects);
        const projects = data.data || data;
        const list = document.getElementById('projects-list');
        list.innerHTML = projects.length
            ? projects.map(p => `
                <div class="list-row" id="proj-row-${p.id}">
                    <div style="flex:1">
                        <div class="list-name">${p.title}</div>
                        <div class="list-meta">${p.description ? p.description.substring(0, 80) + '...' : ''}</div>
                    </div>
                    ${p.link ? `<a href="${p.link}" target="_blank" class="list-meta" style="color:var(--accent);font-size:0.8rem">View →</a>` : ''}
                    <div class="list-actions">
                        <button class="btn-icon" onclick="editProject(${JSON.stringify(p).replace(/"/g,'&quot;')})"><i class="fas fa-edit"></i></button>
                        <button class="btn-icon danger" onclick="deleteProject(${p.id})"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            `).join('')
            : '<div class="empty"><i class="fas fa-rocket"></i>No projects yet. Add your first project!</div>';
    } catch(e) { console.error('Projects:', e); }
}

document.getElementById('add-project-btn')?.addEventListener('click', () => {
    document.getElementById('project-modal-title').textContent = 'Add Project';
    document.getElementById('project-form').reset();
    document.getElementById('project_id').value = '';
    openModal('project-modal');
});

function editProject(p) {
    document.getElementById('project-modal-title').textContent = 'Edit Project';
    document.getElementById('project_id').value = p.id;
    document.getElementById('proj_title').value = p.title;
    document.getElementById('proj_desc').value = p.description || '';
    document.getElementById('proj_link').value = p.link || '';
    openModal('project-modal');
}

document.getElementById('project-form')?.addEventListener('submit', async function(e) {
    e.preventDefault();
    const id = document.getElementById('project_id').value;
    const fd = new FormData(this);
    if (id) fd.append('_method', 'PUT');
    try {
        await req(id ? `/admin/projects/${id}` : '/admin/projects', { method: 'POST', body: fd });
        closeModal('project-modal');
        loadProjects();
    } catch(err) { alert(err.message); }
});

async function deleteProject(id) {
    if (!confirm('Delete this project?')) return;
    try {
        await req(`/admin/projects/${id}`, { method: 'DELETE' });
        loadProjects();
    } catch(err) { alert(err.message); }
}

// ===== MESSAGES =====
async function loadMessages() {
    try {
        const data = await req(API.contacts);
        const msgs = data.data || data;
        const list = document.getElementById('messages-list');
        list.innerHTML = msgs.length
            ? msgs.map(m => `
                <div class="msg-card">
                    <div class="msg-meta">
                        <span class="msg-name">${m.name}</span>
                        <span class="msg-email">${m.email}</span>
                    </div>
                    <div class="msg-subject">${m.subject || '(no subject)'}</div>
                    <div class="msg-body">${m.message}</div>
                    <div class="msg-date">${new Date(m.created_at).toLocaleString('id-ID')}</div>
                </div>
            `).join('')
            : '<div class="empty"><i class="fas fa-inbox"></i>No messages received yet.</div>';

        const badge = document.getElementById('msg-badge');
        if (msgs.length) { badge.textContent = msgs.length; badge.style.display = 'inline'; }
    } catch(e) { console.error('Messages:', e); }
}

// ===== INIT =====
loadProfile();
loadDashboard();