<?php
include "../config/config.php";

if (isset($_POST['simpan'])) {
    $nama_teknisi = $_POST['nama_teknisi'];
    $no_hp = $_POST['no_hp'];
    $spesialisasi = $_POST['spesialisasi'];

    $query = "INSERT INTO teknisi (nama_teknisi, no_hp, spesialisasi)
              VALUES ('$nama_teknisi', '$no_hp', '$spesialisasi')";
    mysqli_query($conn, $query);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Teknisi</title>
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
            margin-bottom: 20px;
            color: #2e86de;
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
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
        a {
            text-decoration: none;
            color: #2e86de;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>Tambah Teknisi</h1>
</div>

<div class="container">
    <form method="POST">
        <label>Nama Teknisi:</label>
        <input type="text" name="nama_teknisi" required>

        <label>No HP:</label>
        <input type="text" name="no_hp" required>

        <label>Spesialisasi:</label>
        <input type="text" name="spesialisasi" required>

        <button type="submit" name="simpan">Simpan</button>
        <a href="index.php" style="margin-left: 10px;">Kembali</a>
    </form>
</div>

</body>
</html>
