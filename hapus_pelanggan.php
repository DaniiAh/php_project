<?php
// include koneksi database
include "../config/config.php";

// tangkap id dari parameter URL
$id = $_GET['id'];

// eksekusi query hapus data berdasarkan id_pelanggan
mysqli_query($conn, "DELETE FROM pelanggan WHERE id_pelanggan='$id'");

// redirect ke halaman utama data pelanggan
header("Location: index.php");
?>
