<?php
include "../config/config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $plat = $_POST['sparepart'];
    $merk = $_POST['merk'];
    $tipe = $_POST['tipe'];
    $status = $_POST['status'];

    $query = "INSERT INTO kendaraan (sparepart, merk, tipe, status) 
              VALUES ('$plat', '$merk', '$tipe', '$status')";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
    } else {
        echo "Gagal menambahkan data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kendaraan</title>
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
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type=text], select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }
        input[type=submit] {
            background-color: #2e86de;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 6px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #145ea8;
        }
        a {
            text-decoration: none;
            color: #2e86de;
            display: inline-block;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>Tambah Kendaraan</h1>
</div>

<div class="container">
    <form method="POST">
        <label>Sparepart:</label>
        <input type="text" name="sparepart" required>

        <label>Merk:</label>
        <input type="text" name="merk" required>

        <label>Tipe:</label>
        <input type="text" name="tipe" required>

        <label>Status:</label>
        <select name="status">
            <option value="Belum Servis">Belum Servis</option>
            <option value="Sedang Servis">Sedang Servis</option>
            <option value="Selesai">Selesai</option>
        </select>

        <input type="submit" value="Simpan">
        <a href="index.php">← Kembali</a>
    </form>
</div>

</body>
</html>
