<?php
require("../config/function.php");
session_start();

// Cek user pada session
if (!isset($_SESSION["id_admin"])) {
    // $_SESSION["msg"] = "Anda harus login untuk mengakses halaman ini";

    echo "<script>location='login.php'</script>";
}

if (isset($_SESSION["id_admin"])) {
    $adminId = $_SESSION["id_admin"];
    $query = "SELECT * FROM admin WHERE id_admin = '$adminId'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);

    // echo "id Admin" . $row["nama"];

    if ($row["fotoprofil"] != "") {
        $tampilkanprofil = "../assets/images/admin/" . $row["fotoprofil"];
    } else {
        $tampilkanprofil = "../assets/images/users/man.png";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin Merpati Rent Car</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/logomerpati_sm.png">

    <!-- third party css -->
    <link href="../assets/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css">
    <!-- third party css end -->
    <!-- Datatables css -->
    <link href="../assets/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css" />

    <link href="../assets/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/vendor/buttons.bootstrap5.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/vendor/select.bootstrap5.css" rel="stylesheet" type="text/css">

    <!-- App css -->
    <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
    <link href="../assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">

    <!-- style -->
    <link rel="stylesheet" href="../assets/css/styleAdmin.css">

</head>

<body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu">

            <!-- LOGO -->
            <a href="index.html" class="logo text-center logo-light">
                <span class="logo-lg">
                    <img src="../assets/images/logomerpati.png" alt="" height="45">
                </span>
                <span class="logo-sm">
                    <img src="../assets/images/logomerpati_sm.png" alt="" height="45">
                </span>
            </a>

            <!-- LOGO -->
            <a href="index.html" class="logo text-center logo-dark">
                <span class="logo-lg">
                    <img src="../assets/images/logomerpati.png" alt="" height="16">
                </span>
                <span class="logo-sm">
                    <img src="../assets/images/logomerpati_sm.png" alt="" height="16">
                </span>
            </a>

            <div class="h-100" id="leftside-menu-container" data-simplebar="">

                <!--- Sidemenu -->
                <ul class="side-nav">

                    <li class="side-nav-title side-nav-item">Navigation</li>

                    <li class="side-nav-item">
                        <a href=".?page=dashboard" class="side-nav-link">
                            <i class="uil-home-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                            <i class="uil-table"></i>
                            <!-- <span class="badge bg-success float-end">4</span> -->
                            <span>Transaksi</span>
                        </a>
                        <div class="collapse" id="sidebarDashboards">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href=".?page=lepas-kunci">Lepas Kunci</a>
                                </li>
                                <li>
                                    <a href="#">Dengan Driver</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="side-nav-item">
                        <a href=".?page=customer" class="side-nav-link">
                            <i class="uil-users-alt"></i>
                            <span>Customer</span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href=".?page=mobil" class="side-nav-link">
                            <i class="uil-car"></i>
                            <span>Mobil</span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href=".?page=driver" class="side-nav-link">
                            <i class="uil-users-alt"></i>
                            <span>Driver</span>
                        </a>
                    </li>
                    <?php
                    if ($row["status_admin"] === "Pemilik") {
                    ?>
                        <li class="side-nav-item">
                            <a href=".?page=admin" class="side-nav-link">
                                <i class="uil-users-alt"></i>
                                <span>Admin saya</span>
                            </a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <!-- End Sidebar -->
                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                <div class="navbar-custom">
                    <ul class="list-unstyled topbar-menu float-end mb-0">
                        <li class="dropdown notification-list d-lg-none">
                            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="dripicons-search noti-icon"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                                <form class="p-3">
                                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                </form>
                            </div>
                        </li>
                        <?php


                        ?>
                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <span class="account-user-avatar">
                                    <img src="<?= $tampilkanprofil ?>" alt="user-image" class="rounded-circle">
                                </span>
                                <span>
                                    <span class="account-user-name"><?= $row["nama"] ?></span>
                                    <span class="account-position"><?= $row["status_admin"] ?></span>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                                <!-- item-->
                                <div class=" dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>
                                <!-- item-->
                                <a href="logout.php" class="dropdown-item notify-item">
                                    <i class="mdi mdi-logout me-1"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                    <button class="button-menu-mobile open-left">
                        <i class="mdi mdi-menu"></i>
                    </button>
                    <div class="app-search dropdown d-none d-lg-block">
                        <!-- <form>
                            <div class="input-group">
                                <input type="text" class="form-control dropdown-toggle" placeholder="Search..." id="top-search">
                                <span class="mdi mdi-magnify search-icon"></span>
                                <button class="input-group-text btn-primary" type="submit">Search</button>
                            </div>
                        </form> -->
                    </div>
                </div>
                <!-- end Topbar -->

                <!-- Start Content-->
                <div class="container-fluid">
                    <?php

                    $page = @$_GET['page'];
                    $hal = "page/$page.php";
                    $barang = "page/dashboard.php";
                    if (!empty($page) && file_exists($hal)) {
                        include $hal;
                    } else {
                        include $barang;
                    }

                    ?>
                </div>
                <!-- container -->

            </div>
            <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Merpati Rent Car
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <script src="../assets/js/jquery.js"></script>

    <!-- bundle -->
    <script src="../assets/js/vendor.min.js"></script>
    <script src="../assets/js/app.min.js"></script>

    <!-- third party js -->
    <!-- <script src="assets/js/vendor/Chart.bundle.min.js"></script> -->
    <script src="../assets/js/vendor/apexcharts.min.js"></script>
    <script src="../assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
    <!-- third party js ends -->


    <!-- demo app -->
    <script src="../assets/js/pages/demo.dashboard-analytics.js"></script>
    <!-- end demo js-->


    <!-- third party js -->
    <script src="../assets/js/vendor/jquery.dataTables.min.js"></script>
    <script src="../assets/js/vendor/dataTables.bootstrap5.js"></script>
    <script src="../assets/js/vendor/dataTables.responsive.min.js"></script>
    <script src="../assets/js/vendor/responsive.bootstrap5.min.js"></script>
    <script src="../assets/js/vendor/dataTables.buttons.min.js"></script>
    <script src="../assets/js/vendor/buttons.bootstrap5.min.js"></script>
    <script src="../assets/js/vendor/buttons.html5.min.js"></script>
    <script src="../assets/js/vendor/buttons.flash.min.js"></script>
    <script src="../assets/js/vendor/buttons.print.min.js"></script>
    <script src="../assets/js/vendor/dataTables.keyTable.min.js"></script>
    <script src="../assets/js/vendor/dataTables.select.min.js"></script>
    <!-- third party js ends -->

    <!-- demo app -->
    <script src="../assets/js/pages/demo.datatable-init.js"></script>
    <!-- end demo js-->
</body>

</html>