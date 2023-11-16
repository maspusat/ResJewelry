<?php
include 'punk.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Delete the data
    $sql = "DELETE FROM pembelian WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Hapus Data Sukses";
        header("Location: lihat.php");
    } else {
        echo "Error Moas" . $conn->error;
    }

    $conn->close();
} else {
    echo "Gagal Moas";
}
?>
