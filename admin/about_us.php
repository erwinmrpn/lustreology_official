<?php
include "proses/session.php";
include "proses/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About Us - Admin Panel</title>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root{
            --deep: #050C9C;      /* primary dark */
            --primary: #3572EF;   /* primary */
            --accent: #3ABEF9;    /* accent */
            --soft: #A7E6FF;      /* soft highlight */
            --bg: #F6F7FB;
            --card-bg: rgba(255,255,255,0.86);
            --glass-border: rgba(255,255,255,0.08);
            --muted: #6b7280;
            --glass-shadow: 0 8px 30px rgba(5,12,156,0.06);
        }

        /* Reset */
        *{box-sizing:border-box}
        html,body{height:100%}
        body {
            margin: 0;
            font-family: "Poppins", sans-serif;
            background: linear-gradient(180deg, rgba(53,114,239,0.06) 0%, rgba(58,190,249,0.03) 50%, rgba(167,230,255,0.02) 100%), var(--bg);
            color: #0b132b;
            display: flex;
            -webkit-font-smoothing:antialiased;
            -moz-osx-font-smoothing:grayscale;
            min-height:100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, var(--deep), #0c1a6a 140%);
            height: 100vh;
            color: #ffffff;
            padding: 28px 20px;
            position: fixed;
            display: flex;
            flex-direction: column;
            gap:18px;
            border-right: 1px solid rgba(255,255,255,0.04);
            box-shadow: 8px 0 30px rgba(5,12,156,0.06);
            z-index: 80;
        }

        .brand {
            display:flex;
            align-items:center;
            gap:12px;
        }

        .brand .logo {
            width:46px;
            height:46px;
            border-radius:10px;
            display:flex;
            align-items:center;
            justify-content:center;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            box-shadow: 0 6px 18px rgba(53,114,239,0.22), inset 0 -6px 18px rgba(58,190,249,0.12);
            font-weight:700;
            color:white;
            font-size:16px;
            letter-spacing:0.6px;
        }

        .brand h2 {
            margin: 0;
            font-size:18px;
            font-weight:700;
            letter-spacing:0.2px;
            color: #fff;
            line-height:1;
        }

        .brand p {
            margin:0;
            font-size:12px;
            color: rgba(255,255,255,0.8);
            font-weight:500;
            opacity:0.95;
        }

        .nav-wrap {
            margin-top:6px;
            padding-top:6px;
            border-top:1px solid rgba(255,255,255,0.04);
        }

        /* Ensure nav_admin links align and have no underline */
        .menu a {
            display: flex;
            align-items:center;
            gap:12px;
            padding: 12px 14px;
            color: rgba(255,255,255,0.92);
            text-decoration: none;
            font-size: 14px;
            font-weight:600;
            transition: all .22s cubic-bezier(.2,.9,.2,1);
            border-radius:8px;
            margin:6px 0;
        }

        .sidebar a {
            color: rgba(255,255,255,0.92);
            text-decoration: none;
        }

        .menu a .dot {
            width:10px;
            height:10px;
            border-radius:50%;
            background: linear-gradient(180deg,var(--soft),var(--accent));
            box-shadow: 0 4px 10px rgba(58,190,249,0.24);
        }

        .menu a:hover {
            transform: translateX(6px);
            background: linear-gradient(90deg, rgba(255,255,255,0.04), rgba(255,255,255,0.02));
            color: #fff;
            box-shadow: 0 6px 18px rgba(5,12,156,0.06);
        }

        .menu a.active{
            background: linear-gradient(90deg, rgba(53,114,239,0.14), rgba(58,190,249,0.08));
            color: #fff;
            border-left: 4px solid var(--accent);
            transform:none;
        }

        /* Content */
        .content {
            margin-left: 280px;
            padding: 36px;
            width: calc(100% - 280px);
            min-height:100vh;
        }

        /* Card style */
        .card {
            background: var(--card-bg);
            padding: 20px;
            border-radius: 14px;
            border: 1px solid var(--glass-border);
            box-shadow: var(--glass-shadow);
            margin-bottom: 18px;
            transition: transform .22s ease, box-shadow .22s ease;
            backdrop-filter: blur(8px) saturate(120%);
        }

        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 18px 40px rgba(5,12,156,0.12);
        }

        h1, h2, h3 { color: var(--deep); margin:0 0 10px 0; }
        p.lead { color:var(--muted); margin:0 0 6px 0; font-weight:500; }

        /* Form inputs - matching dashboard visual */
        input[type="text"], input[type="file"], select, textarea {
            width:100%;
            padding:12px 14px;
            border-radius:10px;
            border:1px solid rgba(5,12,156,0.08);
            background: linear-gradient(180deg, rgba(255,255,255,0.96), rgba(255,255,255,0.9));
            font-size:14px;
            color: #0b132b;
            outline:none;
            transition: box-shadow .18s ease, border-color .18s ease;
        }

        input[type="text"]:focus, select:focus, textarea:focus {
            box-shadow: 0 6px 20px rgba(53,114,239,0.08);
            border-color: var(--primary);
        }

        label {
            display:block;
            margin-bottom:8px;
            font-weight:600;
            color:var(--deep);
            font-size:14px;
        }

        /* Buttons */
        .btn {
            display:inline-flex;
            align-items:center;
            gap:8px;
            padding:10px 16px;
            border-radius:10px;
            border:0;
            cursor:pointer;
            font-weight:700;
            font-size:14px;
            transition: transform .14s ease, box-shadow .14s ease;
        }

        .btn-primary {
            background: linear-gradient(90deg,var(--primary),var(--accent));
            color: #fff;
            box-shadow: 0 8px 20px rgba(53,114,239,0.12);
        }

        .btn-primary:hover { transform: translateY(-3px); }

        .btn-danger {
            background: linear-gradient(90deg,#ef4444,#dc2626);
            color:#fff;
        }

        /* Table styling */
        table {
            width:100%;
            border-collapse: collapse;
            font-size:14px;
            margin-top:8px;
        }

        thead th {
            text-align:left;
            padding:14px 16px;
            font-weight:700;
            font-size:13px;
            background: linear-gradient(90deg, var(--deep), var(--primary));
            color:#fff;
            letter-spacing:0.2px;
            border-top-left-radius:8px;
            border-top-right-radius:8px;
        }

        tbody td {
            padding:12px 14px;
            border-bottom: 1px solid rgba(5,12,156,0.04);
            color:#0b132b;
            vertical-align:middle;
        }

        tbody tr:nth-child(even) td {
            background: linear-gradient(90deg, rgba(167,230,255,0.03), rgba(58,190,249,0.015));
        }

        tbody tr:hover td {
            background: linear-gradient(90deg, rgba(58,190,249,0.08), rgba(53,114,239,0.03));
        }

        .msg-preview {
            max-width:420px;
            white-space:nowrap;
            overflow:hidden;
            text-overflow:ellipsis;
            color:var(--muted);
            font-weight:500;
        }

        /* Actions cell */
        .td-aksi {
            display:flex;
            gap:8px;
            align-items:center;
            justify-content:center;
        }

        .td-aksi a {
            text-decoration:none;
            padding:8px 12px;
            border-radius:8px;
            font-weight:600;
            color:#fff;
            display:inline-block;
        }

        .td-aksi a.edit {
            background: linear-gradient(90deg,var(--primary),var(--accent));
            box-shadow: 0 8px 20px rgba(53,114,239,0.08);
        }

        .td-aksi a.del {
            background: linear-gradient(90deg,#ef4444,#dc2626);
        }

        /* Small helpers */
        .muted { color:var(--muted); font-weight:600; font-size:13px; }

        /* Responsive */
        @media (max-width: 980px) {
            .sidebar { width: 68px; padding:18px 10px; }
            .brand h2, .brand p { display:none; }
            .content { margin-left:68px; padding:18px; width:calc(100% - 68px); }
            .menu a { justify-content:center; padding:10px; }
            .menu a .text { display:none; }
            table { min-width:720px; }
        }

        @media (max-width:580px) {
            .grid { grid-template-columns: 1fr; }
            table { min-width:600px; font-size:13px; }
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="brand">
            <div class="logo">AP</div>
            <div>
                <h2>Admin Panel</h2>
                <p>Dashboard & Management</p>
            </div>
        </div>

        <div class="nav-wrap">
            <?php
            include "nav_admin.php";
            ?>
        </div>
    </div>

    <div class="content">
        <div class="card">
            <h3>About Us Overview</h3>
            <p class="lead">Selamat datang di About Us admin. Gunakan menu di samping untuk mengelola konten website.</p>
        </div>

        <div class="card" style="padding:18px;">
            <h3 style="margin-bottom:12px;">Kelola Kategori About Us</h3>

            <!-- FORM TAMBAH KATEGORI -->
            <form action="proses/kategori_tambah.php" method="POST" style="margin-bottom:18px;">
                <label>Tambah Kategori Baru</label>
                <input type="text" name="kategori" required placeholder="Contoh: Sejarah SIEGA, Akreditasi, Visi Misi...">
                <div style="margin-top:12px;">
                    <button type="submit" class="btn btn-primary">Tambah Kategori</button>
                </div>
            </form>

            <!-- TABEL KATEGORI -->
            <div style="overflow:auto;">
                <table>
                    <thead>
                        <tr>
                            <th style="width:8%;">ID</th>
                            <th>Nama Kategori</th>
                            <th style="width:22%;">Waktu Dibuat</th>
                            <th style="width:18%;">Aksi</th>
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
                                    <div class="td-aksi">
                                        <a href="proses/kategori_hapus.php?id=<?= $k['id_kategori'] ?>"
                                           onclick="return confirm('Yakin ingin menghapus kategori ini? \nSemua data About Us yang memakai kategori ini akan hilang!')"
                                           class="del">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card" style="padding:18px;">
            <h3>Tambah About Us</h3>

            <form action="proses/aboutus_tambah.php" method="POST" enctype="multipart/form-data" style="margin-top:12px;">
                <label>Pilih Jenis Konten</label>
                <select id="modeInput" name="mode" required>
                    <option value="">-- Pilih Mode --</option>
                    <option value="deskripsi">Deskripsi Saja</option>
                    <option value="gambar">Dengan Gambar</option>
                </select>

                <label style="margin-top:12px;">Kategori</label>
                <select name="id_kategori" required>
                    <option value="">-- Pilih Kategori --</option>
                    <?php
                    $kat = mysqli_query($conn, "SELECT * FROM tabel_kategori_about_us");
                    while ($k = mysqli_fetch_assoc($kat)) {
                        echo "<option value='{$k['id_kategori']}'>{$k['kategori']}</option>";
                    }
                    ?>
                </select>

                <label style="margin-top:12px;">Judul</label>
                <input type="text" name="judul" required>

                <label style="margin-top:12px;">Sub Judul</label>
                <input type="text" name="judul_panjang">

                <div id="inputDeskripsi" style="display:none; margin-top:12px;">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" rows="6"></textarea>
                </div>

                <div id="inputGambar" style="display:none; margin-top:12px;">
                    <label>Gambar</label>
                    <input type="file" name="gambar">
                </div>

                <div style="margin-top:14px;">
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </div>
            </form>
        </div>

        <div class="card" style="padding:16px;">
            <h3>Daftar About Us</h3>

            <!-- FILTER KATEGORI -->
<form method="GET" style="margin-bottom:16px; display:flex; gap:12px; align-items:center;">
    <label style="margin:0;">Filter Kategori:</label>
    
    <select name="filter_kategori" style="width:220px;">
        <option value="">Semua Kategori</option>

        <?php
        $katFilter = mysqli_query($conn, "SELECT * FROM tabel_kategori_about_us");
        while ($kf = mysqli_fetch_assoc($katFilter)) {
            $selected = (isset($_GET['filter_kategori']) && $_GET['filter_kategori'] == $kf['id_kategori']) ? "selected" : "";
            echo "<option value='{$kf['id_kategori']}' $selected>{$kf['kategori']}</option>";
        }
        ?>
    </select>

    <button type="submit" class="btn btn-primary">Terapkan</button>

    <?php if (isset($_GET['filter_kategori']) && $_GET['filter_kategori'] != "") { ?>
        <a href="about_us.php" class="btn btn-danger">Reset</a>
    <?php } ?>
</form>

            <div style="overflow:auto; margin-top:12px;">
                <table>
                    <thead>
                        <tr>
                            <th style="width:6%;">ID</th>
                            <th style="width:12%;">Kategori</th>
                            <th>Judul</th>
                            <th>Sub Judul</th>
                            <th>Deskripsi</th>
                            <th style="width:12%;">Gambar</th>
                            <th style="width:14%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT *
                          FROM about_us 
                          LEFT JOIN tabel_kategori_about_us 
                          ON about_us.id_kategori = tabel_kategori_about_us.id_kategori";

                        if (isset($_GET['filter_kategori']) && $_GET['filter_kategori'] != "") {
                            $filter = $_GET['filter_kategori'];
                            $query .= " WHERE about_us.id_kategori = '$filter'";
                        }

                        $query .= " ORDER BY about_us.id DESC";

                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['kategori'] ?></td>
                                <td><?= $row['judul'] ?></td>
                                <td><?= $row['judul_panjang'] ?></td>
                                <td style="max-width:300px; white-space:pre-wrap;"><?= $row['deskripsi'] ?></td>

                                <td>
                                    <?php if (!empty($row['gambar'])) { ?>
                                        <img src="../assets/<?= $row['gambar'] ?>" style="width:90px; border-radius:8px; border:1px solid rgba(5,12,156,0.06);">
                                    <?php } else { ?>
                                        <span class="muted">Tidak ada gambar</span>
                                    <?php } ?>
                                </td>

                                <td class="td-aksi">
                                    <a href="aboutus_edit.php?id=<?= $row['id'] ?>" class="edit">Edit</a>
                                    <a href="proses/aboutus_hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')" class="del">Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- JAVASCRIPT -->
    <script>
        document.getElementById("modeInput").addEventListener("change", function() {

            let mode = this.value;

            let deskripsi = document.getElementById("inputDeskripsi");
            let gambar = document.getElementById("inputGambar");

            // Reset semua dulu
            deskripsi.style.display = "none";
            gambar.style.display = "none";

            // Atur berdasarkan pilihan
            if (mode === "deskripsi") {
                deskripsi.style.display = "block";
            } else if (mode === "gambar") {
                gambar.style.display = "block";
            } else if (mode === "keduanya") {
                deskripsi.style.display = "block";
                gambar.style.display = "block";
            }
        });
    </script>

</body>

</html>
