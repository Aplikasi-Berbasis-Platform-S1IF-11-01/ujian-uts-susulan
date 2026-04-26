@extends('layouts.admin')

@section('content')
<div class="flex justify-between mb-6">
    <h1 class="text-3xl font-bold text-amber-400">Portfolio</h1>
    <div class="flex gap-2">
        {{-- Tombol Sync GitHub --}}
        <form method="POST" action="{{ route('admin.portfolio.sync-github') }}"
              onsubmit="return confirm('Sync repo dari GitHub divaocta?')">
            @csrf
            <button type="submit" class="px-4 py-2 bg-slate-700 text-amber-400 border border-amber-500/40 font-semibold rounded-lg hover:bg-slate-600 transition flex items-center gap-2">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
                Sync GitHub
            </button>
        </form>
        <a href="{{ route('admin.portfolio.create') }}" class="px-4 py-2 bg-amber-500 text-slate-900 font-semibold rounded-lg hover:bg-amber-400 transition">
            + Tambah
        </a>
    </div>
</div>

@if(session('success'))
    <div class="mb-4 p-4 bg-green-500/20 border border-green-500/40 text-green-300 rounded-lg">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="mb-4 p-4 bg-red-500/20 border border-red-500/40 text-red-300 rounded-lg">{{ session('error') }}</div>
@endif

<div class="bg-slate-800 rounded-xl border border-amber-500/20 overflow-hidden">
    <table class="w-full">
        <thead class="bg-slate-900">
            <tr class="text-left text-amber-400">
                <th class="p-3">Title</th>
                <th class="p-3">Tech Stack</th>
                <th class="p-3">Sumber</th>
                <th class="p-3">Link</th>
                <th class="p-3 text-right">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($items as $item)
            <tr class="border-t border-slate-700">
                <td class="p-3 text-slate-200">{{ $item->title }}</td>
                <td class="p-3 text-slate-400 text-sm">{{ $item->tech_stack ?? '-' }}</td>
                <td class="p-3">
                    @if($item->is_github_sync)
                        <span class="px-2 py-0.5 bg-slate-700 text-amber-400 text-xs rounded-full border border-amber-500/30">GitHub</span>
                    @else
                        <span class="px-2 py-0.5 bg-slate-700 text-slate-400 text-xs rounded-full">Manual</span>
                    @endif
                </td>
                <td class="p-3">
                    @if($item->link)
                        <a href="{{ $item->link }}" target="_blank" class="text-amber-400 underline text-sm">Lihat</a>
                    @else
                        <span class="text-slate-500 text-sm">-</span>
                    @endif
                </td>
                <td class="p-3 text-right space-x-2">
                    <a href="{{ route('admin.portfolio.edit', $item) }}" class="text-amber-400 text-sm">Edit</a>
                    <form method="POST" action="{{ route('admin.portfolio.destroy', $item) }}"
                          class="inline" onsubmit="return confirm('Hapus portfolio ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-400 text-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="p-6 text-center text-slate-500">Belum ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection