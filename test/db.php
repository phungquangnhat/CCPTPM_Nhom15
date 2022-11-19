<?php
$conn= mysqli_connect("localhost","root","","ql_fastfood");

if(!$conn){
	echo "Kết nối thất bại".mysqli_connect_error($conn);
}
?> 