<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
	<title>
		Quản lý sản phẩm
	</title>
	<style>
		/**/
		table{
			border-collapse:collapse;
			width: 98%;
			background-color: white;
			margin: 20px 0px 15px 10px;
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
			padding: 5px;
		}

		h3{
			text-align: center;
			margin-top: 15px;
			margin-bottom: -15px;
		}
		form{
			text-align: center;
		}
		input{
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
			margin-left: 8px ;
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
		.a2:hover{
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
		#content{
			width: 77%;
        	height: auto;
        	margin-right: 1.5%;
        	float: right;
	        background-color: white;
	        border: solid 2px whitesmoke;
	        border-radius: 3px;
        }
		.hover a:hover{
			background-color: #15AD1C;
		}
		html{
			background-color: #DCDCDC;
		}
		.pagination li a{
		  color: black;
		  float: left;
		  padding: 8px 16px;
		  display: inline-block;
		  margin: 10px 0px 15px 8px;
		  border: 1px solid #ddd; /* Gray */
		  border-radius: 5px;
		}
/*		.pagination li a.active{
		  background-color: #4CAF50;
		  color: white;
		}*/
		.pagination li a:hover {background-color: #ddd; color: white;}
		.pagination{
			margin-left: 40%;
		}
	</style>
</head>
<body>
	<?php
		require('index.php');
	?>
	<div id="content">
	<?php
		$TenSP = "";
	?>
	<h3>THÔNG TIN SẢN PHẨM</h3>
	<form class="form" method="post">
		<input type="text" placeholder="Tìm kiếm...." name="txtid" value="<?php echo isset($_POST['txtid'])? $_POST['txtid'] : $TenSP ?>">
		<button type="submit" id="bttimkiem" name="bttimkiem"> <i class="fas fa-search"></i> Search</button>
		<br>
		<br>
	</form>
	<div class="hover">
		<a href="themsp.php" class="a"> <i class="fas fa-plus-circle"></i> Thêm mới</a>
	</div>
	<?php
	$conn = mysqli_connect("localhost", "root", "", "ql_fastfood");
	    // BƯỚC 1: TÌM TỔNG SỐ RECORDS
        $result = mysqli_query($conn, 'select count(masp) as total from qlsanpham');
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total'];
 
        // BƯỚC 2: TÌM LIMIT VÀ CURRENT_PAGE
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 3;
 
        // BƯỚC 3: TÍNH TOÁN TOTAL_PAGE VÀ START
        // tổng số trang
        $total_page = ceil($total_records / $limit);
 
        //Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
 
        // Tìm Start
        $start = ($current_page - 1) * $limit;
		if(!$conn)
		{
			echo "Kết nối không thành công!".mysqli_connect_error($conn);
		}
		else{
			//xuất dữ liệu
			$query = "select * from qlsanpham LIMIT $start, $limit";
			$result = mysqli_query($conn, $query);
			if(mysqli_num_rows($result)>0)
			{
				//tạo bảng
				echo "<table id ='tblMain'>";
					echo "<thead>";
						echo "<th>Mã sp</th><th>Mã loại sp</th><th>Tên sp</th><th>Giá</th><th>Mô tả</th><th>hình ảnh</th>";
						echo"<th>Thao tác</th>";
					echo"</thead>";
					echo "<tbody>";
						while($row = mysqli_fetch_assoc($result))
						{
							echo "<tr>";
								echo "<td>" . $row["masp"] . "</td>";
								echo "<td>" . $row["malsp"] . "</td>";
								echo "<td>" . $row["tensp"] ."</td>";
								echo "<td>" . $row["gia"] . "</td>";
								echo "<td>" . $row["mota"] . "</td>";
								echo "<td><img src = '".$row["hinhanh"]."'></td>";
								echo "<td>" . "<a class = 'a1' href='editsp.php?Masp=".$row["masp"]."'> <i class='fas fa-pen-square'></i> Sửa</a>" . " " . "<a class ='a2' href = 'deletesp.php?Masp=".$row["masp"]."'> <i class='fas fa-trash-alt'></i> Xóa</a>" . "</td>";
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
				
		    	// BƯỚC 1: TÌM TỔNG SỐ RECORDS
		        $result = mysqli_query($conn, 'select count(masp) as total from qlsanpham');
		        $row = mysqli_fetch_assoc($result);
		        $total_records = $row['total'];
		 
		        // BƯỚC 2: TÌM LIMIT VÀ CURRENT_PAGE
		        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
		        $limit = 3;
		 
		        // BƯỚC 3: TÍNH TOÁN TOTAL_PAGE VÀ START
		        // tổng số trang
		        $total_page = ceil($total_records / $limit);
		 
		        // Giới hạn current_page trong khoảng 1 đến total_page
		        if ($current_page > $total_page){
		            $current_page = $total_page;
		        }
		        else if ($current_page < 1){
		            $current_page = 1;
		        }
		 
		        // Tìm Start
		        $start = ($current_page - 1) * $limit;
			if(!$conn)
			{
				echo "Kết nối không thành công!".mysqli_connect_error($conn);
			}
			else{
				//xuất dữ liệu
				$query = "select * from qlsanpham where masp like N'%".$Search."%' or tensp like N'%".$Search."%' limit $start, $limit";
				$result = mysqli_query($conn, $query);
				if(mysqli_num_rows($result)>0)
				{
					//tạo bảng
					echo "<table>";
					echo "<thead>";
						echo "<th>Mã sp</th><th>Mã loại sp</th><th>Tên sp</th><th>Giá</th><th>Mô tả</th><th>hình ảnh</th>";
						echo"<th>Thao tác</th>";
					echo"</thead>";
					echo "<tbody>";
					while($row = mysqli_fetch_assoc($result))
					{
							echo "<tr>";
								echo "<td>" . $row["masp"] . "</td>";
								echo "<td>" . $row["malsp"] . "</td>";
								echo "<td>" . $row["tensp"] ."</td>";
								echo "<td>" . $row["gia"] . "</td>";
								echo "<td>" . $row["mota"] . "</td>";
								echo "<td><img src = '".$row["hinhanh"]."'></td>";
								
								echo "<td>" ."<a class='a1' href='editsp.php?Masp=".$row["masp"]."'>  <i class='fas fa-pen-square'></i>Sửa</a>" . " " . "<a class='a2' href ='deletesp.php?Masp=".$row["masp"]."'><i class='fas fa-trash-alt'></i>Xóa</a>" . "</td>";

							echo "</tr>";
					}
							echo "</tbody></table>";
				}
			}
				mysqli_close($conn);
			}
			echo '<div class="pagination">';
			// PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút <<
            if ($current_page > 1 && $total_page > 1){
                echo '<li><a href="qlsp.php?page='.($current_page-1).'">&laquo;</a></li>';
            }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
            	// Nếu là trang hiện tại thì hiển thị 
                // ngược lại hiển thị trang tiếp theo
                if ($i == $current_page){
                    echo '<li><a style = "background-color: #0077b3" href="qlsp.php?page">'.$i.'</a></li>';
                }
                else{
                    echo '<li><a style = "background-color: none" href="qlsp.php?page='.$i.'">'.$i.'</a></li>';
                }
            }
            //total_page > 1 mới hiển thị nút >>
            if ($current_page < $total_page && $total_page > 1){
                echo '<li><a href="qlsp.php?page='.($current_page+1).'">&raquo;</a></li>';
            }
            echo '</div>';
?>
	</div> 
</body>
</html>