<?php
$ambilID_transaksi = $_GET['id_transaksi'];
if (!isset($_GET['id_transaksi']) || $_GET['id_transaksi'] == "") {
    echo "<script>alert('silahkan pilih transaksi terlebih dahulu')</script>";
    echo "<script>location='.?page=pengembalianLepasKunci'</script>";
}
$transaksi = query("SELECT t.*, p.*, m.*, km.*, c.* FROM transaksi t JOIN pembayaran p ON t.id_transaksi = p.id_transaksi JOIN mobil m ON t.id_mobil = m.id_mobil JOIN kondisi_mobil km ON m.id_mobil = km.id_mobil JOIN customer c ON t.id_customer = c.id_customer WHERE t.jenis_transaksi = 'lepas kunci' AND t.id_transaksi = '$ambilID_transaksi'");
$no = 1;
foreach ($transaksi as $row) :
    $getIdMobil = $row["id_mobil"];
    if ($row["fotoprofil"] != "") {
        $tampilkanprofil = "../assets/images/customer/" . $row["fotoprofil"];
    } else {
        if ($row["jeniskelamin"] == "Perempuan") {
            $tampilkanprofil = "../assets/images/users/woman.png";
        } else {
            $tampilkanprofil = "../assets/images/users/man.png";
        }
    }

    // pengecekan status_transaksi
    if ($row["status_transaksi"] != "Sedang Dalam Sewa") {
        echo "<script>alert('Transaksi tidak dapat diakses')</script>";
        echo "<script>location='.?page=pengembalianLepasKunci'</script>";
    }
?>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">Detail Transaksi</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row" id="detailCustomer">
        <div class="col-xl-6 col-lg-5">
            <div class="card card-h-100">
                <div class="card-body">
                    <h4 class="header-title mb-3"><?= $row["nama_lengkap"] ?></h4>
                    <div class="textDetail">
                        <table>
                            <tr>
                                <td class="first">
                                    <h5>id Transaksi</h5>
                                </td>
                                <td class="second">
                                    <p>: <?= $row["id_transaksi"] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td class="first">
                                    <h5>Merk Mobil</h5>
                                </td>
                                <td>
                                    <p>: <?= $row["merk"] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td class="first">
                                    <h5>Tanggal berangkat</h5>
                                </td>
                                <td>
                                    <p>: <?= $row["tgl_berangkat"] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td class="first">
                                    <h5>Tanggal Kembali</h5>
                                </td>
                                <td>
                                    <p>: <?= $row["tgl_kembali"] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td class="first">
                                    <h5>Daerah Tujuan</h5>
                                </td>
                                <td>
                                    <p>: <?= $row["daerah_tujuan"] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td class="first">
                                    <h5>Keperluan</h5>
                                </td>
                                <td>
                                    <p>: <?= $row["keperluan"] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td class="first">
                                    <h5>Harga Mobil</h5>
                                </td>
                                <td>
                                    <p>: <?= rupiah($row["harga_mobil"]) ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td class="first">
                                    <h5>Lama Sewa</h5>
                                </td>
                                <td>
                                    <p>: <?= $row["lama_sewa"] ?> Hari</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="first">
                                    <h5>Total Harga</h5>
                                </td>
                                <td>
                                    <p>: <?= rupiah($row["total_harga"]) ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td class="first">
                                    <h5>Dp</h5>
                                </td>
                                <td>
                                    <p>: <?= rupiah($row["dp"]) ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td class="first">
                                    <h5>Sisa</h5>
                                </td>
                                <td>
                                    <p>: <?= rupiah($row["sisa"]) ?></p>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
        <div class="col-xl-6 col-lg-6">
            <div class="card card-h-100">
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        <h4 class="header-title mb-3">Status Sewa</h4>
                        <?php
                        date_default_timezone_set('Asia/Jakarta');
                        $tglKembali = $row["tgl_kembali"];
                        $tglSekarang = date('Y-m-d');
                        $tgl1 = strtotime($tglKembali);
                        $tgl2 = strtotime($tglSekarang);



                        $jarak = $tgl2 - $tgl1;

                        $hari = $jarak / 60 / 60 / 24;
                        $biayaKeterlambatan = $row["harga_mobil"] * $hari;
                        // echo "opersi" . $hari;
                        // echo  $tglSekarang - $tglKembali;
                        // echo "</br>" . "kembali" . $tglKembali;
                        // echo "</br>" . "sekarang" . $tglSekarang;
                        $totalDenda = 0;
                        $totalHarusBayar = 0;
                        $totalHarga = 0;
                        $totalLamaSewa = $row["lama_sewa"];
                        if ($hari > 0 && $row["status_transaksi"] == "Sedang Dalam Sewa") {
                            $denda = 10 / 100 * $row["total_harga"];
                            $totalDenda = $denda * $hari;
                            // echo "Denda" . rupiah($denda);
                        ?>
                            <div class="alert alert-danger" role="alert">
                                <i class="dripicons-wrong me-2"></i> <strong>Terlambat</strong> Dikembalikan
                            </div>

                            <p>Keterlambatan : <b><?= $hari ?> (Hari)</b></p>
                            <p>Biaya keterlambatan : <b>Rp <?= rupiah($biayaKeterlambatan) ?></b></p>
                            <p>Denda perhari(10% total harga) : <b>Rp <?= rupiah($denda) ?></b></p>
                            <p>Total denda : <b>Rp <?= rupiah($totalDenda) ?></b></p>

                        <?php
                            $totalHarusBayar = $biayaKeterlambatan + $totalDenda + $row["sisa"];
                            $totalHarga = $biayaKeterlambatan + $totalDenda + $row["total_harga"];
                            $statusSewa = "Sewa Selesai (Terlambat)";
                            $totalLamaSewa = $row["lama_sewa"] + $hari;
                        } else {
                        ?>
                            <p>Status : <b><?= $row["status_transaksi"] ?></b></p>
                        <?php
                            $totalHarusBayar = $row["sisa"];
                            $totalHarga = $row["total_harga"];
                            $statusSewa = "Sewa Selesai";
                            $totalLamaSewa = $row["lama_sewa"];
                        }
                        ?>

                        <p>Sisa pembayaran : <b>Rp <?= rupiah($row["sisa"]) ?></b></p>
                        <p>Total yang harus Dibayar : <b>Rp <?= rupiah($totalHarusBayar) ?></b></p>
                        <div class="mb-2">
                            <!-- <label for="inputNama" class="form-label">Denda</label> -->
                            <input type="number" readonly value="<?= $totalDenda ?>" name="denda" class="form-control" id="inputMerk" autofocus autocomplete="off">
                        </div>
                        <!-- <div class="mb-2">
                            <label for="inputNama" class="form-label">Total Harga</label>
                            <input type="number" readonly value="<?= $totalHarga ?>" name="total_harga" class="form-control" id="inputMerk" autofocus autocomplete="off">
                        </div> -->
                        <div class="mb-2">
                            <label for="inputNama" class="form-label">Catatan</label>
                            <textarea name="inCatatan" class="form-control" id="inputNama" placeholder="Masukkan Catatan Transaksi" required autocomplete="off"></textarea>
                        </div>
                        <button style="width: 100%;" name="kembalikan" class="btn btn-primary mt-3" style="width: 10rem;">Kembalikan</button>
                    </form>
                    <?php
                    if (isset($_POST["kembalikan"])) {
                        $catatan_sewa = $_POST["inCatatan"];
                        $dendabayar = $_POST["denda"];
                        $query1 = "UPDATE pembayaran SET denda = '$dendabayar', total_harga = '$totalHarga'  WHERE id_transaksi = '$ambilID_transaksi'";
                        $send1 = mysqli_query($connect, $query1);

                        $query2 = "UPDATE transaksi SET status_transaksi = '$statusSewa', catatan_transaksi = '$catatan_sewa', lama_sewa = '$totalLamaSewa' WHERE id_transaksi = '$ambilID_transaksi'";
                        $send2 = mysqli_query($connect, $query2);

                        $query3 = "UPDATE mobil SET status_mobil = 'Tersedia' WHERE id_mobil = '$getIdMobil'";
                        $send3 = mysqli_query($connect, $query3);
                        echo "<script>alert('Sewa selesai')</script>";
                        echo "<script>location='.?page=pengembalianLepasKunci'</script>";
                    }
                    ?>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
    </div>

    <div class="row" id="detailCustomer">
        <div class="col-xl-3 col-lg-3">
            <div class="card tilebox-one">
                <div class="card-body">
                    <h5 class="text-uppercase mt-0">Foto Bagian Depan</h5>
                    <img src="../assets/images/mobil/<?= $row["depan"] ?>" width="100%" height="100%">
                </div> <!-- end card-body-->
            </div>
            <!--end card-->
        </div> <!-- end col -->
        <div class="col-xl-3 col-lg-3">
            <div class="card tilebox-one">
                <div class="card-body">
                    <h5 class="text-uppercase mt-0">Foto Bagian Samping</h5>
                    <img src="../assets/images/mobil/<?= $row["samping"] ?>" width="100%" height="100%">
                </div> <!-- end card-body-->
            </div>
            <!--end card-->
        </div> <!-- end col -->
        <div class="col-xl-3 col-lg-3">
            <div class="card tilebox-one">
                <div class="card-body">
                    <h5 class="text-uppercase mt-0">Foto Bagian Belakang</h5>
                    <img src="../assets/images/mobil/<?= $row["belakang"] ?>" width="100%" height="100%">
                </div> <!-- end card-body-->
            </div>
            <!--end card-->
        </div> <!-- end col -->
        <div class="col-xl-3 col-lg-3">
            <div class="card tilebox-one">
                <div class="card-body">
                    <h5 class="text-uppercase mt-0">Foto Interior Mobil</h5>
                    <img src="../assets/images/mobil/<?= $row["interior"] ?>" width="100%" height="100%">
                </div> <!-- end card-body-->
            </div>
            <!--end card-->
        </div> <!-- end col -->


    </div>

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">Detail Customer</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row" id="detailCustomer">
        <div class="col-xl-6 col-lg-5">
            <div class="card card-h-100">
                <div class="card-body">
                    <!-- <h4 class="header-title mb-3"><?= $row["nama_lengkap"] ?></h4> -->
                    <div class="textDetail">

                        <table>
                            <tr>
                                <td class="first">
                                    <h5>id Customer</h5>
                                </td>
                                <td class="second">
                                    <p>: <?= $row["id_customer"] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td class="first">
                                    <h5>NIK</h5>
                                </td>
                                <td>
                                    <p>: <?= $row["nik"] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td class="first">
                                    <h5>Username</h5>
                                </td>
                                <td>
                                    <p>: <?= $row["username"] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td class="first">
                                    <h5>Tanggal Lahir</h5>
                                </td>
                                <td>
                                    <p>: <?= $row["tanggal_lahir"] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td class="first">
                                    <h5>Tempat Lahir</h5>
                                </td>
                                <td>
                                    <p>: <?= $row["tempat_lahir"] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td class="first">
                                    <h5>Jenis Kelamin</h5>
                                </td>
                                <td>
                                    <p>: <?= $row["jeniskelamin"] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td class="first">
                                    <h5>Telp (WA)</h5>
                                </td>
                                <td>
                                    <p>: <?= $row["telp"] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td class="first">
                                    <h5>Email</h5>
                                </td>
                                <td>
                                    <p>: <?= $row["email"] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td class="first">
                                    <h5>Alamat KTP</h5>
                                </td>
                                <td>
                                    <p>: <?= $row["alamat_asli"] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td class="first">
                                    <h5>Alamat Domisili</h5>
                                </td>
                                <td>
                                    <p>: <?= $row["domisili"] ?></p>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
        <div class="col-xl-6 col-lg-7">
            <div class="card tilebox-one">
                <div class="card-body">
                    <h5 class="text-uppercase mt-0">Foto Profil</h5>
                    <img src="<?= $tampilkanprofil ?>" width="100%" height="100%">
                </div> <!-- end card-body-->
            </div>
            <!--end card-->

            <!-- <div class="card tilebox-one">
                <div class="card-body">
                    <h5 class="text-uppercase mt-0">ACTION</h5>
                    <div class="btn btn-danger w-100">SUSPEND AKUN</div>
                </div>
            </div> -->
            <!--end card-->
        </div> <!-- end col -->

    </div>
    <div class="row" id="detailCustomer">
        <div class="col-xl-6 col-lg-7">
            <div class="card tilebox-one">
                <div class="card-body">
                    <h5 class="text-uppercase mt-0">Foto KTP</h5>
                    <img src="../assets/images/customer/<?= $row["fotoktp"] ?>" width="100%" height="100%">
                </div> <!-- end card-body-->
            </div>
            <!--end card-->
        </div> <!-- end col -->
        <div class="col-xl-6 col-lg-7">
            <div class="card tilebox-one">
                <div class="card-body">
                    <h5 class="text-uppercase mt-0">Foto KTP + Wajah</h5>
                    <img src="../assets/images/customer/<?= $row["fotoktpwajah"] ?>" width="100%" height="100%">
                </div> <!-- end card-body-->
            </div>
            <!--end card-->
        </div> <!-- end col -->
        <div class="col-xl-6 col-lg-7">
            <div class="card tilebox-one">
                <div class="card-body">
                    <h5 class="text-uppercase mt-0">Foto SIM</h5>
                    <img src="../assets/images/customer/<?= $row["fotosim"] ?>" width="100%" height="100%">
                </div> <!-- end card-body-->
            </div>
            <!--end card-->
        </div> <!-- end col -->
        <div class="col-xl-6 col-lg-7">
            <div class="card tilebox-one">
                <div class="card-body">
                    <h5 class="text-uppercase mt-0">Foto KK</h5>
                    <img src="../assets/images/customer/<?= $row["fotokk"] ?>" width="100%" height="100%">
                </div> <!-- end card-body-->
            </div>
            <!--end card-->
        </div> <!-- end col -->
        <div class="col-xl-12 col-lg-12">
            <div class="card tilebox-one">
                <div class="card-body">
                    <h5 class="text-uppercase mt-0">Bukti DP</h5>
                    <img src="../assets/images/transaksi/<?= $row["bukti_dp"] ?>" width="100%" height="100%">
                </div> <!-- end card-body-->
            </div>
            <!--end card-->
        </div> <!-- end col -->
        <div class="col-md-12 col-sm-6">
            <!-- <a href=".?page=transaksiBaruLepasKunci" style="width: 10rem;" class="btn btn-secondary">Batalkan</a> -->

        </div>

    </div>
<?php
endforeach;
?>