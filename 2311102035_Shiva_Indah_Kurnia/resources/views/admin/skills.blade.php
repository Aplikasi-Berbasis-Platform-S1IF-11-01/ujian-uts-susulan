<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Keahlian | Shiva Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>body { font-family: 'Poppins', sans-serif; }</style>
</head>
<body class="bg-stone-50 p-10">
    <div class="max-w-4xl mx-auto bg-white p-10 rounded-3xl shadow-xl border-t-8 border-[#4c0519]">
        
        <div class="flex justify-between items-center mb-10">
            <h1 class="text-3xl font-bold text-stone-800">⚡ Kelola Keahlian (Skills)</h1>
            <a href="/admin/shiva" class="px-5 py-2 bg-stone-100 rounded-xl text-sm font-semibold hover:bg-stone-200 transition">&larr; Kembali ke Dashboard</a>
        </div>

        @if(session('success'))
            <div class="mb-6 bg-green-100 text-green-700 p-4 rounded-xl border border-green-200 font-medium">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-stone-50 p-8 rounded-2xl mb-10 border border-stone-200">
            <h2 class="font-bold text-lg mb-4 text-[#4c0519]">Tambah Keahlian Baru</h2>
            
            <form action="/admin/skills" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-stone-600 mb-2">Nama Skill</label>
                        <input type="text" name="nama_skill" placeholder="Contoh: Laravel, UI/UX" required class="w-full p-4 border rounded-xl outline-none focus:ring-2 focus:ring-[#4c0519]">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-stone-600 mb-2">Persentase Penguasaan (1-100)</label>
                        <input type="number" name="persentase" placeholder="Contoh: 85" min="1" max="100" required class="w-full p-4 border rounded-xl outline-none focus:ring-2 focus:ring-[#4c0519]">
                    </div>
                </div>
                <button type="submit" class="mt-6 bg-[#4c0519] text-white px-8 py-3 rounded-xl font-bold shadow-lg hover:bg-red-900 transition">Simpan Skill</button>
            </form>
        </div>

        <div>
            <h2 class="font-bold text-lg mb-4 text-stone-800">Daftar Keahlian Saya</h2>
            <div class="space-y-4">
                
                @forelse($skills as $skill)
                    <div class="flex justify-between items-center p-5 border border-stone-200 rounded-2xl hover:shadow-md transition bg-white">
                        <div>
                            <p class="font-bold text-stone-800 text-lg">{{ $skill->nama_skill }}</p>
                            <div class="w-48 bg-stone-200 rounded-full h-2.5 mt-2">
                                <div class="bg-[#4c0519] h-2.5 rounded-full" style="width: {{ $skill->persentase }}%"></div>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <span class="font-bold text-[#4c0519]">{{ $skill->persentase }}%</span>
                            
                            <form action="/admin/skills/{{ $skill->id }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus skill ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-100 text-red-600 px-4 py-2 rounded-lg text-sm font-bold hover:bg-red-200">Hapus</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-stone-500 italic text-center py-6 bg-stone-50 rounded-xl">Belum ada data keahlian yang ditambahkan.</p>
                @endforelse

            </div>
        </div>

    </div>
</body>
</html>