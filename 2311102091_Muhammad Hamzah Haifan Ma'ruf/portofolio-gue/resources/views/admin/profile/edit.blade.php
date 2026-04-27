@extends('admin.layouts.app')

@section('content')
    <div class="max-w-6xl">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-8">
            <div>
                <p class="text-xs uppercase tracking-[0.35em] text-zinc-500 mb-2">Admin Section</p>
                <h2 class="text-3xl lg:text-4xl font-black text-white leading-tight">
                    Edit Home & About
                </h2>
                <p class="text-sm text-zinc-400 mt-2">
                    Kelola data untuk tampilan Home dan About pada landing page portofolio.
                </p>
            </div>

            <a href="{{ route('admin.profile.index') }}"
               class="inline-flex items-center justify-center rounded-2xl border border-white/10 bg-[linear-gradient(145deg,rgba(255,255,255,0.09),rgba(255,255,255,0.03))] px-5 py-3 text-sm font-semibold text-white hover:bg-white/15 hover:border-white/20 transition shadow-[0_10px_30px_rgba(0,0,0,0.25)]">
                Kembali
            </a>
        </div>

        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid lg:grid-cols-12 gap-6">
                {{-- LEFT: PHOTO PREVIEW --}}
                <div class="lg:col-span-4">
                    <div class="rounded-3xl border border-white/10 bg-[linear-gradient(145deg,rgba(255,255,255,0.08),rgba(255,255,255,0.02))] p-6 shadow-[0_10px_40px_rgba(0,0,0,0.35)]">
                        <p class="text-xs uppercase tracking-[0.3em] text-zinc-500 mb-5">Photo Preview</p>

                        <div class="flex flex-col items-center text-center">
                            @if (!empty($profile?->photo))
                                <div class="relative">
                                    <div class="absolute inset-0 rounded-full bg-white/10 blur-2xl scale-110"></div>
                                    <img src="{{ asset('storage/' . $profile->photo) }}"
                                         alt="Foto Profile"
                                         class="relative w-44 h-44 rounded-full object-cover border border-white/10 shadow-[0_10px_35px_rgba(0,0,0,0.55)]">
                                </div>
                            @else
                                <div class="w-44 h-44 rounded-full border border-dashed border-white/10 bg-black/20 flex items-center justify-center text-zinc-500 text-sm">
                                    Belum ada foto
                                </div>
                            @endif

                            <div class="mt-5 inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-3 py-1 text-[11px] uppercase tracking-[0.3em] text-zinc-300">
                                <span class="w-2 h-2 rounded-full bg-zinc-300"></span>
                                Current Profile
                            </div>

                            <p class="mt-4 text-zinc-400 text-sm leading-6">
                                Foto ini digunakan pada section Home di landing page.
                            </p>
                        </div>

                        <div class="mt-6">
                            <label class="block text-sm text-zinc-300 mb-2">Foto Profile</label>
                            <input type="file" name="photo"
                                   class="block w-full rounded-2xl border border-white/10 bg-black/30 px-4 py-3 text-sm text-white file:mr-4 file:rounded-xl file:border-0 file:bg-white/10 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-white hover:file:bg-white/20">
                            <p class="text-xs text-zinc-500 mt-2">
                                Format: jpg, jpeg, png, webp. Maksimal 2MB.
                            </p>
                            @error('photo')
                                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- RIGHT: FORM --}}
                <div class="lg:col-span-8 space-y-6">
                    {{-- HOME CONTENT --}}
                    <div class="rounded-3xl border border-white/10 bg-[linear-gradient(145deg,rgba(255,255,255,0.08),rgba(255,255,255,0.02))] p-6 lg:p-7 shadow-[0_10px_40px_rgba(0,0,0,0.35)]">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-10 h-10 rounded-2xl border border-white/10 bg-gradient-to-br from-zinc-300/30 to-zinc-700/30"></div>
                            <div>
                                <p class="text-xs uppercase tracking-[0.25em] text-zinc-500">Home Content</p>
                                <h3 class="text-xl font-bold text-white">Data Slide Home</h3>
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm text-zinc-300 mb-2">Nama</label>
                                <input type="text" name="name" value="{{ old('name', $profile->name ?? '') }}"
                                       class="w-full rounded-2xl border border-white/10 bg-black/30 px-4 py-3 text-white placeholder:text-zinc-500 focus:outline-none focus:border-white/30">
                                @error('name')
                                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm text-zinc-300 mb-2">Title</label>
                                <input type="text" name="title" value="{{ old('title', $profile->title ?? '') }}"
                                       class="w-full rounded-2xl border border-white/10 bg-black/30 px-4 py-3 text-white placeholder:text-zinc-500 focus:outline-none focus:border-white/30">
                                @error('title')
                                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-4">
                            <p class="text-xs text-zinc-500 leading-6">
                                Data pada bagian ini akan ditampilkan di slide <span class="text-zinc-300">Home</span>:
                                foto, nama, dan title.
                            </p>
                        </div>
                    </div>

                    {{-- ABOUT CONTENT --}}
                    <div class="rounded-3xl border border-white/10 bg-[linear-gradient(145deg,rgba(255,255,255,0.08),rgba(255,255,255,0.02))] p-6 lg:p-7 shadow-[0_10px_40px_rgba(0,0,0,0.35)]">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-10 h-10 rounded-2xl border border-white/10 bg-gradient-to-br from-zinc-300/20 to-zinc-800/40"></div>
                            <div>
                                <p class="text-xs uppercase tracking-[0.25em] text-zinc-500">About Content</p>
                                <h3 class="text-xl font-bold text-white">Data Slide About</h3>
                            </div>
                        </div>

                        <div class="mt-5">
                            <label class="block text-sm text-zinc-300 mb-2">About</label>
                            <textarea name="about" rows="6"
                                      class="w-full rounded-2xl border border-white/10 bg-black/30 px-4 py-3 text-white placeholder:text-zinc-500 focus:outline-none focus:border-white/30">{{ old('about', $profile->about ?? '') }}</textarea>
                            @error('about')
                                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid md:grid-cols-2 gap-5 mt-5">
                            <div>
                                <label class="block text-sm text-zinc-300 mb-2">Phone</label>
                                <input type="text" name="phone" value="{{ old('phone', $profile->phone ?? '') }}"
                                       class="w-full rounded-2xl border border-white/10 bg-black/30 px-4 py-3 text-white placeholder:text-zinc-500 focus:outline-none focus:border-white/30">
                                @error('phone')
                                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm text-zinc-300 mb-2">Email</label>
                                <input type="email" name="email" value="{{ old('email', $profile->email ?? '') }}"
                                       class="w-full rounded-2xl border border-white/10 bg-black/30 px-4 py-3 text-white placeholder:text-zinc-500 focus:outline-none focus:border-white/30">
                                @error('email')
                                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm text-zinc-300 mb-2">Instagram</label>
                                <input type="text" name="instagram" value="{{ old('instagram', $profile->instagram ?? '') }}"
                                       class="w-full rounded-2xl border border-white/10 bg-black/30 px-4 py-3 text-white placeholder:text-zinc-500 focus:outline-none focus:border-white/30">
                                @error('instagram')
                                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm text-zinc-300 mb-2">Address</label>
                                <input type="text" name="address" value="{{ old('address', $profile->address ?? '') }}"
                                       class="w-full rounded-2xl border border-white/10 bg-black/30 px-4 py-3 text-white placeholder:text-zinc-500 focus:outline-none focus:border-white/30">
                                @error('address')
                                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-4">
                            <p class="text-xs text-zinc-500 leading-6">
                                Data pada bagian ini akan ditampilkan di slide <span class="text-zinc-300">About</span>.
                                Nama dan title tidak perlu ditampilkan lagi di About karena sudah ada di Home.
                            </p>
                        </div>
                    </div>

                    {{-- ACTION --}}
                    <div class="pt-2 flex flex-col sm:flex-row gap-3">
                        <button type="submit"
                                class="inline-flex items-center justify-center rounded-2xl border border-white/10 bg-[linear-gradient(145deg,rgba(255,255,255,0.12),rgba(255,255,255,0.04))] px-6 py-3 text-sm font-semibold text-white hover:bg-white/15 hover:border-white/20 transition shadow-[0_10px_30px_rgba(0,0,0,0.25)]">
                            Simpan Perubahan
                        </button>

                        <a href="{{ route('admin.profile.index') }}"
                           class="inline-flex items-center justify-center rounded-2xl border border-white/10 bg-black/30 px-6 py-3 text-sm font-semibold text-zinc-200 hover:bg-white/10 transition">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection