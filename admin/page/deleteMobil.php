<?php
$id = $_GET['id'];
$table = $_GET['table'];
$id_table = $_GET['id_table'];

$query = "SELECT * FROM kondisi_mobil WHERE id_mobil = '$id'";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($result);
$depan = $row["depan"];
$samping = $row["samping"];
$belakang = $row["belakang"];
$interior = $row["interior"];
unlink("../assets/images/mobil/" . $depan);
unlink("../assets/images/mobil/" . $samping);
unlink("../assets/images/mobil/" . $belakang);
unlink("../assets/images/mobil/" . $interior);

delete($id, $table, $id_table);
if ($id > 0) {
    echo "<script>
          location='.?page=$table'</script>";
} else {

    echo "Error";
    echo mysqli_error($connect);
}
