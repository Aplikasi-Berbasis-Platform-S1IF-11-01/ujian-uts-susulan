<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin · CV Diva</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-900 text-slate-100 min-h-screen flex">
    <aside class="w-64 bg-slate-950 border-r border-amber-500/20 p-6 flex flex-col">
        <h1 class="text-2xl font-bold text-amber-400 mb-1">CV Diva</h1>
        <p class="text-xs text-slate-500 mb-8">Admin Panel</p>
        <nav class="space-y-2 flex-1">
            @php $menu = [
                ['admin.dashboard', 'Dashboard'],
                ['admin.profile.edit', 'Profile'],
                ['admin.education.index', 'Education'],
                ['admin.experience.index', 'Experience'],
                ['admin.organization.index', 'Organization'],
                ['admin.skill.index', 'Skills'],
                ['admin.portfolio.index', 'Portfolio'],
            ]; @endphp
            @foreach($menu as [$route, $label])
                <a href="{{ route($route) }}" class="block px-4 py-2 rounded-lg {{ request()->routeIs(str_replace('.index','.*',$route)) || request()->routeIs($route) ? 'bg-amber-500 text-slate-900 font-semibold' : 'text-slate-300 hover:bg-slate-800' }}">{{ $label }}</a>
            @endforeach
        </nav>
        <a href="{{ url('/') }}" class="block px-4 py-2 text-slate-400 hover:text-amber-400 text-sm">← Lihat Website</a>
        <form method="POST" action="{{ route('logout') }}" class="mt-2">
            @csrf
            <button class="w-full px-4 py-2 bg-red-600/20 text-red-400 rounded-lg hover:bg-red-600/30">Logout</button>
        </form>
    </aside>
    <main class="flex-1 p-8 overflow-auto">
        @yield('content')
    </main>
</body>
</html>