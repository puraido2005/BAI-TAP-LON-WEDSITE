<?php
session_start();

// Kết nối DB
$conn = new mysqli("localhost", "root", "", "wedphim1");
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    die("Lỗi kết nối DB: " . $conn->connect_error);
}

$email = $_SESSION['email'] ?? '';
$password_plain = $_POST['password'] ?? '';

if (empty($email) || empty($password_plain)) {
    echo "Thiếu thông tin.";
    exit;
}

// HASH mật khẩu trước khi lưu
$hashed_password = password_hash($password_plain, PASSWORD_DEFAULT);

// Kiểm tra email đã tồn tại chưa
$stmt = $conn->prepare("SELECT id FROM user WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->fetch_assoc()) {
    echo "Email đã tồn tại. Vui lòng dùng email khác.";
    // Tự động chuyển về index.html sau 3 giây
    echo '<meta http-equiv="refresh" content="3;url=index.html">';
    exit;
}

// Thực hiện INSERT user mới
$stmt = $conn->prepare("INSERT INTO user (email, password) VALUES (?, ?)");
if ($stmt === false) {
    die("Lỗi prepare SQL: " . $conn->error);
}

$stmt->bind_param("ss", $email, $hashed_password);

if ($stmt->execute()) {
    $_SESSION['logged_in'] = true;
    $_SESSION['email'] = $email;
    $_SESSION['user_id'] = $stmt->insert_id;

    header("Location: welcome.php");
    exit;
} else {
    echo "Lỗi khi thêm user: " . $conn->error;
    echo '<meta http-equiv="refresh" content="3;url=index.html">';
    exit;
}
?>