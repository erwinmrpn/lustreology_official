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
        :root{
            --c-deep: #050C9C;
            --c-primary: #3572EF;
            --c-accent: #3ABEF9;
            --c-soft: #A7E6FF;
            --bg: linear-gradient(135deg, rgba(5,12,156,1) 0%, rgba(53,114,239,0.85) 100%);
            --glass: rgba(255,255,255,0.06);
            --radius: 14px;
        }

        *{box-sizing:border-box}
        html,body{height:100%}
        body {
            font-family: "Poppins", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
            background: var(--bg);
            display:flex;
            align-items:center;
            justify-content:center;
            margin:0;
            padding:24px;
        }

        .login-box {
            width:100%;
            max-width:460px;
            background: linear-gradient(180deg, rgba(255,255,255,0.98), rgba(245,249,255,0.95));
            padding: 36px;
            border-radius: var(--radius);
            box-shadow: 0 18px 50px rgba(5,12,156,0.24);
            border: 1px solid rgba(255,255,255,0.6);
            position: relative;
            overflow: hidden;
        }

        /* decorative corner gradient */
        .login-box::before{
            content:"";
            position:absolute;
            right:-120px; top:-80px;
            width:260px;height:260px;border-radius:50%;
            background: radial-gradient(circle at 30% 30%, var(--c-soft), transparent 40%), linear-gradient(135deg,var(--c-primary),var(--c-accent));
            opacity:0.18;
            transform: rotate(20deg);
        }

        .title {
            text-align: left;
            margin: 0 0 8px;
            font-size: 24px;
            font-weight: 800;
            color: var(--c-deep);
            display:flex;
            align-items:center;
            gap:10px;
        }

        .title .brand-dot{
            width:14px;height:14px;border-radius:4px;background:linear-gradient(90deg,var(--c-primary),var(--c-accent));
            box-shadow: 0 8px 20px rgba(53,114,239,0.12);
        }

        .subtitle {
            font-size:13px;color:#42516a;margin-bottom:20px;
        }

        .input-group {
            margin-bottom:16px;
        }

        .input-group label {
            display:block;
            font-size:13px;
            margin-bottom:8px;
            font-weight:600;
            color:#243145;
        }

        .input-group input {
            width:100%;
            padding:12px 14px;
            border-radius:10px;
            border:1px solid rgba(4,12,80,0.06);
            background: #fff;
            font-size:14px;
            transition: box-shadow .18s, border-color .18s;
        }

        .input-group input:focus{
            outline:none;
            border-color: var(--c-primary);
            box-shadow: 0 8px 30px rgba(53,114,239,0.08);
        }

        .btn-login {
            width:100%;
            padding:12px;
            background: linear-gradient(90deg,var(--c-primary),var(--c-accent));
            color:#fff;
            font-weight:800;
            border:none;
            border-radius:10px;
            font-size:16px;
            cursor:pointer;
            box-shadow: 0 12px 30px rgba(53,114,239,0.14);
            transition: transform .18s, box-shadow .18s;
        }

        .btn-login:hover{
            transform: translateY(-3px);
            box-shadow: 0 18px 44px rgba(53,114,239,0.2);
        }

        .footer-text{
            text-align:center;
            font-size:13px;
            margin-top:18px;
            color:#6b7280;
        }

        @media (max-width:520px){
            .login-box{padding:22px}
            .title{font-size:20px}
        }
    </style>
</head>

<body>
    <div class="login-box">
        <h2 class="title"><span class="brand-dot"></span> SIEGA <span style="font-weight:600;color:var(--c-primary);margin-left:6px">Admin</span></h2>
        <div class="subtitle">Masuk untuk mengelola konten dan aktivitas website.</div>

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
            © 2025 SIEGA - Fakultas Ilmu Komputer
        </div>
    </div>
</body>

</html>
