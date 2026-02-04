<?php
session_start();
include_once("connectdb.php");

// ตรวจสอบการเข้าสู่ระบบ
if (!isset($_SESSION['aid'])) {
    echo "<script>window.location='index.php';</script>";
    exit;
}

// ตัวอย่างการดึงข้อมูลลูกค้าด้วย Prepared Statement (ป้องกัน SQL Injection)
$sql = "SELECT * FROM customer ORDER BY c_id DESC";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการลูกค้า - พิชญาณัฏฐ์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { background-color: #fff5f8; font-family: 'Sarabun', sans-serif; }
        .navbar { background-color: #f06292 !important; }
        .card { border: none; border-radius: 15px; box-shadow: 0 5px 15px rgba(240, 98, 146, 0.1); }
        .table thead { background-color: #fce4ec; color: #d81b60; }
        .btn-pink { background-color: #f06292; color: white; border-radius: 8px; }
        .btn-pink:hover { background-color: #ec407a; color: white; }
        .btn-outline-pink { border-color: #f06292; color: #f06292; border-radius: 8px; }
        .btn-outline-pink:hover { background-color: #f06292; color: white; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark mb-4 shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index2.php"><i class="bi bi-house-heart-fill"></i> Back Office</a>
        <div class="ms-auto text-white">
            <small>แอดมิน: <?php echo htmlspecialchars($_SESSION['aname']); ?></small>
        </div>
    </div>
</nav>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold" style="color: #d81b60;">จัดการข้อมูลลูกค้า</h2>
        <a href="add_customer.php" class="btn btn-pink"><i class="bi bi-person-plus-fill"></i> เพิ่มลูกค้าใหม่</a>
    </div>

    <div class="card p-3">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ชื่อ-นามสกุล</th>
                        <th>เบอร์โทรศัพท์</th>
                        <th>อีเมล</th>
                        <th class="text-center">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td><?php echo $row['c_id']; ?></td>
                        <td><?php echo htmlspecialchars($row['c_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['c_phone']); ?></td>
                        <td><?php echo htmlspecialchars($row['c_email']); ?></td>
                        <td class="text-center">
                            <a href="edit_customer.php?id=<?php echo $row['c_id']; ?>" class="btn btn-sm btn-outline-pink me-1">
                                <i class="bi bi-pencil-square"></i> แก้ไข
                            </a>
                            <a href="delete_customer.php?id=<?php echo $row['c_id']; ?>" 
                               class="btn btn-sm btn-outline-danger" 
                               onclick="return confirm('ยืนยันการลบลูกค้าท่านนี้?')">
                                <i class="bi bi-trash"></i> ลบ
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="mt-4 text-center">
        <a href="index2.php" class="btn btn-secondary btn-sm">กลับหน้าหลัก</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>