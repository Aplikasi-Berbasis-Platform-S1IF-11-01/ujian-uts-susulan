<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>

<!-- SIDEBAR -->
<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="sidebar-logo">Admin</div>
        <button class="sidebar-close" id="sidebarClose"><i class="fas fa-times"></i></button>
    </div>
    <nav class="sidebar-nav">
        <a href="#" class="nav-item active" data-tab="dashboard">
            <i class="fas fa-home"></i> Dashboard
        </a>
        <a href="#" class="nav-item" data-tab="profile">
            <i class="fas fa-user"></i> Profile
        </a>
        <a href="#" class="nav-item" data-tab="skills">
            <i class="fas fa-code"></i> Skills
        </a>
        <a href="#" class="nav-item" data-tab="projects">
            <i class="fas fa-rocket"></i> Projects
        </a>
        <a href="#" class="nav-item" data-tab="messages">
            <i class="fas fa-envelope"></i> Messages
            <span class="badge" id="msg-badge" style="display:none">0</span>
        </a>
    </nav>
    <div class="sidebar-footer">
        <a href="{{ route('portfolio') }}" target="_blank" class="sidebar-link"><i class="fas fa-external-link-alt"></i> View Portfolio</a>
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</button>
        </form>
    </div>
</aside>

<!-- MAIN -->
<main class="main">
    <header class="topbar">
        <button class="menu-btn" id="menuBtn"><i class="fas fa-bars"></i></button>
        <div class="topbar-title" id="page-title">Dashboard</div>
        <div class="topbar-user">
            <div class="user-avatar">{{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}</div>
            <span>{{ auth()->user()->name ?? 'Admin' }}</span>
        </div>
    </header>

    <div class="content">

        <!-- DASHBOARD TAB -->
        <div class="tab-content active" id="tab-dashboard">
            <div class="page-header"><h1>Overview</h1><p>Welcome back to your portfolio admin.</p></div>
            <div class="stats-row" id="dash-stats">
                <div class="stat-box skeleton"></div>
                <div class="stat-box skeleton"></div>
                <div class="stat-box skeleton"></div>
                <div class="stat-box skeleton"></div>
            </div>
            <div class="card">
                <div class="card-header"><h2>Recent Messages</h2></div>
                <div id="recent-messages"><div class="skeleton" style="height:60px;border-radius:8px"></div></div>
            </div>
        </div>

        <!-- PROFILE TAB -->
        <div class="tab-content" id="tab-profile">
            <div class="page-header">
                <h1>Profile</h1><p>Update your personal information.</p>
            </div>
            <form id="profile-form" class="card" enctype="multipart/form-data">
                @csrf
                <div class="card-header"><h2>Personal Info</h2></div>
                <div class="form-grid">
                    <div class="form-col">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="name" id="p_name" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <label>Role / Title</label>
                            <input type="text" name="role" id="p_role" placeholder="Full Stack Developer">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" id="p_email" placeholder="you@email.com">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" id="p_phone" placeholder="+62 ...">
                        </div>
                        <div class="form-group">
                            <label>Location</label>
                            <input type="text" name="location" id="p_location" placeholder="City, Country">
                        </div>
                        <div class="form-group">
                            <label>GitHub URL</label>
                            <input type="text" name="github" id="p_github" placeholder="https://github.com/...">
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label>Years Experience</label>
                                <input type="number" name="experience_years" id="p_exp" placeholder="3">
                            </div>
                            <div class="form-group">
                                <label>Projects Done</label>
                                <input type="number" name="projects_done" id="p_proj" placeholder="20">
                            </div>
                            <div class="form-group">
                                <label>Clients</label>
                                <input type="number" name="clients" id="p_clients" placeholder="10">
                            </div>
                        </div>
                    </div>
                    <div class="form-col">
                        <div class="form-group">
                            <label>Short Bio (Hero Section)</label>
                            <textarea name="short_bio" id="p_short_bio" rows="3" placeholder="Brief intro shown on hero..."></textarea>
                        </div>
                        <div class="form-group">
                            <label>Full Bio (About Section)</label>
                            <textarea name="bio" id="p_bio" rows="5" placeholder="Longer description for about section..."></textarea>
                        </div>
                        <div class="form-group">
                            <label>Profile Photo</label>
                            <div class="photo-upload-area" id="photo-area">
                                <div class="photo-preview" id="photo-preview">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <span>Click or drag photo here</span>
                                </div>
                                <input type="file" name="photo" id="photo-input" accept="image/*" style="display:none">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <div id="profile-alert" class="alert-inline"></div>
                    <button type="submit" class="btn-save"><i class="fas fa-save"></i> Save Profile</button>
                </div>
            </form>
        </div>

        <!-- SKILLS TAB -->
        <div class="tab-content" id="tab-skills">
            <div class="page-header">
                <h1>Skills</h1>
                <button class="btn-add" id="add-skill-btn"><i class="fas fa-plus"></i> Add Skill</button>
            </div>
            <div class="card">
                <div id="skills-list"></div>
            </div>
            <!-- Skill Modal -->
            <div class="modal-overlay" id="skill-modal">
                <div class="modal">
                    <div class="modal-header">
                        <h3 id="skill-modal-title">Add Skill</h3>
                        <button class="modal-close" data-close="skill-modal"><i class="fas fa-times"></i></button>
                    </div>
                    <form id="skill-form">
                        <input type="hidden" name="skill_id" id="skill_id">
                        <div class="form-group">
                            <label>Skill Name</label>
                            <input type="text" name="name" id="skill_name" placeholder="e.g. Laravel" required>
                        </div>
                        <div class="form-group">
                            <label>Level (0-100)</label>
                            <input type="number" name="level" id="skill_level" min="0" max="100" placeholder="85">
                            <div class="range-preview">
                                <div class="range-bar"><div class="range-fill" id="range-fill"></div></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Category (optional)</label>
                            <input type="text" name="category" id="skill_category" placeholder="Frontend / Backend / DevOps">
                        </div>
                        <div class="modal-actions">
                            <button type="button" class="btn-cancel" data-close="skill-modal">Cancel</button>
                            <button type="submit" class="btn-save">Save Skill</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- PROJECTS TAB -->
        <div class="tab-content" id="tab-projects">
            <div class="page-header">
                <h1>Projects</h1>
                <button class="btn-add" id="add-project-btn"><i class="fas fa-plus"></i> Add Project</button>
            </div>
            <div class="card">
                <div id="projects-list"></div>
            </div>
            <!-- Project Modal -->
            <div class="modal-overlay" id="project-modal">
                <div class="modal">
                    <div class="modal-header">
                        <h3 id="project-modal-title">Add Project</h3>
                        <button class="modal-close" data-close="project-modal"><i class="fas fa-times"></i></button>
                    </div>
                    <form id="project-form" enctype="multipart/form-data">
                        <input type="hidden" name="project_id" id="project_id">
                        <div class="form-group">
                            <label>Project Title</label>
                            <input type="text" name="title" id="proj_title" placeholder="My Awesome Project" required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" id="proj_desc" rows="3" placeholder="What's this project about?"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Project URL</label>
                            <input type="text" name="link" id="proj_link" placeholder="https://...">
                        </div>
                        <div class="form-group">
                            <label>Project Image (optional)</label>
                            <input type="file" name="image" id="proj_image" accept="image/*">
                        </div>
                        <div class="modal-actions">
                            <button type="button" class="btn-cancel" data-close="project-modal">Cancel</button>
                            <button type="submit" class="btn-save">Save Project</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- MESSAGES TAB -->
        <div class="tab-content" id="tab-messages">
            <div class="page-header"><h1>Messages</h1><p>Contact form submissions.</p></div>
            <div class="card">
                <div id="messages-list"></div>
            </div>
        </div>

    </div>
</main>

<script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>