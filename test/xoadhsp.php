<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Xóa chi tiết đơn hàng</title>
</head>
<body>
	<?php
		$id = $_GET['id'];
		$tongTien = $_GET['tongTien'];
		$DatHang_id = $_GET['DatHang_id'];
		$conn1 = mysqli_connect("localhost", "root", "", "ql_fastfood");
		if($conn1 == false)
		{
			die("Kết nối thất bại!". mysqli_connect_error($conn1));
		}
		else
		{
			$query1 = "update dathang set tongTien = (tongTien - '".$tongTien."')  where id = '".$DatHang_id."'";
			echo $query1;
			$result1 = mysqli_query($conn1, $query1);
			if ($result1 == true) {
				
			}
			else
			{
				echo"Lỗi: ".mysqli_error($conn1);
			}
			mysqli_close($conn1);
		}
	?>
	<?php
		$id = $_GET['id'];
		// $tongTien = $_GET['tongTien'];
		// $DatHang_id = $_GET['DatHang_id'];
		// $conn1 = mysqli_connect("localhost", "root", "", "ql_fastfood");
		// if($conn1 == false)
		// {
		// 	die("Kết nối thất bại!". mysqli_connect_error($conn1));
		// }
		// else
		// {
		// 	$query1 = "update dathang set tongTien = (tongTien - '".$tongTien."')  where id = '".$DatHang_id."'";
		// 	echo $query1;
		// 	$result1 = mysqli_query($conn1, $query1);
		// 	if ($result1 == true) {
				
		// 	}
		// 	else
		// 	{
		// 		echo"Lỗi: ".mysqli_error($conn1);
		// 	}
		//}

		$conn = mysqli_connect("localhost", "root", "", "ql_fastfood");
		if($conn == false)
		{
			die("Kết nối thất bại!". mysqli_connect_error($conn));
		}
		else
		{
			// $query1 = "update dathang set (tongTien = tongTien - '".$tongTien."')  where id = '".$DatHang_id."'";
			// $result1 = mysqli_query($conn, $query1);
			// if ($result1 == true) {
				
			// }
			// else
			// {
			// 	echo"Lỗi: ".mysqli_error($conn);
			// }

			$query = "delete from chitietdathang where id = '".$id."'";

			$result = mysqli_query($conn, $query);
			 if ($result == true) {
			// 	$conn1 = mysqli_connect("localhost", "root", "", "ql_fastfood");
			// 	if($conn1 == false)
			// 	{
			// 		die("Kết nối thất bại!". mysqli_connect_error($conn1));
			// 	}
			// 	else
			// 	{
			// 		$query1 = "update dathang set tongTien = (tongTien - '".$tongTien."')  where id = '".$DatHang_id."'";
			// 		echo $query1;
			// 		$result1 = mysqli_query($conn1, $query1);
			// 		if ($result1 == true) {
						
			// 		}
			// 		else
			// 		{
			// 			echo"Lỗi: ".mysqli_error($conn1);
			// 		}
			// 		mysqli_close($conn1);
			// 	}
				 echo "<script type = 'text/javascript'>".
				 "alert('Xóa thành công!');"
				 .
				 "window.location.href ='xoadh.php?id=".$DatHang_id."'".
				 "</script>";
			}
			else
			{
				echo"Lỗi: ".mysqli_error($conn);
			}
			mysqli_close($conn);

		}
	?>
</body>
</html>