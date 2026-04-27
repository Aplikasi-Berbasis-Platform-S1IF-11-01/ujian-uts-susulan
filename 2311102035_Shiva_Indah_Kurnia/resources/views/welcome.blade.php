<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio | {{ $profile->nama ?? 'Shiva' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #FDFBF7; scroll-behavior: smooth; }
        .font-serif { font-family: 'Playfair Display', serif; }
        .bg-maroon { background-color: #4c0519; }
        .text-maroon { color: #4c0519; }
    </style>
</head>
<body class="text-stone-800">

    <nav class="p-6 flex justify-between items-center max-w-7xl mx-auto sticky top-0 bg-[#FDFBF7]/80 backdrop-blur-md z-50">
        <div class="text-2xl font-serif font-bold text-maroon">S. Portfolio</div>
        <div class="hidden md:flex space-x-8 text-sm font-medium items-center">
            <a href="#home" class="hover:text-maroon transition">Home</a>
            <a href="#about" class="hover:text-maroon transition">About</a>
            <a href="#skills" class="hover:text-maroon transition">Skills</a>
            <a href="#projects" class="hover:text-maroon transition">Works</a>
            <a href="/admin/shiva" class="bg-maroon text-white px-5 py-2 rounded-full hover:bg-red-900 transition">Admin Mode</a>
        </div>
    </nav>

    <header id="home" class="min-h-[90vh] flex flex-col md:flex-row items-center justify-center px-6 max-w-7xl mx-auto gap-12 py-20">
        <div class="flex-1 space-y-6 text-center md:text-left">
            <h2 class="text-maroon font-semibold tracking-widest text-sm uppercase">{{ $profile->nim ?? '2311102035' }}</h2>
            <h1 class="text-6xl md:text-8xl font-serif font-bold text-stone-900 leading-tight">
                {{ $profile->nama ?? 'Shiva Indah Kurnia' }}
            </h1>
            <p class="text-xl text-stone-500 font-light italic">{{ $profile->title ?? 'Full-Stack Developer' }}</p>
            <p class="text-lg text-stone-600 max-w-xl leading-relaxed">
                {{ $profile->deskripsi ?? 'Selamat datang di portofolio saya.' }}
            </p>
            <div class="pt-4">
                <a href="#projects" class="inline-block bg-stone-900 text-white px-10 py-4 rounded-xl hover:bg-maroon transition shadow-xl">View My Work</a>
            </div>
        </div>

        <div class="flex-1 flex justify-center">
            <div class="relative w-80 h-80 md:w-[450px] md:h-[450px]">
                <div class="absolute inset-0 bg-maroon rounded-3xl rotate-3 opacity-10"></div>
                <img src="{{ $profile && $profile->foto ? asset('storage/' . $profile->foto) : 'https://via.placeholder.com/450' }}" 
                     class="relative w-full h-full object-cover rounded-3xl shadow-2xl z-10 grayscale hover:grayscale-0 transition duration-500 border-8 border-white">
            </div>
        </div>
    </header>

    <section id="skills" class="py-24 bg-stone-100">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-4xl font-serif font-bold mb-12 text-maroon">Expertise</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                @foreach($skills as $skill)
                <div class="bg-white p-8 rounded-2xl shadow-sm border-b-4 border-maroon">
                    <p class="font-bold text-stone-800 text-lg">{{ $skill->nama_skill }}</p>
                    <p class="text-maroon font-semibold">{{ $skill->persentase }}%</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="about" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-16">
            <div>
                <h2 class="text-3xl font-serif font-bold mb-8 text-maroon italic">Education</h2>
                @foreach($educations as $edu)
                <div class="mb-6 border-l-4 border-stone-200 pl-6">
                    <h3 class="font-bold text-xl">{{ $edu->instansi }}</h3>
                    <p class="text-stone-500">{{ $edu->tahun }}</p>
                </div>
                @endforeach
            </div>
            <div>
                <h2 class="text-3xl font-serif font-bold mb-8 text-maroon italic">Experience</h2>
                @foreach($experiences as $exp)
                <div class="mb-6 border-l-4 border-maroon pl-6">
                    <h3 class="font-bold text-xl">{{ $exp->posisi }}</h3>
                    <p class="text-maroon font-medium">{{ $exp->perusahaan }}</p>
                    <p class="text-stone-600 mt-2 text-sm">{{ $exp->deskripsi }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="projects" class="py-24 bg-stone-900 text-white">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-4xl font-serif font-bold mb-16">Featured Works</h2>
            <div class="grid md:grid-cols-3 gap-10">
                @foreach($portfolios as $p)
                <div class="group relative overflow-hidden rounded-3xl bg-stone-800 border border-stone-700">
                    <img src="{{ asset('storage/' . $p->gambar) }}" class="w-full h-64 object-cover group-hover:scale-110 transition duration-500 opacity-80 group-hover:opacity-100">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">{{ $p->judul }}</h3>
                        @if($p->link)
                        <a href="{{ $p->link }}" target="_blank" class="text-maroon text-sm font-bold hover:underline">View Project &rarr;</a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <footer class="py-20 text-center bg-white border-t border-stone-100">
        <h2 class="text-3xl font-serif font-bold mb-6 text-maroon underline underline-offset-8">Get In Touch</h2>
        <div class="flex justify-center space-x-6 mb-8 text-stone-600 font-medium">
            <p>{{ $profile->email ?? 'shiva@example.com' }}</p>
            <span>|</span>
            <a href="https://instagram.com/{{ $profile->instagram ?? '' }}" class="hover:text-maroon transition">Instagram</a>
            <span>|</span>
            <a href="{{ $profile->linkedin ?? '#' }}" class="hover:text-maroon transition">LinkedIn</a>
        </div>
        <p class="text-stone-400 text-xs tracking-widest uppercase">© 2026 Shiva Portfolio — Crafted with Love</p>
    </footer>

</body>
</html>