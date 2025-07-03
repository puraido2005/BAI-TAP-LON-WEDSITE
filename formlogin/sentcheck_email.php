<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$email = $_POST['email'] ?? '';

if (empty($email)) {
    die("Bạn chưa nhập email.");
}

// Tạo OTP
$otp = random_int(100000, 999999);

// Lưu session
$_SESSION['email'] = $email;
$_SESSION['otp'] = $otp;
$_SESSION['otp_time'] = time();

// Gửi OTP qua SMTP
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

    header("Location: verify_otp.php");
    exit;

} catch (Exception $e) {
    echo "Gửi mail thất bại: {$mail->ErrorInfo}";
}