<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
            </div>
            <h4 class="page-title">Tambah Mobil</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<?php
// id customer
// mengambil data barang dengan kode paling besar
$queryid = mysqli_query($connect, "SELECT max(id_mobil) as idTerbesar FROM mobil");
$data = mysqli_fetch_array($queryid);
$id_mobil = $data['idTerbesar'];

// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan (int)
$urutan = (int) substr($id_mobil, 3, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;

// membentuk kode barang baru
// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
$huruf = "MOB";
$id_mobil = $huruf . sprintf("%03s", $urutan);
// echo $id_customer;

?>
<div class="row" id="detailCustomer">
    <div class="col-xl-12 col-lg-12">
        <div class="card card-h-100">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <h4 class="header-title mb-3">ID MOBIL <?= $id_mobil ?></h4>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="inputNama" class="form-label">Merek Mobil</label>
                            <input type="text" name="merk" class="form-control" id="inputMerk" placeholder="Merk Mobil" autofocus required autocomplete="off">
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
                                ?>
                                <option value="SUV">SUV</option>
                                <option value="MPV">MPV</option>
                                <option value="Sedan">Sedan</option>
                                <option value="Pickup">Pickup</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="inputNama" class="form-label">No Rangka</label>
                            <input type="text" name="norangka" class="form-control" id="inputMerk" placeholder="No Rangka" required autocomplete="off">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="inputNama" class="form-label">No Mesin</label>
                            <input type="text" name="nomesin" class="form-control" id="inputMerk" placeholder="No Mesin" required autocomplete="off">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="inputNama" class="form-label">Plat Nomor</label>
                            <input type="text" name="noplat" class="form-control" id="inputMerk" placeholder="Plat Nomor" required autocomplete="off">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="inputNama" class="form-label">Tahun Pembuatan</label>
                            <input type="text" name="tahunbuat" class="form-control" id="inputMerk" placeholder="Tahun Pembuatan" required autocomplete="off">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="inputNama" class="form-label">BBM</label>
                            <input type="text" name="bbm" class="form-control" id="inputMerk" placeholder="Jenis BBM" required autocomplete="off">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="inputNama" class="form-label">Warna</label>
                            <input type="text" name="warna" class="form-control" id="inputMerk" placeholder="Warna Mobil" required autocomplete="off">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="inputNama" class="form-label">Jumlah Kursi</label>
                            <input type="text" name="jumlahkursi" class="form-control" id="inputMerk" placeholder="Jumlah Kursi" required autocomplete="off">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="inputNama" class="form-label">Harga Sewa</label>
                            <input type="text" name="harga" class="form-control" id="inputMerk" placeholder="Harga Sewa" required autocomplete="off">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="inputNama" class="form-label">Foto Bagian Depan</label>
                            <input type="file" name="fdepan" class="form-control" id="imageUploadKTP" onchange="readURLKTP(this);" required autocomplete="off">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="inputNama" class="form-label">Foto Bagian Samping</label>
                            <input type="file" name="fsamping" class="form-control" id="imageUploadKTP" onchange="readURLKTP(this);" required autocomplete="off">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="inputNama" class="form-label">Foto Bagian Belakang</label>
                            <input type="file" name="fbelakang" class="form-control" id="imageUploadKTP" onchange="readURLKTP(this);" required autocomplete="off">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="inputNama" class="form-label">Foto Bagian Interior</label>
                            <input type="file" name="finterior" class="form-control" id="imageUploadKTP" onchange="readURLKTP(this);" required autocomplete="off">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="inputNama" class="form-label">Catatan</label>
                            <textarea name="catatan" class="form-control" id="inputMerk" required autocomplete="off"></textarea>
                        </div>
                        <div class="col-md-12 col-sm-6">
                            <a href=".?pagedaftar=mobil" class="btn btn-secondary">Batalkan</a>
                            <button class="btn btn-primary float-end" name="tambah">Tambah</button>
                        </div>
                    </div>
                </form>

                <?php
                if (isset($_POST["tambah"])) {
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
                    $status = "Tersedia";
                    // foto
                    $namaFMobilDepan = $id_mobil . "_fotoMobilDepan_";
                    $fotoDepan = upload($namaFMobilDepan, "fdepan", "mobil");
                    if (!$fotoDepan) {
                        return false;
                    }
                    $namaFMobilSamping = $id_mobil . "_fotoMobilSamping_";
                    $fotoSamping = upload($namaFMobilSamping, "fsamping", "mobil");
                    if (!$fotoSamping) {
                        return false;
                    }
                    $namaFMobilBelakang = $id_mobil . "_fotoMobilBelakang_";
                    $fotoBelakang = upload($namaFMobilBelakang, "fbelakang", "mobil");
                    if (!$fotoBelakang) {
                        return false;
                    }
                    $namaFMobilInterior = $id_mobil . "_fotoMobilInterior_";
                    $fotoInterior = upload($namaFMobilInterior, "finterior", "mobil");
                    if (!$fotoInterior) {
                        return false;
                    }
                    // insert
                    $query1 = "INSERT INTO mobil 
                        VALUES('$id_mobil', '$merk', '$jenismobil', '$norangka', '$nomesin', '$noplat', '$tahunbuat', '$bbm', '$warna', '$status', '$jumlahkursi', '$harga', '$catatan')
                    ";
                    $send1 =  mysqli_query($connect, $query1);
                    $query2 = "INSERT INTO kondisi_mobil 
                        VALUES('', '$id_mobil', '$fotoDepan', '$fotoBelakang', '$fotoSamping', '$fotoInterior')
                    ";
                    $send2 = mysqli_query($connect, $query2);
                    echo "<script>location='.?page=mobil'</script>";
                }
                ?>


            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
</div> <!-- end col -->