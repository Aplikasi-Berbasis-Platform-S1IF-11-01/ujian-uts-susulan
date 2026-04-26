<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Profile | Shiva Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-stone-50 p-10">
    <div class="max-w-4xl mx-auto bg-white p-10 rounded-3xl shadow-xl border-t-8 border-[#4c0519]">
        
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-stone-800">👤 Kelola Profile & Kontak</h1>
            <a href="/admin/shiva" class="px-5 py-2 bg-stone-100 rounded-xl text-sm font-semibold hover:bg-stone-200 transition text-stone-600 border border-stone-200 shadow-sm">&larr; Kembali ke Dashboard</a>
        </div>

        @if(session('success'))
            <div class="mb-6 bg-green-100 text-green-700 p-4 rounded-xl border border-green-200">
                {{ session('success') }}
            </div>
        @endif

        <form action="/admin/update-profile" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold mb-2 text-stone-600">Nama Lengkap</label>
                    <input type="text" name="nama" placeholder="Nama Lengkap" value="{{ $profile->nama ?? '' }}" class="w-full p-4 border rounded-xl outline-none focus:ring-2 focus:ring-[#4c0519]">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-2 text-stone-600">Job Title</label>
                    <input type="text" name="title" placeholder="Job Title" value="{{ $profile->title ?? '' }}" class="w-full p-4 border rounded-xl outline-none focus:ring-2 focus:ring-[#4c0519]">
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold mb-2 text-stone-600">NIM</label>
                <input type="text" name="nim" placeholder="Contoh: 2311102035" value="{{ $profile->nim ?? '' }}" class="w-full p-4 border rounded-xl outline-none focus:ring-2 focus:ring-[#4c0519]">
            </div>

            <div>
                <label class="block text-sm font-semibold mb-2 text-stone-600">Tentang Saya</label>
                <textarea name="deskripsi" placeholder="Deskripsikan diri kamu..." class="w-full p-4 border rounded-xl h-32 outline-none focus:ring-2 focus:ring-[#4c0519]">{{ $profile->deskripsi ?? '' }}</textarea>
            </div>

            <div class="p-6 bg-stone-50 rounded-2xl border border-dashed border-stone-300">
                <label class="block text-sm font-semibold mb-2 text-stone-600">Update Foto Profil</label>
                <input type="file" name="foto" accept="image/*" class="w-full text-sm text-stone-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-stone-200 file:text-stone-700 hover:file:bg-stone-300">
                @if($profile && $profile->foto)
                    <div class="mt-4 flex items-center gap-3">
                        <img src="{{ asset('storage/' . $profile->foto) }}" class="w-12 h-12 rounded-full object-cover border-2 border-white shadow-sm">
                        <span class="text-xs text-stone-400 italic">Foto saat ini terpasang</span>
                    </div>
                @endif
            </div>

            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-semibold mb-2 text-stone-600 text-xs uppercase">Email</label>
                    <input type="email" name="email" placeholder="Email" value="{{ $profile->email ?? '' }}" class="w-full p-4 border rounded-xl text-sm">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-2 text-stone-600 text-xs uppercase">Instagram</label>
                    <input type="text" name="instagram" placeholder="@username" value="{{ $profile->instagram ?? '' }}" class="w-full p-4 border rounded-xl text-sm">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-2 text-stone-600 text-xs uppercase">LinkedIn URL</label>
                    <input type="text" name="linkedin" placeholder="https://..." value="{{ $profile->linkedin ?? '' }}" class="w-full p-4 border rounded-xl text-sm">
                </div>
            </div>

            <button type="submit" class="w-full bg-[#4c0519] text-white py-4 rounded-xl font-bold hover:bg-red-900 transition shadow-lg">Simpan Perubahan</button>
        </form>
    </div>
</body>
</html>