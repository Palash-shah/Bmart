<?php 
session_start();
	require('config.php');

	if (isset($_POST['payment']))
	{
		$price = $_POST['price'];
		$username = $_POST['username'];
		$sql="SELECT * FROM `cart` WHERE username = '$username'";
		$query =mysqli_query($conn,$sql);
		while ($result = mysqli_fetch_array($query))
		{
			$productname = $result['productname'];
			$nprice = $result['price'];
			$quantity = $result['quantity'];

			 // echo $quantity."<br>";
			 $sql = "INSERT INTO `myorder`(productname,price,username,quantity,status)VALUES('$productname','$nprice','$username','$quantity','0')";
			mysqli_query($conn,$sql);
		}
	
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Buy Now</title>
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
		table{
			align-items: center;
			justify-content: center;
			text-align: center;
		}

	</style>
</head>
<body>
	<div class="container">
	<form method="post" action="paytm/Paytmkit/pgRedirect.php">
	  <div class="table-responsive-md">
		<table class="table table-hover table-striped border rounded bg-light my-5">
			<tbody>
				<tr class="bg-light text-black text-center">
					<th>Username</th>
					<th>Total Amount</th>
				</tr>
				<tr style="display: none;">
					<td>1</td>
					<td><label>ORDER_ID::*</label></td>
					<td><input id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off" 
						value="<?php echo  "ORDS" . rand(10000,99999999)?>">
					</td>
				</tr>
				<tr>
					<td><input id="CUST_ID" type="hidden" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo $username ?>">
					<p><?php echo $username ?></p>
				</td>
				<td>
					<p><?php echo $price; ?></p>
				</td>
				</tr>
				<tr style="display: none;">
					<td>3</td>
					<td><label>INDUSTRY_TYPE_ID ::*</label></td>
					<td><input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
					</td>
				</tr>
				<tr style="display: none;">
					<td>4</td>
					<td><label>Channel ::*</label></td>
					<td><input id="CHANNEL_ID" tabindex="4" maxlength="12" type="hidden" 
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
					</td>
				</tr>
				<tr style="display: none;">
					<td><label>Total Amount</label></td>
					<td><input title="TXN_AMOUNT" tabindex="10"
						type="hidden" name="TXN_AMOUNT"
						value="<?php echo $price ?>">
						<h5><?php echo $price ?></h5>
					</td>
				</tr>
				<tr style="display: none;">
					<td><input tabindex="10"
						type="hidden" name="username"
						value="<?php echo $username ?>">
					</td>
				</tr>
				<tr>
					<!-- <td></td> -->
					<td></td>
					<td><input value="CheckOut" type="submit" onclick="" style="margin-right: -70%;" class="btn btn-outline-success"></td>
				</tr>
			</tbody>
		</table>
	</div>
	</form>
</div>
</body>
</html>