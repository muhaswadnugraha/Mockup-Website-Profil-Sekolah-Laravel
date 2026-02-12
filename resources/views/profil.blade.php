@extends('layout')
@section('title', 'Profil Sekolah')

@section('content')

    <style>
        .profile-header {
            background: linear-gradient(135deg, #ea580c, #f97316);
            color: #fff;
            border-radius: 20px;
            padding: 40px;
        }

        .profile-header img {
            background: #fff;
            border-radius: 16px;
            padding: 10px;
        }

        .info-card {
            border: none;
            border-radius: 18px;
            transition: .3s;
        }

        .info-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 14px 30px rgba(0, 0, 0, .12);
        }

        .info-title {
            font-weight: 700;
            color: #ea580c;
            margin-bottom: 1rem;
        }

        .badge-accent {
            background: #fde68a;
            color: #92400e;
            font-weight: 600;
        }

        .section-box {
            background: #fff7ed;
            border-radius: 18px;
            padding: 20px;
            height: 100%;
        }

        @media (max-width: 576px) {
            .profile-header {
                text-align: center;
            }
        }
    </style>

    @php
        $school = [
            'nama_sekolah' => 'SD Negeri 008 Loa Janan Ilir',
            'npsn' => '12345678',
            'jenjang' => 'Sekolah Dasar',
            'status_sekolah' => 'Negeri',
            'akreditasi' => 'A',
            'tahun_berdiri' => '2005',
            'kode_pos' => '75391',
            'alamat' => 'Jl. Pendidikan No. 8, Loa Janan Ilir',
            'desa' => 'Loa Janan Ilir',
            'kecamatan' => 'Loa Janan',
            'kabupaten' => 'Kutai Kartanegara',
            'provinsi' => 'Kalimantan Timur',
            'kepala_sekolah' => 'Siti Rahmawati, S.Pd',
            'nip_kepala' => '198012122010012001',
            'logo' =>
                'https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Logo_Kemdikbud.png/200px-Logo_Kemdikbud.png',
            'visi' => 'Mewujudkan peserta didik yang berprestasi, berkarakter, dan berakhlak mulia.',
            'misi' =>
                'Meningkatkan mutu pendidikan, membentuk karakter siswa, dan menciptakan lingkungan belajar yang nyaman.',
            'sejarah' =>
                'SD Negeri 008 Loa Janan Ilir berdiri pada tahun 2005 sebagai bentuk komitmen pemerintah dalam pemerataan pendidikan.',
        ];
    @endphp

    <div class="container py-5">

        <!-- HEADER -->
        <div class="profile-header mb-5 d-flex flex-column flex-md-row align-items-center gap-4">
            <img src="{{ $school['logo'] }}" width="120">
            <div>
                <h2 class="fw-bold mb-1">{{ $school['nama_sekolah'] }}</h2>
                <p class="mb-1">{{ $school['alamat'] }}</p>
                <span class="badge badge-accent">
                    Akreditasi {{ $school['akreditasi'] }}
                </span>
            </div>
        </div>

        <!-- INFO UTAMA -->
        <div class="row g-4">

            <div class="col-md-6">
                <div class="card info-card h-100">
                    <div class="card-body">
                        <h6 class="info-title">🏫 Identitas Sekolah</h6>
                        <table class="table table-borderless table-sm">
                            <tr>
                                <td>NPSN</td>
                                <td>: {{ $school['npsn'] }}</td>
                            </tr>
                            <tr>
                                <td>Jenjang</td>
                                <td>: {{ $school['jenjang'] }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>: {{ $school['status_sekolah'] }}</td>
                            </tr>
                            <tr>
                                <td>Tahun Berdiri</td>
                                <td>: {{ $school['tahun_berdiri'] }}</td>
                            </tr>
                            <tr>
                                <td>Kode Pos</td>
                                <td>: {{ $school['kode_pos'] }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card info-card h-100">
                    <div class="card-body">
                        <h6 class="info-title">📍 Wilayah Sekolah</h6>
                        <table class="table table-borderless table-sm">
                            <tr>
                                <td>Desa</td>
                                <td>: {{ $school['desa'] }}</td>
                            </tr>
                            <tr>
                                <td>Kecamatan</td>
                                <td>: {{ $school['kecamatan'] }}</td>
                            </tr>
                            <tr>
                                <td>Kabupaten</td>
                                <td>: {{ $school['kabupaten'] }}</td>
                            </tr>
                            <tr>
                                <td>Provinsi</td>
                                <td>: {{ $school['provinsi'] }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        <!-- KEPALA SEKOLAH -->
        <div class="card info-card mt-4">
            <div class="card-body">
                <h6 class="info-title">👩‍🏫 Pimpinan Sekolah</h6>
                <div class="row">
                    <div class="col-md-6">
                        <strong>Kepala Sekolah</strong>
                        <p class="mb-0">{{ $school['kepala_sekolah'] }}</p>
                    </div>
                    <div class="col-md-6">
                        <strong>NIP</strong>
                        <p class="mb-0">{{ $school['nip_kepala'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- VISI MISI SEJARAH -->
        <div class="row mt-4 g-4">
            <div class="col-md-4">
                <div class="section-box">
                    <h6 class="info-title">🎯 Visi</h6>
                    <p>{{ $school['visi'] }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="section-box">
                    <h6 class="info-title">🚀 Misi</h6>
                    <p>{{ $school['misi'] }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="section-box">
                    <h6 class="info-title">📜 Sejarah</h6>
                    <p>{{ $school['sejarah'] }}</p>
                </div>
            </div>
        </div>

    </div>

@endsection
