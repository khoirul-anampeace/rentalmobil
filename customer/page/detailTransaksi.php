<section class="content customer" id="mainMobil">
    <div class="container" id="">
        <h1>Detail Transaksi</h1>
        <div class="row detailmobil">
            <?php
            // Pengecekan id transaksi
            if (!isset($_GET["id_transaksi"]) || $_GET["id_transaksi"] == "") {
                echo "<script>alert('Silahkan pilih transaksi terlebih dahulu')</script>";
                echo "<script>location='.?page=historiTransaksi'</script>";
            }
            $getIdCustomer = $_SESSION["id_customer"];
            $getIdTransaksi = $_GET["id_transaksi"];
            $mobil = query("SELECT t.*, p.*, m.*, km.*, c.* FROM transaksi t JOIN pembayaran p ON t.id_transaksi = p.id_transaksi JOIN mobil m ON t.id_mobil = m.id_mobil JOIN kondisi_mobil km ON m.id_mobil = km.id_mobil JOIN customer c ON t.id_customer = c.id_customer WHERE t.id_transaksi = '$getIdTransaksi'");
            $jumlahDatatransaksi = mysqli_query($connect, "SELECT t.*, p.*, m.*, km.*, c.* FROM transaksi t JOIN pembayaran p ON t.id_transaksi = p.id_transaksi JOIN mobil m ON t.id_mobil = m.id_mobil JOIN kondisi_mobil km ON m.id_mobil = km.id_mobil JOIN customer c ON t.id_customer = c.id_customer WHERE t.id_transaksi = '$getIdTransaksi'");
            // echo "total data " . mysqli_num_rows($jumlahDatatransaksi);
            if (mysqli_num_rows($jumlahDatatransaksi) == 0) {
                echo "<script>alert('Data Tidak Ditemukan')</script>";
                echo "<script>location='.?page=historiTransaksi'</script>";
            }
            foreach ($mobil as $row) :
                // check user
                if ($_SESSION["id_customer"] != $row["id_customer"]) {
                    echo "<script>alert('Anda tidak mimiliki hak melihat transaksi ini')</script>";
                    echo "<script>location='.?page=historiTransaksi'</script>";
                }

                // checkout check
                // if ($_GET["jenis_sewa"] == "lepasKunci") {
                //     $checkout = ".?page=checkoutLepasKunci&id_mobil=" . $row["id_mobil"];
                // } else if ($_GET["jenis_sewa"] == "denganDriver") {
                //     $checkout = ".?page=checkoutDenganDriver&id_mobil=" . $row["id_mobil"];
                // } else {
                //     echo "<script>alert('Silahkan pilih jenis sewa terlebih dahulu')</script>";
                //     echo "<script>location='.?page=dashboard'</script>";
                // }
            ?>
                <div class="row detail">
                    <div class="col-md-3 img-detailmobil">
                        <img src="../assets/images/mobil/<?= $row["depan"] ?>">
                    </div>
                    <div class="col-md-7 text-detailmobil" style="padding-top: 15px;">
                        <!-- <h5>Nama Unit &emsp;&nbsp;&ensp;: Limousine Cadilac One </h5>
                        <h5>Harga Sewa &emsp;: Limousine Cadilac One </h5>
                        <h5>Plat Nomer &emsp;&nbsp; : Limousine Cadilac One </h5>
                        <h5>Warna &emsp; : Limousine Cadilac One </h5> -->

                        <h5 class="titleTransaksi"><?= $row["merk"] ?></h5>
                        <h5 class="titleTransaksi"><?= $row["warna"] ?></h5>
                        <h5 class="titleTransaksi"> <?= $row["no_plat"] ?></h5>
                        <h5 class="titleTransaksi"> <?= $row["status_transaksi"] ?></h5>
                    </div>
                    <div class="col-md-2 button-detailmobil">
                        <?php
                        require("barcode.php");
                        $transaksi_code = $getIdTransaksi . "_" . $row["merk"] . "_" . $row["nama_lengkap"];
                        echo '<img class="barcode" src="data:image/png;base64,' . base64_encode($generator->getBarcode($transaksi_code, $generator::TYPE_CODE_128)) . '">';

                        // check untuk button
                        if ($row["status_transaksi"] == "Menunggu Konfirmasi" ||  $row["status_transaksi"] == "Survei Lokasi") {
                        ?>
                            <form method="POST">
                                <button style="width: 100%;" name="batalkan" class="btn btn-danger float-end">Batalkan</button>
                            </form>
                        <?php
                        }
                        if (isset($_POST["batalkan"])) {
                            echo "<script>confirm('Apakah anda yakin ingin membatalkan transaksi?')</script>";
                            $statusnow = "Sewa Dibatalkan";
                            $query = "UPDATE transaksi SET status_transaksi = '$statusnow' WHERE id_transaksi = '$getIdTransaksi'";
                            $send = mysqli_query($connect, $query);

                            $id_mobil = $row["id_mobil"];
                            $status_mobil = "Tersedia";
                            $query3 = "UPDATE mobil SET status_mobil = '$status_mobil' WHERE id_mobil = '$id_mobil'";
                            $send3 = mysqli_query($connect, $query3);
                            echo "<script>location='.?page=detailTransaksi&id_transaksi=$getIdTransaksi'</script>";
                        }
                        ?>
                    </div>
                </div>
                <div class="row detailTransaksi">
                    <?php
                    if ($row["status_transaksi"] == "Sewa Selesai (Terlambat)") {
                    ?>
                        <div class="alert alert-danger" style="padding: 18px 10px; margin-bottom: 5px;" role="alert">
                            <i class="dripicons-wrong me-2"></i> <strong>Terlambat</strong> Mengembalikan
                        </div>
                    <?php
                    }
                    if ($row["status_transaksi"] == "Sedang Dalam Sewa") {
                    ?>
                        <div class="col-12 text-detailTransaksi">
                            <h5 class="header-title mb-3">Pembayaran</h5>
                            <!-- Nota Pembayara -->
                            <?php
                            date_default_timezone_set('Asia/Jakarta');
                            $tglKembali = $row["tgl_kembali"];
                            $tglSekarang = date('Y-m-d');
                            $tgl1 = strtotime($tglKembali);
                            $tgl2 = strtotime($tglSekarang);



                            $jarak = $tgl2 - $tgl1;

                            $hari = $jarak / 60 / 60 / 24;
                            $biayaKeterlambatan = $row["harga_mobil"] * $hari;
                            $biayaTambahanSopir = 0;
                            if ($row["jenis_transaksi"] == "dengan driver") {
                                $biayaTambahanSopir = $row["tarif_driver"] * $hari;
                            } else {
                                $biayaTambahanSopir = 0;
                            }
                            // echo "opersi" . $hari;
                            // echo  $tglSekarang - $tglKembali;
                            // echo "</br>" . "kembali" . $tglKembali;
                            // echo "</br>" . "sekarang" . $tglSekarang;
                            $totalDenda = 0;
                            $totalHarusBayar = 0;
                            $totalHarga = 0;
                            if ($hari > 0 && $row["status_transaksi"] == "Sedang Dalam Sewa") {
                                $denda = 10 / 100 * $row["total_harga"];
                                $totalDenda = $denda * $hari;
                                // echo "Denda" . rupiah($denda);

                                $totalHarusBayar = $biayaKeterlambatan + $totalDenda + $row["sisa"] + $biayaTambahanSopir;
                                $totalHarga = $biayaKeterlambatan + $totalDenda + $row["total_harga"] + $biayaTambahanSopir;
                                $statusSewa = "Sewa Selesai (Terlambat)";
                            ?>
                                <div class="alert alert-danger" style="padding: 18px 10px; margin-bottom: 5px;" role="alert">
                                    <p>Anda Telah <strong>Melebihi</strong> Dari Masa Sewa</p>

                                    <p>Keterlambatan : <b><?= $hari ?> (Hari)</b></p>
                                    <p>Biaya keterlambatan mobil : <b>Rp <?= rupiah($biayaKeterlambatan) ?></b></p>
                                    <?php
                                    if ($row["jenis_transaksi"] == "dengan driver") {
                                    ?>
                                        <p>Biaya tambahan sopir : <b>Rp <?= rupiah($biayaTambahanSopir) ?></b></p>
                                    <?php
                                    } else {
                                        $biayaTambahanSopir = 0;
                                    }
                                    ?>
                                    <p>Denda perhari(10% total harga) : <b>Rp <?= rupiah($denda) ?></b></p>
                                    <p>Total denda : <b>Rp <?= rupiah($totalDenda) ?></b></p>
                                    <p>Sisa pembayaran : <b>Rp <?= rupiah($row["sisa"]) ?></b></p>
                                    <p>Total yang harus Dibayar : <b>Rp <?= rupiah($totalHarusBayar) ?></b></p>
                                </div>


                            <?php
                            } else {
                                $totalHarusBayar = $row["sisa"];
                                $totalHarga = $row["total_harga"];
                                $statusSewa = "Sewa Selesai";
                            ?>
                                <!-- <p>Status : <b><?= $row["status_transaksi"] ?></b></p> -->
                                <div class="alert alert-info" style="padding: 18px 10px;" role="alert">
                                    <p>Sisa pembayaran : <b>Rp <?= rupiah($row["sisa"]) ?></b></p>
                                    Total yang harus Dibayar : <b>Rp <?= rupiah($totalHarusBayar) ?></b>
                                </div>
                            <?php
                            }
                            ?>
                            <!-- Nota pembayaran -->
                        </div>
                    <?php
                    }
                    ?>
                    <h5 class="mt-3">Detail </h5>
                    <?php
                    if ($row["status_transaksi"] == "Survei Lokasi" || $row["status_transaksi"] == "Menunggu Konfirmasi") {
                    ?>
                        <div class="col-md-6 text-detailTransaksi">
                            <table>
                                <tr>
                                    <td class="first">
                                        <h6>Merk Mobil</h6>
                                    </td>
                                    <td>
                                        <p>: <?= $row["merk"] ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first">
                                        <h6>Tanggal berangkat</h6>
                                    </td>
                                    <td>
                                        <p>: <?= $row["tgl_berangkat"] ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first">
                                        <h6>Tanggal Kembali</h6>
                                    </td>
                                    <td>
                                        <p>: <?= $row["tgl_kembali"] ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first">
                                        <h6>Daerah Tujuan</h6>
                                    </td>
                                    <td>
                                        <p>: <?= $row["daerah_tujuan"] ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first">
                                        <h6>Keperluan</h6>
                                    </td>
                                    <td>
                                        <p>: <?= $row["keperluan"] ?></p>
                                    </td>
                                </tr>
                            </table>

                        </div>
                        <div class="col-md-6 text-detailTransaksi">
                            <table>
                                <tr>
                                    <td class="first">
                                        <h6>Harga Mobil</h6>
                                    </td>
                                    <td>
                                        <p>: Rp <?= rupiah($row["harga_mobil"]) ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first">
                                        <h6>Lama Sewa</h6>
                                    </td>
                                    <td>
                                        <p>: Rp <?= $row["lama_sewa"] ?> Hari</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first">
                                        <h6>Total Harga</h6>
                                    </td>
                                    <td>
                                        <p>: Rp <?= rupiah($row["total_harga"]) ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first">
                                        <h6>Dp</h6>
                                    </td>
                                    <td>
                                        <p>: Rp <?= rupiah($row["dp"]) ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first">
                                        <h6>Sisa</h6>
                                    </td>
                                    <td>
                                        <p>: Rp <?= rupiah($row["sisa"]) ?></p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    <?php
                    } else if ($row["status_transaksi"] == "Sedang Dalam Sewa") {
                    ?>
                        <div class="col-md-6 text-detailTransaksi">
                            <table>
                                <tr>
                                    <td class="first">
                                        <h6>Merk Mobil</h6>
                                    </td>
                                    <td>
                                        <p>: <?= $row["merk"] ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first">
                                        <h6>Tanggal berangkat</h6>
                                    </td>
                                    <td>
                                        <p>: <?= $row["tgl_berangkat"] ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first">
                                        <h6>Tanggal Kembali</h6>
                                    </td>
                                    <td>
                                        <p>: <?= $row["tgl_kembali"] ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first">
                                        <h6>Daerah Tujuan</h6>
                                    </td>
                                    <td>
                                        <p>: <?= $row["daerah_tujuan"] ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first">
                                        <h6>Keperluan</h6>
                                    </td>
                                    <td>
                                        <p>: <?= $row["keperluan"] ?></p>
                                    </td>
                                </tr>
                            </table>

                        </div>
                        <div class="col-md-6 text-detailTransaksi">
                            <table>
                                <tr>
                                    <td class="first">
                                        <h6>Harga Mobil</h6>
                                    </td>
                                    <td>
                                        <p>: Rp <?= rupiah($row["harga_mobil"]) ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first">
                                        <h6>Lama Sewa</h6>
                                    </td>
                                    <td>
                                        <p>: Rp <?= $row["lama_sewa"] ?> Hari</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first">
                                        <h6>Total Harga</h6>
                                    </td>
                                    <td>
                                        <p>: Rp <?= rupiah($row["total_harga"]) ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first">
                                        <h6>Dp</h6>
                                    </td>
                                    <td>
                                        <p>: Rp <?= rupiah($row["dp"]) ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first">
                                        <h6>Sisa</h6>
                                    </td>
                                    <td>
                                        <p>: Rp <?= rupiah($row["sisa"]) ?></p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    <?php
                    } else if ($row["status_transaksi"] == "Sewa Selesai (Terlambat)") {
                    ?>
                        <div class="col-md-6 text-detailTransaksi">
                            <table>
                                <tr>
                                    <td class="first">
                                        <h6>Merk Mobil</h6>
                                    </td>
                                    <td>
                                        <p>: <?= $row["merk"] ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first">
                                        <h6>Tanggal berangkat</h6>
                                    </td>
                                    <td>
                                        <p>: <?= $row["tgl_berangkat"] ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first">
                                        <h6>Tanggal Kembali</h6>
                                    </td>
                                    <td>
                                        <p>: <?= $row["tgl_kembali"] ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first">
                                        <h6>Daerah Tujuan</h6>
                                    </td>
                                    <td>
                                        <p>: <?= $row["daerah_tujuan"] ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first">
                                        <h6>Keperluan</h6>
                                    </td>
                                    <td>
                                        <p>: <?= $row["keperluan"] ?></p>
                                    </td>
                                </tr>
                            </table>

                        </div>
                        <div class="col-md-6 text-detailTransaksi">
                            <table>
                                <tr>
                                    <td class="first">
                                        <h6>Harga Mobil</h6>
                                    </td>
                                    <td>
                                        <p>: Rp <?= rupiah($row["harga_mobil"]) ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first">
                                        <h6>Lama Sewa</h6>
                                    </td>
                                    <td>
                                        <p>: Rp <?= $row["lama_sewa"] ?> Hari</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first">
                                        <h6>Total Harga</h6>
                                    </td>
                                    <td>
                                        <p>: Rp <?= rupiah($row["total_harga"]) ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first">
                                        <h6>Dp</h6>
                                    </td>
                                    <td>
                                        <p>: Rp <?= rupiah($row["dp"]) ?></p>
                                    </td>
                                </tr>
                                <tr style="background-color: #f8d7da; border: 1.5px solid #f5c2c7;">
                                    <td class="first">
                                        <h6>Denda</h6>
                                    </td>
                                    <td>
                                        <p>: Rp <?= rupiah($row["denda"]) ?></p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="col-md-6 text-detailTransaksi">
                            <table>
                                <tr>
                                    <td class="first">
                                        <h6>Merk Mobil</h6>
                                    </td>
                                    <td>
                                        <p>: <?= $row["merk"] ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first">
                                        <h6>Tanggal berangkat</h6>
                                    </td>
                                    <td>
                                        <p>: <?= $row["tgl_berangkat"] ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first">
                                        <h6>Tanggal Kembali</h6>
                                    </td>
                                    <td>
                                        <p>: <?= $row["tgl_kembali"] ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first">
                                        <h6>Daerah Tujuan</h6>
                                    </td>
                                    <td>
                                        <p>: <?= $row["daerah_tujuan"] ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first">
                                        <h6>Keperluan</h6>
                                    </td>
                                    <td>
                                        <p>: <?= $row["keperluan"] ?></p>
                                    </td>
                                </tr>
                            </table>

                        </div>
                        <div class="col-md-6 text-detailTransaksi">
                            <table>
                                <tr>
                                    <td class="first">
                                        <h6>Harga Mobil</h6>
                                    </td>
                                    <td>
                                        <p>: <?= rupiah($row["harga_mobil"]) ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first">
                                        <h6>Lama Sewa</h6>
                                    </td>
                                    <td>
                                        <p>: <?= $row["lama_sewa"] ?> Hari</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first">
                                        <h6>Total Harga</h6>
                                    </td>
                                    <td>
                                        <p>: <?= rupiah($row["total_harga"]) ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first">
                                        <h6>Dp</h6>
                                    </td>
                                    <td>
                                        <p>: <?= rupiah($row["dp"]) ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first">
                                        <h6>Sisa</h6>
                                    </td>
                                    <td>
                                        <p>: <?= rupiah($row["sisa"]) ?></p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    <?php
                    }
                    ?>

                    <div class="col-12 text-detailTransaksi">
                        <h5 class="mt-5">Catatan Transaksi</h5>
                        <p><?= $row["catatan_transaksi"] ?></p>
                    </div>
                </div>

                <h5 class="header-title mb-3">Bukti Dp</h5>
                <div class="img-detailTransaksi">
                    <img src="../assets/images/transaksi/<?= $row["bukti_dp"] ?>" alt="">
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</section>