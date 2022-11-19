<?php
session_start();
?>
<form method="POST" class="g-3 daftar-akun">
    <section class="content" id="form1">
        <div class="container">
            <h1>Form Ke 2</h1>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <label for="inputNIK" class="form-label">NIK</label>
                    <input type="number" name="nik" class="form-control" id="inputNIK" placeholder="3*****" autofocus required autocomplete="off">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="inputKK" class="form-label">No KK</label>
                    <input type="number" name="nokk" class="form-control" id="inputKK" placeholder="3*****" required autocomplete="off">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="inputTL" class="form-label">Tempat Lahir</label>
                    <input type="text" name="tempatlahir" class="form-control" id="inputTL" placeholder="Jember" required autocomplete="off">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="inputTglLahir" class="form-label">Tgl Lahir</label>
                    <input type="date" name="tgllahir" class="form-control" id="inputTglLahir" placeholder="" required autocomplete="off">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="alamatAsli" class="form-label">Alamat Asli</label>
                    <textarea name="alamatasli" class="form-control" id="alamatAsli" placeholder="Jl ..." required autocomplete="off"></textarea>
                </div>
                <div class="col-md-6 mb-4">
                    <label for="inalamatdomisili" class="form-label">Alamat Domisili</label>
                    <textarea name="alamatdomisili" class="form-control" id="inalamatdomisili" placeholder="Jl ..." required autocomplete="off"></textarea>
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