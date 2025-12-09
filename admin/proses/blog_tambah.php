<?php
include 'koneksi.php'; // sesuaikan path koneksi

// Ambil data dari form
$judul              = mysqli_real_escape_string($conn, $_POST['judul']);
$deskripsi_singkat  = mysqli_real_escape_string($conn, $_POST['deskripsi_singkat']);
$deskripsi_panjang  = mysqli_real_escape_string($conn, $_POST['deskripsi_panjang']);

$namaFileBaru = null;

// ==== PROSES UPLOAD GAMBAR ====
if (!empty($_FILES['gambar']['name'])) {

    $namaFile   = $_FILES['gambar']['name'];
    $tmpName    = $_FILES['gambar']['tmp_name'];

    // Ekstensi diperbolehkan
    $extValid = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    $extFile  = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

    if (!in_array($extFile, $extValid)) {
        echo "<script>alert('Format gambar tidak valid!'); window.location='../blog_tambah.php';</script>";
        exit();
    }

    // Rename file agar tidak bentrok
    $namaFileBaru = time() . '_' . rand(1000,9999) . '.' . $extFile;

    // Pindahkan file ke folder assets
    $pathTujuan = "../../assets/" . $namaFileBaru;

    if (!move_uploaded_file($tmpName, $pathTujuan)) {
        echo "<script>alert('Upload gambar gagal!'); window.location='../blog_tambah.php';</script>";
        exit();
    }
}

// ==== INSERT KE DATABASE ====
$query = "INSERT INTO blog (judul, deskripsi_singkat, deskripsi_lengkap, gambar, timestamp)
          VALUES ('$judul', '$deskripsi_singkat', '$deskripsi_panjang', '$namaFileBaru', NOW())";

if (mysqli_query($conn, $query)) {
    echo "<script>alert('Blog berhasil ditambahkan!'); window.location='../blog.php';</script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
