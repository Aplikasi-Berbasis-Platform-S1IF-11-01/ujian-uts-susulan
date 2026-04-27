@extends('admin.layouts.app')

@section('content')
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:25px; gap:20px; flex-wrap:wrap;">
        <div>
            <h1 style="margin:0; font-size:30px; color:#fff;">Experience</h1>
            <p style="margin-top:8px; color:#9ca3af;">Kelola data experience pada landing page.</p>
        </div>

        <a href="{{ route('admin.experience.create') }}"
           style="background:#ffffff; color:#111111; padding:12px 18px; border-radius:10px; text-decoration:none; font-weight:700;">
            + Tambah Experience
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
                    <th style="padding:16px; text-align:left; color:#fff; width:70px;">No</th>
                    <th style="padding:16px; text-align:left; color:#fff;">Company</th>
                    <th style="padding:16px; text-align:left; color:#fff;">Position</th>
                    <th style="padding:16px; text-align:left; color:#fff;">Year</th>
                    <th style="padding:16px; text-align:left; color:#fff;">Description</th>
                    <th style="padding:16px; text-align:center; color:#fff; width:190px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($experiences as $index => $experience)
                    <tr style="border-top:1px solid #2e2e2e;">
                        <td style="padding:16px; color:#d1d5db;">{{ $index + 1 }}</td>
                        <td style="padding:16px; color:#fff;">{{ $experience->company }}</td>
                        <td style="padding:16px; color:#d1d5db;">{{ $experience->position }}</td>
                        <td style="padding:16px; color:#d1d5db;">{{ $experience->year }}</td>
                        <td style="padding:16px; color:#d1d5db;">{{ $experience->description ?: '-' }}</td>
                        <td style="padding:16px; text-align:center;">
                            <div style="display:flex; justify-content:center; align-items:center; gap:10px; flex-wrap:nowrap;">
                                <a href="{{ route('admin.experience.edit', $experience->id) }}"
                                   style="
                                       display:inline-flex;
                                       align-items:center;
                                       justify-content:center;
                                       min-width:56px;
                                       padding:8px 14px;
                                       background:#2563eb;
                                       color:#ffffff;
                                       border-radius:8px;
                                       text-decoration:none;
                                       white-space:nowrap;
                                   ">
                                    Edit
                                </a>

                                <form action="{{ route('admin.experience.destroy', $experience->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus data experience ini?')"
                                      style="margin:0;">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            style="
                                                display:inline-flex;
                                                align-items:center;
                                                justify-content:center;
                                                min-width:56px;
                                                padding:8px 14px;
                                                background:#dc2626;
                                                color:#ffffff;
                                                border:none;
                                                border-radius:8px;
                                                cursor:pointer;
                                                white-space:nowrap;
                                            ">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="padding:20px; text-align:center; color:#9ca3af;">
                            Belum ada data experience.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection