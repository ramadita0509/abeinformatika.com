<x-layout>
    <x-slot name="title">ABE Informatika</x-slot>
    <section class="home">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
</section>
</head>

<body>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center section-bg">
    <div class="container">
      <div class="row justify-content-between gy-5">
        <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
          <h2 data-aos="fade-up">Website Resmi<br>ABE Informatika</h2>
          <p data-aos="fade-up" data-aos-delay="100">ABE Informatika merupakan partner resmi Service Center ASUS, Lenovo, Zyrex, Brother, dan Avita</p>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="{{route('site.profil')}}" class="btn-book-a-table">Profil</a>
          </div>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
          <img src="assets/img/hero-img.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300">
        </div>
      </div>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>About Us</h2>
          <p>Tentang <span>ABE Informatika</span></p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-7 position-relative about-img" style="background-image: url(assets/img/about.jpg) ;" data-aos="fade-up" data-aos-delay="150">
            <div class=>
            </div>
          </div>
          <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
            <div class="content ps-0 ps-lg-5">
              <p class="fst-italic">
                CV .ABE INFORMATIKA adalah Penyedia Layanan Jasa AUTHORIZED SERVICE PARTNER untuk produk ASUS, Lenovo, AVITA, ZYREX, dan BROTHER
              </p>
              <p>
                Mengingat umur perusahaan kami yang memamg terbilang masih muda dan belum terlalu lama berdiri, berikut project-project yang masih kami kerjakan :
              </p>
              <ul>
                <li><i class="bi bi-check2-all"></i>AUTHORIZED SERVICE PARTNER Untuk produk ASUS mulai tahun 2015 sd Saat ini.</li>
                <li><i class="bi bi-check2-all"></i> AUTHORIZED SERVICE PARTNER Untuk produk BROTHER mulai tahun 2016 sd Saat ini.</li>
                <li><i class="bi bi-check2-all"></i>AUTHORIZED SERVICE PARTNER Untuk produk ZYREX mulai tahun 2018 sd Saat ini.</li>
                <li><i class="bi bi-check2-all"></i>AUTHORIZED SERVICE PARTNER Untuk produk AVITA mulai tahun 2019 sd Saat ini  .</li>
              </ul>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Profil</h2>
            <p>Profil <span>ABE Informatika</span></p>
          </div>
        <div class="row gy-4">
              <div class="col-lg-12 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
                <div class="content ps-0 ps-lg-5">
                  <p >
                    CV.ABE INFORMATIKA merupakan perusahaan penyedia layanan jasa IT SOLUTION, yang
                    terbentuk sejak tahun 2015 serta diresmikan dengan Akta Notaris No.12 Tanggal 12 September 2015
                    ( Mohamad Hikmat, SH )
                  </p>
                  <a class="fst-italic" href="{{route('site.profil')}}">Selengkapnya... </a>
                </div>
              </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Lokasi Kami</h2>
          <p>Lokasi dan <span> kontak </span></p>
        </div>

        <div class="mb-3">
          <iframe style="border:0; width: 100%; height: 350px;" src="https://maps.google.com/maps?q=ASUS%20Tasikmalaya&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" allowfullscreen></iframe>
        </div>
        <!-- End Google Maps  -->

        <div class="row gy-4">

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-map flex-shrink-0"></i>
              <div>
                <h3>Our Address</h3>
                <p>Jl.Ibrahim Adjie No.3A Tasikmalaya</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center">
              <i class="icon bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email</h3>
                <p>ridwan@abeinformatika.com</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Phone</h3>
                <p>0265-7520857</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-share flex-shrink-0"></i>
              <div>
                <h3>Opening Hours</h3>
                <div><strong>Mon-Sat:</strong> 09AM - 18PM;
                  <strong>Sunday:</strong> Closed
                </div>
              </div>
            </div>
          </div><!-- End Info Item -->
      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
</x-layout>