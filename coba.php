<?php
$servername = "sql12.freesqldatabase.com";
$username = "sql12662597";
$password = "E8kiAKdkZw";
$dbname = "sql12662597";
$port = 3306;

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Jika koneksi berhasil, Anda dapat melakukan operasi database di sini

// Contoh query
$sql = "SELECT * FROM nama_tabel";
$result = $conn->query($sql);

// Memeriksa hasil query
if ($result->num_rows > 0) {
    // Proses data
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Name: " . $row["name"] . "<br>";
    }
} else {
    echo "0 results";
}

// Menutup koneksi
$conn->close();
?>
