<?php
session_start();

// ตรวจสอบว่าได้ล็อกอินหรือยัง ถ้าไม่มี Session ให้เด้งกลับไปหน้า login
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
    <title>หน้าหลักแอดมิน - พิชญาณัฏฐ์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { background-color: #fce4ec; font-family: 'Sarabun', sans-serif; }
        .navbar { background-color: #f06292 !important; }
        .card-menu {
            border: none;
            border-radius: 15px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-decoration: none;
            color: #d81b60;
            background: white;
        }
        .card-menu:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(240, 98, 146, 0.2);
            color: #ec407a;
        }
        .icon-circle {
            width: 70px; height: 70px;
            background: #fce4ec;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 15px;
            font-size: 28px;
            color: #f06292;
        }
        .text-pink { color: #d81b60; }
    </style>
</head>
<body>

<nav class="navbar navbar-dark shadow-sm mb-5">
    <div class="container">
        <span class="navbar-brand fw-bold"><i class="bi bi-shield-lock-fill"></i> ADMIN SYSTEM</span>
        <div class="text-white">
            <span class="me-3"><i class="bi bi-person-circle"></i> แอดมิน: <?php echo htmlspecialchars($_SESSION['aname']); ?></span>
            <a href="logout.php" class="btn btn-outline-light btn-sm rounded-pill px-3" onclick="return confirm('ยืนยันการออกจากระบบ?')">ออกจากระบบ</a>
        </div>
    </div>
</nav>

<div class="container text-center">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h2 class="fw-bold mb-2 text-pink">หน้าหลักจัดการระบบ</h2>
            <p class="text-muted mb-5 small text-uppercase fw-bold">พิชญาณัฏฐ์ รินทร์วงค์</p>

            <div class="row g-4">
                <div class="col-md-4">
                    <a href="products.php" class="card card-menu p-4 shadow-sm h-100">
                        <div class="icon-circle"><i class="bi bi-box-seam"></i></div>
                        <h5 class="fw-bold m-0">จัดการสินค้า</h5>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="orders.php" class="card card-menu p-4 shadow-sm h-100">
                        <div class="icon-circle"><i class="bi bi-cart-check"></i></div>
                        <h5 class="fw-bold m-0">จัดการออเดอร์</h5>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="costomers.php" class="card card-menu p-4 shadow-sm h-100">
                        <div class="icon-circle"><i class="bi bi-people"></i></div>
                        <h5 class="fw-bold m-0">จัดการลูกค้า</h5>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>