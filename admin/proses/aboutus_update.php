<?php
include "koneksi.php";
include "session.php";

$id             = $_POST['id'];
$mode           = $_POST['mode'];
$id_kategori    = $_POST['id_kategori'];
$judul          = mysqli_real_escape_string($conn, $_POST['judul']);
$judul_panjang  = mysqli_real_escape_string($conn, $_POST['judul_panjang']);

// Ambil data lama
$q = mysqli_query($conn, "SELECT * FROM about_us WHERE id = $id");
$old = mysqli_fetch_assoc($q);

// Default: set deskripsi & gambar lama tetap
$deskripsi      = $old['deskripsi'];
$namaFileBaru   = $old['gambar'];

/* ===========================
   MODE: DESKRIPSI
   =========================== */
if ($mode == "deskripsi") {
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);

    // Gambar TIDAK DIHAPUS — tetap memakai gambar lama
}

/* ===========================
   MODE: GAMBAR
   =========================== */
if ($mode == "gambar") {
    $deskripsi = NULL; // saat mode gambar, deskripsi dikosongkan (sesuai konsep Anda)

    if (!empty($_FILES['gambar']['name'])) {

        // Hapus gambar lama jika ada
        if (!empty($old['gambar'])) {
            $path = "../../assets/" . $old['gambar'];
            if (file_exists($path)) unlink($path);
        }

        $namaFile   = $_FILES['gambar']['name'];
        $tmpFile    = $_FILES['gambar']['tmp_name'];
        $namaFileBaru = time() . "_" . $namaFile;

        move_uploaded_file($tmpFile, "../../assets/" . $namaFileBaru);

    } else {
        // Jika user TIDAK upload gambar baru, gunakan gambar lama
        $namaFileBaru = $old['gambar'];
    }
}

/* ===========================
   UPDATE DATABASE
   =========================== */
$update = "
    UPDATE about_us SET
        id_kategori   = '$id_kategori',
        judul         = '$judul',
        judul_panjang = '$judul_panjang',
        deskripsi     = ".($deskripsi !== NULL ? "'$deskripsi'" : "NULL").",
        gambar        = ".($namaFileBaru !== NULL ? "'$namaFileBaru'" : "NULL")."
    WHERE id = $id
";

mysqli_query($conn, $update);

echo "<script>
    alert('Data berhasil diperbarui!');
    window.location='../about_us.php';
</script>";
exit();
?>
