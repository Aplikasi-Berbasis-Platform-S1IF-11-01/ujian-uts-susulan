<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        * { font-family: 'Inter', sans-serif; }
        .glass { background: rgba(255,255,255,0.03); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.08); }
        .gradient-text { background: linear-gradient(135deg,#6366f1,#a855f7); -webkit-background-clip:text; -webkit-text-fill-color:transparent; }
        .sidebar-link { transition: all 0.2s ease; }
        .sidebar-link:hover, .sidebar-link.active { background: rgba(99,102,241,0.15); color: white; border-left: 3px solid #6366f1; }
        .tab-btn.active { background: linear-gradient(135deg, #6366f1, #a855f7); color: white; }
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #0f0a2e; }
        ::-webkit-scrollbar-thumb { background: #6366f1; border-radius: 3px; }
        .toast { animation: slideIn 0.3s ease, fadeOut 0.3s ease 2.7s forwards; }
        @keyframes slideIn { from { transform: translateX(100%); opacity: 0; } to { transform: translateX(0); opacity: 1; } }
        @keyframes fadeOut { from { opacity: 1; } to { opacity: 0; } }
        .modal-overlay { animation: fadeIn 0.2s ease; }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        .modal-content { animation: scaleIn 0.2s ease; }
        @keyframes scaleIn { from { transform: scale(0.95); opacity: 0; } to { transform: scale(1); opacity: 1; } }
    </style>
</head>
<body class="bg-gray-950 text-white min-h-screen flex">

<!-- Toast Container -->
<div id="toast-container" class="fixed top-4 right-4 z-[100] flex flex-col gap-2"></div>

<!-- Sidebar -->
<aside class="w-64 min-h-screen glass border-r border-white/10 flex flex-col fixed left-0 top-0 bottom-0 z-40">
    <div class="p-6 border-b border-white/10">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center">
                <i class="fas fa-layer-group text-white"></i>
            </div>
            <div>
                <p class="font-bold text-white">Portfolio</p>
                <p class="text-xs text-gray-500">Admin Panel</p>
            </div>
        </div>
    </div>

    <nav class="flex-1 p-4 space-y-1">
        <button onclick="showSection('profile')" class="sidebar-link active w-full text-left px-4 py-3 rounded-xl text-gray-400 text-sm flex items-center gap-3 border-l-3 border-transparent" data-section="profile">
            <i class="fas fa-user w-5"></i> Profile
        </button>
        <button onclick="showSection('skills')" class="sidebar-link w-full text-left px-4 py-3 rounded-xl text-gray-400 text-sm flex items-center gap-3" data-section="skills">
            <i class="fas fa-code w-5"></i> Skills
        </button>
        <button onclick="showSection('projects')" class="sidebar-link w-full text-left px-4 py-3 rounded-xl text-gray-400 text-sm flex items-center gap-3" data-section="projects">
            <i class="fas fa-briefcase w-5"></i> Projects
        </button>
        <button onclick="showSection('experience')" class="sidebar-link w-full text-left px-4 py-3 rounded-xl text-gray-400 text-sm flex items-center gap-3" data-section="experience">
            <i class="fas fa-history w-5"></i> Experience
        </button>
        <div class="border-t border-white/10 pt-2 mt-2">
            <a href="/" target="_blank" class="sidebar-link w-full text-left px-4 py-3 rounded-xl text-gray-400 text-sm flex items-center gap-3">
                <i class="fas fa-eye w-5"></i> View Portfolio
            </a>
        </div>
    </nav>

    <div class="p-4 border-t border-white/10">
        <div class="flex items-center gap-3 mb-3">
            <div class="w-8 h-8 bg-indigo-500/20 rounded-full flex items-center justify-center">
                <i class="fas fa-user text-indigo-400 text-xs"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-white">{{ auth()->user()->name }}</p>
                <p class="text-xs text-gray-500">Administrator</p>
            </div>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full text-left px-3 py-2 text-red-400 hover:text-red-300 text-sm rounded-lg hover:bg-red-500/10 transition-colors flex items-center gap-2">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </div>
</aside>

<!-- Main Content -->
<main class="ml-64 flex-1 p-8">

    <!-- PROFILE SECTION -->
    <div id="section-profile" class="section">
        <div class="mb-8">
            <h1 class="text-3xl font-black">Profile <span class="gradient-text">Settings</span></h1>
            <p class="text-gray-500 mt-1">Manage your personal information</p>
        </div>

        <div class="glass rounded-2xl p-8">
            <form id="profile-form" enctype="multipart/form-data">
                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Photo Upload -->
                    <div class="flex flex-col items-center gap-4">
                        <div class="relative group cursor-pointer" onclick="document.getElementById('photo-input').click()">
                            <img id="photo-preview" src="https://ui-avatars.com/api/?name=Admin&background=6366f1&color=fff&size=200"
                                class="w-40 h-40 rounded-2xl object-cover border-2 border-white/20">
                            <div class="absolute inset-0 bg-black/50 rounded-2xl opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity">
                                <i class="fas fa-camera text-2xl"></i>
                            </div>
                        </div>
                        <input type="file" id="photo-input" name="photo" accept="image/*" class="hidden" onchange="previewPhoto(this)">
                        <button type="button" onclick="document.getElementById('photo-input').click()" class="text-sm text-indigo-400 hover:text-indigo-300 transition-colors">
                            <i class="fas fa-upload mr-1"></i> Upload Photo
                        </button>

                        <div class="w-full border-t border-white/10 pt-4">
                            <label class="block text-sm text-gray-400 mb-2">Upload CV (PDF)</label>
                            <label class="w-full border border-dashed border-white/20 rounded-xl p-3 text-center cursor-pointer hover:border-indigo-500/50 transition-colors block">
                                <i class="fas fa-file-pdf text-red-400 mb-1 block"></i>
                                <span id="cv-label" class="text-xs text-gray-400">Click to upload CV</span>
                                <input type="file" name="cv_file" accept=".pdf" class="hidden" onchange="document.getElementById('cv-label').textContent = this.files[0].name">
                            </label>
                        </div>
                    </div>

                    <!-- Form Fields -->
                    <div class="md:col-span-2 grid grid-cols-2 gap-4">
                        <div>
                            <label class="text-sm text-gray-400 mb-1 block">Full Name *</label>
                            <input type="text" name="name" id="p-name" class="w-full bg-gray-800/50 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:outline-none focus:border-indigo-500 transition-colors" placeholder="John Doe">
                        </div>
                        <div>
                            <label class="text-sm text-gray-400 mb-1 block">Professional Title *</label>
                            <input type="text" name="title" id="p-title" class="w-full bg-gray-800/50 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:outline-none focus:border-indigo-500 transition-colors" placeholder="Full Stack Developer">
                        </div>
                        <div class="col-span-2">
                            <label class="text-sm text-gray-400 mb-1 block">Bio *</label>
                            <textarea name="bio" id="p-bio" rows="4" class="w-full bg-gray-800/50 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:outline-none focus:border-indigo-500 transition-colors resize-none" placeholder="Tell us about yourself..."></textarea>
                        </div>
                        <div>
                            <label class="text-sm text-gray-400 mb-1 block">Email *</label>
                            <input type="email" name="email" id="p-email" class="w-full bg-gray-800/50 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:outline-none focus:border-indigo-500 transition-colors" placeholder="email@example.com">
                        </div>
                        <div>
                            <label class="text-sm text-gray-400 mb-1 block">Phone</label>
                            <input type="text" name="phone" id="p-phone" class="w-full bg-gray-800/50 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:outline-none focus:border-indigo-500 transition-colors" placeholder="+62 812 3456 7890">
                        </div>
                        <div>
                            <label class="text-sm text-gray-400 mb-1 block">Location</label>
                            <input type="text" name="location" id="p-location" class="w-full bg-gray-800/50 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:outline-none focus:border-indigo-500 transition-colors" placeholder="Purwokerto, Jawa Tengah">
                        </div>
                        <div>
                            <label class="text-sm text-gray-400 mb-1 block">GitHub URL</label>
                            <input type="url" name="github" id="p-github" class="w-full bg-gray-800/50 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:outline-none focus:border-indigo-500 transition-colors" placeholder="https://github.com/username">
                        </div>
                        <div>
                            <label class="text-sm text-gray-400 mb-1 block">LinkedIn URL</label>
                            <input type="url" name="linkedin" id="p-linkedin" class="w-full bg-gray-800/50 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:outline-none focus:border-indigo-500 transition-colors" placeholder="https://linkedin.com/in/username">
                        </div>
                        <div>
                            <label class="text-sm text-gray-400 mb-1 block">Instagram</label>
                            <input type="text" name="instagram" id="p-instagram" class="w-full bg-gray-800/50 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:outline-none focus:border-indigo-500 transition-colors" placeholder="@username">
                        </div>
                        <div class="col-span-2 flex justify-end mt-2">
                            <button type="submit" id="profile-save-btn" class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white px-8 py-3 rounded-xl font-semibold hover:opacity-90 transition-opacity flex items-center gap-2">
                                <i class="fas fa-save"></i> Save Profile
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- SKILLS SECTION -->
    <div id="section-skills" class="section hidden">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-black">Skills <span class="gradient-text">Management</span></h1>
                <p class="text-gray-500 mt-1">Manage your technical skills</p>
            </div>
            <button onclick="openModal('skill-modal')" class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white px-5 py-2.5 rounded-xl font-semibold hover:opacity-90 transition-opacity flex items-center gap-2">
                <i class="fas fa-plus"></i> Add Skill
            </button>
        </div>
        <div id="skills-table" class="glass rounded-2xl overflow-hidden">
            <table class="w-full">
                <thead class="border-b border-white/10 bg-white/5">
                    <tr>
                        <th class="text-left text-gray-400 text-sm px-6 py-4">Skill</th>
                        <th class="text-left text-gray-400 text-sm px-6 py-4">Category</th>
                        <th class="text-left text-gray-400 text-sm px-6 py-4">Level</th>
                        <th class="text-right text-gray-400 text-sm px-6 py-4">Actions</th>
                    </tr>
                </thead>
                <tbody id="skills-tbody"></tbody>
            </table>
        </div>
    </div>

    <!-- PROJECTS SECTION -->
    <div id="section-projects" class="section hidden">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-black">Projects <span class="gradient-text">Management</span></h1>
                <p class="text-gray-500 mt-1">Manage your portfolio projects</p>
            </div>
            <button onclick="openModal('project-modal')" class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white px-5 py-2.5 rounded-xl font-semibold hover:opacity-90 transition-opacity flex items-center gap-2">
                <i class="fas fa-plus"></i> Add Project
            </button>
        </div>
        <div id="projects-grid" class="grid md:grid-cols-2 lg:grid-cols-3 gap-6"></div>
    </div>

    <!-- EXPERIENCE SECTION -->
    <div id="section-experience" class="section hidden">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-black">Experience <span class="gradient-text">Management</span></h1>
                <p class="text-gray-500 mt-1">Manage your work experience</p>
            </div>
            <button onclick="openModal('exp-modal')" class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white px-5 py-2.5 rounded-xl font-semibold hover:opacity-90 transition-opacity flex items-center gap-2">
                <i class="fas fa-plus"></i> Add Experience
            </button>
        </div>
        <div id="experience-list" class="space-y-4"></div>
    </div>

</main>

<!-- SKILL MODAL -->
<div id="skill-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center">
    <div class="modal-overlay absolute inset-0 bg-black/70 backdrop-blur-sm" onclick="closeModal('skill-modal')"></div>
    <div class="modal-content relative glass border border-white/10 rounded-2xl p-8 w-full max-w-md mx-4 z-10">
        <h2 class="text-xl font-bold mb-6" id="skill-modal-title">Add Skill</h2>
        <form id="skill-form" class="space-y-4">
            <input type="hidden" id="skill-id">
            <div>
                <label class="text-sm text-gray-400 mb-1 block">Skill Name *</label>
                <input type="text" id="s-name" class="w-full bg-gray-800 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-indigo-500" placeholder="Laravel">
            </div>
            <div>
                <label class="text-sm text-gray-400 mb-1 block">Category *</label>
                <select id="s-category" class="w-full bg-gray-800 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-indigo-500">
                    <option value="Frontend">Frontend</option>
                    <option value="Backend">Backend</option>
                    <option value="Tools">Tools</option>
                    <option value="Database">Database</option>
                    <option value="Mobile">Mobile</option>
                    <option value="DevOps">DevOps</option>
                </select>
            </div>
            <div>
                <label class="text-sm text-gray-400 mb-1 block">Level: <span id="level-display">80</span>%</label>
                <input type="range" id="s-level" min="0" max="100" value="80"
                    oninput="document.getElementById('level-display').textContent = this.value"
                    class="w-full accent-indigo-500">
            </div>
            <div>
                <label class="text-sm text-gray-400 mb-1 block">Icon (Font Awesome class)</label>
                <input type="text" id="s-icon" class="w-full bg-gray-800 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-indigo-500" placeholder="fab fa-laravel">
            </div>
            <div class="flex gap-3 pt-2">
                <button type="button" onclick="closeModal('skill-modal')" class="flex-1 border border-white/20 text-gray-300 px-4 py-3 rounded-xl hover:bg-white/5 transition-colors">Cancel</button>
                <button type="submit" class="flex-1 bg-gradient-to-r from-indigo-500 to-purple-600 text-white px-4 py-3 rounded-xl font-semibold hover:opacity-90 transition-opacity">Save</button>
            </div>
        </form>
    </div>
</div>

<!-- PROJECT MODAL -->
<div id="project-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center">
    <div class="modal-overlay absolute inset-0 bg-black/70 backdrop-blur-sm" onclick="closeModal('project-modal')"></div>
    <div class="modal-content relative glass border border-white/10 rounded-2xl p-8 w-full max-w-2xl mx-4 z-10 max-h-[90vh] overflow-y-auto">
        <h2 class="text-xl font-bold mb-6" id="project-modal-title">Add Project</h2>
        <form id="project-form" class="space-y-4" enctype="multipart/form-data">
            <input type="hidden" id="project-id">
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-2">
                    <label class="text-sm text-gray-400 mb-1 block">Project Title *</label>
                    <input type="text" id="proj-title" class="w-full bg-gray-800 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-indigo-500" placeholder="My Awesome Project">
                </div>
                <div class="col-span-2">
                    <label class="text-sm text-gray-400 mb-1 block">Description *</label>
                    <textarea id="proj-desc" rows="3" class="w-full bg-gray-800 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-indigo-500 resize-none" placeholder="Project description..."></textarea>
                </div>
                <div class="col-span-2">
                    <label class="text-sm text-gray-400 mb-1 block">Tech Stack (comma separated) *</label>
                    <input type="text" id="proj-tech" class="w-full bg-gray-800 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-indigo-500" placeholder="Laravel, Vue.js, MySQL">
                </div>
                <div>
                    <label class="text-sm text-gray-400 mb-1 block">GitHub URL</label>
                    <input type="url" id="proj-github" class="w-full bg-gray-800 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-indigo-500" placeholder="https://github.com/...">
                </div>
                <div>
                    <label class="text-sm text-gray-400 mb-1 block">Live URL</label>
                    <input type="url" id="proj-live" class="w-full bg-gray-800 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-indigo-500" placeholder="https://...">
                </div>
                <div class="col-span-2">
                    <label class="text-sm text-gray-400 mb-1 block">Project Image</label>
                    <input type="file" id="proj-image" accept="image/*" class="w-full bg-gray-800 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-indigo-500">
                </div>
                <div class="col-span-2 flex items-center gap-3">
                    <input type="checkbox" id="proj-featured" class="w-4 h-4 accent-indigo-500">
                    <label class="text-sm text-gray-300">Mark as Featured Project</label>
                </div>
            </div>
            <div class="flex gap-3 pt-2">
                <button type="button" onclick="closeModal('project-modal')" class="flex-1 border border-white/20 text-gray-300 px-4 py-3 rounded-xl hover:bg-white/5 transition-colors">Cancel</button>
                <button type="submit" class="flex-1 bg-gradient-to-r from-indigo-500 to-purple-600 text-white px-4 py-3 rounded-xl font-semibold hover:opacity-90 transition-opacity">Save</button>
            </div>
        </form>
    </div>
</div>

<!-- EXPERIENCE MODAL -->
<div id="exp-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center">
    <div class="modal-overlay absolute inset-0 bg-black/70 backdrop-blur-sm" onclick="closeModal('exp-modal')"></div>
    <div class="modal-content relative glass border border-white/10 rounded-2xl p-8 w-full max-w-lg mx-4 z-10">
        <h2 class="text-xl font-bold mb-6" id="exp-modal-title">Add Experience</h2>
        <form id="exp-form" class="space-y-4">
            <input type="hidden" id="exp-id">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-sm text-gray-400 mb-1 block">Company *</label>
                    <input type="text" id="e-company" class="w-full bg-gray-800 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-indigo-500" placeholder="PT. Company">
                </div>
                <div>
                    <label class="text-sm text-gray-400 mb-1 block">Position *</label>
                    <input type="text" id="e-position" class="w-full bg-gray-800 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-indigo-500" placeholder="Full Stack Developer">
                </div>
                <div>
                    <label class="text-sm text-gray-400 mb-1 block">Start Date *</label>
                    <input type="month" id="e-start" class="w-full bg-gray-800 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-indigo-500">
                </div>
                <div>
                    <label class="text-sm text-gray-400 mb-1 block">End Date</label>
                    <input type="month" id="e-end" class="w-full bg-gray-800 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-indigo-500">
                </div>
                <div class="col-span-2 flex items-center gap-3">
                    <input type="checkbox" id="e-current" class="w-4 h-4 accent-indigo-500" onchange="document.getElementById('e-end').disabled = this.checked">
                    <label class="text-sm text-gray-300">Currently working here</label>
                </div>
                <div class="col-span-2">
                    <label class="text-sm text-gray-400 mb-1 block">Description *</label>
                    <textarea id="e-desc" rows="3" class="w-full bg-gray-800 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-indigo-500 resize-none" placeholder="Describe your responsibilities..."></textarea>
                </div>
            </div>
            <div class="flex gap-3 pt-2">
                <button type="button" onclick="closeModal('exp-modal')" class="flex-1 border border-white/20 text-gray-300 px-4 py-3 rounded-xl hover:bg-white/5 transition-colors">Cancel</button>
                <button type="submit" class="flex-1 bg-gradient-to-r from-indigo-500 to-purple-600 text-white px-4 py-3 rounded-xl font-semibold hover:opacity-90 transition-opacity">Save</button>
            </div>
        </form>
    </div>
</div>

<!-- Delete Confirm Modal -->
<div id="delete-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center">
    <div class="absolute inset-0 bg-black/70 backdrop-blur-sm" onclick="closeModal('delete-modal')"></div>
    <div class="relative glass border border-white/10 rounded-2xl p-8 w-full max-w-sm mx-4 z-10 text-center">
        <div class="w-14 h-14 bg-red-500/20 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-trash text-red-400 text-xl"></i>
        </div>
        <h3 class="text-xl font-bold mb-2">Confirm Delete</h3>
        <p class="text-gray-400 mb-6 text-sm">Are you sure? This action cannot be undone.</p>
        <div class="flex gap-3">
            <button onclick="closeModal('delete-modal')" class="flex-1 border border-white/20 text-gray-300 px-4 py-3 rounded-xl hover:bg-white/5 transition-colors">Cancel</button>
            <button id="confirm-delete-btn" class="flex-1 bg-red-500 text-white px-4 py-3 rounded-xl font-semibold hover:bg-red-600 transition-colors">Delete</button>
        </div>
    </div>
</div>

<script>
const CSRF = document.querySelector('meta[name="csrf-token"]').content;
const API = '/api';
let deleteCallback = null;
let editingProjectId = null;

// Toast
function showToast(message, type = 'success') {
    const colors = { success: 'bg-green-500', error: 'bg-red-500', info: 'bg-indigo-500' };
    const icons = { success: 'fa-check-circle', error: 'fa-times-circle', info: 'fa-info-circle' };
    const toast = document.createElement('div');
    toast.className = `toast ${colors[type]} text-white px-5 py-3 rounded-xl shadow-xl flex items-center gap-3 text-sm font-medium`;
    toast.innerHTML = `<i class="fas ${icons[type]}"></i>${message}`;
    document.getElementById('toast-container').appendChild(toast);
    setTimeout(() => toast.remove(), 3200);
}

// Section Navigation
function showSection(name) {
    document.querySelectorAll('.section').forEach(s => s.classList.add('hidden'));
    document.getElementById('section-' + name).classList.remove('hidden');
    document.querySelectorAll('.sidebar-link').forEach(l => l.classList.remove('active'));
    document.querySelector(`[data-section="${name}"]`)?.classList.add('active');
    loadSection(name);
}

function loadSection(name) {
    const loaders = { profile: loadProfile, skills: loadSkills, projects: loadProjects, experience: loadExperience };
    if (loaders[name]) loaders[name]();
}

// Modal
function openModal(id) {
    document.getElementById(id).classList.remove('hidden');
}
function closeModal(id) {
    document.getElementById(id).classList.add('hidden');
    if (id === 'skill-modal') { resetSkillForm(); }
    if (id === 'project-modal') { resetProjectForm(); }
    if (id === 'exp-modal') { resetExpForm(); }
}

// Photo preview
function previewPhoto(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => document.getElementById('photo-preview').src = e.target.result;
        reader.readAsDataURL(input.files[0]);
    }
}

// ============ PROFILE ============
async function loadProfile() {
    try {
        const res = await fetch(`${API}/profile`);
        if (!res.ok) return;
        const data = await res.json();
        document.getElementById('p-name').value = data.name || '';
        document.getElementById('p-title').value = data.title || '';
        document.getElementById('p-bio').value = data.bio || '';
        document.getElementById('p-email').value = data.email || '';
        document.getElementById('p-phone').value = data.phone || '';
        document.getElementById('p-location').value = data.location || '';
        document.getElementById('p-github').value = data.github || '';
        document.getElementById('p-linkedin').value = data.linkedin || '';
        document.getElementById('p-instagram').value = data.instagram || '';
        if (data.photo_url) document.getElementById('photo-preview').src = data.photo_url;
    } catch (e) { showToast('Failed to load profile', 'error'); }
}

document.getElementById('profile-form').addEventListener('submit', async function(e) {
    e.preventDefault();
    const btn = document.getElementById('profile-save-btn');
    btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Saving...';
    btn.disabled = true;

    const formData = new FormData(this);
    formData.append('_method', 'PUT');

    try {
        const res = await fetch(`${API}/profile`, {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': CSRF },
            body: formData
        });
        const data = await res.json();
        if (res.ok) { showToast('Profile saved successfully!'); }
        else { showToast(data.message || 'Error saving profile', 'error'); }
    } catch (e) { showToast('Network error', 'error'); }
    finally {
        btn.innerHTML = '<i class="fas fa-save"></i> Save Profile';
        btn.disabled = false;
    }
});

// ============ SKILLS ============
async function loadSkills() {
    try {
        const res = await fetch(`${API}/skills`);
        const grouped = await res.json();
        const tbody = document.getElementById('skills-tbody');
        tbody.innerHTML = '';

        Object.entries(grouped).forEach(([category, skills]) => {
            skills.forEach(skill => {
                tbody.innerHTML += `
                    <tr class="border-b border-white/5 hover:bg-white/5 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <i class="${skill.icon || 'fas fa-code'} text-indigo-400 w-5"></i>
                                <span class="font-medium">${skill.name}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="bg-indigo-500/20 text-indigo-300 text-xs px-3 py-1 rounded-full">${skill.category}</span>
                        </td>
                        <td class="px-6 py-4 w-48">
                            <div class="flex items-center gap-2">
                                <div class="flex-1 h-2 bg-gray-700 rounded-full overflow-hidden">
                                    <div class="h-full bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full" style="width:${skill.level}%"></div>
                                </div>
                                <span class="text-xs text-gray-400 w-8">${skill.level}%</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button onclick="editSkill(${JSON.stringify(skill).replace(/"/g, '&quot;')})" class="text-blue-400 hover:text-blue-300 mr-3 text-sm transition-colors"><i class="fas fa-edit"></i></button>
                            <button onclick="deleteItem('skills', ${skill.id})" class="text-red-400 hover:text-red-300 text-sm transition-colors"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>`;
            });
        });
    } catch (e) { showToast('Failed to load skills', 'error'); }
}

function editSkill(skill) {
    document.getElementById('skill-modal-title').textContent = 'Edit Skill';
    document.getElementById('skill-id').value = skill.id;
    document.getElementById('s-name').value = skill.name;
    document.getElementById('s-category').value = skill.category;
    document.getElementById('s-level').value = skill.level;
    document.getElementById('level-display').textContent = skill.level;
    document.getElementById('s-icon').value = skill.icon || '';
    openModal('skill-modal');
}

function resetSkillForm() {
    document.getElementById('skill-modal-title').textContent = 'Add Skill';
    document.getElementById('skill-id').value = '';
    document.getElementById('skill-form').reset();
    document.getElementById('level-display').textContent = '80';
}

document.getElementById('skill-form').addEventListener('submit', async function(e) {
    e.preventDefault();
    const id = document.getElementById('skill-id').value;
    const body = JSON.stringify({
        name: document.getElementById('s-name').value,
        category: document.getElementById('s-category').value,
        level: parseInt(document.getElementById('s-level').value),
        icon: document.getElementById('s-icon').value,
    });

    try {
        const res = await fetch(id ? `${API}/skills/${id}` : `${API}/skills`, {
            method: id ? 'PUT' : 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF },
            body
        });
        if (res.ok) {
            showToast(id ? 'Skill updated!' : 'Skill added!');
            closeModal('skill-modal');
            loadSkills();
        } else {
            const d = await res.json();
            showToast(d.message || 'Error', 'error');
        }
    } catch (e) { showToast('Network error', 'error'); }
});

// ============ PROJECTS ============
async function loadProjects() {
    try {
        const res = await fetch(`${API}/projects`);
        const projects = await res.json();
        const grid = document.getElementById('projects-grid');
        grid.innerHTML = '';

        if (!projects.length) {
            grid.innerHTML = '<div class="col-span-3 text-center text-gray-500 py-12"><i class="fas fa-folder-open text-4xl mb-3 block"></i>No projects yet</div>';
            return;
        }

        projects.forEach(project => {
            const img = project.image_url || `https://picsum.photos/seed/${project.id}/400/250`;
            const techs = Array.isArray(project.tech_stack) ? project.tech_stack : [];
            const card = document.createElement('div');
            card.className = 'glass rounded-2xl overflow-hidden group';
            card.innerHTML = `
                <div class="relative h-40 overflow-hidden">
                    <img src="${img}" alt="${project.title}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                         onerror="this.src='https://picsum.photos/seed/${project.id}/400/250'">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 to-transparent"></div>
                    ${project.featured ? '<div class="absolute top-2 left-2 bg-yellow-500 text-black text-xs font-bold px-2 py-0.5 rounded-full">⭐ Featured</div>' : ''}
                </div>
                <div class="p-5">
                    <h3 class="font-bold mb-1 truncate">${project.title}</h3>
                    <p class="text-gray-400 text-xs mb-3 line-clamp-2">${project.description}</p>
                    <div class="flex flex-wrap gap-1 mb-4">
                        ${techs.slice(0,3).map(t => `<span class="text-xs bg-indigo-500/15 text-indigo-300 px-2 py-0.5 rounded-full">${t}</span>`).join('')}
                        ${techs.length > 3 ? `<span class="text-xs text-gray-500">+${techs.length-3}</span>` : ''}
                    </div>
                    <div class="flex justify-between items-center">
                        <button onclick='editProject(${JSON.stringify(project).replace(/'/g, "\\'")})' class="text-blue-400 hover:text-blue-300 text-sm transition-colors">
                            <i class="fas fa-edit mr-1"></i>Edit
                        </button>
                        <button onclick="deleteItem('projects', ${project.id})" class="text-red-400 hover:text-red-300 text-sm transition-colors">
                            <i class="fas fa-trash mr-1"></i>Delete
                        </button>
                    </div>
                </div>
            `;
            grid.appendChild(card);
        });
    } catch (e) { showToast('Failed to load projects', 'error'); }
}

function editProject(project) {
    document.getElementById('project-modal-title').textContent = 'Edit Project';
    document.getElementById('project-id').value = project.id;
    document.getElementById('proj-title').value = project.title;
    document.getElementById('proj-desc').value = project.description;
    const techs = Array.isArray(project.tech_stack) ? project.tech_stack.join(', ') : project.tech_stack;
    document.getElementById('proj-tech').value = techs;
    document.getElementById('proj-github').value = project.github_url || '';
    document.getElementById('proj-live').value = project.live_url || '';
    document.getElementById('proj-featured').checked = project.featured;
    openModal('project-modal');
}

function resetProjectForm() {
    document.getElementById('project-modal-title').textContent = 'Add Project';
    document.getElementById('project-id').value = '';
    document.getElementById('project-form').reset();
}

document.getElementById('project-form').addEventListener('submit', async function(e) {
    e.preventDefault();
    const id = document.getElementById('project-id').value;
    const techStr = document.getElementById('proj-tech').value;
    const techArray = techStr.split(',').map(t => t.trim()).filter(Boolean);

    const formData = new FormData();
    formData.append('title', document.getElementById('proj-title').value);
    formData.append('description', document.getElementById('proj-desc').value);
    formData.append('tech_stack', JSON.stringify(techArray));
    formData.append('github_url', document.getElementById('proj-github').value);
    formData.append('live_url', document.getElementById('proj-live').value);
    formData.append('featured', document.getElementById('proj-featured').checked ? '1' : '0');

    const imageFile = document.getElementById('proj-image').files[0];
    if (imageFile) formData.append('image', imageFile);
    if (id) formData.append('_method', 'PUT');

    try {
        const res = await fetch(id ? `${API}/projects/${id}` : `${API}/projects`, {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': CSRF },
            body: formData
        });
        if (res.ok) {
            showToast(id ? 'Project updated!' : 'Project added!');
            closeModal('project-modal');
            loadProjects();
        } else {
            const d = await res.json();
            showToast(d.message || 'Error', 'error');
        }
    } catch (e) { showToast('Network error', 'error'); }
});

// ============ EXPERIENCE ============
async function loadExperience() {
    try {
        const res = await fetch(`${API}/experiences`);
        const experiences = await res.json();
        const list = document.getElementById('experience-list');
        list.innerHTML = '';

        if (!experiences.length) {
            list.innerHTML = '<div class="text-center text-gray-500 py-12"><i class="fas fa-briefcase text-4xl mb-3 block"></i>No experience yet</div>';
            return;
        }

        experiences.forEach(exp => {
            const endDate = exp.is_current ? '<span class="text-green-400">Present</span>' : (exp.end_date || '-');
            const item = document.createElement('div');
            item.className = 'glass rounded-2xl p-6 flex justify-between items-start gap-4';
            item.innerHTML = `
                <div class="flex-1">
                    <div class="flex flex-wrap items-center gap-3 mb-1">
                        <h3 class="font-bold">${exp.position}</h3>
                        ${exp.is_current ? '<span class="bg-green-500/20 text-green-400 text-xs px-2 py-0.5 rounded-full">Current</span>' : ''}
                    </div>
                    <p class="text-indigo-400 font-medium text-sm mb-2">${exp.company}</p>
                    <p class="text-gray-500 text-xs mb-3">${exp.start_date} — ${endDate}</p>
                    <p class="text-gray-400 text-sm">${exp.description}</p>
                </div>
                <div class="flex gap-2 shrink-0">
                    <button onclick='editExperience(${JSON.stringify(exp).replace(/'/g, "\\'")})' class="w-8 h-8 bg-blue-500/20 text-blue-400 hover:text-blue-300 rounded-lg flex items-center justify-center text-sm transition-colors">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button onclick="deleteItem('experiences', ${exp.id})" class="w-8 h-8 bg-red-500/20 text-red-400 hover:text-red-300 rounded-lg flex items-center justify-center text-sm transition-colors">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            `;
            list.appendChild(item);
        });
    } catch (e) { showToast('Failed to load experience', 'error'); }
}

function editExperience(exp) {
    document.getElementById('exp-modal-title').textContent = 'Edit Experience';
    document.getElementById('exp-id').value = exp.id;
    document.getElementById('e-company').value = exp.company;
    document.getElementById('e-position').value = exp.position;
    document.getElementById('e-start').value = exp.start_date;
    document.getElementById('e-end').value = exp.end_date || '';
    document.getElementById('e-current').checked = exp.is_current;
    document.getElementById('e-end').disabled = exp.is_current;
    document.getElementById('e-desc').value = exp.description;
    openModal('exp-modal');
}

function resetExpForm() {
    document.getElementById('exp-modal-title').textContent = 'Add Experience';
    document.getElementById('exp-id').value = '';
    document.getElementById('exp-form').reset();
    document.getElementById('e-end').disabled = false;
}

document.getElementById('exp-form').addEventListener('submit', async function(e) {
    e.preventDefault();
    const id = document.getElementById('exp-id').value;
    const body = JSON.stringify({
        company: document.getElementById('e-company').value,
        position: document.getElementById('e-position').value,
        description: document.getElementById('e-desc').value,
        start_date: document.getElementById('e-start').value,
        end_date: document.getElementById('e-end').value || null,
        is_current: document.getElementById('e-current').checked,
    });

    try {
        const res = await fetch(id ? `${API}/experiences/${id}` : `${API}/experiences`, {
            method: id ? 'PUT' : 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF },
            body
        });
        if (res.ok) {
            showToast(id ? 'Experience updated!' : 'Experience added!');
            closeModal('exp-modal');
            loadExperience();
        } else {
            const d = await res.json();
            showToast(d.message || 'Error', 'error');
        }
    } catch (e) { showToast('Network error', 'error'); }
});

// ============ DELETE ============
function deleteItem(type, id) {
    openModal('delete-modal');
    deleteCallback = async () => {
        try {
            const res = await fetch(`${API}/${type}/${id}`, {
                method: 'DELETE',
                headers: { 'X-CSRF-TOKEN': CSRF }
            });
            if (res.ok) {
                showToast('Deleted successfully!');
                closeModal('delete-modal');
                loadSection(type === 'experiences' ? 'experience' : type);
            } else {
                showToast('Failed to delete', 'error');
            }
        } catch (e) { showToast('Network error', 'error'); }
    };
}

document.getElementById('confirm-delete-btn').addEventListener('click', () => {
    if (deleteCallback) deleteCallback();
});

// Init
loadProfile();
</script>
</body>
</html>