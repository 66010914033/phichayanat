<?php
echo password_hash("1234", PASSWORD_DEFAULT);
// นำผลลัพธ์ที่ได้ไปใส่ใน table admin ช่อง a_password
echo $hashed_password ;
?>
	
