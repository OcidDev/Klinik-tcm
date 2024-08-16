<?php
$klinikkk = 'Antah';
$mappp = 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2552.7933967249073!2d117.22912786566681!3d-0.8342596379442541!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcd748a34b972a55b!2sKlinik%20Maju%20Sejahtera!5e1!3m2!1sid!2sid!4v1664207204197!5m2!1sid!2sid';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Klinik INTI SEHAT TCM</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"
        integrity="sha512-tVYBzEItJit9HXaWTPo8vveXlkK62LbA+wez9IgzjTmFNLMBO1BEYladBw2wnM3YURZSMUyhayPCoLtjGh84NQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles-index.css" rel="stylesheet" />
    <link href="{{ asset('img/logo.png') }}" rel="SHORTCUT ICON" />
</head>



<body id="page-top" onload="initClock()">

    <!------------------------------ loading loading spinner ------------------------------>
    <div class="spinner-wrapper text-light">
        <div class="spinner-border" role="status">
        </div>
    </div>

    <style>
        .spinner-wrapper {
            background-color: #1C5E20!important;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: all 0.2s;
        }

        .spinner-border {
            height: 66px;
            width: 66px;
        }

        .sticky-button {
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            right: 20px;
            bottom: 76px;
            width: 45px;
            height: 45px;
            background-color: #fefefe;
            border-radius: 50%;
            box-shadow: 1px 1px 5px 5px #4CAF50;
        }

        .sticky-button a,
        .sticky-button label {
            display: flex;
            align-items: center;
            width: 55px;
            height: 55px;
            -webkit-transition: all .3s ease-out;
            transition: all .3s ease-out;
        }

        .sticky-button a svg,
        .sticky-button label svg {
            margin: auto;
            fill: #4dc247
        }

        .sticky-button label svg.svg-2 {
            display: none
        }

        .sticky-chat {
            position: fixed;
            bottom: 70px;
            right: 20px;
            width: 70%;
            -webkit-transition: all .3s ease-out;
            transition: all .3s ease-out;
            z-index: 21;
            opacity: 0;
            visibility: hidden;
            line-height: normal
        }

        .sticky-chat .chat-content {
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, .05);
            overflow: hidden
        }

        .sticky-chat .chat-header {
            position: relative;
            display: flex;
            align-items: center;
            padding: 15px 20px;
            background-color: #4CAF50;
            overflow: hidden
        }

        .sticky-chat .chat-header:after {
            content: '';
            display: block;
            position: absolute;
            bottom: 0;
            right: 0;
            width: 70px;
            height: 65px;
            background: rgba(0, 0, 0, .000);
            border-radius: 70px 0 5px 0;
        }

        .sticky-chat .chat-header svg {
            width: 35px;
            height: 35px;
            flex: 0 0 auto;
            fill: var(--warna-icon)
        }

        .sticky-chat .chat-header .title {
            padding-left: 15px;
            font-size: 14px;
            font-weight: 600;
            font-family: 'Roboto', sans-serif;
            color: var(--warna-icon)
        }

        .sticky-chat .chat-header .title span {
            font-size: 11px;
            font-weight: 400;
            display: block;
            line-height: 1.58em;
            margin: 0;
        }

        .sticky-chat .chat-text {
            display: flex;
            flex-wrap: wrap;
            margin: 25px 20px;
            font-size: 12px;
            color: var(--warna-text)
        }

        .sticky-chat .chat-text span {
            display: inline-block;
            margin-right: auto;
            padding: 10px 10px 10px 20px;
            background-color: var(--warna-bg-chat);
            border-radius: 3px 15px 15px
        }

        .sticky-chat .chat-text span:after {
            display: inline-block;
            position: relative;
            bottom: -5px;
            left: -4px;
            margin-left: 2px;
            font-size: 9px;
            color: var(--warna-text-alt)
        }

        .sticky-chat .chat-text span.typing {
            margin: 15px 0 0 auto;
            padding: 10px 20px 10px 10px;
            border-radius: 15px 3px 15px 15px
        }

        .sticky-chat .chat-text span.typing:after,
        .chat-menu {
            display: none
        }

        .sticky-chat .chat-text span.typing svg {
            height: 14px;
            fill: var(--warna-text-alt)
        }

        .sticky-chat .chat-button {
            display: flex;
            align-items: center;
            margin-top: 15px;
            padding: 12px 20px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, .05);
            overflow: hidden;
            font-size: 12px;
            color: var(--warna-text)
        }

        .sticky-chat .chat-button svg {
            width: 20px;
            height: 20px;
            fill: var(--warna-text-alt);
            margin-left: auto;
            transform: rotate(40deg);
            -webkit-transform: rotate(40deg)
        }

        .chat-menu:checked+.sticky-button label {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }

        .chat-menu:checked+.sticky-button label svg.svg-1 {
            display: none
        }

        .chat-menu:checked+.sticky-button label svg.svg-2 {
            display: table-cell
        }

        .chat-menu:checked+.sticky-button+.sticky-chat {
            bottom: 77px;
            right: 81px;
            opacity: 1;
            visibility: visible;
        }

        .schat {
            outline: none;
            position: absolute;
            bottom: 12px;
            left: 15px;
            border: none;
            color: #4CAF50;
            font-weight: bold;
        }

        .blink_me {
            animation: blinker 1.3s linear infinite;
            text-align: center;
        }

        @keyframes blinker {
            50% {
                opacity: 0;
            }
        }

        .bg-image{
            background-image: url("{{ asset('img/foto1.png') }}");
            background-size: cover;
        }

        .video-container {
            position: relative;
            width: 100%;
            max-width: 300px; /* Menentukan maksimum lebar video */
            margin: 0 auto; /* Pusatkan video */
        }

        .video-container video {
            width: 100%;
            height: auto;
            display: block;
        }
    </style>
    <script>
        const spinnerWrapperEl = document.querySelector('.spinner-wrapper');
        window.addEventListener('load', () => {
            spinnerWrapperEl.style.opacity = '0';
            setTimeout(() => {
                spinnerWrapperEl.style.display = 'none';
            }, 200);
        })
    </script>
    <!------------------------------ loading loading spinner ------------------------------>

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top" style="display: flex; align-items: center;">
                <img src="{{ asset('img/logo.png') }}" style="float:left; width:55px; height:55px; margin-right: 10px;" alt="Logo" />
                    <span>KLINIK TCM</span>
            </a>
            <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <!--------------------------------------------------------Jam Navbar----------------------------------------------------------------------------------->
            <a href="#" class="nav-link disabled">
                <!--digital clock start-->
                <div class="datetime">
                    <div class="date">
                        <span id="dayname">Day</span>,
                        <span id="month">Month</span>
                        <span id="daynum">00</span>,
                        <span id="year">Year</span>
                    </div>
                    <div class="time">
                        <span id="hour">00</span>:
                        <span id="minutes">00</span>:
                        <span id="seconds">00</span>
                        <span id="period">AM</span>
                    </div>
                </div>
                <!--digital clock end-->
            </a>

            <!--------------------------------------------------------NAVBAR----------------------------------------------------------------------------------->
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="#portfolio">Tentang
                            kami</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="#about">Pendaftaran</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="#contact">Alamat</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!--------------------------------------------------------Bagian Isi Konten Teratas----------------------------------------------------------------------------------->

Salin kode
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marquee Effect</title>
    <style>
        .marquee {
            width: 100%;
            overflow: hidden;
            white-space: nowrap;
            box-sizing: border-box;
        }

        .marquee h1 {
            display: inline-block;
            padding-left: 20%; /* Kurangi padding untuk mengurangi jeda */
            animation: marquee 15s linear infinite; /* Sesuaikan durasi animasi */
        }

        @keyframes marquee {
            from { transform: translateX(100%); }
            to { transform: translateX(-100%); }
        }
    </style>
    <!-- Tambahkan link Font Awesome jika belum ditambahkan -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMYeUjENaC8/PjhLpXXZ5FItI3h7dfT6Kh+FhW5" crossorigin="anonymous">
</head>
<body>
    <header class="masthead bg-primary text-white text-center bg-image">
        <div class="container d-flex align-items-center flex-column">
            <!-- Masthead Heading-->
            <div class="masthead-heading text-uppercase mb-0">
                <h1>SELAMAT DATANG DI</h1>
                <h1>RUMAH SEHAT HERBAL INTI SEHAT TCM</h1>
            </div>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-hospital"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Masthead Subheading-->
            <p class="masthead-subheading font-weight-light mb-0">
                <h1>Buka :</h1>
                <div class="marquee">
                    <H1>Praktek Setiap hari Pukul 08.00 - 20.00 WITA</H1>
                </div>
            </p>
        </div>
    </header>
</body>
</html>

    <!--------------------------------------------------------Bagian Isi Konten----------------------------------------------------------------------------------->
    <section class="page-section portfolio" id="portfolio">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Tentang Kami</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-camera"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Portfolio Grid Items-->
            <div class="row justify-content-center">
                <!-- Portfolio Item 1-->
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal1">
                        <div
                            class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="portfolio-item-caption-content text-center text-white"><i
                                    class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="img/dalam2.jpg" alt="..." />
                    </div>
                </div>
                <!-- Portfolio Item 2-->
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal2">
                        <div
                            class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="portfolio-item-caption-content text-center text-white"><i
                                    class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="img/foto1.png" alt="..." />
                    </div>
                </div>
                <!-- Portfolio Item 3-->
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal3">
                        <div
                            class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="portfolio-item-caption-content text-center text-white"><i
                                    class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="img/dalam3.jpeg" alt="..." />
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!-- About Section-->

    <section class="page-section bg-primary text-white mb-0" id="about">
        <div class="container">
            <!--------------------------------------------------------Bagian Tombol Login dan daftar----------------------------------------------------------------------------------->
            <h2 class="page-section-heading text-center text-uppercase text-white">Pendaftaran</h2>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-pencil"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!--------------------------------------------------------Daftar sebagai Pasien----------------------------------------------------------------------------------->
            <div class="row">
                <div class="col-lg-4 ms-auto">
                    <button class="btn btn-xl btn-outline-light" data-bs-toggle="modal"
                        data-bs-target="#daftarPasien">
                        <i class="fas fa-book me-2"></i>
                        Daftar Sebagai Pasien
                    </button>

                </div>
                <div class="col-lg-4 me-auto">
                    <p class="lead">Anda bisa mendaftar secara online tanpa perlu mengantri atau
                        langsung datang keKlinik <a class="btn btn-outline-light" href="/antrian-pasien">
                            <i class="fas fa-users me-2"></i>
                            Cek Antrian disini
                        </a></p>
                </div>
            </div>
            <!--------------------------------------------------------Login Sebagai Staff Klinik----------------------------------------------------------------------------------->
            <div class="text-center mt-4">
                <a class="btn btn-xl btn-outline-light" href="/dashboard">
                    <i class="fas fa-user me-2"></i>
                    Masuk Sebagai Staff
                </a>
            </div>
        </div>
        <!--------------------------------------------------------Daftar Akun Staff----------------------------------------------------------------------------------->
        <div class="text-center mt-4">
            <a class="btn btn-xl btn-outline-light" href="/register">
                <i class="fas fa-user me-2"></i>
                Daftar Akun Staff
            </a>
        </div>
        </div>
    </section>
    <!--------------------------------------------------------Kontak Klinik----------------------------------------------------------------------------------->
    <section class="page-section" id="contact">
        <div class="container">
            <!-- Contact Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">ALAMAT</h2>
            <!-- Icon Divider-->

            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-map"></i></div>
                <div class="divider-custom-line"></div>
            </div>


            <div class="google-map"><iframe frameborder="0" style="border:0" width="100%" height="250"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7890.096360949573!2d116.09880058414731!3d-8.59136635731658!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x693f1c4ec33d8ef9%3A0xd318ea2d7a6d22a0!2sRumah%20Sehat%20Herbal%20Inti%20Sehat%20TCM!5e0!3m2!1sid!2sid!4v1720352855741!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>


            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-map"></i></div>
                <div class="divider-custom-line"></div>
            </div>
        </div>
    </section>
    <!--------------------------------------------------------Footer----------------------------------------------------------------------------------->
    <footer class="footer text-center">
        <div class="container">
            <div class="row">
                <!-- Footer Location-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Lokasi</h4>
                    <p class="lead mb-0">
                        Jl. Kudus No. 36 RT.05 Tanah Haji Permai, Lingkungan Punia Saba, Kelurahan Punia
                        <br />
                        Kecamatan Mataram, Kota Mataram, Provinsi NTB.
                    </p>
                </div>
                <!-- Footer Social Icons-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Media Social</h4>
                        <a class="btn btn-outline-light btn-social mx-1" href="https://www.facebook.com/profile.php?id=61558812080309">
                            <i class="fab fa-fw fa-facebook-f"></i>
                        </a>
                        <a class="btn btn-outline-light btn-social mx-1" href="https://www.instagram.com/rumahsehatherbaltcm?igsh=MWRpOWFzYjB1ODc2aA==">
                            <i class="fab fa-fw fa-instagram"></i>
                        </a>
                        <a class="btn btn-outline-light btn-social mx-1" href="https://www.tiktok.com/@rumahsehatintitcm?_t=8np2FkpU2W8&_r=1">
                            <i class="fab fa-fw fa-tiktok"></i>
                        </a>
                        <a class="btn btn-outline-light btn-social mx-1" href="https://wa.me/6287823319466">
                            <i class="fab fa-fw fa-whatsapp"></i>
                        </a>
                        <a class="btn btn-outline-light btn-social mx-1" href="tel:+6285142998875">
                            <i class="fa fa-phone"></i>
                        </a>
                </div>
                <!-- Footer About Text-->
                <div class="col-lg-4">
                    <h4 class="text-uppercase mb-4">Tentang Klinik</h4>
                    <p class="lead mb-0">
                        RUMAH SEHAT HERBAL INTI SEHAT TCM adalah sebuah klinik herbal yang dibangun sejak tahun 2010 yang berada di kecamatan Sawang,
                        Provinsi Aceh, Kabupaten Aceh Utara.
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!--------------------------------------------------------copyright----------------------------------------------------------------------------------->
    <div class="copyright py-4 text-center text-white">
        <div class="copyright">
            &copy; {{ date('Y') }} | Rumah Sehat Herbal Inti Sehat TCM. All rights reserved.
        </div>
        <div class="back-to-top">
            <a href="#" id="back-to-top">
                <img src="{{ asset('img/top.png') }}" alt="Back to Top Icon">
            </a>
        </div>
    </div>

    <script>
    document.getElementById('back-to-top').addEventListener('click', function(event) {
        event.preventDefault();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
</script>
    <!-- Portfolio Modals-->

    <!-- Portfolio Modal 2-->
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" aria-labelledby="portfolioModal2"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center pb-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- Portfolio Modal - Title-->
                                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Ruang Praktek
                                </h2>
                                <!-- Icon Divider-->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- Portfolio Modal - Image-->
                                 <!-- Video Container-->
                                <div class="video-container mb-5">
                                    <video controls autoplay loop muted class="img-fluid rounded">
                                        <source src="img/terapi.mp4" type="video/mp4">
                                    </video>
                                </div>
                                <!-- Portfolio Modal - Text-->
                                <p class="mb-4">Ruangan Praktek</p>
                                <button class="btn btn-primary" data-bs-dismiss="modal">
                                    <i class="fas fa-xmark fa-fw"></i>
                                    Keluar Tampilan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio Modal 3-->
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" aria-labelledby="portfolioModal3"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center pb-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- Portfolio Modal - Title-->
                                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Halaman Parkiran
                                </h2>
                                <!-- Icon Divider-->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- Portfolio Modal - Image-->
                                <img class="img-fluid rounded mb-5" src="img/dalam3.jpeg" alt="..." />
                                <!-- Portfolio Modal - Text-->
                                <p class="mb-4">Rumah Sehat Herbal Inti Sehat TCM</p>
                                <button class="btn btn-primary" data-bs-dismiss="modal">
                                    <i class="fas fa-xmark fa-fw"></i>
                                    Keluar Tampilan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio Modal 4-->
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" aria-labelledby="portfolioModal4"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center pb-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- Portfolio Modal - Title-->
                                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Aktifitas
                                    Pendaftaran</h2>
                                <!-- Icon Divider-->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- Portfolio Modal - Image-->
                                <img class="img-fluid rounded mb-5" src="img/dalam2.jpg" alt="..." />
                                <!-- Portfolio Modal - Text-->
                                <p class="mb-4">======</p>
                                <button class="btn btn-primary" data-bs-dismiss="modal">
                                    <i class="fas fa-xmark fa-fw"></i>
                                    Close Window
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio Modal 5-->
    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" aria-labelledby="portfolioModal5"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center pb-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- Portfolio Modal - Title-->
                                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Halaman Parkiran 2
                                </h2>
                                <!-- Icon Divider-->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- Portfolio Modal - Image-->
                                <img class="img-fluid rounded mb-5" src="img/luar3.jpg" alt="..." />
                                <!-- Portfolio Modal - Text-->
                                <p class="mb-4">======</p>
                                <button class="btn btn-primary" data-bs-dismiss="modal">
                                    <i class="fas fa-xmark fa-fw"></i>
                                    Close Window
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Daftar Pasien Modalllllllllllll -->
    <!-- Daftar Pasien Modal -->
    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
        id="daftarPasien" tabindex="-1" aria-labelledby="daftarPasienLabel" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg relative w-auto pointer-events-none" role="document">
            <div
                class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div
                    class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                    <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalLgLabel">
                        Daftar Sebagai Pasien
                    </h5>
                    <button type="button"
                        class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('pasien.store') }}" method="post">
                    @csrf
                    <input type="hidden" value="1" name="daftarPasien">
                    <div class="modal-body relative p-4">
                        <a href="pasien-lama">
                            <img src="{{ asset('img/tombol-pasienlama.png') }}" style=”float:left;
                                width="355";height="255" /></a>

                        <a href="#">
                            <img src="{{ asset('img/tombol-pasienbaru.png') }}" style=”float:left;
                                width="255";height="155" data-bs-toggle="modal"
                                data-bs-target="#daftarPasienbaru" /></a>
                        {{-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#daftarPasienbaru">Pasien Baru?</button> --}}
                    </div>
                    <div class="modal-footer">

                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Antrian -->
    <!-- Daftar Pasien Modalllllllllllll -->

    <!-- Modal -->
    <div class="modal fade" id="daftarPasienbaru" tabindex="-1" role="dialog"
        aria-labelledby="daftarPasienbaruLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="col-sm-5 col-form-label"><a href="pasien-lama" type="button"
                            class="btn btn-warning">Pasien Lama klik disini</a></label>

                </div>
                <div class="modal-body">
                    <form action="{{ route('pasien.store') }}" method="post">
                        @csrf
                        <input type="hidden" value="1" name="daftarPasien">

                        <!--------------------------------------------------------pasien lama----------------------------------------------------------------------------------->
                        <div class="form-group row">

                            <div class="col-sm">
                            </div>
                        </div>
                        <hr class="sidebar-divider d-none d-md-block">
                        <h4>Pasien Baru, Lengkapi data dibawah ini</h4>
                        <h6 style="color:RED;">*Semua Form WAJIB diisi, mohon periksa data anda dengan benar</h6>
                        <!--------------------------------------------------------Nama----------------------------------------------------------------------------------->
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Warna Brosur</label>
                            <div class="col-sm">
                                @php
                                    $warna = [
                                        'Ungu',
                                        'Biru',
                                        'Hitam',
                                        'Oren',
                                        'Hijau',
                                        'Pelangi',
                                        'Cokelat',
                                        'Ungu',
                                        'Merah',
                                    ]
                                @endphp
                                <select name="warna_brosur" class="form-control " required
                                    oninvalid="this.setCustomValidity('Warna Brosur tidak boleh kosong')"
                                    oninput="setCustomValidity('')">

                                    <option selected value="">pilih...</option>
                                    @foreach ($warna as $war)
                                    <option value="{{ $war }}">{{ $war }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm">
                                <input type="text" class="form-control" name="Nama" placeholder="Nama"
                                    required oninvalid="this.setCustomValidity('nama tidak boleh kosong')"
                                    oninput="setCustomValidity('')">
                            </div>
                        </div>
                        <!--------------------------------------------------------Alamat----------------------------------------------------------------------------------->
                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm">
                                <input type="text" class="form-control" name="Alamat" placeholder="Alamat"
                                    required oninvalid="this.setCustomValidity('alamat masih kosong')"
                                    oninput="setCustomValidity('')">
                            </div>
                        </div>

                        <script>
                            selDate = (e) => {
                                this.setState({
                                    date1: e.target.value
                                })
                            }
                            render()
                            disableDates = () => {
                                var today, , mm, yyyy;
                                today = new Date();
                                dd = today.getDate() + 1;
                                mm = today.getMonth() + 1;
                                yyyy = today.getFullYear();
                                return mm + "-" + dd + "-" + yyyy;
                            }
                        </script>

                        <!--------------------------------------------------------Lahir----------------------------------------------------------------------------------->
                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label">Lahir</label>
                            <div class="col-sm">
                                <input type="date" class="form-control" min={this.disableDates()}
                                    onchange={this.selDate} name="Lahir" placeholder="Lahir" required
                                    oninvalid="this.setCustomValidity('tanggal lahir tidak boleh kosong')"
                                    oninput="setCustomValidity('')">
                            </div>
                        </div>


                        <!--------------------------------------------------------NIK----------------------------------------------------------------------------------->
                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label">NIK</label>
                            <div class="col-sm">
                                <input type="tel" class="form-control" id="nonik" name="NIK"
                                    placeholder="NIK" required min="0" minlength="16" maxlength="16"
                                    oninvalid="this.setCustomValidity('Nomer induk harus berupa Angka')"
                                    oninput="setCustomValidity('16 digit')">
                            </div>
                        </div>


                        <!--------------------------------------------------------Kelamin----------------------------------------------------------------------------------->

                        <div class="form-group row mt-2">
                            <label class="col-form-label col-sm-2 pt-0">Jenis Kelamin</label>
                            <div class="col-sm">
                                <select name="Kelamin" class="form-control " required
                                    oninvalid="this.setCustomValidity('jenis kelamin tidak boleh kosong')"
                                    oninput="setCustomValidity('')">

                                    <option selected value="">pilih...</option>
                                    <option value="laki-laki">Laki-laki
                                    </option>
                                    <option value="perempuan">Perempuan
                                    </option>
                                </select>
                            </div>
                        </div>

                        <!--------------------------------------------------------Telepon----------------------------------------------------------------------------------->
                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label">Telepon</label>
                            <div class="col-sm">
                                <input type="tel" class="form-control" id="notelp" name="Telepon"
                                    placeholder="Nomer Telepon (aktif)" minlength="4" maxlength="13"
                                    oninvalid="this.setCustomValidity('nomer telepon harus berupa Angka')"
                                    oninput="setCustomValidity('')" required>
                            </div>
                        </div>


                        <!--------------------------------------------------------Agama----------------------------------------------------------------------------------->

                        <div class="form group row mt-2">
                            <label class="col-form-label col-sm-2 pt-0">Agama</label>
                            <div class="col-sm">
                                <select name="Agama" class="form-control" required
                                    oninvalid="this.setCustomValidity('agama tidak boleh kosong')"
                                    oninput="setCustomValidity('')">
                                    <option selected value="">-</option>
                                    <option value="islam">Islam</option>
                                    <option value="protestan">Kristen
                                        Protestan
                                    </option>
                                    <option value="katolik">Kristen Katolik
                                    </option>
                                    <option value="hindu">Hindu</option>
                                    <option value="buddha">Buddha</option>
                                    <option value="konghucu">Konghucu
                                    </option>
                                </select>
                            </div>
                        </div>
                        <!--------------------------------------------------------Pendidikan----------------------------------------------------------------------------------->
                        <div class="form-group row mt-2">
                            <label class="col-form-label col-sm-2 pt-0">Pendidikan</label>
                            <div class="col-sm">
                                <select name="Pendidikan" class="form-control ">
                                    <option value="-">-</option>
                                    <option value="sltp/sd-smp">SLTP / SD-SMP</option>
                                    <option value="slta/sma">SLTA / SMA</option>
                                    <option value="sarjana">Sarjana</option>
                                </select>
                            </div>
                        </div>

                        <!--------------------------------------------------------Pekerjaan----------------------------------------------------------------------------------- -->
                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label">Pekerjaan</label>
                            <div class="col-sm">
                                <input type="text" class="form-control" name="Pekerjaan"
                                    placeholder="Isi '-' jika belum/tidak bekerja" required
                                    oninvalid="this.setCustomValidity('Isi  -  jika belum/tidak bekerja')"
                                    oninput="setCustomValidity('')">
                            </div>
                        </div>

                        <br>
                        <br>
                        <hr class="sidebar-divider d-none d-md-block">
                        <!--------------------------------------------------------pilih layanan----------------------------------------------------------------------------------- -->
                        <input type="hidden" value="Umum" name="layanan">
                        {{-- <div class="form-group row mt-2">
                            <label class="col-form-label col-sm-2 pt-0">Layanan</label>
                            <div class="col-sm">
                                <select name="layanan" class="form-control " required
                                    oninvalid="this.setCustomValidity('pilih layanan dahulu')"
                                    oninput="setCustomValidity('')">
                                    <option value="">pilih layanan...</option>
                                    <option value="Umum">Umum</option>
                                    <option value="Asuransi">Asuransi</option>
                                </select>
                            </div>
                        </div> --}}
                        <!--------------------------------------------------------rekam medis----------------------------------------------------------------------------------- -->
                        <div class="form-group row mt-2">
                            <label class="col-sm-2 col-form-label">Keluhan</label>
                            <div class="col-sm">
                                {{-- <input type="text" class="form-control" name="RekamMedis"
                        placeholder="Anda sakit apa, dan sudah berapa lama?"> --}}
                                <textarea type="text" name="RekamMedis" class="form-control" cols="30" rows="5"
                                    placeholder="Jelaskan keluhan anda, dan sudah berapa lama?" required
                                    oninvalid="this.setCustomValidity('jelaskan dahulu...')" oninput="setCustomValidity('')"></textarea>
                            </div>
                        </div>

                        <!--------------------------------------------------------pilih dokter----------------------------------------------------------------------------------- -->
                        <div class="form-group row mt-2">
                            <label class="col-form-label col-sm-2 pt-0">Dokter</label>
                            <div class="col-sm">
                                <select name="doktor" class="form-control " required
                                    oninvalid="this.setCustomValidity('Silahkan pilih dokter yang tersedia')"
                                    oninput="setCustomValidity('')">
                                    <option value="">pilih dokter...</option>
                                    @foreach ($dokter as $row)
                                        <option {{ $row->jadwal->jadwalpraktek == 'LIBUR' ? 'disabled' : '' }}
                                            {{ $row->jadwal->jadwalpraktek == 'CUTI' ? 'disabled' : '' }}
                                            value="{{ $row->id }}">
                                            {{ $row->nama }}({{ $row->poli == '' ? '-' : $row->poli->name }}) |
                                            {{ $row->jadwal == '' ? 'Belum ada Jadwal' : $row->jadwal->jadwalpraktek }}

                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!--------------------------------------------------------pilih dokter----------------------------------------------------------------------------------- -->
                        <div class="mt-2 d-flex justify-content-center" required>
                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display() !!}
                        </div>
                </div>
                <div class="modal-footer">
                    <input type="checkbox" id="check" onclick="enable()">
                    <label style="color:RED;"> Data yang diisi Benar</label><br>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <button id="btn" disabled="True" type="submit" class="btn btn-primary">Daftar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Daftar Pasien Modal -->

    <!-- Antrian -->


    <!--------------------------------------------------------modal kartu antrian----------------------------------------------------------------------------------->
    <div class="modal fade" id="antrian" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="antrianLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div id="kartuantrian">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">
                            <img src="{{ asset('img/logo.png') }}" style=”float:left; width="55";height="55"
                                ” />Klinik INTI SEHAT TCM
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="h3">Nomor Antrian : <span
                                class="text-primary">{{ Session::has('nomorAntrian') ? Session::get('nomorAntrian') : '' }}</span>
                        </p>
                        <p class="h3">Atas Nama : <span
                                class="text-primary">{{ Session::has('nama') ? Session::get('nama') : '' }}</span></p>
                        <p>Daftar pada jam : <span
                                class="text-primary">{{ Session::has('timestamps') ? Session::get('timestamps') : '' }}</span>
                        </p>

                        <!-- estimasi tunggu jam -->
                        <p>Mohon Tunggu Jam : <span
                                class="h3 text-primary">{{ Session::has('jadwalkedatangan') ? Session::get('jadwalkedatangan') : '' }}</span>
                        </p>


                    </div>
                    <div class="modal-footer">
                        <p>Tanggal : <span
                                class="text-primary">{{ Session::has('tanggaldaftar') ? Session::get('tanggaldaftar') : '' }}</span>
                        </p>

                        <a type="button" class="btn btn-secondary" href="/antrian-pasien">
                            <i class="fas fa-users me-2"></i>
                            Cek Antrian
                        </a>
                        <button type="button" class="btn btn-primary" id="download">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--------------------------------------------------------modal error----------------------------------------------------------------------------------->
    <div class="modal fade" id="error" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="antrianLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div id="kartuantrian">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">
                            <img src="{{ asset('img/logo.png') }}" style=”float:left; width="55";height="55"
                                ” />Klinik INTI SEHAT TCM
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @foreach ($errors->all() as $item)
                            <div class="alert alert-danger" role="alert">
                                {{ $item }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <input class='chat-menu hidden' id='offchat-menu' type='checkbox' />
    <div class='sticky-button blink_me' id='sticky-button'>
        <label for='offchat-menu'>
            <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" fill="currentColor"
                class="bi bi-whatsapp" viewBox="0 0 16 16">
                <path
                    d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
            </svg>
        </label>
    </div>
    <div class='sticky-chat'>
        <div class='chat-content'>
            <div class='chat-header'>
                <svg viewbox='0 0 32 32'>
                    <path
                        d='M24,22a1,1,0,0,1-.64-.23L18.84,18H17A8,8,0,0,1,17,2h6a8,8,0,0,1,2,15.74V21a1,1,0,0,1-.58.91A1,1,0,0,1,24,22ZM17,4a6,6,0,0,0,0,12h2.2a1,1,0,0,1,.64.23L23,18.86V16.92a1,1,0,0,1,.86-1A6,6,0,0,0,23,4Z' />
                    <rect height='2' width='2' x='19' y='9' />
                    <rect height='2' width='2' x='14' y='9' />
                    <rect height='2' width='2' x='24' y='9' />
                    <path
                        d='M8,30a1,1,0,0,1-.42-.09A1,1,0,0,1,7,29V25.74a8,8,0,0,1-1.28-15,1,1,0,1,1,.82,1.82,6,6,0,0,0,1.6,11.4,1,1,0,0,1,.86,1v1.94l3.16-2.63A1,1,0,0,1,12.8,24H15a5.94,5.94,0,0,0,4.29-1.82,1,1,0,0,1,1.44,1.4A8,8,0,0,1,15,26H13.16L8.64,29.77A1,1,0,0,1,8,30Z' />
                </svg>
                <div class='title'> Konsultasi <span> Apa yang sedang kamu alami? </span></div>
            </div>
            <div class='chat-text'>
                <span>Halo, ada yang bisa kami bantu?</span>
                <span class='typing'>
                    <svg viewbox='0 0 512 512'>
                        <circle cx='256' cy='256' r='48' />
                        <circle cx='416' cy='256' r='48' />
                        <circle cx='96' cy='256' r='48' />
                    </svg>
                </span>
            </div>
        </div>
        <span><input class="schat" type="text" placeholder="Memulai Pesan... " autofocus></span>
        <a class='chat-button' href='https://api.whatsapp.com/send/?phone=6287823319466' rel='nofollow noreferrer'
            target='_blank'>
            <svg viewBox='0 0 32 32' style="fill:#4CAF50">
                <path class='cls-1'
                    d='M19.47,31a2,2,0,0,1-1.8-1.09l-4-7.57a1,1,0,0,1,1.77-.93l4,7.57L29,3.06,3,12.49l9.8,5.26,8.32-8.32a1,1,0,0,1,1.42,1.42l-8.85,8.84a1,1,0,0,1-1.17.18L2.09,14.33a2,2,0,0,1,.25-3.72L28.25,1.13a2,2,0,0,1,2.62,2.62L21.39,29.66A2,2,0,0,1,19.61,31Z' />
            </svg>
        </a>
    </div>

    <!--------------------------------------------------------Bootstrap JS----------------------------------------------------------------------------------->
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <!--------------------------------------------------------modal antrian----------------------------------------------------------------------------------->
    @if ($errors->any())
        <script>
            $(document).ready(function() {
                $('#error').modal('show')
            });
        </script>
    @endif

    <!-- Fungsi checklist / checkbox daftar -->
    <script>
        function enable() {
            var check = document.getElementById("check");
            var btn = document.getElementById("btn");
            if (check.checked) {
                btn.removeAttribute("disabled");
            } else {
                btn.disabled = "true";
            }
        }
    </script>

    <script>
        @if (Session::has('nomorAntrian'))
            $(document).ready(function() {
                $('#antrian').modal('show')
            });
        @endif
    </script>
    <!--------------------------------------------------------fungsi inputan angka/number only----------------------------------------------------------------------------------->
    <script>
        function setInputFilter(textbox, inputFilter, errMsg) {
            ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop", "focusout"].forEach(
                function(event) {
                    textbox.addEventListener(event, function(e) {
                        if (inputFilter(this.value)) {
                            // Accepted value
                            if (["keydown", "mousedown", "focusout"].indexOf(e.type) >= 0) {
                                this.classList.remove("input-error");
                                this.setCustomValidity("");
                            }
                            this.oldValue = this.value;
                            this.oldSelectionStart = this.selectionStart;
                            this.oldSelectionEnd = this.selectionEnd;
                        } else if (this.hasOwnProperty("oldValue")) {
                            // Rejected value - restore the previous one
                            this.classList.add("input-error");
                            this.setCustomValidity(errMsg);
                            this.reportValidity();
                            this.value = this.oldValue;
                            this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                        } else {
                            // Rejected value - nothing to restore
                            this.value = "";
                        }
                    });
                });
        }

        setInputFilter(document.getElementById("nonik"), function(value) {
            return /^-?\d*$/.test(value);
        }, "Isi dengan Angka");
        setInputFilter(document.getElementById("notelp"), function(value) {
            return /^-?\d*$/.test(value);
        }, "Isi dengan Angka");
    </script>

    <!--------------------------------------------------------fungsi jam----------------------------------------------------------------------------------->
    <script type="text/javascript">
        function updateClock() {
            var now = new Date();
            var dname = now.getDay(),
                mo = now.getMonth(),
                dnum = now.getDate(),
                yr = now.getFullYear(),
                hou = now.getHours(),
                min = now.getMinutes(),
                sec = now.getSeconds(),
                pe = "AM";

            if (hou >= 12) {
                pe = "PM";
            }
            if (hou == 0) {
                hou = 12;
            }
            if (hou > 12) {
                hou = hou - 12;
            }

            Number.prototype.pad = function(digits) {
                for (var n = this.toString(); n.length < digits; n = 0 + n);
                return n;
            }

            var months = ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sep", "Oct", "Nov", "Dec"];
            var week = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
            var ids = ["dayname", "month", "daynum", "year", "hour", "minutes", "seconds", "period"];
            var values = [week[dname], months[mo], dnum.pad(2), yr, hou.pad(2), min.pad(2), sec.pad(2), pe];
            for (var i = 0; i < ids.length; i++)
                document.getElementById(ids[i]).firstChild.nodeValue = values[i];
        }

        function initClock() {
            updateClock();
            window.setInterval("updateClock()", 1);
        }
    </script>

    <!--------------------------------------------------------fungsi download kartu antrian----------------------------------------------------------------------------------->
    <script>
        document.getElementById("download").addEventListener("click", function() {
            const imgName = prompt("Input nama gambar yang akan diunduh: ")
            html2canvas(document.querySelector('#kartuantrian')).then(function(canvas) {

                console.log(canvas);
                saveAs(canvas.toDataURL(), imgName + '.jpg');
            });
        });

        function saveAs(uri, filename) {
            var link = document.createElement('a');
            if (typeof link.download === 'string') {
                link.href = uri;
                link.download = filename;
                //Firefox requires the link to be in the body
                document.body.appendChild(link);
                //simulate click
                link.click();
                //remove the link when done
                document.body.removeChild(link);
            } else {
                window.open(uri);
            }
        }
    </script>
</body>

</html>
