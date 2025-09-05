<?php
session_start();
if (!isset($_SESSION['otp_verified']) || $_SESSION['otp_verified'] !== true) {
    header("Location: formlogin.html");
    exit;
}
$email = $_SESSION['email'] ?? '';
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đăng Nhập Movie Vip</title>
    <link rel="stylesheet" href="styles.css" />
</head>

<body>
    </div>

    <div class="container">
        <div class="registration-box">
            <h2>
                Đăng nhập Movie VipVip để<br />tận hưởng kho Phim,
                Show, Thể thao,<br />Truyền hình cáp trực tuyến
            </h2>
            <p>Email của bạn: <strong><?= htmlspecialchars($email) ?></strong></p>
            <p>Vui lòng nhập mật khẩu để đăng nhập</p>

            <!-- FORM ĐĂNG NHẬP -->
            <form action="register_new.php" method="post">
                <div class="phone-input-container">
                    <input type="password" placeholder="Mật khẩu" class="input-field" name="password" required />
                </div>
                <button type="submit" class="continue-btn">Đăng nhập</button>
            </form>

            <div class="social-login">
                <!-- <button class="fb-btn">Đăng nhập bằng Facebook</button> -->
                <!-- <button class="gg-btn">Đăng nhập bằng Google</button> -->
            </div>

            <div class="qr-code">
                <img src="/hình test/Ảnh chụp màn hình 2025-05-22 085050.png" alt="QR Code" />
                <p>Quét mã QR bằng camera trên điện thoại để đăng nhập</p>
                <p>Mã sẽ hết hạn sau 04:58</p>
            </div>
            <p class="terms">Hỗ trợ đăng nhập bằng Chứng thực</p>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>