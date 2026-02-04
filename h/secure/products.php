<?php
session_start();
include_once("connectdb.php");

// ตรวจสอบ Login
if (!isset($_SESSION['aid'])) {
    header("Location: index.php");
    exit;
}

// ดึงข้อมูลสินค้า (ตรวจสอบชื่อตารางใน DB ของคุณว่าชื่อ product หรือไม่)
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
    <style>
        body { background-color: #fff5f8; font-family: 'Sarabun', sans-serif; }
        .navbar { background-color: #f06292 !important; }
        .card-table { border: none; border-radius: 20px; box-shadow: 0 5px 20px rgba(240, 98, 146, 0.1); }
        .table thead { background-color: #fce4ec; color: #d81b60; }
        .btn-pink { background-color: #f06292; color: white; border: none; }
        .btn-pink:hover { background-color: #ec407a; color: white; }
    </style>
</head>
<body>

<nav class="navbar navbar-dark mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index2.php">ADMIN PANEL</a>
        <div class="text-white small">
            สวัสดี, <?php echo htmlspecialchars($_SESSION['aname']); ?> | <a href="logout.php" class="text-white">ออกจากระบบ</a>
        </div>
    </div>
</nav>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold" style="color: #d81b60;">รายการสินค้า</h2>
        <a href="product_add.php" class="btn btn-pink px-4"><i class="bi bi-plus-lg"></i> เพิ่มสินค้า</a>
    </div>

    <div class="card card-table">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">ชื่อสินค้า</th>
                        <th>ราคา</th>
                        <th>คงเหลือ</th>
                        <th class="text-center pe-4">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td class="ps-4 fw-bold"><?php echo htmlspecialchars($row['p_name']); ?></td>
                        <td><?php echo number_format($row['p_price'], 2); ?> บาท</td>
                        <td><?php echo number_format($row['p_stock']); ?> ชิ้น</td>
                        <td class="text-center pe-4">
                            <a href="edit.php?id=<?php echo $row['p_id']; ?>" class="btn btn-sm btn-outline-warning mx-1">แก้ไข</a>
                            <a href="delete.php?id=<?php echo $row['p_id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('ลบหรือไม่?')">ลบ</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>