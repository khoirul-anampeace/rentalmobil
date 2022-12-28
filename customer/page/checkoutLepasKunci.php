<section class="content customer" id="checkout">
    <div class="container" id="">
        <h1>Checkout</h1>
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

            $cekTransaksi =  mysqli_query($connect, "SELECT t.tgl_berangkat, t.tgl_kembali FROM transaksi t JOIN mobil m ON t.id_mobil = m.id_mobil WHERE t.id_mobil = '$getIdMobil' AND t.status_transaksi = 'Telah Dipesan'");
            $rowcekTransaksi = mysqli_fetch_array($cekTransaksi);
        ?>
            <form method="POST" enctype="multipart/form-data">
                <div class="row checkoutlepaskunci">
                    <div class="col-md-8 checkleft">
                        <div class="box">
                            <div class="titleCheckout">
                                <!-- <img src="../assets/images/bgcheckout.png"> -->
                                <h5>Lepas Kunci</h5>
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
                            <!-- nanti kasih kodnisi dulu habis itu pake perulangan -->
                            <?php
                            if (mysqli_num_rows($cekTransaksi) != 0) {
                            ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
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
                            <?php
                            }
                            ?>
                            <div class="row mt-4">
                                <div class="col-md-6 mb-4">
                                    <label for="berangkat" class="form-label">Berangkat</label>
                                    <input type="date" name="berangkat" class="form-control hitungTotal" id="berangkat" autofocus required autocomplete="off">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="kembali" class="form-label">Kembali</label>
                                    <input type="date" name="kembali" class="form-control hitungTotal" id="kembali" required autocomplete="off">
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label for="tujuan" class="form-label">Daerah Tujuan</label>
                                    <input type="text" name="daerah_tujuan" class="form-control" id="tujuan" placeholder="contoh Jember" required autocomplete="off">
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label for="keperluan" class="form-label">Keperluan Penyewaan</label>
                                    <textarea name="keperluan" class="form-control" id="keperluan" required autocomplete="off" placeholder="Keperluan menyewa mobil lepas kunci"></textarea>
                                </div>
                                <div class="col-md-6">
                                    <!-- <label for="tujuan" class="form-label">Harga Sewa</label> -->
                                    <input type="number" hidden name="hargasewa" value="<?= $rowMobil["harga"] ?>" class="form-control" id="InHarga" required autocomplete="off">
                                </div>
                                <div class="col-md-6">
                                    <!-- <label for="tujuan" class="form-label">Lama sewa</label> -->
                                    <input type="number" hidden name="lamasewa" class="form-control" id="InLama" required autocomplete="off">
                                </div>
                                <div class="col-md-6">
                                    <!-- <label for="tujuan" class="form-label">Dp</label> -->
                                    <input type="number" hidden name="dp" class="form-control" id="InDp" required autocomplete="off">
                                </div>
                                <div class="col-md-6">
                                    <!-- <label for="tujuan" class="form-label">Total Harga</label> -->
                                    <input type="number" hidden name="totalharga" class="form-control" id="InTotal" required autocomplete="off">
                                </div>
                                <div class="col-md-6">
                                    <!-- <label for="tujuan" class="form-label">Sisa</label> -->
                                    <input type="number" hidden name="sisa" class="form-control" id="InSisa" required autocomplete="off">
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
                                            <input class="form-check-input" name="checkboxperaturan" type="checkbox" value="" id="flexCheckDefault">
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
                            <p hidden id="jenisTransaksi">Lepas</p>
                            <p hidden id="tarifDriver">Lepas</p>
                            <h5>Rincian harga</h5>
                            <table>
                                <tr>
                                    <td class="first">
                                        <h6>Harga Sewa</h6>
                                    </td>
                                    <td style="width: 5%;">:</td>
                                    <td class="second">
                                        <p>Rp <?= rupiah($rowMobil["harga"]) ?></p>
                                        <p hidden id="hargaSewa"> <?= $rowMobil["harga"] ?></p>
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
                                        <p>398765765436787 <br> (BRI) An. Anam</p>
                                    </td>
                                </tr>
                            </table>
                            <h5>Upload Bukti Pembayaran</h5>
                            <div class="pembayaran">
                                <input type="file" name="buktibayar" class="form-control" id="imageUploadKK" onchange="readURLKK(this);" placeholder="Jember" required autocomplete="off">
                                <div id="preview">
                                    <img class="mt-3" src="" width="100%" id="thumbPembayaran" height="auto">
                                </div>
                            </div>
                            <?php
                            require("barcode.php");
                            $transaksi_code = $id_transaksi . "_" . $getIdMobil . "_" . $rowCustomer["nama_lengkap"];
                            echo '<img class="barcode" src="data:image/png;base64,' . base64_encode($generator->getBarcode($transaksi_code, $generator::TYPE_CODE_128)) . '">';
                            ?>
                            <!-- <img class="barcode" src="../assets/images/code39.png" alt=""> -->
                            <button name="sewa" class="btn btn-primary">SEWA</button>
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
        if (isset($_POST["sewa"])) {
            if (isset($_POST["checkboxperaturan"])) {
                if ($_POST["berangkat"]) {
                    // id
                    $customer_id = $id_customer;
                    $id_mobil = $getIdMobil;
                    $id_admin = "ADM000";
                    $id_driver = "Tanpa Driver";
                    $jenis_transaksi = "lepas kunci";
                    // form
                    $berangkat = $_POST["berangkat"];
                    $kembali = $_POST["kembali"];
                    $daerah_tujuan = $_POST["daerah_tujuan"];
                    $keperluan = $_POST["keperluan"];
                    $harga_sewa = $_POST["hargasewa"];
                    $tarif_driver = 0;
                    $lama_sewa = $_POST["lamasewa"];
                    $dp = $_POST["dp"];
                    $total_harga = $_POST["totalharga"];
                    $sisa = $_POST["sisa"];
                    $status_transaksi = "Menunggu Konfirmasi";
                    $catatan = "belum ada";
                    $denda = 0;
                    // mobil
                    // $status_mobil = "Beroperasi";
                    // foto
                    $namaBuktiBayar = $id_transaksi . "_fotoBuktiPembayaran_";
                    $fotoBayar = upload($namaBuktiBayar, "buktibayar", "transaksi");
                    if (!$fotoBayar) {
                        return false;
                    }
                    // insert
                    $query1 = "INSERT INTO transaksi 
                 VALUES('$id_transaksi', '$id_admin', '$id_mobil', '$id_customer', '$id_driver', '$jenis_transaksi', '$berangkat', '$kembali', '$lama_sewa', '$daerah_tujuan', '$keperluan', '$status_transaksi', '$catatan')
             ";
                    $send1 =  mysqli_query($connect, $query1);
                    $query2 = "INSERT INTO pembayaran 
                 VALUES('', '$id_transaksi', '$harga_sewa',  '$tarif_driver', '$dp', '$total_harga', '$sisa', '$fotoBayar', '$denda')
             ";
                    $send2 = mysqli_query($connect, $query2);

                    echo "<script>alert('Transaksi berhasil, silahkan menunggu konfirmasi dari pihak kami')</script>";
                    echo "<script>location='.?page=dashboard'</script>";
                }
            } else {
                echo "<script>alert('Silahkan baca dan centang pernjanjian')</script>";
            }
        }
?>

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