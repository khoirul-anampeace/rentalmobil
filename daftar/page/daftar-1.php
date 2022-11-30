<?php
session_start();
?>
<form method="POST" class="g-3 daftar-akun">
    <section class="content" id="form1">
        <div class="container">
            <h1>Form ke 1</h1>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <label for="inputNama" class="form-label">Nama Lengkap</label>
                    <input type="text" name="namalengkap" class="form-control" id="inputNama" placeholder="Nama Anda" autofocus required autocomplete="off">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="inputUsername" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="inputUsername" placeholder="Uxas---" required autocomplete="off">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Usas@gmail.com" required autocomplete="off">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="inputNoTelp" class="form-label">No Telp</label>
                    <input type="number" name="notelp" class="form-control" id="inputNoTelp" placeholder="08***" required autocomplete="off">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="inputpassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="inputpassword" placeholder="***" required autocomplete="off">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="inputConfPass" class="form-label">Masukkan Ulang Password</label>
                    <input type="password" name="passwordconfirm" class="form-control" id="inputConfPass" placeholder="***" required autocomplete="off">
                </div>

                <div class="col-md-12 col-sm-6">
                    <a href="index.php" class="btn btn-danger" name="batal">Batalkan</a>
                    <button class="btn btn-primary float-end" name="daftar2">Selanjutnya</button>
                </div>
            </div>
        </div>
    </section>

    <?php
    if (isset($_POST["daftar2"])) {
        $namaLengkap = $_POST["namalengkap"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $notelp = $_POST["notelp"];
        $password = $_POST["password"];
        $passwordconfirm = $_POST["passwordconfirm"];
        $_SESSION['namaLengkap'] = $namaLengkap;
        $_SESSION["username"] = $username;
        $_SESSION["email"] = $email;
        $_SESSION["notelp"] = $notelp;
        $_SESSION["password"] = $password;
        if ($password === $passwordconfirm) {
            echo "<script>location='.?pagedaftar=daftar-2'</script>";
        } else {
            echo "<script>alert('Password tidak sama')</script>";
        }
    }
    // if (isset($_POST["tambahbarang"])) {
    ?>
</form>