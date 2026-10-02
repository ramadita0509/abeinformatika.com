<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'ABE Informatika' }}</title>
    <meta name="description" content="CV. ABE Informatika, authorized service partner ASUS, Lenovo, Zyrex, Brother, dan Avita di Tasikmalaya.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,560;9..144,640&family=Source+Sans+3:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/site.css') }}" rel="stylesheet">
</head>
<body class="site-body" id="atas">
    <header class="site-header sticky-top">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ route('welcome') }}">
                    <img src="{{ asset('assets/img/logo-abe.jpg') }}" alt="ABE Informatika" class="site-logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#siteNav" aria-controls="siteNav" aria-expanded="false" aria-label="Buka menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="siteNav">
                    <ul class="navbar-nav ms-auto align-items-lg-center site-nav">
                        <li class="nav-item"><a class="nav-link" href="{{ route('welcome') }}">Beranda</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('site.lacak') }}">Cek Servis</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('welcome') }}#layanan">Layanan</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('site.profil') }}">Profil</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('welcome') }}#kontak">Kontak</a></li>
                        <li class="nav-item ms-lg-2">
                            <a class="btn btn-dark rounded-pill px-3" href="{{ route('login') }}">
                                <i class="bi bi-box-arrow-in-right me-1"></i> Masuk
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    {{ $slot }}

    <footer class="site-footer">
        <div class="container">
            <div class="row gy-4">
                <div class="col-sm-6 col-lg-3">
                    <div class="footer-item">
                        <i class="bi bi-geo-alt"></i>
                        <div>
                            <h2>Address</h2>
                            <p>ABE Informatika<br>Jl. Ibrahim Adjie No.3A Tasikmalaya</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="footer-item">
                        <i class="bi bi-telephone"></i>
                        <div>
                            <h2>Kontak Kami</h2>
                            <p><strong>Phone:</strong> 0265-7520857<br><strong>Email:</strong> ridwan@abeinformatika.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="footer-item">
                        <i class="bi bi-clock"></i>
                        <div>
                            <h2>Opening Hours</h2>
                            <p><strong>Mon-Sat: 09AM</strong> - 18PM<br>Sunday: Closed</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <h2 class="footer-follow">Follow Us</h2>
                    <div class="footer-social">
                        <a href="#" aria-label="Twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div>
            <hr>
            <p class="footer-copy mb-0">&copy; Copyright <strong>ABE Informatika</strong>. All Rights Reserved</p>
        </div>
    </footer>
    <a href="#atas" class="scroll-top" aria-label="Kembali ke atas"><i class="bi bi-arrow-up"></i></a>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
