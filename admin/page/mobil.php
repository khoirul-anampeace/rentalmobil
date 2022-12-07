<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <a href=".?page=tambahMobil" class="btn btn-primary">Tambah Data Mobil</a>
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
            <h4 class="page-title">Mobil</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="card">
    <div class="card-body">
        <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
            <thead>
                <tr>
                    <th>id Mobil</th>
                    <th>Merk</th>
                    <th>Jenis</th>
                    <th>No Rangka</th>
                    <th>No Mesin</th>
                    <th>No Plat</th>
                    <th>Tahun Pembuatan</th>
                    <th>BBM</th>
                    <th>Warna</th>
                    <th>Status</th>
                    <th>Jumlah Kursi</th>
                    <th>Harga</th>
                    <th>Foto Depan</th>
                    <th>Foto Belakang</th>
                    <th>Foto Samping</th>
                    <th>Foto Interior</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <?php
            $mobil = query("SELECT * FROM mobil JOIN kondisi_mobil ON mobil.id_mobil = kondisi_mobil.id_mobil");
            $no = 1;
            foreach ($mobil as $row) :
            ?>

                <tbody>
                    <tr>
                        <td><?= $row["id_mobil"] ?></td>
                        <td><?= $row["merk"] ?></td>
                        <td><?= $row["jenis"] ?></td>
                        <td><?= $row["no_rangka"] ?></td>
                        <td><?= $row["no_mesin"] ?></td>
                        <td><?= $row["no_plat"] ?></td>
                        <td><?= $row["tahun_buat"] ?></td>
                        <td><?= $row["bbm"] ?></td>
                        <td><?= $row["warna"] ?></td>
                        <td><?= $row["status_mobil"] ?></td>
                        <td><?= $row["jumlah_kursi"] ?></td>
                        <td><?= $row["harga"] ?></td>
                        <td>
                            <img src="../assets/images/mobil/<?= $row["depan"] ?>" width="100%" height="100%">
                        </td>
                        <td>
                            <img src="../assets/images/mobil/<?= $row["belakang"] ?>" width="100%" height="100%">
                        </td>
                        <td>
                            <img src="../assets/images/mobil/<?= $row["samping"] ?>" width="100%" height="100%">
                        </td>
                        <td>
                            <img src="../assets/images/mobil/<?= $row["interior"] ?>" width="100%" height="100%">
                        </td>
                        <td class="table-action">
                            <!-- <a href=".?page=detailCustomer&id_customer=<?= $row['id_mobil'] ?>" class="action-icon"><i class="mdi mdi-eye"></i></a> -->
                            <a href=".?page=updateMobil&id_mobil=<?= $row['id_mobil'] ?>" class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                            <a href=".?page=deleteMobil&id=<?= $row['id_mobil'] ?>&table=<?= "mobil" ?>&id_table=<?= "id_mobil" ?>" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                        </td>
                    </tr>

                <?php endforeach; ?>
                </tbody>
        </table>
    </div>
</div>