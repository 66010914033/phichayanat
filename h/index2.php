<?php
	session_start();
	if(empty($_SESSION['aid'])){
		echo "Access Deniec";
		echo "<meta http-aquiv = 'refresh'content ='3;url=index.php>";
		exit;
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>หน้าหลักแอดมิน - พิชญาณัฏฐ์ </title>
</head>

<body>
<h1>หน้าหลักแอดมิน- พิชญาณัฏฐ์ </h1>
<?php echo "แอดมิน: ".$_SESSION['aname'];?><br>
<ul>
	<a href="products.php"><li>จัดการสินค้า</li></a>
    <a href="orders.php"><li>จัดการสินค้า</li></a>
    <a href="costomers.php"><li>จัดการสินค้า</li></a>
    <a href="logout.php"><li>ออกจากระบบ</li></a>
</ul>
</body>
</html>