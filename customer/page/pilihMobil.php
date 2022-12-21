<section class="content customer" id="mainMobil">
    <div class="container" id="">
        <h1>Pilih Mobil</h1>
        <div class="row pilihmobil">
            <?php
            if (isset($_GET["jenis_sewa"])) {
                # code...

                $mobil = query("SELECT * FROM mobil m JOIN kondisi_mobil km ON m.id_mobil = km.id_mobil WHERE m.status_mobil = 'Tersedia'");
                $no = 1;
                foreach ($mobil as $row) :
                    // checkout check
                    if ($_GET["jenis_sewa"] == "lepasKunci") {
                        $checkout = ".?page=checkoutLepasKunci&id_mobil=" . $row["id_mobil"];
                    } else if ($_GET["jenis_sewa"] == "denganDriver") {
                        $checkout = ".?page=checkoutDenganDriver&id_mobil=" . $row["id_mobil"];
                    } else {
                        echo "<script>alert('Silahkan pilih jenis sewa terlebih dahulu')</script>";
                        echo "<script>location='.?page=dashboard'</script>";
                    }
                    // detail check
                    if ($_GET["jenis_sewa"] == "lepasKunci") {
                        $detail = ".?page=detailMobil&id_mobil=" . $row["id_mobil"] . "&jenis_sewa=lepasKunci";
                    } else if ($_GET["jenis_sewa"] == "denganDriver") {
                        $detail = ".?page=detailMobil&id_mobil=" . $row["id_mobil"] . "&jenis_sewa=denganDriver";
                    } else {
                        echo "<script>alert('Silahkan pilih jenis sewa terlebih dahulu')</script>";
                        echo "<script>location='.?page=dashboard'</script>";
                    }
            ?>
                    <div class="col-md-6 col-sm-12 row  mobil">
                        <div class="box row">
                            <div class="col-md-4 img-pilihmobil">
                                <img src="../assets/images/mobil/<?= $row["depan"] ?>">
                            </div>
                            <div class="col-md-8  text-pilihmobil">
                                <h5><?= $row["merk"] ?></h5>
                                <p class="harga"><?= $row["bbm"] ?></p>
                                <p class="harga">Rp <?= rupiah($row["harga"]) ?></p>
                                <a href="<?= $detail ?>" class="btn btn-secondary">Detail</a>
                                <a href="<?= $checkout ?>" class="btn btn-primary float-end">Book</a>
                            </div>
                        </div>
                    </div>
            <?php
                endforeach;
            } else {
                echo "<script>alert('Silahkan pilih jenis sewa terlebih dahulu')</script>";
                echo "<script>location='.?page=dashboard'</script>";
            }
            ?>
        </div>
</section>