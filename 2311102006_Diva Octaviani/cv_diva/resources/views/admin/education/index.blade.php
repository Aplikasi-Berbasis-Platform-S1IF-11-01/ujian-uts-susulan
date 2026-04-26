@extends('layouts.admin')
@section('content')

@if(session('success'))
    <div class="mb-4 p-4 bg-green-500/20 border border-green-500/40 text-green-300 rounded-lg">
        {{ session('success') }}
    </div>
@endif

<div class="flex justify-between mb-6">
    <h1 class="text-3xl font-bold text-amber-400">Education</h1>
    <a href="{{ route('admin.education.create') }}" class="px-4 py-2 bg-amber-500 text-slate-900 font-semibold rounded-lg">+ Tambah</a>
</div>
<div class="bg-slate-800 rounded-xl border border-amber-500/20 overflow-hidden">
    <table class="w-full">
        <thead class="bg-slate-900"><tr class="text-left text-amber-400">
            <th class="p-3">Periode</th><th class="p-3">Institusi</th><th class="p-3">Jurusan</th><th class="p-3 text-right">Aksi</th>
        </tr></thead>
        <tbody>
            @forelse($items as $item)
            <tr class="border-t border-slate-700">
                <td class="p-3">{{ $item->period }}</td>
                <td class="p-3">{{ $item->institution }}</td>
                <td class="p-3">{{ $item->major }}</td>
                <td class="p-3 text-right space-x-2">
                    <a href="{{ route('admin.education.edit', $item) }}" class="text-amber-400">Edit</a>
                    <form method="POST" action="{{ route('admin.education.destroy', $item) }}" class="inline" onsubmit="return confirm('Yakin?')">
                        @csrf @method('DELETE')
                        <button class="text-red-400">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty <tr><td colspan="4" class="p-6 text-center text-slate-500">Belum ada data</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection