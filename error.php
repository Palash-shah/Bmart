<?php
//This script will handle error 

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width-device-width, initial-scale=1.0">
  <title>Error Page</title>
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
 <center>
 <br><br><br>
  <img src="images/logo.png" width="100px">
<div class="look">
 <p>Looking for Something ?</p>
</div>
 <p><img src="images/que.gif">we're sorry.The web address you are entered is not a functioning page on our site.</p><br>
<h3> Go to meraburhanpur.com <a href="index.html"><b> Home </b></a> page.</h3>
</center>

<br><br><br><br><br><br><br><br><br><br>

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
