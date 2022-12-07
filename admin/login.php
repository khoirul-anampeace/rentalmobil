<?php
require('../config/function.php');
session_start();

// Cek user pada session
if (isset($_SESSION["id_admin"])) {
    // $_SESSION["msg"] = "Anda harus login untuk mengakses halaman ini";

    echo "<script>location='index.php'</script>";
}


if (!empty($_SESSION["login"])) {
    echo "<script>location='index.php'</script>";
} else {
    if (isset($_POST['login'])) {
        $username = $_POST['inusername'];
        $pass = $_POST['inpassword'];
        if (!empty(trim($username)) && !empty(trim($pass))) {

            $query = "SELECT * FROM admin WHERE username  = '$username'";
            $result = mysqli_query($connect, $query);
            $num = mysqli_num_rows($result);

            while ($row = mysqli_fetch_array($result)) {
                $id = $row['id_admin'];
                $adminVal = $row['username'];
                $namaAdmin = $row['nama'];
                $passVal = $row['password'];
            }
            if ($num != 0) {
                if ($adminVal == $username && $pass == $passVal) {
                    $_SESSION["id_admin"] = $id;
                    $_SESSION["nama_admin"] = $namaAdmin;
                    echo "<script>location='index.php'</script>";
                } else {
                    // $error = 'user atau password salah!!';
                    echo "<script>alert('User dan password salah')</script>";
                    // echo "<script>location='login.php'</script>";
                }
            } else {
                // $error = 'Data tidak boleh kosong !!';
                echo "<script>alert(Data tidak boleh kosong!')</script>";
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Log In | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link rel="icon" href="../assets/images/logomerpati_sm.png" type="image/icon type">

    <!-- App css -->
    <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
    <link href="../assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />

</head>

<body class="loading authentication-bg" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5">
                    <div class="card">

                        <!-- Logo -->
                        <div class="card-header text-center">
                            <a href="../index.php">
                                <span><img src="../assets/images/logomerpati.png" alt="" height="80px"></span>
                            </a>
                        </div>

                        <div class="card-body p-3">

                            <div class="text-center w-75 m-auto">
                                <h3 class="text-dark-50 text-center pb-0 fw-bold">Login</h3>
                                <p class="text-muted mb-4">Enter your username and password to access admin panel.</p>
                            </div>

                            <form method="POST">

                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Username</label>
                                    <input name="inusername" class="form-control" type="text" id="emailaddress" autofocus required autocomplete="off" placeholder="Enter your Username">
                                </div>

                                <div class="mb-3">
                                    <!-- <a href="pages-recoverpw.html" class="text-muted float-end"><small>Forgot your password?</small></a> -->
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input name="inpassword" type="password" id="password" class="form-control" autofocus autocomplete="off" placeholder="Enter your password">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="mb-3 mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                                        <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                    </div>
                                </div> -->

                                <div class=" mb-0 text-center">
                                    <button class="btn btn-primary w-100" type="submit" name="login"> Log In </button>
                                </div>

                            </form>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <!-- <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">Don't have an account? <a href="pages-register.html" class="text-muted ms-1"><b>Sign Up</b></a></p>
                        </div>
                    </div> -->
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <footer class="footer footer-alt">
        2022 © Merpati Rent Car
    </footer>

    <!-- bundle -->
    <script src="../assets/js/vendor.min.js"></script>
    <script src="../assets/js/app.min.js"></script>

</body>

</html>