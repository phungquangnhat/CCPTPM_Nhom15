<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		Sửa đơn hàng
	</title>
	<link rel="stylesheet" type="text/css" href=".\HoaDonCss.css">	
</head>
<body>
	<?php
        require('index.php');
    ?>
    <?php
    	$id = $_GET['id'];
		$hoTen  = "";
		$sdt  = "";
		$diaChi = "";
		$note = "";
		$ngayDat = "";
		$trangThai = "";
		$conn = mysqli_connect('localhost', 'root', '', 'ql_fastfood');
		if($conn == false)
		{
			 echo "Kết nối thành công!".mysqli_connect_error($conn);
		}
		else{
			//xuất dữ liệu
			$query = "select * from dathang where id = '".$id."'";
			$result = mysqli_query($conn, $query);
			if(mysqli_num_rows($result) > 0)
			{
				while($row = mysqli_fetch_assoc($result))
				{
					$id = $row["id"];
					$hoTen = $row["hoTen"];
					$sdt = $row["sdt"];
					$diaChi = $row["diaChi"];
					$note = $row["note"];
					$ngayDat = $row["ngayDat"];
					$trangThai = $row["trangThai"];
				}
			}
		}
		mysqli_close($conn);
    ?>
    <form method="post">
	<div id="themDon">
			<div >
				<h2 id="h2ThemDon">Sửa đơn đặt hàng </h2>
			</div>
			<div id="themDonCon">
				<div id="divGroup">
				  <label>Mã đơn đặt hàng:<i id="iGroup">*</i></label>
				  <input type="text" class="form-control" name="txtMaDonHang" id="txtMaDonHang" value="<?php echo $id ?>" readonly = "true">
				</div>
				<div id="divGroup">
				  <label>Họ tên khách hàng:<i id="iGroup">*</i></label>
				  <input type="text" class="form-control" name="txtHoTen" id="txtHoTen" value = "<?php echo isset($_POST['txtHoTen'])? $_POST['txtHoTen'] : $hoTen ?>">
				</div>
				<div id="divGroup">
				  <label>Số điện thoại:<i id="iGroup">*</i></label>
				  <input type="text" class="form-control" name="txtSDT" id="txtSDT" placeholder="Nhập số điện thoại" value="<?php echo isset($_POST['txtSDT'])? $_POST['txtSDT'] : $sdt ?>" onfocusout="kiemTraSDT()">
				</div>
				<script type="text/javascript">
					function kiemTraSDT(){
						//khớp chuỗi số, bắt đầu là số 0, tiếp sau đó là 1 trong các số 2, 3 hoặc 4, sau đó là 8 số bất kỳ để đủ 10 số. Hoặc khớp số tổng đài có 8 chữ số bắt đầu là 1800/1900.
					  var regExp = /^(0[234][0-9]{8}|1[89]00[0-9]{4})$/;
					  var phone = document.getElementById("txtSDT").value;
					  if (regExp.test(phone)) 
					      {

					      }
					    else {
					        alert('SĐT không hợp lệ!');
					        document.getElementById('txtSDT').value = null;
					        return false;
					    }
					}
				</script>
				<div id="divGroup">
				  <label>Địa chỉ:<i id="iGroup">*</i></label>
				  <input type="text" class="form-control" name="txtDiaChi" id="txtDiaChi" placeholder="Địa chỉ giao hàng (Không ship ngoại tỉnh)" value="<?php echo isset($_POST['txtDiaChi'])? $_POST['txtDiaChi'] : $diaChi ?>">
				</div>
				<div id="divGroup">
				  <label>Ghi chú:</label>
				  <input type="text" class="form-control" name="txtGhiChu" id="txtGhiChu" placeholder="Nhập thông tin" value="<?php echo isset($_POST['txtGhiChu'])? $_POST['txtGhiChu'] : $note ?>">
				</div>
				<div id="divGroup">
				  <label>Ngày đặt:<i id="iGroup">*</i></label>
				  <!-- <input type="date" class="form-control" name="ngayDat" id="ngayDat"> -->
				  <?php
				  	$datetime = time();
				  	echo '<input type="text" class="form-control" name="ngayDat" id="ngayDat" placeholder="Nhập thông tin" value="'.date("Y/m/d h:i:s", $datetime).'">';
				  ?>
				  <!-- <input type="text" class="form-control" name="ngayDat" id="ngayDat" placeholder="Nhập thông tin" value=""> -->
				</div>
				<div id="divGroup">
				  <label>Trạng thái:<i id="iGroup">*</i></label>
				  <input type="radio" name="trangThai" value="1" id="trangThai1"> Đã giao hàng <br>
				  <p id="pTrangThai">
				  	<input type="radio" name="trangThai" value="0" checked id="trangThai0"> Chưa giao hàng
				  </p> 
				</div>
				<div id="divGroup">
				  <!-- <label>Tổng tiền:</label>
				  <input type="text" class="form-control" name="txtTongTien1" id="txtTongTien1" readonly = "true"> -->

				  <p>
				  	<i>
				  		(
				  		<i id="iGroup">
				  			* 
				  		</i>
				  		)
				  		Mục bắt buộc điền
				  	</i>
				  </p>
				</div>
				<button type="submit" class="btn btn-success" id="btthem" name="btthem"> <i class="fas fa-plus-circle"></i> Lưu</button>
				<button type="submit" id="btThem" name="btThem">Chọn</button>
				<a href="DonHang.php"> <i class="fas fa-undo"></i> Quay lại</a>	
					
			</div>
		</div> 
		</form>
	<?php
		if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btThem']))
		{
			InsertDatHang();
		}
			function InsertDatHang()
			{
				$servername = "localhost";
    			$username = "root";
       			$password = "";
        		$database = "ql_fastfood";
       			$conn = mysqli_connect($servername, $username, $password, $database);
				if($conn == false)
				{
					die("Thất bại:". mysqli_connect_error($conn));
				}
			else
			{
			$id = $_POST['txtMaDonHang'];
			$hoTen = $_POST['txtHoTen'];
			$sdt = $_POST['txtSDT'];
			$diaChi = $_POST['txtDiaChi'];
			$ghiChu = $_POST['txtGhiChu'];
			$ngayDat = $_POST['ngayDat'];
			if(isset ($_POST["trangThai"])){
					$trangThai=$_POST["trangThai"];
				}
				else {
                    $trangThai=false;
                }
			$query = "update dathang set hoTen = '".$hoTen."', sdt = '".$sdt."', diaChi = '".$diaChi."', note = '".$ghiChu."', ngayDat = '".$ngayDat."', trangThai = '".$trangThai."' where id = '".$id."'";
			echo $query;
			$result = mysqli_query($conn, $query);
			if ($result == true) {
				//echo "Thêm mới dữ liệu thành công!";
				echo 	'<script type="text/javascript">
							alert("Sửa đơn hàng thành công!");
						</script>';

			}
			else
			{
				echo"Lỗi: ".mysqli_error($conn);
			}
			mysqli_close($conn);
			}
		} 
	?>
	
	<div id="chiTietDon">
			<div >
				<h2 id="h2ThemDon">Chi Tiết Đơn Hàng</h2>
			</div>
			<form method="post">
			<div id="chiTietCon">
				<form method="POST">
				<div id="divGroup">
				  <label>Mã đơn đặt hàng:<i id="iGroup">*</i></label>
				  <?php
				  	echo '<input  type="text" class="form-control" name="txtMdh" id="txtMdh" value = "'.$id.'">';
				  ?>
				</div>
				<div id="divGroup">
				  <label>Sản phẩm:<i id="iGroup">*</i></label>
				  <button type="submit" id="btChon" name="btChon">Chọn</button>
				  

				  <?php
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
							$query = "select * from qlsanpham order by masp";
							$result = mysqli_query($conn, $query);
							if(mysqli_num_rows($result) > 0)
							{	
								echo "<select name='selectMasp'>";			
								while($row = mysqli_fetch_assoc($result))
								{
									echo "<option  name = 'sanPham' id = 'sanPham' value="."'".$row["masp"]."'".">".$row["tensp"]."</option>";   
									//  $gia1 = $row["gia"];
									// echo ($gia1);
								}

				      			echo "</select>";   

							}
						
			
						}
						mysqli_close($conn);
				  ?>

				</div>
				</form>
				
				<div id="divGroup">
				  <label>Giá:<i id="iGroup">*</i></label>
				  
				  <?php
				  		//khai báo cái này ở đây tránh lỗi khi chưa nhấn nút chọn tức là sp đang null
				  		$sp = "1";
				  		if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btChon']))
						{
							if(isset($_POST["selectMasp"])){
								$sp = $_POST["selectMasp"];
							}
							else {
				    			$sp = false;
				     		} 
				     		
						}
				  		$servername = "localhost";
						$username = "root";
						$password = "";
						$database = "ql_fastfood";
						$conn = mysqli_connect($servername, $username, $password, $database);
						if(!$conn)
						{
							echo "Kết nối thất bại.".mysqli_connect_error($conn);
						}
						else {
							$query = "select gia from qlsanpham where masp ='".$sp."'";
							$result = mysqli_query($conn, $query);
							if(mysqli_num_rows($result) > 0)
							{	
								while ($row = mysqli_fetch_assoc($result)) {
									
									$gia = $row["gia"];
									echo "<input readonly = 'true' type='text' class='form-control' name='txtGia' id='txtGia' placeholder='Giá' value='".$gia."'>";
								}
								
							}
							
			
						}
						mysqli_close($conn);

				  ?>

				</div>
				<div id="divGroup">
				  <label>Mã sản phẩm:<i id="iGroup">*</i></label>
				  <?php
				  	echo '<input  type="text" class="form-control" name="txtSp" id="txtSp" value = "'.$sp.'">';
				  ?>
				</div>

				<!-- <form name="form1" onsubmit="return so()"> -->
				<div id="divGroup">
				  <label>Số lượng:<i id="iGroup">*</i></label>
				  <input type="text" class="form-control" name="txtSoLuong" id="txtSoLuong" 
				  placeholder="Số lượng" value="" onfocusout="kiemTraSoLuong()" onkeyup="tongTien(1)" >
				  <!-- <input type="submit" value="submit"> -->
				</div>
				<script type="text/javascript">
					function kiemTraSoLuong() {
						var regExp = /^([0-9])$/;
						var num = document.getElementById("txtSoLuong").value;
						if (Number.isFinite(parseInt(num)) == true) {
							
						} else {
							alert("Số lượng chỉ nhập số!");
							//num.value = 'trống';
							document.getElementById('txtSoLuong').value = null;
							return false;
						}
						if(parseInt(num) == 0)
						{
							alert("Số lượng phải lớn hơn 0!");
							//soLuong.value = document.write(soLuong.replaceAll(0,''));
							document.getElementById('txtSoLuong').value = null;
							return false;
						}
					}
				</script>
				<!-- </form> -->
				<div id="divGroup">
				  <label>Tổng tiền:</label>
				  <input type="text" class="form-control" name="txtTongTien" id="txtTongTien" readonly = "true" >

				  <p>
				  	<i>
				  		(
				  		<i id="iGroup">
				  			* 
				  		</i>
				  		)
				  		Mục bắt buộc điền
				  	</i>
				  </p>
				</div>
				<script type="text/javascript">
					function tongTien(){

						var gia = document.getElementById('txtGia').value;
						var soLuong = document.getElementById('txtSoLuong').value;
						var tong = document.getElementById('txtTongTien');
						// if(parseInt(soLuong) == 0)
						// {
						// 	alert("Số lượng phải lớn hơn 0!");
						// 	//soLuong.value = document.write(soLuong.replaceAll(0,''));
						// 	document.getElementById('txtSoLuong').value = null;
						// 	return false;
						// }
						if(soLuong != "")
							tong.value = parseInt(gia) * parseInt(soLuong);
						else
							tong.value = 0;
					}
				</script>
				<button class="btn btn-success" id="btsave1" name="btsave1"> <i class="fas fa-plus-circle"></i> Thêm</button>
				
			</div>
			</form>
			<?php
		if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btsave1']))
		{

			InsertChiTietDatHang();
			TongTien();
		}
			function TongTien()
			{
				$servername = "localhost";
    			$username = "root";
       			$password = "";
        		$database = "ql_fastfood";
       			$conn = mysqli_connect($servername, $username, $password, $database);
				if($conn == false)
				{
					die("Thất bại:". mysqli_connect_error($conn));
				}
				else{
					$mdh = $_POST['txtMdh'];
					$query = "select sum(tongTien) as tongtien from chitietdathang where DatHang_id = '".$mdh."'";
            			$result = mysqli_query($conn, $query);   
            			while($row = mysqli_fetch_assoc($result))
                		{
            			$tongtien = $row["tongtien"];
            			//echo $tongtien;
            			// echo "<input  type='text' class='form-control' name='txtMaDonHang' id='txtMaDonHang' 
            			// readonly = 'true' value ='".$tong."'>";
	            		}
				}
				mysqli_close($conn);

				$servername1 = "localhost";
    			$username1 = "root";
       			$password1 = "";
        		$database1 = "ql_fastfood";
       			$conn1 = mysqli_connect($servername1, $username1, $password1, $database1);
				if($conn1 == false)
				{
					die("Thất bại:". mysqli_connect_error($conn1));
				}
				else{
					$mdh = $_POST['txtMdh'];
					$query1 = "update dathang set tongTien = '".$tongtien."' where id = '".$mdh."'";
            			$result1 = mysqli_query($conn1, $query1);   
            			if ($result1 == true) {
						
						}
						else
						{
							echo"Lỗi: ".mysqli_error($conn1);
						}
					mysqli_close($conn1);
					}
			}
			function InsertChiTietDatHang()
			{
				$servername = "localhost";
    			$username = "root";
       			$password = "";
        		$database = "ql_fastfood";
       			$conn = mysqli_connect($servername, $username, $password, $database);
				if($conn == false)
				{
					die("Thất bại:". mysqli_connect_error($conn));
				}
			else
			{
			$mdh = $_POST['txtMdh'];
			$msp = $_POST['txtSp'];
			$gia = $_POST['txtGia'];
			$soLuong = $_POST['txtSoLuong'];
			$tongTien = $_POST['txtTongTien'];
			$query = "insert into chitietdathang(DatHang_id, SanPham_id , gia, soLuong, tongTien) 
			values('".$mdh."','".$msp."','".$gia."','".$soLuong."','".$tongTien."')";
			//echo $query;
			$result = mysqli_query($conn, $query);
			if ($result == true) {
				 //echo "Thêm mới dữ liệu thành công!";
				 echo 	'<script type="text/javascript">
				 			alert("Thêm đơn hàng thành công!");
				 		</script>';

			}
			else
			{
				echo"Lỗi: ".mysqli_error($conn);
			}
			mysqli_close($conn);
			}
		} 
	?>
	</div>
	
	
	<div id="tblChiTiet">
    	<?php
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
	                echo "<table id ='tblHoaDon1'>";
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
	                    echo "<td id = 'thaoTac'>" . "<a id = 'aSua' href='suacthd.php?id=".$row["id"]."'> <i class='fas fa-pen-square'></i> Sửa</a>" . " " . "<a id ='aXoa' href = 'xoacthdsua.php?id=".$row["id"]."&tongTien=".$row["tongTien"]."&DatHang_id=".$row["DatHang_id"]."'> <i class='fas fa-trash-alt'></i> Xóa</a>" . "</td>";
	                    echo"</tr>";

	                }
	                echo "</tbody></table>";
	            } 
	        }
	        mysqli_close($conn);
    	?>
	</div>
	


</body>
</html>

