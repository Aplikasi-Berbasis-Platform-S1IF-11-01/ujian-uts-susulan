<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Pendidikan | Shiva Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-stone-50 p-10">
    <div class="max-w-4xl mx-auto bg-white p-10 rounded-3xl shadow-xl border-t-8 border-[#4c0519]">
        <div class="flex justify-between items-center mb-8">
    <h1 class="text-3xl font-bold text-stone-800">🎓 Kelola Pendidikan</h1>
    <a href="/admin/shiva" class="px-5 py-2 bg-stone-100 rounded-xl text-sm font-semibold hover:bg-stone-200 transition text-stone-600 border border-stone-200 shadow-sm">&larr; Kembali ke Dashboard</a>
</div>
        <form action="/admin/education" method="POST" class="mb-10 bg-stone-50 p-6 rounded-2xl border">
            @csrf
            <div class="grid grid-cols-2 gap-4">
                <input type="text" name="instansi" placeholder="Nama Sekolah/Univ" required class="p-4 border rounded-xl">
                <input type="text" name="tahun" placeholder="Tahun (Contoh: 2021-2025)" required class="p-4 border rounded-xl">
            </div>
            <button type="submit" class="mt-4 bg-[#4c0519] text-white px-8 py-3 rounded-xl font-bold">Tambah Pendidikan</button>
        </form>
        <div class="space-y-4">
            @foreach($educations as $edu)
            <div class="p-5 border rounded-2xl flex justify-between items-center">
                <div><p class="font-bold">{{ $edu->instansi }}</p><p class="text-sm text-gray-500">{{ $edu->tahun }}</p></div>
                <form action="/admin/education/{{ $edu->id }}" method="POST">@csrf @method('DELETE')<button class="text-red-500">Hapus</button></form>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>