<?php 
session_start();
require_once('config.php');

if(isset($_SESSION['loggedin'])==true)
{
    header("location: proflie.php");
}

if (isset($_POST['login'])) 
{
  $err = 0;
  $username= $_POST['email'];
  $password = $_POST['password'];
  
  $sql="SELECT * FROM `users` where username = '$username'";
  $run = mysqli_query($conn,$sql);
   
   if(mysqli_num_rows($run)>0)
   {
           $result = mysqli_fetch_array($run);
          if ($result['status'] == 1) 
          {
          if(password_verify($password, $result['password']) == true)
           {
           $_SESSION['username'] =$username;
           $_SESSION['id'] =$result['id'];
           $_SESSION["loggedin"] = true;
           header('location:proflie.php');
           }
           else
           {
               $err ="incorrect Password";
           }
   }
   else
   {
    $err = "Email Not verified";
   }
 }
    else
    {
           $err ="Email not Vaild";
    }
  }


elseif (isset($_POST['register'])) 
{
  $err = 0;
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];

  $sql="SELECT * FROM `users` where username = '$email'";
  $query = mysqli_query($conn,$sql);
  $result = mysqli_fetch_array($query);
  
  if (mysqli_num_rows($query)>0)
  {
    $err = "Email Already Registered";
  }
  elseif($password == $cpassword) 
  {
     $password = password_hash($password,PASSWORD_DEFAULT);
     
     $sql = "INSERT INTO `users`(`fname`, `lname`, `username`, `password`, `status`) VALUES ('$fname','$lname','$email','$password','0')";

    mysqli_query($conn,$sql);

    $otp = rand(9999,0000);

    $sql = "INSERT INTO `verify` (`otp`,`email`) VALUES ('$otp','$email')";
    mysqli_query($conn,$sql);

    $subject = "OTP Verfication";
    $body = '<html>
<head>
	<title></title>
</head>
<body>
    <div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
  <div style="margin:50px auto;width:70%;padding:20px 0">
    <div style="border-bottom:1px solid #eee">
      <a href="bmart.ml" style="font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600">Bmart</a>
    </div>
    <p style="font-size:1.1em">Hi,</p>
    <p>Thank you for choosing Bmart. Use the following OTP to complete your Sign Up procedures. OTP is valid for 5 minutes</p>
    <h2 style="background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;">'.$otp.'</h2>
    <p style="font-size:0.9em;">Regards,<br />Bmart.ml</p>
    <hr style="border:none;border-top:1px solid #eee" />
    <div style="float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300">
    </div>
  </div>
</div>
</body>
</html>
';
// Set content-type header for sending HTML email 
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
 if (mail($email, $subject, $body,$headers)) 
  {
    $err = "Email successfully sent to $email...";
    header('location:otp.php');
} 
else {
    $err =  "Email sending failed...";
}
  }
  else{
  $err = "Password not match";
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
    <div class="contain">
    <div class="wrapper">
      <div class="title-text">
        <div class="title login">Login Form</div>
        <div class="title signup">Signup Form</div>
      </div>
      <div class="form-container">
        <div class="slide-controls">
          <input type="radio" name="slide" id="login" checked>
          <input type="radio" name="slide" id="signup">
          <label for="login" class="slide login">Login</label>
          <label for="signup" class="slide signup">Signup</label>
          <div class="slider-tab"></div>
        </div>
        <?php if (empty($err)){}else{
          echo "<p style='background-color: red;color: white; padding: 5px;text-align: center;'>".$err."</p>";}?>
        <div class="form-inner">
          <form action="" method="POST" class="login">
            <div class="field">
              <input type="email" placeholder="Email Address" name="email" required minlength="6">
            </div>
            <div class="field">
              <input type="password" placeholder="Password" name="password" required minlength="4" maxlength="12">
            </div>
            <div class="pass-link"><a href="forget.php">Forgot password?</a></div>
            <div class="field btn">
              <div class="btn-layer"></div>
              <input type="submit" value="Login" name="login">
            </div>
            <div class="signup-link">Not a member? <a href="">Signup now</a></div>
          </form>
          <form action="" method="POST" class="signup" >
            <div class="field">
              <input type="text" placeholder="First Name" name="fname" required>
            </div>
            <div class="field">
              <input type="text" placeholder="Last Name" name="lname" required>
            </div>
            <div class="field">
              <input type="email" placeholder="Email Address" name="email" required>
            </div>
            <div class="field">
              <input type="password" placeholder="Password" name="password" required minlength="6" maxlength="12">
            </div>
            <div class="field">
              <input type="password" placeholder="Confirm password" name="cpassword" required minlength="6" maxlength="12">
            </div>
            <div class="field btn">
              <div class="btn-layer"></div>
              <input type="submit" value="Signup" name="register">
            </div>
          </form>
        </div>
      </div>
    </div>
</div><br>
    <script>
      const loginText = document.querySelector(".title-text .login");
      const loginForm = document.querySelector("form.login");
      const loginBtn = document.querySelector("label.login");
      const signupBtn = document.querySelector("label.signup");
      const signupLink = document.querySelector("form .signup-link a");
      signupBtn.onclick = (()=>{
        loginForm.style.marginLeft = "-50%";
        loginText.style.marginLeft = "-50%";
      });
      loginBtn.onclick = (()=>{
        loginForm.style.marginLeft = "0%";
        loginText.style.marginLeft = "0%";
      });
      signupLink.onclick = (()=>{
        signupBtn.click();
        return false;
      });
    </script>

</body>
</html>