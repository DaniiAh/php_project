<?php
include "../config/config.php";

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM pelanggan WHERE id_pelanggan=$id");
$data = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];

    mysqli_query($conn, "UPDATE pelanggan SET nama_pelanggan='$nama', no_hp='$no_hp', alamat='$alamat' WHERE id_pelanggan=$id");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Pelanggan</title>
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
            text-align: center;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 12px;
        }
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        button {
            padding: 12px 20px;
            background-color: #2e86de;
            color: white;
            border: none;
            border-radius: 6px;
            margin-top: 20px;
            cursor: pointer;
        }
        button:hover {
            background-color: #145ea8;
        }
        .back-btn {
            display: inline-block;
            padding: 12px 20px;
            background-color: #ccc;
            color: black;
            text-decoration: none;
            border-radius: 6px;
            margin-left: 10px;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>Edit Data Pelanggan</h1>
</div>

<div class="container">
    <form method="POST">
        <label>Nama:</label>
        <input type="text" name="nama" value="<?= $data['nama_pelanggan'] ?>" required>

        <label>No HP:</label>
        <input type="text" name="no_hp" value="<?= $data['no_hp'] ?>" required>

        <label>Alamat:</label>
        <textarea name="alamat" required><?= $data['alamat'] ?></textarea>

        <button type="submit" name="update">Update</button>
        <a href="index.php" class="back-btn">Batal</a>
    </form>
</div>

</body>
</html>
