@extends('admin.layouts.app')

@section('content')
    <div style="max-width: 800px;">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:25px; gap:20px; flex-wrap:wrap;">
            <div>
                <h1 style="margin:0; font-size:30px; color:#fff;">Tambah Education</h1>
                <p style="margin-top:8px; color:#9ca3af;">Tambahkan data education baru ke landing page.</p>
            </div>

            <a href="{{ route('admin.education.index') }}"
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

        <div style="background:#181818; border:1px solid #2e2e2e; border-radius:20px; padding:28px;">
            <form action="{{ route('admin.education.store') }}" method="POST">
                @csrf

                <div style="margin-bottom:20px;">
                    <label for="institution" style="display:block; margin-bottom:10px; color:#fff; font-weight:600;">Institution</label>
                    <input type="text" id="institution" name="institution" value="{{ old('institution') }}"
                           style="width:100%; padding:14px 16px; border-radius:12px; border:1px solid #3a3a3a; background:#101010; color:#fff; outline:none;">
                </div>

                <div style="margin-bottom:20px;">
                    <label for="major" style="display:block; margin-bottom:10px; color:#fff; font-weight:600;">Major</label>
                    <input type="text" id="major" name="major" value="{{ old('major') }}"
                           style="width:100%; padding:14px 16px; border-radius:12px; border:1px solid #3a3a3a; background:#101010; color:#fff; outline:none;">
                </div>

                <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(220px, 1fr)); gap:20px; margin-bottom:24px;">
                    <div>
                        <label for="start_year" style="display:block; margin-bottom:10px; color:#fff; font-weight:600;">Start Year</label>
                        <input type="text" id="start_year" name="start_year" value="{{ old('start_year') }}"
                               placeholder="Contoh: 2022"
                               style="width:100%; padding:14px 16px; border-radius:12px; border:1px solid #3a3a3a; background:#101010; color:#fff; outline:none;">
                    </div>

                    <div>
                        <label for="end_year" style="display:block; margin-bottom:10px; color:#fff; font-weight:600;">End Year</label>
                        <input type="text" id="end_year" name="end_year" value="{{ old('end_year') }}"
                               placeholder="Contoh: 2026"
                               style="width:100%; padding:14px 16px; border-radius:12px; border:1px solid #3a3a3a; background:#101010; color:#fff; outline:none;">
                    </div>
                </div>

                <div style="display:flex; gap:12px; flex-wrap:wrap;">
                    <button type="submit"
                            style="background:#ffffff; color:#111111; border:none; padding:12px 20px; border-radius:12px; cursor:pointer; font-weight:700;">
                        Simpan
                    </button>

                    <a href="{{ route('admin.education.index') }}"
                       style="background:#2a2a2a; color:#ffffff; border:1px solid #3a3a3a; padding:12px 20px; border-radius:12px; text-decoration:none; font-weight:600;">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection