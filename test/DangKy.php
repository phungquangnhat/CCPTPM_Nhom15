<?php
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['DangKy']))
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
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $retypepassword = $_POST['retypepassword'];
        if($password!=$retypepassword){
            echo "<script type = 'text/javascript'>".
           "alert('Nhập lại password không chính xác');".
           "window.location.href ='DangKy.html'".
           "</script>";
        }

        $sql = "insert into user (tentk,mk) values ('".$username."','".$password."')";


        $result = mysqli_query($conn, $sql);
       if ($result == true) {
           echo "<script type = 'text/javascript'>".
           "alert('Đăng ký thành công');".
           "window.location.href ='index.html'".
           "</script>";
       }
       else
       {
        echo "<script type = 'text/javascript'>".
        "alert('Đăng ký thất bại');".
        "window.location.href ='DangKy.html'".
        "</script>";
    }
    mysqli_close($conn);
}
}
?>