@extends('layout')
@section('title', 'Prestasi Sekolah')

@section('content')

    @php
        $prestasiSekolah = [];
        for ($i = 1; $i <= 24; $i++) {
            $prestasiSekolah[] = [
                'judul' => "Juara $i Tingkat Kota",
                'kategori' => $i % 2 == 0 ? 'Akademik' : 'Non Akademik',
                'foto' => "https://picsum.photos/seed/prestasi$i/600/400",
                'deskripsi' => 'Prestasi membanggakan dalam ajang resmi.',
            ];
        }
        $perPage = 12;
    @endphp

    <style>
        /* ===== HEADER ===== */
        .page-header {
            background: linear-gradient(135deg, #4f46e5, #9333ea, #f97316);
            color: #fff;
            border-radius: 22px;
            padding: 42px;
            position: relative;
            overflow: hidden;
        }

        .page-header::after {
            content: '';
            position: absolute;
            width: 220px;
            height: 220px;
            background: rgba(255, 255, 255, .15);
            border-radius: 50%;
            top: -60px;
            right: -60px;
        }

        /* ===== CARD ===== */
        .prestasi-card {
            border-radius: 20px;
            border: none;
            overflow: hidden;
            transition: .35s;
            background: linear-gradient(180deg, #ffffff, #f8fafc);
        }

        .prestasi-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 25px 45px rgba(0, 0, 0, .22);
        }

        .prestasi-img {
            height: 230px;
            object-fit: cover;
        }

        /* ===== BADGE ===== */
        .badge-akademik {
            background: linear-gradient(135deg, #22c55e, #16a34a);
            color: #fff;
        }

        .badge-non {
            background: linear-gradient(135deg, #f97316, #ea580c);
            color: #fff;
        }

        .badge-kategori {
            position: absolute;
            top: 14px;
            left: 14px;
            font-size: 12px;
            padding: 7px 14px;
            border-radius: 20px;
            font-weight: 600;
        }

        /* ===== ICON ===== */
        .icon-trophy {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #facc15, #f59e0b);
            color: #000;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            font-size: 18px;
        }

        /* ===== PAGINATION ===== */
        .pagination-btn {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            font-weight: 700;
            border: none;
            background: #e5e7eb;
            transition: .3s;
        }

        .pagination-btn:hover {
            background: #f97316;
            color: #fff;
        }

        .pagination-btn.active {
            background: linear-gradient(135deg, #6366f1, #9333ea);
            color: #fff;
        }
    </style>

    <section class="container py-5">

        <!-- HEADER -->
        <div class="page-header mb-5 text-center">
            <h2 class="fw-bold mb-2">🏆 Prestasi Sekolah</h2>
            <p class="mb-0">
                Bukti nyata semangat, kerja keras, dan dedikasi sekolah
            </p>
        </div>

        <!-- CONTENT -->
        <div class="row g-4">
            @foreach ($prestasiSekolah as $i => $item)
                <div class="col-sm-6 col-lg-4 prestasi-item" data-page="{{ ceil(($i + 1) / $perPage) }}">

                    <div class="card prestasi-card h-100">

                        <div class="position-relative">
                            <img src="{{ $item['foto'] }}" class="prestasi-img w-100">

                            <span
                                class="badge-kategori
                            {{ $item['kategori'] == 'Akademik' ? 'badge-akademik' : 'badge-non' }}">
                                {{ $item['kategori'] }}
                            </span>
                        </div>

                        <div class="card-body">
                            <div class="d-flex align-items-center gap-3 mb-2">
                                <div class="icon-trophy">🏆</div>
                                <h6 class="fw-bold mb-0">{{ $item['judul'] }}</h6>
                            </div>

                            <p class="text-muted small mb-0">
                                {{ $item['deskripsi'] }}
                            </p>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

        <!-- PAGINATION -->
        <div class="d-flex justify-content-center gap-3 mt-5">
            @for ($p = 1; $p <= ceil(count($prestasiSekolah) / $perPage); $p++)
                <button class="pagination-btn {{ $p == 1 ? 'active' : '' }}" onclick="showPrestasi({{ $p }})">
                    {{ $p }}
                </button>
            @endfor
        </div>

    </section>

    <script>
        function showPrestasi(page) {
            document.querySelectorAll('.prestasi-item').forEach(el => {
                el.style.display = el.dataset.page == page ? 'block' : 'none';
            });
            document.querySelectorAll('.pagination-btn').forEach(b => b.classList.remove('active'));
            document.querySelectorAll('.pagination-btn')[page - 1].classList.add('active');
        }
        showPrestasi(1);
    </script>

@endsection
