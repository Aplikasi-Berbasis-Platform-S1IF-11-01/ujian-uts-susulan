<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            height: 100%;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #0f0f0f;
            color: #ffffff;
            overflow: hidden;
        }

        .wrapper {
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: #161616;
            border-right: 1px solid #2e2e2e;
            padding: 25px 18px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            z-index: 100;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 30px;
            color: #fff;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .menu a {
            display: block;
            padding: 12px 15px;
            border-radius: 10px;
            text-decoration: none;
            color: #d4d4d4;
            transition: 0.3s;
            border: 1px solid transparent;
        }

        .menu a:hover {
            background: #232323;
            color: #ffffff;
            border-color: #2e2e2e;
        }

        .menu a.active {
            background: #ffffff;
            color: #111111;
            font-weight: 700;
        }

        .sidebar-footer {
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #2e2e2e;
        }

        .preview-btn {
            display: block;
            width: 100%;
            text-align: center;
            padding: 12px 15px;
            border-radius: 10px;
            text-decoration: none;
            background: #222222;
            color: #ffffff;
            border: 1px solid #333333;
            transition: 0.3s;
        }

        .preview-btn:hover {
            background: #2b2b2b;
        }

        .main {
            margin-left: 260px;
            flex: 1;
            display: flex;
            flex-direction: column;
            min-width: 0;
            height: 100vh;
        }

        .topbar {
            background: #181818;
            padding: 20px 30px;
            border-bottom: 1px solid #2e2e2e;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-shrink: 0;
        }

        .topbar h3 {
            margin: 0;
            font-size: 20px;
            font-weight: 600;
            color: #ffffff;
        }

        .content {
            padding: 12px 18px;
            flex: 1;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .logout-btn {
            background: #2e2e2e;
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background: #444;
        }

        @media (max-width: 992px) {
            body {
                overflow: auto;
            }

            .wrapper {
                flex-direction: column;
                height: auto;
                overflow: visible;
            }

            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                border-right: none;
                border-bottom: 1px solid #2e2e2e;
            }

            .menu {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
            }

            .sidebar-footer {
                margin-top: 18px;
            }

            .main {
                margin-left: 0;
                height: auto;
            }

            .content {
                overflow: visible;
            }
        }

        @media (max-width: 576px) {
            .topbar {
                padding: 16px 20px;
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }

            .content {
                padding: 20px;
            }
        }
    </style>
</head>
<body>

<div class="wrapper">

    <div class="sidebar">
        <div>
            <div class="logo">ADMIN PANEL</div>

            <div class="menu">
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    Dashboard
                </a>

                <a href="{{ route('admin.profile.index') }}" class="{{ request()->routeIs('admin.profile.*') ? 'active' : '' }}">
                    Home & About
                </a>

                <a href="{{ route('admin.skills.index') }}" class="{{ request()->routeIs('admin.skills.*') ? 'active' : '' }}">
                    Skills
                </a>

                <a href="{{ route('admin.education.index') }}" class="{{ request()->routeIs('admin.education.*') ? 'active' : '' }}">
                    Education
                </a>

                <a href="{{ route('admin.experience.index') }}" class="{{ request()->routeIs('admin.experience.*') ? 'active' : '' }}">
                    Experience
                </a>

                <a href="{{ route('admin.organization.index') }}" class="{{ request()->routeIs('admin.organization.*') ? 'active' : '' }}">
                    Organization
                </a>

                <a href="{{ route('admin.projects.index') }}" class="{{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                    Projects
                </a>
            </div>
        </div>

        <div class="sidebar-footer">
            <a href="{{ route('home') }}" target="_blank" class="preview-btn">
                Preview Landing Page
            </a>
        </div>
    </div>

    <div class="main">
        <div class="topbar">
            <h3>Dashboard Admin</h3>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>

        <div class="content">
            @yield('content')
        </div>
    </div>

</div>

</body>
</html>