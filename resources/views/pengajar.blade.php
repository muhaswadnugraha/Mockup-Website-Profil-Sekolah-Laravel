@extends('layout')

@section('title', 'Data Pengajar')

@section('content')

    <style>
        /* ================= GLOBAL ================= */
        .page-header {
            background: linear-gradient(135deg, #1e3a8a, #2563eb);
            color: #fff;
            border-radius: 14px;
            padding: 32px;
        }

        /* ================= SEARCH ================= */
        .search-box {
            position: relative;
            max-width: 360px;
            width: 100%;
        }

        .search-box i {
            position: absolute;
            top: 50%;
            left: 14px;
            transform: translateY(-50%);
            color: #6b7280;
        }

        .search-box input {
            padding-left: 40px;
        }

        /* ================= CARD GURU ================= */
        .guru-card {
            border: none;
            border-radius: 16px;
            overflow: hidden;
            transition: all .25s ease;
            background: #fff;
        }

        .guru-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 35px rgba(0, 0, 0, .18);
        }

        .guru-img {
            height: 240px;
            object-fit: cover;
        }

        .guru-badge {
            font-size: 12px;
            background: #e0f2fe;
            color: #0369a1;
        }

        /* ================= PAGINATION ================= */
        .page-btn {
            min-width: 42px;
        }

        /* ================= RESPONSIVE ================= */
        @media (max-width: 576px) {
            .guru-img {
                height: 200px;
            }

            .page-header {
                padding: 24px;
                text-align: center;
            }
        }
    </style>

    <section class="container py-5">

        <!-- ================= HEADER ================= -->
        <div class="page-header mb-5">
            <div class="row align-items-center g-3">
                <div class="col-md-6">
                    <h3 class="fw-bold mb-1">👩‍🏫 Data Pengajar</h3>
                    <p class="mb-0 small">
                        Informasi guru dan tenaga pendidik sekolah
                    </p>
                </div>

                <div class="col-md-6 d-flex justify-content-md-end">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" id="searchGuru" class="form-control" placeholder="Cari nama guru...">
                    </div>
                </div>
            </div>
        </div>

        <!-- ================= GRID ================= -->
        <div class="row g-4" id="guruContainer">

            @for ($i = 1; $i <= 20; $i++)
                <div class="col-6 col-md-4 col-lg-3 guru-item" data-name="guru {{ $i }}"
                    data-page="{{ $i <= 12 ? 1 : 2 }}">

                    <div class="card guru-card h-100 text-center">
                        <img src="/mockup/guru/guru{{ $i }}.jpg" class="guru-img w-100"
                            alt="Guru {{ $i }}">

                        <div class="card-body">
                            <h6 class="fw-bold mb-1">Guru {{ $i }}</h6>

                            <span class="badge guru-badge mb-3">
                                Guru Mata Pelajaran
                            </span>

                            <div class="d-grid">
                                <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#guruModal{{ $i }}">
                                    Lihat Profil
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ================= MODAL ================= -->
                <div class="modal fade" id="guruModal{{ $i }}" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content rounded-4">

                            <div class="modal-header">
                                <h5 class="modal-title fw-bold">Profil Guru</h5>
                                <button class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">
                                <div class="row g-4 align-items-center">
                                    <div class="col-md-4 text-center">
                                        <img src="/mockup/guru/guru{{ $i }}.jpg"
                                            class="img-fluid rounded shadow">
                                    </div>
                                    <div class="col-md-8">
                                        <p><strong>Nama:</strong> Guru {{ $i }}</p>
                                        <p><strong>Jabatan:</strong> Guru Mata Pelajaran</p>
                                        <p><strong>Pendidikan:</strong> S1 Pendidikan</p>
                                        <p><strong>Email:</strong> guru{{ $i }}@sekolah.sch.id</p>
                                        <p class="mb-0 text-muted" style="text-align: justify;">
                                            Guru {{ $i }} merupakan tenaga pendidik yang
                                            profesional dan berpengalaman dalam bidangnya.
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endfor

        </div>

        <!-- ================= PAGINATION ================= -->
        <div class="d-flex justify-content-center gap-2 mt-5">
            <button class="btn btn-outline-secondary page-btn" onclick="changePage(1)">1</button>
            <button class="btn btn-outline-secondary page-btn" onclick="changePage(2)">2</button>
        </div>

    </section>

    <script>
        const guruItems = document.querySelectorAll('.guru-item');
        const searchInput = document.getElementById('searchGuru');

        function changePage(page) {
            guruItems.forEach(item => {
                item.style.display =
                    item.dataset.page == page ? 'block' : 'none';
            });
        }

        changePage(1);

        searchInput.addEventListener('input', function() {
            const keyword = this.value.toLowerCase();
            guruItems.forEach(item => {
                const name = item.dataset.name;
                item.style.display =
                    name.includes(keyword) ? 'block' : 'none';
            });
        });
    </script>

@endsection
