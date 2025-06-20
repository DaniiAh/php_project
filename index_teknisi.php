<?php
include "../config/config.php";

$query = "SELECT * FROM teknisi";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Teknisi</title>
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
        a {
            text-decoration: none;
            color: #2e86de;
        }
        a:hover {
            text-decoration: underline;
        }
        .tambah-btn, .kembali-btn {
            display: inline-block;
            margin-bottom: 15px;
            background-color: #2e86de;
            color: white;
            padding: 10px 16px;
            border-radius: 6px;
            margin-right: 10px;
        }
        .tambah-btn:hover, .kembali-btn:hover {
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
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #ecf0f1;
        }
        .aksi a {
            margin-right: 8px;
        }
        .table-container {
            overflow-x: auto;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>Data Teknisi</h1>
</div>

<div class="container">
    <a href="../index.php" class="kembali-btn">← Kembali ke Menu Utama</a>
    <a href="tambah.php" class="tambah-btn">+ Tambah Teknisi</a>

    <div class="table-container">
        <table>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Spesialis</th>
                <th>Aksi</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['id_teknisi'] ?></td>
                <td><?= $row['nama_teknisi'] ?></td>
                <td><?= $row['spesialisasi'] ?></td>
                <td class="aksi">
                    <a href="edit.php?id=<?= $row['id_teknisi'] ?>">Edit</a>
                    <a href="hapus.php?id=<?= $row['id_teknisi'] ?>" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>

</body>
</html>
