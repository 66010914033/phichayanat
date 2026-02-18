<?php
include_once("connectdb.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    // ตรวจสอบว่ามี ID นี้ในตาราง regions หรือไม่
    $sql_check = "SELECT * FROM `regions` WHERE `r_id` = '$id'";
    $rs_check = mysqli_query($conn, $sql_check);
    
    if(mysqli_num_rows($rs_check) > 0){
        // ถ้าเจอข้อมูล ให้ทำการลบ
        $sql_del = "DELETE FROM `regions` WHERE `r_id` = '$id'";
        
        if(mysqli_query($conn, $sql_del)){
            echo "<script>alert('ลบข้อมูลภาคเรียบร้อยแล้ว'); window.location='a.php';</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        // นี่คือข้อความที่คุณเห็นในภาพที่ 8 เพราะมันหา ID ในตารางไม่เจอ
        echo "<script>alert('ไม่พบข้อมูลที่ต้องการลบ (ID: $id)'); window.location='a.php';</script>";
    }
}
mysqli_close($conn);
?>