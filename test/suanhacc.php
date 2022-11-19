<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sửa nhà cung cấp</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
	<style>
		#panel-body a{
			border-radius: 5px;
			border: solid 1px purple;
			padding: 5px 7px 10px 7px;
			background-color: purple;
			color: white;
		}
		.container{
    		position: absolute;
			left: 20%;
			width: 78.5%;
			height: 495px;
			background-color: #DCDCDC;
			border-radius: 5px;
			padding: 10px;
			margin: 80px 20px 10px 10px;
    	}
    	.panel-body button{
    		border: solid 1px green;
			border-radius: 5px;
			background-color: green;
			color: white;
			padding: 10px 10px 10px 10px;
    	}
    	.panel-body button:hover{
    		background-color: white;
    		color: black;
    		border: solid 1px black;
    	}
    	.text-center{
    		text-align: center;
    	}
    	.form-group label{
    		padding: 6px 6px 6px 0;
    		display: inline-block;
    	}
    	input[type=text]{
    		width: 100%;
    		border-radius: 4px;
    		padding: 10px;
    		border: 1px solid #ccc;
    	}
    	#txtSdt{
    		margin-bottom: 10px;
    	}
	</style>
</head>
<body>
	<?php
		require('sideBar.php');
	?>
	<?php
		$maNcc = $_GET['maNcc'];
		$tenNcc = "";
		$diaChi = "";
		$sdt = "";
		$conn = mysqli_connect('localhost', 'root', '', 'ql_fastfood');
		if($conn == false)
		{
			 echo "Kết nối thành công!".mysqli_connect_error($conn);
		}
		else{
			//xuất dữ liệu
			$query = "select * from nhacc where maNcc = '".$maNcc."'";
			$result = mysqli_query($conn, $query);
			if(mysqli_num_rows($result) > 0)
			{
				while($row = mysqli_fetch_assoc($result))
				{
					$tenNcc = $row["tenNcc"];
					$diaChi = $row["diaChincc"];
					$sdt = $row["sdtNcc"];
				}
			}
		}
		mysqli_close($conn);
	?>
		<form method="post">
		<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="text-center">Sửa Nhà Cung Cấp</h3>
			</div>
			<div class="panel-body">
				<div class="form-group">
				  <label>Mã nhà cung cấp:</label>
				  <input type="text" class="form-control" name="txtMaNcc" id="txtMaNcc" value="<?php echo $maNcc ?>" readonly = "true">
				</div>
				<div class="form-group">
				  <label>Tên nhà cung cấp:</label>
				  <input type="text" class="form-control" name="txtTenNcc" id="txtTenNcc" value="<?php echo isset($_POST['txtTenNcc'])? $_POST['txtTenNcc'] : $tenNcc ?>">
				</div>
				<div class="form-group">
				  <label>Địa chỉ:</label>
				  <input type="text" class="form-control" name="txtDiaChi" id="txtDiaChi" value = "<?php echo isset($_POST['txtDiaChi'])? $_POST['txtDiaChi'] : $diaChi ?>">
				</div>
				<div class="form-group">
				  <label>Số điện thoại:</label>
				  <input type="text" class="form-control" name="txtSdt" id="txtSdt" value = "<?php echo isset($_POST['txtSdt'])? $_POST['txtSdt'] : $sdt ?>">
				</div>
				<button class="btn btn-success" id="btsave" name="btsave"> <i class='fas fa-pen-square'></i> Sửa</button>
			</div>
		</div>
		</div>
	</form>
	<?php
	if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btsave']))
		{
			Getupdate();
		}
		function Getupdate()
		{
			$conn = mysqli_connect("localhost", "root", "", "ql_fastfood");
			if($conn == false)
			{
				die("Thất bại: ". mysqli_connect_error($conn));
			}
		else
		{
			$maNcc = $_POST['txtMaNcc'];
			$tenNcc = $_POST['txtTenNcc'];
			$diaChi = $_POST['txtDiaChi'];
			$sdt = $_POST['txtSdt'];
			$query = "update nhacc set tenNcc = '".$tenNcc."', diaChincc = '".$diaChi."', sdtNcc = '".$sdt."' where maNcc = '".$maNcc."'";
			$result = mysqli_query($conn, $query);
			if ($result == true) {
				echo "<script type = 'text/javascript'>".
				"alert('Sửa thành công!');".
				"window.location.href ='qlnhacc.php'".
				"</script>";
			}
			else
			{
				echo"Lỗi: ".mysqli_error($conn);
			}
			mysqli_close($conn);
		}
		}
	?>
</body>
</html>