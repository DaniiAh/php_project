<?php
include "../config/config.php";

$result = mysqli_query($conn, "SELECT * FROM kendaraan");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Kendaraan</title>
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
            text-align: center;
            margin-bottom: 20px;
        }
        a.button, a.back-btn {
            display: inline-block;
            padding: 10px 15px;
            background-color: #2e86de;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            margin-bottom: 15px;
        }
        a.button:hover, a.back-btn:hover {
            background-color: #145ea8;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px 8px;
            text-align: center;
        }
        th {
            background-color: #2e86de;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        a.action {
            color: #2e86de;
            text-decoration: none;
            margin: 0 5px;
        }
        a.action:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>Data Kendaraan</h1>
    </div>

    <div class="container">
        <a href="../index.php" class="back-btn">← Kembali ke Menu Utama</a>
        <a href="tambah.php" class="button">+ Tambah Kendaraan</a>

        <table>
            <tr>
                <th>ID</th>
                <th>Sparepart</th>
                <th>Merk</th>
                <th>Tipe</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['id_kendaraan'] ?></td>
                <td><?= $row['sparepart'] ?></td>
                <td><?= $row['merk'] ?></td>
                <td><?= $row['tipe'] ?></td>
                <td><?= $row['status'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id_kendaraan'] ?>" class="action">Edit</a> |
                    <a href="hapus.php?id=<?= $row['id_kendaraan'] ?>" class="action" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>

</body>
</html>
