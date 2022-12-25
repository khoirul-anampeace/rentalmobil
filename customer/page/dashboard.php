<?php
$lepasKunci = ".?page=pilihMobil&jenis_sewa=lepasKunci";
$denganDriver = ".?page=pilihMobil&jenis_sewa=denganDriver";
?>
<section class="content customer" id="mainDashboard">
    <div class="container" id="">
        <h1>Pilih Layanan Rental</h1>
        <div class="row pilihlayanan">
            <a href="<?= $lepasKunci ?>" class="col-md-4 col-sm-12">
                <div>
                    <img src="../assets/images/profileImage/img-lepaskunci.png">
                    <h3>Lepas Kunci</h3>
                    <p>Merupakan layanan lepas kunci dengan beberapa persyaratan yang harus dipenuhi</p>
                </div>
            </a>
            <a href="<?= $denganDriver ?>" class="col-md-4 col-sm-12">
                <div>
                    <img src="../assets/images/profileImage/img-mobilsopir.png">
                    <h3>Mobil + Driver</h3>
                    <p>Merupakan layanan sewa mobil + driver</p>
                </div>
            </a>
        </div>
        <h1>Transaksi Terbaru</h1>
        <?php
        $getIdCustomer = $_SESSION["id_customer"];
        $transaksiterbaru = query("SELECT t.*, p.*, m.*, km.*, c.* FROM transaksi t JOIN pembayaran p ON t.id_transaksi = p.id_transaksi JOIN mobil m ON t.id_mobil = m.id_mobil JOIN kondisi_mobil km ON m.id_mobil = km.id_mobil JOIN customer c ON t.id_customer = c.id_customer WHERE  t.id_customer = '$getIdCustomer' AND (t.status_transaksi = 'Menunggu Konfirmasi' OR t.status_transaksi = 'Survei Lokasi' OR t.status_transaksi = 'Sedang Dalam Peminjaman') ORDER BY t.id_transaksi DESC");
        // echo "baris" . mysqli_affected_rows($connect);
        $jumlahDatatransaksi = mysqli_query($connect, "SELECT t.*, p.*, m.*, km.*, c.* FROM transaksi t JOIN pembayaran p ON t.id_transaksi = p.id_transaksi JOIN mobil m ON t.id_mobil = m.id_mobil JOIN kondisi_mobil km ON m.id_mobil = km.id_mobil JOIN customer c ON t.id_customer = c.id_customer WHERE  t.id_customer = '$getIdCustomer' AND (t.status_transaksi = 'Menunggu Konfirmasi' OR t.status_transaksi = 'Survei Lokasi' OR t.status_transaksi = 'Sedang Dalam Peminjaman')");
        // echo "total data " . mysqli_num_rows($jumlahDatatransaksi);
        if (mysqli_num_rows($jumlahDatatransaksi) == 0) {
            echo "<p>Belum Ada Transaksi Baru</p>";
        } else {
            foreach ($transaksiterbaru as $row) :
                $statusSewa = $row['status_transaksi'];
                if ($statusSewa == "Survei Lokasi") {
                    // $statusSewa = "Menunggu konfirmasi";
                    $statusSewa = "Silahkan menunggu, petugas kami akan melakukan survei ke rumah anda";
                } else if ($statusSewa == "Menunggu Konfirmasi") {
                    $statusSewa = "Menunggu Konfirmasi";
                }
        ?>
                <div class="row histori">
                    <div class="col-md-6 col-sm-12 row box mb-3">
                        <div class="col-4 img-histori">
                            <img src="../assets/images/mobil/<?= $row["depan"] ?>">
                        </div>
                        <div class="col-8  text-histori">
                            <div class="row">
                                <div class="col-6">
                                    <h5><?= $row["merk"] ?></h5>
                                </div>
                                <div class="col-6">
                                    <p style="text-align: right;"><?= $row["no_plat"] ?></p>
                                </div>
                            </div>
                            <p><?= $statusSewa ?></p>
                            <!-- <a href="" class="btn btn-danger">BATALKAN</a> -->
                            <p><?= $row["tgl_berangkat"] ?></p>
                            <a href=".?page=detailTransaksi&id_transaksi=<?= $row["id_transaksi"] ?>" class="btn btn-primary">DETAIL</a>
                        </div>
                    </div>
                </div>
        <?php endforeach;
        } ?>
    </div>
</section>