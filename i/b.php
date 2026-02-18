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
        <select name="rid" required>
            <option value="">-- เลือกภาค --</option>
            <?php
            include 'connectdb.php';
            $sql3 = "SELECT * FROM regions";
            $rs3 = mysqli_query($conn, $sql3);
            while ($data3 = mysqli_fetch_array($rs3)) {
            ?>
                <option value="<?php echo $data3['r_id']; ?>"><?php echo $data3['r_name']; ?></option>
            <?php
            }
            ?>
        </select>
        <button type="submit" name="Submit">บันทึก</button>
    </form> 
    <br><br>

    <?php
    if (isset($_POST['Submit'])) {
        $pname = $_POST['pname'];
        $rid = $_POST['rid'];
        
        // จัดการเรื่องชื่อไฟล์และนามสกุล
        $pimage = $_FILES['pimage']['name'];
        $ext = pathinfo($pimage, PATHINFO_EXTENSION);
        
        // แทรกข้อมูลลงฐานข้อมูล
        $sql2 = "INSERT INTO provinces (p_name, p_ext, r_id) VALUES ('$pname', '$ext', '$rid')";
        if(mysqli_query($conn, $sql2)) {
            $pid = mysqli_insert_id($conn);
            // อัปโหลดไฟล์ไปยังโฟลเดอร์ img/
            move_uploaded_file($_FILES['pimage']['tmp_name'], "img/".$pid.".".$ext);
            echo "<script>alert('บันทึกข้อมูลเรียบร้อย'); window.location='b.php';</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
    ?>

    <table border="1" width="80%">
        <tr>
            <th>Province ID</th>
            <th>Province Name</th>
            <th>Province Picture</th>
            <th>Delete</th>   
        </tr>

        <?php
        $sql = "SELECT * FROM provinces INNER JOIN regions ON provinces.r_id = regions.r_id ORDER BY provinces.p_id DESC";
        $rs = mysqli_query($conn, $sql);
        while ($data = mysqli_fetch_array($rs)) {
            $image_path = "img/" . $data['p_id'] . "." . $data['p_ext'];
        ?>
        <tr>
            <td align="center"><?php echo $data['p_id']; ?></td>
            <td><?php echo $data['p_name']; ?></td>
            <td align="center">
                <?php if (file_exists($image_path)): ?>
                    <img src="<?php echo $image_path; ?>" width="100">
                <?php else: ?>
                    <small>ไม่มีรูปภาพ</small>
                <?php endif; ?>
            </td>
            <td align="center">
                <a href="delete_province.php?id=<?php echo $data['p_id']; ?>&ext=<?php echo $data['p_ext']; ?>" 
                   onclick="return confirm('คุณต้องการลบข้อมูลนี้หรือไม่')">
                    <img src="img/delete.png" width="25" height="25" alt="Delete">
                </a>
            </td>
        </tr>
        <?php
        }
        mysqli_close($conn);
        ?>
    </table>
</body>
</html>