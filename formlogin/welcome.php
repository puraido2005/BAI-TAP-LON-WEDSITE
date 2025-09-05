<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || empty($_SESSION['email'])) {
    header("Location: formlogin.html");
    exit;
}

$email = $_SESSION['email'];
$user_id = $_SESSION['user_id'] ?? 0;

// Xác định avatar
$avatar = file_exists("uploads/avatar_$user_id.jpg")
    ? "uploads/avatar_$user_id.jpg"
    : "uploads/default_avatar.jpg";
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movie Vip - Trang chính</title>
    <style>
    body {
        margin: 0;
        padding: 0;
        background: linear-gradient(135deg, #000, #8b0000);
        font-family: 'Segoe UI', sans-serif;
        color: #fff;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    .header {
        background: rgba(0, 0, 0, 0.6);
        color: #fff;
        padding: 15px 30px;
        display: flex;
        align-items: center;
        justify-content: flex-start;
    }

    .header img {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        margin-right: 15px;
        object-fit: cover;
        border: 2px solid #fff;
    }

    .header .email {
        font-size: 18px;
        font-weight: bold;
    }

    .container {
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 40px;
    }

    .container h1 {
        font-size: 36px;
        margin-bottom: 20px;
        color: #ff4d4d;
    }

    .container p {
        font-size: 20px;
        margin-bottom: 30px;
    }

    .btn-logout {
        background: #ff0000;
        color: #fff;
        text-decoration: none;
        padding: 12px 30px;
        border-radius: 25px;
        font-weight: bold;
        transition: 0.3s;
        display: inline-block;
    }

    .btn-logout:hover {
        background: #ff4d4d;
        transform: translateY(-2px);
    }
    </style>
</head>

<body>
    <div class="header">
        <img src="<?= htmlspecialchars($avatar) ?>" alt="Avatar">
        <div class="email"><?= htmlspecialchars($email) ?></div>
    </div>

    <div class="container">
        <h1>Chào mừng bạn đến Movie Vip!</h1>
        <p>Chúc bạn xem phim vui vẻ và tận hưởng kho phim không giới hạn.</p>
        <a href="logout.php" class="btn-logout">Đăng xuất</a>
    </div>
</body>

</html>