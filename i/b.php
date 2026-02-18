<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>งาน i  -- พิชญาณัฏฐ์ รินทร์วงค์ (อินเตอร์)</title>
</head>
<body>
    <h1>งาน i  -- พิชญาณัฏฐ์ รินทร์วงค์ (อินเตอร์)</h1>

    <form method="post" enctype="multipart/form-data">
    ชื่อจังหวัด <input type="text" name="pname" autofocus required>
    รูปภาพ <input type="file" name="pimage" required>
    ภาค 

    <select name="rid">
        <option value="">-- เลือกภาค --</option>
        <?php
        include 'connectdb.php';
        $sql3 = "SELECT * FROM regions";
        $rs3 = mysqli_query($conn, $sql3);
        while ($data3 = mysqli_fetch_array($rs3)) {
        ?>
        ?>
            <option value="<?php echo $data3['r_id'] ?>"><?php echo $data3['r_name'] ?></option>
        <?php
        }
        ?>
    </select>
    <button type="submit" name="Submit">บันทึก</button>
</form> <br><br>

<?php
include 'connectdb.php';
if (isset($_POST['Submit'])) {
    $pname = $_POST['pname'];
    $rid = $_POST['rid'];
    $pimage = $_FILES['pimage']['name'];
    $ext = pathinfo($_FILES['pimage']['name'], PATHINFO_EXTENSION);
    $sql2 = "INSERT INTO provinces (p_id, p_name, p_ext, r_id) VALUES (NULL, '$pname', '$ext', '$rid')";
    mysqli_query($conn, $sql2) or die ("เพิ่มข้อมูลไม่ได้");
    $pid = mysqli_insert_id($conn);
    move_uploaded_file($_FILES['pimage']['tmp_name'], "img/".$pid.".".$ext);
}
?>


<table border="1">
    <tr>
        <th>Province ID</th>
        <th>Province Name</th>
        <th>Province Picture</th>
        <th>Delete</th>   
    </tr>

    <?php
$sql = "SELECT * FROM provinces INNER JOIN regions ON provinces.r_id = regions.r_id";
$rs = mysqli_query($conn, $sql);
while ($data = mysqli_fetch_array($rs)) {
?>
    <tr>
        <td><?php echo $data['p_id'] ?></td>
        <td><?php echo $data['p_name'] ?></td>
        
        <td align="center">
            <?php 
            $p_id = $data['p_id'];
            $p_ext = $data['p_ext'];
            $image_path = "img/" . $p_id . "." . $p_ext;

            if (!file_exists($image_path)) {
                if (file_exists("img/$p_id.jpg")) {
                    $image_path = "img/$p_id.jpg";
                } elseif (file_exists("img/$p_id.png")) {
                    $image_path = "img/$p_id.png";
                }
            }
            ?>
            <img src="<?php echo $image_path; ?>" width="100" onerror="this.src='img/delete.jpg';">
        </td>
        <td align="center">
            <a href="delete_province.php?id=<?php echo $data['p_id'] ?>&ext=<?php echo $data['p_ext'] ?>" 
               onclick="return confirm('คุณต้องการลบข้อมูลนี้หรือไม่')">
               <img src="img/delete.jpg" width="25" height="25">
            </a>
        </td>
    </tr>
<?php
}
?>
<?php
}
?>

<?php
mysqli_close($conn);
?>

</table>

</body>
</html>