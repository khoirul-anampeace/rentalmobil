<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
            </div>
            <h4 class="page-title">Tambah Driver</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<?php
// id customer
// mengambil data barang dengan kode paling besar
$queryid = mysqli_query($connect, "SELECT max(id_driver) as idTerbesar FROM driver");
$data = mysqli_fetch_array($queryid);
$id_driver = $data['idTerbesar'];

// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan (int)
$urutan = (int) substr($id_driver, 3, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;

// membentuk kode barang baru
// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
$huruf = "DRV";
$id_driver = $huruf . sprintf("%03s", $urutan);
// echo $id_customer;

?>
<div class="row" id="detailCustomer">
    <div class="col-xl-12 col-lg-12">
        <div class="card card-h-100">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="inputNama" class="form-label">Id Driver</label>
                            <input type="text" value=" <?= $id_driver ?>" name="idDriver" class="form-control" id="inputMerk" placeholder="" readonly required autocomplete="off">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="inputNama" class="form-label">Tarif Driver</label>
                            <input type="number" name="tarif_driver" class="form-control" id="inputMerk" placeholder=" " required autocomplete="off">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="inputNama" class="form-label">Wilayah Tujuan</label>
                            <input type="text" name="wilayah_tujuan" class="form-control" id="inputMerk" placeholder="Wilayah Tujuan" autofocus required autocomplete="off">
                        </div>
                        <div class="col-md-12 col-sm-6">
                            <a href=".?page=driver" class="btn btn-secondary">Batalkan</a>
                            <button class="btn btn-primary float-end" name="tambah">Tambah</button>
                        </div>
                    </div>
                </form>

                <?php
                if (isset($_POST["tambah"])) {
                    // form
                    $wilayah_tujuan = $_POST["wilayah_tujuan"];
                    $tarif_driver = $_POST["tarif_driver"];
                    // insert
                    $queryInsert = "INSERT INTO driver 
                        VALUES('$id_driver', '$wilayah_tujuan', '$tarif_driver')
                    ";
                    mysqli_query($connect, $queryInsert);
                    echo "<script>location='.?page=driver'</script>";
                }
                ?>


            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
</div> <!-- end col -->