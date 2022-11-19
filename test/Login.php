<?php include 'db.php';?>
<?php 
$username=$_POST['username'];
$password=$_POST['password'];
$sql="Select * from user where tentk='$username' and mk ='$password'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
	echo "<script type = 'text/javascript'>".
	"window.location.href ='index.php'".
	"</script>";
}
else{
	echo "<script type = 'text/javascript'>".
	"alert('Đăng nhập thất bại');".
	"window.location.href ='index.html'".
	"</script>";
}

?>
