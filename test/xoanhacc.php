<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Xóa nhà cung cấp</title>
</head>
<body>
	<?php
		$maNcc = $_GET['maNcc'];
		$conn = mysqli_connect("localhost", "root", "", "ql_fastfood");
		if($conn == false)
		{
			die("Kết nối thất bại!". mysqli_connect_error($conn));
		}
		else
		{
			$query = "delete from nhacc where maNcc = '".$maNcc."'";

			$result = mysqli_query($conn, $query);
			if ($result == true) {
				echo "<script type = 'text/javascript'>".
				"alert('Xóa thành công!');".
				"window.location.href ='qlnhacc.php'".
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