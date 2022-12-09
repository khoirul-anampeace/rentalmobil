<section class="content customer" id="ubahProfil">
    <div class="container" id="">
        <h1>Ganti Password</h1>
        <form method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <label for="inputNama" class="form-label">Password Lama</label>
                    <input type="text" name="passwordlama" class="form-control" id="inputNama" placeholder="Masukkan password baru" autofocus autocomplete="off">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="inputNama" class="form-label">Password Baru</label>
                    <input type="text" name="passwordbaru" class="form-control" id="inputNama" placeholder="Masukkan password baru" autofocus autocomplete="off">
                </div>
                <div class="col-12">
                    <a href=".?pagedaftar=dashboard" class="btn btn-danger">Kembali</a>
                    <button class="btn btn-primary float-end" name="update">Ganti Password</button>
                </div>
            </div>
        </form>
</section>

<?php
$customerId = $_SESSION["id_customer"];
$query = "SELECT * FROM customer WHERE id_customer = '$customerId'";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($result);
$passwordlamanya = $row["password"];

if (isset($_POST["update"])) {
    $passwordLama = $_POST["passwordlama"];
    $passwordBaru = $_POST["passwordbaru"];
    $enkrip_password = password_hash($passwordBaru, PASSWORD_DEFAULT);

    if (password_verify($passwordLama, $passwordlamanya)) {
        $query = "UPDATE customer SET password = '$enkrip_password' WHERE id_customer = '$customerId'";
        mysqli_query($connect, $query);
        echo "<script>alert('Password berhasil di ubah')</script>";
        echo "<script>location='index.php.?page=dashboard'</script>";
    } else {
        echo "<script>alert('Maaf Password anda salah!')</script>";
    }
}
?>