<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
	<title> Quản lý loại sản phẩm</title>
		<style>
			table{
				border-collapse:collapse;
				width: 98%;
				background-color: white;
				margin: 20px 0px 30px 10px;
			}
			tr:hover{
				background-color:#ddd;
				cursor:pointer;
			}
			table, th, td{
				border: 1px solid #ccc;
			}

			th, td{
				text-align:center;
				padding:10px;
			}

			h3{
				text-align: center;
				margin-top: 15px;
				margin-bottom: -15px;
			}
			form{
				text-align: center;
			}		input{
				border-radius: 5px;
				margin: 4px 2px;
				width: 420px;
				height: 40px;
				font-size: 16pt;
				color: #63717f;
				padding-left: 30px;
				outline: none;
				border: 2px solid #ddd;
			}
	
			input:focus{
				border-color: skyblue;
				transition: 0.5s;
			}

			button{
				border: none;
				color: white;
				padding: 15px 15px 30px 15px;
				margin-top: 25px;
				height: 44px;
				text-align: center;
				text-decoration: none;
				font-size: 16px;
				cursor: pointer;
				background-color: #f44336;
				border-radius: 10px;
				transition: color 0.5s;
	        	background: 0.3s;
				cursor: pointer;
			}
			button:hover{
	        	color: black;
	        	background-color: #DCDCDC;
	        	border-radius: 10px;
	        	border: solid 1px #DCDCDC;
        	}
			img{
				max-width: 100px;
				max-height: 100px;
			}
			.a{
				border-radius: 8px;
				background-color: green;
				color: white;
				padding: 8px 8px 8px 8px;
				text-decoration: none;
				border: solid 1px green;
				margin-left: 8px;
			}
			.a1{
				border-radius: 8px;
				background-color: #00BFFF;
				padding: 5px 5px 5px 5px;
				text-decoration: none;
				border: solid 1px #00BFFF;
				color: white;
			}
			.a1:hover{
				background-color: #fff;
				border: solid 1px #fff;
				color: black;
			}
			.a2{
				border-radius: 8px;
				background-color: red;
				color: white;
				padding: 5px 5px 5px 5px;
				text-decoration: none;
				border: solid 1px red;
			}
			.a2:hover{
				background-color: #fff;
				border: solid 1px #fff;
				color: black;
			}
			#content{
				width: 77%;
        		height: auto;
        		margin-right: 1.5%;
        		float: right;
	            background-color: white;
	            border: solid 2px whitesmoke;
	            border-radius: 3px;
	        }
    		#hover a:hover{
    			background-color: #15AD1C;
    		}
    		html{
				background-color: #DCDCDC;
			}
			
	</style>
</head>
<body>
	<?php
		require('index.php');
	?>
	<div id="content">
	<?php
		$TenlSP = "";
	?>
	<h3>THÔNG TIN LOẠI SẢN PHẨM</h3>
	<form class="form" method="post">
		<input type="text" placeholder="Tìm kiếm...." name="txtid" value="<?php echo isset($_POST['txtid'])? $_POST['txtid'] : $TenlSP ?>">
		<button type="submit" id="bttimkiem" name="bttimkiem"> <i class="fas fa-search"></i> Search</button>
		<br>
		<br>
	</form>
	<div id="hover">
		<a href="themlsp.php" class="a"> <i class="fas fa-plus-circle"></i> Thêm mới</a>
	</div>
	<?php
		$conn = mysqli_connect("localhost", "root", "", "ql_fastfood");
		if(!$conn)
		{
			echo "Kết nối không thành công!".mysqli_connect_error($conn);
		}
		else{
			//xuất dữ liệu
			$query = "select * from loaisp";
			$result = mysqli_query($conn, $query);
			if(mysqli_num_rows($result)>0)
			{
				//tạo bảng
				echo "<table id ='tblMain'>";
					echo "<thead>";
						echo "<th>Mã loại sp</th><th>Tên loại sp</th>";
						echo"<th>Thao tác</th>";
					echo"</thead>";
					echo "<tbody>";
						while($row = mysqli_fetch_assoc($result))
						{
							echo "<tr>";
								echo "<td>" . $row["Malsp"] . "</td>";
								echo "<td>" . $row["tenlsp"] . "</td>";
								echo "<td>" ."<a class = 'a1' href='editlsp.php?Maloaisp=".$row["Malsp"]."'> <i class='fas fa-pen-square'></i> Sửa</a>" . " " . "<a class ='a2' href = 'deletelsp.php?Maloaisp=".$row["Malsp"]."'> <i class='fas fa-trash-alt'></i>Xóa</a>" . "</td>";
							echo "</tr>";
						}
					echo "</tbody></table>";
			}
			}
			mysqli_close($conn);
	?>
	<?php
		if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['bttimkiem']))
			{
				Search();
			}
			function Search()
			{

				$Search = $_POST['txtid'];
				//xóa bảng cũ
				echo"<script type='text/javascript'>var main = document.getElementById('tblMain');main.innerHTML = ''; main.remove();</script>";
				$conn = mysqli_connect("localhost", "root", "", "ql_fastfood");
		if(!$conn)
		{
			echo "Kết nối không thành công!".mysqli_connect_error($conn);
		}
		else{
			//xuất dữ liệu
			$query = "select * from loaisp where Malsp like N'%".$Search."%' or tenlsp like N'%".$Search."%'";
			$result = mysqli_query($conn, $query);
			if(mysqli_num_rows($result)>0)
			{
				//tạo bảng
				echo "<table>";
					echo "<thead>";
						echo "<th>Mã loại sp</th><th>Tên loại sp</th>";
						echo"<th>Thao tác</th>";
					echo"</thead>";
					echo "<tbody>";
						while($row = mysqli_fetch_assoc($result))
						{
							echo "<tr>";
								echo "<td>" . $row["Malsp"] . "</td>";
								echo "<td>" . $row["tenlsp"] . "</td>";
								echo "<td>" ."<a class='a1' href='editlsp.php?Maloaisp=".$row["Malsp"]."'> <i class='fas fa-pen-square'></i>Sửa</a>" . " " . "<a class='a2' href ='deletelsp.php?Maloaisp=".$row["Malsp"]."'> <i class='fas fa-trash-alt'></i>Xóa</a>" . "</td>";

							echo "</tr>";
						}
							echo "</tbody></table>";
						}
					}
					mysqli_close($conn);
				}
	?>
	</div>
</body>
</html>