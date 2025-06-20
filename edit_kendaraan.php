<?php
include "../config/config.php";

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM kendaraan WHERE id_kendaraan=$id");
$data = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $sparepart = $_POST['sparepart'];
    $merk = $_POST['merk'];
    $tipe = $_POST['tipe'];
    $status = $_POST['status'];

    mysqli_query($conn, "UPDATE kendaraan SET sparepart='$sparepart', merk='$merk', tipe='$tipe', status='$status' WHERE id_kendaraan=$id");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Kendaraan</title>
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
            max-width: 600px;
            margin: 30px auto;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.15);
        }
        label {
            display: block;
            margin-top: 12px;
            margin-bottom: 8px;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        button {
            background-color: #2e86de;
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        button:hover {
            background-color: #145ea8;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>Edit Data Kendaraan</h1>
</div>

<div class="container">

<form method="POST">
    <label>Sparepart:</label>
    <input type="text" name="sparepart" value="<?= $data['sparepart'] ?>" required>

    <label>Merk:</label>
    <input type="text" name="merk" value="<?= $data['merk'] ?>" required>

    <label>Tipe:</label>
    <input type="text" name="tipe" value="<?= $data['tipe'] ?>" required>

    <label>Status:</label>
    <select name="status" required>
        <option value="Belum Servis" <?= ($data['status'] == 'Belum Servis') ? 'selected' : '' ?>>Belum Servis</option>
        <option value="Sedang Servis" <?= ($data['status'] == 'Sedang Servis') ? 'selected' : '' ?>>Sedang Servis</option>
        <option value="Selesai Servis" <?= ($data['status'] == 'Selesai Servis') ? 'selected' : '' ?>>Selesai Servis</option>
    </select>

    <button type="submit" name="update">Update</button>
</form>

</div>

</body>
</html>
