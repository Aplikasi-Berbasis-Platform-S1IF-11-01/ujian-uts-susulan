@extends('admin.layouts.app')

@section('content')
    <div style="max-width: 900px;">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:25px; gap:20px; flex-wrap:wrap;">
            <div>
                <h1 style="margin:0; font-size:30px; color:#fff;">Edit About</h1>
                <p style="margin-top:8px; color:#9ca3af;">Ubah data section about pada landing page.</p>
            </div>

            <a href="{{ route('admin.about.index') }}"
               style="background:#2a2a2a; color:#fff; padding:12px 18px; border-radius:10px; text-decoration:none; font-weight:600; border:1px solid #3a3a3a;">
                Kembali
            </a>
        </div>

        @if ($errors->any())
            <div style="margin-bottom:20px; background:#7f1d1d; color:#fecaca; padding:16px; border-radius:12px;">
                <strong style="display:block; margin-bottom:8px;">Terjadi kesalahan:</strong>
                <ul style="margin:0; padding-left:18px;">
                    @foreach ($errors->all() as $error)
                        <li style="margin-bottom:4px;">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div style="
            background:#181818;
            border:1px solid #2e2e2e;
            border-radius:20px;
            padding:28px;
        ">
            <form action="{{ route('admin.about.update', $profile->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div style="margin-bottom:20px;">
                    <label for="about" style="display:block; margin-bottom:10px; color:#fff; font-weight:600;">About Description</label>
                    <textarea
                        name="about"
                        id="about"
                        rows="8"
                        style="width:100%; padding:14px 16px; border-radius:12px; border:1px solid #3a3a3a; background:#101010; color:#fff; outline:none; resize:vertical;"
                    >{{ old('about', $profile->about) }}</textarea>
                </div>

                <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:20px;">
                    <div>
                        <label for="address" style="display:block; margin-bottom:10px; color:#fff; font-weight:600;">Address</label>
                        <input
                            type="text"
                            name="address"
                            id="address"
                            value="{{ old('address', $profile->address) }}"
                            style="width:100%; padding:14px 16px; border-radius:12px; border:1px solid #3a3a3a; background:#101010; color:#fff; outline:none;"
                        >
                    </div>

                    <div>
                        <label for="phone" style="display:block; margin-bottom:10px; color:#fff; font-weight:600;">Phone</label>
                        <input
                            type="text"
                            name="phone"
                            id="phone"
                            value="{{ old('phone', $profile->phone) }}"
                            style="width:100%; padding:14px 16px; border-radius:12px; border:1px solid #3a3a3a; background:#101010; color:#fff; outline:none;"
                        >
                    </div>

                    <div>
                        <label for="email" style="display:block; margin-bottom:10px; color:#fff; font-weight:600;">Email</label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            value="{{ old('email', $profile->email) }}"
                            style="width:100%; padding:14px 16px; border-radius:12px; border:1px solid #3a3a3a; background:#101010; color:#fff; outline:none;"
                        >
                    </div>

                    <div>
                        <label for="instagram" style="display:block; margin-bottom:10px; color:#fff; font-weight:600;">Instagram</label>
                        <input
                            type="text"
                            name="instagram"
                            id="instagram"
                            value="{{ old('instagram', $profile->instagram) }}"
                            style="width:100%; padding:14px 16px; border-radius:12px; border:1px solid #3a3a3a; background:#101010; color:#fff; outline:none;"
                        >
                    </div>
                </div>

                <div style="display:flex; gap:12px; flex-wrap:wrap; margin-top:28px;">
                    <button
                        type="submit"
                        style="background:#ffffff; color:#111111; border:none; padding:12px 20px; border-radius:12px; cursor:pointer; font-weight:700;"
                    >
                        Update About
                    </button>

                    <a href="{{ route('admin.about.index') }}"
                       style="background:#2a2a2a; color:#ffffff; border:1px solid #3a3a3a; padding:12px 20px; border-radius:12px; text-decoration:none; font-weight:600;">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection