<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Portfolio | Shiva Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body class="bg-stone-50 p-10 font-sans">
    <div class="max-w-5xl mx-auto bg-white p-10 rounded-3xl shadow-xl border-t-8 border-[#4c0519]">
        <div class="flex justify-between items-center mb-10">
            <h1 class="text-3xl font-bold text-stone-800">🖼️ Project Portfolio</h1>
            <a href="/admin/shiva" class="px-5 py-2 bg-stone-100 rounded-xl text-sm font-semibold hover:bg-stone-200 transition">&larr; Kembali</a>
        </div>

        <form action="/admin/portfolio-manage" method="POST" enctype="multipart/form-data" class="bg-stone-50 p-8 rounded-2xl mb-10 border border-stone-200">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-sm font-semibold mb-2">Judul Project</label>
                    <input type="text" name="judul" placeholder="Contoh: Desain Landing Page" required class="w-full p-4 border rounded-xl outline-none focus:ring-2 focus:ring-[#4c0519]">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-2">Link Project (Opsional)</label>
                    <input type="text" name="link" placeholder="https://github.com/..." class="w-full p-4 border rounded-xl outline-none focus:ring-2 focus:ring-[#4c0519]">
                </div>
            </div>
            
            <div class="mb-6">
                <label class="block text-sm font-semibold mb-2">Upload Preview Gambar</label>
                <input type="file" name="gambar" accept="image/*" required class="w-full p-3 border border-dashed border-stone-400 rounded-xl bg-white text-stone-500">
            </div>

            <button type="submit" class="bg-[#4c0519] text-white px-8 py-4 rounded-xl font-bold hover:bg-red-900 transition shadow-lg w-full">Publish Project</button>
        </form>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($portfolios as $p)
            <div class="bg-white border border-stone-200 rounded-2xl overflow-hidden hover:shadow-md transition">
                @if($p->gambar)
                <img src="{{ asset('storage/' . $p->gambar) }}" alt="{{ $p->judul }}" class="w-full h-48 object-cover">
                @else
                <div class="w-full h-48 bg-stone-200 flex items-center justify-center text-stone-400 italic text-sm">No Image</div>
                @endif
                
                <div class="p-5 flex justify-between items-center">
                    <div>
                        <h3 class="font-bold text-stone-800">{{ $p->judul }}</h3>
                        <a href="{{ $p->link }}" target="_blank" class="text-xs text-red-800 hover:underline">Lihat Link &rarr;</a>
                    </div>
                    <form action="/admin/portfolio-manage/{{ $p->id }}" method="POST">
                        @csrf @method('DELETE')
                        <button class="bg-red-50 text-red-600 p-2 rounded-lg hover:bg-red-100 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>