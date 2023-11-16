<?php
include 'punk.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $no_telpon = $_POST['No_Telpon'];
    $alamat = $_POST['Alamat'];

    $sql = "UPDATE pembelian SET nama='$nama', no_telpon='$no_telpon', alamat='$alamat' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location: lihat.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
} elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "SELECT * FROM pembelian WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Data - RES JEWELRY</title>
    <link rel="icon" href="image/icon.ico">
    <link href="style.css" rel="stylesheet" type="text/css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <div class="header"></div>

    <div class="topnav">
        <a href="index.html">Home</a>
        <a href="TentangKami.html">Tentang Kami</a>
        <a href="Catalog.html">Catalog</a>
        <a href="CaraPesan.html">Cara Pesan</a>
    </div>

    <div class="content">
        <form action="update.php" method="post">
            <h2>Update Data Pembelian</h2>
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required>

            <label for="No_Telpon">No Telpon</label>
            <input type="text" id="No_Telpon" name="No_Telpon" value="<?php echo $row['no_telpon']; ?>" required>

            <label for="Alamat">Alamat</label>
            <input type="text" id="Alamat" name="Alamat" value="<?php echo $row['alamat']; ?>" required>

            <button type="submit" name="update">Update</button>
        </form>
    </div>
</body>
</html>
<?php
    } else {
        echo "Data not found.";
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>
