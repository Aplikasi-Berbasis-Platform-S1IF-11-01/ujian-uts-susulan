@extends('admin.layouts.app')

@section('content')
    <div style="max-width: 800px;">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:25px; gap:20px; flex-wrap:wrap;">
            <div>
                <h1 style="margin:0; font-size:30px; color:#fff;">Edit Organization</h1>
                <p style="margin-top:8px; color:#9ca3af;">Ubah data organization pada landing page.</p>
            </div>

            <a href="{{ route('admin.organization.index') }}"
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
            <form action="{{ route('admin.organization.update', $organization->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div style="margin-bottom:20px;">
                    <label for="organization_name" style="display:block; margin-bottom:10px; color:#fff; font-weight:600;">Organization Name</label>
                    <input type="text" id="organization_name" name="organization_name" value="{{ old('organization_name', $organization->organization_name) }}"
                           style="width:100%; padding:14px 16px; border-radius:12px; border:1px solid #3a3a3a; background:#101010; color:#fff; outline:none;">
                </div>

                <div style="margin-bottom:20px;">
                    <label for="role" style="display:block; margin-bottom:10px; color:#fff; font-weight:600;">Role</label>
                    <input type="text" id="role" name="role" value="{{ old('role', $organization->role) }}"
                           style="width:100%; padding:14px 16px; border-radius:12px; border:1px solid #3a3a3a; background:#101010; color:#fff; outline:none;">
                </div>

                <div style="margin-bottom:20px;">
                    <label for="year" style="display:block; margin-bottom:10px; color:#fff; font-weight:600;">Year</label>
                    <input type="text" id="year" name="year" value="{{ old('year', $organization->year) }}"
                           style="width:100%; padding:14px 16px; border-radius:12px; border:1px solid #3a3a3a; background:#101010; color:#fff; outline:none;">
                </div>

                <div style="margin-bottom:24px;">
                    <label for="description" style="display:block; margin-bottom:10px; color:#fff; font-weight:600;">Description</label>
                    <textarea id="description" name="description" rows="5"
                              style="width:100%; padding:14px 16px; border-radius:12px; border:1px solid #3a3a3a; background:#101010; color:#fff; outline:none; resize:vertical;">{{ old('description', $organization->description) }}</textarea>
                </div>

                <div style="display:flex; gap:12px; flex-wrap:wrap;">
                    <button type="submit"
                            style="background:#ffffff; color:#111111; border:none; padding:12px 20px; border-radius:12px; cursor:pointer; font-weight:700;">
                        Update
                    </button>

                    <a href="{{ route('admin.organization.index') }}"
                       style="background:#2a2a2a; color:#ffffff; border:1px solid #3a3a3a; padding:12px 20px; border-radius:12px; text-decoration:none; font-weight:600;">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection