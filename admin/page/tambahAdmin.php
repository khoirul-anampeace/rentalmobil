<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
            </div>
            <h4 class="page-title">Tambah Admin</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<?php
// id customer
// mengambil data barang dengan kode paling besar
$queryid = mysqli_query($connect, "SELECT max(id_admin) as idTerbesar FROM admin");
$data = mysqli_fetch_array($queryid);
$id_admin = $data['idTerbesar'];

// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan (int)
$urutan = (int) substr($id_admin, 3, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;

// membentuk kode barang baru
// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
$huruf = "ADM";
$id_admin = $huruf . sprintf("%03s", $urutan);
// echo $id_customer;

?>
<form method="POST" enctype="multipart/form-data">
    <div class="row" id="detailCustomer">
        <div class="col-xl-8 col-lg-9">
            <div class="card card-h-100">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="inputNama" class="form-label">ID Admin</label>
                            <input type="text" value=" <?= $id_admin ?>" name="idAdmin" class="form-control" id="inputMerk" placeholder="" readonly required autocomplete="off">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="inputNama" class="form-label">Nama Admin</label>
                            <input type="text" name="nama" class="form-control" id="inputMerk" placeholder="Nama" autofocus required autocomplete="off">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="inputNama" class="form-label">No Telp/WA</label>
                            <input type="text" name="telp" class="form-control" id="inputMerk" placeholder="" required autocomplete="off">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="inputjenis" class="form-label">Status Admin</label>
                            <select class="form-select" name="status" aria-label="Default select example">
                                <option value="Karyawan">Karyawan</option>
                                <option value="Pemilik">Pemilik</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="inputNama" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" id="inputMerk" placeholder=" " required autocomplete="off">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="inputNama" class="form-label">Password</label>
                            <input type="text" name="password" class="form-control" id="inputMerk" placeholder=" " required autocomplete="off">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="inputNama" class="form-label">Alamat</label>
                            <textarea name="alamat" class="form-control" id="inputMerk" required autocomplete="off"></textarea>
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
                            <input type="file" name="fotoprofil" class="form-control" id="imageUploadProfil" onchange="readURLFProfil(this);" placeholder="Jember" required autocomplete="off">
                            <div id="preview">
                                <img class="mt-3" src="" width="100%" id="thumbFotoProfil" height="270px">
                            </div>
                        </div>
                        <div class="col-12">
                            <a href=".?pagedaftar=admin" class="btn btn-secondary">Batalkan</a>
                            <button class="btn btn-primary float-end" name="tambah">Tambah</button>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</form>
<?php
if (isset($_POST["tambah"])) {
    // form
    $nama = $_POST["nama"];
    $telp = $_POST["telp"];
    $harga = $_POST["harga"];
    $status = $_POST["status"];
    $alamat = $_POST["alamat"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    $namafotoprofil = $id_admin . "_fotoProfil_";
    $fotprofil = upload($namafotoprofil, "fotoprofil", "admin");
    if (!$fotprofil) {
        return false;
    }

    // insert
    $queryInsert = "INSERT INTO admin 
                        VALUES('$id_admin', '$nama', '$username', '$alamat', '$telp', '$password', '$status', '$fotprofil')
                    ";
    mysqli_query($connect, $queryInsert);
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