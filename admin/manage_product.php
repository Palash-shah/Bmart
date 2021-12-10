<?php

session_start();

if(!isset($_SESSION['adminlogin']) || $_SESSION['adminlogin'] !==true)
{
    header("location: adminpanal.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	
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
	<?php include ('adminheader.php'); ?>

<br><br>
<div class="container">
<table class="table table-border table-hover table-striped " style="border: 2px solid black;">
	<tr class="bg-light text-black text-center">
		<th>S. NO.</th>
		<th>Product Id</th>
		<th>Image</th>
		<th>Name</th>
		<th>MRP</th>
		<th>Price</th>
		<th>Quantity</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
 <?php 
		    require_once('../config.php');

			$q1 = "SELECT * FROM `products` ORDER BY id DESC";
			$query1 = mysqli_query($conn , $q1);
			$count = 0;
			while($result= mysqli_fetch_assoc($query1))
			{
				$count = $count+1;
			?>	
			<tr class="text-center">
				<td><?php echo $count ?></td>
				<td><?php echo $result['id']; ?></td>
				<td><img src="<?php echo "../".$result['image']  ?>" width="50px" height="30px"></td>
				<td><?php echo $result['productname']; ?></td>
				<td><?php echo $result['mrp']; ?></td>
				<td><?php echo $result['price']; ?></td>
				<td><?php echo $result['quantity']; ?></td>

		</form></td>
		<td><form action="editproduct.php" method="POST">
			<button class="btn btn-outline-primary" name="edit" type="submit">Edit</button> 
			<input type="hidden" name="id" value="<?php echo $result['id']  ?>">
		</form></td>

		<td><form action="" method="POST">
			<button class="btn btn-outline-danger" name="delete" type="submit">Delete</button> 
			<input type="hidden" name="id" value="<?php echo $result['id']  ?>">
			</tr>
<?php	
			}			    
?>

<table>

</div>
<?php
if (isset($_POST['delete'])) 
{
	$id = $_POST['id'];
	$q = "DELETE FROM `products` WHERE id = $id ";
	$q1 = mysqli_query($conn , $q);
	echo "<script>window.location.href='manage_product.php';</script>";
}
?>
</script>
</body>
</html>