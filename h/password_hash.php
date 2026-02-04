<?php

echo password_hash("4321", PASSWORD_DEFAULT);
// นำผลลัพธ์ที่ได้ไปใส่ใน table admin ช่อง a_password
echo $hashed_password ;
?>
	
