<?php
include "proses/session.php";
include "proses/koneksi.php";
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
            <h3>About Us Overview</h3>
            <p>Selamat datang di About Us admin. Gunakan menu di samping untuk mengelola konten website.</p>
        </div>

        <!-- Contact Messages Section -->
       <h3>Kelola Kategori About Us</h3>

<!-- FORM TAMBAH KATEGORI -->
<form action="proses/kategori_tambah.php" method="POST" 
    style="margin-bottom:25px; background:#F8FAFC; padding:20px; border-radius:10px; border:1px solid #ddd;">

    <label>Tambah Kategori Baru</label>
    <input type="text" name="kategori" required
           placeholder="Contoh: Sejarah SIEGA, Akreditasi, Visi Misi..."
           style="padding:10px; width:100%; border-radius:8px; margin:10px 0; border:1px solid #ccc;">

    <button type="submit"
            style="background:#0F172A; color:white; padding:10px 18px; border:none; border-radius:8px; cursor:pointer;">
        Tambah Kategori
    </button>
</form>


<!-- TABEL KATEGORI -->
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Kategori</th>
            <th>Waktu Dibuat</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $kategori = mysqli_query($conn, "SELECT * FROM tabel_kategori_about_us ORDER BY id_kategori DESC");
        while ($k = mysqli_fetch_assoc($kategori)) {
        ?>
        <tr>
            <td><?= $k['id_kategori'] ?></td>
            <td><?= $k['kategori'] ?></td>
            <td><?= $k['time_stamp'] ?></td>
            <td>
                <a href="proses/kategori_hapus.php?id=<?= $k['id_kategori'] ?>"
                   onclick="return confirm('Yakin ingin menghapus kategori ini? \nSemua data About Us yang memakai kategori ini akan hilang!')"
                   style="padding:6px 12px; background:#DC2626; color:white; text-decoration:none; border-radius:6px;">
                    Hapus
                </a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<br><hr><br>


<!-- TABEL ABOUT US -->





<!-- FORM TAMBAH ABOUT US -->
<h3>Tambah About Us</h3>
<!-- PILIH MODE INPUT -->


<!-- FORM TAMBAH ABOUT US -->
<form action="proses/aboutus_tambah.php" method="POST" enctype="multipart/form-data">

<label>Pilih Jenis Konten</label>
<select id="modeInput" name="mode" 
        style="padding:10px; width:100%; border-radius:8px; margin-bottom:15px;" required>
    <option value="">-- Pilih Mode --</option>
    <option value="deskripsi">Hanya Deskripsi</option>
    <option value="gambar">Hanya Gambar</option>
    <!-- <option value="keduanya">Deskripsi + Gambar</option> -->
</select>
    <!-- Pilih kategori -->
    <label>Kategori</label>
    <select name="id_kategori" required 
        style="padding:10px; width:100%; border-radius:8px; margin-bottom:15px;">
        <option value="">-- Pilih Kategori --</option>

        <?php
        $kat = mysqli_query($conn, "SELECT * FROM tabel_kategori_about_us");
        while ($k = mysqli_fetch_assoc($kat)) {
            echo "<option value='{$k['id_kategori']}'>{$k['kategori']}</option>";
        }
        ?>
    </select>

    <!-- Judul -->
    <label>Judul</label>
    <input type="text" name="judul" required
           style="padding:10px; width:100%; border-radius:8px; margin-bottom:15px;">

    <!-- Judul Panjang -->
    <label>Judul Panjang</label>
    <input type="text" name="judul_panjang"
           style="padding:10px; width:100%; border-radius:8px; margin-bottom:15px;">

    <!-- Deskripsi -->
    <div id="inputDeskripsi" style="display:none;">
        <label>Deskripsi</label>
        <textarea name="deskripsi" rows="6"
                  style="padding:10px; width:100%; border-radius:8px; margin-bottom:15px;"></textarea>
    </div>

    <!-- Gambar -->
    <div id="inputGambar" style="display:none;">
        <label>Gambar</label>
        <input type="file" name="gambar"
               style="padding:10px; width:100%; border-radius:8px; margin-bottom:15px;">
    </div>

    <button type="submit"
            style="background:#0F172A; color:white; padding:10px 18px; 
            border:none; border-radius:8px; font-size:15px; cursor:pointer;">
        Tambahkan
    </button>
</form>


<br><hr><br>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Kategori</th>
            <th>Judul</th>
            <th>Judul Panjang</th>
            <th>Deskripsi</th>
            <th>Gambar</th> <!-- Kolom baru -->
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT *
                  FROM about_us 
                  LEFT JOIN tabel_kategori_about_us 
                  ON about_us.id_kategori = tabel_kategori_about_us.id_kategori";

        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['kategori'] ?></td>
            <td><?= $row['judul'] ?></td>
            <td><?= $row['judul_panjang'] ?></td>
            <td style="max-width:300px; white-space:pre-wrap;"><?= $row['deskripsi'] ?></td>

            <!-- TAMPILAN GAMBAR -->
            <td>
                <?php if (!empty($row['gambar'])) { ?>
                    <img src="../assets/<?= $row['gambar'] ?>" 
                         style="width:90px; border-radius:8px; border:1px solid #ccc;">
                <?php } else { ?>
                    <span style="color:#888;">Tidak ada gambar</span>
                <?php } ?>
            </td>

            <td>
                <a href="aboutus_edit.php?id=<?= $row['id'] ?>" 
                   style="padding:6px 12px; background:#0F172A; color:white; border-radius:6px; text-decoration:none;">
                    Edit
                </a>
                <a href="proses/aboutus_hapus.php?id=<?= $row['id'] ?>"
                   onclick="return confirm('Yakin ingin menghapus?')"
                   style="padding:6px 12px; background:#DC2626; color:white; border-radius:6px; text-decoration:none; margin-left:5px;">
                    Hapus
                </a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>




    </div>
    
<!-- JAVASCRIPT -->
<script>
document.getElementById("modeInput").addEventListener("change", function () {

    let mode = this.value;

    let deskripsi = document.getElementById("inputDeskripsi");
    let gambar = document.getElementById("inputGambar");

    // Reset semua dulu
    deskripsi.style.display = "none";
    gambar.style.display = "none";

    // Atur berdasarkan pilihan
    if (mode === "deskripsi") {
        deskripsi.style.display = "block";
    } 
    else if (mode === "gambar") {
        gambar.style.display = "block";
    } 
    else if (mode === "keduanya") {
        deskripsi.style.display = "block";
        gambar.style.display = "block";
    }
});
</script>

</body>

</html>
