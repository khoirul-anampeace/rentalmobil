<?php
$id = $_GET['id'];
$table = $_GET['table'];
$id_table = $_GET['id_table'];

$query = "SELECT * FROM admin WHERE id_admin = '$id'";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($result);
$fotoprofil = $row["fotoprofil"];
unlink("../assets/images/admin/" . $fotoprofil);

delete($id, $table, $id_table);
if ($id > 0) {
    echo "<script>
          location='.?page=$table'</script>";
} else {

    echo "Error";
    echo mysqli_error($connect);
}
