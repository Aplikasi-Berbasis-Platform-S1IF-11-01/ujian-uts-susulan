const ADMIN_API = '/api/admin';
const headers   = {
    'Content-Type': 'application/json',
    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
    'Accept': 'application/json',
};

// ── Profile update ──
async function updateProfile(formData) {
    const res = await fetch(`${ADMIN_API}/profile`, {
        method: 'PUT',
        headers,
        body: JSON.stringify(formData),
    });
    return res.json();
}

// ── Skill CRUD ──
async function createSkill(data) {
    const res = await fetch(`${ADMIN_API}/skills`, {
        method: 'POST', headers,
        body: JSON.stringify(data),
    });
    return res.json();
}

async function updateSkill(id, data) {
    const res = await fetch(`${ADMIN_API}/skills/${id}`, {
        method: 'PUT', headers,
        body: JSON.stringify(data),
    });
    return res.json();
}

async function deleteSkill(id) {
    await fetch(`${ADMIN_API}/skills/${id}`, { method: 'DELETE', headers });
}

// ── Load skills ke tabel admin ──
async function loadAdminSkills() {
    const res    = await fetch('/api/skills');
    const skills = await res.json();
    const tbody  = document.querySelector('#skills-table tbody');

    tbody.innerHTML = skills.map(s => `
        <tr>
            <td>${s.name}</td>
            <td>${s.category}</td>
            <td>${s.level}%</td>
            <td>
                <button onclick="editSkill(${s.id})">Edit</button>
                <button onclick="deleteSkill(${s.id}).then(loadAdminSkills)">Hapus</button>
            </td>
        </tr>
    `).join('');
}