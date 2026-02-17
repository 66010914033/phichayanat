<meta charset="utf-8">
<?php

$id = $_GET['id'];
include 'connectdb.php';
$sql = "DELETE FROM province WHERE p_id = '{$id}'";
mysqli_query($conn, $sql) or die ("ลบข้อมูลไม่ได้");

echo "<script>";
echo "window.location='a.php';";
echo "</script>";
?>