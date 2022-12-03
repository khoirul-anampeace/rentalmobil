<?php
session_start();
if (!empty($_SESSION['nik']) && !empty($_SESSION["jeniskelamin"]) && !empty($_SESSION["tempatlahir"]) && !empty($_SESSION["tgllahir"]) && !empty($_SESSION["alamatasli"]) && !empty($_SESSION["alamatdomisili"])) {

    $inputnik = $_SESSION['nik'];
    $inputjeniskelamin = $_SESSION["jeniskelamin"];
    $inputtempatlahir = $_SESSION["tempatlahir"];
    $inputtgllahir = $_SESSION["tgllahir"];
    $inputalamatasli = $_SESSION["alamatasli"];
    $inputalamatdomisili = $_SESSION["alamatdomisili"];
} else {
    $inputnik = "";
    $inputjeniskelamin = "";
    $inputtempatlahir = "";
    $inputtgllahir = "";
    $inputalamatasli = "";
    $inputalamatdomisili = "";
}
?>
<form method="POST" class="g-3 daftar-akun">
    <section class="content" id="form1">
        <div class="container">
            <h1>Form Ke 2</h1>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <label for="inputNIK" class="form-label">NIK</label>
                    <input type="number" value="<?= $inputnik ?>" name="nik" class="form-control" id="inputNIK" placeholder="3*****" autofocus required autocomplete="off">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="inputKK" class="form-label">Jenis Kelamin</label>
                    <!-- <input type="number" value="" name="nokk" class="form-control" id="inputKK" placeholder="3*****" required autocomplete="off"> -->
                    <select class="form-select" name="jeniskelamin" aria-label="Default select example">
                        <?php
                        if ($inputjeniskelamin != "") {
                        ?>
                            <option value="<?= $inputjeniskelamin ?>"><?= $inputjeniskelamin ?></option>
                        <?php
                        } else {
                        }
                        ?>
                        <option value="Laki - Laki">Laki - Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="col-md-6 mb-4">
                    <label for="inputTL" class="form-label">Tempat Lahir</label>
                    <input type="text" value="<?= $inputtempatlahir ?>" name="tempatlahir" class="form-control" id="inputTL" placeholder="Jember" required autocomplete="off">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="inputTglLahir" class="form-label">Tgl Lahir</label>
                    <input type="date" value="<?= $inputtgllahir ?>" name="tgllahir" class="form-control" id="inputTglLahir" placeholder="" required autocomplete="off">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="alamatAsli" class="form-label">Alamat Asli</label>
                    <textarea name="alamatasli" class="form-control" id="alamatAsli" placeholder="Jl ..." required autocomplete="off"><?= $inputalamatasli ?></textarea>
                </div>
                <div class="col-md-6 mb-4">
                    <label for="inalamatdomisili" class="form-label">Alamat Domisili</label>
                    <textarea name="alamatdomisili" class="form-control" id="inalamatdomisili" placeholder="Jl ..." required autocomplete="off"><?= $inputalamatdomisili ?></textarea>
                </div>

                <div class="col-md-12 col-sm-6">
                    <a href=".?pagedaftar=daftar-1" class="btn btn-secondary" name="batal">Kemabali</a>
                    <button class="btn btn-primary float-end" name="daftar2">Selanjutnya</button>
                </div>
            </div>
        </div>
    </section>

    <?php
    if (isset($_POST["daftar2"])) {
        $nik = $_POST["nik"];
        $jenisKelamin = $_POST["jeniskelamin"];
        $tempatLahir = $_POST["tempatlahir"];
        $tglLahir = $_POST["tgllahir"];
        $alamatAsli = $_POST["alamatasli"];
        $alamatDomisili = $_POST["alamatdomisili"];
        $_SESSION['nik'] = $nik;
        $_SESSION["jeniskelamin"] = $jenisKelamin;
        $_SESSION["tempatlahir"] = $tempatLahir;
        $_SESSION["tgllahir"] = $tglLahir;
        $_SESSION["alamatasli"] = $alamatAsli;
        $_SESSION["alamatdomisili"] = $alamatDomisili;
        // cek nik
        if (strlen($nik) != 16) {
            echo "<script>alert('NIK Anda tidak sesuai')</script>";
            return false;
        } else {
            echo "<script>location='.?pagedaftar=daftar-3'</script>";
        }
    }
    ?>
</form>