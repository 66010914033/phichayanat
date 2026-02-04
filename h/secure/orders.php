<?php
session_start();
include_once("connectdb.php");

// ตรวจสอบการเข้าสู่ระบบ
if (!isset($_SESSION['aid'])) {
    echo "<script>window.location='index.php';</script>";
    exit;
}

// การดึงข้อมูลออเดอร์ (ใช้ SQL Join เพื่อดึงชื่อลูกค้ามาแสดงคู่กับออเดอร์)
$sql = "SELECT orders.o_id, orders.o_date, orders.o_status, customer.c_name 
        FROM orders 
        LEFT JOIN customer ON orders.c_id = customer.c_id 
        ORDER BY orders.o_id DESC";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการออเดอร์ - พิชญาณัฏฐ์</title>
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
        .status-pending { background-color: #ffd1dc; color: #d81b60; } /* ชมพูอ่อนสำหรับสถานะรอ */
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark mb-4 shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index2.php"><i class="bi bi-cart-fill me-2"></i> Order Management</a>
        <div class="ms-auto text-white small">
            <i class="bi bi-person-circle"></i> แอดมิน: <?php echo htmlspecialchars($_SESSION['aname']); ?>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row mb-4 align-items-center">
        <div class="col-md-6">
            <h2 class="fw-bold text-pink" style="color: #d81b60;">รายการสั่งซื้อสินค้า</h2>
        </div>
        <div class="col-md-6 text-md-end">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-md-end mb-0">
                    <li class="breadcrumb-item"><a href="index2.php" class="text-pink">หน้าหลัก</a></li>
                    <li class="breadcrumb-item active">จัดการออเดอร์</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th width="10%">เลขที่สั่งซื้อ</th>
                        <th width="20%">วันที่สั่งซื้อ</th>
                        <th width="30%">ชื่อลูกค้า</th>
                        <th width="20%">สถานะ</th>
                        <th width="20%" class="text-center">การจัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td class="fw-bold">#<?php echo $row['o_id']; ?></td>
                        <td><?php echo date('d/m/Y H:i', strtotime($row['o_date'])); ?></td>
                        <td><?php echo htmlspecialchars($row['c_name']); ?></td>
                        <td>
                            <span class="badge rounded-pill status-pending p-2 px-3">
                                <i class="bi bi-clock-history me-1"></i> <?php echo $row['o_status']; ?>
                            </span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group" role="group">
                                <a href="order_details.php?id=<?php echo $row['o_id']; ?>" class="btn btn-sm btn-outline-info" title="ดูรายละเอียด">
                                    <i class="bi bi-search"></i>
                                </a>
                                <a href="order_edit.php?id=<?php echo $row['o_id']; ?>" class="btn btn-sm btn-outline-warning" title="แก้ไขสถานะ">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <a href="order_delete.php?id=<?php echo $row['o_id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('ลบออเดอร์นี้หรือไม่?')" title="ลบ">
                                    <i class="bi bi-trash-fill"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php if(mysqli_num_rows($result) == 0): ?>
            <div class="text-center py-5 text-muted">
                <i class="bi bi-inbox fs-1"></i>
                <p>ยังไม่มีรายการสั่งซื้อในขณะนี้</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>