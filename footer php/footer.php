<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Footer</title>
    <style>
        .footer {
            background-color: #111;
            color: #fff;
            padding: 30px 20px;
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        .footer-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .footer-column {
            flex: 1;
            min-width: 220px;
            margin-bottom: 20px;
        }

        .footer-column h3,
        .footer-column h4 {
            color: #fff;
            margin-bottom: 10px;
        }

        .footer-column p {
            color: #ccc;
            line-height: 1.6;
        }

        .footer-column ul {
            list-style: none;
            padding-left: 0;
        }

        .footer-column ul li {
            margin-bottom: 8px;
        }

        .footer-column ul li a {
            color: #ccc;
            text-decoration: none;
        }

        .footer-column ul li a:hover {
            color: #FF6600;
        }

        .footer-bottom {
            text-align: center;
            color: #888;
            border-top: 1px solid #444;
            padding-top: 15px;
            margin-top: 20px;
        }

        .brand-highlight {
            color: #FF6600;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="footer">
    <div class="footer-container">
        <!-- Cột 1: Giới thiệu -->
        <div class="footer-column">
            <h3><span class="brand-highlight">Motchill</span> - PHIM ONLINE</h3>
            <p>
                Motchill - Nền tảng xem phim trực tuyến miễn phí, nổi bật với chất lượng hình ảnh cao và giao diện dễ sử dụng.
                Với tốc độ tải trang nhanh chóng, người dùng có thể dễ dàng truy cập và thưởng thức một kho phim phong phú
                gồm hơn 100.000 tựa phim mới và hấp dẫn.
            </p>
        </div>

        <!-- Cột 2: Danh Mục -->
        <div class="footer-column">
            <h4>DANH MỤC</h4>
            <ul>
                <li><a href="#">Phim Mới</a></li>
                <li><a href="#">Phim Chiếu Rạp</a></li>
                <li><a href="#">Phim Bộ</a></li>
                <li><a href="#">Phim Lẻ</a></li>
            </ul>
        </div>

        <!-- Cột 3: Thể Loại -->
        <div class="footer-column">
            <h4>THỂ LOẠI</h4>
            <ul>
                <li><a href="#">Phim Cổ Trang</a></li>
                <li><a href="#">Phim Đam Mỹ</a></li>
                <li><a href="#">Phim Bách Hợp</a></li>
                <li><a href="#">Phim Viễn Tưởng</a></li>
            </ul>
        </div>

        <!-- Cột 4: Điều Khoản -->
        <div class="footer-column">
            <h4>ĐIỀU KHOẢN</h4>
            <ul>
                <li><a href="#">DMCA</a></li>
                <li><a href="#">Liên Hệ</a></li>
                <li><a href="#">Privacy</a></li>
                <li><a href="#">Terms of Service</a></li>
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        © 2025 Motchill. All rights reserved.
    </div>
</div>

</body>
</html>
