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
            border: 1px solid rgba(0, 0, 0, 0.06);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.08);
            margin-bottom: 28px;
            transition: 0.25s;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 22px rgba(0, 0, 0, 0.12);
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

        th,
        td {
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