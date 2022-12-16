<?php

$id_transaksi = $_GET["id_transaksi"];
$id_admin = $_SESSION["id_admin"];
$statusnow = "Survei Lokasi";
$query = "UPDATE transaksi SET
status_transaksi = '$statusnow', id_admin = '$id_admin' WHERE id_transaksi = '$id_transaksi'";
$send = mysqli_query($connect, $query);
echo $id_transaksi;
echo "<script>location='.?page=detailTransaksiLepasKunci&id_transaksi=$id_transaksi'</script>";
