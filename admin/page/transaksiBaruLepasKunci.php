<!-- start page title -->
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
            </div>
            <h4 class="page-title">Transaksi Baru Lepas Kunci</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="card">
    <div class="card-body">
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
                    <th>Status Transaksi</th>
                    <th>Catatan</th>
                    <th>Harga Mobil</th>
                    <th>Total Harga</th>
                    <th>DP</th>
                    <th>Sisa Pembayaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <?php
            $transaksi = query("SELECT t.*, p.*, m.*, c.* FROM transaksi t JOIN pembayaran p ON t.id_transaksi = p.id_transaksi JOIN mobil m ON t.id_mobil = m.id_mobil JOIN customer c ON t.id_customer = c.id_customer WHERE t.jenis_transaksi = 'lepas kunci' AND (t.status_transaksi = 'Menunggu Konfirmasi' OR t.status_transaksi = 'Survei Lokasi') ORDER BY t.id_transaksi DESC");
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
                        <td><?= $row["status_transaksi"] ?></td>
                        <td><?= $row["catatan"] ?></td>
                        <td><?= $row["harga_mobil"] ?></td>
                        <td><?= $row["total_harga"] ?></td>
                        <td><?= $row["dp"] ?></td>
                        <td><?= $row["sisa"] ?></td>
                        <td class="table-action">
                            <a href=".?page=konfirmasiLepasKunci&id_transaksi=<?= $row['id_transaksi'] ?>" class="btn btn-primary">Konfirmasi</i></a>
                            <!-- <a href=".?page=updateMobil&id_mobil=<?= $row['id_mobil'] ?>" class="action-icon"> <i class="mdi mdi-pencil"></i></a> -->
                            <a href=".?page=deleteLepasKunci&id=<?= $row['id_transaksi'] ?>&table=<?= "transaksi" ?>&id_table=<?= "id_transaksi" ?>" class="btn btn-danger"> <i class="mdi mdi-delete"></i></a>
                        </td>
                    </tr>

                <?php $no++;
            endforeach; ?>
                </tbody>
        </table>
    </div>
</div>