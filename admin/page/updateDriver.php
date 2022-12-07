<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
            </div>
            <h4 class="page-title">Update Driver</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row" id="detailCustomer">
    <div class="col-xl-12 col-lg-12">
        <div class="card card-h-100">
            <div class="card-body">
                <?php
                $id = $_GET['id_driver'];
                $mobil = query("SELECT * FROM driver WHERE id_driver = '$id'");
                $no = 1;
                foreach ($mobil as $row) :
                    $id_driver = $row["id_driver"];

                ?>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="inputNama" class="form-label">Id Driver</label>
                                <input type="text" value=" <?= $row["id_driver"] ?>" name="idDriver" class="form-control" id="inputMerk" placeholder="" readonly required autocomplete="off">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="inputNama" class="form-label">Nama Driver</label>
                                <input type="text" value="<?= $row["nama"] ?>" name="nama" class="form-control" id="inputMerk" placeholder="Nama Driver" autofocus required autocomplete="off">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="inputNama" class="form-label">Telphone/WA</label>
                                <input type="text" value="<?= $row["telp"] ?>" name="telp" class="form-control" id="inputMerk" placeholder="" required autocomplete="off">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="inputNama" class="form-label">harga</label>
                                <input type="text" value="<?= $row["harga"] ?>" name="harga" class="form-control" id="inputMerk" placeholder=" " required autocomplete="off">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="inputNama" class="form-label">Alamat</label>
                                <textarea name="alamat" class="form-control" id="inputMerk" required autocomplete="off"><?= $row["alamat"] ?></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="inputNama" class="form-label">Catatan Untuk Driver</label>
                                <textarea name="catatan" class="form-control" id="inputMerk" required autocomplete="off"><?= $row["catatan"] ?></textarea>
                            </div>
                            <div class="col-md-12 col-sm-6">
                                <a href=".?pagedaftar=driver" class="btn btn-secondary">Batalkan</a>
                                <button class="btn btn-primary float-end" name="update">Update Driver</button>
                            </div>
                        </div>
                    </form>

                <?php
                endforeach;
                if (isset($_POST["update"])) {
                    // form
                    $nama = $_POST["nama"];
                    $telp = $_POST["telp"];
                    $harga = $_POST["harga"];
                    $alamat = $_POST["alamat"];
                    $catatan = $_POST["catatan"];
                    $status = "Driver Ready";
                    // insert
                    $queryInsert = "UPDATE driver SET 
                    nama = '$nama', 
                    alamat = '$alamat', 
                    telp = '$telp', 
                    status_driver ='$status',
                    harga = '$harga',
                    catatan = '$catatan' WHERE id_driver = '$id_driver'
                    ";
                    mysqli_query($connect, $queryInsert);
                    echo "<script>location='.?page=driver'</script>";
                }

                ?>


            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
</div> <!-- end col -->