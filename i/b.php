<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>งาน i  -- พิชญาณัฏฐ์ รินทร์วงค์ (อินเตอร์)</title>
</head>
<body>
<h1>งาน i  -- พิชญาณัฏฐ์ รินทร์วงค์ (อินเตอร์)</h1>

<form method="post" action="">
    ชื่อภาค <input type="text" name="rname" autofocus required>
    <button type="submit" name="Submit">บันทึก</button>
</form>
<br><br>

<?php
include_once("connectdb.php");

if(isset($_POST['Submit'])){
    $rname = $_POST['pname'];   // รับค่าจากฟอร์ม

    $sql2 = "INSERT INTO regions (p_id, p_name) VALUES (NULL, '$pname')";
    mysqli_query($conn, $sql2);
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