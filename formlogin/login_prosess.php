<?php
session_start();

// Kết nối DB
$conn = new mysqli("localhost", "root", "", "wedphim1");
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    die("Lỗi kết nối DB: " . $conn->connect_error);
}

$email = $_SESSION['email'] ?? '';
$password_input = $_POST['password'] ?? '';

if (empty($email) || empty($password_input)) {
    $message = "Thiếu thông tin.";
    $success = false;
} else {
    $stmt = $conn->prepare("SELECT password FROM user WHERE email = ?");
    if ($stmt === false) {
        die("Lỗi prepare SQL: " . $conn->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if (password_verify($password_input, $row['password'])) {
            $_SESSION['logged_in'] = true;
            $_SESSION['email'] = $email;
            $message = "Đăng nhập thành công!";
            $success = true;
        } else {
            $message = "Sai mật khẩu.";
            $success = false;
        }
    } else {
        $message = "Tài khoản không tồn tại.";
        $success = false;
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kết quả đăng nhập</title>
    <link rel="stylesheet" href="styles.css" />
    <style>
    body {
        margin: 0;
        padding: 0;
        background: linear-gradient(135deg, #000000, #1c1c1c);
        font-family: 'Segoe UI', sans-serif;
        color: #fff;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background-image: url('/hình test/TheWalkingDeadPoster.jpg');
        background-size: cover;
        background-position: center;
    }

    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        z-index: 1;
    }

    .message-box {
        position: relative;
        z-index: 2;
        background: rgba(30, 30, 30, 0.8);
        padding: 40px;
        border-radius: 10px;
        text-align: center;
        max-width: 450px;
        border: 2px solid #ff0000;
        box-shadow: 0 0 20px #ff0000;
    }

    .message-box h1 {
        margin-bottom: 20px;
        font-size: 28px;
        color: #ff0000;
        text-shadow: 1px 1px 5px #000;
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
        border: 2px solid #fff;
    }

    .btn:hover {
        background: #ff3333;
        transform: scale(1.05);
    }
    </style>
</head>

<body>
    <div class="overlay"></div>
    <div class="message-box">
        <h1><?= htmlspecialchars($message) ?></h1>
        <?php if ($success): ?>
        <a href="welcome.php" class="btn">Vào trang chính</a>
        <?php else: ?>
        <a href="formlogin.html" class="btn">Đăng nhập lại</a>
        <?php endif; ?>
    </div>
</body>

</html>