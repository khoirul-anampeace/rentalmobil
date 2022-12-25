<?php
$id = $_GET['id'];
$id_table = $_GET['id_table'];
$hals = $_GET['hals'];
echo "Halaman" . $hals;

$query = "SELECT * FROM transaksi t JOIN pembayaran p ON t.id_transaksi = p.id_transaksi WHERE t.id_transaksi = '$id'";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($result);
$buktidp = $row["bukti_dp"];
unlink("../assets/images/transaksi/" . $buktidp);

$id_mobil = $row["id_mobil"];
$query3 = "UPDATE mobil SET status_mobil = 'Tersedia' WHERE id_mobil = '$id_mobil'";
$send3 = mysqli_query($connect, $query3);
delete($id, "transaksi", $id_table);
if ($id > 0) {
    if ($_GET["hals"] == "semuaLepasKunci") {
        echo "<script>
              location='.?page=semuaLepasKunci'</script>";
    } else if ($_GET["hals"] == "semuaDenganDriver") {
        echo "<script>
              location='.?page=semuaDenganDriver'</script>";
    }
} else {

    echo "Error";
    echo mysqli_error($connect);
}
