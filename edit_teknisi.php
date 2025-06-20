<?php
include "../config/config.php";

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM teknisi WHERE id_teknisi=$id");
$data = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $spesialisasi = $_POST['spesialisasi'];

    mysqli_query($conn, "UPDATE teknisi SET nama_teknisi='$nama', no_hp='$no_hp', spesialisasi='$spesialisasi' WHERE id_teknisi=$id");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Teknisi</title>
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
            text-align: center;
        }
        label {
            font-weight: bold;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: 1px solid #ccc;
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
        .back-btn {
            display: inline-block;
            margin-top: 10px;
            color: #2e86de;
            text-decoration: none;
        }
        .back-btn:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>Edit Data Teknisi</h1>
</div>

<div class="container">
    <form method="POST">
        <label>Nama Teknisi:</label>
        <input type="text" name="nama" value="<?= $data['nama_teknisi'] ?>" required>

        <label>No HP:</label>
        <input type="text" name="no_hp" value="<?= $data['no_hp'] ?>" required>

        <label>Spesialisasi:</label>
        <input type="text" name="spesialisasi" value="<?= $data['spesialisasi'] ?>" required>

        <button type="submit" name="update">Update</button>
        <a href="index.php" class="back-btn">Kembali</a>
    </form>
</div>

</body>
</html>
