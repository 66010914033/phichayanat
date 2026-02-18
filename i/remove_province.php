<?php
include_once("connectdb.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    // ค้นหาข้อมูลเพื่อลบรูปภาพ
    $sql_find = "SELECT * FROM `provinces` WHERE `p_id` = '$id'";
    $rs_find = mysqli_query($conn, $sql_find);
    $data = mysqli_fetch_array($rs_find);
    
    if($data){
        $image_file = "img/" . $data['p_id'] . "." . $data['p_ext'];
        if(file_exists($image_file)){ unlink($image_file); }

        $sql_del = "DELETE FROM `provinces` WHERE `p_id` = '$id'";
        
        if(mysqli_query($conn, $sql_del)){
            // แก้ให้เด้งกลับไปหน้า b.php
            echo "<script>alert('ลบเรียบร้อย'); window.location='b.php';</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "<script>alert('ไม่พบข้อมูล'); window.location='b.php';</script>";
    }
}
mysqli_close($conn);
?>