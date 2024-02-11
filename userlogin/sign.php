<html>
<?php
session_start();
include('db.php');
if(isset($_POST['user'])){
$name = $_POST['user'];
$password =md5( $_POST['password']);
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$s = "select * from usertable where name = '$name'";
$result = mysqli_query($con, $s);
$num  =  mysqli_num_rows($result);
if ($num == 1){
echo "user name already taken";
}
else{
	$reg = "insert into usertable (name , password,fname,lname,contact,email)  values ('$name','$password','$fname','$lname','$contact','$email')";
	mysqli_query($con, $reg);
	echo "registeration sucessfull";
	}}
?>
<head>
	<title > User login and registeration </title>
	<link rel = "stylesheet " type = "text/css" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel = "stylesheet" type = "text/css" href = "style.css" >
</head>
<body>
<div STYLE = "padding-top: 100px;">
<div class = "offset-md-4 col-md-4 card" ><br>
<h2 align = "center" style = "text-decoration: underline;"> SIGN UP</h2>
<br>
<form action  = "" method = "post">
<div class = "form-group">
<div class = "form-group">

<input type = "text" name = "fname" class  = "form-control" required placeholder ="FIRST NAME">
</div>

<input type = "text" name = "lname" class  = "form-control" required placeholder ="LAST NAME">
</div>
<div class = "form-group">

<input type = "text" name = "user" class  = "form-control" required placeholder ="USERNAME">
</div>
<div class = "form-group">

<input type = "password" name = "password" class  = "form-control" required placeholder ="PASSWORD">
</div>
<div class = "form-group">

<input type = "text" name = "contact" class  = "form-control" required placeholder ="CONTACT NO.">
</div>
<div class = "form-group">

<input type = "text" name = "email" class  = "form-control" required placeholder ="EMAIL ID">
</div>
<br>
<div align = "center">
<button type = "submit" class = "btn btn-primary"> Register</button></div>
</form>
<a href = "login.php" align=  "middle"><button type = "submit" class = "btn btn-primary" > LOGIN  </button></a>
</div>
</div>
</div> 
</body>
</html>