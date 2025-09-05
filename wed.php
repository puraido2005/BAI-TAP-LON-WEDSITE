<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wed"; 

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}


$sql = "SELECT id, email, message, created_at FROM support ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Phản Hồi Người Dùng</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Danh Sách Phản Hồi</h2>
    <table>
        <tr><th>ID</th><th>Email</th><th>Nội Dung</th><th>Thời Gian Gửi</th></tr>
        <?php
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $message = strlen($row['message']) > 100 
                    ? substr($row['message'], 0, 100) . "..." 
                    : $row['message'];
                echo "<tr>
                        <td>" . htmlspecialchars($row['id']) . "</td>
                        <td>" . htmlspecialchars($row['email']) . "</td>
                        <td>" . htmlspecialchars($message) . "</td>
                        <td>" . htmlspecialchars($row['created_at']) . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Không có phản hồi nào.</td></tr>";
        }
        ?>
    </table>
    <?php $conn->close(); ?>
</body>
</html>
