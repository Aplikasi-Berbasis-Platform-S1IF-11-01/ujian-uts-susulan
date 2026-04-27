@extends('admin.layouts.app')

@section('content')
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:25px; gap:20px; flex-wrap:wrap;">
        <div>
            <h1 style="margin:0; font-size:30px; color:#fff;">About</h1>
            <p style="margin-top:8px; color:#9ca3af;">Kelola data section about pada landing page.</p>
        </div>

        @if($profile)
            <a href="{{ route('admin.about.edit', $profile->id) }}"
               style="background:#ffffff; color:#111111; padding:12px 18px; border-radius:10px; text-decoration:none; font-weight:700;">
                Edit About
            </a>
        @endif
    </div>

    @if(session('success'))
        <div style="margin-bottom:20px; background:#14532d; color:#dcfce7; padding:14px 18px; border-radius:12px;">
            {{ session('success') }}
        </div>
    @endif

    @if($profile)
        <div style="
            background:#181818;
            border:1px solid #2e2e2e;
            border-radius:20px;
            padding:28px;
        ">
            <div style="margin-bottom:20px;">
                <p style="margin:0 0 6px 0; color:#9ca3af;">About Description</p>
                <div style="color:#d1d5db; line-height:1.8; white-space:pre-line;">
                    {{ $profile->about ?: '-' }}
                </div>
            </div>

            <div style="
                display:grid;
                grid-template-columns:repeat(auto-fit, minmax(220px, 1fr));
                gap:18px;
                margin-top:25px;
            ">
                <div style="background:#101010; border:1px solid #2e2e2e; border-radius:14px; padding:16px;">
                    <p style="margin:0 0 8px 0; color:#9ca3af;">Address</p>
                    <div style="color:#fff;">{{ $profile->address ?: '-' }}</div>
                </div>

                <div style="background:#101010; border:1px solid #2e2e2e; border-radius:14px; padding:16px;">
                    <p style="margin:0 0 8px 0; color:#9ca3af;">Phone</p>
                    <div style="color:#fff;">{{ $profile->phone ?: '-' }}</div>
                </div>

                <div style="background:#101010; border:1px solid #2e2e2e; border-radius:14px; padding:16px;">
                    <p style="margin:0 0 8px 0; color:#9ca3af;">Email</p>
                    <div style="color:#fff;">{{ $profile->email ?: '-' }}</div>
                </div>

                <div style="background:#101010; border:1px solid #2e2e2e; border-radius:14px; padding:16px;">
                    <p style="margin:0 0 8px 0; color:#9ca3af;">Instagram</p>
                    <div style="color:#fff;">{{ $profile->instagram ?: '-' }}</div>
                </div>
            </div>
        </div>
    @else
        <div style="
            background:#181818;
            border:1px solid #2e2e2e;
            border-radius:20px;
            padding:28px;
            color:#9ca3af;
        ">
            Data about belum tersedia.
        </div>
    @endif
@endsection