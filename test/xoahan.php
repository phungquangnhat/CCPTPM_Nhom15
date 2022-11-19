<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Xóa đơn hàng</title>
</head>
<body>
	<?php
		$id = $_GET['id'];
		$conn = mysqli_connect("localhost", "root", "", "ql_fastfood");
		if($conn == false)
		{
			die("Kết nối thất bại!". mysqli_connect_error($conn));
		}
		else
		{
			$query = "update dathang set co = '1' where id = '".$id."'";

			$result = mysqli_query($conn, $query);
			if ($result == true) {
				echo "<script type = 'text/javascript'>".
				"alert('Xóa thành công!');".
				"window.location.href ='index.php'".
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