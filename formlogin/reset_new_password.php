<?php
session_start();

// Chỉ được vào nếu đã verify OTP
if (!isset($_SESSION['reset_verified']) || $_SESSION['reset_verified'] !== true) {
    header("Location: forgot_password.php");
    exit;
}

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['password'] ?? '';
    $email = $_SESSION['reset_email'] ?? '';

    if (empty($password)) {
        $error = "Bạn chưa nhập mật khẩu mới.";
    } else {
        $hashed = password_hash($password, PASSWORD_DEFAULT);

        $conn = new mysqli("localhost", "root", "", "wedphim1");
        $conn->set_charset("utf8mb4");

        $stmt = $conn->prepare("UPDATE user SET password = ? WHERE email = ?");
        $stmt->bind_param("ss", $hashed, $email);
        $stmt->execute();

        // Xoá session reset
        unset($_SESSION['reset_verified']);
        unset($_SESSION['reset_email']);
        unset($_SESSION['reset_otp']);
        unset($_SESSION['reset_otp_time']);

        header("Location: login.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tạo mật khẩu mới - Movie Vip</title>
    <link rel="stylesheet" href="styles.css" />
</head>

<body>
    <div class="container">
        <div class="registration-box">
            <h2>
                Tạo mật khẩu mới<br />cho Movie Vip
            </h2>
            <p>Hãy đặt mật khẩu mới để bảo vệ tài khoản của bạn.</p>

            <?php if (!empty($error)) : ?>
            <p style="color: #ff4d4d; font-weight: bold;"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>

            <form method="post">
                <div class="phone-input-container">
                    <input type="password" name="password" placeholder="Mật khẩu mới" class="input-field" required />
                </div>
                <button type="submit" class="continue-btn">Cập nhật</button>
            </form>

            <div class="qr-code">
                <img src="/hình test/Ảnh chụp màn hình 2025-05-22 085050.png" alt="QR Code" />
                <p>Quét mã QR để truy cập Movie Vip nhanh chóng.</p>
            </div>
            <p class="terms">Movie Vip - Bảo mật tối ưu cho tài khoản của bạn.</p>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>