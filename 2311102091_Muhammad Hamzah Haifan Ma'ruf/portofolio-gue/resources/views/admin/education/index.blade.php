@extends('admin.layouts.app')

@section('content')
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:25px; gap:20px; flex-wrap:wrap;">
        <div>
            <h1 style="margin:0; font-size:30px; color:#fff;">Education</h1>
            <p style="margin-top:8px; color:#9ca3af;">Kelola data education pada landing page.</p>
        </div>

        <a href="{{ route('admin.education.create') }}"
           style="background:#ffffff; color:#111111; padding:12px 18px; border-radius:10px; text-decoration:none; font-weight:700;">
            + Tambah Education
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
                    <th style="padding:16px; text-align:left; color:#fff;">Institution</th>
                    <th style="padding:16px; text-align:left; color:#fff;">Major</th>
                    <th style="padding:16px; text-align:left; color:#fff;">Start Year</th>
                    <th style="padding:16px; text-align:left; color:#fff;">End Year</th>
                    <th style="padding:16px; text-align:center; color:#fff;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($educations as $index => $education)
                    <tr style="border-top:1px solid #2e2e2e;">
                        <td style="padding:16px; color:#d1d5db;">{{ $index + 1 }}</td>
                        <td style="padding:16px; color:#fff;">{{ $education->institution }}</td>
                        <td style="padding:16px; color:#d1d5db;">{{ $education->major }}</td>
                        <td style="padding:16px; color:#d1d5db;">{{ $education->start_year }}</td>
                        <td style="padding:16px; color:#d1d5db;">{{ $education->end_year ?: '-' }}</td>
                        <td style="padding:16px; text-align:center;">
                            <a href="{{ route('admin.education.edit', $education->id) }}"
                               style="display:inline-block; margin-right:8px; padding:8px 12px; background:#2563eb; color:white; border-radius:8px; text-decoration:none;">
                                Edit
                            </a>

                            <form action="{{ route('admin.education.destroy', $education->id) }}"
                                  method="POST"
                                  style="display:inline-block;"
                                  onsubmit="return confirm('Yakin ingin menghapus data education ini?')">
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
                        <td colspan="6" style="padding:20px; text-align:center; color:#9ca3af;">
                            Belum ada data education.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection