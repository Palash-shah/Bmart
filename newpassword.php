<?php 
require_once('config.php');
session_start();

if (isset($_POST['update']))
 {
    $email = $_SESSION['forget_email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

if ($password == $cpassword) 
    {
    $password = password_hash($password,PASSWORD_DEFAULT);
    $sql = "UPDATE `users` SET `password`='$password' WHERE `username` = '$email'";
    $query = mysqli_query($conn,$sql);
    $err = "Password Changed Successful";
    header('location:login.php');
    }
    else{
        $err = "Password Not Match";
    }    
    } 
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Forget Password</title>
    <link rel="stylesheet" href="css/login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <?php include('header.php'); ?>
     <?php echo '<body style="background: -webkit-linear-gradient(left, #fff, #fff); "><body>'; ?>
    <div class="contain" style="margin-top:50px;">
    <div class="wrapper">
      <div class="title-text">
        <div class="title login">Create New Password</div>
      </div>
      <div class="form-container">
        <?php if (empty($err)){}else{
          echo "<p style='background-color: red;color: white; padding: 5px;text-align: center;'>".$err."</p>";}?>
        <div class="form-inner">
          <form action="" method="POST" class="login">
            <div class="field">
              <input type="password" placeholder="Enter Your Password" name="password" required minlength="5">
            </div>
            <div class="field">
              <input type="password" placeholder="Enter Your confirm Password" name="cpassword" required minlength="5">
            </div>
            <div class="field btn">
              <div class="btn-layer"></div>
              <input type="submit" value="Update" name="update">
            </div>
            <div class="signup-link">Wrong Email? <a href="login.php">Go Back</a></div>
          </form>
        </div>
      </div>
    </div>
</div><br>

</body>
</html>