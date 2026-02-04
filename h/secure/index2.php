<?php
session_start();
// ตรวจสอบสถานะการเข้าสู่ระบบเพื่อความปลอดภัย
if (!isset($_SESSION['aid'])) {
    header("Location: index.php");
    exit;
}
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ระบบจัดการหลังบ้าน - พิชญาณัฏฐ์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { background-color: #fff5f8; font-family: 'Sarabun', sans-serif; }
        .navbar { background-color: #f06292 !important; border-bottom: 3px solid #e91e63; }
        .menu-link { text-decoration: none; color: inherit; display: block; }
        .card-menu {
            border: none;
            border-radius: 20px;
            transition: all 0.3s ease;
            background: white;
            box-shadow: 0 4px 15px rgba(240, 98, 146, 0.1);
        }
        .card-menu:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 25px rgba(240, 98, 146, 0.2);
            background-color: #fff0f5;
        }
        .icon-box {
            width: 70px; height: 70px;
            background: #fce4ec;
            border-radius: 18px;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 20px;
            font-size: 30px;
            color: #f06292;
        }
        .text-pink { color: #d81b60; }
    </style>
</head>
<body>

<nav class="navbar navbar-dark shadow-sm mb-5">
    <div class="container">
        <span class="navbar-brand fw-bold"><i class="bi bi-gear-fill me-2"></i>ระบบจัดการหลังบ้าน</span>
        <div class="text-white small">
            <span class="me-3"><i class="bi bi-person-circle"></i> แอดมิน: <?php echo htmlspecialchars($_SESSION['aname']); ?></span>
            <a href="logout.php" class="btn btn-outline-light btn-sm rounded-pill" onclick="return confirm('ยืนยันการออกจากระบบ?')">ออกจากระบบ</a>
        </div>
    </div>
</nav>

<div class="container">
    <div class="text-center mb-5">
        <h2 class="fw-bold text-pink">จัดการระบบร้านค้า - พิชญาณัฏฐ์</h2>
        <p class="text-muted">เลือกเมนูที่คุณต้องการจัดการด้านล่างนี้</p>
    </div>

    <div class="row g-4 justify-content-center">
        <div class="col-md-4 col-sm-6">
            <a href="products.php" class="menu-link">
                <div class="card card-menu p-5 text-center h-100">
                    <div class="icon-box"><i class="bi bi-box-seam"></i></div>
                    <h5 class="fw-bold mb-0">จัดการสินค้า</h5>
                </div>
            </a>
        </div>

        <div class="col-md-4 col-sm-6">
            <a href="orders.php" class="menu-link">
                <div class="card card-menu p-5 text-center h-100">
                    <div class="icon-box"><i class="bi bi-cart-check"></i></div>
                    <h5 class="fw-bold mb-0">จัดการออเดอร์</h5>
                </div>
            </a>
        </div>

        <div class="col-md-4 col-sm-6">
            <a href="costomers.php" class="menu-link">
                <div class="card card-menu p-5 text-center h-100">
                    <div class="icon-box"><i class="bi bi-people"></i></div>
                    <h5 class="fw-bold mb-0">จัดการลูกค้า</h5>
                </div>
            </a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>