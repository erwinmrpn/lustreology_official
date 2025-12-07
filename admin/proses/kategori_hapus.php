<?php
include "koneksi.php";

$id = $_GET['id'];

// Hapus kategori
mysqli_query($conn, "DELETE FROM tabel_kategori_about_us WHERE id_kategori = $id");

// Hapus juga semua data about_us yang memakai kategori ini
mysqli_query($conn, "DELETE FROM about_us WHERE id_kategori = $id");

header("Location: ../about_us.php?status=kategori_deleted");
exit();
?>
