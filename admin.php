<?php

session_start();

if(!isset($_SESSION['adminlogin']) || $_SESSION['adminlogin'] !==true)
{
    header("location: admin/adminpanal.php");
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
<div class="navbar">
		   <h2>Dashboard</h2> 			
	<nav>
		<ul>
			<li><a href="admin.php">Home</a></li>
					<li><div class="dropdown">
						  <button class="dropbtn">Products</button>
						  <div class="dropdown-content text-center">
						    <a href="admin.php">Add Product</a>
						    <a href="addcategory.php">Add Category</a>
						    <a href="admin/manage_product.php">Manage Product</a>
						  </div>
						</div></li>
			<li><div class="dropdown">
						  <button class="dropbtn">Accounts</button>
						  <div class="dropdown-content text-center">
						    <a href="admin/adduser.php">Add User</a>
						    <a href="admin/deleteuser.php">Delete User</a>
						  </div>
						</div></li>
		
			<li><a href="admin/contact_request.php">Contact Request</a></li>
			<li><a target="_blank" href="index.php">View Site</a></li>
			<li><a href="admin/adminlogout.php">Logout</a></li>

		</ul>
	</nav>
</div>
<br><br>

<div class="col-lg-7 m-auto d-block">
	 <form action="" method="post" enctype="multipart/form-data">
	 	<div class="form-group">
	 		<label for="name"><b>Product Name: </b></label>
	 		<input type="text" name="productname" id="name" class="form-control" required autocomplete="off"> 
	 	</div>
	    <div class="form-group">
	 		<label for="mrp"><b>M.R.P: </b></label>
	 		<input type="text" name="mrp" id="mrp" class="form-control" required autocomplete="off">
	 	</div>
	    <div class="form-group">
	 		<label for="price"><b>Price: </b></label>
	 		<input type="text" name="price" id="price" class="form-control" required autocomplete="off">
	 	</div>
	    <div class="form-group">
	 		<label for="description"><b>Description: </b></label>
	 		<input type="text" name="description" id="description" class="form-control" required autocomplete="off">
	 	</div>
	 	<div class="form-group">
	 		<label for="file"><b>Images: </b></label>
	 		<input type="file" name="file" id="file" class="form-control" required >
	 	</div>

	    <div class="form-group" style="margin-top: 20px;">
	 		<label for="category"><b>Category: </b></label>
	 		<input type="text" name="category" id="category" class="form-control" required autocomplete="off">
	 	</div>	
	    <div class="form-group">
	 		<label for="subcategory"><b>Subcategory: </b></label>
	 		<input type="text" name="subcategory" id="subcategory" class="form-control">
	 	</div>	
	    <div class="form-group">
	 		<label for="brand"><b>Brand: </b></label>
	 		<input type="text" name="brand" id="brand" class="form-control">
	 	</div>	
	    <div class="form-group">
	 		<label for="Quantity"><b>Quantity: </b></label>
	 		<input type="number" name="quantity" id="quantity" class="form-control" max="100" autocomplete="off" required>
	 	</div>	
	 	<br>
	 	<div>

	 	<input type="submit" name="submit" value="Upload" class="btn btn-success" >
	 	</div>
	 </form>
</div>

<?php 
	require_once "config.php";
						
	if (isset($_POST['submit']))
	{
		$name = $_POST['productname'];
		$mrp = $_POST['mrp'];
		$price = $_POST['price'];
		$category = $_POST['category'];
		$description = $_POST['description'];
		$subcategory = $_POST['subcategory'];
		$brand = $_POST['brand'];
		$quantity = $_POST['quantity'];
		$files = $_FILES['file'];
		$filename =$files['name'];
		$fileerror =$files['error'];
		$filetmp = $files['tmp_name'];

		$fileext = explode('.',$filename);
		$filecheck = strtolower(end($fileext));
		$fileextstored = array('png' , 'jpg' , 'jpeg');

		if(in_array($filecheck,$fileextstored))
		{
		$destinationfile ='image/'.$filename;
							
		move_uploaded_file($filetmp, $destinationfile);
		$q = "INSERT INTO `products`(`image`, `productname`,`mrp`,`price` ,`description` ,`category`,`subcategory`,`brand`,`quantity` ) VALUES ('$destinationfile','$name','$mrp','$price','$description','$category','$subcategory','$brand','$quantity')";
								
		$query = mysqli_query($conn , $q); 
							
		echo "<script>alert('Upload Successfully');</script>";
		}
		else{
			echo "<script>alert('Upload Fill');</script>";
			}

		}
 ?>
</body>
</html>