<?php

$host 		= 'localhost' ; // الهوست
$username 	= 'root' ; 		// اسم مستخد الهوست
$password   = ''; // كلمة مرور 
$db_name    = 'model' ; // اسم قاعدة البيانات

$conn = mysqli_connect( 'localhost' , $username , $password , $db_name );


if (!$conn) {
	echo mysqli_connect_error("خطأ فى الإتصال بقاعدة البيانات") . mysqli_errno();
}

function close_db(){
	global $conn;
	mysqli_close($conn);
}
