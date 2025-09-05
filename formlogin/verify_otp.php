<?php
session_start();

$email = $_SESSION['email'] ?? '';

if (empty($email)) {
    header("Location: formlogin.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Xác minh OTP - Movie Vip</title>
    <style>
    body {
        margin: 0;
        padding: 0;
        background: linear-gradient(135deg, #000, #8b0000);
        font-family: 'Segoe UI', sans-serif;
        color: #fff;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .otp-box {
        background: rgba(0, 0, 0, 0.7);
        padding: 40px;
        border-radius: 10px;
        text-align: center;
        max-width: 400px;
    }

    .otp-box h2 {
        margin-bottom: 20px;
    }

    .otp-box input {
        padding: 10px;
        width: 80%;
        font-size: 18px;
        border-radius: 5px;
        border: none;
        margin-bottom: 20px;
    }

    .otp-box button {
        padding: 12px 30px;
        background: #ff0000;
        color: #fff;
        border: none;
        border-radius: 25px;
        font-weight: bold;
        font-size: 16px;
        cursor: pointer;
        transition: all 0.3s;
    }

    .otp-box button:hover {
        background: #ff4d4d;
    }

    body {
        background-image: url('https://www.slashfilm.com/img/gallery/squid-game-season-3-episode-5-debunks-a-major-vip-theory/l-intro-1751031238.jpg');
        background-size: cover;
        background-position: center;

    }
    </style>
</head>

<body>
    <div class="otp-box">
        <h2>Xác minh OTP</h2>
        <p>Email: <strong><?= htmlspecialchars($email) ?></strong></p>
        <form action="verify_otp_process.php" method="post">
            <input type="text" name="otp_input" placeholder="Nhập mã OTP" required>
            <br>
            <button type="submit">Xác minh</button>
        </form>
    </div>
</body>

</html>