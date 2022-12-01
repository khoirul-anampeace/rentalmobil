<?php
session_start();
?>
<form method="POST" class="g-3 daftar-akun" enctype="multipart/form-data">
    <section class="content" id="form1">
        <div class="container">
            <h1>Form Ke 3</h1>
            <div class="row">
                <div class="col-md-6 mb-4">
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
                </div>

                <div class="col-md-12 col-sm-6">
                    <a href=".?pagedaftar=daftar-2" class="btn btn-secondary">Kembali</a>
                    <button class="btn btn-primary float-end" name="kirim">Buat Akun</button>
                </div>
            </div>
        </div>
    </section>

    <?php
    if (isset($_POST["kirim"])) {
        // id customer
        // mengambil data barang dengan kode paling besar
        $query = mysqli_query($connect, "SELECT max(id_customer) as idTerbesar FROM customer");
        $data = mysqli_fetch_array($query);
        $id_customer = $data['idTerbesar'];

        // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
        // dan diubah ke integer dengan (int)
        $urutan = (int) substr($id_customer, 3, 3);

        // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
        $urutan++;

        // membentuk kode barang baru
        // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
        // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
        // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
        $huruf = "CST";
        $id_customer = $huruf . sprintf("%03s", $urutan);
        echo $id_customer;

        // form1
        $namalengkap = $_SESSION['namaLengkap'];
        $username = $_SESSION["username"];
        $email = $_SESSION["email"];
        $notelp = $_SESSION["notelp"];
        $password = $_SESSION["password"]; // enkripsi_password
        $enkrip_password = password_hash($password, PASSWORD_DEFAULT);
        // form2
        $nik = $_SESSION['nik'];
        $nokk = $_SESSION["nokk"];
        $tempatlahir = $_SESSION["tempatlahir"];
        $tgllahir = $_SESSION["tgllahir"];
        $alamatasli = $_SESSION["alamatasli"];
        $alamatdomisili = $_SESSION["alamatdomisili"];
        // form3
        $namafotoktp = $namalengkap . "_fotoKTP_" . date("Ymd");
        $fotoktp = upload($namafotoktp, "fotoktp", "customer");
        if (!$fotoktp) {
            return false;
        }

        $namafotoktpwajah = $namalengkap . "_fotoKTPWajah_" . date("Ymd");
        $fotoktpwajah = upload($namafotoktpwajah, "fotoktpwajah", "customer");
        if (!$fotoktpwajah) {
            return false;
        }
        $namafotosim = $namalengkap . "_fotoSIM_" . date("Ymd");
        $fotosim = upload($namafotosim, "fotosim", "customer");
        if (!$fotosim) {
            return false;
        }
        $namafotokk = $namalengkap . "_fotoKK_" . date("Ymd");
        $fotokk = upload($namafotokk, "fotokk", "customer");
        if (!$fotokk) {
            return false;
        }

        // insert
        $query = "INSERT INTO customer 
                    VALUES ('$id_customer', '$namalengkap', '$username', '$nik', '$tgllahir', '$tempatlahir', '$notelp', '$email', '$alamatasli', '$alamatdomisili', '$enkrip_password', '$fotoktp', '$fotoktpwajah', '$fotosim', '$fotokk', '')
                ";
        mysqli_query($connect, $query);
        echo "<script>location='.?pagedaftar=session'</script>";
    }
    ?>
</form>

<script type="text/javascript">
    // preview upload foto ktp
    function readURLKTP(imageUploadKTP) {
        if (imageUploadKTP.files && imageUploadKTP.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#thumbKTP')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(imageUploadKTP.files[0]);
        }
    }
    // preview upload foto ktp beserta wajah
    function readURLKTPWajah(imageUploadKTPWajah) {
        if (imageUploadKTPWajah.files && imageUploadKTPWajah.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#thumbKTPWajah')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(imageUploadKTPWajah.files[0]);
        }
    }
    // preview upload foto SIM
    function readURLSIM(imageUploadSIM) {
        if (imageUploadSIM.files && imageUploadSIM.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#thumbSIM')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(imageUploadSIM.files[0]);
        }
    }
    // preview upload foto KK
    function readURLKK(imageUploadKK) {
        if (imageUploadKK.files && imageUploadKK.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#thumbKK')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(imageUploadKK.files[0]);
        }
    }
</script>