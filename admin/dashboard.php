<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Admin</title>
    <style>
        body {
        margin: 0;
        font-family: "Poppins", Arial, sans-serif;
        background: #ffffff;
        display: flex;
    }
        /* Sidebar */
        .sidebar {
        width: 240px;
        background: #0A0F18;
        height: 100vh;
        color: #000;
        padding-top: 25px;
        position: fixed;
        border-right: 3px solid rgba(0,0,0,0.08);
    }
        .sidebar h2 {
        text-align: center;
        margin: 0 0 35px;
        font-size: 22px;
        font-weight: 700;
    }
        .menu a {
        display: block;
        padding: 14px 22px;
        color: #004b4b;
        text-decoration: none;
        font-size: 15px;
        font-weight: 600;
        transition: 0.3s;
    }
        .menu a:hover {
        background: rgba(0, 0, 0, 0.12);
        color: #000;
    }

        /* Content */
        .content {
        margin-left: 240px;
        padding: 30px 28px;
        width: calc(100% - 240px);
        background: #ffffff;
    }

        /* Cards */
        .card {
        background: #ffffff;
        padding: 24px;
        border-radius: 12px;
        border: 1.5px solid rgba(0, 0, 0, 0.10);
        box-shadow: 0 4px 14px rgba(0,0,0,0.06);
        margin-bottom: 25px;
        transition: 0.3s;
    }
        .card:hover {
        box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    }
        .card h3 {
        margin: 0 0 12px;
        color: #003d3d;
        font-size: 20px;
    }

        /* Table */
        table {
        width: 100%;
        border-collapse: collapse;
        font-size: 14px;
    }
        th, td {
        border: 1px solid #d7d7d7;
        padding: 12px 10px;
    }
        th {
        background: #0A0F18;
        color: #000;
        font-weight: 700;
    }
        tr:hover td {
        background: rgba(0, 255, 255, 0.08);
    }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <div class="menu">
            <a href="dashboard.php">Dashboard</a>
            <a href="blog.php">Kelola Blog</a>
            <a href="proses/logout.php">Logout</a>
        </div>
    </div>

    <div class="content">
        <!-- Overview Section -->
        <div id="overview" class="card">
            <h3>Dashboard Overview</h3>
            <p>Selamat datang di dashboard admin. Gunakan menu di samping untuk mengelola konten website.</p>
        </div>

        <!-- Contact Messages Section -->
        <div id="messages" class="card">
    <h3>Pesan Masuk dari Contact Us</h3>

    <table>
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>No. HP</th>
            <th>Pesan</th>
            <th>Tanggal</th>
        </tr>

        <?php
        include "proses/koneksi.php";

        $result = mysqli_query($conn, "SELECT * FROM contact_messages ORDER BY id DESC");

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "
                <tr>
                    <td>{$row['fullname']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['phone']}</td>
                    <td>{$row['message']}</td>
                    <td>{$row['created_at']}</td>
                </tr>
                ";
            }
        } else {
            echo "
            <tr>
                <td colspan='5' style='text-align:center; padding:15px;'>Belum ada pesan masuk.</td>
            </tr>";
        }
        ?>
    </table>
</div>


    </div>
</body>
</html>
