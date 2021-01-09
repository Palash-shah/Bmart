<?php
//This script will handle login
session_start();

// check if the user is already logged in
if(isset($_SESSION['username']))
{
    header("location: welcome");
    exit;
}
require_once "config.php";

$username = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter username + password";
    }
    else{
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }


if(empty($err))
{
    $sql = "SELECT id, username, password FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $username;
    
    
    // Try to execute this statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($password, $hashed_password))
                        {
                            // this means the password is corrct. Allow user to login
                            session_start();
                            $_SESSION["username"] = $username;
                            $_SESSION["id"] = $id;
                            $_SESSION["loggedin"] = true;

                            //Redirect user to welcome page
                            header("location: welcome");
                            
                        }
                    }

                }

    }
}    


}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width-device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" type="text/css" href="css/Style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600;700&display=swap" rel="stylesheet"> 
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.new p{
	letter-spacing: 4px;
	font-size: 10px;
}
.new p a{
		color: #ff523b;
}
</style>
</head>
<body>
  
  <div class="container">
   <div class="navbar">
     <div class="logo">
       <img src="images/logo.png" width="80px">       
     </div>
    <nav>
      <ul id="Menuitems">
        <li><a href="index">Home</a></li>
        <li><a href="product">Product</a></li>
        <li><a href="">About</a></li>
        <li><a href="">Contact</a></li>
        <li><a href="welcome">Account</a></li>
      </ul>
    </nav>
    <img src="images/cart.png" width="30px" height="30px">
    <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">

   </div>
   </div>

   <!-- -----------account-page------ -->
 <div class="account-page">
  <div class="container">
    <div class="row">
      <div class="col-2">
        <img src="images/image1.png" width="100%">
      </div>

         <div class="form-container">
          <div class="form-btn">
              <span class="title">Login</span>
              
          </div>

       <div class="col-2">
         
<form action="" method="post" id="RegForm">
  <div>
    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
  </div>
  <div >
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
 <div class="new"><br><p>&nbsp;&nbsp;Don't have an <a href="register">account?</a></p>
</div>
</form>



       </div>

     </div>
   </div>

</div>
</div>
<!-- ------------footer----------- -->
<div class="footer">
  <div class="container">
    <div class="row">
      <div class="footer-col-1">
        <h3>Download our app</h3>
        <p>Download app for android and ios moblie phone</p>
        <div class="app-logo">
          <img src="images/play-store.png">
          <img src="images/app-store.png">
        </div>
      </div>

      <div class="footer-col-2">
        <img src="images/logo-white.png">
        <p>Our purpose is to sustaninably make the pleasure and Benefits of Sports Accessible to the Many.</p>
      </div>

      <div class="footer-col-3">
        <h3>Usefull Links</h3>
        <ul>
          <li>Coupons</li>
          <li>Blog Post</li>
          <li>Return Policy</li>
          <li>Join Affiliate</li>

        </ul>
      </div>
      
      <div class="footer-col-4">
        <h3>Follow us</h3>
        <ul>
          <li>Facebook</li>
          <li>Twitter</li>
          <li>Instagram</li>
          <li>Youtube</li>

        </ul>
        </div>
      </div>
        <hr>
        <p class="copyright">Copyright 2020 - Burhanpur | The Histroical City</p>
          </div>
  </div>


<!-- ------------js sprict for toggle menu--------- -->
<script type="text/javascript">
  var Menuitems = document.getElementById("Menuitems");
  Menuitems.style.maxHeight = "0px";
  function menutoggle(){
    if(Menuitems.style.maxHeight == "0px")
    {
      Menuitems.style.maxHeight = "200px";
    }
    else{
      Menuitems.style.maxHeight = "0px";
    }
  }
</script>

</body>
</html>