<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <title>Trang Quản Lý</title>
    <style type="text/css">
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        text-decoration: none;
        list-style: none;
    }
    #sideBar{
        left: 0px;
        position: fixed;
        overflow: hidden;
        height: 100%;
        width: 20%;
        background-color: #042331;
        margin-top: 60px;
        z-index: 7;
    }
    .footer{
        width: 78%;
        height: 100%;
        margin: 80px 20px 0;
        float: right;
        background-color: black;
    }
    #sideBar ul a{
        display: block;
        text-decoration: none;
        height: 100%;
        width: 100%;
        line-height: 50px;
        font-size: 15px;
        color: white;
        padding-left: 40px;
        transition: .4s;
    }
    #sideBar ul li:hover a{
        padding-left: 50px;
    }
    #sideBar ul a i{
        margin-right: 16px;
    }
    .Bar{
        width: 100%;
        height: 60px;
        background-color: #0077b3;
        float: left;
        position: fixed;
        z-index: 7;
    }
    .Bar-left{
        width: 20%;
        background-color: #4682B4;
        height: 60px;
        color: white;
        text-align: center;
        font-size: 20px;
        font-weight: 700;
        padding: 20px;
    }
    .Wrap{
        width: 100%;
        height: auto;
    }
    </style>
</head>
<body>
    <div class="Wrap">
        <div class="Bar">
            <div class="Bar-left">
                Quản trị hệ thống
            </div>
        </div>
        <div id="sideBar"> 
            <ul>
                <li > <a href="index.php"><i class="fal fa-home-lg-alt"></i>Trang chủ </a></li>
                <li><a href=""><i class="fas fa-file-alt"></i>Sản phẩm</a></li>
                <li><a href=""><i class="fad fa-clipboard-list"></i>Loại sản phẩm</a></li>
                <li><a href="DonHang.php"><i class="fal fa-truck"></i>Đơn hàng</a></li>
                <li><a href="qlnhacc.php"><i class="fas fa-file-invoice-dollar"></i>Nhà cung cấp </a></li>             
                <li><a href="index.html"><i class="fas fa-sign-out"></i>Đăng xuất</a></li>   
            </ul>
        </div> 
    </div>
    <div class="footer">
        
    </div>
</body>
</html>