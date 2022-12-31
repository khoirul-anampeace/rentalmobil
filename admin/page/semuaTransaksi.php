<!-- start page title -->
<style>
    @media print {
        .input-saya {
            display: none;
        }

        .aksi {
            display: block;
        }
    }

    .aksi {
        display: none;
    }

    .tablekita {
        font-size: 12px !important;
    }
</style>
<?php
$jenistransaksiquery = "";
$periode = "";
$title = "";
if (isset($_POST["filter"])) {
    // echo "<script>location='.?page=semuaTransaksi'</script>";
    $jenisTransaksi = $_POST["jenistransaksi"];
    $tgl1 = $_POST["tgl1"];
    $tgl2 = $_POST["tgl2"];
    if ($_POST["jenistransaksi"] == "semua_transaksi") {
        $jenistransaksiquery = " WHERE";
        $titleJenis = "Semua Transaksi";
    } else if ($_POST["jenistransaksi"] == "lepas_kunci") {
        $jenistransaksiquery = " WHERE t.jenis_transaksi = 'lepas kunci' AND";
        $titleJenis = "Transaksi Lepas Kunci";
    } else if ($_POST["jenistransaksi"] == "dengan_driver") {
        $jenistransaksiquery = " WHERE t.jenis_transaksi = 'dengan driver' AND";
        $titleJenis = "Transaksi Dengan Driver";
    } else {
        $jenistransaksiquery = " WHERE";
    }
    $tgl1parse = date("d-m-Y", strtotime($tgl1));
    $tgl2parse = date("d-m-Y", strtotime($tgl2));
    $periode = " t.tgl_berangkat BETWEEN '$tgl1' AND '$tgl2'";

    $title = "Data " . $titleJenis . " Periode " . $tgl1parse .  " sampai " . $tgl2parse;
    // echo "jenis " . $jenistransaksiquery;
    // echo "oh yeah";
} else {
    $jenistransaksiquery = "";
    $periode = "";
    // echo "clear";
    $title = "Data Transaksi";
}
$qTransaksi = "SELECT t.*, p.*, m.*, c.* FROM transaksi t JOIN pembayaran p ON t.id_transaksi = p.id_transaksi JOIN mobil m ON t.id_mobil = m.id_mobil JOIN customer c ON t.id_customer = c.id_customer";
$totalqtransaksi = "SELECT SUM(p.total_harga) as viewtotal FROM transaksi t JOIN pembayaran p ON t.id_transaksi = p.id_transaksi JOIN mobil m ON t.id_mobil = m.id_mobil JOIN customer c ON t.id_customer = c.id_customer";


$qOrder = " ORDER BY t.id_transaksi DESC";

$totalSqlGabung = $totalqtransaksi . $jenistransaksiquery . $periode . $qOrder;
$totalHarga = mysqli_query($connect, $totalSqlGabung);
$rowViewTotal = mysqli_fetch_array($totalHarga);
?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <!-- <a href=".?page=tambahMobil" class="btn btn-primary">Tambah Data Mobil</a> -->
                <!-- <form class="d-flex">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-light" id="dash-daterange">
                        <span class="input-group-text bg-primary border-primary text-white">
                            <i class="mdi mdi-calendar-range font-13"></i>
                        </span>
                    </div>
                    <a href="javascript: void(0);" class="btn btn-primary ms-2">
                        <i class="mdi mdi-autorenew"></i>
                    </a>
                </form> -->
                <a href="#" onclick="window.print()" class="btn btn-secondary float-end">
                    <i class="uil-print"></i> Generate Report
                </a>
            </div>
            <h4 class="page-title">Transaksi</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="card">
    <div class="card-header">
        <h3><?= $title ?></h3>
    </div>
    <div class="card-body">
        <form method="POST" class="row input-saya">
            <div class="col-md-3">
                <!-- <label for="inputTL" class="form-label">Periode Tanggal 1</label> -->
                <input type="date" name="tgl1" class="form-control" id="inputTglLahir" placeholder="" required autocomplete="off">
            </div>
            <div class="col-md-3">
                <!-- <label for="inputTL" class="form-label">Tempat Lahir</label> -->
                <input type="date" name="tgl2" class="form-control" id="inputTglLahir" placeholder="" required autocomplete="off">
            </div>
            <div class="col-md-3">
                <select class="form-select" name="jenistransaksi" aria-label="Default select example" required>
                    <option value="semua_transaksi">Semua</option>
                    <option value="lepas_kunci">Lepas Kunci</option>
                    <option value="dengan_driver">Dengan Driver</option>
                </select>
            </div>
            <div class="col-md-3">
                <button name="filter" class="btn btn-primary w-100">FILTER</button>
            </div>
        </form>
        <table id="scroll-horizontal-datatable" class="table w-100 nowrap tablekita">
            <thead>
                <tr>
                    <th>No</th>
                    <th>id Transaksi</th>
                    <th>Merk Mobil</th>
                    <!-- <th>Plat Mobil</th> -->
                    <th>Customer</th>
                    <!-- <th>TGL Berangkat</th>
                    <th>TGL Kembali</th> -->
                    <th>Lama</th>
                    <!-- <th>Daerah Tujuan</th> -->
                    <!-- <th>Keperluan</th>
                    <th>Catatan</th> -->
                    <th>Status Transaksi</th>
                    <th>Denda</th>
                    <th>Total Harga</th>
                    <th class="aksi"></th>
                </tr>
            </thead>

            <?php

            $sqlGabung = $qTransaksi . $jenistransaksiquery . $periode . $qOrder;
            $transaksi = query($sqlGabung);
            $no = 1;
            foreach ($transaksi as $row) :
            ?>

                <tbody>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $row["id_transaksi"] ?></td>
                        <td><?= $row["merk"] ?></td>
                        <!-- <td><?= $row["no_plat"] ?></td> -->
                        <td><?= $row["nama_lengkap"] ?></td>
                        <!-- <td><?= $row["tgl_berangkat"] ?></td>
                        <td><?= $row["tgl_kembali"] ?></td> -->
                        <td><?= $row["lama_sewa"] ?></td>
                        <!-- <td><?= $row["daerah_tujuan"] ?></td> -->
                        <!-- <td><?= $row["keperluan"] ?></td> -->
                        <!-- <td><?= $row["catatan_transaksi"] ?></td> -->
                        <td><?= $row["status_transaksi"] ?></td>
                        <td>Rp <?= rupiah($row["denda"]) ?></td>
                        <td>Rp <?= rupiah($row["total_harga"]) ?></td>
                        <!-- <td>
                            <a href=".?page=deleteTransaksi&id=<?= $row['id_transaksi'] ?>&hals=<?= "semuaDenganDriver" ?>&id_table=<?= "id_transaksi" ?>" class="btn btn-danger"> <i class="mdi mdi-delete"></i></a>
                        </td> -->
                    </tr>

                <?php $no++;
            endforeach; ?>
                </tbody>
        </table>
        <p class="float-end">Total harga : <strong>Rp <?= rupiah($rowViewTotal["viewtotal"]) ?></strong></p>
    </div>
</div>