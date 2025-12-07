<?php
include "proses/koneksi.php";
include "proses/session.php";

$id = $_GET['id'];

// Ambil data berdasarkan ID
$query = mysqli_query($conn, 
    "SELECT * FROM about_us 
     LEFT JOIN tabel_kategori_about_us 
     ON about_us.id_kategori = tabel_kategori_about_us.id_kategori
     WHERE id = $id"
);
$data = mysqli_fetch_assoc($query);

// Tentukan mode otomatis
$mode = "";
if (!empty($data['deskripsi']) && empty($data['gambar'])) {
    $mode = "deskripsi";
} elseif (!empty($data['gambar']) && empty($data['deskripsi'])) {
    $mode = "gambar";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Admin</title>
    <style>
    body {
    margin: 0;
    font-family: "Poppins", sans-serif;
    background: #F6F7FB;
    display: flex;
}
/* Sidebar */
.sidebar {
    width: 250px;
    background: #0F172A;
    height: 100vh;
    color: #ffffff;
    padding-top: 28px;
    position: fixed;
    display: flex;
    flex-direction: column;
    border-right: 3px solid rgba(0, 255, 255, 0.25);
}
.sidebar h2 {
    text-align: center;
    margin: 0 0 38px;
    font-size: 22px;
    font-weight: 700;
    letter-spacing: 1px;
    color: #ffffff;
}
.menu a {
    display: block;
    padding: 14px 24px;
    color: #e1e1e1;
    text-decoration: none;
    font-size: 15px;
    font-weight: 500;
    transition: 0.3s;
    border-left: 4px solid transparent;
}
.menu a:hover {
    background: rgba(0, 255, 255, 0.12);
    color: #00FFFF;
    border-left: 4px solid #00FFFF;
}

/* Content */
.content {
    margin-left: 250px;
    padding: 35px 32px;
    width: calc(100% - 250px);
}

/* Cards */
.card {
    background: #ffffff;
    padding: 26px;
    border-radius: 14px;
    border: 1px solid rgba(0,0,0,0.06);
    box-shadow: 0 6px 16px rgba(0,0,0,0.08);
    margin-bottom: 28px;
    transition: 0.25s;
}
.card:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 22px rgba(0,0,0,0.12);
}
.card h3 {
    margin: 0 0 14px;
    font-size: 20px;
    font-weight: 700;
    color: #0F172A;
}

/* Table */
table {
    width: 100%;
    border-collapse: collapse;
    font-size: 14px;
}
th, td {
    border: none;
    padding: 14px 12px;
    text-align: left;
}
th {
    background: #0F172A;
    color: #ffffff;
    font-weight: 700;
    font-size: 15px;
}
tr:nth-child(even) {
    background: #F2FDFD;
}
tr:hover td {
    background: rgba(0, 255, 255, 0.15);
    cursor: pointer;
}
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <?php
        include "nav_admin.php";
        ?>
    </div>

    <div class="content">
        <!-- Overview Section -->
        <div id="overview" class="card">
            <h3>Dashboard Overview</h3>
            <p>Selamat datang di dashboard admin. Gunakan menu di samping untuk mengelola konten website.</p>
        </div>

        <!-- Contact Messages Section -->
        <div id="messages" class="card">
    <h3>Edit About Us</h3>
    
<div class="card">
    
    <p>ID: <?= $data['id'] ?></p>

    <form action="proses/aboutus_update.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">

        <!-- Pilih Mode Konten -->
        <label>Pilih Jenis Konten</label>
        <select id="modeInput" name="mode" required
                style="padding:10px; width:100%; border-radius:8px; margin-bottom:15px;">
            <option value="deskripsi" <?= ($mode == "deskripsi" ? "selected" : "") ?>>Hanya Deskripsi</option>
            <option value="gambar" <?= ($mode == "gambar" ? "selected" : "") ?>>Hanya Gambar</option>
        </select>

        <!-- Pilih kategori -->
        <label>Kategori</label>
        <select name="id_kategori" required
                style="padding:10px; width:100%; border-radius:8px; margin-bottom:15px;">
            <?php
            $kat = mysqli_query($conn, "SELECT * FROM tabel_kategori_about_us");
            while ($k = mysqli_fetch_assoc($kat)) {
                $selected = ($k['id_kategori'] == $data['id_kategori']) ? "selected" : "";
                echo "<option value='{$k['id_kategori']}' $selected>{$k['kategori']}</option>";
            }
            ?>
        </select>

        <!-- Judul -->
        <label>Judul</label>
        <input type="text" name="judul" required value="<?= $data['judul'] ?>"
               style="padding:10px; width:100%; border-radius:8px; margin-bottom:15px;">

        <!-- Judul Panjang -->
        <label>Judul Panjang</label>
        <input type="text" name="judul_panjang" value="<?= $data['judul_panjang'] ?>"
               style="padding:10px; width:100%; border-radius:8px; margin-bottom:15px;">

        <!-- Input Deskripsi -->
        <div id="inputDeskripsi">
            <label>Deskripsi</label>
            <textarea name="deskripsi" rows="6"
                      style="padding:10px; width:100%; border-radius:8px; margin-bottom:15px;"><?= $data['deskripsi'] ?></textarea>
        </div>

        <!-- Input Gambar -->
        <div id="inputGambar">
            <label>Gambar</label><br>

            <?php if (!empty($data['gambar'])) { ?>
                <img src="../assets/<?= $data['gambar'] ?>" width="150" 
                     style="border-radius:10px; border:1px solid #ccc; margin-bottom:10px;"><br>
            <?php } ?>

            <input type="file" name="gambar"
               style="padding:10px; width:100%; border-radius:8px; margin-bottom:15px;">
        </div>

        <button type="submit"
                style="background:#0F172A; color:white; padding:10px 18px; 
                border:none; border-radius:8px; font-size:15px; cursor:pointer;">
            Simpan Perubahan
        </button>
    </form>

    <br>
    <a href="aboutus_admin.php" 
       style="text-decoration:none; color:#0F172A;">← Kembali</a>
</div>

</div>


    </div>
    <script>
// Jalankan saat halaman load
document.addEventListener("DOMContentLoaded", function () {
    modeController("<?= $mode ?>");
});

// Jalankan saat memilih mode
document.getElementById("modeInput").addEventListener("change", function () {
    modeController(this.value);
});

// Fungsi Show/Hide field
function modeController(mode) {
    let deskripsi = document.getElementById("inputDeskripsi");
    let gambar = document.getElementById("inputGambar");

    deskripsi.style.display = "none";
    gambar.style.display = "none";

    if (mode === "deskripsi") {
        deskripsi.style.display = "block";
    } else if (mode === "gambar") {
        gambar.style.display = "block";
    }
}
</script>
</body>
</html>
