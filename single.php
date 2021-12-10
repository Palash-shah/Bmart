<px;?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Product</title>
	<link rel="stylesheet" type="text/css" href="css/nstyle.css">
<style>
.col-2 img{
	margin-right: 10%;
	width: 80%;
	padding: 50px 0;
}
.description{
        font-size: 15px;
        margin-right : 20%;
}
</style>
</head>
<body>
	<?php include('header.php') ?>
<!-- -----------------single product details----------- -->
<div class="small-container single-product">
	<div class="row">
		<?php
			require_once "config.php";
								
								if (isset($_POST['submit']))
								 {
								$search = $_POST['productname'];
								$q1 = "SELECT * FROM `products` WHERE productname = '$search'";
								$qd = mysqli_query($conn ,$q1);
								}
								elseif (isset($_POST['search']))
								{
								$search = $_POST['browser'];
								$q1 = "SELECT * FROM `products` WHERE productname = '$search'";
								$qd = mysqli_query($conn ,$q1);
								}
								elseif (empty($_POST[''])) 
								{
    						    echo "<script>alert('Something went wrong');
  	         							   window.location.href='index.php';</script>"; 
  								}
  								elseif (count($q1)==0) 
  								{
  								echo "<script>alert('Product Not Found');
  	         							   window.location.href='product.php';</script>"; 	
  								}
								while($result = mysqli_fetch_array ($qd))
								{
								?>


		<div class="col-2">
			<img src="<?php echo $result['image']; ?>" width="100%" id="ProductImg">
				</div>
		<div class="col-2">
			<p>Home / <?php echo $result['category']; ?></p>
			<h1><?php echo $result['productname']; ?></h1>
			<h3 style="color: red;"><label style="color: black;">MRP:</label> <del> ₹ <?php echo $result['mrp']; ?></del></h3>
			<h4 style="color: green;"><label style="color: black;">Price:</label> ₹ <?php echo $result['price']; ?></h4>
			<h3 style="color: blue;"><label style="color: black;">Availability:</label> <?php 

      	if ($result['quantity']>0)
        {
      		echo "In Stock";
      		?>


      	<form action="cart.php" method="POST">
			<h3 style="color: blue;"><label style="color: black; margin-top: 20px;">Quantity:</label>
      		<input type="number" name="quantity" placeholder="Quantity" value="1" style="width: 50px;padding: 5px;margin-left: 5px; margin-top: 20px;" autocomplete="off" min="1" max="<?php echo $result['quantity'] ?>"><br><br>
			<button class="btn" name="Add_to_Cart" type="submit"><span>Add to Cart</span></button> 
			<input type="hidden" name="productname" value="<?php echo $result['productname']  ?>">
			<input type="hidden" name="price" value="<?php echo $result['price'] ?>">
			<input type="hidden" name="category" value="<?php echo $result['category'] ?>">
			<button class="btn"><span>Buy Now</span></button>
		</form>
	<?php
      	}
      	else{
      		echo "Out of Stock";
      		echo "<p style = 'margin-bottom:20px;'></p>";
      	} 
      	?></h3>
			<h3>Product Detalis <i class="fa fa-indent"></i></h3><br>
			<p class="description"><?php echo $result['description']; ?></p>
		<?php
		$view = $result['category'];
		$ProductID = $result['id'];
			}
			?>
		</div>
					</div>
</div>

<!-------------------title--------- -->
	<div class="small-container">
		<div class="row row-2">
			<h2>Related Product</h2>
			<a href="product.php">
			<p>View More</p></a>
			
			</div>
		</div>
<link rel="stylesheet" type="text/css" href="css/Style.css">
<div class="small-container">
  <div class="row r-row">
  
<?php 
  
                require_once "config.php";
                
                $q2 = "SELECT DISTINCT * FROM `products` WHERE category = '$view' ORDER BY id DESC limit 4";
                $qd = mysqli_query($conn ,$q2);

                while($result = mysqli_fetch_array ($qd))
                {
                  ?>

  <div class="col-4">
    
    <img src="<?php echo $result['image']; ?>" width="90%"><br>
      <h4><b><?php echo $result['productname'];  ?></b></h4>
    
      <p><s><?php echo "₹ ".$result['mrp'];  ?></s></p>
      <p style="color: green;"><?php echo "₹ ".$result['price'];  ?></p>
  	 <form action="single.php" method="POST">
      <input type="hidden" name="productname" value="<?php echo $result['productname']; ?>">
      <button type="submit" class="btn" name="submit"><span>View Detail</span></button>
    </form> 
</div>
  <?php
}
?>

  </div>
</div>

<!-- ------------footer----------- -->
<?php include ("footer.php"); ?>

<!-- -------------js for product gallery--------- -->

<!-- <script>
	var ProductImg = document.getElementById("ProductImg");
	var SmallImg =   document.getElementsByClassName("small-img");
	
	SmallImg[0].onclick = function()
	{
		ProductImg.src = SmallImg[0].src;
	}
	SmallImg[1].onclick = function()
	{
		ProductImg.src = SmallImg[1].src;
	}
	SmallImg[2].onclick = function()
	{
		ProductImg.src = SmallImg[2].src;
	}
	SmallImg[3].onclick = function()
	{
		ProductImg.src = SmallImg[3].src;
	}

</script>
 -->
 </body>
</html>