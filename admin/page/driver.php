<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <a href=".?page=tambahDriver" class="btn btn-primary">Tambah Data Paket Driver</a>
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
            <h4 class="page-title">Paket Driver</h4>
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
                    <th>ID Paket Driver</th>
                    <th>Wilayah Tujuan</th>
                    <th>Tarif Driver</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <?php
            $driver = query("SELECT * FROM driver");
            $no = 1;
            foreach ($driver as $row) :
            ?>

                <tbody>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $row["id_driver"] ?></td>
                        <td><?= $row["wilayah_tujuan"] ?></td>
                        <td><?= $row["tarif_driver"] ?></td>
                        <td class="table-action">
                            <!-- <a href=".?page=detailCustomer&id_customer=<?= $row['id_driver'] ?>" class="action-icon"><i class="mdi mdi-eye"></i></a> -->
                            <a href=".?page=updateDriver&id_driver=<?= $row['id_driver'] ?>" class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                            <a href=".?page=deleteDriver&id=<?= $row['id_driver'] ?>&table=<?= "driver" ?>&id_table=<?= "id_driver" ?>" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                        </td>
                    </tr>

                <?php $no++;
            endforeach; ?>
                </tbody>
        </table>
    </div>
</div>