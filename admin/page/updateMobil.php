<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
            </div>
            <h4 class="page-title">Update Data Mobil</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row" id="detailCustomer">
    <div class="col-xl-12 col-lg-12">
        <div class="card card-h-100">
            <div class="card-body">
                <?php
                // echo $id_customer;

                $id = $_GET['id_mobil'];
                $mobil = query("SELECT * FROM mobil JOIN kondisi_mobil ON mobil.id_mobil = kondisi_mobil.id_mobil WHERE mobil.id_mobil = '$id'");
                $no = 1;
                foreach ($mobil as $row) :
                    $id_mobil = $row["id_mobil"];

                ?>
                    <form method="POST" enctype="multipart/form-data">
                        <h4 class="header-title mb-3">ID MOBIL <?= $id_mobil ?></h4>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="inputNama" class="form-label">Merek Mobil</label>
                                <input type="text" value="<?= $row["merk"] ?>" name="merk" class="form-control" id="inputMerk" placeholder="Nama Anda" autofocus required autocomplete="off">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="inputjenis" class="form-label">Jenis Mobil</label>
                                <select class="form-select" name="jenismobil" aria-label="Default select example">
                                    <?php
                                    if ($inputjeniskelamin != "") {
                                    ?>
                                        <option value="<?= $inputjeniskelamin ?>"><?= $inputjeniskelamin ?></option>
                                    <?php
                                    } else {
                                    }
                                    ?><option value="<?= $row["jenis"] ?>"><?= $row["jenis"] ?></option>
                                    <option value="SUV">SUV</option>
                                    <option value="MPV">MPV</option>
                                    <option value="Sedan">Sedan</option>
                                    <option value="Pickup">Pickup</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="inputNama" class="form-label">No Rangka</label>
                                <input type="text" value="<?= $row["no_rangka"] ?>" name="norangka" class="form-control" id="inputMerk" placeholder="Nama Anda" required autocomplete="off">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="inputNama" class="form-label">No Mesin</label>
                                <input type="text" value="<?= $row["no_mesin"] ?>" name="nomesin" class="form-control" id="inputMerk" placeholder="Nama Anda" required autocomplete="off">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="inputNama" class="form-label">Plat Nomor</label>
                                <input type="text" value="<?= $row["no_plat"] ?>" name="noplat" class="form-control" id="inputMerk" placeholder="Nama Anda" required autocomplete="off">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="inputNama" class="form-label">Tahun Pembuatan</label>
                                <input type="text" value="<?= $row["tahun_buat"] ?>" name="tahunbuat" class="form-control" id="inputMerk" placeholder="Nama Anda" required autocomplete="off">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="inputNama" class="form-label">BBM</label>
                                <input type="text" value="<?= $row["bbm"] ?>" name="bbm" class="form-control" id="inputMerk" placeholder="Nama Anda" required autocomplete="off">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="inputNama" class="form-label">Warna</label>
                                <input type="text" value="<?= $row["warna"] ?>" name="warna" class="form-control" id="inputMerk" placeholder="Nama Anda" required autocomplete="off">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="inputNama" class="form-label">Jumlah Kursi</label>
                                <input type="text" value="<?= $row["jumlah_kursi"] ?>" name="jumlahkursi" class="form-control" id="inputMerk" placeholder="Nama Anda" required autocomplete="off">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="inputNama" class="form-label">Harga</label>
                                <input type="text" value="<?= $row["harga"] ?>" name="harga" class="form-control" id="inputMerk" placeholder="Nama Anda" required autocomplete="off">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="inputNama" class="form-label">Catatan</label>
                                <textarea name="catatan" class="form-control" id="inputMerk" required autocomplete="off"><?= $row["catatan"] ?></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="inputNama" class="form-label">Foto Bagian Depan</label>
                                <input type="file" value="<?= $row["depan"] ?>" name="fdepan" class="form-control" id="imageUploadKTP" onchange="readURLKTP(this);" autocomplete="off">
                                <img class="mt-2" src="../assets/images/mobil/<?= $row["depan"] ?>" width="100%" height="auto" style="border-radius: 8px;">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="inputNama" class="form-label">Foto Bagian Samping</label>
                                <input type="file" value="<?= $row["samping"] ?>" name="fsamping" class="form-control" id="imageUploadKTP" onchange="readURLKTP(this);" autocomplete="off">
                                <img class="mt-2" src="../assets/images/mobil/<?= $row["samping"] ?>" width="100%" height="auto" style="border-radius: 8px;">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="inputNama" class="form-label">Foto Bagian Belakang</label>
                                <input type="file" value="<?= $row["belakang"] ?>" name="fbelakang" class="form-control" id="imageUploadKTP" onchange="readURLKTP(this);" autocomplete="off">
                                <img class="mt-2" src="../assets/images/mobil/<?= $row["belakang"] ?>" width="100%" height="auto" style="border-radius: 8px;">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="inputNama" class="form-label">Foto Bagian Interior</label>
                                <input type="file" value="<?= $row["interior"] ?>" name="finterior" class="form-control" id="imageUploadKTP" onchange="readURLKTP(this);" autocomplete="off">
                                <img class="mt-2" src="../assets/images/mobil/<?= $row["interior"] ?>" width="100%" height="auto" style="border-radius: 8px;">
                            </div>

                            <div class="col-md-12 col-sm-6">
                                <a href=".?page=mobil" class="btn btn-secondary">Batalkan</a>
                                <button class="btn btn-primary float-end" name="updateData">Update Data</button>
                            </div>
                        </div>
                    </form>

                <?php
                    $fotoBagianDepan = $row["depan"];
                    $fotoBagianBelakang = $row["belakang"];
                    $fotoBagianSamping = $row["samping"];
                    $fotoBagianInterior = $row["interior"];

                endforeach;
                ?>


            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
</div> <!-- end col -->

<?php
if (isset($_POST["updateData"])) {
    // form
    $merk = $_POST["merk"];
    $jenismobil = $_POST["jenismobil"];
    $norangka = $_POST["norangka"];
    $nomesin = $_POST["nomesin"];
    $noplat = $_POST["noplat"];
    $tahunbuat = $_POST["tahunbuat"];
    $bbm = $_POST["bbm"];
    $warna = $_POST["warna"];
    $jumlahkursi = $_POST["jumlahkursi"];
    $harga = $_POST["harga"];
    $catatan = $_POST["catatan"];
    $status = "Siap Digunakan";
    // foto

    // cek foto
    if ($_FILES['fdepan']['name'] == true) {
        $namaFMobilDepan = $id_mobil . "_fotoMobilDepan_";
        $fotoDepan = upload($namaFMobilDepan, "fdepan", "mobil");
    } else {
        $fotoDepan = $fotoBagianDepan;
        // if (!$fotoprofil) {
        //     echo "<script>alert('Silahkan Tambahkan Foto Profil')</script>";
        //     return false;
        // }
    }
    if ($_FILES['fbelakang']['name'] == true) {
        $namaFMobilBelakang = $id_mobil . "_fotoMobilBelakang_";
        $fotoBelakang = upload($namaFMobilBelakang, "fbelakang", "mobil");
    } else {
        $fotoBelakang = $fotoBagianBelakang;
        // if (!$fotoprofil) {
        //     echo "<script>alert('Silahkan Tambahkan Foto Profil')</script>";
        //     return false;
        // }
    }
    if ($_FILES['fsamping']['name'] == true) {
        $namaFMobilSamping = $id_mobil . "_fotoMobilSamping_";
        $fotoSamping = upload($namaFMobilSamping, "fsamping", "mobil");
    } else {
        $fotoSamping = $fotoBagianSamping;
        // if (!$fotoprofil) {
        //     echo "<script>alert('Silahkan Tambahkan Foto Profil')</script>";
        //     return false;
        // }
    }
    if ($_FILES['finterior']['name'] == true) {
        $namaFMobilInterior = $id_mobil . "_fotoMobilInterior_";
        $fotoInterior = upload($namaFMobilInterior, "finterior", "mobil");
    } else {
        $fotoInterior = $fotoBagianInterior;
        // if (!$fotoprofil) {
        //     echo "<script>alert('Silahkan Tambahkan Foto Profil')</script>";
        //     return false;
        // }
    }
    // insert
    $query1 = "UPDATE mobil SET
merk = '$merk', 
jenis = '$jenismobil', 
no_rangka = '$norangka',
no_mesin = '$nomesin',
no_plat = '$noplat',
tahun_buat = '$tahunbuat',
bbm = '$bbm',
warna = '$warna',
status_mobil = '$status',
jumlah_kursi = '$jumlahkursi',
harga = '$harga',
catatan = '$catatan' WHERE id_mobil = '$id'
";
    $send1 =  mysqli_query($connect, $query1);
    $query2 = "UPDATE kondisi_mobil SET
depan = '$fotoDepan',
belakang = '$fotoBelakang',
samping = '$fotoSamping',
interior = '$fotoInterior' WHERE id_mobil = '$id'
";
    $send2 = mysqli_query($connect, $query2);
    echo "Send 1" . $send1;
    echo "Send 2" . $send2;
    echo "<script>location='.?page=mobil'</script>";
}
?>