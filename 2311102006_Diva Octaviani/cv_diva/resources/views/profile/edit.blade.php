@extends('layouts.admin')
@section('title', 'Edit Profile')

@section('content')
<h1 class="text-3xl font-bold text-amber-400 mb-6">Edit Profile</h1>

@if(session('success'))
    <div class="mb-4 p-4 bg-green-500/20 border border-green-500/40 text-green-300 rounded-lg">{{ session('success') }}</div>
@endif

<form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data"
      class="bg-slate-800 p-6 rounded-xl border border-amber-500/20 space-y-4 max-w-2xl">
    @csrf @method('PUT')

    @foreach([
        'name'         => 'Nama Lengkap',
        'title'        => 'Judul/Profesi',
        'email'        => 'Email',
        'github_url'   => 'GitHub URL',
        'instagram_url'=> 'Instagram URL',
        'linkedin_url' => 'LinkedIn URL',
        'whatsapp_url' => 'WhatsApp URL',
    ] as $f => $l)
    <div>
        <label class="text-slate-300 text-sm">{{ $l }}</label>
        <input type="text" name="{{ $f }}" value="{{ old($f, $profile->$f) }}"
               class="w-full mt-1 px-4 py-2 bg-slate-900 border border-slate-700 rounded-lg text-white">
        @error($f)<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
    </div>
    @endforeach

    <div>
        <label class="text-slate-300 text-sm">Bio / Tagline</label>
        <textarea name="description" rows="3"
                  class="w-full mt-1 px-4 py-2 bg-slate-900 border border-slate-700 rounded-lg text-white">{{ old('description', $profile->description) }}</textarea>
    </div>

    <div>
        <label class="text-slate-300 text-sm">About Description</label>
        <textarea name="about_description" rows="3"
                  class="w-full mt-1 px-4 py-2 bg-slate-900 border border-slate-700 rounded-lg text-white">{{ old('about_description', $profile->about_description) }}</textarea>
    </div>

    <div>
        <label class="text-slate-300 text-sm">Foto Profile</label>
        <input