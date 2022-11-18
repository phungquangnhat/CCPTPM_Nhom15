<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		Trang Quản Lý
	</title>
	<link rel="stylesheet" type="text/css" href=".\hoaDonCss2.css">
</head>

<body id="body1">
    <div id="divTong">
    <?php
        require('index.php');
    ?>
    </div>
	<div id = "div1" >
        <?php
            $timKiem = "";
        ?>
        <h3 id = 'h3DatHang'>ĐẶT HÀNG</h3>
        <form id = 'formTimKiem' method="post">
            <input type="text" id="txtTimKiem" placeholder="Tìm kiếm...." name="txtid" value="<?php echo isset($_POST['txtid'])? $_POST['txtid'] : $timKiem ?>">
            <button type="submit" id="bttimkiem" name="bttimkiem"> <i class="fas fa-search"></i> Search</button>
            <br>
            <br>
        </form>
        <div id="divThemMoi">
            <a href="" id="aThemMoi"> <i class="fas fa-plus-circle"></i> Thêm mới</a>
        </div>
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
            //and trangThai = '1'
            $query = "select * from dathang where co = '0'  order by id asc";
            $result = mysqli_query($conn, $query);      
            if(mysqli_num_rows($result) > 0)
            {
                //tạo bảng
                //tạo id cho table
                echo "<table id ='tblHoaDon'>";
                echo "<thead>";
                echo "<th>Mã đơn hàng</th><th>Họ Tên</th><th>Số Điện Thoại</th><th>Địa Chỉ</th><th>Ghi Chú</th><th>Ngày Đặt</th>
                <th>Trạng Thái</th><th>Tổng Tiền</th>";
                echo"<th>Thao tác</th>";
                echo"</thead>";
                echo "<tbody>";
                while($row = mysqli_fetch_assoc($result))
                {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["hoTen"] . "</td>";
                    echo "<td>" . $row["sdt"] ."</td>";
                    echo "<td>" . $row["diaChi"] ."</td>";
                    echo "<td>" . $row["note"] ."</td>";
                    echo "<td>" . $row["ngayDat"] ."</td>";
                    echo "<td>" . $row["trangThai"] ."</td>";
                    echo "<td>" . $row["tongTien"] ."</td>";
                    if($row["trangThai"] == 0){
                        echo "<td id = 'thaoTac'>" . "<a id = 'aSua' href='?id=".$row["id"]."'> <i class='fas fa-pen-square'></i> Sửa</a>" . " " . "<a id ='aXoa' href = '?id=".$row["id"]."'> <i class='fas fa-trash-alt'></i> Xóa</a>" . "</td>";
                    }
                    else
                    {
                        echo "<td id = 'thaoTac'>" . "<a id = 'aSua' href=''> <i class='fas fa-pen-square'></i> Sửa</a>" . " " . "<a id ='aXoa' href = ''> <i class='fas fa-trash-alt'></i> Xóa</a>" . "</td>";
                        //echo "<td id = 'thaoTac'>"."Đơn hàng đã hoàn thành"."</td>";
                    }
                    echo"</tr>";

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
                echo"<script type='text/javascript'>var main = document.getElementById('tblHoaDon');main.innerHTML = ''; main.remove();</script>";
                $conn = mysqli_connect("localhost", "root", "", "ql_fastfood");
            if(!$conn)
            {
                echo "Kết nối không thành công!".mysqli_connect_error($conn);
            }
            else{
                //xuất dữ liệu
                $query = "select * from dathang where (id like N'%".$Search."%' or hoTen like N'%".$Search."%'or sdt like N'%".$Search."%') and co = '0'";
                $result = mysqli_query($conn, $query);
                if(mysqli_num_rows($result)>0)
                {
                    //tạo bảng
                    echo "<table id = 'tblHoaDon'>";
                    echo "<thead>";
                    echo "<th>Mã đơn hàng</th><th>Họ Tên</th><th>Số Điện Thoại</th><th>Địa Chỉ</th><th>Ghi Chú</th><th>Ngày Đặt</th>
                    <th>Trạng Thái</th><th>Tổng Tiền</th>";
                    echo"<th>Thao tác</th>";
                    echo"</thead>";
                    echo "<tbody>";
                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["hoTen"] . "</td>";
                            echo "<td>" . $row["sdt"] ."</td>";
                            echo "<td>" . $row["diaChi"] ."</td>";
                            echo "<td>" . $row["note"] ."</td>";
                            echo "<td>" . $row["ngayDat"] ."</td>";
                            echo "<td>" . $row["trangThai"] ."</td>";
                            echo "<td>" . $row["tongTien"] ."</td>";
                            echo "<td id = 'thaoTac'>" . "<a id = 'aSua' href='?id=".$row["id"]."'> <i class='fas fa-pen-square'></i> Sửa</a>" . " " . "<a id ='aXoa' href = '?Masp=".$row["id"]."'> <i class='fas fa-trash-alt'></i> Xóa</a>" . "</td>";
                        echo"</tr>";
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