@extends('admin.layouts.app')

@section('content')
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:25px; gap:20px; flex-wrap:wrap;">
        <div>
            <h1 style="margin:0; font-size:30px; color:#fff;">Home</h1>
            <p style="margin-top:8px; color:#9ca3af;">Kelola data section home pada landing page.</p>
        </div>

        @if($profile)
            <a href="{{ route('admin.home.edit', $profile->id) }}"
               style="background:#ffffff; color:#111111; padding:12px 18px; border-radius:10px; text-decoration:none; font-weight:700;">
                Edit Home
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
            <div style="display:grid; grid-template-columns: 220px 1fr; gap:30px; align-items:start;">
                <div>
                    @if($profile->photo)
                        <img src="{{ asset('storage/' . $profile->photo) }}"
                             alt="Profile Photo"
                             style="width:100%; max-width:220px; border-radius:18px; border:1px solid #2e2e2e; object-fit:cover;">
                    @else
                        <div style="
                            width:220px;
                            height:220px;
                            background:#101010;
                            border:1px solid #2e2e2e;
                            border-radius:18px;
                            display:flex;
                            align-items:center;
                            justify-content:center;
                            color:#9ca3af;
                        ">
                            No Photo
                        </div>
                    @endif
                </div>

                <div>
                    <div style="margin-bottom:18px;">
                        <p style="margin:0 0 6px 0; color:#9ca3af;">Name</p>
                        <h2 style="margin:0; color:#fff;">{{ $profile->name }}</h2>
                    </div>

                    <div style="margin-bottom:18px;">
                        <p style="margin:0 0 6px 0; color:#9ca3af;">Title</p>
                        <div style="color:#fff;">{{ $profile->title }}</div>
                    </div>

                    <div style="margin-bottom:18px;">
                        <p style="margin:0 0 6px 0; color:#9ca3af;">About</p>
                        <div style="color:#d1d5db; line-height:1.7;">{{ $profile->about }}</div>
                    </div>

                    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(220px, 1fr)); gap:16px;">
                        <div>
                            <p style="margin:0 0 6px 0; color:#9ca3af;">Phone</p>
                            <div style="color:#fff;">{{ $profile->phone ?: '-' }}</div>
                        </div>

                        <div>
                            <p style="margin:0 0 6px 0; color:#9ca3af;">Email</p>
                            <div style="color:#fff;">{{ $profile->email ?: '-' }}</div>
                        </div>

                        <div>
                            <p style="margin:0 0 6px 0; color:#9ca3af;">Instagram</p>
                            <div style="color:#fff;">{{ $profile->instagram ?: '-' }}</div>
                        </div>

                        <div>
                            <p style="margin:0 0 6px 0; color:#9ca3af;">Address</p>
                            <div style="color:#fff;">{{ $profile->address ?: '-' }}</div>
                        </div>
                    </div>
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
            Data profile belum tersedia.
        </div>
    @endif
@endsection