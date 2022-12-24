<section class="content customer" id="mainMobil">
    <div class="container" id="">
        <h1>Pilih Mobil</h1>
        <div class="row pilihmobil">
            <form method="POST" class="jenismobil">
                <div class="jenismobilpilihan">
                    <button name="semua" class="btn">
                        <img src="../assets/images/icon/suv-icon.png" alt="">
                        <h6>Semua Mobil</h6>
                    </button>
                    <button name="jenissuv" class="btn">
                        <img src="../assets/images/icon/suv-icon.png" alt="">
                        <h6>SUV</h6>
                    </button>
                    <button name="jenismpv" class="btn">
                        <img src="../assets/images/icon/mpv-icon.png" alt="">
                        <h6>MPV</h6>
                    </button>
                    <button name="jenissedan" class="btn">
                        <img src="../assets/images/icon/sedan-icon.png" alt="">
                        <h6>Sedan</h6>
                    </button>
                    <button name="jenispickup" class="btn">
                        <img src="../assets/images/icon/pickup-icon.png" alt="">
                        <h6>Pickup</h6>
                    </button>
                </div>
            </form>
            <?php
            if (isset($_GET["jenis_sewa"]) || $_GET["jenis_sewa"] == "") {
                # code...
                $filter = "";
                if (isset($_POST["semua"])) {
                    $filter = "";
                } else if (isset($_POST["jenissuv"])) {
                    $filter = "AND jenis LIKE 'SUV'";
                } else if (isset($_POST["jenismpv"])) {
                    $filter = "AND jenis LIKE 'MPV'";
                } else if (isset($_POST["jenissedan"])) {
                    $filter = "AND jenis LIKE 'Sedan'";
                } else if (isset($_POST["jenispickup"])) {
                    $filter = "AND jenis LIKE 'Pickup'";
                }
                $jumlahDataMobil = mysqli_query($connect, "SELECT * FROM mobil m JOIN kondisi_mobil km ON m.id_mobil = km.id_mobil WHERE m.status_mobil = 'Tersedia' $filter");
                // echo "total data " . mysqli_num_rows($jumlahDatatransaksi);
                if (mysqli_num_rows($jumlahDataMobil) == 0) {
                    echo "<p>Mohon Maaf Mobil Tidak Tersedia</p>";
                } else {

                    $mobil = query("SELECT * FROM mobil m JOIN kondisi_mobil km ON m.id_mobil = km.id_mobil WHERE m.status_mobil = 'Tersedia' $filter");

                    foreach ($mobil as $row) :
                        // checkout check
                        if ($_GET["jenis_sewa"] == "lepasKunci") {
                            $checkout = ".?page=checkoutLepasKunci&id_mobil=" . $row["id_mobil"];
                        } else if ($_GET["jenis_sewa"] == "denganDriver") {
                            $checkout = ".?page=pilihDriver&id_mobil=" . $row["id_mobil"];
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
                }
            } else {
                echo "<script>alert('Silahkan pilih jenis sewa terlebih dahulu')</script>";
                echo "<script>location='.?page=dashboard'</script>";
            }
            ?>
        </div>
</section>