<?php
$id = $_GET['id'];
$table = $_GET['table'];
$id_table = $_GET['id_table'];

$query = "SELECT * FROM pembayaran WHERE id_transaksi = '$id'";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($result);
$buktidp = $row["bukti_dp"];
unlink("../assets/images/transaksi/" . $buktidp);

delete($id, $table, $id_table);
if ($id > 0) {
    echo "<script>
          location='.?page=transaksiBaruLepasKunci'</script>";
} else {

    echo "Error";
    echo mysqli_error($connect);
}
