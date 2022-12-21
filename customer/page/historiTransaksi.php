<section class="content customer" id="mainDashboard">
    <div class="container" id="">
        <h1>Histori Transaksi</h1>
        <div class="row histori">
            <?php
            $getIdCustomer = $_SESSION["id_customer"];
            $transaksiterbaru = query("SELECT t.*, p.*, m.*, km.*, c.* FROM transaksi t JOIN pembayaran p ON t.id_transaksi = p.id_transaksi JOIN mobil m ON t.id_mobil = m.id_mobil JOIN kondisi_mobil km ON m.id_mobil = km.id_mobil JOIN customer c ON t.id_customer = c.id_customer WHERE t.jenis_transaksi = 'lepas kunci' AND t.id_customer = '$getIdCustomer' ORDER BY t.id_transaksi DESC");
            // echo "baris" . mysqli_affected_rows($connect);
            foreach ($transaksiterbaru as $row) :
                $statusSewa = $row['status_transaksi'];
                if ($statusSewa == "Survei Lokasi") {
                    // $statusSewa = "Menunggu konfirmasi";
                    $statusSewa = "Silahkan menunggu, petugas kami akan melakukan survei ke rumah anda";
                } else if ($statusSewa == "Menunggu Konfirmasi") {
                    $statusSewa = "Menunggu Konfirmasi";
                }
            ?>
                <div class="col-md-7 col-sm-12 box row mb-3">
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
                        <p><?= $row["tgl_berangkat"] ?></p>
                        <a href=".?page=detailTransaksi&id_transaksi=<?= $row["id_transaksi"] ?>" class="btn btn-primary">DETAIL</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>