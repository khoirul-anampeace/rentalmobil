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
            $no = 1;
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
                        if ($row["status_transaksi"] == "Menunggu Konfirmasi" ||  $row["status_transaksi"] == "Survei Lokasi") {
                        ?>
                            <form method="POST">
                                <button name="batalkan" class="btn btn-danger float-end">Batalkan</button>
                            </form>
                        <?php
                        }
                        if (isset($_POST["batalkan"])) {
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
                <h5 class="mt-3">Detail </h5>
                <div class="row detailTransaksi">
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
                    <div class="col-md-6">
                        <div class="img-detailTransaksi">
                            <img src="../assets/images/transaksi/TRS002_fotoBuktiPembayaran_.png" alt="">
                        </div>
                    </div>
                </div>
                <h5 class="mt-5">Catan</h5>
                <p><?= $row["catatan"] ?></p>
            <?php endforeach; ?>
        </div>
    </div>
</section>