<?php

$id_transaksi = $_GET["id_transaksi"];
$id_admin = $_SESSION["id_admin"];
$statusnow = "Telah Dipesan";
if (isset($_GET["id_transaksi"]) && $id_transaksi != "") {
    $query = "UPDATE transaksi SET status_transaksi = '$statusnow', id_admin = '$id_admin' WHERE id_transaksi = '$id_transaksi'";
    $send = mysqli_query($connect, $query);
    echo $id_transaksi;
    echo "<script>location='.?page=detailTransaksiDenganDriver&id_transaksi=$id_transaksi'</script>";
} else {
    echo "<script>alert('Ups, Data Tidak Ditemukan!')</script>";
    echo "<script>location='.?page=transaksiBaruLepasKunci'</script>";
}
