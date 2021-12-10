<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="css/header.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
  
    <nav>
      <div class="menu-icon">
<span class="fas fa-bars"></span></div>
<div class="logo">
  <a href="index.php">
<img src="images/logo1.jpg" width="90px"></a>
</div>
<div class="nav-items">
<li><a href="index.php">Home</a></li>
<li><a href="product.php" >Product</a></li>
<li><a href="#">About</a></li>
<li><a href="contact.php" >Contact</a></li>
<li><a href="login.php" >Account</a></li>
</div>
<div class="search-icon">
<span class="fas fa-search"></span></div>
<div class="cancel-icon">
<span class="fas fa-times"></span></div>
<form action="single.php" method="POST">

  <input list="browsers" name="browser" id="browser" placeholder="Search..">
  <datalist id="browsers">
    <?php 
                  require_once "config.php";
                
                $q1 = "SELECT * FROM `products`";
                $qd = mysqli_query($conn ,$q1);

  while($result = mysqli_fetch_array ($qd))
{    ?>
    <option value="<?php echo $result['productname']; ?>"></option>
<?php
    }
 ?>
  </datalist>
   <button type="submit" name="search" class="search">Search</button>
</form>
</nav>

<!-- ------------toggle menu for menu------------>
<script>
    const menuBtn = document.querySelector(".menu-icon span");
    const searchBtn = document.querySelector(".search-icon");
    const cancelBtn = document.querySelector(".cancel-icon");
    const items = document.querySelector(".nav-items");
    const form = document.querySelector("form");
    menuBtn.onclick = ()=>{
      items.classList.add("active");
      menuBtn.classList.add("hide");
      searchBtn.classList.add("hide");
      cancelBtn.classList.add("show");
    }
    cancelBtn.onclick = ()=>{
      items.classList.remove("active");
      menuBtn.classList.remove("hide");
      searchBtn.classList.remove("hide");
      cancelBtn.classList.remove("show");
      form.classList.remove("active");
      cancelBtn.style.color = "#ff3d00";
    }
    searchBtn.onclick = ()=>{
      form.classList.add("active");
      searchBtn.classList.add("hide");
      cancelBtn.classList.add("show");
    }
  </script>

</body>
</html>