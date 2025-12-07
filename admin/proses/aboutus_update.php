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

$deskripsi = NULL;
$namaFileBaru = $old['gambar']; // default: tetap gambar lama bila mode deskripsi

// ===============================
// MODE: DESKRIPSI
// ===============================
if ($mode == "deskripsi") {

    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $namaFileBaru = NULL; // gambar dihapus total

    // Hapus gambar lama kalau ada
    if (!empty($old['gambar'])) {
        $path = "../../assets/" . $old['gambar'];
        if (file_exists($path)) {
            unlink($path);
        }
    }
}

// ===============================
// MODE: GAMBAR
// ===============================
if ($mode == "gambar") {

    $deskripsi = NULL; // deskripsi dikosongkan

    if (!empty($_FILES['gambar']['name'])) {

        // Hapus gambar lama jika ada
        if (!empty($old['gambar'])) {
            $path = "../../assets/" . $old['gambar'];
            if (file_exists($path)) {
                unlink($path);
            }
        }

        $namaFile   = $_FILES['gambar']['name'];
        $tmpFile    = $_FILES['gambar']['tmp_name'];
        $namaFileBaru = time() . "_" . $namaFile;

        move_uploaded_file($tmpFile, "../../assets/" . $namaFileBaru);

    } else {
        echo "<script>
            alert('Mode gambar dipilih, tetapi tidak ada gambar yang diupload!');
            window.location='../aboutus_edit.php?id=$id';
        </script>";
        exit();
    }
}

// ===============================
// UPDATE DATABASE
// ===============================
$update = "
    UPDATE about_us SET
        id_kategori   = '$id_kategori',
        judul         = '$judul',
        judul_panjang = '$judul_panjang',
        deskripsi     = ".($deskripsi ? "'$deskripsi'" : "NULL").",
        gambar        = ".($namaFileBaru ? "'$namaFileBaru'" : "NULL")."
    WHERE id = $id
";

mysqli_query($conn, $update);

echo "<script>
    alert('Data berhasil diperbarui!');
    window.location='../about_us.php';
</script>";
exit();
?>
