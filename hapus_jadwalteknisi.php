<?php
include "../config/config.php";

$id = isset($_GET['id']) ? $_GET['id'] : null;


// Hapus data pelanggan
mysqli_query($conn, "DELETE FROM pelanggan WHERE id_pelanggan='$id'");

// Ambil semua data pelanggan yang masih ada, urutkan berdasar id lama
$result = mysqli_query($conn, "SELECT * FROM pelanggan ORDER BY id_pelanggan ASC");

// Reset urutan id mulai dari 1
$no = 1;
while($row = mysqli_fetch_assoc($result)) {
    mysqli_query($conn, "UPDATE pelanggan SET id_pelanggan='$no' WHERE id_pelanggan='".$row['id_pelanggan']."'");
    $no++;
}

// Kalau datanya kosong, biar auto increment-nya tetep di 1
if($no == 1){
    $no = 1;
}

// Set ulang auto increment ke angka berikutnya
mysqli_query($conn, "ALTER TABLE pelanggan AUTO_INCREMENT = $no");
