<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "uas_manpro";

// Koneksi MySQL
$conn = mysqli_connect($host, $user, $pass, $db);

// Cek status koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
