<?php
require("../config/function.php");
session_start();

// Cek user pada session
if (!isset($_SESSION["id_customer"])) {
    // $_SESSION["msg"] = "Anda harus login untuk mengakses halaman ini";

    echo "<script>location='../login.php'</script>";
}
$sesId_customer = $_SESSION["id_customer"];
$sesNamaLengkap = $_SESSION["nama_lengkap"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merpati Rent Car</title>
    <link rel="stylesheet" href="../assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="icon" href="../assets/images/logomerpati_sm.png" type="image/icon type">
</head>

<body>
    <!-- Navigasi -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light" id="main">
            <div class="container navsmooth">
                <a class="navbar-brand" href="index.php">
                    <img src="../assets/images/logomerpati.png" alt="">
                </a>
                <div class="nav-item dropdown navbarrow">
                    <a class="nav-link dropdown-toggle " href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../assets/images/users/avatar-2.jpg" width="35px" height="35px" style="border-radius: 50px;">
                        <p><?= $sesNamaLengkap ?></p>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                        <li><a class="dropdown-item" href=".?page=ubahProfile">Ubah Profil</a></li>
                        <li><a class="dropdown-item" href=".?page=historiTransaksi">History Transaksi</a></li>
                        <li><a class="dropdown-item" href="../logout.php">Log Out</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- Navigasi -->

    <main>
        <!-- ScrollTOp -->
        <a href="#">
            <div class="scrolltop" id="scrolltop">
                <i class="fa-solid fa-arrow-up"></i>
            </div>
        </a>
        <!-- ScrollTOp -->
        <?php


        $page = @$_GET['page'];
        $hal = "page/$page.php";
        $dashboard = "page/dashboard.php";
        if (!empty($page) && file_exists($hal)) {
            include $hal;
        } else {
            include $dashboard;
        }

        ?>
    </main>


    <footer class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <h6>ADDRESS</h6>
                    <p class="address">Jl. Sentot Prawirodirjo X/ 201 Jember Kabupaten Jember Jawa Timur 〒68131
                        Indonesia
                    </p>
                    <h6 class="mt-5">OPENING HOURS</h6>
                    <div class="row">
                        <p>24 Jam</p>
                    </div>
                    <h6 class="mt-5">PARTNER</h6>
                    <ul class="horizontal">
                        <li>
                            <a href="https://polije.ac.id/">
                                <img src="../assets/images/profileImage/logo_polije.png">
                            </a>
                        </li>
                        <li class="ms-3">
                            <a href="http://jti.polije.ac.id/">
                                <img src="../assets/images/profileImage/logo_jti.png" style="width: 100px; margin-top:8px;">
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-12 margintop-5">
                    <h6>LAYANAN</h6>
                    <ul class="vertical">
                        <li><a class="nav-link" href="#about">Lepas Kunci</a></li>
                        <li><a class="nav-link" href="#menu">Mobil + Driver</a></li>
                        <!-- <li><a class="nav-link" href="#gallery">All In</a></li> -->
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
                    <h6>FOLLOW US</h6>
                    <ul class="horizontal">
                        <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                    </ul>
                    <h6 class="mt-5">HUBUNGI</h6>
                    <p>0812-4972-0900</p>
                    <p>0851-0572-0900</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Script -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/script.js"></script>
    <script src="https://kit.fontawesome.com/62bf956e5e.js" crossorigin="anonymous"></script>
    <script src="../assets/js/vendor/bootstrap.min.js"></script>
</body>

</html>