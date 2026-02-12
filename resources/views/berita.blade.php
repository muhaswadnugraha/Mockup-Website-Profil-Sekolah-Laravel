@extends('layout')

@section('title', 'Berita Sekolah')

@section('content')

    @php
        $berita = [];
        for ($i = 1; $i <= 18; $i++) {
            $berita[] = [
                'judul' => "Berita Sekolah $i",
                'tanggal' => '12 Maret 2025',
                'isi' => "Ini adalah isi lengkap berita sekolah ke-$i yang menjelaskan kegiatan, pengumuman, dan informasi penting bagi warga sekolah.",
                'foto' => "https://picsum.photos/seed/berita$i/600/400",
            ];
        }
    @endphp

    <style>
        .news-card {
            border: none;
            border-radius: 16px;
            transition: .3s;
            overflow: hidden;
        }

        .news-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, .12);
        }

        .news-img {
            height: 200px;
            object-fit: cover;
        }

        .pagination-btn.active {
            background: #0d6efd;
            color: #fff;
            border-color: #0d6efd;
        }
    </style>

    <div class="container py-5">

        <!-- HEADER -->
        <h4 class="fw-bold mb-1">📰 Berita Sekolah</h4>
        <p class="text-muted mb-4">
            Informasi dan kegiatan terbaru sekolah
        </p>

        <!-- SEARCH -->
        <input type="text" id="searchBerita" class="form-control mb-4" placeholder="Cari judul berita...">

        <!-- GRID -->
        <div class="row g-4" id="beritaContainer">

            @foreach ($berita as $index => $b)
                <div class="col-md-4 berita-item" data-name="{{ strtolower($b['judul']) }}"
                    data-page="{{ ceil(($index + 1) / 6) }}">

                    <div class="card news-card h-100">
                        <img src="{{ $b['foto'] }}" class="news-img w-100">

                        <div class="card-body">
                            <h6 class="fw-bold mb-1">
                                {{ $b['judul'] }}
                            </h6>

                            <small class="text-muted d-block mb-2">
                                {{ $b['tanggal'] }}
                            </small>

                            <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#beritaModal{{ $index }}">
                                Baca Detail
                            </button>
                        </div>
                    </div>
                </div>

                <!-- MODAL DETAIL -->
                <div class="modal fade" id="beritaModal{{ $index }}" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content rounded-4">

                            <div class="modal-header">
                                <h5 class="fw-bold">{{ $b['judul'] }}</h5>
                                <button class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">
                                <img src="{{ $b['foto'] }}" class="img-fluid rounded mb-3">

                                <small class="text-muted d-block mb-3">
                                    {{ $b['tanggal'] }}
                                </small>

                                <p style="text-align:justify">
                                    {{ $b['isi'] }}
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <!-- PAGINATION -->
        <div class="d-flex justify-content-center gap-2 mt-4" id="beritaPagination">
            <button class="btn btn-outline-secondary pagination-btn active" onclick="showBerita(1, event)">1</button>
            <button class="btn btn-outline-secondary pagination-btn" onclick="showBerita(2, event)">2</button>
            <button class="btn btn-outline-secondary pagination-btn" onclick="showBerita(3, event)">3</button>
        </div>

    </div>

    <script>
        function showBerita(page, e) {
            document.querySelectorAll('.berita-item').forEach(item => {
                item.style.display = item.dataset.page == page ? 'block' : 'none';
            });

            e.target.parentElement
                .querySelectorAll('.pagination-btn')
                .forEach(btn => btn.classList.remove('active'));

            e.target.classList.add('active');
        }

        document.getElementById('searchBerita').addEventListener('keyup', e => {
            let keyword = e.target.value.toLowerCase();

            document.querySelectorAll('.berita-item').forEach(item => {
                item.style.display =
                    item.dataset.name.includes(keyword) ? 'block' : 'none';
            });

            // reset ke halaman 1
            document.querySelectorAll('#beritaPagination .pagination-btn')
                .forEach(btn => btn.classList.remove('active'));

            document.querySelectorAll('#beritaPagination .pagination-btn')[0]
                .classList.add('active');
        });

        // INIT
        showBerita(1, {
            target: document.querySelectorAll('.pagination-btn')[0]
        });
    </script>

@endsection
