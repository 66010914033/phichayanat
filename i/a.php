<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>ชัชวาล สิงห์เทศ 66010914138</title>
</head>
<body>
    <h1>งาน i -- ชัชวาล สิงห์เทศ 66010914138 </h1>

    <form method="post" action="">
        ชื่อภาค <input type="text" name="rname" autofocus required>
        <button type="submit" name="Submit">บันทึก</button>
    </form>
    <br>

<?php
if(isset($_POST['Submit'])){
    include_once("connectdb.php");
    $rname = $_POST['rname']; 
    
    // คำสั่งเพิ่มข้อมูล
    $sql2 = "INSERT INTO `regions` (`r_id`, `r_name`) VALUES (NULL, '$rname')";
    mysqli_query($conn, $sql2) or die ("เพิ่มข้อมูลไม่ได้: " . mysqli_error($conn));
    
    // เมื่อเพิ่มเสร็จให้ Refresh หน้าตัวเอง
    echo "<script>window.location='a.php';</script>";
}
?>

    <table border="1" width="500">
        <tr>
            <th>รหัสภาค</th>
            <th>ชื่อภาค</th>
            <th>ลบ</th> 
        </tr>

        <?php
        include_once("connectdb.php");
        $sql = "SELECT * FROM `regions`";
        $rs = mysqli_query($conn, $sql); 
        
        while ($data = mysqli_fetch_array($rs)) {
        ?>
            <tr>
                <td align="center"><?php echo $data['r_id']; ?></td>
                <td><?php echo $data['r_name']; ?></td>
                <td align="center">
                    <a href="delete.php?id=<?php echo $data['r_id']; ?>" onclick="return confirm('ยืนยันการลบข้อมูลนี้?');">
                        <img src="img/delete.jpg" width="30" height="30" border="0" alt="ลบ">
                    </a>
                </td>
            </tr>
        <?php 
        } 
        ?>
    </table>

    <?php if(isset($conn)) { mysqli_close($conn); } ?>
</body>
</html>