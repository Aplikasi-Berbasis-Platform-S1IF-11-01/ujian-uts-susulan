@extends('layouts.admin')
@section('content')

@if(session('success'))
    <div class="mb-4 p-4 bg-green-500/20 border border-green-500/40 text-green-300 rounded-lg">
        {{ session('success') }}
    </div>
@endif

<h1 class="text-3xl font-bold text-amber-400 mb-6">{{ $item->exists ? 'Edit' : 'Tambah' }} Skill</h1>

<form method="POST" action="{{ $item->exists ? route('admin.skill.update',$item) : route('admin.skill.store') }}" class="bg-slate-800 p-6 rounded-xl border border-amber-500/20 space-y-4 max-w-4xl w-full">
    @csrf @if($item->exists) @method('PUT') @endif

    <div>
        <label class="text-slate-300 text-sm">Nama Skill</label>
        <input type="text" name="name" value="{{ old('name', $item->name) }}"
               class="w-full mt-1 px-4 py-2 bg-slate-900 border border-slate-700 rounded-lg text-white">
        @error('name')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="text-slate-300 text-sm">Urutan</label>
        <input type="number" name="sort_order" value="{{ old('sort_order', $item->sort_order) }}"
               class="w-full mt-1 px-4 py-2 bg-slate-900 border border-slate-700 rounded-lg text-white">
        @error('sort_order')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    <button class="px-6 py-2 bg-amber-500 text-slate-900 font-bold rounded-lg">Simpan</button>
</form>
@endsection