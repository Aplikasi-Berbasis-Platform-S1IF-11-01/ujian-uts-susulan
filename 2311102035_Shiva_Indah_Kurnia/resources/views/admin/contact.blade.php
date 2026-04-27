<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Kontak | Shiva Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-stone-50 p-10 font-sans">
    <div class="max-w-4xl mx-auto bg-white p-10 rounded-3xl shadow-xl border-t-8 border-[#4c0519]">
        <div class="flex justify-between items-center mb-10">
            <div class="flex justify-between items-center mb-10">
    <h1 class="text-3xl font-bold text-stone-800">📧 Kelola Kontak</h1>
    <a href="/admin/shiva" class="px-5 py-2 bg-stone-100 rounded-xl text-sm font-semibold hover:bg-stone-200 transition text-stone-600 border border-stone-200 shadow-sm">&larr; Kembali ke Dashboard</a>
</div>
            <a href="/admin/shiva" class="px-5 py-2 bg-stone-100 rounded-xl text-sm font-semibold hover:bg-stone-200 transition">&larr; Kembali</a>
        </div>

        @if(session('success'))
            <div class="mb-6 bg-green-100 text-green-700 p-4 rounded-xl border border-green-200">
                {{ session('success') }}
            </div>
        @endif

        <form action="/admin/update-contact" method="POST" class="space-y-6">
            @csrf
            <div class="bg-stone-50 p-8 rounded-2xl border border-stone-200">
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label class="block text-sm font-semibold mb-2 text-stone-600">Alamat Email</label>
                        <input type="email" name="email" value="{{ $profile->email ?? '' }}" placeholder="shiva@example.com" class="w-full p-4 border rounded-xl outline-none focus:ring-2 focus:ring-[#4c0519]">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-2 text-stone-600">Username Instagram</label>
                        <input type="text" name="instagram" value="{{ $profile->instagram ?? '' }}" placeholder="@username" class="w-full p-4 border rounded-xl outline-none focus:ring-2 focus:ring-[#4c0519]">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-2 text-stone-600">URL LinkedIn</label>
                        <input type="text" name="linkedin" value="{{ $profile->linkedin ?? '' }}" placeholder="https://linkedin.com/in/shiva" class="w-full p-4 border rounded-xl outline-none focus:ring-2 focus:ring-[#4c0519]">
                    </div>
                </div>
            </div>

            <button type="submit" class="w-full bg-[#4c0519] text-white py-4 rounded-xl font-bold hover:bg-red-900 transition shadow-lg">
                Update Informasi Kontak
            </button>
        </form>
    </div>
</body>
</html>