@extends('layout')
@section('title', 'Beranda')

@section('content')

    <style>
        :root {
            --primary: #0d6efd;
            --secondary: #ffc107;
            --soft: #f4f7fb;
        }

        body {
            margin: 0;
            padding: 0;
        }

        /* ================= HERO ================= */
        .hero-slider {
            position: relative;
            height: 100vh;
            width: 100%;
            overflow: hidden;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            transition: background-image .6s ease-in-out;
        }

        .hero-slider::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(120deg,
                    rgba(13, 110, 253, .85),
                    rgba(0, 0, 0, .55));
            z-index: 1;
        }

        .hero-slider .carousel,
        .hero-slider .carousel-inner,
        .hero-slider .carousel-item {
            height: 100%;
        }

        .carousel-item {
            display: flex;
            align-items: center;
        }

        .hero-text {
            position: relative;
            z-index: 2;
        }

        .hero-image-card {
            position: relative;
            z-index: 2;
            background: rgba(255, 255, 255, .1);
            padding: 12px;
            border-radius: 20px;
            backdrop-filter: blur(6px);
        }

        .hero-image-card img {
            border-radius: 15px;
        }

        /* ================= CARD ================= */
        .card {
            border: none;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
        }

        .section-title {
            font-weight: 800;
            color: var(--primary);
        }
    </style>

    <!-- ================= HERO ================= -->
    <section class="hero-slider">
        <div id="heroCarousel" class="carousel slide carousel-fade h-100" data-bs-ride="carousel">
            <div class="carousel-inner h-100">

                <!-- SLIDE 1 -->
                <div class="carousel-item active" data-bg="https://picsum.photos/seed/hero1/1600/900">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-lg-6 text-white hero-text text-center text-lg-start">
                                <h1 class="fw-bold display-4">
                                    SDN 008 <br> LOA JANAN ILIR
                                </h1>
                                <p class="lead">
                                    Membentuk generasi cerdas, berakhlak, dan berprestasi.
                                </p>
                                <a href="/profil" class="btn btn-warning fw-bold px-4 py-2 rounded-pill">
                                    Profil Sekolah
                                </a>
                            </div>

                            <div class="col-lg-6 d-none d-lg-flex justify-content-center">
                                <div class="hero-image-card">
                                    <img src="https://picsum.photos/seed/hero1/600/400" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SLIDE 2 -->
                <div class="carousel-item" data-bg="https://picsum.photos/seed/hero2/1600/900">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center justify-content-center text-center">
                            <div class="col-lg-8 text-white hero-text">
                                <h1 class="fw-bold display-4">
                                    SEKOLAH <br> RAMAH ANAK
                                </h1>
                                <p class="lead">
                                    Lingkungan belajar yang aman dan menyenangkan.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SLIDE 3 -->
                <div class="carousel-item" data-bg="https://picsum.photos/seed/hero3/1600/900">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center justify-content-center text-center">
                            <div class="col-lg-8 text-white hero-text">
                                <h1 class="fw-bold display-4">
                                    SEMANGAT <br> BELAJAR
                                </h1>
                                <p class="lead">
                                    Mendorong kreativitas dan karakter sejak dini.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ================= KONTEN ================= -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-4">

                <!-- ================= SAMBUTAN (KIRI) ================= -->
                <div class="col-lg-8">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="section-title mb-4">
                                Sambutan Kepala Sekolah
                            </h5>

                            <div class="d-flex flex-column flex-md-row gap-4">
                                <div class="text-center">
                                    <img src="https://picsum.photos/seed/kepsek/200/260" class="rounded shadow"
                                        style="width:160px;height:200px;object-fit:cover;">
                                    <div class="mt-2 fw-semibold">
                                        Drs. Ahmad Sudirman
                                    </div>
                                    <small class="text-muted">
                                        Kepala Sekolah
                                    </small>
                                </div>

                                <div style="text-align: justify;">
                                    <p>
                                        Website ini merupakan media informasi resmi
                                        SDN 008 Loa Janan Ilir untuk menyajikan
                                        kegiatan akademik maupun non-akademik.
                                    </p>
                                    <p>
                                        Kami berharap website ini menjadi sarana
                                        komunikasi yang efektif bagi seluruh warga sekolah dan masyarakat.
                                    </p>
                                    <p class="fw-semibold mb-0">
                                        Wassalamu’alaikum warahmatullahi wabarakatuh.
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- ================= BERITA (KANAN) ================= -->
                <div class="col-lg-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="section-title mb-3">📰 Berita Terbaru</h5>

                            @php
                                $berita = [];
                                for ($i = 1; $i <= 3; $i++) {
                                    $berita[] = [
                                        'judul' => "Berita SDN 008 $i",
                                        'deskripsi' => 'Kegiatan dan informasi terbaru sekolah.',
                                        'foto' => "https://picsum.photos/seed/home$i/100/100",
                                    ];
                                }
                            @endphp

                            @foreach ($berita as $item)
                                <div class="d-flex gap-3 mb-3 p-2 border-bottom">
                                    <img src="{{ $item['foto'] }}" width="70" height="70" class="rounded"
                                        style="object-fit:cover;">

                                    <div>
                                        <small class="fw-semibold d-block">
                                            {{ $item['judul'] }}
                                        </small>
                                        <small class="text-muted">
                                            {{ $item['deskripsi'] }}
                                        </small>
                                    </div>
                                </div>
                            @endforeach

                            <a href="/berita" class="fw-semibold text-decoration-none text-primary">
                                Lihat semua berita →
                            </a>
                        </div>
                    </div>
                </div>

                <!-- ================= LOKASI (FULL BAWAH) ================= -->
                <div class="col-12">
                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="section-title text-center mb-4">
                                Lokasi SDN 008 Loa Janan Ilir
                            </h5>

                            <div class="row align-items-center g-4">
                                <div class="col-md-6">
                                    <p class="text-muted">
                                        SD Negeri 008 Loa Janan Ilir. Jl. Cipto Mangunkusumo,
                                        Kec. Loa Janan Ilir, Kota Samarinda, Kalimantan Timur.
                                        Sekolah ini memiliki lingkungan yang bersih,
                                        aman, dan nyaman untuk kegiatan belajar.
                                    </p>
                                </div>

                                <div class="col-md-6">
                                    <div class="ratio ratio-16x9 rounded overflow-hidden shadow">
                                        <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3392.225438240278!2d117.08732289999999!3d-0.5549950000000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df680c90e2b46cb%3A0x74e977849b00bc2!2sSDN%20008%20LOA%20JANAN%20IILIR!5e1!3m2!1sid!2sid!4v1770891530612!5m2!1sid!2sid"
                                            style="border:0;" allowfullscreen loading="lazy">
                                        </iframe>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <script>
        const hero = document.querySelector('.hero-slider');
        const carousel = document.getElementById('heroCarousel');

        function setBackground() {
            const active = carousel.querySelector('.carousel-item.active');
            if (active && active.dataset.bg) {
                hero.style.backgroundImage =
                    `url('${active.dataset.bg}')`;
            }
        }

        setBackground();
        carousel.addEventListener('slid.bs.carousel', setBackground);
    </script>

@endsection
