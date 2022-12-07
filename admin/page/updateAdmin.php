<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
            </div>
            <h4 class="page-title">Update Admin</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<?php
$id = $_GET['id_admin'];
$admin = query("SELECT * FROM admin WHERE id_admin = '$id'");
$no = 1;
foreach ($admin as $row) :
    $id_admin = $row["id_admin"];
?>
    <form method="POST" enctype="multipart/form-data">
        <div class="row" id="detailCustomer">
            <div class="col-xl-8 col-lg-9">
                <div class="card card-h-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="inputNama" class="form-label">Id Admin</label>
                                <input type="text" value=" <?= $id_admin ?>" name="idAdmin" class="form-control" id="inputMerk" placeholder="" readonly required autocomplete="off">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="inputNama" class="form-label">Nama Admin</label>
                                <input type="text" value=" <?= $row["nama"] ?>" name="nama" class="form-control" id="inputMerk" placeholder="Nama Driver" autofocus required autocomplete="off">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="inputNama" class="form-label">Telphone/WA</label>
                                <input type="text" value=" <?= $row["telp"] ?>" name="telp" class="form-control" id="inputMerk" placeholder="" required autocomplete="off">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="inputjenis" class="form-label">Status Admin</label>
                                <select class="form-select" name="status" aria-label="Default select example">
                                    <option value="<?= $row["status_admin"] ?>"><?= $row["status_admin"] ?></option>
                                    <option value="Karyawan">Karyawan</option>
                                    <option value="Pemilik">Pemilik</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="inputNama" class="form-label">Username</label>
                                <input type="text" value="<?= $row["username"] ?>" name="username" class="form-control" id="inputMerk" placeholder=" " required autocomplete="off">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="inputNama" class="form-label">Password</label>
                                <input type="text" value="<?= $row["password"] ?>" name="password" class="form-control" id="inputMerk" placeholder=" " required autocomplete="off">
                            </div>
                            <div class="col-12 mb-3">
                                <label for="inputNama" class="form-label">Alamat</label>
                                <textarea name="alamat" class="form-control" id="inputMerk" required autocomplete="off"><?= $row["alamat"] ?></textarea>
                            </div>
                        </div>



                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div>
            <div class="col-xl-4 col-lg-3">
                <div class="card card-h-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="fotoprofil" class="form-label">Foto Profil Admin</label>
                                <input type="file" value="<?= $row["fotoprofil"] ?>" name="fotoprofil" class="form-control" id="imageUploadProfil" onchange="readURLFProfil(this);" autocomplete="off">
                                <div id="preview">
                                    <img src="../assets/images/admin/<?= $row["fotoprofil"] ?>" class="mt-3" src="" width="100%" id="thumbFotoProfil" height="270px">
                                </div>
                            </div>
                            <div class="col-12">
                                <a href=".?pagedaftar=admin" class="btn btn-secondary">Batalkan</a>
                                <button class="btn btn-primary float-end" name="update">Update</button>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </form>
<?php
    $fotoProfilAdmin = $row["fotoprofil"];
endforeach;
if (isset($_POST["update"])) {
    // form
    $nama = $_POST["nama"];
    $telp = $_POST["telp"];
    $harga = $_POST["harga"];
    $status = $_POST["status"];
    $alamat = $_POST["alamat"];
    $username = $_POST["username"];
    $password = $_POST["password"];


    if ($_FILES['fotoprofil']['name'] == true) {
        $namafotoprofil = $id_admin . "_fotoProfil_";
        $fotprofil = upload($namafotoprofil, "fotoprofil", "admin");
    } else {
        $fotprofil = $fotoProfilAdmin;
        // if (!$fotoprofil) {
        //     echo "<script>alert('Silahkan Tambahkan Foto Profil')</script>";
        //     return false;
        // }
    }

    // update
    $queryUpdate = "UPDATE admin SET
    nama =  '$nama',
    username = '$username',
    alamat = '$alamat',
    telp =  '$telp', 
    password = '$password', 
    status_admin  = '$status',
    fotoprofil =  '$fotprofil' WHERE id_admin = '$id_admin'
    ";
    mysqli_query($connect, $queryUpdate);
    echo "<script>location='.?page=admin'</script>";
}
?>

<script type="text/javascript">
    // preview upload foto ktp
    function readURLFProfil(imageUploadProfil) {
        if (imageUploadProfil.files && imageUploadProfil.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#thumbFotoProfil')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(imageUploadProfil.files[0]);
        }
    }
</script>