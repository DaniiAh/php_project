<?php
include "../config/config.php";

$id = $_GET['id'];

// Hapus data kendaraan berdasarkan id
mysqli_query($conn, "DELETE FROM kendaraan WHERE id_kendaraan='$id'");

// Ambil semua data kendaraan yang masih ada, urutkan berdasar id lama
$result = mysqli_query($conn, "SELECT * FROM kendaraan ORDER BY id_kendaraan ASC");

// Reset urutan id mulai dari 1
$no = 1;
while($row = mysqli_fetch_assoc($result)) {
    mysqli_query($conn, "UPDATE kendaraan SET id_kendaraan='$no' WHERE id_kendaraan='".$row['id_kendaraan']."'");
    $no++;
}

// Kalau datanya kosong, biar auto increment-nya tetep di 1
if($no == 1){
    $no = 1;
}

// Set ulang auto increment ke angka berikutnya
mysqli_query($conn, "ALTER TABLE kendaraan AUTO_INCREMENT = $no");

// Balik ke halaman index
header("Location: index.php");
?>
