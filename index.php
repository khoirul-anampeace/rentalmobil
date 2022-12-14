<?php
session_start();

// Cek user pada session
if (isset($_SESSION["id_customer"])) {
    // $_SESSION["msg"] = "Anda harus login untuk mengakses halaman ini";

    echo "<script>location='customer/index.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merpati Rent Car</title>
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- Navigasi -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container navsmooth">
                <a class="navbar-brand" href="#home">

                    <img src="assets/images/logomerpati.png" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link link-white" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link-white" href="#gallery">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link-white" href="#contact">Contact</a>
                        </li>
                    </ul>
                    <div class="d-flex">
                        <a href="daftar/index.php" class="btn navbutton-white me-3">daftar</a>
                        <a href="login.php" class="btn navbutton-white">login</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <!-- Navigasi -->

    <main>
        <!-- ScrollTOp -->
        <a href="#home">
            <div class="scrolltop" id="scrolltop">
                <i class="fa-solid fa-arrow-up"></i>
            </div>
        </a>
        <!-- ScrollTOp -->

        <section class="" id="home">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <!-- <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div> -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="assets/images/profileImage/img-slide1.jpg" class="d-block" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h1>Layanan 24 Jam</h1>
                            <p>Melayani pertanyaan pelanggan selama 24 jam kerja.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/profileImage/img-slide2.jpg" class="d-block" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h1>Harga bersaing</h5>
                                <p>Harga bersaing jika dibandingkan dengan rental mobil lain.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/profileImage/img-slide3.jpg" class="d-block" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h1>Service Terbaik</h1>
                            <p>Pelayanan selalu mengutamakan kepuasan kepada pelanggan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="content" id="about">
            <div class="container">
                <div class="row g-0 d-flex">
                    <div class="col-md-6 col-sm-12 col-lg-6">
                        <img src="assets/images/profileImage/logo_merpatirent.png" alt="">
                    </div>
                    <div class="col-md-6 col-sm-12 col-lg-6 align-self-center">
                        <div class="title" data-aos="fade-up">
                            <h1>
                                <span>Pelayanan</span> yang lebih mengutamakan kepada <span>Kepuasan</span> Pelanggan
                                adalah prioritas kami
                            </h1>
                            <p>
                                ???Layanan sewa mobil dengan harga bersaing dan selalu mengutamakan kepuasaan pelayanan
                                bagi para pelanggan. Menyewakan berbagai jenis mobil untuk digunakan di dalam kota maupun
                                perjalanan antar kota hingga provinsi dengan pelayanan 24 jam.??? </p>
                            <ul class="list-about">
                                <li>
                                    <a href="">
                                        <i class="fa-solid fa-circle-check"></i>
                                        <p>pelayanan selalu mengutamakan kepuasan pelanggan</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fa-solid fa-circle-check"></i>
                                        <p>melayani pertanyaan pelanggan selama 24 jam kerja </p>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fa-solid fa-circle-check"></i>
                                        <p>harga bersaing dibandingkan dengan rental lain</p>
                                    </a>
                                </li>
                            </ul>
                            <p> <b>Sejak tahun 2000 oleh Ali Mustain.</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="content" id="gallery">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-sm-12 col-md-12 col-lg-6 align-self-center ">
                        <div class="title">
                            <h1>Galeri Kami
                            </h1>
                            <p>Menyediakan berbagai jenis mobil. Mulai dari Xenia sampai Pajero. Mobil yang Anda butuhkan tidak ada? Hubungi kontak tertera. Akan kami sediakan segera.</p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6 align-self-center image-layout">
                        <div class="row g-2">
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <img src="assets/images/profileImage/img-gallery1.png">
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <img src="assets/images/profileImage/img-gallery2.png">
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <img src="assets/images/profileImage/img-gallery3.png">
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <img src="assets/images/profileImage/img-gallery4.png">
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <img src="assets/images/profileImage/img-gallery5.png">
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <img src="assets/images/profileImage/img-gallery6.png">
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <img src="assets/images/profileImage/img-gallery1.png">
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <img src="assets/images/profileImage/img-gallery2.png">
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <img src="assets/images/profileImage/img-gallery3.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="content" id="contact">
            <div class="container">
                <h1>Kritik dan Saran</h1>
                <form class="row g-3">
                    <div class="col-md-6">
                        <label for="inputNama" class="form-label">Nama depan</label>
                        <input type="text" class="form-control" id="inputNama">
                    </div>
                    <div class="col-md-6">
                        <label for="inputNama" class="form-label">Nama belakang</label>
                        <input type="text" class="form-control" id="inputNama">
                    </div>
                    <div class="col-12">
                        <label for="inputEmail" class="form-label">E-mail</label>
                        <input type="text" class="form-control" id="inputEmail" placeholder="@mail">
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label">Pesan anda</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">KIRIM</button>
                    </div>
                </form>
            </div>
        </section>
    </main>


    <footer class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <h6>ALAMAT</h6>
                    <p class="address">Jl. Sentot Prawirodirjo X/ 201 Jember Kabupaten Jember Jawa Timur ???68131
                        Indonesia
                    </p>
                    <h6 class="mt-5">JAM KERJA</h6>
                    <div class="row">
                        <p>24 Jam</p>
                    </div>
                    <h6 class="mt-5">PARTNER</h6>
                    <ul class="horizontal">
                        <li>
                            <a href="https://polije.ac.id/">
                                <img src="assets/images/profileImage/logo_polije.png">
                            </a>
                        </li>
                        <li class="ms-3">
                            <a href="http://jti.polije.ac.id/">
                                <img src="assets/images/profileImage/logo_jti.png" style="width: 100px; margin-top:8px;">
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-12 margintop-5">
                    <h6>LAYANAN</h6>
                    <ul class="vertical">
                        <li><a class="nav-link" href="#about">Lepas Kunci</a></li>
                        <li><a class="nav-link" href="#menu">Mobil + Driver</a></li>
                        <li><a class="nav-link" href="#gallery">All In</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-12 margintop-5">
                    <h6>MOBIL</h6>
                    <ul class="vertical">
                        <li><a class="nav-link" href="#">SUV</a></li>
                        <li><a class="nav-link" href="#">MPV</a></li>
                        <li><a class="nav-link" href="#">Sedan</a></li>
                        <li><a class="nav-link" href="#">Pick Up </a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-12 margintop-5">
                    <h6>IKUTI KAMI</h6>
                    <ul class="horizontal">
                        <li><a href="https://www.instagram.com/merpatipersewaanmobiljember/"><i class="fa-brands fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                        <li><a href="https://www.facebook.com/mustainmerpati"><i class="fa-brands fa-facebook"></i></a></li>
                    </ul>
                    <h6 class="mt-5">HUBUNGI</h6>
                    <p>0812-4972-0900</p>
                    <p>0851-0572-0900</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Script -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="https://kit.fontawesome.com/62bf956e5e.js" crossorigin="anonymous"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
</body>

</html>