<?php 		
		require('config.php');

		$sql = "UPDATE `myorder` SET `status`= 1 WHERE username = '$username' ";
		mysqli_query($conn,$sql);
		
		$sql = "DELETE FROM `cart` WHERE username = '$username'";
		mysqli_query($conn,$sql);
		
		$sql = "SELECT productname FROM `cart` WHERE username = '$username'";
		$query = mysqli_query($conn,$sql);

		while ($result = mysqli_fetch_array($query))
		 {
		 	$productname = $result['productname'];
   			$sql = "UPDATE `products` SET `quantity`= quantity-1 WHERE productname='$productname'";
			mysqli_query($conn,$sql); 
   		 }
 ?>