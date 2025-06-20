<?php
include "../config/config.php";
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM teknisi WHERE id_teknisi='$id'");
header("Location: index.php");
?>