<?php
include "../config/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];

    $query = "INSERT INTO pelanggan (nama_pelanggan, no_hp, alamat) VALUES ('$nama', '$no_hp', '$alamat')";
    mysqli_query($conn, $query);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pelanggan</title>
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
            max-width: 500px;
            margin: 30px auto;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.15);
        }
        h2 {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 6px;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #2e86de;
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        button:hover {
            background-color: #145ea8;
        }
        a {
            display: inline-block;
            margin-top: 15px;
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
    <h1>Tambah Pelanggan</h1>
</div>

<div class="container">
    <form method="POST">
        <label>Nama:</label>
        <input type="text" name="nama" required>

        <label>No HP:</label>
        <input type="text" name="no_hp" required>

        <label>Alamat:</label>
        <textarea name="alamat" rows="3" required></textarea>

        <button type="submit">Simpan</button>
    </form>

    <a href="index.php">← Kembali ke Data Pelanggan</a>
</div>

</body>
</html>
