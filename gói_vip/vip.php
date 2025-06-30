<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Gói VIP - Movie vip</title>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f6f6;
            margin: 0;
            padding: 0;
        }
        .topbar {
            background-color: #000;
            color: white;
            display: flex;
            justify-content: center;
            padding: 15px 30px;
            align-items: center;
        }
        .steps {
            display: flex;
            gap: 30px;
            align-items: center;
        }
        .step {
            text-align: center;
            color: white;
        }
        .step span {
            display: inline-block;
            background: #00ff00;
            color: black;
            border-radius: 50%;
            width: 26px;
            height: 26px;
            line-height: 26px;
            font-weight: bold;
        }
        .back {
            margin: 20px;
            color: green;
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
        }

        .benefits {
            display: flex;
            gap: 15px;
            margin: 0 20px;
            flex-wrap: wrap;
            color: black;
            align-items: center;
        }

        .benefits span {
            font-size: 14px;
        }

        .container {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
            margin: 30px;
        }

        .card {
            width: 270px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
            overflow: hidden;
            text-align: center;
        }

        .card .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            padding: 15px;
            height: 130px;
            position: relative;
            color: white;
        }
        

        .card .header-content {
            text-align: left;
        }
        .header-content h3 {
    margin: 0;
    font-size: 18px;
    position: relative;
    z-index: 1;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}


        .card .header img {
            height: 90px;
            border-radius: 5px;
        }

        .vip { background: linear-gradient(to right, #1a1a1a, #00cc44); box-shadow: 0 0 5px #00ff00; }
        .hbo { background: linear-gradient(to right, #1a1a1a, #0066ff); box-shadow: 0 0 5px #3399ff; }
        .sport { background: linear-gradient(to right, #1a1a1a, #ff3300); box-shadow: 0 0 5px #ff3300; }
        .all { background: linear-gradient(to right, #1a1a1a, #ffcc00); box-shadow: 0 0 5px #ffcc00; }

        .card .price {
            font-size: 24px;
            margin: 5px 0;
            font-weight: bold;
        }

        .card .desc {
            padding: 0 15px;
            font-size: 14px;
            color: white;
        }

        .card ul {
            text-align: left;
            font-size: 13px;
            padding: 10px 20px;
            list-style: none;
        }

        .card ul li::before {
            content: "✔️ ";
            color: green;
        }

        .card .btn {
            margin: 15px 0;
            padding: 10px;
            border: none;
            border-radius: 20px;
            background-color: #E6F8E7;
            color: #2FB13D;
            cursor: pointer;
        }

        .card .btn:hover {
            background-color: #2FB138;
            color: white;
        }

    </style>
</head>
<body>

<div class="topbar">
    <div class="steps">
        <div class="step"><span>1</span><div>Chọn gói</div></div>
        <div class="step"><span>2</span><div>Chọn thời hạn & phương thức thanh toán</div></div>
        <div class="step"><span>3</span><div>Kết quả</div></div>
    </div>
</div>

<a href="#" class="back">&lt; Trở về</a>
<div class="benefits">
<h2 style="margin: 10px 20px;">Đặc quyền VIP</h2>

<div class="benefits">
    <span>✅ Không quảng cáo</span>
    <span>✅ Full HD/4K</span>
    <span>✅ Thuyết minh/Phụ đề tiếng Việt</span>
    <span>✅ Xem trên nhiều thiết bị</span>
    <span>✅ Xem sớm nhất</span>
</div>
</div>

<div class="container">
<?php
$packages = [
    [
        "class" => "vip",
        "title" => "VIP",
        "price" => "69.000 đ",
        "desc" => "Dành cho Fan phim Châu Á và Movie Vip",
        "image" => "hinh_anh/1.jpg",
        "features" => [
            "Phim/show độc quyền Movie Vip",
            "Kho phim Việt, Trung, Hàn lớn nhất",
            "100+ kênh truyền hình trực tuyến"
        ]
    ],
    [
        "class" => "hbo",
        "title" => "VIP HBO GO",
        "price" => "99.000 đ",
        "desc" => "Fan phim Âu Mỹ, kèm nội dung gói VIP",
        "image" => "hinh_anh/2.jpg",
        "features" => [
            "Phim/show độc quyền Movie Vip",
            "Kho phim Việt, Trung, Hàn lớn nhất",
            "120+ kênh truyền hình trực tuyến",
            "Phim bom tấn Âu Mỹ HBO GO"
        ]
    ],
    [
        "class" => "sport",
        "title" => "SPORT K+",
        "price" => "189.000 đ",
        "desc" => "Fan Thể Thao K+, kèm nội dung gói VIP",
        "image" => "hinh_anh/3.jpg",
        "features" => [
            "Phim/show độc quyền Movie Vip",
            "Kho phim Việt, Trung, Hàn lớn nhất",
            "120+ kênh truyền hình trực tuyến",
            "Thể thao Ngoại hạng Anh, 5 kênh K+"
        ]
    ],
    [
        "class" => "all",
        "title" => "ALL ACCESS",
        "price" => "229.000 đ",
        "desc" => "Xem TẤT CẢ nội dung trên Movie vip",
        "image" => "hinh_anh/4.jpg",
        "features" => [
            "Phim/show độc quyền Movie Vip",
            "Kho phim Việt, Trung, Hàn lớn nhất",
            "120+ kênh truyền hình trực tuyến",
            "Phim bom tấn Âu Mỹ HBO GO",
            "Thể thao Ngoại hạng Anh, 5 kênh K+"
        ]
    ]
];

foreach ($packages as $p) {
    echo "<div class='card'>";
    echo "<div class='header {$p['class']}'>";
    echo "<div class='header-content'>";
    echo "<h3>{$p['title']}</h3>";
    echo "<div class='price'>{$p['price']}</div>";
    echo "<div class='desc'>{$p['desc']}</div>";
    echo "</div>";
    echo "<img src='{$p['image']}' alt='{$p['title']}'>";
    echo "</div>";
    echo "<ul>";
    foreach ($p['features'] as $f) {
        echo "<li>$f</li>";
    }
    echo "</ul>";
    echo "<button class='btn'>Đăng ký gói {$p['title']}</button>";
    echo "</div>";
}
?>
</div>

</body>
</html>
