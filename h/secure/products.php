<?php
session_start();
include_once("connectdb.php");

// 1. ตรวจสอบ Login เพื่อความปลอดภัย
if (!isset($_SESSION['aid'])) {
    header("Location: index.php");
    exit;
}

// 2. ดึงข้อมูลสินค้าด้วย Prepared Statement ป้องกัน SQL Injection
$sql = "SELECT * FROM product ORDER BY p_id DESC";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการสินค้า - พิชญาณัฏฐ์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { background-color: #fff5f8; font-family: 'Sarabun', sans-serif; }
        .navbar { background-color: #f06292 !important; }
        .card-table { border: none; border-radius: 20px; box-shadow: 0 5px 20px rgba(240, 98, 146, 0.1); }
        .table thead { background-color: #fce4ec; color: #d81b60; border-bottom: 2px solid #f06292; }
        .btn-pink { background-color: #f06292; color: white; border-radius: 10px; }
        .btn-pink:hover { background-color: #ec407a; color: white; }
        .text-pink { color: #d81b60; }
        .product-img { width: 60px; height: 60px; object-fit: cover; border-radius: 10px; }
    </style>
</head>
<body>

<nav class="navbar navbar-dark shadow-sm mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index2.php">ADMIN PANEL</a>
        <div class="text-white small">
            <span class="me-3"><i class="bi bi-person-circle"></i> สวัสดี, <?php echo htmlspecialchars($_SESSION['aname']); ?></span>
            <a href="logout.php" class="btn btn-outline-light btn-sm rounded-pill px-3">ออกจากระบบ</a>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2 class="fw-bold text-pink">จัดการข้อมูลสินค้า</h2>
            <p class="text-muted small">พิชญาณัฏฐ์ รินทร์วงค์ - ระบบหลังบ้าน</p>
        </div>
        <div class="col-md-4 text-md-end">
            <a href="product_add.php" class="btn btn-pink shadow-sm"><i class="bi bi-plus-circle-fill"></i> เพิ่มสินค้าใหม่</a>
        </div>
    </div>

    <div class="card card-table overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">รูปภาพ</th>
                        <th>ชื่อสินค้า</th>
                        <th>ราคา</th>
                        <th>คงเหลือ</th>
                        <th class="text-center pe-4">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td class="ps-4">
                            <?php $img = !empty($row['p_img']) ? "images/".$row['p_img'] : "https://placehold.co/100x100?text=No+Image"; ?>
                            <img src="<?php echo $img; ?>" class="product-img border shadow-sm">
                        </td>
                        <td class="fw-bold"><?php echo htmlspecialchars($row['p_name']); ?></td>
                        <td><?php echo number_format($row['p_price'], 2); ?> บาท</td>
                        <td><?php echo number_format($row['p_stock']); ?> ชิ้น</td>
                        <td class="text-center pe-4">
                            <div class="btn-group">
                                <a href="product_edit.php?id=<?php echo $row['p_id']; ?>" class="btn btn-sm btn-outline-warning shadow-sm" title="แก้ไข">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <a href="product_delete.php?id=<?php echo