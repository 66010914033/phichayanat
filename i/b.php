<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>งาน i  -- พิชญาณัฏฐ์ รินทร์วงค์ (อินเตอร์)</title>
</head>
<body>
<h1>งาน i  -- พิชญาณัฏฐ์ รินทร์วงค์ (อินเตอร์)</h1>

<form method="post" action="" enctype="multipart/form-data">
    ชื่อจังหวัด <input type="text" name="pname" autofocus required>
    รูปภาพ<input type ="file" name="pimage" require><br>

    ภาค
    <select name="rid">
    <?php
    include_once("connectdb.php");
    $sql3 = "SELECT * FROM 'regions'";
    $rs3 = mysqli_query($conn,$sql3);
    while ($data3 = mysqli_fetch_array($rs3)){
    ?>
        <option value='' <?php echo $data3['r_id'];?>"<?php echo $data3['r_name']?></option>

    </SELECT>
    <br>
    <button type="submit" name="Submit">บันทึก</button>
</form>
<br><br>

<?php
include_once("connectdb.php");

if(isset($_POST['Submit'])){
    $pname = $_POST['pname'];   // รับค่าจากฟอร์ม
    $ext=pathinfo($_FILES['pimage']['name'],PATHINFO_EXTENSION);
    $rid=$_POST['rid'];
    $sql2 = "INSERT INTO 'provinces'VALUES (NULL,'{$pname}', '{$ext}','{$rid}')";
    mysqli_query($conn, $sql2) or die ("เพิ่มข้อมมูลไม่ได้");
    $pid = mysqli_insert_id($conn);
    copy($_FILES['pimage']['tmp_name'],"img/".$pid.".".);
}
?>

<table border="1">
    <tr>
        <th>รหัสจังหวัด</th>
        <th>ชื่อจังหวัด</th>
        <th>รูป</th>
        <th>ลบ</th>
    </tr>

<?php
$sql = "SELECT * FROM provinces";
$rs = mysqli_query($conn,$sql);

while ($data = mysqli_fetch_array($rs)){
?>
    <tr>
        <td><?php echo $data['p_id']; ?></td>
        <td><?php echo $data['p_name']; ?></td>
        <td><img src="img/<?php echo $data['p_id']; ?>.<?php echo $data['p_ext']; ?>" width="140"> </td>
        <td width="80" align="center"><a href ="delete_regions.php?id=<?php echo$data['p_id'];?>"onClick="return confirm('ยืนยันการลบข้อมูลไหม?');"><img src="img/delete.png" width="20">
        </td>
    </tr>
<?php } ?>

</table>
</body>
</html>

<?php
mysqli_close($conn);
?>