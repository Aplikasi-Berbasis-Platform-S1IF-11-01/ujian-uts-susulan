<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Pengalaman | Shiva Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-stone-50 p-10 font-sans">
    <div class="max-w-4xl mx-auto bg-white p-10 rounded-3xl shadow-xl border-t-8 border-[#4c0519]">
        <div class="flex justify-between items-center mb-10">
            <h1 class="text-3xl font-bold text-stone-800">⏳ Kelola Pengalaman</h1>
            <a href="/admin/shiva" class="px-5 py-2 bg-stone-100 rounded-xl text-sm font-semibold hover:bg-stone-200 transition">&larr; Kembali</a>
        </div>

        <form action="/admin/experience" method="POST" class="bg-stone-50 p-8 rounded-2xl mb-10 border border-stone-200">
            @csrf
            <div class="grid grid-cols-2 gap-6 mb-6">
                <input type="text" name="posisi" placeholder="Posisi (Contoh: Web Designer)" required class="p-4 border rounded-xl outline-none focus:ring-2 focus:ring-[#4c0519]">
                <input type="text" name="perusahaan" placeholder="Nama Perusahaan" required class="p-4 border rounded-xl outline-none focus:ring-2 focus:ring-[#4c0519]">
            </div>
            <textarea name="deskripsi" placeholder="Deskripsi singkat..." class="w-full p-4 border rounded-xl outline-none focus:ring-2 focus:ring-[#4c0519] h-32"></textarea>
            <button type="submit" class="mt-6 bg-[#4c0519] text-white px-8 py-3 rounded-xl font-bold w-full">Simpan Pengalaman</button>
        </form>

        <div class="space-y-4">
            @if(isset($experiences) && $experiences->count() > 0)
                @foreach($experiences as $exp)
                <div class="flex justify-between items-start p-6 border border-stone-200 rounded-2xl bg-white">
                    <div>
                        <h3 class="font-bold text-lg text-stone-800">{{ $exp->posisi }}</h3>
                        <p class="text-red-900 font-medium">{{ $exp->perusahaan }}</p>
                    </div>
                    <form action="/admin/experience/{{ $exp->id }}" method="POST">
                        @csrf @method('DELETE')
                        <button class="bg-red-50 text-red-600 px-4 py-2 rounded-lg text-xs font-bold">Hapus</button>
                    </form>
                </div>
                @endforeach
            @else
                <p class="text-center text-gray-500 italic">Belum ada data pengalaman.</p>
            @endif
        </div>
    </div>
</body>
</html>