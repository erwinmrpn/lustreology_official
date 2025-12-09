<?php
include 'koneksi.php';

$id = $_GET['id'];

// Ambil data blog sebelum dihapus (untuk hapus gambar)
$q = mysqli_query($conn, "SELECT * FROM blog WHERE id_blog='$id'");
$data = mysqli_fetch_assoc($q);

// Lokasi folder gambar
$dir = "../../assets/";

// Jika ada gambar, hapus file fisiknya
if (!empty($data['gambar']) && file_exists($dir . $data['gambar'])) {
    unlink($dir . $data['gambar']);
}

// Hapus data dari database
mysqli_query($conn, "DELETE FROM blog WHERE id_blog='$id'");

// Redirect kembali ke halaman blog
echo "<script>alert('Data berhasil dihapus!'); window.location='../blog.php';</script>";
