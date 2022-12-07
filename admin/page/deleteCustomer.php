<?php
$id = $_GET['id'];
$table = $_GET['table'];
$id_table = $_GET['id_table'];

$query = "SELECT * FROM customer WHERE id_customer = '$id'";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($result);
$fotoprofil = $row["fotoprofil"];
$fotoktp = $row["fotoktp"];
$fotoktpwajah = $row["fotoktpwajah"];
$fotosim = $row["fotosim"];
$fotokk = $row["fotokk"];
unlink("../assets/images/customer/" . $fotoprofil);
unlink("../assets/images/customer/" . $fotoktp);
unlink("../assets/images/customer/" . $fotoktpwajah);
unlink("../assets/images/customer/" . $fotosim);
unlink("../assets/images/customer/" . $fotokk);

delete($id, $table, $id_table);
if ($id > 0) {
    echo "<script>
          location='.?page=$table'</script>";
} else {

    echo "Error";
    echo mysqli_error($connect);
}
