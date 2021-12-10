<?php
require_once('config.php');
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Profile</title>

<link rel="stylesheet" type="text/css" href="css/proflie.css">
</head>
<body>
	<?php include('header.php') ?>
<div class="sidebar">
  <a class="active" href="proflie.php">View Profile</a>
  <a href="mycart.php">View Cart</a>
  <a href="orderpage.php">View Order</a>
  <a href="logout.php">Logout</a>
</div>

<div class="content">

<?php 
  echo '<body style="background:white;">';
 ?>
<div class="container mt-4">
  <div class="welcome">
    <?php 
      $id = $_SESSION['id'];	
      $q = "SELECT fname FROM `users` WHERE id = '$id'";
      $query = mysqli_query($conn,$q);
      $result1 = mysqli_fetch_array($query);
     ?>
<h3 align="center">Welcome <?php echo $result1['fname']; ?>! Thanks for creating account 😍</h3>
</div>
</div><br>
</div>
</body>
</html>