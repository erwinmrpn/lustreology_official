<?php
include 'koneksi.php';

$id_blog = $_POST['id_blog'];
$judul = $_POST['judul'];
$deskripsi_singkat = $_POST['deskripsi_singkat'];
$deskripsi_panjang = $_POST['deskripsi_panjang'];

// Ambil data lama
$qOld = mysqli_query($conn, "SELECT * FROM blog WHERE id_blog='$id_blog'");
$old = mysqli_fetch_assoc($qOld);
$gambar_lama = $old['gambar'];

// Cek apakah ada gambar baru
if ($_FILES['gambar']['name'] != "") {

    // Nama file
    $namaFile = time() . '_' . $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];

    // Lokasi upload
    $dirUpload = "../../assets/";

    // Upload file
    move_uploaded_file($tmp, $dirUpload . $namaFile);

    // Hapus gambar lama jika ada
    if ($gambar_lama != "" && file_exists($dirUpload . $gambar_lama)) {
        unlink($dirUpload . $gambar_lama);
    }

    // Set gambar baru
    $gambar_final = $namaFile;

} else {
    // Jika tidak upload gambar, gunakan gambar lama
    $gambar_final = $gambar_lama;
}

// Update database
$query = "UPDATE blog SET 
            judul='$judul',
            deskripsi_singkat='$deskripsi_singkat',
            deskripsi_lengkap='$deskripsi_panjang',
            gambar='$gambar_final'
          WHERE id_blog='$id_blog'";

if (mysqli_query($conn, $query)) {
    echo "<script>alert('Berhasil memperbarui data!'); window.location='../blog.php';</script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
