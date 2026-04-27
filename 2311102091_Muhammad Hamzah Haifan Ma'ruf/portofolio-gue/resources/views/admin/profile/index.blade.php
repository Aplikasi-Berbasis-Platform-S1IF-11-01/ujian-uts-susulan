@extends('admin.layouts.app')

@section('content')
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-8">
        <div>
            <p class="text-xs uppercase tracking-[0.35em] text-zinc-500 mb-2">Admin Section</p>
            <h2 class="text-3xl lg:text-4xl font-black text-white leading-tight">
                Data Home & About
            </h2>
            <p class="text-sm text-zinc-400 mt-2">
                Kelola data utama yang digunakan pada slide Home dan About di halaman portofolio.
            </p>
        </div>

        <a href="{{ route('admin.profile.edit') }}"
           class="inline-flex items-center justify-center rounded-2xl border border-white/10 bg-[linear-gradient(145deg,rgba(255,255,255,0.09),rgba(255,255,255,0.03))] px-5 py-3 text-sm font-semibold text-white hover:bg-white/15 hover:border-white/20 transition shadow-[0_10px_30px_rgba(0,0,0,0.25)]">
            Edit Data
        </a>
    </div>

    <div class="grid lg:grid-cols-12 gap-6">
        {{-- LEFT: HOME PREVIEW --}}
        <div class="lg:col-span-4">
            <div class="rounded-3xl border border-white/10 bg-[linear-gradient(145deg,rgba(255,255,255,0.08),rgba(255,255,255,0.02))] p-6 shadow-[0_10px_40px_rgba(0,0,0,0.35)]">
                <div class="flex items-center gap-3 mb-5">
                                        <div>
                        <p class="text-xs uppercase tracking-[0.25em] text-zinc-500">Home Preview</p>
                    </div>
                </div>

                <div class="flex flex-col items-center text-center">
                    @if (!empty($profile?->photo))
                        <div class="relative">
                            <div class="absolute inset-0 rounded-full bg-white/10 blur-2xl scale-110"></div>
                            <img src="{{ asset('storage/' . $profile->photo) }}"
                                 alt="Foto Profile"
                                 class="relative w-52 h-52 rounded-full object-cover border border-white/10 shadow-[0_10px_35px_rgba(0,0,0,0.55)]">
                        </div>
                    @else
                        <div class="w-52 h-52 rounded-full border border-dashed border-white/10 bg-black/20 flex items-center justify-center text-zinc-500 text-sm">
                            Belum ada foto
                        </div>
                    @endif
                </div>

                <div class="mt-6 grid gap-3 text-sm">
                    <div class="rounded-2xl border border-white/10 bg-black/30 p-4">
                        <p class="text-zinc-200">{{ $profile->name ?? '-' }}</p>
                    </div>

                    <div class="rounded-2xl border border-white/10 bg-black/30 p-4">
                        <p class="text-zinc-200">{{ $profile->title ?? '-' }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- RIGHT: ABOUT PREVIEW --}}
        <div class="lg:col-span-8">
            <div class="rounded-3xl border border-white/10 bg-[linear-gradient(145deg,rgba(255,255,255,0.08),rgba(255,255,255,0.02))] p-6 shadow-[0_10px_40px_rgba(0,0,0,0.35)]">
                <div class="flex items-center gap-3 mb-6">
                    <div>
                        <p class="text-xs uppercase tracking-[0.25em] text-zinc-500">About Preview</p>
                    </div>
                </div>

                <div class="rounded-2xl border border-white/10 bg-black/30 p-5">
                    <p class="text-zinc-500 mb-2 text-sm">About</p>
                    <p class="leading-7 text-zinc-300">
                        {{ $profile->about ?? 'Deskripsi about belum tersedia.' }}
                    </p>
                </div>

                <div class="grid md:grid-cols-2 gap-4 text-sm mt-5">
                    <div class="rounded-2xl border border-white/10 bg-black/30 p-4">
                        <p class="text-zinc-500 mb-1">Phone</p>
                        <p class="text-zinc-200">{{ $profile->phone ?? '-' }}</p>
                    </div>

                    <div class="rounded-2xl border border-white/10 bg-black/30 p-4">
                        <p class="text-zinc-500 mb-1">Email</p>
                        <p class="text-zinc-200 break-words">{{ $profile->email ?? '-' }}</p>
                    </div>

                    <div class="rounded-2xl border border-white/10 bg-black/30 p-4">
                        <p class="text-zinc-500 mb-1">Instagram</p>
                        <p class="text-zinc-200 break-words">{{ $profile->instagram ?? '-' }}</p>
                    </div>

                    <div class="rounded-2xl border border-white/10 bg-black/30 p-4">
                        <p class="text-zinc-500 mb-1">Address</p>
                        <p class="text-zinc-200">{{ $profile->address ?? '-' }}</p>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection