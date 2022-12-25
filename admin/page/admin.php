<!-- start page title -->
<?php
$getId_admin = $_SESSION["id_admin"];
$query = "SELECT * FROM admin WHERE id_admin = '$getId_admin'";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($result);
if ($row["status_admin"] != "Pemilik") {
    echo "<script>alert('Anda tidak dapat mengakses halaman ini')</script>";
    echo "<script>location='.?page=dashboard'</script>";
}
?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <a href=".?page=tambahAdmin" class="btn btn-primary">Tambah Data Admin</a>
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
            <h4 class="page-title">Admin</h4>
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
                    <th>ID Admin</th>
                    <th>Nama</th>
                    <th>No HP/Telp</th>
                    <th>Username</th>
                    <th>Status</th>
                    <th>Alamat</th>
                    <th>Password</th>
                    <th>Foto Profil</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <?php
            $admin = query("SELECT * FROM admin");
            $no = 1;
            foreach ($admin as $row) :
            ?>

                <tbody>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $row["id_admin"] ?></td>
                        <td><?= $row["nama"] ?></td>
                        <td><?= $row["telp"] ?></td>
                        <td><?= $row["username"] ?></td>
                        <td><?= $row["status_admin"] ?></td>
                        <td><?= $row["alamat"] ?></td>
                        <td><?= $row["password"] ?></td>
                        <td><img src="../assets/images/admin/<?= $row["fotoprofil"] ?>" width="100%" height="auto"></td>
                        <td class="table-action">
                            <!-- <a href=".?page=detailCustomer&id_customer=<?= $row['id_admin'] ?>" class="action-icon"><i class="mdi mdi-eye"></i></a> -->
                            <a href=".?page=updateAdmin&id_admin=<?= $row['id_admin'] ?>" class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                            <a href=".?page=deleteAdmin&id=<?= $row['id_admin'] ?>&table=<?= "admin" ?>&id_table=<?= "id_admin" ?>" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                        </td>
                    </tr>

                <?php $no++;
            endforeach; ?>
                </tbody>
        </table>
    </div>
</div>