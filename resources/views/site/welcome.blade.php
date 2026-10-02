<x-layout>
    <x-slot name="title">ABE Informatika</x-slot>

    <section class="hero">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-7">
                    <p class="text-uppercase small fw-bold mb-3" style="letter-spacing:.14em;color:#fbbf24;">Authorized Service Partner</p>
                    <h1>Servis resmi yang mudah dilacak.</h1>
                    <p class="lead mt-3">CV. ABE Informatika adalah partner resmi service center ASUS, Lenovo, Zyrex, Brother, dan Avita. Perangkat ditangani teknisi, status servis bisa dipantau, dan nota tetap rapi.</p>
                    <div class="d-flex flex-wrap gap-2 mt-4">
                        <a href="{{ route('site.lacak') }}" class="btn btn-warning rounded-pill px-4">Cek status servis</a>
                        <a href="{{ route('site.profil') }}" class="btn btn-outline-light rounded-pill px-4">Lihat profil</a>
                    </div>
                    <div class="d-flex flex-wrap gap-2 mt-4">
                        <span class="brand-chip"><i class="bi bi-patch-check"></i> ASUS</span>
                        <span class="brand-chip"><i class="bi bi-patch-check"></i> Lenovo</span>
                        <span class="brand-chip"><i class="bi bi-patch-check"></i> Zyrex</span>
                        <span class="brand-chip"><i class="bi bi-patch-check"></i> Brother</span>
                        <span class="brand-chip"><i class="bi bi-patch-check"></i> Avita</span>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="info-card text-dark">
                                <i class="bi bi-laptop"></i>
                                <h2 class="h5 mt-3">Notebook</h2>
                                <p class="mb-0 text-secondary">Perbaikan unit ASUS, Lenovo, Zyrex, dan Avita.</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="info-card text-dark">
                                <i class="bi bi-printer"></i>
                                <h2 class="h5 mt-3">Printer</h2>
                                <p class="mb-0 text-secondary">Layanan resmi produk Brother.</p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="info-card text-dark">
                                <i class="bi bi-clipboard-check"></i>
                                <h2 class="h5 mt-3">Status servis jelas</h2>
                                <p class="mb-0 text-secondary">Penerimaan, pengerjaan, dan laporan tersimpan di satu sistem.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light" id="tentang">
        <div class="container py-4">
            <h2 class="about-title text-center mb-4">Tentang <span>ABE Informatika</span></h2>
            <div class="row g-4 g-lg-5 align-items-center">
                <div class="col-lg-6">
                    <img src="{{ asset('assets/img/partner-authorized.jpg') }}" alt="Authorized service partner untuk ASUS, Avita, dan Zyrex" class="about-photo">
                </div>
                <div class="col-lg-6">
                    <p>CV. ABE Informatika adalah penyedia layanan jasa authorized service partner untuk produk ASUS, Lenovo, Avita, Zyrex, dan Brother.</p>
                    <p>Perusahaan berdiri tahun 2015. Sejak itu kerja sama dengan principle terus berjalan:</p>
                    <ul class="about-list">
                        <li><i class="bi bi-check2"></i>Authorized service partner ASUS sejak 2015.</li>
                        <li><i class="bi bi-check2"></i>Authorized service partner Brother sejak 2016.</li>
                        <li><i class="bi bi-check2"></i>Authorized service partner Zyrex sejak 2018.</li>
                        <li><i class="bi bi-check2"></i>Authorized service partner Avita sejak 2019.</li>
                    </ul>
                    <a class="btn btn-outline-dark rounded-pill mt-2" href="{{ route('site.profil') }}">Baca profil lengkap</a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5" id="layanan">
        <div class="container py-4">
            <p class="section-kicker">Layanan</p>
            <h2 class="mb-4">Perbaikan, penerimaan, dan nota.</h2>
            <div class="row g-3">
                <div class="col-md-4">
                    <article class="service-card">
                        <i class="bi bi-wrench-adjustable"></i>
                        <h3 class="h5 mt-3">Perbaikan perangkat</h3>
                        <p class="text-secondary mb-0">Notebook, handphone, dan printer ditangani sesuai standar principle.</p>
                    </article>
                </div>
                <div class="col-md-4">
                    <article class="service-card">
                        <i class="bi bi-inbox"></i>
                        <h3 class="h5 mt-3">Penerimaan barang</h3>
                        <p class="text-secondary mb-0">Setiap unit dicatat saat masuk, lengkap dengan identitas pelanggan.</p>
                    </article>
                </div>
                <div class="col-md-4">
                    <article class="service-card">
                        <i class="bi bi-receipt"></i>
                        <h3 class="h5 mt-3">Nota dan laporan</h3>
                        <p class="text-secondary mb-0">Invoice dan nota servis.</p>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 partner-band" id="partner">
        <div class="container py-3">
            <p class="section-kicker text-center">Partner kami</p>
            <h2 class="mb-4 text-center">Bekerja sama dengan principle.</h2>
            <div class="partner-slider">
                <button type="button" class="partner-nav" data-dir="-1" aria-label="Partner sebelumnya">
                    <i class="bi bi-chevron-left"></i>
                </button>
                <div class="partner-track" id="partnerTrack">
                    <div class="partner-slide">
                        <div class="partner-logo"><img src="{{ asset('assets/img/partners/asus.png') }}" alt="PT. Asusindo Servistama"></div>
                    </div>
                    <div class="partner-slide">
                        <div class="partner-logo"><img src="{{ asset('assets/img/partners/brother.png') }}" alt="PT. Brother Indonesia"></div>
                    </div>
                    <div class="partner-slide">
                        <div class="partner-logo"><img src="{{ asset('assets/img/partners/it-service.png') }}" alt="PT. IT Service Center"></div>
                    </div>
                    <div class="partner-slide">
                        <div class="partner-logo"><img src="{{ asset('assets/img/partners/tsg.png') }}" alt="PT. Teknika Sarana Gardian"></div>
                    </div>
                    <div class="partner-slide">
                        <div class="partner-logo"><img src="{{ asset('assets/img/partners/datascrip.png') }}" alt="PT. Primalayan Citra Mandiri"></div>
                    </div>
                </div>
                <button type="button" class="partner-nav" data-dir="1" aria-label="Partner berikutnya">
                    <i class="bi bi-chevron-right"></i>
                </button>
            </div>
        </div>
    </section>
    <script>
        (function () {
            var track = document.getElementById('partnerTrack');
            if (!track) return;
            document.querySelectorAll('.partner-nav').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    var slide = track.querySelector('.partner-slide');
                    if (!slide) return;
                    var gap = parseFloat(getComputedStyle(track).columnGap || getComputedStyle(track).gap) || 16;
                    track.scrollBy({ left: Number(btn.dataset.dir) * (slide.getBoundingClientRect().width + gap), behavior: 'smooth' });
                });
            });
        })();
    </script>

    <section class="py-5" id="kontak">
        <div class="container py-3">
            <p class="section-kicker">Lokasi</p>
            <h2 class="mb-4">Datang atau hubungi langsung.</h2>
            <div class="row g-4 align-items-start">
                <div class="col-lg-7">
                    <div class="contact-map rounded-4 overflow-hidden border">
                        <iframe title="Peta ABE Informatika" src="https://maps.google.com/maps?q=ASUS%20Tasikmalaya&t=&z=13&ie=UTF8&iwloc=&output=embed" loading="lazy"></iframe>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="contact-panel">
                        <div class="contact-row">
                            <i class="bi bi-geo-alt"></i>
                            <div>
                                <strong>Alamat</strong>
                                <span>Jl. Ibrahim Adjie No. 3A, Tasikmalaya</span>
                            </div>
                        </div>
                        <div class="contact-row">
                            <i class="bi bi-telephone"></i>
                            <div>
                                <strong>Telepon</strong>
                                <span>0265-7520857</span>
                            </div>
                        </div>
                        <div class="contact-row">
                            <i class="bi bi-envelope"></i>
                            <div>
                                <strong>Email</strong>
                                <span>ridwan@abeinformatika.com</span>
                            </div>
                        </div>
                        <div class="contact-row">
                            <i class="bi bi-clock"></i>
                            <div>
                                <strong>Jam buka</strong>
                                <span>Senin–Sabtu, 09.00–18.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
