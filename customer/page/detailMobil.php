<section class="content customer" id="mainMobil">
    <div class="container" id="">
        <h1>Detail Mobil</h1>
        <div class="row detailmobil">
            <?php
            $getIdMobil = $_GET["id_mobil"];
            $mobil = query("SELECT * FROM mobil JOIN kondisi_mobil ON mobil.id_mobil = kondisi_mobil.id_mobil WHERE mobil.id_mobil = '$getIdMobil'");
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
            ?>
                <div class="row detail">
                    <div class="col-md-3 img-detailmobil">
                        <img src="../assets/images/mobil/<?= $row["depan"] ?>">
                    </div>
                    <div class="col-md-7 text-detailmobil">
                        <!-- <h5>Nama Unit &emsp;&nbsp;&ensp;: Limousine Cadilac One </h5>
                <h5>Harga Sewa &emsp;: Limousine Cadilac One </h5>
                <h5>Plat Nomer &emsp;&nbsp; : Limousine Cadilac One </h5>
                <h5>Warna &emsp; : Limousine Cadilac One </h5> -->
                        <table>
                            <tr>
                                <td class="first">
                                    <h6>Merk</h6>
                                </td>
                                <td class="second">
                                    <p>: <?= $row["merk"] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td class="first">
                                    <h6>Harga Sewa</h6>
                                </td>
                                <td>
                                    <p>: Rp <?= rupiah($row["harga"]) ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td class="first">
                                    <h6>Nomer Polisi</h6>
                                </td>
                                <td>
                                    <p>: <?= $row["no_plat"] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td class="first">
                                    <h6>Warna</h6>
                                </td>
                                <td>
                                    <p>: <?= $row["warna"] ?></p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-2 button-detailmobil">
                        <a href="<?= $checkout ?>" class=" btn btn-primary float-md-end">Book</a>
                    </div>
                </div>
                <h5 class="mt-3">Kondisi Unit</h5>
                <div class="row kondisiunit">
                    <div class="col-md-3 col-sm-12">
                        <img src="../assets/images/mobil/<?= $row["depan"] ?>">
                        <p>Bagian Depan</p>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <img src="../assets/images/mobil/<?= $row["belakang"] ?>">
                        <p>Bagian Belakang</p>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <img src="../assets/images/mobil/<?= $row["samping"] ?>">
                        <p>Bagian Samping</p>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <img src="../assets/images/mobil/<?= $row["interior"] ?>">
                        <p>Bagian Interior</p>
                    </div>
                </div>
                <h5 class="mt-5">Catatan</h5>
                <p><?= $row["catatan"] ?></p>
                <?php

                $cekTransaksi =  mysqli_query($connect, "SELECT t.tgl_berangkat, t.tgl_kembali FROM transaksi t JOIN mobil m ON t.id_mobil = m.id_mobil WHERE t.id_mobil = '$getIdMobil' AND t.status_transaksi = 'Telah Dipesan'");
                $rowcekTransaksi = mysqli_fetch_array($cekTransaksi);
                if (mysqli_num_rows($cekTransaksi) != 0) {
                ?>
                    <div class="ps-3 pe-3">
                        <h5>Status Mobil</h5>
                        <div class="alert alert-warning alert-dismissible fade show p-3" role="alert">
                            Mobil telah dipesan pada tanggal
                            <br>
                            <strong>
                                <?php

                                $rowTransaksi = query("SELECT t.tgl_berangkat, t.tgl_kembali FROM transaksi t JOIN mobil m ON t.id_mobil = m.id_mobil WHERE t.id_mobil = '$getIdMobil' AND t.status_transaksi = 'Telah Dipesan'");
                                foreach ($rowTransaksi as $viewTransaksiTgl) {
                                    echo "(" . date("d-m-Y", strtotime($viewTransaksiTgl["tgl_berangkat"])) . " sampai " . date("d-m-Y", strtotime($viewTransaksiTgl["tgl_kembali"])) . ") <br>";
                                }
                                // while ($r = mysqli_fetch_assoc($cekTransaksi)) {
                                //     echo $r["tgl_berangkat"] . " sampai " . $r["tgl_kembali"];
                                // } 
                                ?>
                            </strong>
                            Anda tidak dapat menyewa mobil ini pada tanggal tersebut
                            <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
                        </div>
                    </div>
                <?php
                }
                ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>