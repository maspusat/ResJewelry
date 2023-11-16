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

// Menutup koneksi
$conn->close();
?>
