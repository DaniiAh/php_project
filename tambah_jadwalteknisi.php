<?php
include "../config/config.php";

$error = "";

if (isset($_POST['simpan'])) {
    $id_teknisi = $_POST['id_teknisi'];
    $tanggal = $_POST['tanggal'];
    $jam = $_POST['jam'];

    // Cek jadwal bentrok
    $cek = mysqli_query($conn, "SELECT * FROM jadwal_teknisi 
                                WHERE id_teknisi='$id_teknisi' 
                                AND tanggal='$tanggal' 
                                AND jam='$jam'");
    if (mysqli_num_rows($cek) > 0) {
        $error = "⚠️ Teknisi sudah dibooking di tanggal dan jam tersebut!";
    } else {
        $query = "INSERT INTO jadwal_teknisi (id_teknisi, tanggal, jam)
                  VALUES ('$id_teknisi', '$tanggal', '$jam')";
        mysqli_query($conn, $query);
        header("Location: index.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Jadwal Teknisi</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f6f8; margin: 0; padding: 0; }
        .header { background-color: #2e86de; color: white; padding: 20px; text-align: center; }
        .container { padding: 30px; max-width: 600px; margin: 30px auto; background-color: white; border-radius: 10px; box-shadow: 0 2px 6px rgba(0,0,0,0.15); }
        label { display: block; margin-bottom: 8px; margin-top: 12px; }
        input, select { width: 100%; padding: 8px; margin-bottom: 12px; border: 1px solid #ccc; border-radius: 6px; }
        button { background-color: #2e86de; color: white; padding: 10px 16px; border: none; border-radius: 6px; }
        button:hover { background-color: #145ea8; }
        .error { color: red; margin-bottom: 15px; padding: 10px; background-color: #ffe5e5; border: 1px solid red; border-radius: 6px; }
        .back-btn { background-color: #ccc; color: black; text-decoration: none; padding: 8px 14px; border-radius: 5px; margin-bottom: 15px; display: inline-block; }
        .back-btn:hover { background-color: #999; }
    </style>
</head>
<body>

<div class="header">
    <h1>Tambah Jadwal Teknisi</h1>
</div>

<div class="container">
    <a href="index.php" class="back-btn">← Kembali</a>

    <?php if (!empty($error)) echo "<div class='error'>$error</div>"; ?>

    <form method="POST">
        <label>Teknisi:</label>
        <select name="id_teknisi" required>
            <option value="">-- Pilih Teknisi --</option>
            <?php
            $teknisi = mysqli_query($conn, "SELECT * FROM teknisi");
            while ($t = mysqli_fetch_assoc($teknisi)) {
                echo "<option value='".$t['id_teknisi']."'>".$t['nama_teknisi']."</option>";
            }
            ?>
        </select>

        <label>Tanggal:</label>
        <input type="date" name="tanggal" required>

        <label>Jam:</label>
        <input type="time" name="jam" required>

        <button type="submit" name="simpan">Simpan</button>
    </form>
</div>

</body>
</html>
