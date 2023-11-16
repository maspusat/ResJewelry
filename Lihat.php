<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Data - RES JEWELRY</title>
    <link rel="icon" href="image/icon.ico">
    <link href="style.css" rel="stylesheet" type="text/css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #FFCCCC;
            height: 50px;
        }

        .topnav {
            background-color: #FFCCCC;
            overflow: hidden;
        }

        .topnav a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .topnav a:hover {
            background-color: #whitesmoke;
            color: white;
        }

        .content {
            margin: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #FFCCCC;
            color: white;
        }
        .action-buttons {
        text-align: center;
        }
        .action-buttons button {
            margin: 5px;
            padding: 8px 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .action-buttons button.delete-button {
            background-color: #f44336;
        }

        .action-buttons button:hover {
            background-color: #45a049;
        }

        .action-buttons button.delete-button:hover {
            background-color: #d32f2f;
        }
    </style>
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
        <?php
        include 'punk.php';

        $sql = "SELECT * FROM pembelian";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h2>Data Pembelian</h2>";
            echo"<h6>*Hapus Data Jika Pembelian Telah Selesai</h6>";
            echo "<table>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>No Telpon</th>
                        <th>Alamat</th>
                        <th>Kategori</th>
                        <th>Nama Cincin</th>
                        <th>Ukuran Cincin Pria</th>
                        <th>Ukuran Cincin Wanita</th>
                        <th>Aksi</th>
                    </tr>";

            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['nama'] . "</td>
                        <td>" . $row['no_telpon'] . "</td>
                        <td>" . $row['alamat'] . "</td>
                        <td>" . $row['kategori'] . "</td>
                        <td>" . $row['nama_cincin'] . "</td>
                        <td>" . $row['uc_pria'] . "</td>
                        <td>" . $row['uc_wanita'] . "</td>
                        <td class='action-buttons'>
                            <form action='update.php' method='get'>
                                <input type='hidden' name='id' value='" . $row['id'] . "'>
                                <button type='submit'>Update</button>
                            </form>
                            <form action='delete.php' method='post'>
                                <input type='hidden' name='id' value='" . $row['id'] . "'>
                                <button type='submit' class='delete-button'>Delete</button>
                            </form>
                        </td>
                      </tr>";
            }

            echo "</table>";
        } else {
            echo "<p>Tidak Ada Data</p>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
