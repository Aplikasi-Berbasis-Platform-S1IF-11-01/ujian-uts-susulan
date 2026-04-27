@extends('admin.layouts.app')

@section('content')
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:25px;">
        <div>
            <h1 style="margin:0; font-size:30px; color:#fff;">Skills</h1>
            <p style="margin-top:8px; color:#9ca3af;">Kelola data skill portfolio kamu.</p>
        </div>

        <a href="{{ route('admin.skills.create') }}"
           style="background:#fff; color:#111; padding:12px 18px; border-radius:10px; text-decoration:none; font-weight:600;">
            + Tambah Skill
        </a>
    </div>

    @if(session('success'))
        <div style="margin-bottom:20px; background:#14532d; color:#dcfce7; padding:14px 18px; border-radius:12px;">
            {{ session('success') }}
        </div>
    @endif

    <div style="background:#181818; border:1px solid #2e2e2e; border-radius:18px; overflow:hidden;">
        <table style="width:100%; border-collapse:collapse;">
            <thead style="background:#202020;">
                <tr>
                    <th style="padding:16px; text-align:left; color:#fff;">No</th>
                    <th style="padding:16px; text-align:left; color:#fff;">Skill Name</th>
                    <th style="padding:16px; text-align:left; color:#fff;">Description</th>
                    <th style="padding:16px; text-align:center; color:#fff;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($skills as $index => $skill)
                    <tr style="border-top:1px solid #2e2e2e;">
                        <td style="padding:16px; color:#d1d5db;">{{ $index + 1 }}</td>
                        <td style="padding:16px; color:#fff;">{{ $skill->skill_name }}</td>
                        <td style="padding:16px; color:#d1d5db;">{{ $skill->description }}</td>
                        <td style="padding:16px; text-align:center;">
                            <a href="{{ route('admin.skills.edit', $skill->id) }}"
                               style="display:inline-block; margin-right:8px; padding:8px 12px; background:#2563eb; color:white; border-radius:8px; text-decoration:none;">
                                Edit
                            </a>

                            <form action="{{ route('admin.skills.destroy', $skill->id) }}"
                                  method="POST"
                                  style="display:inline-block;"
                                  onsubmit="return confirm('Yakin ingin menghapus skill ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        style="padding:8px 12px; background:#dc2626; color:white; border:none; border-radius:8px; cursor:pointer;">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" style="padding:20px; text-align:center; color:#9ca3af;">
                            Belum ada data skill.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection