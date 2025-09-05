<?php
session_start();

$email = $_SESSION['email'] ?? '';
$otp_input = $_POST['otp_input'] ?? '';

$message = '';
$success = false;

// Kiểm tra có nhập OTP không
if (empty($otp_input)) {
    $message = "Bạn chưa nhập mã OTP.";
} elseif (!isset($_SESSION['otp']) || !isset($_SESSION['otp_time'])) {
    $message = "Mã OTP không tồn tại hoặc đã hết hạn.";
} elseif (time() - $_SESSION['otp_time'] > 300) {
    unset($_SESSION['otp'], $_SESSION['otp_time']);
    $message = "Mã OTP đã hết hạn.";
} elseif ($otp_input == $_SESSION['otp']) {
    // Đúng OTP
    $_SESSION['otp_verified'] = true;
    unset($_SESSION['otp'], $_SESSION['otp_time']);

    // Kết nối DB
    $conn = new mysqli("localhost", "root", "", "wedphim1");
    $conn->set_charset("utf8mb4");

    if ($conn->connect_error) {
        $message = "Lỗi kết nối DB: " . $conn->connect_error;
    } else {
        if (empty($email)) {
            $message = "Không tìm thấy thông tin email.";
        } else {
            $stmt = $conn->prepare("SELECT id FROM user WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $_SESSION['logged_in'] = true;

                header("Location: login.php");
                exit;
            } else {
                header("Location: passnew.php");
                exit;
            }
        }
    }
} else {
    $message = "Mã OTP không đúng.";
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kết quả xác minh OTP</title>
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

    .message-box {
        background: rgba(0, 0, 0, 0.7);
        padding: 40px;
        border-radius: 10px;
        text-align: center;
        max-width: 400px;
    }

    .message-box h1 {
        margin-bottom: 20px;
        font-size: 26px;
        color: #ff4d4d;
    }

    .message-box p {
        font-size: 18px;
        margin-bottom: 30px;
    }

    .btn {
        background: #ff0000;
        color: #fff;
        text-decoration: none;
        padding: 12px 30px;
        border-radius: 25px;
        font-weight: bold;
        transition: 0.3s;
        display: inline-block;
    }

    .btn:hover {
        background: #ff4d4d;
        transform: translateY(-2px);
    }
    </style>
</head>

<body>
    <div class="message-box">
        <h1>Kết quả xác minh OTP</h1>
        <p><?= htmlspecialchars($message) ?></p>
        <a href="verify_otp.php" class="btn">Thử lại</a>
    </div>
</body>

</html>