<!-- start page title -->
<?php
$cetak = "Halo";
if ($cetak == "Halo") {
?>
    <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
        <thead>
            <tr>
                <th>No</th>
                <th>id Transaksi</th>
                <th>Merk Mobil</th>
                <th>Plat Mobil</th>
                <th>Customer</th>
                <th>TGL Berangkat</th>
                <th>TGL Kembali</th>
                <th>Lama Sewa</th>
                <th>Daerah Tujuan</th>
                <th>Keperluan</th>
                <th>Catatan</th>
                <th>Total Harga</th>
                <th>Denda</th>
                <th>Status Transaksi</th>
            </tr>
        </thead>

        <?php
        $transaksi = query("SELECT t.*, p.*, m.*, c.* FROM transaksi t JOIN pembayaran p ON t.id_transaksi = p.id_transaksi JOIN mobil m ON t.id_mobil = m.id_mobil JOIN customer c ON t.id_customer = c.id_customer ORDER BY t.id_transaksi DESC");
        $no = 1;
        foreach ($transaksi as $row) :
        ?>

            <tbody>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $row["id_transaksi"] ?></td>
                    <td><?= $row["merk"] ?></td>
                    <td><?= $row["no_plat"] ?></td>
                    <td><?= $row["nama_lengkap"] ?></td>
                    <td><?= $row["tgl_berangkat"] ?></td>
                    <td><?= $row["tgl_kembali"] ?></td>
                    <td><?= $row["lama_sewa"] ?></td>
                    <td><?= $row["daerah_tujuan"] ?></td>
                    <td><?= $row["keperluan"] ?></td>
                    <td><?= $row["catatan_transaksi"] ?></td>
                    <td>Rp <?= rupiah($row["total_harga"]) ?></td>
                    <td>Rp <?= rupiah($row["denda"]) ?></td>
                    <td><?= $row["status_transaksi"] ?></td>
                    <!-- <td>
                            <a href=".?page=deleteTransaksi&id=<?= $row['id_transaksi'] ?>&hals=<?= "semuaDenganDriver" ?>&id_table=<?= "id_transaksi" ?>" class="btn btn-danger"> <i class="mdi mdi-delete"></i></a>
                        </td> -->
                </tr>

            <?php $no++;

        endforeach;
            ?>
            </tbody>
    </table>
<?php
    echo "<script>window.print()</script>";
}
?>