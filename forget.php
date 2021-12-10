<?php 

require_once('config.php');
session_start();
if (isset($_POST['submit']))
 {
    $email = $_POST['email'];
    $otp = rand(99999,00000);
    
    $q = "SELECT * FROM users WHERE username = '$email'";
    $query = mysqli_query($conn,$q);

    if (mysqli_num_rows($query)> 0) 
    {
   
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
    $_SESSION['forget_email'] = $email;
    $sql = "INSERT INTO `verify` (`otp`,`email`) VALUES ('$otp','$email')";
    mysqli_query($conn,$sql);
    header('location:fotp.php');
   } 
else 
{
    $err =  "Email sending failed...";
}
     }
else
{
  $err = "Email Not Registered";
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
        <div class="title login">Forget Password</div>
      </div>
      <div class="form-container">
        <?php if (empty($err)){}else{
          echo "<p style='background-color: red;color: white; padding: 5px;text-align: center;'>".$err."</p>";}?>
        <div class="form-inner">
          <form action="" method="POST">
            <div class="field">
              <input type="email" placeholder="Enter Your Email" name="email" required>
            </div>
            <div class="field btn">
              <div class="btn-layer"></div>
              <input type="submit" value="submit" name="submit">
            </div>
            <div class="signup-link">Wrong Email? <a href="login.php">Go Back</a></div>
          </form>
        </div>
      </div>
    </div>
</div><br>

</body>
</html>