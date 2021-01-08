<?php
require_once "config.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
    }
    else{
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST['username']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is already taken"; 
                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }

    mysqli_stmt_close($stmt);


// Check for password
if(empty(trim($_POST['password']))){
    $password_err = "Password cannot be blank";
}
elseif(strlen(trim($_POST['password'])) < 6){
    $password_err = "Password cannot be less than 6 characters";
}
else{
    $password = trim($_POST['password']);
}

// Check for confirm password field
if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
    $password_err = "Passwords should match";
}


// If there were no errors, go ahead and insert into the database
if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
{
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

        // Set these parameters
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT);

        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
            header("location: login.php");
        }
        else{
            echo "Something went wrong... cannot redirect!";
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width-device-width, initial-scale=1.0">
  <title>Registration Page</title>
  <link rel="stylesheet" type="text/css" href="css/Style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600;700&display=swap" rel="stylesheet"> 
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
  
  <div class="container">
   <div class="navbar">
     <div class="logo">
       <img src="images/logo.png" width="80px">       
     </div>
    <nav>
      <ul id="Menuitems">
        <li><a href="index.html">Home</a></li>
        <li><a href="product.html">Product</a></li>
        <li><a href="">About</a></li>
        <li><a href="">Contact</a></li>
        <li><a href="">Account</a></li>
      </ul>
    </nav>
    <img src="images/cart.png" width="30px" height="30px">
    <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">

   </div>
   </div>
   <!-- ----------------order-page------------ -->
<div class="account-page">
  <div class="container">
    <div class="row">
      <div class="col-2">
        <img src="images/image1.png" width="100%">
      </div>

         <div class="form-container">
          <div class="form-btn">
              <span class="title">Register</span>
              
          </div>

       <div class="col-2">
 <form action="" method="post" id="RegFrom">
 
         <input type="text" class="form-control" name="username" id="inputEmail4" placeholder="Username">
         <input type="password" class="form-control" name ="password" id="inputPassword4" placeholder="Password">
         <input type="password" class="form-control" name ="confirm_password" id="inputPassword" placeholder="Confirm Password">
  

  <button type="submit" class="btn">Sign Up</button>
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
        <img src="images/logo.png">
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