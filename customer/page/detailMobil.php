<section class="content customer" id="mainMobil">
    <div class="container" id="">
        <h1>Detail Mobil</h1>
        <div class="row detailmobil">
            <?php
            $getIdMobil = $_GET["id_mobil"];
            $mobil = query("SELECT * FROM mobil JOIN kondisi_mobil ON mobil.id_mobil = kondisi_mobil.id_mobil WHERE mobil.id_mobil = '$getIdMobil'");
            $no = 1;
            foreach ($mobil as $row) :
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
                                    <h5>Merk</h5>
                                </td>
                                <td class="second">
                                    <p>: <?= $row["merk"] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td class="first">
                                    <h5>Harga Sewa</h5>
                                </td>
                                <td>
                                    <p>: <?= $row["harga"] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td class="first">
                                    <h5>Nomer Polisi</h5>
                                </td>
                                <td>
                                    <p>: <?= $row["no_plat"] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td class="first">
                                    <h5>Warna</h5>
                                </td>
                                <td>
                                    <p>: <?= $row["warna"] ?></p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-2 button-detailmobil">
                        <a href="" class="btn btn-primary float-md-end">Book</a>
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
            <?php endforeach; ?>
        </div>
    </div>
</section>