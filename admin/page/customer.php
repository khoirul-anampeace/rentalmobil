<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
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
            <h4 class="page-title">Customer</h4>
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
                    <th>ID Customer</th>
                    <th>Nama Lengkap</th>
                    <th>Username</th>
                    <th>NIK</th>
                    <th>Tanggal Lahir</th>
                    <th>Tempat Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>No Telp/Wa</th>
                    <th>Email</th>
                    <th>Alamat KTP</th>
                    <th>Alamat Domisili</th>
                    <!-- <th>Password</th>
            <th>Foto Ktp</th>
            <th>Foto Ktp & Wajah</th>
            <th>Foto KK</th>
            <th>Foto SIM</th> -->
                    <th>Foto Profil</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <?php
            $customer = query("SELECT * FROM customer");
            $no = 1;
            foreach ($customer as $row) :
            ?>

                <tbody>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $row["id_customer"] ?></td>
                        <td><?= $row["nama_lengkap"] ?></td>
                        <td><?= $row["username"] ?></td>
                        <td><?= $row["nik"] ?></td>
                        <td><?= $row["tanggal_lahir"] ?></td>
                        <td><?= $row["tempat_lahir"] ?></td>
                        <td><?= $row["jeniskelamin"] ?></td>
                        <td><?= $row["telp"] ?></td>
                        <td><?= $row["email"] ?></td>
                        <td><?= $row["alamat_asli"] ?></td>
                        <td><?= $row["domisili"] ?></td>
                        <!-- <td><?= $row["password"] ?></td>
                <td>
                    <img src="../assets/images/customer/<?= $row["fotoktp"] ?>" width="100%" height="100%">
                </td>
                <td>
                    <img src="../assets/images/customer/<?= $row["fotoktpwajah"] ?>" width="100%" height="100%">
                </td>
                <td>
                    <img src="../assets/images/customer/<?= $row["fotokk"] ?>" width="100%" height="100%">
                </td>
                <td>
                    <img src="../assets/images/customer/<?= $row["fotosim"] ?>" width="100%" height="100%">
                </td> -->
                        <td>
                            <img src="../assets/images/customer/<?= $row["fotoprofil"] ?>" width="100%" height="100%">
                        </td>
                        <td class="table-action">
                            <a href=".?page=detailCustomer&id_customer=<?= $row['id_customer'] ?>" class="action-icon"><i class="mdi mdi-eye"></i></a>
                            <!-- <a href="javascript: void(0);" class="action-icon"> <i class="mdi mdi-pencil"></i></a> -->
                            <a href=".?page=deleteCustomer&id=<?= $row['id_customer'] ?>&table=<?= "customer" ?>&id_table=<?= "id_customer" ?>" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                        </td>
                    </tr>

                <?php $no++;
            endforeach; ?>
                </tbody>
        </table>
    </div>
</div>