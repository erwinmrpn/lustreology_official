<?php
include "koneksi.php";

$kategori = mysqli_real_escape_string($conn, $_POST['kategori']);

$query = "INSERT INTO tabel_kategori_about_us (kategori)
          VALUES ('$kategori')";

mysqli_query($conn, $query);

header("Location: ../about_us.php?status=kategori_added");
exit();
?>
