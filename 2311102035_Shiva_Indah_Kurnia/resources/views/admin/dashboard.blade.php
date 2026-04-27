<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shiva Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>body { font-family: 'Poppins', sans-serif; }</style>
</head>
<body class="bg-stone-100 flex min-h-screen">

    <div class="w-72 bg-stone-900 text-white p-8 flex flex-col border-r-4 border-red-900 fixed h-full">
        <h2 class="text-3xl font-bold text-red-700 mb-2">SHIVA</h2>
        <p class="text-xs text-stone-500 tracking-widest uppercase mb-12">Luxury Admin Panel</p>
        
        <nav class="space-y-6 flex-1">
            <a href="/admin/shiva" class="flex items-center gap-4 p-3 bg-red-950/50 rounded-xl border-l-4 border-red-600">
                <span>🏠</span> Dashboard
            </a>
            <a href="/" target="_blank" class="flex items-center gap-4 p-3 text-stone-400 hover:text-white transition">
                <span>🌐</span> Lihat Web Utama
            </a>
        </nav>

        <div class="pt-10 border-t border-stone-800">
            <a href="/" class="block w-full py-3 bg-stone-800 text-center rounded-lg text-sm hover:bg-red-900 transition">Keluar</a>
        </div>
    </div>

    <div class="flex-1 ml-72 p-12">
        <header class="mb-12">
            <h1 class="text-4xl font-bold text-stone-800">Halo, Shiva!</h1>
            <p class="text-stone-500 mt-2">Pilih bagian yang ingin kamu perbarui hari ini.</p>
            
            @if(session('success'))
                <div class="mt-4 bg-green-100 text-green-700 p-4 rounded-xl border border-green-200">
                    {{ session('success') }}
                </div>
            @endif
        </header>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <div class="bg-white p-8 rounded-3xl shadow-sm border-b-4 border-red-900 hover:shadow-xl transition group">
                <div class="w-14 h-14 bg-red-100 rounded-2xl flex items-center justify-center text-2xl mb-6 group-hover:bg-red-900 group-hover:text-white transition">👤</div>
                <h3 class="text-xl font-bold text-stone-800">Profile</h3>
                <p class="text-stone-500 text-sm mt-2 mb-6">Ubah identitas diri, foto profil, dan NIM kamu.</p>
                <a href="/admin/profile" class="text-red-900 font-semibold hover:underline">Kelola Profile &rarr;</a>
            </div>

            <div class="bg-white p-8 rounded-3xl shadow-sm border-b-4 border-stone-800 hover:shadow-xl transition group">
                <div class="w-14 h-14 bg-stone-100 rounded-2xl flex items-center justify-center text-2xl mb-6 group-hover:bg-stone-900 group-hover:text-white transition">🎓</div>
                <h3 class="text-xl font-bold text-stone-800">Education</h3>
                <p class="text-stone-500 text-sm mt-2 mb-6">Atur riwayat pendidikan formal kamu.</p>
                <a href="/admin/education" class="text-stone-800 font-semibold hover:underline">Kelola Education &rarr;</a>
            </div>

            <div class="bg-white p-8 rounded-3xl shadow-sm border-b-4 border-red-900 hover:shadow-xl transition group">
                <div class="w-14 h-14 bg-red-100 rounded-2xl flex items-center justify-center text-2xl mb-6 group-hover:bg-red-900 group-hover:text-white transition">⚡</div>
                <h3 class="text-xl font-bold text-stone-800">Skills</h3>
                <p class="text-stone-500 text-sm mt-2 mb-6">Update daftar keahlian teknis (Laravel, UI/UX, dll).</p>
                <a href="/admin/skills" class="text-red-900 font-semibold hover:underline">Kelola Skills &rarr;</a>
            </div>

            <div class="bg-white p-8 rounded-3xl shadow-sm border-b-4 border-stone-800 hover:shadow-xl transition group">
                <div class="w-14 h-14 bg-stone-100 rounded-2xl flex items-center justify-center text-2xl mb-6 group-hover:bg-stone-900 group-hover:text-white transition">💼</div>
                <h3 class="text-xl font-bold text-stone-800">Portfolio</h3>
                <p class="text-stone-500 text-sm mt-2 mb-6">Upload proyek terbaik kamu beserta deskripsinya.</p>
                <a href="/admin/portfolio-manage" class="text-stone-800 font-semibold hover:underline">Kelola Portfolio &rarr;</a>
            </div>

            <div class="bg-white p-8 rounded-3xl shadow-sm border-b-4 border-red-900 hover:shadow-xl transition group">
                <div class="w-14 h-14 bg-red-100 rounded-2xl flex items-center justify-center text-2xl mb-6 group-hover:bg-red-900 group-hover:text-white transition">⏳</div>
                <h3 class="text-xl font-bold text-stone-800">Experience</h3>
                <p class="text-stone-500 text-sm mt-2 mb-6">Tambahkan pengalaman kerja atau organisasi.</p>
                <a href="/admin/experience" class="text-red-900 font-semibold hover:underline">Kelola Experience &rarr;</a>
            </div>

            <div class="bg-white p-8 rounded-3xl shadow-sm border-b-4 border-stone-800 hover:shadow-xl transition group">
                <div class="w-14 h-14 bg-stone-100 rounded-2xl flex items-center justify-center text-2xl mb-6 group-hover:bg-stone-900 group-hover:text-white transition">📧</div>
                <h3 class="text-xl font-bold text-stone-800">Contact</h3>
                <p class="text-stone-500 text-sm mt-2 mb-6">Perbarui Email, Instagram, dan LinkedIn kamu.</p>
                <a href="/admin/contact" class="text-stone-800 font-semibold hover:underline">Kelola Contact &rarr;</a>
            </div>

        </div>
    </div>
</body>
</html>