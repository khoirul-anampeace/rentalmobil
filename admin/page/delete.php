<?php
$id = $_GET['id'];
$table = $_GET['table'];
$id_table = $_GET['id_table'];


delete($id, $table, $id_table);

if ($id > 0) {
    echo "<script>
          location='.?page=$table'</script>";
} else {

    echo "Error";
    echo mysqli_error($connect);
}
