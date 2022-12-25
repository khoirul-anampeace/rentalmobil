<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
            </div>
            <h4 class="page-title">Detail Customer</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<?php
$ambilIdCustomer = $_GET['id_customer'];
if (!isset($_GET['id_customer'])) {
    echo "<script>alert('silahkan pilih customer terlebih dahulu')</script>";
    echo "<script>location='.?page=customer'</script>";
}
$customer = query("SELECT * FROM customer WHERE id_customer = '$ambilIdCustomer'");
$no = 1;
foreach ($customer as $row) :

    if ($row["fotoprofil"] != "") {
        $tampilkanprofil = "../assets/images/customer/" . $row["fotoprofil"];
    } else {
        if ($row["jeniskelamin"] == "Perempuan") {
            $tampilkanprofil = "../assets/images/users/woman.png";
        } else {
            $tampilkanprofil = "../assets/images/users/man.png";
        }
    }
?>
    <div class="row" id="detailCustomer">
        <div class="col-xl-8 col-lg-7">
            <div class="card card-h-100">
                <div class="card-body">
                    <h4 class="header-title mb-3"><?= $row["nama_lengkap"] ?></h4>
                    <div class="textDetail">

                        <table>
                            <tr>
                                <td class="first">
                                    <h5>ID Customer</h5>
                                </td>
                                <td class="second">
                                    <p>: <?= $row["id_customer"] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td class="first">
                                    <h5>NIK</h5>
                                </td>
                                <td>
                                    <p>: <?= $row["nik"] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td class="first">
                                    <h5>Username</h5>
                                </td>
                                <td>
                                    <p>: <?= $row["username"] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td class="first">
                                    <h5>Tanggal Lahir</h5>
                                </td>
                                <td>
                                    <p>: <?= $row["tanggal_lahir"] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td class="first">
                                    <h5>Tempat Lahir</h5>
                                </td>
                                <td>
                                    <p>: <?= $row["tempat_lahir"] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td class="first">
                                    <h5>Jenis Kelamin</h5>
                                </td>
                                <td>
                                    <p>: <?= $row["jeniskelamin"] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td class="first">
                                    <h5>No Telp (WA)</h5>
                                </td>
                                <td>
                                    <p>: <?= $row["telp"] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td class="first">
                                    <h5>Email</h5>
                                </td>
                                <td>
                                    <p>: <?= $row["email"] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td class="first">
                                    <h5>Alamat KTP</h5>
                                </td>
                                <td>
                                    <p>: <?= $row["alamat_asli"] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td class="first">
                                    <h5>Alamat Domisili</h5>
                                </td>
                                <td>
                                    <p>: <?= $row["domisili"] ?></p>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
        <div class="col-xl-4 col-lg-5">
            <div class="card tilebox-one">
                <div class="card-body">
                    <h5 class="text-uppercase mt-0">Foto Profil</h5>
                    <img src="<?= $tampilkanprofil ?>" width="100%" height="100%">
                </div> <!-- end card-body-->
            </div>
            <!--end card-->

            <div class="card tilebox-one">
                <div class="card-body">
                    <h5 class="text-uppercase mt-0">ACTION</h5>
                    <a href=".?page=updateCustomer&id_customer=<?= $row["id_customer"] ?>" class="btn btn-warning w-100">Update Data</a>
                </div> <!-- end card-body-->
            </div>
            <!--end card-->
        </div> <!-- end col -->

    </div>
    <div class="row" id="detailCustomer">
        <div class="col-xl-6 col-lg-7">
            <div class="card tilebox-one">
                <div class="card-body">
                    <h5 class="text-uppercase mt-0">Foto KTP</h5>
                    <img src="../assets/images/customer/<?= $row["fotoktp"] ?>" width="100%" height="100%">
                </div> <!-- end card-body-->
            </div>
            <!--end card-->
        </div> <!-- end col -->
        <div class="col-xl-6 col-lg-7">
            <div class="card tilebox-one">
                <div class="card-body">
                    <h5 class="text-uppercase mt-0">Foto KTP + Wajah</h5>
                    <img src="../assets/images/customer/<?= $row["fotoktpwajah"] ?>" width="100%" height="100%">
                </div> <!-- end card-body-->
            </div>
            <!--end card-->
        </div> <!-- end col -->
        <div class="col-xl-6 col-lg-7">
            <div class="card tilebox-one">
                <div class="card-body">
                    <h5 class="text-uppercase mt-0">Foto SIM</h5>
                    <img src="../assets/images/customer/<?= $row["fotosim"] ?>" width="100%" height="100%">
                </div> <!-- end card-body-->
            </div>
            <!--end card-->
        </div> <!-- end col -->
        <div class="col-xl-6 col-lg-7">
            <div class="card tilebox-one">
                <div class="card-body">
                    <h5 class="text-uppercase mt-0">Foto KK</h5>
                    <img src="../assets/images/customer/<?= $row["fotokk"] ?>" width="100%" height="100%">
                </div> <!-- end card-body-->
            </div>
            <!--end card-->
        </div> <!-- end col -->


    </div>




<?php endforeach; ?>