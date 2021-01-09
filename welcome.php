<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width-device-width, initial-scale=1.0">
  <title>Mera Burhanpur</title>
  <link rel="stylesheet" type="text/css" href="css/Style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600;700&display=swap" rel="stylesheet"> 
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

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
<!-- 
</div>
  <div class="navbar-collapse collapse">
  <ul class="navbar-nav ml-auto">
  <li class="nav-item active">
        <a class="nav-link" href="#"> <img src="https://img.icons8.com/metro/26/000000/guest-male.png"></a>
      </li>
  </ul>
  </div> -->


<div class="container mt-4">
  <div class="welcome">
<h3 align="center" ><?php echo "Welcome ". $_SESSION['username']?>! Thanks for creating account 😍</h3>
</div>
</div>
<!-- ---------------------Featured product---------------------- -->
<div class="small-container">
  <h2 class="title">Featured Products</h2>
  <div class="row">
    <div class="col-4">
      <a href="boat.html">
      <img src="images/Product/Boat/1.jpg">
      <h4>boAt Rockerz 255 Sports in-Ear Bluetooth Neckband</h4>
      <div class="rating">
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star-half-o"></i>
      </div>
      <p>₹ 800.00</p></a>
    </div>
    <div class="col-4">
      <img src="images/product-2.jpg">
      <h4>Vaseline Intensive Care Deep Moisture Body Lotion, 400 ml</h4>
      <div class="rating">
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star-o"></i>
      </div>
      <p>₹ 217.00</p>
    </div>
    <div class="col-4">
      <img src="images/product-3.jpg">
      <h4>Nivea Nourishing Lotion Body Milk With Deep Moisture Serum</h4>
      <div class="rating">
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star-half-o"></i>
      </div>
      <p>₹ 348.00</p>
    </div>
    <div class="col-4">
      <img src="images/product-4.jpg">
      <h4>Dettol Original Germ Protection Handwash Liquid Soap Refill, 1500ml</h4>
      <div class="rating">
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star-o"></i>
      </div>
      <p>₹ 209.00</p>
    </div>
  </div>
</div>

<!-- ---------------------footer------------ -->
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