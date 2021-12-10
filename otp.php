<?php 
session_start();
require_once('config.php');

if (isset($_POST['verify']))
 {
  $otp = $_POST['otp'];
  $sql= "SELECT * FROM verify WHERE otp = '$otp'";
  $query = mysqli_query($conn,$sql);
  
 if (mysqli_num_rows($query)>0) 
  {
    $result = mysqli_fetch_array($query);
     if ($otp == $result['otp']) 
  {
           $username = $result['email'];
           $sql = "UPDATE `users` SET status = '1' WHERE username ='$username'";
           mysqli_query($conn,$sql);

           $sql="SELECT * FROM `users` where username = '$username'";
           $run = mysqli_query($conn,$sql);
           $result = mysqli_fetch_array($run);
           
           $_SESSION['username'] =$username;
           $_SESSION['id'] =$result['id'];
           $_SESSION["loggedin"] = true;
  
           $err = "OTP Verified";
           header('location:proflie.php');
       
    
  }
  }
  else{
  $err = "otp not found";
 }
 }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login & Signup Form</title>
    <link rel="stylesheet" href="css/login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <?php include('header.php'); ?>
     <?php echo '<body style="background: -webkit-linear-gradient(left, #fff, #fff); "><body>'; ?>
    <div class="contain" style="margin-top:50px;">
    <div class="wrapper">
      <div class="title-text">
        <div class="title login">Verify OTP</div>
      </div>
      <div class="form-container">
        <?php if (empty($err)){}else{
          echo "<p style='background-color: red;color: white; padding: 5px;text-align: center;'>".$err."</p>";}?>
        <div class="form-inner">
          <form action="" method="POST" class="login">
            <div class="field">
              <input type="text" placeholder="Enter Your OTP" name="otp" required minlength="3" autocomplete="off">
            </div>
            <div class="field btn">
              <div class="btn-layer"></div>
              <input type="submit" value="Verify" name="verify">
            </div>
            <div class="signup-link">Wrong Email? <a href="login.php">Go Back</a></div>
          </form>
        </div>
      </div>
    </div>
</div><br>

</body>
</html>