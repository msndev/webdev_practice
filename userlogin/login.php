<html>
<?php
include('db.php');


session_start();	
if(isset($_POST['user'])){
$name = $_POST['user'];
$password = md5($_POST['password']);
$s = "select * from usertable where name = '$name' && password = '$password'";
$result = mysqli_query($con, $s);
$num  =  mysqli_num_rows($result);
if($num==1)
{
$flag=0;
$_SESSION['username']=$name;
header ('location:home.php');
}
else
{
$flag=1;
}
}
?>

<head>
	<title > User login and registeration </title>
	<link rel = "stylesheet " type = "text/css" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel = "stylesheet" type = "text/css" href = "style.css" >
</head>
<body>
<div class = "container">
<div class = "login-box">
<div class = "row">
<div class = "offset-md-3 col-md-6 card">
<h2 align = "center" style = "text-decoration: underline;"><br> LOGIN </h2><br>
<br>
<form action="" method = "post">
<div class = "form-group">

<input type = "text" name = "user" class  = "form-control" required placeholder ="USERNAME">
</div>
<div class = "form-group">

<input type = "password" name = "password" class  = "form-control" required placeholder ="PASSWORD" >

</div>
&nbsp &nbsp <div style = "padding-left: 40%;"><button type = "submit" class = "btn btn-primary"  >  LOGIN</button>  </div>
</form>
<a href = "sign.php" style = "padding-left: 38%;"><button  class = "btn btn-primary"  > SIGN UP</button></a>
<br>

</div>

</div>
</div>
</div>

</body>
</html>