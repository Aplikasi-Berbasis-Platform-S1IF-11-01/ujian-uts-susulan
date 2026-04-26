@extends('layouts.admin')
@section('content')

@if(session('success'))
    <div class="mb-4 p-4 bg-green-500/20 border border-green-500/40 text-green-300 rounded-lg">
        {{ session('success') }}
    </div>
@endif

<h1 class="text-3xl font-bold text-amber-400 mb-6">{{ $item->exists ? 'Edit' : 'Tambah' }} Education</h1>

<form method="POST" action="{{ $item->exists ? route('admin.education.update',$item) : route('admin.education.store') }}" class="bg-slate-800 p-6 rounded-xl border border-amber-500/20 space-y-4 max-w-4xl w-full">
    @csrf @if($item->exists) @method('PUT') @endif

    <div>
        <label class="text-slate-300 text-sm">Periode (cth: 2021-2025)</label>
        <input type="text" name="period" value="{{ old('period', $item->period) }}"
               class="w-full mt-1 px-4 py-2 bg-slate-900 border border-slate-700 rounded-lg text-white">
        @error('period')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="text-slate-300 text-sm">Institusi</label>
        <input type="text" name="institution" value="{{ old('institution', $item->institution) }}"
               class="w-full mt-1 px-4 py-2 bg-slate-900 border border-slate-700 rounded-lg text-white">
        @error('institution')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="text-slate-300 text-sm">Jurusan</label>
        <input type="text" name="major" value="{{ old('major', $item->major) }}"
               class="w-full mt-1 px-4 py-2 bg-slate-900 border border-slate-700 rounded-lg text-white">
        @error('major')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="text-slate-300 text-sm">Urutan</label>
        <input type="number" name="sort_order" value="{{ old('sort_order', $item->sort_order) }}"
               class="w-full mt-1 px-4 py-2 bg-slate-900 border border-slate-700 rounded-lg text-white">
        @error('sort_order')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="text-slate-300 text-sm">Deskripsi</label>
        <textarea name="description" rows="3"
                  class="w-full mt-1 px-4 py-2 bg-slate-900 border border-slate-700 rounded-lg text-white">{{ old('description', $item->description) }}</textarea>
        @error('description')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    <button class="px-6 py-2 bg-amber-500 text-slate-900 font-bold rounded-lg">Simpan</button>
</form>
@endsection