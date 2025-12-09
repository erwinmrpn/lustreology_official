<?php
include "proses/session.php";
include "proses/koneksi.php";

$data1 = mysqli_query($conn,"SELECT * from user where id_user = '$_SESSION[admin_login]'");
$row1 = mysqli_fetch_array($data1);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Admin</title>

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

        /* Content */
        .content {
            margin-left: 280px;
            padding: 36px;
            width: calc(100% - 280px);
            min-height:100vh;
        }

        /* Top Row / header area */
        .topbar {
            display:flex;
            justify-content:space-between;
            align-items:center;
            gap:16px;
            margin-bottom:18px;
        }

        .search {
            flex:1;
            max-width:520px;
            display:flex;
            align-items:center;
            gap:10px;
            background: linear-gradient(180deg, rgba(255,255,255,0.7), rgba(255,255,255,0.65));
            border:1px solid rgba(5,12,156,0.06);
            padding:10px 12px;
            border-radius:12px;
            box-shadow: var(--glass-shadow);
        }

        .search input{
            border:0;
            outline:0;
            background:transparent;
            font-size:14px;
            flex:1;
            color: #0b132b;
            font-weight:500;
        }

        .profile {
            display:flex;
            align-items:center;
            gap:12px;
        }

        .avatar {
            width:44px;
            height:44px;
            border-radius:10px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            display:flex;
            align-items:center;
            justify-content:center;
            color:#fff;
            font-weight:700;
            box-shadow: 0 6px 18px rgba(53,114,239,0.14);
        }

        /* Grid: cards and tables */
        .grid {
            display:grid;
            grid-template-columns: repeat(12, 1fr);
            gap:18px;
            align-items:start;
        }

        .card {
            grid-column: span 12;
            background: var(--card-bg);
            padding: 20px;
            border-radius: 14px;
            border: 1px solid var(--glass-border);
            box-shadow: var(--glass-shadow);
            margin-bottom: 6px;
            transition: transform .22s ease, box-shadow .22s ease;
            backdrop-filter: blur(8px) saturate(120%);
            -webkit-backdrop-filter: blur(8px) saturate(120%);
        }

        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 18px 40px rgba(5,12,156,0.12);
        }

        .card-header {
            display:flex;
            justify-content:space-between;
            align-items:center;
            gap:12px;
            margin-bottom:12px;
        }

        .card h3 {
            margin: 0;
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

        /* Small stat pills */
        .stats {
            display:flex;
            gap:12px;
            margin-top:12px;
            flex-wrap:wrap;
        }

        .stat {
            background: linear-gradient(180deg, rgba(53,114,239,0.06), rgba(167,230,255,0.04));
            border-radius:12px;
            padding:12px 16px;
            display:flex;
            align-items:center;
            gap:12px;
            min-width:160px;
            border:1px solid rgba(53,114,239,0.06);
        }

        .stat .value {
            font-weight:700;
            font-size:16px;
            color: var(--deep);
        }

        .stat .label {
            font-size:12px;
            color:var(--muted);
            font-weight:600;
        }

        /* Table styling */
        .table-wrap {
            overflow:auto;
            border-radius:12px;
            margin-top:12px;
            border:1px solid rgba(5,12,156,0.04);
            background: linear-gradient(180deg, rgba(255,255,255,0.9), rgba(255,255,255,0.8));
        }

        table {
            width:100%;
            border-collapse: collapse;
            font-size:14px;
            min-width:880px;
        }

        thead th {
            position:sticky;
            top:0;
            z-index:2;
            text-align:left;
            padding:14px 16px;
            font-weight:700;
            font-size:13px;
            background: linear-gradient(90deg, var(--deep), var(--primary));
            color:#fff;
            letter-spacing:0.2px;
        }

        tbody td {
            padding:14px 16px;
            border-bottom: 1px solid rgba(5,12,156,0.04);
            color:#0b132b;
            vertical-align:middle;
        }

        tbody tr:nth-child(even) td {
            background: linear-gradient(90deg, rgba(167,230,255,0.03), rgba(58,190,249,0.015));
        }

        tbody tr:hover td {
            background: linear-gradient(90deg, rgba(58,190,249,0.08), rgba(53,114,239,0.03));
            cursor: default;
        }

        /* Message preview cell style */
        .msg-preview {
            max-width:360px;
            white-space:nowrap;
            overflow:hidden;
            text-overflow:ellipsis;
            color:var(--muted);
            font-weight:500;
        }

        /* Empty state */
        .empty {
            text-align:center;
            padding:28px;
            color:var(--muted);
            font-weight:600;
        }

        /* Responsive */
        @media (max-width: 980px) {
            .sidebar { width: 68px; padding:18px 10px; }
            .sidebar h2, .brand p { display:none; }
            .brand .logo { width:44px; height:44px; border-radius:10px; }
            .content { margin-left:68px; padding:18px; width:calc(100% - 68px); }
            .menu a { justify-content:center; padding:10px; }
            .menu a .text { display:none; }
            .grid { gap:12px; }
            table { min-width:720px; }
        }

        @media (max-width:580px) {
            .search { display:none; }
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
        <div class="topbar">
            <div class="search" role="search" aria-label="Search dashboard">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M21 21l-4.35-4.35" stroke="rgba(11,19,43,0.6)" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                    <circle cx="11" cy="11" r="5" stroke="rgba(11,19,43,0.6)" stroke-width="1.6"/>
                </svg>
                <input type="text" placeholder="Cari pesan, pengguna, atau menu..." />
            </div>

            
            <div class="profile">
                <div style="text-align:right;">
                    <div style="font-weight:700">Halo, <?php echo $row1['username'];?></div>
                    <div style="font-size:12px;color:var(--muted);margin-top:2px">Selamat datang kembali</div>
                </div>
                <div class="avatar">A</div>
            </div>
        </div>

        <div class="grid">
            <!-- Overview Section -->
            <div id="overview" class="card" style="grid-column: span 12;">
                <div class="card-header">
                    <div>
                        <h3>Dashboard Overview</h3>
                        <p class="lead">Selamat datang di dashboard admin. Gunakan menu di samping untuk mengelola konten website.</p>
                    </div>
                </div>
            </div>

            <!-- Contact Messages Section -->
            <div id="messages" class="card" style="grid-column: span 12;">
                <div class="card-header">
                    <h3>Pesan Masuk dari Contact Us</h3>
                    <div style="font-size:13px;color:var(--muted);font-weight:600">Terbaru terlebih dahulu</div>
                </div>

                <div class="table-wrap" role="region" aria-label="Tabel pesan masuk">
                    <table>
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No. HP</th>
                                <th>Pesan</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        include "proses/koneksi.php";

                        $result = mysqli_query($conn, "SELECT * FROM contact_messages ORDER BY id DESC");

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                // sanitize basic output to avoid layout break (keep logic unchanged)
                                $fullname = htmlspecialchars($row['fullname']);
                                $email = htmlspecialchars($row['email']);
                                $phone = htmlspecialchars($row['phone']);
                                $message = htmlspecialchars($row['message']);
                                $created_at = htmlspecialchars($row['created_at']);

                                echo "
                        <tr>
                            <td>{$fullname}</td>
                            <td>{$email}</td>
                            <td>{$phone}</td>
                            <td><div class='msg-preview'>{$message}</div></td>
                            <td>{$created_at}</td>
                        </tr>
                        ";
                            }
                        } else {
                            echo "
                <tr>
                    <td colspan='5'><div class='empty'>Belum ada pesan masuk.</div></td>
                </tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
