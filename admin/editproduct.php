<!DOCTYPE html>
<html>
<head>
	<title>Edit Product</title>
</head>
<body>

<?php include('adminheader.php') ?>

<div class="container">

	<div class="row">
	<div class="col-lg-12 text-center">
		<h3>Edit Product</h3>
	</div>
<div class="col-lg-8 m-auto d-block">
	<?php 
	require('../config.php');

if (isset($_POST['edit']))
{
	$id = $_POST['id'];
	$sql = "SELECT * FROM products where id = '$id'";
	$q = mysqli_query($conn,$sql);
}
while($result = mysqli_fetch_array($q))
{
	 ?>
<form action="" method="POST">

		<div class="form-group">
			<label for="ProductId"><b>ProductId: </b></label>
	 		<input type="text" name="ProductId" class="form-control" value="<?php echo $result['id'] ?>" readonly>
	 	</div>
		<div class="form-group">
			<label for="Productname"><b>Product Name: </b></label>
	 		<input type="text" name="productname" class="form-control" value="<?php echo $result['productname'] ?>">
	 	</div>
		<div class="form-group">
			<label for="Price"><b>Price: </b></label>
	 		<input type="text" name="price" class="form-control" value="<?php echo $result['price'] ?>">
	 	</div>
		<div class="form-group">
			<label for="description"><b>Description: </b></label>
	 		<input type="textarea" name="description" class="form-control" value="<?php echo $result['description'] ?>">
	 	</div>
		<div class="form-group">
			<label for="category"><b>Category: </b></label>
	 		<input type="text" name="category" class="form-control" value="<?php echo $result['category'] ?>">
	 	</div>
		<div class="form-group">
			<label for="subcategory"><b>Subcategory: </b></label>
	 		<input type="text" name="subcategory" class="form-control" value="<?php echo $result['subcategory'] ?>">
	 	</div>
		<div class="form-group">
			<label for="Brands"><b>Brands: </b></label>
	 		<input type="text" name="brand" class="form-control" value="<?php echo $result['brand'] ?>">
	 	</div>
		<div class="form-group">
			<label for="quantity"><b>Quantity: </b></label>
	 		<input type="number" name="quantity" class="form-control" required value="<?php echo $result['quantity'] ?>">
	 	</div>
		<div class="form-group">
	 		<input type="submit" name="update" class="form-control btn btn-outline-success" value="Update">
	 	</div>
	
</form>
<?php 
}?>
</div>
</div>
</div>
<?php 
if (isset($_POST['update']))
{
$id = $_POST['ProductId'];
$productname = $_POST['productname'];
$price = $_POST['price'];
$description = $_POST['description'];
$category = $_POST['category'];
$subcategory = $_POST['subcategory'];
$brand = $_POST['brand'];
$quantity = $_POST['quantity'];

	$sql = "UPDATE `products` SET `productname`='$productname',`price`='$price',`description`='$description',`category`='$category',`subcategory`='$subcategory',`brand`='$brand',`quantity`='$quantity' WHERE id = '$id'";
	$q = mysqli_query($conn,$sql);
	echo "<script>window.location.href='../manage_product.php';</script>";

}
 ?>

</body>
</html>