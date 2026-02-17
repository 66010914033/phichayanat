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
    รูปภาพ <input type ="file" name="pimage" required><br>

    ภาค
    <select name="rid" required>
    <?php
    include_once("connectdb.php");
    $sql3 = "SELECT * FROM regions";
    $rs3 = mysqli_query($conn,$sql3);
    while ($data3 = mysqli_fetch_array($rs3)){
    ?>
        <option value="<?php echo $data3['r_id']; ?>">
            <?php echo $data3['r_name']; ?>
        </option>
    <?php } ?>
    </select>
    <br>
    <button type="submit" name="Submit">บันทึก</button>
</form>
<br><br>

<?php
include_once("connectdb.php");

if(isset($_POST['Submit'])){
    $pname = $_POST['pname'];
    $rid = $_POST['rid'];

    $ext = pathinfo($_FILES['pimage']['name'], PATHINFO_EXTENSION);

    $sql2 = "INSERT INTO provinces (p_id, p_name, p_ext, r_id)
             VALUES (NULL,'{$pname}','{$ext}','{$rid}')";

    mysqli_query($conn, $sql2) or die ("เพิ่มข้อมูลไม่ได้");

    $pid = mysqli_insert_id($conn);

    move_uploaded_file($_FILES['pimage']['tmp_name'], "img/".$pid.".".$ext);
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
        <td><img src="img/<?php echo $data['p_id']; ?>.<?php echo $data['p_ext']; ?>" width="140">
        </td>
        <td width="80" align="center">
            <a href ="delete_provinces.php?id=<?php echo $data['p_id']; ?>"
               onClick="return confirm('ยืนยันการลบข้อมูลไหม?');">
               <img src="img/delete.png" width="20">
            </a>
        </td>
    </tr>
<?php } ?>

</table>
</body>
</html>

<?php
mysqli_close($conn);
?>
