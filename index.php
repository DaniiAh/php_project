<?php
include "../config.php";

$result = mysqli_query($conn, "SELECT * FROM kendaraan");
?>

<h2>Data Kendaraan</h2>
<a href="tambah.php">+ Tambah Kendaraan</a>
<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>sparepart</th>
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
            <a href="edit.php?id=<?= $row['id_kendaraan'] ?>">Edit</a> | 
            <a href="hapus.php?id=<?= $row['id_kendaraan'] ?>" onclick="return confirm('Hapus data?')">Hapus</a>
        </td>
    </tr>
    <?php } ?>
</table>
