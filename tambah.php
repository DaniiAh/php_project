<?php
include "../config.php";

if(isset($_POST['submit'])) {
    $sparepart = $_POST['sparepart'];
    $merk       = $_POST['merk'];
    $tipe       = $_POST['tipe'];
    $status     = $_POST['status'];

    $query = "INSERT INTO kendaraan (sparepart, merk, tipe, status) 
              VALUES ('$sparepart', '$merk', '$tipe', '$status')";

    mysqli_query($conn, $query);
    header("Location: index.php");
}
?>

<h2>Tambah Kendaraan</h2>
<form method="POST">
    sparepart: <input type="text" name="sparepart"><br>
    Merk: <input type="text" name="merk"><br>
    Tipe: <input type="text" name="tipe"><br>
    Status: 
    <select name="status">
        <option value="Belum Servis">Belum Servis</option>
        <option value="Sudah Servis">Sudah Servis</option>
    </select><br>
    <button type="submit" name="submit">Simpan</button>
</form>
