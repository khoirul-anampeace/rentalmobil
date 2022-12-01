<?php

$connect = mysqli_connect("localhost", "root", "", "db_rentalmobil");
function connect()
{
    $connect = mysqli_connect("localhost", "root", "", "db_rentalmobil");
    return $connect;
}
function cekKoneksi()
{

    if (mysqli_connect_errno()) {
        echo "Koneksi gagal :" . mysqli_connect_error();
    } else {
        echo "Koneksi berhasil";
    }
}
// cekKoneksi();

function query($query)
{
    $result = mysqli_query(connect(), $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// Delete
function delete($id, $table, $id_table)
{
    global $connect;
    $query = "DELETE FROM $table WHERE $id_table = '$id'";
    mysqli_query($connect, $query);

    if (mysqli_affected_rows($connect) > 0) {
        echo "<script>alert('Data Berhasil dihapus');</script>";
    } else {
        echo mysqli_error($connect);
    }
}

// Upload image
function upload($nama, $gambar, $folder)
{
    $fileName = $_FILES[$gambar]['name'];
    $fileSize = $_FILES[$gambar]['size'];
    $fileError = $_FILES[$gambar]['error'];
    $temporyName = $_FILES[$gambar]['tmp_name'];
    echo "Halo" . $_FILES[$gambar]['name'];
    // Cek file apakah ada
    if (!$fileError === 0) {
        echo "<script>alert('gambar belum di input');</script>";
        return false;
    }

    // cek apakah file yang diupload gambar?
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $fileName);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>alert('file $nama bukan gambar');</script>";
        return false;
    }

    // membuat minimal ukuran
    // if ($fileSize > 2000000) {
    //     echo "<script>alert('ukuran gambar terlalu besar');</script>";
    //     return false;
    // }

    // generate nama gambar baru
    // $newFileName = uniqid();
    $nama .= '.';
    $nama .= $ekstensiGambar;
    $tempat = "../assets/images/" . $folder . "/";

    // tempat penyimpanan
    move_uploaded_file($temporyName, $tempat . $nama);

    return $nama;
}




// Kelulusan
function cari($nis)
{
    $query = "SELECT * FROM kelulusan WHERE nis = '$nis'";
    return query($query);
}


// rupiah
function rupiah($angka)
{
    $rupiah = number_format($angka, 2, ',', '.');
    return $rupiah;
}
