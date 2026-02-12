<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Website Profil SDN 008 Loa Janan Ilir')</title>

        <!-- CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800" rel="stylesheet">

        @stack('styles')

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }

            /* TOP INFO */
            .top-info {
                font-size: 13px;
                padding: 6px 0;
                background: #0d47a1;
            }

            /* NAVBAR */
            .navbar-brand {
                font-weight: 800;
                color: #0d47a1 !important;
            }

            .nav-link {
                font-weight: 600;
            }

            .nav-link.active {
                color: #0d47a1 !important;
                border-bottom: 2px solid #0d47a1;
            }

            /* HERO */
            .hero {
                min-height: 92vh;
                display: flex;
                align-items: center;
                justify-content: center;
                text-align: center;
                background: linear-gradient(135deg, #1976d2, #42a5f5);
                color: #fff;
            }

            .hero h1 {
                font-weight: 800;
                font-size: clamp(1.8rem, 4vw, 3.2rem);
            }

            .hero .btn {
                background: #ffeb3b;
                font-weight: 700;
                color: #000;
            }

            /* FOOTER */
            footer {
                background: #1e293b;
                padding: 30px 0;
                font-size: 14px;
            }

            footer a {
                color: #cbd5e1;
                text-decoration: none;
            }

            footer a:hover {
                color: #fff;
            }

            @media (max-width: 768px) {
                .top-info .container {
                    flex-direction: column;
                    text-align: center;
                    gap: 4px;
                }
            }
        </style>
    </head>

    <body>

        <!-- TOP INFO -->
        <div class="top-info text-white">
            <div class="container d-flex justify-content-between">
                <span>INFORMASI : Penerimaan Peserta Didik Baru Tahun Ajaran 2026</span>
                <span id="tanggal"></span>
            </div>
        </div>

        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white border-top border-bottom sticky-top">
            <div class="container">

                <a class="navbar-brand" href="/">SDN 008 LOA JANAN ILIR</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu"
                    aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-center" id="navbarMenu">
                    <ul class="navbar-nav gap-lg-4">

                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Beranda</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profil') ? 'active' : '' }}" href="/profil">Profil</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('pengajar') ? 'active' : '' }}"
                                href="/pengajar">Pengajar</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('prestasi') ? 'active' : '' }}"
                                href="/prestasi">Prestasi</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('ekstrakurikuler') ? 'active' : '' }}"
                                href="/ekstrakurikuler">Ekstrakurikuler</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('berita') ? 'active' : '' }}" href="/berita">Berita</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('galeri') ? 'active' : '' }}" href="/galeri">Galeri</a>
                        </li>

                    </ul>
                </div>

            </div>
        </nav>

        <!-- CONTENT -->
        <div class="bg-light min-vh-100">
            @yield('content')
        </div>

        <!-- FOOTER -->
        <footer class="text-white pt-5 pb-3">
            <div class="container">
                <div class="row g-4 text-center text-md-start">

                    <div class="col-md-4">
                        <h5 class="fw-bold">SDN 008 Loa Janan Ilir</h5>
                        <p class="mb-1">Loa Janan Ilir, Samarinda</p>
                        <p class="mb-1">Email: info@sdn008.sch.id</p>
                        <p>Telp: (0541) 123-456</p>
                    </div>

                    <div class="col-md-4">
                        <h5 class="fw-bold">Menu</h5>
                        <ul class="list-unstyled">
                            <li><a href="/">Beranda</a></li>
                            <li><a href="/profil">Profil</a></li>
                            <li><a href="/berita">Berita</a></li>
                            <li><a href="/galeri">Galeri</a></li>
                        </ul>
                    </div>

                    <div class="col-md-4">
                        <h5 class="fw-bold">Media Sosial</h5>
                        <a href="#" class="me-3"><i class="fab fa-facebook fa-lg"></i></a>
                        <a href="#" class="me-3"><i class="fab fa-instagram fa-lg"></i></a>
                        <a href="#"><i class="fab fa-youtube fa-lg"></i></a>
                    </div>

                </div>

                <hr class="border-secondary mt-4">

                <div class="text-center text-secondary small">
                    © {{ date('Y') }} SDN 008 Loa Janan Ilir · Website Profil Sekolah
                </div>
            </div>
        </footer>

        <!-- JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const tanggal = new Date().toLocaleDateString('id-ID', {
                    weekday: 'long',
                    day: 'numeric',
                    month: 'long',
                    year: 'numeric'
                });

                document.getElementById('tanggal').innerText = tanggal;
            });
        </script>

        @stack('scripts')

    </body>

</html>
