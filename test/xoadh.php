<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href=".\divXoa.css">
	<title>
		Xóa đơn hàng
	</title>
</head>
<body>
	<?php
        require('sideBarr.php');
    ?>
		<?php
			$id = $_GET['id'];
			$conn1 = mysqli_connect("localhost", "root", "", "ql_fastfood");
			if($conn1 == false)
			{
				die("Kết nối thất bại!". mysqli_connect_error($conn1));
			}
			else
			{
				$query1 = "select * from chitietdathang  where DatHang_id = '".$id."'";
				//echo $query1;
				$result1 = mysqli_query($conn1, $query1);;
				//$row = mysqli_fetch_assoc($result1)
				if(mysqli_num_rows($result1) > 0) {
							echo '<script type="text/javascript">
    							alert("Không thể xóa!\nVui lòng xóa hết sản phẩm còn trong Hóa đơn này.");
    						</script>';

						
						echo '<div id="tblXoa">';
				    		$servername = "localhost";
					    	$username = "root";
					        $password = "";
					        $database = "ql_fastfood";
					        $conn = mysqli_connect($servername, $username, $password, $database);
					        if(!$conn)
					        {
					            echo "Kết nối không thành công!".mysqli_connect_error($conn);
					        }
					        else {
					            $query = "select * from chitietdathang where DatHang_id = '".$id."' order by DatHang_id";
					            $result = mysqli_query($conn, $query);      
					            if(mysqli_num_rows($result) > 0)
					            {
					                //tạo bảng
					                //tạo id cho table
					                echo "<table id ='tblXoa1'>";
					                echo "<thead>";
					                echo "<th>Mã</th><th>Mã đơn hàng</th><th>Sản phẩm</th><th>Giá</th><th>Số lượng</th><th>Tổng tiền</th>";
					                echo"<th>Thao tác</th>";
					                echo"</thead>";
					                echo "<tbody>";
					                while($row = mysqli_fetch_assoc($result))
					                {
					                    echo "<tr>";
					                    echo "<td>" . $row["id"] . "</td>";
					                    echo "<td>" . $row["DatHang_id"] . "</td>";
					                    echo "<td>" . $row["SanPham_id"] . "</td>";
					                    echo "<td>" . $row["gia"] ."</td>";
					                    echo "<td>" . $row["soLuong"] ."</td>";
					                    echo "<td>" . $row["tongTien"] ."</td>";
					                    echo "<td id = 'thaoTac'>" . "<a id ='aXoa' href = 'xoadhsp.php?id=".$row["id"]."&tongTien=".$row["tongTien"]."&DatHang_id=".$row["DatHang_id"]."'> <i class='fas fa-trash-alt'></i> Xóa</a>" . "</td>";
					                    echo"</tr>";

					                }
					                echo "</tbody></table>";
					            } 
					        }
					        mysqli_close($conn);
				    	
						echo '</div>';
							}
						else
						{
							$id1 = $_GET['id'];
							echo "tôi tìm thấy id ở đây ------------------------------------------------------------------------------".$id;
							$conn2 = mysqli_connect("localhost", "root", "", "ql_fastfood");
							if($conn2 == false)
							{
								die("Kết nối thất bại!". mysqli_connect_error($conn2));
							}
							else
							{
								$query2 = "update dathang set co = '1' where id = '".$id1."'";

								$result2 = mysqli_query($conn2, $query2);
								if ($result2 == true) {
									echo "<script type = 'text/javascript'>".
									"alert('Xóa thành công đơn hàng!');".
									"window.location.href ='index.php'".
									"</script>";
								}
								else
								{
									echo"Lỗi: ".mysqli_error($conn2);
								}
								mysqli_close($conn2);
							}
						}

				
				
				mysqli_close($conn1);
			}
		?>
		
    	<?php
    		// $DatHang_id = $_GET['DatHang_id'];
    		// $servername = "localhost";
	    	// $username = "root";
	     //    $password = "";
	     //    $database = "ql_fastfood";
	     //    $conn = mysqli_connect($servername, $username, $password, $database);
	     //    if(!$conn)
	     //    {
	     //        echo "Kết nối không thành công!".mysqli_connect_error($conn);
	     //    }
	     //    else {
	     //        $query = "select * from chitietdathang where DatHang_id = '".$DatHang_id."' order by DatHang_id";
	     //        $result = mysqli_query($conn, $query);      
	     //        if(mysqli_num_rows($result) > 0)
	     //        {
	     //            //tạo bảng
	     //            //tạo id cho table
	     //            echo "<table id ='tblHoaDon1'>";
	     //            echo "<thead>";
	     //            echo "<th>Mã</th><th>Mã đơn hàng</th><th>Sản phẩm</th><th>Giá</th><th>Số lượng</th><th>Tổng tiền</th>";
	     //            echo"<th>Thao tác</th>";
	     //            echo"</thead>";
	     //            echo "<tbody>";
	     //            while($row = mysqli_fetch_assoc($result))
	     //            {
	     //                echo "<tr>";
	     //                echo "<td>" . $row["id"] . "</td>";
	     //                echo "<td>" . $row["DatHang_id"] . "</td>";
	     //                echo "<td>" . $row["SanPham_id"] . "</td>";
	     //                echo "<td>" . $row["gia"] ."</td>";
	     //                echo "<td>" . $row["soLuong"] ."</td>";
	     //                echo "<td>" . $row["tongTien"] ."</td>";
	     //                echo "<td id = 'thaoTac'>" . "<a id = 'aSua' href='suacthd.php?id=".$row["id"]."'> <i class='fas fa-pen-square'></i> Sửa</a>" . " " . "<a id ='aXoa' href = 'xoactdh.php?id=".$row["id"]."&tongTien=".$row["tongTien"]."&DatHang_id=".$row["DatHang_id"]."'> <i class='fas fa-trash-alt'></i> Xóa</a>" . "</td>";
	     //                echo"</tr>";

	     //            }
	     //            echo "</tbody></table>";
	     //        } 
	     //    }
	     //    mysqli_close($conn);
    	?>
    	
</body>
</html>