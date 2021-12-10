<?php require('config.php'); 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Product Page</title>
	<!-- <link rel="stylesheet" type="text/css" href="css/Style.css"> -->
	
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
	
.title{
	text-align: center;
	margin: 0 auto 20px;
	position: relative;
	line-height: 60px;
	color: #555;
}
.title::after{
	content: '';
	background: #ff523b;
	width: 80px;
	height: 5px;
	border-radius: 5px;
	position: absolute;
	bottom: 0;
	left: 50%;
	transform: translateX(-50%);
}
.row {
	 align-items: end;
}
button {
	margin-top:0px;
}
</style>
</head>
<body>
<?php include ('header.php'); ?>
<div class="container-fluid">
<div class="row">
<div class="col-lg-3 col-md-3 col-sm-3"><br>
		<h5 class="text-center"> Fliter Product</h5>
		<hr>
	<!-- --------------first fliter------- -->
	<span><h6 class="text-info"> Select Category
<a href="product.php"><button class="btn btn-outline-danger" style="margin-left: 120px;">Clear Fliter</button></a></h6></span>
	<ul class="list-group">
		<?php 
		$q = "SELECT DISTINCT category FROM products";
		$query=mysqli_query($conn,$q);

		while ($result = mysqli_fetch_array($query))
		{
		 ?>

		<li class="list-group-item">
			<div class="form-check">
				<label class="form-check-label">
		<form action="" method="POST">
					<input type="radio" name="flitername" onclick="change()" class="form-check-input product_check" value="<?php echo $result['category'] ?>"  id="brand" >
					<?php echo $result['category'] ?>
				</label>
			</div>
		 </li>
<?php
}
?>	
		<button style="display: none;" type="submit" class="btn btn-info" id="data" name="product">Apply Filter</button>
	<script> 
		function change()
	{
		document.getElementById('data').click()
	}
</script>
	</form>
	</ul>
	<br>
	<!-- ----------------Second Fliter------- -->
	<h6 class="text-info"> Select Brands</h6>
	<ul class="list-group">
		<?php
		$q = "SELECT DISTINCT brand FROM products";
		$query=mysqli_query($conn,$q);

		
		while ($result = mysqli_fetch_array($query))
		{
			if (empty($result['brand'])) {}
		
		else{
		?>

		<li class="list-group-item">
			<div class="form-check">
				<label class="form-check-label">
		<form action="product.php" method="POST" name="f1">
					<input type="radio" name="fliterbrand" onclick="change1()" class="form-check-input product_check" value="<?php echo $result['brand'] ?>" id="brand">
					<?php echo $result['brand'] ?>
				</label>
			</div>
		 </li>
<?php
}
}
?>	
			<button style="display: none;" type="submit" class="btn btn-info" id="data1" name="brandfliter">Apply Filter</button>

	<script> 
		function change1()
	{
		document.getElementById('data1').click()
	}
</script>
	</form>
	</ul>
</div>
<div class="col-lg-9 col-md-9 col-sm-9">
<h5 class="text-center title">All Products</h5>
<br><div class="row">
	<?php           

                if(isset($_POST['product']))
                {
                $fliter = $_POST['flitername'];  
                $q1 = "SELECT * FROM `products` WHERE category = '$fliter' ORDER BY id DESC";
                $qd = mysqli_query($conn ,$q1);
				}

				elseif(isset($_POST['brandfliter']))
				{
	            $fliterbrand = $_POST['fliterbrand'];  		
                $q1 = "SELECT * FROM `products` WHERE brand = '$fliterbrand' ORDER BY id DESC";
                $qd = mysqli_query($conn ,$q1);
				}
				elseif (isset($_POST['brands']))
				{
				$brand = $_POST['brandname'];
				$q1 = "SELECT * FROM `products` WHERE brand = '$brand' ORDER BY id DESC";
				$qd=mysqli_query($conn,$q1);
                }
                elseif (isset($_POST['category'])) 
                {					
				$category = $_POST['category-name'];		
				$q1 = "SELECT * FROM `products` WHERE category = '$category' ORDER BY id DESC";
				$qd = mysqli_query($conn ,$q1);
				}
				elseif (empty($_POST)) {
                $q1 = "SELECT * FROM `products` ORDER BY id DESC";
                $qd = mysqli_query($conn ,$q1);
				}

if ($qd->num_rows > 0) {
  while($result = $qd->fetch_assoc()) {
  
  ?>

  	<div class="col-md-3 mb-2">
  		<div class="card-deck">
  			<div class="card border-secondary">
  				<img src="<?php echo $result['image']; ?>" class="card-img-top" >
 <p class="text-center bg-success text-light rounded p-2"><b><?php echo $result['productname'];  ?></b></p>
<div class="card-body">
	<h6 class="card-title text-danger text-center"><label>MRP:</label><s> ₹ <?= number_format($result['mrp']); ?></s></h6>
	<h4 class="card-title text-success text-center"><label>Price:</label> ₹ 
		<?php 
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
</h4>
</div>
 
 <form action="single.php" method="POST">
      <input type="hidden" name="productname" value="<?php echo $result['productname']; ?>">
      <button type="submit" class="btn btn-outline-primary"  name="submit" style="margin-left: 30%; margin-bottom: 20px;">View Detail</button>
    </form>
  		</div>
  	</div>
  </div>

<?php
}
} else {
	?>

<div class="card-body">
	<h5 class="card-title text-dark text-center">0 Product Found</h5>
</div>

	<?php
}
?>

</div>
	
</div>
</div>
</div>
</body>
</html>