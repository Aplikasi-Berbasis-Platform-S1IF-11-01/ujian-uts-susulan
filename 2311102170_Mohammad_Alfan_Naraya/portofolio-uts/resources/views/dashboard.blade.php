<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard Admin') }}
            </h2>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-1 rounded-md text-sm">Logout</button>
            </form>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <h3 class="text-lg font-bold text-gray-700 mb-6">Edit Profile</h3>
                <form action="{{ route('profile.update-data') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm text-gray-600">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" value="{{ $profile->nama_lengkap ?? '' }}" class="w-full border-gray-200 rounded-lg shadow-sm">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600">NIM</label>
                            <input type="text" name="nim" value="{{ $profile->nim ?? '' }}" class="w-full border-gray-200 rounded-lg shadow-sm">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600">Program Studi</label>
                            <input type="text" name="program_studi" value="{{ $profile->program_studi ?? '' }}" class="w-full border-gray-200 rounded-lg shadow-sm">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600">Title</label>
                            <input type="text" name="title" value="{{ $profile->title ?? '' }}" class="w-full border-gray-200 rounded-lg shadow-sm">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm text-gray-600">Short Bio</label>
                            <textarea name="short_bio" rows="3" class="w-full border-gray-200 rounded-lg shadow-sm">{{ $profile->short_bio ?? '' }}</textarea>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm text-gray-600">About Me</label>
                            <textarea name="about_me" rows="4" class="w-full border-gray-200 rounded-lg shadow-sm">{{ $profile->about_me ?? '' }}</textarea>
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600">Email</label>
                            <input type="email" name="email" value="{{ $profile->email ?? '' }}" class="w-full border-gray-200 rounded-lg shadow-sm">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600">Instagram</label>
                            <input type="text" name="instagram" value="{{ $profile->instagram ?? '' }}" class="w-full border-gray-200 rounded-lg shadow-sm">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600">GitHub</label>
                            <input type="text" name="github" value="{{ $profile->github ?? '' }}" class="w-full border-gray-200 rounded-lg shadow-sm">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600">Foto Profil</label>
                            <input type="file" name="foto" class="w-full text-sm mt-1">
                        </div>
                    </div>
                    <div class="mt-6">
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition shadow">Simpan Profile</button>
                    </div>
                </form>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <h3 class="text-lg font-bold text-gray-700 mb-6">Kelola Skills</h3>
                <form action="{{ route('skill.add') }}" method="POST" class="flex gap-4 mb-8">
                    @csrf
                    <input type="text" name="nama_skill" placeholder="Nama skill" required class="flex-1 border-gray-200 rounded-lg shadow-sm">
                    <input type="number" name="urutan" placeholder="Urutan" class="w-24 border-gray-200 rounded-lg shadow-sm">
                    <input type="number" name="persentase" placeholder="%" class="w-20 border-gray-200 rounded-lg shadow-sm">
                    <button type="submit" class="bg-green-600 text-white px-8 py-2 rounded-lg hover:bg-green-700 transition shadow">Tambah</button>
                </form>

                <div class="space-y-4">
                    @foreach($skills as $skill)
                    <form action="{{ route('skill.update', $skill->id) }}" method="POST" class="flex items-center gap-4 p-4 border border-gray-100 rounded-lg bg-gray-50 shadow-sm">
                        @csrf
                        <div class="flex-1">
                            <input type="text" name="nama_skill" value="{{ $skill->nama_skill }}" class="w-full border-gray-200 rounded-lg">
                        </div>
                        <div class="w-24">
                            <input type="number" name="urutan" value="{{ $skill->urutan }}" class="w-full border-gray-200 rounded-lg text-center">
                        </div>
                        <div class="w-20">
                            <input type="number" name="persentase" value="{{ $skill->persentase }}" class="w-full border-gray-200 rounded-lg text-center">
                        </div>
                        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition">Update</button>
                        <a href="{{ route('skill.delete', $skill->id) }}" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition shadow-sm" onclick="return confirm('Hapus skill ini?')">Hapus</a>
                    </form>
                    @endforeach
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <h3 class="text-lg font-bold text-gray-700 mb-6">Kelola Projects</h3>
                <form action="{{ route('project.add') }}" method="POST" enctype="multipart/form-data" class="space-y-4 mb-10 border-b pb-10">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <input type="text" name="judul_project" placeholder="Judul project" required class="border-gray-200 rounded-lg">
                        <input type="text" name="link_project" placeholder="Link project" class="border-gray-200 rounded-lg">
                        <input type="number" name="urutan" placeholder="Urutan" class="border-gray-200 rounded-lg shadow-sm">
                    </div>
                    <textarea name="deskripsi_project" placeholder="Deskripsi project" rows="2" class="w-full border-gray-200 rounded-lg"></textarea>
                    <div class="flex items-center gap-4">
                        <input type="file" name="gambar_project" class="text-sm">
                        <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition">Tambah Project</button>
                    </div>
                </form>

                <div class="space-y-8">
                    @foreach($projects as $project)
                    <form action="{{ route('project.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="p-6 border-2 border-gray-50 rounded-xl space-y-4 shadow-sm bg-white">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <input type="text" name="judul_project" value="{{ $project->judul_project }}" class="border-gray-200 rounded-lg">
                            <input type="text" name="link_project" value="{{ $project->link_project }}" class="border-gray-200 rounded-lg">
                            <input type="number" name="urutan" value="{{ $project->urutan }}" class="border-gray-200 rounded-lg shadow-sm">
                        </div>
                        <textarea name="deskripsi_project" rows="3" class="w-full border-gray-200 rounded-lg">{{ $project->deskripsi_project }}</textarea>
                        
                        <div class="flex items-center gap-6">
                            <div class="flex-1">
                                <input type="file" name="gambar_project" class="text-sm">
                            </div>
                            @if($project->gambar_project)
                                <img src="{{ asset('storage/' . $project->gambar_project) }}" class="w-24 h-16 object-cover rounded shadow-md">
                            @endif
                            <div class="flex gap-2">
                                <button type="submit" class="bg-yellow-500 text-white px-6 py-2 rounded-lg hover:bg-yellow-600 shadow">Update</button>
                                <a href="{{ route('project.delete', $project->id) }}" class="bg-red-500 text-white px-6 py-2 rounded-lg hover:bg-red-600 shadow" onclick="return confirm('Hapus project ini?')">Hapus</a>
                            </div>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</x-app-layout>