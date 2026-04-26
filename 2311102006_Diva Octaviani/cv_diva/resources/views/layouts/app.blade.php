<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CV - Diva')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen">
    <nav class="fixed top-0 left-0 right-0 z-50 bg-navy-900/90 backdrop-blur-md border-b border-gold/20">
        <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="#hero" class="text-2xl font-display font-bold gold-gradient">Diva</a>
            <ul class="hidden md:flex gap-8 text-sm">
                <li><a href="#about" class="hover:text-gold transition">About</a></li>
                <li><a href="#education" class="hover:text-gold transition">Education</a></li>
                <li><a href="#skills" class="hover:text-gold transition">Skills</a></li>
                <li><a href="#portfolio" class="hover:text-gold transition">Portfolio</a></li>
                <li><a href="#contact" class="hover:text-gold transition">Contact</a></li>
                @auth
                    <li><a href="{{ url('/admin/dashboard') }}" class="hover:text-gold transition">Dashboard</a></li>
                @else
                    <li><a href="{{ route('login') }}" class="text-gold">Login</a></li>
                @endauth
            </ul>
        </div>
    </nav>

    <main class="pt-20">
        @yield('content')
    </main>

    <footer class="bg-navy-800 border-t border-gold/20 py-6 text-center text-sm text-gray-400">
        &copy; {{ date('Y') }} Diva &mdash; Built with Laravel
    </footer>

    @stack('scripts')
</body>
</html>