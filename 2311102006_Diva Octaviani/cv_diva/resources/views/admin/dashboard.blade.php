@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div>
    <h2 class="text-2xl font-bold text-amber-400 mb-6">Dashboard</h2>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        <div class="bg-slate-800 border border-amber-500/20 rounded-xl p-6 text-center">
            <p class="text-4xl font-bold text-amber-400">{{ $profileCount }}</p>
            <p class="text-slate-400 mt-2">Profile</p>
        </div>
        <div class="bg-slate-800 border border-amber-500/20 rounded-xl p-6 text-center">
            <p class="text-4xl font-bold text-amber-400">{{ $eduCount }}</p>
            <p class="text-slate-400 mt-2">Education</p>
        </div>
        <div class="bg-slate-800 border border-amber-500/20 rounded-xl p-6 text-center">
            <p class="text-4xl font-bold text-amber-400">{{ $skillCount }}</p>
            <p class="text-slate-400 mt-2">Skills</p>
        </div>
        <div class="bg-slate-800 border border-amber-500/20 rounded-xl p-6 text-center">
            <p class="text-4xl font-bold text-amber-400">{{ $portoCount }}</p>
            <p class="text-slate-400 mt-2">Portfolio</p>
        </div>
    </div>
</div>
@endsection