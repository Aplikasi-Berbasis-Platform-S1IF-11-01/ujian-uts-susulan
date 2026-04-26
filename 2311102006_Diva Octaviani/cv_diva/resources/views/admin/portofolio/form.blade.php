@extends('layouts.admin')
@section('content')

<h1 class="text-3xl font-bold text-amber-400 mb-6">{{ $item->exists ? 'Edit' : 'Tambah' }} Portfolio</h1>

@if(session('success'))
    <div class="mb-4 p-4 bg-green-500/20 border border-green-500/40 text-green-300 rounded-lg">{{ session('success') }}</div>
@endif

<form method="POST" action="{{ $item->exists ? route('admin.portfolio.update',$item) : route('admin.portfolio.store') }}"
      enctype="multipart/form-data" class="bg-slate-800 p-6 rounded-xl border border-amber-500/20 space-y-4 max-w-4xl w-full">
    @csrf @if($item->exists) @method('PUT') @endif

    <div>
        <label class="text-slate-300 text-sm">Judul</label>
        <input type="text" name="title" value="{{ old('title', $item->title) }}"
               class="w-full mt-1 px-4 py-2 bg-slate-900 border border-slate-700 rounded-lg text-white">
        @error('title')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="text-slate-300 text-sm">Deskripsi</label>
        <textarea name="description" rows="3"
                  class="w-full mt-1 px-4 py-2 bg-slate-900 border border-slate-700 rounded-lg text-white">{{ old('description', $item->description) }}</textarea>
    </div>

    <div>
        <label class="text-slate-300 text-sm">Tech Stack / Bahasa</label>
        <input type="text" name="tech_stack" value="{{ old('tech_stack', $item->tech_stack) }}"
            placeholder="contoh: PHP, Laravel, Python"
            class="w-full mt-1 px-4 py-2 bg-slate-900 border border-slate-700 rounded-lg text-white">
    </div>

    <div>
        <label class="text-slate-300 text-sm">Link Project</label>
        <input type="text" name="link" value="{{ old('link', $item->link) }}"
               class="w-full mt-1 px-4 py-2 bg-slate-900 border border-slate-700 rounded-lg text-white">
    </div>

    <div>
        <label class="text-slate-300 text-sm">Urutan</label>
        <input type="text" name="sort_order" value="{{ old('sort_order', $item->sort_order) }}"
               class="w-full mt-1 px-4 py-2 bg-slate-900 border border-slate-700 rounded-lg text-white">
    </div>

    <div>
        <label class="text-slate-300 text-sm">Gambar</label>
        @if($item->image_url)
            <img src="{{ asset('storage/'.$item->image_url) }}" class="w-32 mb-2 rounded">
        @endif
        <input type="file" name="photo" accept="image/*" class="w-full mt-1 text-slate-300">
    </div>

    <button class="px-6 py-2 bg-amber-500 text-slate-900 font-bold rounded-lg">Simpan</button>
</form>
@endsection
