<?php
include "koneksi.php";
include "session.php";

$id = $_GET['id'];

// Ambil data berdasarkan ID
$query = mysqli_query($conn, "SELECT * FROM about_us WHERE id = $id");
$data  = mysqli_fetch_assoc($query);

// Jika ada data gambar, hapus dari folder
if (!empty($data['gambar'])) {
    $path = "../../assets/" . $data['gambar'];
    if (file_exists($path)) {
        unlink($path);  // Hapus file
    }
}

// Hapus data dari database
mysqli_query($conn, "DELETE FROM about_us WHERE id = $id");

echo "
<script>
    alert('Data About Us berhasil dihapus!');
    window.location='../about_us.php';
</script>
";
exit();
?>
