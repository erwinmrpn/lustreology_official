<?php
session_start();
include "koneksi.php"; // sesuaikan path jika perlu

// Ambil data dari form
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Query ambil data admin berdasarkan username
$query = "SELECT * FROM user WHERE username = '$username' LIMIT 1";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);

    // Verifikasi password (MD5)
    if (md5($password) == $row['password']) {
        // Set session login
        $_SESSION['admin_login'] = true;
        $_SESSION['username'] = $row['username'];

        header("Location: ../dashboard.php");
        exit;
    } else {
        echo "<script>alert('Password salah!'); window.location='../index.php';</script>";
    }
} else {
    echo "<script>alert('Username tidak ditemukan!'); window.location='../index.php';</script>";
}
?>
