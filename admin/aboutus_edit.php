<?php
include "proses/koneksi.php";
include "proses/session.php";

$id = $_GET['id'];

// Ambil data berdasarkan ID
$query = mysqli_query(
    $conn,
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
    <title>Edit About Us - Admin</title>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root{
            --deep: #050C9C;      /* primary dark */
            --primary: #3572EF;   /* primary */
            --accent: #3ABEF9;    /* accent */
            --soft: #A7E6FF;      /* soft highlight */
            --bg: #F6F7FB;
            --card-bg: rgba(255,255,255,0.85);
            --glass-border: rgba(255,255,255,0.08);
            --muted: #6b7280;
            --glass-shadow: 0 8px 30px rgba(5,12,156,0.08);
        }

        /* Reset & body */
        *{ box-sizing:border-box; }
        html,body{ height:100%; }
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

        /* SIDEBAR */
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

        /* CONTENT */
        .content {
            margin-left: 280px;
            padding: 36px;
            width: calc(100% - 280px);
            min-height:100vh;
        }

        /* Card */
        .card {
            grid-column: span 12;
            background: var(--card-bg);
            padding: 20px;
            border-radius: 14px;
            border: 1px solid var(--glass-border);
            box-shadow: var(--glass-shadow);
            margin-bottom: 16px;
            transition: transform .22s ease, box-shadow .22s ease;
            backdrop-filter: blur(8px) saturate(120%);
            -webkit-backdrop-filter: blur(8px) saturate(120%);
        }

        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 18px 40px rgba(5,12,156,0.12);
        }

        .card h3 {
            margin: 0 0 12px;
            font-size:18px;
            font-weight:700;
            color: var(--deep);
        }

        .card p.lead {
            margin:0;
            color:var(--muted);
            font-size:13px;
            font-weight:500;
        }

        label {
            display:block;
            margin:10px 0 6px;
            color:var(--deep);
            font-weight:600;
        }

        input[type="text"],
        select,
        textarea,
        input[type="file"] {
            padding:10px 12px;
            width:100%;
            border-radius:10px;
            border:1px solid rgba(5,12,156,0.06);
            background: linear-gradient(180deg, rgba(255,255,255,0.9), rgba(255,255,255,0.85));
            font-size:14px;
            outline:none;
        }

        textarea { min-height:120px; }

        .btn {
            margin-top:12px;
            padding:10px 18px;
            border-radius:10px;
            border:0;
            cursor:pointer;
            font-weight:700;
        }

        .btn-save {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color:white;
            box-shadow: 0 8px 20px rgba(53,114,239,0.12);
        }

        .btn-save:hover { transform: translateY(-2px); }

        .back-link {
            display:inline-block;
            margin-top:12px;
            text-decoration:none;
            color:var(--deep);
            font-weight:600;
        }

        img.preview {
            margin-top:8px;
            border-radius:12px;
            width:150px;
            border:1px solid rgba(5,12,156,0.06);
        }

        @media (max-width: 980px) {
            .sidebar { width: 68px; padding:18px 10px; }
            .sidebar h2, .brand p { display:none; }
            .brand .logo { width:44px; height:44px; border-radius:10px; }
            .content { margin-left:68px; padding:18px; width:calc(100% - 68px); }
            .menu a { justify-content:center; padding:10px; }
            .menu a .text { display:none; }
        }

        @media (max-width:580px) {
            .content { padding:16px; }
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
            <?php include "nav_admin.php"; ?>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="content">
        <div class="card">
            <h3>Edit About Us</h3>
            <p class="lead">Perbarui konten About Us berdasarkan kategori yang tersedia.</p>
        </div>

        <div class="card">
            <p><strong>ID:</strong> <?= $data['id'] ?></p>

            <form action="proses/aboutus_update.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $data['id'] ?>">

                <label>Pilih Jenis Konten</label>
                <select id="modeInput" name="mode" required>
                    <option value="deskripsi" <?= ($mode == "deskripsi" ? "selected" : "") ?>>Deskripsi Saja</option>
                    <option value="gambar" <?= ($mode == "gambar" ? "selected" : "") ?>>Dengan Gambar</option>
                </select>

                <label>Kategori</label>
                <select name="id_kategori" required>
                    <?php
                    $kat = mysqli_query($conn, "SELECT * FROM tabel_kategori_about_us");
                    while ($k = mysqli_fetch_assoc($kat)) {
                        $selected = ($k['id_kategori'] == $data['id_kategori']) ? "selected" : "";
                        echo "<option value='{$k['id_kategori']}' $selected>{$k['kategori']}</option>";
                    }
                    ?>
                </select>

                <label>Judul</label>
                <input type="text" name="judul" required value="<?= htmlspecialchars($data['judul']) ?>">

                <label>Sub Judul</label>
                <input type="text" name="judul_panjang" value="<?= htmlspecialchars($data['judul_panjang']) ?>">

                <div id="inputDeskripsi">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi"><?= htmlspecialchars($data['deskripsi']) ?></textarea>
                </div>

                <div id="inputGambar">
                    <label>Gambar</label>
                    <?php if (!empty($data['gambar'])) { ?>
                        <img src="../assets/<?= htmlspecialchars($data['gambar']) ?>" class="preview" alt="preview">
                    <?php } ?>
                    <input type="file" name="gambar">
                </div>

                <button type="submit" class="btn btn-save">Simpan Perubahan</button>
            </form>

            <a href="about_us.php" class="back-link">← Kembali</a>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            modeController("<?= $mode ?>");
        });

        document.getElementById("modeInput").addEventListener("change", function() {
            modeController(this.value);
        });

        function modeController(mode) {
            let deskripsi = document.getElementById("inputDeskripsi");
            let gambar = document.getElementById("inputGambar");
            if (!deskripsi || !gambar) return;

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