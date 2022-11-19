<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Thêm nhà cung cấp</title>
	<link rel="stylesheet" type="text/css" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
	<style>
    	/**/
    	.container{
    		position: absolute;
			left: 20%;
			width: 78.5%;
			height: 490px;
			background-color: #DCDCDC;
			border-radius: 5px;
			padding: 20px;
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
    		background-color: #32CD32;
    	}
    	.text-center{
    		text-align: center;
    	}
    	.form-group label{
    		padding: 10px 10px 10px 0;
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
	<form method="post">
		<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm nhà cung cấp</h2>
			</div>
			<div class="panel-body">
				<div class="form-group">
				  <label>Tên nhà cung cấp:</label>
				  <input  type="text" class="form-control" name="txttTenNcc" id="txttTenNcc" placeholder="Nhập tên nhà cung cấp">
				</div>
				<div class="form-group">
				  <label>Địa chỉ:</label>
				  <input type="text" class="form-control" name="txtDiaChi" id="txtDiaChi" placeholder="Nhập địa chỉ">
				</div>
				<div class="form-group">
				  <label>Số điện thoại:</label>
				  <input type="text" class="form-control" name="txtSdt" id="txtSdt" placeholder="Nhập số điện thoại">
				</div>
				<div class="form-group">
				<button class="btn btn-success" id="btsave" name="btsave"> <i class="fas fa-plus-circle"></i> Thêm</button>
			</div>
		</div> 
	</div>	
	</form>
</body>
</html>
<?php
	if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btsave']))
		{
			InsertData();
		}
		function InsertData()
		{
			$conn = mysqli_connect("localhost", "root", "", "ql_fastfood");
			if($conn == false)
			{
				die("Thất bại:". mysqli_connect_error($conn));
			}
		else
		{
			$tenNcc = $_POST['txttTenNcc'];
			$diaChi = $_POST['txtDiaChi'];
			$sdt = $_POST['txtSdt'];

			$query = "insert into nhacc values(null,'".$tenNcc."','".$diaChi."','".$sdt."')";
			$result = mysqli_query($conn, $query);
			if ($result == true) {
				echo "<script type = 'text/javascript'>".
				"alert('Thêm thành công!');".
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