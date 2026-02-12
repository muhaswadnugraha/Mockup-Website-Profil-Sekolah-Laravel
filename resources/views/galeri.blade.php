@extends('layout')
@section('title', 'Galeri')

@section('content')
    <div class="container py-5">
        <h2 class="text-center fw-bold mb-4">Galeri Sekolah</h2>

        <input type="text" id="searchGaleri" class="form-control mb-4" placeholder="Cari galeri...">

        @php
            $galeri = [];
            for ($i = 1; $i <= 24; $i++) {
                $galeri[] = [
                    'judul' => "Kegiatan Sekolah $i",
                    'tanggal' => '2026-02-' . str_pad($i, 2, '0', STR_PAD_LEFT),
                    'deskripsi' => "Dokumentasi kegiatan sekolah ke-$i.",
                    'foto' => "https://picsum.photos/seed/$i/600/400",
                ];
            }
        @endphp

        <div class="row" id="galeriContainer"></div>
        <div class="d-flex justify-content-center mt-4" id="galeriPagination"></div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="galeriModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <img id="modalFoto" class="img-fluid rounded-top">
                <div class="p-3">
                    <h5 id="modalJudul"></h5>
                    <small class="text-muted" id="modalTanggal"></small>
                    <p class="mt-2" id="modalDeskripsi"></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        const galeri = @json($galeri);
        let currentPageGaleri = 1;
        const perPageGaleri = 8;

        function renderGaleri(data) {
            const container = document.getElementById('galeriContainer');
            container.innerHTML = '';

            const start = (currentPageGaleri - 1) * perPageGaleri;
            const paginated = data.slice(start, start + perPageGaleri);

            paginated.forEach(g => {
                container.innerHTML += `
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card h-100 shadow-sm">
                <img src="${g.foto}" class="card-img-top">
                <div class="card-body">
                    <h6 class="fw-bold">${g.judul}</h6>
                    <small class="text-muted">${g.tanggal}</small>
                    <p class="mt-1 small">${g.deskripsi}</p>
                    <button class="btn btn-sm btn-outline-primary"
                        onclick="openGaleri('${g.foto}','${g.judul}','${g.tanggal}','${g.deskripsi}')">
                        Lihat
                    </button>
                </div>
            </div>
        </div>`;
            });

            renderGaleriPagination(data.length);
        }

        function renderGaleriPagination(total) {
            const pages = Math.ceil(total / perPageGaleri);
            const pag = document.getElementById('galeriPagination');
            pag.innerHTML = '';

            for (let i = 1; i <= pages; i++) {
                pag.innerHTML += `
        <button class="btn btn-sm ${i === currentPageGaleri ? 'btn-primary' : 'btn-outline-primary'} mx-1"
            onclick="changeGaleriPage(${i})">${i}</button>`;
            }
        }

        function changeGaleriPage(page) {
            currentPageGaleri = page;
            renderGaleri(filteredGaleri);
        }

        function openGaleri(foto, judul, tanggal, deskripsi) {
            document.getElementById('modalFoto').src = foto;
            document.getElementById('modalJudul').innerText = judul;
            document.getElementById('modalTanggal').innerText = tanggal;
            document.getElementById('modalDeskripsi').innerText = deskripsi;
            new bootstrap.Modal(document.getElementById('galeriModal')).show();
        }

        let filteredGaleri = galeri;

        document.getElementById('searchGaleri').addEventListener('input', e => {
            filteredGaleri = galeri.filter(g =>
                g.judul.toLowerCase().includes(e.target.value.toLowerCase())
            );
            currentPageGaleri = 1;
            renderGaleri(filteredGaleri);
        });

        renderGaleri(galeri);
    </script>
@endsection
