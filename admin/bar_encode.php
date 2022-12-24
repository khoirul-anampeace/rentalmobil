<?php

require("../config/function.php");
header('Content-Type: application/json');
$sqlQuery = "SELECT t.tgl_berangkat, SUM(p.total_harga) AS jmltransaksi FROM transaksi t JOIN pembayaran p ON t.id_transaksi = p.id_transaksi WHERE (t.status_transaksi != 'Transaksi Ditolak' OR t.status_transaksi = 'Sewa Dibatalkan') GROUP BY t.tgl_berangkat";
$result = mysqli_query($connect, $sqlQuery);

$data = array();
foreach ($result as $row) :
    $data[] = $row;
endforeach;

mysqli_close($connect);
echo json_encode($data);
