<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: #FFE8BE;
        color: white;
    }

    .admin-card {
        background: #2a0000;
        border: 1px solid #4a0000;
        border-radius: 16px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.3);
        transition: 0.3s;
    }

    input, textarea {
    color: black !important;
}

    .admin-card:hover {
        transform: translateY(-3px);
    }

    .title {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 12px;
    }

    input {
        background: #1a0000;
        border: 1px solid #4a0000;
        color: #8b0000;
        padding: 10px;
        border-radius: 10px;
        width: 100%;
        outline: none;
    }

    input:focus {
        border-color: #8b0000;
    }

    .btn {
        padding: 10px 14px;
        border-radius: 10px;
        cursor: pointer;
        transition: 0.3s;
        font-weight: 500;
        border: none;
    }

    .btn-maroon { background: #6b0000; color: white; }
    .btn-maroon:hover { background: #8b0000; }

    .btn-yellow { background: #b8860b; color: white; }
    .btn-red { background: #8b0000; color: white; }

    .grid-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
    }

    .grid-3 {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 12px;
    }

    .fade-in {
        animation: fadeIn 0.6s ease-in;
    }

    @keyframes fadeIn {
        from {opacity: 0; transform: translateY(10px);}
        to {opacity: 1; transform: translateY(0);}
    }
</style>

<x-app-layout>

<div class="p-6 fade-in">

    <h1 class="text-2xl font-bold mb-6">Admin Dashboard</h1>

    <!-- PROFILE -->
    <div class="admin-card">
        <div class="title">Profile</div>

        <div class="grid-2">
            <input id="nameInput" placeholder="Name">
            <input id="descInput" placeholder="Description">
        </div>

        <input type="file" id="photo" class="mt-3">

        <button onclick="updateProfile()" class="btn btn-maroon mt-3">
            Save Profile
        </button>
    </div>

    <!-- SKILLS -->
    <div class="admin-card">
        <div class="title">Skills</div>

        <div class="grid-2 mb-3">
            <input id="skillName" placeholder="Skill">
            <input id="skillLevel" placeholder="Level">
        </div>

        <button onclick="addSkill()" class="btn btn-maroon mb-4">
            Add Skill
        </button>

        <div id="skillList"></div>
    </div>

    <!-- EXPERIENCE -->
    <div class="admin-card">
        <div class="title">Experience</div>

        <div class="grid-3 mb-3">
            <input id="pos" placeholder="Position">
            <input id="comp" placeholder="Company">
            <input id="year" placeholder="Year">
        </div>

        <button onclick="addExp()" class="btn btn-maroon mb-4">
            Add Experience
        </button>

        <div id="expList"></div>
    </div>

    <div class="admin-card">
        <div class="title">Education</div>

        <div class="grid-3 mb-3">
            <input id="school" placeholder="School">
            <input id="major" placeholder="Major">
            <input id="year" placeholder="Year">
        </div>

        <button onclick="addEdu()" class="btn btn-maroon mb-4">
            Add Education
        </button>

        <div id="eduList"></div>
    </div>

</div>

<script>

// ================= PROFILE =================
function loadProfile() {
    fetch('/api/profile')
    .then(res => res.json())
    .then(data => {
        document.getElementById('nameInput').value = data.name ?? '';
        document.getElementById('descInput').value = data.description ?? '';
    });
}

function updateProfile() {

    let formData = new FormData();
    formData.append('name', nameInput.value);
    formData.append('description', descInput.value);

    let photo = document.getElementById('photo').files[0];
    if (photo) formData.append('photo', photo);

    fetch('/api/admin/profile', {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(() => alert('Profile updated'));
}


// ================= SKILLS =================
function loadSkills() {
    fetch('/api/skills')
    .then(res => res.json())
    .then(data => {

        let html = '';

        data.forEach(s => {
            html += `
            <div class="admin-card">
                <div class="grid-2">
                    <input value="${s.name}" id="name-${s.id}">
                    <input value="${s.level}" id="level-${s.id}">
                </div>

                <div class="mt-2">
                    <button onclick="updateSkill(${s.id})" class="btn btn-yellow">Update</button>
                    <button onclick="deleteSkill(${s.id})" class="btn btn-red">Delete</button>
                </div>
            </div>`;
        });

        skillList.innerHTML = html;
    });
}

function addSkill() {
    fetch('/api/skills', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({
            name: skillName.value,
            level: skillLevel.value
        })
    }).then(() => {
        skillName.value = '';
        skillLevel.value = '';
        loadSkills();
    });
}

function updateSkill(id) {
    fetch(`/api/skills/${id}`, {
        method: 'PUT',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({
            name: document.getElementById(`name-${id}`).value,
            level: document.getElementById(`level-${id}`).value
        })
    }).then(loadSkills);
}

function deleteSkill(id) {
    fetch(`/api/skills/${id}`, { method: 'DELETE' })
    .then(loadSkills);
}


// ================= EXPERIENCE =================
function loadExp() {
    fetch('/api/experiences')
    .then(res => res.json())
    .then(data => {

        let html = '';

        data.forEach(e => {
            html += `
            <div class="admin-card">
                <div class="grid-3">
                    <input value="${e.position}" id="pos-${e.id}">
                    <input value="${e.company}" id="comp-${e.id}">
                    <input value="${e.year}" id="year-${e.id}">
                </div>

                <div class="mt-2">
                    <button onclick="updateExp(${e.id})" class="btn btn-yellow">Update</button>
                    <button onclick="deleteExp(${e.id})" class="btn btn-red">Delete</button>
                </div>
            </div>`;
        });

        expList.innerHTML = html;
    });
}

function addExp() {
    fetch('/api/experiences', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({
            position: pos.value,
            company: comp.value,
            year: year.value
        })
    }).then(() => {
        pos.value = '';
        comp.value = '';
        year.value = '';
        loadExp();
    });
}

function updateExp(id) {
    fetch(`/api/experiences/${id}`, {
        method: 'PUT',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({
            position: document.getElementById(`pos-${id}`).value,
            company: document.getElementById(`comp-${id}`).value,
            year: document.getElementById(`year-${id}`).value
        })
    }).then(loadExp);
}

function deleteExp(id) {
    fetch(`/api/experiences/${id}`, { method: 'DELETE' })
    .then(loadExp);
}

function loadEdu() {
    fetch('/api/educations')
    .then(res => res.json())
    .then(data => {

        let html = '';

        data.forEach(e => {
            html += `
            <div class="admin-card mb-2">
                <input value="${e.school}" id="school-${e.id}">
                <input value="${e.major}" id="major-${e.id}">
                <input value="${e.year}" id="year-${e.id}">

                <button onclick="updateEdu(${e.id})">Update</button>
                <button onclick="deleteEdu(${e.id})">Delete</button>
            </div>`;
        });

        document.getElementById('eduList').innerHTML = html;
    });
}

function addEdu() {
    fetch('/api/educations', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({
            school: school.value,
            major: major.value,
            year: eduYear.value
        })
    }).then(loadEdu);
}

function updateEdu(id) {
    fetch(`/api/educations/${id}`, {
        method: 'PUT',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({
            school: document.getElementById(`school-${id}`).value,
            major: document.getElementById(`major-${id}`).value,
            year: document.getElementById(`eduYear-${id}`).value
        })
    }).then(loadEdu);
}

function deleteEdu(id) {
    fetch(`/api/educations/${id}`, { method: 'DELETE' })
    .then(loadEdu);
}




// INIT
loadProfile();
loadSkills();
loadExp();
loadEdu();

</script>

<script>
function addEdu() {
    let school = document.getElementById('school').value;
    let major = document.getElementById('major').value;
    let year = document.getElementById('eduYear').value;

    console.log("DATA:", school, major, year);

    fetch('/api/educations', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ school, major, year })
    })
    .then(res => res.json())
    .then(data => {
        console.log("SUCCESS:", data);
        loadEdu();
    })
    .catch(err => console.log("ERROR:", err));
}
</script>

</x-app-layout>