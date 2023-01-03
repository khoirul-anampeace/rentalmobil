<?php
require('config/function.php');
session_start();

// Cek user pada session
if (isset($_SESSION["id_customer"])) {
    // $_SESSION["msg"] = "Anda harus login untuk mengakses halaman ini";

    echo "<script>location='customer/index.php'</script>";
}


if (isset($_POST['login'])) {
    $username = $_POST['inusername'];
    $pass = $_POST['inpassword'];
    if (!empty(trim($username)) && !empty(trim($pass))) {

        $query = "SELECT * FROM customer WHERE username  = '$username'";
        $result = mysqli_query($connect, $query);
        $num = mysqli_num_rows($result);

        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id_customer'];
            $userVal = $row['username'];
            $namaLengkap = $row['nama_lengkap'];
            $passVal = $row['password'];
        }
        if ($num != 0) {
            if ($userVal == $username && (password_verify($pass, $passVal))) {
                $_SESSION["id_customer"] = $id;
                $_SESSION["nama_lengkap"] = $namaLengkap;
                echo "<script>location='customer/index.php'</script>";
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
    <div id="login">
        <div class="container">
            <div class="row box">
                <a class="login-logo" href="index.php">
                    <img src="assets/images/logomerpati.png" alt="">
                </a>
                <div class="col-md-6 col-sm-12 img">
                </div>
                <div class="col-md-6 col-sm-12 form">
                    <h1>LOGIN</h1>
                    <form method="POST">
                        <input type="text" name="inusername" class="form-control mb-3" placeholder="Username" autofocus required autocomplete="off">
                        <input type="password" name="inpassword" class="form-control mb-3" placeholder="Password" required autocomplete="off">
                        <!-- <input class="form-check-input mb-3" name="remember" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Remember Me
                        </label> -->
                        <button name="login" class="btn btn-primary mb-3">LOGIN</button>
                        <p>Lupa Password ? <a href="" onclick="alert('Silahkan hubungi whatsaap admin kami 082228008055 dengan format nik_gantipassword untuk mereset password anda')">Klik disini</a></p>
                        <p>Belum punya akun? </p>
                        <a href="daftar/index.php"" class=" btn btn-secondary">REGISTER</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Script -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="https://kit.fontawesome.com/62bf956e5e.js" crossorigin="anonymous"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
</body>

</html>