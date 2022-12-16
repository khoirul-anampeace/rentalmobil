<?php
$customerId = $_GET["id_customer"];
$query = "SELECT * FROM customer WHERE id_customer = '$customerId'";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($result);
$passwordlamanya = $row["password"];
?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
            </div>
            <h4 class="page-title">Ganti Password Customer</h4>
        </div>
    </div>
</div>
<div class="row" id="ubahProfil">
    <form method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6 mb-4">
                <label for="inputNama" class="form-label">Nama Customer</label>
                <input type="text" name="nama" value="<?= $row["nama_lengkap"] ?>" class="form-control" id="inputNama" autofocus autocomplete="off" readonly>
            </div>
            <div class="col-md-6 mb-4">
                <label for="inputNama" class="form-label">Password Baru</label>
                <input type="text" name="passwordbaru" class="form-control" id="inputNama" placeholder="Masukkan password baru" autofocus autocomplete="off">
            </div>
            <div class="col-12">
                <a href=".?pagedaftar=dashboard" class="btn btn-danger">Kembali</a>
                <button class="btn btn-primary float-end" name="update">Ganti Password</button>
            </div>
    </form>
</div>

<?php


if (isset($_POST["update"])) {
    $passwordBaru = $_POST["passwordbaru"];
    $enkrip_password = password_hash($passwordBaru, PASSWORD_DEFAULT);

    $query = "UPDATE customer SET password = '$enkrip_password' WHERE id_customer = '$customerId'";
    mysqli_query($connect, $query);
    echo "<script>alert('Password berhasil di ubah')</script>";
    echo "<script>location='.?page=customer'</script>";
}
?>