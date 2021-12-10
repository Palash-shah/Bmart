<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
	
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
			<li><a href="../admin.php">Home</a></li>
			<li><div class="dropdown">
						  <button class="dropbtn">Products</button>
						  <div class="dropdown-content text-center">
						    <a href="../admin.php">Add Product</a>
						    <a href="../addcategory.php">Add Category</a>
						    <a href="manage_product.php">Manage Product</a>
						  </div>
						</div></li>
				<li><div class="dropdown">
						  <button class="dropbtn">Accounts</button>
						  <div class="dropdown-content text-center">
						    <a href="adduser.php">Add User</a>
						    <a href="deleteuser.php">Delete User</a>
						  </div>
						</div></li>
		<li><a href="contact_request.php">Contact Request</a></li>
		<li><a target="_blank" href="../index.php">View Site</a></li>
			<li><a href="adminlogout.php">Logout</a></li>
		</ul>
	</nav>
</div>
<br><br>

</body>
</html>