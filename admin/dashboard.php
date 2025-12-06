<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f5f7;
            display: flex;
        }
        /* Sidebar */
        .sidebar {
            width: 240px;
            background: #1e1e2d;
            height: 100vh;
            color: white;
            padding-top: 20px;
            position: fixed;
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 20px;
        }
        .menu a {
            display: block;
            padding: 12px 20px;
            color: #cfcfd9;
            text-decoration: none;
            font-size: 15px;
        }
        .menu a:hover {
            background: #34344a;
            color: #fff;
        }

        /* Content */
        .content {
            margin-left: 240px;
            padding: 20px;
            width: calc(100% - 240px);
        }
        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .card h3 {
            margin: 0 0 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background: #eee;
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
