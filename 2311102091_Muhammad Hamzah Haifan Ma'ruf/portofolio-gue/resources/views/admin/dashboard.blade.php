@extends('admin.layouts.app')

@section('content')
    <style>
        .dashboard-page {
            min-height: calc(100vh - 110px);
            display: flex;
            flex-direction: column;
            gap: 20px;
            overflow: hidden;
        }

        .dashboard-header {
            flex: 0 0 auto;
        }

        .dashboard-header p {
            margin: 0 0 8px 0;
            color: #9ca3af;
            font-size: 13px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .dashboard-header h1 {
            margin: 0;
            font-size: 30px;
            font-weight: 700;
            color: #ffffff;
        }

        .dashboard-header span {
            display: block;
            margin-top: 8px;
            color: #d1d5db;
            font-size: 14px;
        }

        .stats-grid {
            flex: 1;
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 16px;
            min-height: 0;
        }

        .stat-card {
            background: linear-gradient(180deg, #1a1a1a 0%, #141414 100%);
            border: 1px solid #2a2a2a;
            border-radius: 22px;
            padding: 22px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 150px;
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.03);
        }

        .stat-card .label {
            color: #9ca3af;
            font-size: 14px;
            margin-bottom: 14px;
            letter-spacing: 0.3px;
        }

        .stat-card .value {
            color: #ffffff;
            font-size: 42px;
            font-weight: 800;
            line-height: 1;
            margin-bottom: 10px;
        }

        .stat-card .desc {
            color: #737373;
            font-size: 13px;
            line-height: 1.5;
        }

        .stat-card.total {
            background: linear-gradient(180deg, #ffffff 0%, #d9d9d9 100%);
            border: 1px solid #ffffff;
        }

        .stat-card.total .label,
        .stat-card.total .value,
        .stat-card.total .desc {
            color: #111111;
        }

        @media (max-width: 1200px) {
            .stats-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        @media (max-width: 900px) {
            .dashboard-page {
                min-height: auto;
                overflow: visible;
            }

            .stats-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 576px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .dashboard-header h1 {
                font-size: 26px;
            }

            .stat-card .value {
                font-size: 36px;
            }
        }
    </style>

    @php
        $totalAll = $totalHome + $totalAbout + $totalSkills + $totalEducations + $totalExperiences + $totalOrganizations + $totalProjects;
    @endphp

    <div class="dashboard-page">
        <div class="dashboard-header">
            <p>Admin Panel</p>
            <h1>Dashboard Statistik</h1>
            <span>Ringkasan jumlah data yang tampil pada landing page portfolio.</span>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="label">Home</div>
                <div class="value">{{ $totalHome }}</div>
                <div class="desc">Jumlah data section home pada landing page.</div>
            </div>

            <div class="stat-card">
                <div class="label">About</div>
                <div class="value">{{ $totalAbout }}</div>
                <div class="desc">Jumlah data section about pada landing page.</div>
            </div>

            <div class="stat-card">
                <div class="label">Skills</div>
                <div class="value">{{ $totalSkills }}</div>
                <div class="desc">Total skill yang ditampilkan pada portfolio.</div>
            </div>

            <div class="stat-card">
                <div class="label">Education</div>
                <div class="value">{{ $totalEducations }}</div>
                <div class="desc">Total riwayat pendidikan yang tersimpan.</div>
            </div>

            <div class="stat-card">
                <div class="label">Experience</div>
                <div class="value">{{ $totalExperiences }}</div>
                <div class="desc">Total pengalaman yang tampil pada landing page.</div>
            </div>

            <div class="stat-card">
                <div class="label">Organization</div>
                <div class="value">{{ $totalOrganizations }}</div>
                <div class="desc">Total organisasi yang ditampilkan pada portfolio.</div>
            </div>

            <div class="stat-card">
                <div class="label">Projects</div>
                <div class="value">{{ $totalProjects }}</div>
                <div class="desc">Total project yang tampil pada landing page.</div>
            </div>
        </div>
    </div>
@endsection