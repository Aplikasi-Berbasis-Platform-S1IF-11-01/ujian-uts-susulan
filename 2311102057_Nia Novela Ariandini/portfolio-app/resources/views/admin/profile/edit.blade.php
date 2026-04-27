@extends('layouts.app') @section('content')
<div class="container" style="padding: 40px;">
    <h2 style="color: #e78aa9; font-weight: 800; margin-bottom: 30px;">Edit Profile</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card" style="border-radius: 20px; padding: 30px; border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="name" class="form-control" value="{{ $profile->name }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Title (Pekerjaan)</label>
                <input type="text" name="title" class="form-control" value="{{ $profile->title }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi Singkat</label>
                <textarea name="description" class="form-control" rows="4">{{ $profile->description }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Foto Profil</label>
                <input type="file" name="photo" class="form-control">
                <small class="text-muted">Kosongkan jika tidak ingin mengubah foto</small>
            </div>

            <button type="submit" class="btn" style="background: #e78aa9; color: white; border-radius: 10px; padding: 10px 25px; font-weight: 600;"> Simpan Perubahan </button>
            <a href="/dashboard" class="btn btn-light" style="border-radius: 10px; padding: 10px 25px;">Batal</a>
        </form>
    </div>
</div>
@endsection