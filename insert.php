<?php

include 'punk.php';

$nama = $_GET['nama'];
$no_telpon = $_GET['No_Telpon'];
$alamat = $_GET['alamat'];
$kategori = $_GET['var_kcpa'] ?? $_GET['var_kcpe'];
$nama_cincin = $_GET['var_ncpa'] ?? $_GET['var_ncpe'];
$uc_pria = $_GET['UC_Pria'];
$uc_wanita = $_GET['UC_Wanita'];

$sql = "INSERT INTO pembelian (nama, no_telpon, alamat, kategori, nama_cincin, uc_pria, uc_wanita) 
        VALUES ('$nama', '$no_telpon', '$alamat', '$kategori', '$nama_cincin', '$uc_pria', '$uc_wanita')";

if ($conn->query($sql) === TRUE) {
    header("Location: berhasil.html");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
