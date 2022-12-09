<section class="content customer" id="mainMobil">
    <div class="container" id="">
        <h1>Pilih Mobil</h1>
        <div class="row pilihmobil">
            <?php
            $mobil = query("SELECT * FROM mobil JOIN kondisi_mobil ON mobil.id_mobil = kondisi_mobil.id_mobil");
            $no = 1;
            foreach ($mobil as $row) :
            ?>
                <div class="col-md-6 col-sm-12 row  mobil">
                    <div class="box row">
                        <div class="col-md-4 img-pilihmobil">
                            <img src="../assets/images/mobil/<?= $row["depan"] ?>">
                        </div>
                        <div class="col-md-8  text-pilihmobil">
                            <h5><?= $row["merk"] ?></h5>
                            <p class="harga">Rp <?= $row["harga"] ?>,</p>
                            <a href=".?page=detailMobil&id_mobil=<?= $row["id_mobil"] ?>" class="btn btn-secondary">Detail</a>
                            <a href=".?page=checkoutLepasKunci&id_mobil=<?= $row["id_mobil"] ?>" class="btn btn-primary float-end">Book</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
</section>