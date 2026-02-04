<?php
session_start();
// ตรวจสอบว่าได้ล็อกอินหรือยัง ถ้าไม่มี Session ให้เด้งกลับไปหน้า login
if (!isset($_SESSION['aid'])) {
    echo "<script>window.location='index.php';</script>";
    exit;
}
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการระบบ - พิชญาณัฏฐ์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #fff5f8;
            font-family: 'Sarabun', sans-serif;
        }
        .navbar {
            background-color: #f06292 !important;
        }
        .card-menu {
            border: none;
            border-radius: 15px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-decoration: none;
            color: #444;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }
        .card-menu:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(240, 98, 146, 0.2);
            color: #d81b60;
        }
        .icon-box {
            width: 60px;
            height: 60px;
            background-color: #fce4ec;
            color: #f06292;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 15px;
        }
        .logout-btn {
            color: white !important;
            border: 1px solid rgba(255,255,255,0.5);
            border-radius: 20px;
        }
        .logout-btn:hover {
            background-color: rgba(255,255,255,0.2);
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark mb-4 shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">Admin Panel</a>
        <div class="ms-auto d-flex align-items-center">
            <span class="text-white me-3 d-none d-sm-inline">
                <i class="bi bi-person-circle me-1"></i> 
                สวัสดี, <?php echo htmlspecialchars($_SESSION['aname']); ?>
            </span>
            <a href="logout.php" class="btn btn-sm logout-btn" onclick="return confirm('ยืนยันการออกจากระบบ?')">
                <i class="bi bi-box-arrow-right me-1"></i> ออกจากระบบ
            </a>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h2 class="fw-bold text-pink" style="color: #d81b60;">จัดการระบบร้านค้า - พิชญาณัฏฐ์</h2>
            <p class="text-muted">ยินดีต้อนรับเข้าสู่ระบบจัดการข้อมูลหลังบ้าน</p>
            <hr class="mx-auto" style="width: 50px; border-top: 3px solid #f06292;">
        </div>
    </div>

    <div class="row g-4 justify-content-center">
        <div class="col-6 col-md-3">
            <a href="products.php" class="card card-menu h-100 p-4 text-center">
                <div class="icon-box mx-auto">
                    <i class="bi bi-box-seam-fill"></i>
                </div>
                <h5 class="fw-bold mb-0">จัดการสินค้า</h5>
            </a>
        </div>

        <div class="col-6 col-md-3">
            <a href="orders.php" class="card card-menu h-100 p-4 text-center">
                <div class="icon-box mx-auto">
                    <i class="bi bi-cart-check-fill"></i>
                </div>
                <h5 class="fw-bold mb-0">จัดการออเดอร์</h5>
            </a>
        </div>

        <div class="col-6 col-md-3">
            <a href="costomers.php" class="card card-menu h-100 p-4 text-center">
                <div class="icon-box mx-auto">
                    <i class="bi bi-people-fill"></i>
                </div>
                <h5 class="fw-bold mb-0">จัดการลูกค้า</h5>
            </a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>