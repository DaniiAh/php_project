<?php
include "../config.php";

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM kendaraan WHERE id_kendaraan='$id'");
$row = mysqli_fetch_assoc($data);

if(isset($_POST['submit'])) {
    $sparepart = $_POST['sparepart'];
    $merk       = $_POST['merk'];
    $tipe       = $_POST['tipe'];
    $status     = $_POST['status'];

    $query = "UPDATE kendaraan SET 
                sparepart='$sparepart',
                merk='$merk',
                tipe='$tipe',
                status='$status'
              WHERE id_kendaraan='$id'";

    mysqli_query($conn, $query);
    header("Location: index.php");
}
?>

<h2>Edit Kendaraan</h2>
<form method="POST">
    sparepart: <input type="text" name="sparepart" value="<?= $row['sparepart'] ?>"><br>
    Merk: <input type="text" name="merk" value="<?= $row['merk'] ?>"><br>
    Tipe: <input type="text" name="tipe" value="<?= $row['tipe'] ?>"><br>
    Status:
    <select name="status">
        <option value="Belum Servis" <?= ($row['status']=='Belum Servis')?'selected':''; ?>>Belum Servis</option>
        <option value="Sudah Servis" <?= ($row['status']=='Sudah Servis')?'selected':''; ?>>Sudah Servis</option>
    </select><br>
    <button type="submit" name="submit">Update</button>
</form>
