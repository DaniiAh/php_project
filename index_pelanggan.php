<?php
include "../config/config.php";

$query = "SELECT * FROM pelanggan";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Pelanggan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #2e86de;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .container {
            padding: 30px;
            max-width: 900px;
            margin: 30px auto;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.15);
        }
        h2 {
            margin-bottom: 20px;
        }
        a {
            text-decoration: none;
            color: #2e86de;
        }
        a:hover {
            text-decoration: underline;
        }
        .tambah-btn, .back-btn {
            display: inline-block;
            margin-bottom: 15px;
            background-color: #2e86de;
            color: white;
            padding: 10px 16px;
            border-radius: 6px;
            margin-right: 8px;
        }
        .tambah-btn:hover, .back-btn:hover {
            background-color: #145ea8;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #ecf0f1;
        }
        .aksi a {
            margin-right: 8px;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>Data Pelanggan</h1>
</div>

<div class="container">
    <a href="../index.php" class="back-btn">← Kembali ke Menu Utama</a>
    <a href="tambah.php" class="tambah-btn">+ Tambah Pelanggan</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>No HP</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row['id_pelanggan'] ?></td>
            <td><?= $row['nama_pelanggan'] ?></td>
            <td><?= $row['no_hp'] ?></td>
            <td><?= $row['alamat'] ?></td>
            <td class="aksi">
                <a href="edit.php?id=<?= $row['id_pelanggan'] ?>">Edit</a>
                <a href="hapus.php?id=<?= $row['id_pelanggan'] ?>" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>
