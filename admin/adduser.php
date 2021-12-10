<?php

session_start();

if(!isset($_SESSION['adminlogin']) || $_SESSION['adminlogin'] !==true)
{
    header("location: adminpanal.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
	
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>	
	<?php include ('adminheader.php'); ?>

<div class="container">

	<div class="row">
	<div class="col-lg-12 text-center border rounded bg-light my-5">
		<h1>Add User</h1>
	</div>
<div class="col-lg-8 m-auto d-block">
<form action="" method="POST">

		<div class="form-group">
	 		<input type="text" name="username" class="form-control" placeholder="Enter Your username" required="required">
	 	</div>
		<div class="form-group">
	 		<input type="password" name="password" class="form-control" placeholder="Enter Your Password" required="required">
	 	</div>
		<div class="form-group">
	 		<input type="password" name="cpassword" class="form-control" placeholder="Confirm Your Password" required="required">
	 	</div>
		<div class="form-group">
	 		<input type="submit" name="submit" class="form-control btn btn-outline-success" value="Add">
	 	</div>
	
</form>
</div>

</div>
</div>


<?php
require_once('../config.php');

if (isset($_POST['submit']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];

	if ($password == $cpassword)
	 {
	 	$password = password_hash($password, PASSWORD_DEFAULT);	
		
		$q = "SELECT * FROM `adminlogin` WHERE uname='$username'";
		$query = mysqli_query($conn,$q);
		$result = mysqli_fetch_array($query);
		if ($result['uname']==$username)
		{
		echo "<script>alert('Username is Already Taken')</script>";
		}
		else{
	 	$q = "INSERT INTO `adminlogin` (`uname`,`upass`) VALUES ('$username','$password')";
	 	mysqli_query($conn,$q);
	 	echo "<script>alert('Record Added')</script>";
     }
     }
     else{
	 	echo "<script>alert('Please Check Your Password')</script>";

     	}

}
?>
</body>
</html>