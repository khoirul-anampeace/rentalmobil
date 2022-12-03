<section class="content customer" id="ubahProfil">
    <div class="container" id="">
        <h1>Ubah Profil</h1>

        <?php
        if (isset($_SESSION["id_customer"])) :
            $customerId = $_SESSION["id_customer"];
            $query = "SELECT * FROM customer WHERE id_customer = '$customerId'";
            $result = mysqli_query($connect, $query);
            $row = mysqli_fetch_assoc($result);
        ?>
            <form method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-3 img-ubahProfil">
                        <img src="../assets/images/customer/<?= $row["fotoprofil"] ?>" width="260px" height="260px">
                        <label for="imageUploadProfil" class="form-label mt-3">Ganti Foto Profil</label>
                        <input type="file" name="fotoprofil" class="form-control mb-5" id="imageUploadProfil" onchange="readURLKTPWajah(this);" placeholder="3*****" autocomplete="off">
                        <?php $profilePhoto = $row["fotoprofil"] ?>
                        <hr style="border: 1px solid;">
                        <a href="#" class="btn btn-secondary mt-3 w-100">Ganti Password</a>
                    </div>
                    <div class="col-md-9 row form-ubahProfil">
                        <div class="col-md-6 mb-4">
                            <label for="inputNama" class="form-label">Nama Lengkap</label>
                            <input type="text" value="<?= $row["nama_lengkap"] ?>" name="namalengkap" class="form-control" id="inputNama" placeholder="Nama Anda" autofocus autocomplete="off">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="inputUsername" class="form-label">Username</label>
                            <input type="text" value="<?= $row["username"] ?>" name="username" class="form-control" id="inputUsername" placeholder="Uxas---" autocomplete="off">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input type="email" value="<?= $row["email"] ?>" name="email" class="form-control" id="inputEmail" placeholder="Usas@gmail.com" autocomplete="off">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="inputNoTelp" class="form-label">No Telp (WA)</label>
                            <input type="number" value="<?= $row["telp"] ?>" name="notelp" class="form-control" id="inputNoTelp" placeholder="08***" autocomplete="off">
                        </div>
                        <!-- <div class="col-md-6 mb-4">
                            <label for="inputpassword" class="form-label">Password</label>
                            <input type="password" value="<?= $row["password"] ?>" name="password" class="form-control" id="inputpassword" placeholder="***" required autocomplete="off">
                        </div> -->
                        <!-- Form 2 -->

                        <div class="col-md-6 mb-4">
                            <label for="inputNIK" class="form-label">NIK</label>
                            <input type="number" value="<?= $row["nik"] ?>" name="nik" class="form-control" id="inputNIK" placeholder="3*****" autofocus autocomplete="off">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="inputKK" class="form-label">Jenis Kelamin</label>
                            <!-- <input type="number" value="" name="nokk" class="form-control" id="inputKK" placeholder="3*****" required autocomplete="off"> -->
                            <select class="form-select" name="jeniskelamin" aria-label="Default select example">
                                <option value="<?= $row["jeniskelamin"] ?>"><?= $row["jeniskelamin"] ?></option>
                                <option value="Laki - Laki">Laki - Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="inputTL" class="form-label">Tempat Lahir</label>
                            <input type="text" value="<?= $row["tempat_lahir"] ?>" name="tempatlahir" class="form-control" id="inputTL" placeholder="Jember" autocomplete="off">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="inputTglLahir" class="form-label">Tgl Lahir</label>
                            <input type="date" value="<?= $row["tanggal_lahir"] ?>" name="tgllahir" class="form-control" id="inputTglLahir" placeholder="" autocomplete="off">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="alamatAsli" class="form-label">Alamat KTP</label>
                            <textarea name="alamatasli" class="form-control" id="alamatAsli" placeholder="Jl ..." autocomplete="off"><?= $row["alamat_asli"] ?></textarea>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="inalamatdomisili" class="form-label">Alamat Domisili</label>
                            <textarea name="alamatdomisili" class="form-control" id="inalamatdomisili" placeholder="Jl ..." autocomplete="off"><?= $row["domisili"] ?></textarea>
                        </div>
                        <!-- Form 3 -->
                        <!-- <div class="col-md-6 mb-4">
                            <label for="imageUploadKTP" class="form-label">Foto KTP</label>
                            <input type="file" name="fotoktp" class="form-control" id="imageUploadKTP" onchange="readURLKTP(this);" placeholder="3*****" autofocus required autocomplete="off">
                            <div id="preview">
                                <img class="mt-3" src="" width="100%" id="thumbKTP" height="auto">
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="imageUploadKTPWajah" class="form-label">Foto KTP Beserta Wajah</label>
                            <input type="file" name="fotoktpwajah" class="form-control" id="imageUploadKTPWajah" onchange="readURLKTPWajah(this);" placeholder="3*****" required autocomplete="off">
                            <div id="preview">
                                <img class="mt-3" src="" width="100%" id="thumbKTPWajah" height="auto">
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="imageUploadSIM" class="form-label">Foto SIM</label>
                            <input type="file" name="fotosim" class="form-control" id="imageUploadSIM" onchange="readURLSIM(this);" placeholder="Jember" required autocomplete="off">
                            <div id="preview">
                                <img class="mt-3" src="" width="100%" id="thumbSIM" height="auto">
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="inputTglLahir" class="form-label">Foto KK</label>
                            <input type="file" name="fotokk" class="form-control" id="imageUploadKK" onchange="readURLKK(this);" placeholder="Jember" required autocomplete="off">
                            <div id="preview">
                                <img class="mt-3" src="" width="100%" id="thumbKK" height="auto">
                            </div>
                        </div> -->

                        <div class="col-md-12 col-sm-6">
                            <a href=".?pagedaftar=dashboard" class="btn btn-danger">Kembali</a>
                            <button class="btn btn-primary float-end" name="update">Update</button>
                        </div>
                    </div>

                <?php

                if (isset($_POST["update"])) {
                    $namaLengkap = $_POST["namalengkap"];
                    $username = $_POST["username"];
                    $email = $_POST["email"];
                    $notelp = $_POST["notelp"];
                    // form2
                    $nik = $_POST["nik"];
                    $jenisKelamin = $_POST["jeniskelamin"];
                    $tempatLahir = $_POST["tempatlahir"];
                    $tglLahir = $_POST["tgllahir"];
                    $alamatAsli = $_POST["alamatasli"];
                    $alamatDomisili = $_POST["alamatdomisili"];
                    // echo $row["fotoprofil"];
                    if ($_FILES['fotoprofil']['name'] == true) {
                        $namafotoprofil = $namaLengkap . "_fotoProfil_" . date("Ymd");
                        $fotoprofil = upload($namafotoprofil, "fotoprofil", "customer");
                    } else {
                        $fotoprofil = $profilePhoto;
                        // if (!$fotoprofil) {
                        //     echo "<script>alert('Silahkan Tambahkan Foto Profil')</script>";
                        //     return false;
                        // }
                    }

                    // update
                    $query = "UPDATE customer SET
                    nama_lengkap = '$namaLengkap',
                    username = '$username',
                    email = '$email',
                    telp = '$notelp',
                    nik = '$nik',
                    jeniskelamin = '$jenisKelamin',
                    tempat_lahir = '$tempatLahir',
                    tanggal_lahir = '$tglLahir',
                    alamat_asli = '$alamatAsli',
                    domisili = '$alamatDomisili',
                    fotoprofil = '$fotoprofil'
                    WHERE id_customer = '$customerId'
                ";
                    mysqli_query($connect, $query);
                    echo "<script>location='index.php.?page=ubahProfile'</script>";
                }
            endif;
                ?>
            </form>
    </div>
    </div>
</section>