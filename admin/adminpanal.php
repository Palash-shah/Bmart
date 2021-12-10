<?php
	session_start();
	require_once "../config.php";
						
						if (isset($_POST['Login']))
						{
							$username = $_POST['username'];
							$password = $_POST['password'];

							$q = "SELECT * FROM `adminlogin` WHERE uname='$username'";
							$run = mysqli_query($conn, $q);

							if(mysqli_num_rows($run)>0)
							{
								 $result = mysqli_fetch_array($run);
								if(password_verify($password, $result['upass']) == true)
								{
								$_SESSION['uname'] =$username;
								$_SESSION["adminlogin"] = true;
								header('location:../admin.php');
							}
						}
					
							else{
								echo "<script>alert('Login Unsuccessfully')</script>";
							}
						}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<br>
<br>

 <div class="container" >
 	    <div class="row">
	<div class="col-lg-6" style="
    margin-top: 13%;
    margin-left: 26%;">
			   <div class="panel panel-info">
				    <div class="panel-heading text-center"><b>Admin Login</b></div>
				 <div class="panel-body">
				 
				    <form role="form" action="" method="POST">
					 <div class="form-group">
						<label for="email">Email:</label>
						<input type="text" class="form-control" name="username" id="email" placeholder="Enter email">
                     </div>
						<div class="form-group">
							<label for="pwd">Password:</label>
							<input type="password" class="form-control" name="password" id="pwd" placeholder="Enter password">
                         </div>
					     <button type="submit" name="Login" class="btn btn-success">Login</button>
				    </form>
					</div>
			     </div>
			
			</div>
</div>
</div>
</body>
</html>