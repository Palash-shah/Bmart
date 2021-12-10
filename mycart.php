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
<style>
  .iquantity{
    text-align: center;
  }
</style>
</head>
<body>
	<?php include('header.php') ?>
<div class="sidebar">
  <a href="proflie.php">View Profile</a>
  <a class="active" href="mycart.php">View Cart</a>
  <a href="orderpage.php">View Order</a>
  <a href="logout.php">Logout</a>
</div>

<div class="container mr-4">
  <div class="col-lg-12 col-sm-12 col-md-12 text-center border rounded bg-light my-5">
    <h1>My Cart</h1>
  </div>
  <div class="table-responsive-md">
<table class="table table-hover table-striped border rounded bg-light my-2 mr-lg-4 float-sm-left">
  <tr class="bg-light text-black text-center">
    <th>S.NO.</th>
    <th>Product Name</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Total</th>
    <th>Delete</th>
  </tr>
 <?php 
      $username = $_SESSION['username'];
      $q1 = "SELECT * FROM `cart` WHERE username = '$username'";
      $query = mysqli_query($conn,$q1);
      $sr=0;
      $total = 0;
      $gtotal = 0;
      $count = mysqli_num_rows($query);
      if ($count > 0) {
      while ($result = mysqli_fetch_array($query)) {
      $sr = $sr+1;
      ?>  
      <tr class="text-center">
        <td><?php echo $sr ?></td>
        <td><?php echo $result['productname']; ?></td>
        <td><?php 
  if ($result['category']=='fruits') 
  { 
    echo $result['price']."/Kg";  
  } 
  elseif ($result['category']=='vegetable') 
  { 
    echo $result['price']."/Kg";  
  } 
  else{
  echo $result['price']; }
 ?>
        <input type="hidden" class="iprice" value="<?php echo $result['price']; ?>"></td>
      <td>
      <?php echo $result['quantity']; ?>
      </td>

      <td><?php 
      $total =$result['price']*$result['quantity'];
      $gtotal = $gtotal + $total;  
      echo $total;
    ?></td>
      <td>
        <form action="cart.php" method="POST">
          <button class="btn btn-outline-danger btn-sm" name="Remove_Item">Remove</button>
          <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
        </form>
      </td>
    </tr>
<?php 
      $username = $result['username'];
      }
      }
      else{
          ?>
          <tr>
            <td></td>
            <td></td>
            <td class="text-center">Your Cart is Empty</td>
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
 <!-- style="margin-left: 20%;"  style="margin-left: 44%;" -->
<div class="col-lg-6 col-sm-6 col-md-6 float-right my-lg-2">
<div class="border bg-light rounded p-4">
  <h3>Total:</h3>
  <h5 class="text-right" id="gtotal"> <?php echo $gtotal; ?></h5>
  <br>
  <div class="form-check">
  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
  <label class="form-check-label" for="exampleRadios1">
  Paytm
  </label>
</div>
<br><form action="buy.php" method="POST">
    <button class="btn btn-primary btn-block" type="submit" name="payment">Make Purchase</button>
    <input type="hidden"  name="price" value="<?php echo $gtotal; ?>">
    <input type="hidden"  name="tprice[]" value="<?php echo $total; ?>">
    <input type="hidden" name="username" value="<?php echo $username ?>">
    </form>
</div>
</div>
</div>

<!-------Quantity Iteams----------->
<script >
  var gt=0;
  var iprice = document.getElementsByClassName('iprice');
  var iquantity = document.getElementsByClassName('iquantity');
  var itotal = document.getElementsByClassName('itotal');
  var gtotal = document.getElementById('gtotal');
  
  function subtotal() 
  {
    gt=0;
    for (var i = 0;i<iprice.length;i++) 
    {
      itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
      document.getElementById("tprice").value = itotal[i].innerText;
      document.getElementById("quantity_transfer").value = iquantity[i].value;
      gt=gt+(iprice[i].value)*(iquantity[i].value);
    }
    gtotal.innerText=gt;
    document.getElementById("price").value = gt;
 }
  subtotal();
</script>

</body>
</html>
