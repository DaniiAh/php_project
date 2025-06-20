<?php
include "../config/config.php";

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM jadwal_teknisi WHERE id_jadwal=$id");
$data = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $id_teknisi = $_POST['id_teknisi'];
    $tanggal = $_POST['tanggal'];
    $jam = $_POST['jam'];

    mysqli_query($conn, "UPDATE jadwal_teknisi SET id_teknisi='$id_teknisi', tanggal='$tanggal', jam='$jam' WHERE id_jadwal=$id");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Jadwal Teknisi</title>
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
        input[type="text"],
        input[type="date"],
        input[type="time"] {
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
    <h1>Edit Jadwal Teknisi</h1>
</div>

<div class="container">
    <form method="POST">
        <label>ID Teknisi:</label>
        <input type="text" name="id_teknisi" value="<?= $data['id_teknisi'] ?>" required>

        <label>Tanggal:</label>
        <input type="date" name="tanggal" value="<?= $data['tanggal'] ?>" required>

        <label>Jam:</label>
        <input type="time" name="jam" value="<?= $data['jam'] ?>" required>

        <button type="submit" name="update">Update</button>
        <a href="index.php" style="margin-left: 10px;">Kembali</a>
    </form>
</div>

</body>
</html>
