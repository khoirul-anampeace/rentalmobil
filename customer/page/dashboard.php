<section class="content customer" id="mainDashboard">
    <div class="container" id="">
        <h1>Pilih Layanan Rental</h1>
        <div class="row pilihlayanan">
            <a href=".?page=mobilLepasKunci" class="col-md-4 col-sm-12">
                <div>
                    <img src="../assets/images/profileImage/img-lepaskunci.png">
                    <h3>Lepas Kunci</h3>
                    <p>Merupakan layanan lepas kunci dengan beberapa persyaratan yang harus dipenuhi</p>
                </div>
            </a>
            <a href="#" class="col-md-4 col-sm-12">
                <div>
                    <img src="../assets/images/profileImage/img-mobilsopir.png">
                    <h3>Mobil + Driver</h3>
                    <p>Merupakan layanan sewa mobil + driver</p>
                </div>
            </a>
        </div>
        <h1>Transaksi Terbaru</h1>
        <?php
        $transaksiterbaru = query("SELECT t.*, p.*, m.*, km.*, c.* FROM transaksi t JOIN pembayaran p ON t.id_transaksi = p.id_transaksi JOIN mobil m ON t.id_mobil = m.id_mobil JOIN kondisi_mobil km ON m.id_mobil = km.id_mobil JOIN customer c ON t.id_customer = c.id_customer WHERE t.jenis_transaksi = 'lepas kunci' AND t.status_transaksi = 'Menunggu Konfirmasi' OR t.status_transaksi = 'Survei Lokasi'");
        $no = 1;
        foreach ($transaksiterbaru as $row) :
        ?>
            <div class="row histori">
                <div class="col-md-8 col-sm-12 row box">
                    <div class="col-4 img-histori">
                        <img src="../assets/images/mobil/<?= $row["depan"] ?>">
                    </div>
                    <div class="col-8  text-histori">
                        <h5><?= $row["merk"] ?></h5>
                        <p><?= $row["no_plat"] ?></p>
                        <p><?= rupiah($row["harga"]) ?></p>
                        <p>Status : “<?= $row["status_transaksi"] ?>”</p>
                        <!-- <a href="" class="btn btn-danger">BATALKAN</a> -->
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>