<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>งาน i  -- พิชญาณัฏฐ์	 รินทร์วงค์</title>
</head>

<body>
<h1>งาน i  -- พิชญาณัฏฐ์	 รินทร์วงค์</h1>
<?php

    echo $data['r_id']."<br>";
    echo $data['r_name']."<hr>";


mysqli_close($conn);
?>
<table border ="1">
    <tr>
        <th>รหัสภาค</th>
        <th>ชื่อภาค</th>
    </tr>
<?php
include_once("connectdb.php");
$sql = "SELECT * FROM `regions`";
$rs = mysqli_query($conn,$sql);
while ($data = mysqli_fetch_array($rs)){
?>
    <tr>
        <td><?php echo $data['r_id'];?></td>
        <td><?php echo $data['r_name'];?></td>
    </tr>
<?php}?>
</table>
</body>
<?php
mysqli_close($conn);
?>
</html>
