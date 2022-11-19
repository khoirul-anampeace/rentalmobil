<?php
session_start();
?>
<form method="POST" class="g-3 daftar-akun">
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
                    <a href="index.php" class="btn btn-danger" name="batal">Batalkan</a>
                    <button class="btn btn-primary float-end" name="daftar3">Selanjutnya</button>
                </div>
            </div>
        </div>
    </section>

    <?php
    if (isset($_POST["daftar3"])) {
        $nik = $_POST["nik"];
        $nokk = $_POST["nokk"];
        $tempatLahir = $_POST["tempatlahir"];
        $tglLahir = $_POST["tgllahir"];
        $alamatAsli = $_POST["alamatasli"];
        $alamatDomisili = $_POST["alamatdomisili"];
        $_SESSION['nik'] = $nik;
        $_SESSION["nokk"] = $nokk;
        $_SESSION["tempatlahir"] = $tempatLahir;
        $_SESSION["tgllahir"] = $tglLahir;
        $_SESSION["alamatasli"] = $alamatAsli;
        $_SESSION["alamatdomisli"] = $alamatDomisili;

        echo "<script>location='daftar.php?pagedaftar=daftar-2'</script>";
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