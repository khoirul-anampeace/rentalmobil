<section class="content customer" id="checkout">
    <div class="container" id="">
        <h1>Checkout</h1>
        <?php
        $getIdMobil = $_GET["id_mobil"];
        $mobil = query("SELECT * FROM mobil JOIN kondisi_mobil ON mobil.id_mobil = kondisi_mobil.id_mobil WHERE mobil.id_mobil = '$getIdMobil'");
        $no = 1;
        foreach ($mobil as $row) :
        ?>
            <form method="POST">
                <div class="row checkoutlepaskunci">
                    <div class="col-md-8 checkleft">
                        <div class="box">
                            <div class="titleCheckout">
                                <!-- <img src="../assets/images/bgcheckout.png"> -->
                                <h5>Lepas Kunci</h5>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-sm-12">
                                    <img src="../assets/images/mobil/<?= $row["depan"] ?>">
                                </div>
                                <div class="col-md-8 col-sm-12">
                                    <h6><?= $row["merk"] ?> </h6>
                                    <h6><?= $row["no_plat"] ?></h6>
                                    <h6><?= $row["warna"] ?></h6>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-6 mb-4">
                                    <label for="berangkat" class="form-label">Berangkat</label>
                                    <input type="date" name="berangkat" class="form-control hitungTotal" id="berangkat" value="HAHA" autofocus required autocomplete="off">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="kembali" class="form-label">Kembali</label>
                                    <input type="date" name="kembali" class="form-control hitungTotal" id="kembali" required autocomplete="off">
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label for="tujuan" class="form-label">Tujuan</label>
                                    <input type="text" name="tujuan" class="form-control" id="tujuan" required autocomplete="off">
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label for="catatan" class="form-label">Catatan</label>
                                    <textarea name="catatan" class="form-control" id="catatan" required autocomplete="off"></textarea>
                                </div>
                                <div class="col-12">
                                    <h6>Peraturan dan Tata Tertib </h6>
                                    <ol>
                                        <li>Jika melewati batas sewa yang telah ditentukan tersebut dalam nota, maka 10 jam sebelumnya pelanggan harus meminta persetujuan perpanjangan sewa pada MERPATI Rent a car. Jika tidak meminta persetujuan diwajibkan membayar kompensasi sebesar seperempat dari harga sewa perhari</li>
                                        <li>Terlambat mengembalikan mobil dari waktu yang ditentukan akan dikenakan Charge Overtime (kelebihan jam) sebesar sepuluh persen harga sewa perhari dikalikan jumlah jam keterlambatan</li>
                                        <li>Jika karena suatu hal pelanggan tidak dapat membayar biaya sewa mobil maksimal tiga hari setelah mobil kembali, pelanggan harus memberikan jaminan yang nilainya minimal dua kali dari jumlah tanggungan</li>
                                        <li>Jika menyewa mobil tanpa sopir di Merpati Rent a Car, segala bentuk resiko yang terjadi selama membawa mobil yang diakibatkan oleh kecelakaan, kelalaian, kecerobohan, kerusuhan, kehilangan, pencurian, penggelapan dan bencana alam, maka pelanggan harus mengganti 100% (Seratus Persen) sejumlah kerugian yang terjadi</li>
                                        <li>Selama proses pergantian dan atau perbaikan mobil yang dimaksud point empat, pelanggan dikenakan biaya sewa penuh sebesar harga sewa harian</li>
                                        <li>Jika karena suatu hal pelanggan bisa mengganti kerugian, maka pelanggan harus memberikan jaminan barang yang nilainya dua kali dari jumlah tanggungan</li>
                                        <li>Jika pelanggan masih menggunakan mobil Merpati Rent a Car tapi masih belum membayar biaya sewa lebih dari dua hari, maka pelanggan yang bersangkutan harus mengembalikan mobil yang disewa pada Merpati Rent a Car</li>
                                        <li>Jika pada saat pengembalian mobil ada bagian atau perlengkapan mobil yang hilang atau rusak tidak sesuai denan waktu membawa, maka pelanggan harus mengganti 100% (Seratus Persen) sesuai dengan kerugian yang terjadi</li>
                                        <li>Pelanggan harus mengisi dan menanda tangani surat perjanjian yang ditulis sendiri oleh pelanggan sehubungan setuju tidaknya dengan peraturan dan tata tertib yang berlaku di Merpati Rent a Car</li>
                                        <li>Pelanggan dilarang keras memindah tangankan atau menggadaikan atau menjual mobil sewa</li>
                                    </ol>
                                    <div class="flexnih">
                                        <div class="inputnih">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        </div>
                                        <div class="labelnih">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <h6>Saya bersedia mengikuti peraturan dan tata tertib merpati rent. Setuju tanpa ada paksaan dari siapapun serta siap bertanggung jawab atas unit yang saya sewa.</h6>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 checkright">
                        <div class="box">
                            <h5>Rincian harga</h5>
                            <table>
                                <tr>
                                    <td class="first">
                                        <h6>Harga Sewa</h6>
                                    </td>
                                    <td style="width: 5%;">:</td>
                                    <td class="second">
                                        <p>Rp <?= rupiah($row["harga"]) ?></p>
                                        <p hidden id="hargaSewa"> <?= $row["harga"] ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first">
                                        <h6>Lama Sewa</h6>
                                    </td>
                                    <td style="width: 5%;">:</td>
                                    <td>
                                        <p id="lamaSewa"></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first">
                                        <h6>Total Harga</h6>
                                    </td>
                                    <td style="width: 5%;">:</td>
                                    <td>
                                        <p id="totalHarga"></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first">
                                        <h6>DP 25%</h6>
                                    </td>
                                    <td style="width: 5%;">:</td>
                                    <td>
                                        <p id="dp"></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first">
                                        <h6>Sisa</h6>
                                    </td>
                                    <td style="width: 5%;">:</td>
                                    <td>
                                        <p id="sisa"></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first">
                                        <h6>No Rek Pembayaran</h6>
                                    </td>
                                    <td style="width: 5%;">:</td>
                                    <td>
                                        <p>340123001 (BRI) An. Anam</p>
                                    </td>
                                </tr>
                            </table>
                            <h5>Upload Bukti Pembayaran</h5>
                            <div class="pembayaran">
                                <input type="file" name="pembayaran" class="form-control" id="imageUploadKK" onchange="readURLKK(this);" placeholder="Jember" required autocomplete="off">
                                <div id="preview">
                                    <img class="mt-3" src="" width="100%" id="thumbPembayaran" height="auto">
                                </div>
                            </div>
                            <img class="barcode" src="../assets/images/code39.png" alt="">
                            <button name="sewa" class="btn btn-primary">SEWA</button>
                        </div>
                    </div>
                </div>
            </form>
        <?php
        endforeach;
        ?>
    </div>
</section>
<script type="text/javascript">
    // preview upload foto KK
    function readURLKK(uppembayaran) {
        if (uppembayaran.files && uppembayaran.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#thumbPembayaran')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(uppembayaran.files[0]);
        }
    }
</script>