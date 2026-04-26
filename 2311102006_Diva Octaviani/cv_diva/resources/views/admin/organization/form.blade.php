@extends('layouts.admin')
@section('title', $organization->exists ? 'Edit Organization' : 'Tambah Organization')

@section('content')

@if(session('success'))
    <div class="mb-4 p-4 bg-green-500/20 border border-green-500/40 text-green-300 rounded-lg">
        {{ session('success') }}
    </div>
@endif

<h1 class="text-3xl font-bold text-amber-400 mb-6">
    {{ $organization->exists ? 'Edit Organization' : 'Tambah Organization' }}
</h1>

<form method="POST"
      action="{{ $organization->exists ? route('admin.organization.update', $organization) : route('admin.organization.store') }}"
      class="bg-slate-800 p-6 rounded-xl border border-amber-500/20 space-y-4 max-w-4xl">
    @csrf
    @if($organization->exists) @method('PUT') @endif

    <div>
        <label class="text-slate-300 text-sm">Period <span class="text-slate-500">(contoh: AUG 2024 - MAY 2025)</span></label>
        <input type="text" name="period" value="{{ old('period', $organization->period) }}"
               class="w-full mt-1 px-4 py-2 bg-slate-900 border border-slate-700 rounded-lg text-white">
        @error('period')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="text-slate-300 text-sm">Position</label>
        <input type="text" name="position" value="{{ old('position', $organization->position) }}"
               class="w-full mt-1 px-4 py-2 bg-slate-900 border border-slate-700 rounded-lg text-white">
        @error('position')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="text-slate-300 text-sm">Organization Name</label>
        <input type="text" name="organization_name" value="{{ old('organization_name', $organization->organization_name) }}"
               class="w-full mt-1 px-4 py-2 bg-slate-900 border border-slate-700 rounded-lg text-white">
        @error('organization_name')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="text-slate-300 text-sm">Responsibilities <span class="text-slate-500">(satu baris = satu poin)</span></label>
        <textarea name="responsibilities" rows="5"
                  class="w-full mt-1 px-4 py-2 bg-slate-900 border border-slate-700 rounded-lg text-white">{{ old('responsibilities', $organization->exists ? implode("\n", $organization->responsibilities ?? []) : '') }}</textarea>
    </div>

    <div>
        <label class="text-slate-300 text-sm">Sort Order</label>
        <input type="number" name="sort_order" value="{{ old('sort_order', $organization->sort_order ?? 0) }}"
               class="w-full mt-1 px-4 py-2 bg-slate-900 border border-slate-700 rounded-lg text-white">
    </div>

    <div>
        <button type="submit" class="px-6 py-2 bg-amber-500 text-slate-900 font-bold rounded-lg hover:bg-amber-400 transition">Simpan</button>
    </div>
</form>
@endsection