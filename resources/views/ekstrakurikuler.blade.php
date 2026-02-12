@extends('layout')
@section('title', 'Ekstrakurikuler')

@section('content')

    <style>
        .section-title {
            font-weight: 700;
        }

        .card {
            border: none;
            border-radius: 16px;
            transition: .3s;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, .12);
        }

        .ekskul-img {
            height: 160px;
            object-fit: cover;
            border-radius: 16px 16px 0 0;
        }

        .badge-ekskul {
            background: #ea580c;
        }

        .page-btn.active {
            background: #ea580c;
            color: #fff;
        }
    </style>

    <div class="container py-5">

        <!-- HEADER -->
        <h4 class="section-title mb-2">🎯 Ekstrakurikuler Sekolah</h4>
        <p class="text-muted mb-4">Kegiatan pengembangan minat dan bakat siswa</p>

        <!-- SEARCH -->
        <div class="row mb-4">
            <div class="col-md-5">
                <input type="text" id="searchEkskul" class="form-control rounded-pill" placeholder="Cari ekstrakurikuler...">
            </div>
        </div>

        @php
            $namaEkskul = [
                'Pramuka',
                'Paskibra',
                'Futsal',
                'Basket',
                'PMR',
                'Rohis',
                'KIR',
                'English Club',
                'Tari',
                'Musik',
                'Karate',
                'Silat',
                'Volly',
                'Badminton',
                'Jurnalistik',
                'Teater',
            ];

            $dataEkskul = [];
            foreach ($namaEkskul as $i => $nama) {
                $dataEkskul[] = [
                    'nama' => $nama,
                    'jadwal' => 'Jumat, 15.30 WIB',
                    'anggota' => rand(15, 40),
                    'foto' => "https://picsum.photos/seed/ekskul$i/600/400",
                ];
            }
        @endphp

        <!-- GRID -->
        <div class="row g-4" id="ekskulContainer">
            @foreach ($dataEkskul as $i => $e)
                <div class="col-sm-6 col-lg-3 ekskul-item" data-name="{{ strtolower($e['nama']) }}">

                    <div class="card h-100">
                        <img src="{{ $e['foto'] }}" class="ekskul-img w-100">

                        <div class="card-body">
                            <span class="badge badge-ekskul mb-2">Ekstrakurikuler</span>
                            <h6 class="fw-bold">{{ $e['nama'] }}</h6>
                            <p class="small mb-3">Jadwal: {{ $e['jadwal'] }}</p>

                            <button class="btn btn-outline-primary btn-sm w-100" data-bs-toggle="modal"
                                data-bs-target="#modalEkskul{{ $i }}">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>

                <!-- MODAL -->
                <div class="modal fade" id="modalEkskul{{ $i }}" tabindex="-1">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content rounded-4">
                            <div class="modal-header">
                                <h5 class="fw-bold">{{ $e['nama'] }}</h5>
                                <button class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row g-4">
                                    <div class="col-md-5">
                                        <img src="{{ $e['foto'] }}" class="img-fluid rounded shadow">
                                    </div>
                                    <div class="col-md-7">
                                        <p><strong>Jadwal:</strong> {{ $e['jadwal'] }}</p>
                                        <p><strong>Jumlah Anggota:</strong> {{ $e['anggota'] }} siswa</p>
                                        <p class="text-muted" style="text-align:justify">
                                            Ekstrakurikuler {{ $e['nama'] }} bertujuan
                                            mengembangkan minat, bakat, dan karakter siswa
                                            melalui kegiatan positif dan kolaboratif.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- PAGINATION -->
        <div class="text-center mt-4" id="pagination"></div>

    </div>

    <script>
        const allItems = [...document.querySelectorAll('.ekskul-item')];
        const perPage = 8;
        let currentPage = 1;
        let filteredItems = [...allItems];

        function renderItems() {
            allItems.forEach(i => i.classList.add('d-none'));

            const start = (currentPage - 1) * perPage;
            const end = start + perPage;

            filteredItems.slice(start, end)
                .forEach(i => i.classList.remove('d-none'));
        }

        function renderPagination() {
            const pages = Math.ceil(filteredItems.length / perPage);
            const pag = document.getElementById('pagination');
            pag.innerHTML = '';

            for (let i = 1; i <= pages; i++) {
                pag.innerHTML += `
                <button
                    class="btn btn-outline-secondary mx-1 page-btn ${i===currentPage?'active':''}"
                    onclick="changePage(${i})">
                    ${i}
                </button>`;
            }
        }

        function changePage(page) {
            currentPage = page;
            renderItems();
            renderPagination();
        }

        document.getElementById('searchEkskul')
            .addEventListener('keyup', function() {
                const val = this.value.toLowerCase();

                filteredItems = allItems.filter(i =>
                    i.dataset.name.includes(val)
                );

                currentPage = 1;
                renderItems();
                renderPagination();
            });

        // INIT
        renderItems();
        renderPagination();
    </script>

@endsection
