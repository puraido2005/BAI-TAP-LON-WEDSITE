<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$error = '';
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';

    $conn = new mysqli("localhost", "root", "", "wedphim1");
    $conn->set_charset("utf8mb4");

    $stmt = $conn->prepare("SELECT id FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $otp = random_int(100000, 999999);
        $_SESSION['reset_email'] = $email;
        $_SESSION['reset_otp'] = $otp;
        $_SESSION['reset_otp_time'] = time();

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'movievip.site@gmail.com';
            $mail->Password = 'ttfubzeaqxwydsrs';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            $mail->CharSet = "UTF-8";
            $mail->setFrom('movievip.site@gmail.com', 'Movie Vip');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Mã OTP - Movie Vip';
            $mail->Body = "
                <p>Mã OTP của bạn là: <strong>$otp</strong></p>
                <p>Mã có hiệu lực 5 phút.</p>
            ";

            $mail->send();

            header("Location: reset_verify_otp.php");
            exit;
        } catch (Exception $e) {
            $error = "Không thể gửi mail. Lỗi: {$mail->ErrorInfo}";
        }
    } else {
        $error = "Email không tồn tại trong hệ thống!";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quên mật khẩu - Movie Vip</title>
    <link rel="stylesheet" href="styles.css" />
</head>

<body>
    <div class="background">
        <div class="overlay"></div>
        <div class="promo-images">
            <img src="/hình test/images (1).jpg" alt="Promo 1" />
            <img src="/hình test/images (2).jpg" alt="Promo 2" />
            <img src="/hình test/images.jpg" alt="Promo 3" />
            <img src="/hình test/TheWalkingDeadPoster.jpg" alt="Promo 4" />
        </div>
    </div>

    <div class="container">
        <div class="registration-box">
            <h2>
                Quên mật khẩu<br />Movie Vip
            </h2>
            <p>Hãy nhập email đã đăng ký để nhận mã OTP khôi phục mật khẩu.</p>

            <?php if (!empty($error)) : ?>
            <p style="color: #ff4d4d; font-weight: bold;"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>

            <form method="post">
                <div class="phone-input-container">
                    <input type="email" name="email" placeholder="Nhập email của bạn" class="input-field" required />
                </div>
                <button type="submit" class="continue-btn">Gửi OTP</button>
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