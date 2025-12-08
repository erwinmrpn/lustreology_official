<?php
include "proses/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Admin | SIEGA</title>
    <style>
        :root {
            --primary: #00FFFF;
            --dark: #0A0F18;
        }

        body {
            font-family: "Poppins", sans-serif;
            background: linear-gradient(135deg, #0A0F18, #002831);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-box {
            width: 100%;
            max-width: 420px;
            background: #ffffff;
            padding: 40px 35px;
            border-radius: 14px;
            box-shadow: 0 7px 30px rgba(0, 0, 0, 0.35);
            animation: fadeIn .8s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .title {
            text-align: center;
            margin-bottom: 20px;
            font-size: 26px;
            font-weight: 700;
            color: var(--dark);
        }

        .title span {
            color: var(--primary);
        }

        .input-group {
            margin-bottom: 18px;
        }

        .input-group label {
            display: block;
            font-size: 14px;
            margin-bottom: 6px;
            font-weight: 600;
            color: #333;
        }

        .input-group input {
            width: 100%;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            transition: 0.3s;
        }

        .input-group input:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(0, 255, 255, 0.25);
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            background: var(--primary);
            color: #000;
            font-weight: 700;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-login:hover {
            background: #00dede;
            transform: translateY(-2px);
        }

        .footer-text {
            text-align: center;
            font-size: 13px;
            margin-top: 20px;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="login-box">
        <h2 class="title">SIEGA <span>Admin</span> Login</h2>

        <form action="proses/admin_proses_login.php" method="POST">
            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="Masukkan username" required />
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Masukkan password" required />
            </div>

            <button class="btn-login" type="submit">Login</button>
        </form>

        <div class="footer-text">
            © 2025 SIEGA — Fakultas Ilmu Komputer
        </div>
    </div>
</body>

</html>