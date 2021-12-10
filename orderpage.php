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
<link rel="stylesheet" type="text/css" href="css/proflie.css">
<link rel="stylesheet" type="text/css" href="css/mycart.css">
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	<?php include('header.php') ?>
<div class="sidebar">
  <a href="proflie.php">View Profile</a>
  <a href="mycart.php">View Cart</a>
  <a class="active" href="orderpage.php">View Order</a>
  <a href="logout.php">Logout</a>
</div>

<div class="container mr-lg-3">

  <div class="col-lg-12 text-center border rounded bg-light my-5">
    <h1>My Order</h1>
  </div>
  <div class="table-responsive-md">
<table class="table table-hover table-striped border rounded bg-light my-2">
  <tr class="bg-light text-black text-center">
    <th>S.NO.</th>
    <th>Product Name</th>
    <th>Amount</th>
    <th>Payment</th>
    <th>Order Status</th>
  </tr>
 <?php 
      $sr = 0;
      $productname = "";
      $username = $_SESSION['username'];
      $q1 = "SELECT DISTINCT productname,price,status FROM `myorder` WHERE username = '$username'";
      $query = mysqli_query($conn,$q1);
      $count = mysqli_num_rows($query);
      if ($count > 0) 
      {
      while ($result = mysqli_fetch_array($query)) {
      $sr = $sr+1;
      ?>  
      <tr class="text-center">
        <td><?php echo $sr ?></td>
        <td><?php echo $result['productname']; ?></td>
        <td><?php echo $result['price']; ?></td>
        <td><?php 
        if($result['status']==1)
        {
        	echo "Completed";
        }
		else
        {
        	echo "Pending";
        }
        
         ?></td>
         <td><input type="submit" name="track" value="Track Order" class="btn btn-outline-success"></td>
    </tr>
<?php 
      }
      }
      else{
          ?>
          <tr>
            <td></td>
            <td></td>
            <td class="text-center">You Have Not Order Yet.</td>
            <td></td>
            <td></td>
            <td></td>

          </tr>
          <?php
          }         
?>

</table>
</div>
</div>

</div>
</body>
</html>
