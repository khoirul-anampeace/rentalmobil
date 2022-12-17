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
                                <input type="text" value=" <?= $id_driver ?>" name="idDriver" class="form-control" id="inputMerk" placeholder="" readonly required autocomplete="off">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="inputNama" class="form-label">Tarif Driver</label>
                                <input type="number" value="<?= $row["tarif_driver"] ?>" name="tarif_driver" class="form-control" id="inputMerk" placeholder=" " required autocomplete="off">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="inputNama" class="form-label">Wilayah Tujuan</label>
                                <input type="text" value="<?= $row["wilayah_tujuan"] ?>" name="wilayah_tujuan" class="form-control" id="inputMerk" placeholder="Wilayah TUjuan" autofocus required autocomplete="off">
                            </div>
                            <div class="col-md-12 col-sm-6">
                                <a href=".?page=driver" class="btn btn-secondary">Batalkan</a>
                                <button class="btn btn-primary float-end" name="update">Update Driver</button>
                            </div>
                        </div>
                    </form>

                <?php
                endforeach;
                if (isset($_POST["update"])) {
                    // form
                    $wilayah_tujuan = $_POST["wilayah_tujuan"];
                    $tarif_driver = $_POST["tarif_driver"];
                    // insert
                    $queryInsert = "UPDATE driver SET 
                    wilayah_tujuan = '$wilayah_tujuan', 
                    tarif_driver = '$tarif_driver'
                    WHERE id_driver = '$id_driver'
                    ";
                    mysqli_query($connect, $queryInsert);
                    echo "<script>location='.?page=driver'</script>";
                }

                ?>


            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
</div> <!-- end col -->