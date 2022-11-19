<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sửa chi tiết đơn hàng</title>
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
    	#hinhanh{
    		margin-bottom: 10px;
    	}
	</style>
</head>
<body>
	<?php
		require('index.php');
	?>
	<?php
		$id = $_GET['id'];
		$DatHang_id  = "";
		$SanPham_id  = "";
		$gia = "";
		$soLuong = "";
		$tongTien = "";
		$conn = mysqli_connect('localhost', 'root', '', 'ql_fastfood');
		if($conn == false)
		{
			 echo "Kết nối thành công!".mysqli_connect_error($conn);
		}
		else{
			//xuất dữ liệu
			$query = "select * from chitietdathang where id = '".$id."'";
			$result = mysqli_query($conn, $query);
			if(mysqli_num_rows($result) > 0)
			{
				while($row = mysqli_fetch_assoc($result))
				{
					$id = $row["id"];
					$DatHang_id = $row["DatHang_id"];
					$SanPham_id = $row["SanPham_id"];
					$gia = $row["gia"];
					$soLuong = $row["soLuong"];
					$tongTien = $row["tongTien"];
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
				  <label>Mã:</label>
				  <input type="text" class="form-control" name="txtMa" id="txtMa" value="<?php echo $id ?>" readonly = "true">
				</div>
				<div class="form-group">
				  <label>Mã đơn hàng:</label>
				  <input type="text" class="form-control" name="txtMdh" id="txtMdh" value="<?php echo $DatHang_id ?>" readonly = "true">
				</div>
				<div class="form-group">
				  <label>Mã sản phẩm:</label>
				  <input type="text" class="form-control" name="txtSp" id="txtSp" value = "<?php echo isset($_POST['txtSp'])? $_POST['txtSp'] : $SanPham_id ?>">
				</div>
				<div class="form-group">
				  <label>Giá:</label>
				  <input type="text" class="form-control" name="txtGia" id="txtGia" value = "<?php echo isset($_POST['txtGia'])? $_POST['txtGia'] : $gia ?>">
				</div>
				<div class="form-group">
				  <label>Số lượng:</label>
				  <input type="text" class="form-control" name="txtSoLuong" id="txtSoLuong" value = "<?php echo isset($_POST['txtSoLuong'])? $_POST['txtSoLuong'] : $soLuong ?>">
				</div>
				<div class="form-group">
				  <label>Tổng tiền:</label>
				  <input type="text" class="form-control" name="txtTongTien" id="txtTongTien" value = "<?php echo isset($_POST['txtTongTien'])? $_POST['txtTongTien'] : $tongTien ?>">
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
			$id  = $_POST['txtMa'];
			$DatHang_id  = $_POST['txtMdh'];
			$SanPham_id  = $_POST['txtSp'];
			$gia = $_POST['txtGia'];
			$soLuong = $_POST['txtSoLuong'];
			$tongTien = $_POST['txtTongTien'];
			$query = "update chitietdathang set DatHang_id = '".$DatHang_id."', SanPham_id = '".$SanPham_id."', gia = '".$gia."', soLuong = '".$soLuong."', tongTien = '".$tongTien."' where id = '".$id."'";
			$result = mysqli_query($conn, $query);
			if ($result == true) {
				echo "<script type = 'text/javascript'>".
				"alert('Sửa thành công!');".
				"window.location.href ='themDonDatHang.php'".
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