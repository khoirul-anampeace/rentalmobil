<section class="content customer" id="checkout">
    <div class="container" id="">
        <h1>Pilih Wilayah Tujuan</h1>
        <?php
        if (isset($_GET["id_mobil"]) && $_GET["id_mobil"] != "") {
            // id customer
            // mengambil data barang dengan kode paling besar
            $queryid = mysqli_query($connect, "SELECT max(id_transaksi) as idTerbesar FROM transaksi");
            $data = mysqli_fetch_array($queryid);
            $id_transaksi = $data['idTerbesar'];

            // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
            // dan diubah ke integer dengan (int)
            $urutan = (int) substr($id_transaksi, 3, 3);

            // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
            $urutan++;

            // membentuk kode barang baru
            // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
            // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
            // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
            $huruf = "TRS";
            $id_transaksi = $huruf . sprintf("%03s", $urutan);
            // echo $id_transaksi;


            $getIdMobil = $_GET["id_mobil"];
            $mobil = mysqli_query($connect, "SELECT * FROM mobil JOIN kondisi_mobil ON mobil.id_mobil = kondisi_mobil.id_mobil WHERE mobil.id_mobil = '$getIdMobil'");
            $rowMobil = mysqli_fetch_array($mobil);

            $id_customer = $_SESSION["id_customer"];
            $customer = mysqli_query($connect, "SELECT * FROM customer WHERE id_customer = '$id_customer'");
            $rowCustomer = mysqli_fetch_array($customer);
        ?>
            <form method="POST" enctype="multipart/form-data">
                <div class="row checkoutlepaskunci">
                    <div class="col-md-12 checkleft">
                        <div class="box">
                            <div class="titleCheckout">
                                <!-- <img src="../assets/images/bgcheckout.png"> -->
                                <h5>Dengan Driver</h5>
                            </div>
                            <!-- <h4>Id Transaksaksi </h4> -->
                            <div class="row">
                                <div class="col-md-3 col-sm-12">
                                    <img src="../assets/images/mobil/<?= $rowMobil["depan"] ?>">
                                </div>
                                <div class="col-md-8 col-sm-12">
                                    <h6><?= $rowMobil["merk"] ?> </h6>
                                    <h6><?= $rowMobil["no_plat"] ?></h6>
                                    <h6><?= $rowMobil["warna"] ?></h6>
                                </div>
                            </div>
                            <div class="col-md-12 mt-4">
                                <label for="pilihDriver" class="form-label">Pilih Tujuan (Supir)</label>
                                <!-- <input type="number" value="" name="nokk" class="form-control" id="inputKK" placeholder="3*****" required autocomplete="off"> -->
                                <select class="form-select" name="pilihDrivers" id="pilihDriver" aria-label="Default select example">
                                    <?php
                                    $driverSelect = query("SELECT * FROM driver");
                                    foreach ($driverSelect as $rowDriverSelect) {
                                    ?>
                                        <option value="<?= $rowDriverSelect["id_driver"] ?>"><?= $rowDriverSelect["wilayah_tujuan"] ?></option>
                                    <?php
                                    }

                                    ?>
                                </select>
                            </div>
                            <button class="btn btn-primary mt-4" name="pilih" style="width: 100%;">Pilih</button>
                        </div>
                    </div>
                </div>
            </form>
    </div>
</section>
<?php
        } else {
            echo "<script>alert('Silahkan pilih jenis sewa dan mobil terlebih dahulu')</script>";
            echo "<script>location='.?page=dashboard'</script>";
        }
        if (isset($_POST["pilih"])) {
            $idDriver = $_POST["pilihDrivers"];
            echo "<script>location='.?page=checkoutDenganDriver&id_mobil=$getIdMobil&id_driver=$idDriver'</script>";
        }
?>