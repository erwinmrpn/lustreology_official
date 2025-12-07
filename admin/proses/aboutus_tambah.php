<?php
include "koneksi.php";
include "session.php";

// Ambil input
$mode          = $_POST['mode'];
$id_kategori   = $_POST['id_kategori'];
$judul         = mysqli_real_escape_string($conn, $_POST['judul']);
$judul_panjang = mysqli_real_escape_string($conn, $_POST['judul_panjang']);

// Default kosong
$deskripsi = NULL;
$namaFileBaru = NULL;

// =========================
// MODE: HANYA DESKRIPSI
// =========================
if ($mode == "deskripsi") {
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
}

// =========================
// MODE: HANYA GAMBAR
// =========================
if ($mode == "gambar") {

    if (!empty($_FILES['gambar']['name'])) {

        $namaFile   = $_FILES['gambar']['name'];
        $tmpFile    = $_FILES['gambar']['tmp_name'];

        // Generate nama baru supaya unik
        $namaFileBaru = time() . "_" . $namaFile;
        $folderTujuan = "../../assets/" . $namaFileBaru;

        // Upload file
        move_uploaded_file($tmpFile, $folderTujuan);

    } else {
        // Jika mode gambar tapi tidak upload file
        echo "<script>alert('Mode gambar dipilih tetapi tidak ada file yang diupload!'); 
              window.location='../aboutus_admin.php';</script>";
        exit();
    }
}

// =========================
// INSERT KE DATABASE
// =========================

$query = "INSERT INTO about_us 
            (id_kategori, judul, judul_panjang, deskripsi, gambar)
          VALUES 
            ('$id_kategori', '$judul', '$judul_panjang', " . 
            ($deskripsi ? "'$deskripsi'" : "NULL") . ", " . 
            ($namaFileBaru ? "'$namaFileBaru'" : "NULL") . "
          )";

mysqli_query($conn, $query);

// Redirect setelah sukses
echo "<script>
        alert('Data About Us berhasil ditambahkan!');
        window.location='../about_us.php';
      </script>";
exit();
?>
