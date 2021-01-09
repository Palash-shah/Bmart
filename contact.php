<?php 
if(isset($_POST['submit'])){
    $to = "contact-ab10df@inbox.mailtrap.io"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width-device-width, initial-scale=1.0">
  <title>Contact Page</title>
  <link rel="stylesheet" type="text/css" href="css/Style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600;700&display=swap" rel="stylesheet"> 
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.account-page{
	padding: 50px 0;
	background: radial-gradient(#fff,#ffd6d6);
}
.form-container{
	background: #fff;
	width: 300px;
	height: 500px;
	position: relative;
	text-align: center;
	padding: 20px 0;
	margin: auto;
	box-shadow: 0 0 20px 0px rgba(0,0,0,0.1);
	overflow: hidden;
}
.form-container span{
	font-weight: bold;
	color: #555;
	padding: 0 10px;
	cursor: pointer;
	width: 100px;
	display: inline-block;
}
..form-container p{
	font-weight: bold;
	color: #555;
	cursor: pointer;
	padding: 0 10px;
	width: 100px;
	display: inline-block;
}
.form-btn{
	display: inline-block;
}
.form-container form{
	max-width: 300px;
	padding: 0 20px;
	position: absolute;
	top: 130px;
}
form input{
	width: 100%;
	height: 30px;
	margin: 10px 10px;
	padding: 10px 10px;
	border: 1px solid #ccc;
}
form .btn{
	width: 100%;
	border: none;
	cursor: pointer;
	margin: 10px 10px;
}
form .btn:focus{
	outline: none;
}
/*#LoginForm{
	left: -300px;
}*/
#RegForm{
	left: 10px;
}
</style>
</head>
<body>
  <div class="container">
   <div class="navbar">
     <div class="logo">
       <img src="images\logo.png" width="100px">      
     </div>
    <nav>
      <ul id="Menuitems">
        <li><a href="index">Home</a></li>
        <li><a href="product">Product</a></li>
        <li><a href="">About</a></li>
        <li><a href="">Contact</a></li>
        <li><a href="welcome">Account</a></li> 
        <li><a href="logout">Logout</a></li> 
     </ul>
    </nav>
    <img src="images/cart.png" width="30px" height="30px">
    <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
</div>
</div>

<!-- --------------------form---------------- -->

        <div class="row">
         <div class="form-container">
          <div class="form-btn">
              <p class="title">Contact Us</p>
          </div>

       <div class="col-1">

<form action="" method="post">
<input type="text" name="first_name" placeholder="First Name"><br>
<input type="text" name="last_name" placeholder="Last Name"><br>
<input type="text" name="email" placeholder="Your Email"><br>
&nbsp;&nbsp;&nbsp;<textarea rows="5" name="message" cols="30" placeholder="Your Message"></textarea><br>
<input type="submit" name="submit" value="Submit" class="btn">
</form>
</div>
</div>
</div>

    <br>
<br>
<br>



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