@extends('layouts.admin')
@section('title', 'Experiences')

@section('content')
<div class="flex justify-between mb-6">
    <h1 class="text-3xl font-bold text-amber-400">Experiences</h1>
    <a href="{{ route('admin.experience.create') }}" class="px-4 py-2 bg-amber-500 text-slate-900 font-semibold rounded-lg">
        + Tambah Experience
    </a>
</div>

@if(session('success'))
    <div class="mb-4 px-4 py-3 bg-green-500/20 text-green-400 rounded-lg">{{ session('success') }}</div>
@endif

<div class="bg-slate-800 rounded-xl border border-amber-500/20 overflow-hidden">
    <table class="w-full">
        <thead class="bg-slate-900">
            <tr class="text-left text-amber-400">
                <th class="p-3">Period</th>
                <th class="p-3">Position</th>
                <th class="p-3">Company</th>
                <th class="p-3 text-right">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($experiences as $exp)
            <tr class="border-t border-slate-700">
                <td class="p-3 text-slate-400 text-sm">{{ $exp->period }}</td>
                <td class="p-3 text-slate-200 font-semibold">{{ $exp->position }}</td>
                <td class="p-3 text-slate-300 italic">{{ $exp->company }}</td>
                <td class="p-3 text-right space-x-2">
                    <a href="{{ route('admin.experience.edit', $exp) }}" class="text-amber-400 text-sm">Edit</a>
                    <form method="POST" action="{{ route('admin.experience.destroy', $exp) }}" class="inline" onsubmit="return confirm('Hapus?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-400 text-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" class="p-6 text-center text-slate-500">Belum ada data</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection