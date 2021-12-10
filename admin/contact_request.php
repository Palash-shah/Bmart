<?php

session_start();

if(!isset($_SESSION['adminlogin']) || $_SESSION['adminlogin'] !==true)
{
    header("location: ../adminpanal.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Contact Request Page</title>
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
	<?php include ('adminheader.php'); ?>

<div class="container">
<table class="table table-border table-hover table-striped " style="border: 2px solid black;">
	<tr class="bg-light text-black text-center">
		<th>S.NO.</th>
		<th>NAME</th>
		<th>Email</th>
		<th>SUBJECT</th>
		<th>MESSAGE</th>
		<th>DELETE</th>
	</tr>
 <?php 
		    require_once('../config.php');

			$q1 = "SELECT * FROM `contact`";
			$query1 = mysqli_query($conn , $q1);
			while($result= mysqli_fetch_assoc($query1)){
			?>	
			<tr class="text-center">
				<td><?php echo $result['id']; ?></td>
				<td><?php echo $result['name']; ?></td>
				<td><?php echo $result['email']; ?></td>
				<td><?php echo $result['subject']; ?></td>
				<td><?php echo $result['message']; ?></td>

		<td><form action="" method="POST">
			<button class="btn btn-outline-danger" name="delete" type="submit">Delete</button> 
			<input type="hidden" name="id" value="<?php echo $result['id']  ?>">
		</form></td>
			</tr>
<?php	
			}			    
?>

<table>

</div>
<?php
require_once('../config.php');

if (isset($_POST['delete'])) 
{
	$id = $_POST['id'];
	$q = "DELETE FROM `contact` WHERE id = $id ";
	$q1 = mysqli_query($conn , $q);
	echo "<script>window.location.href='contact_request.php';</script>";
}
?>
</script>
</body>
</html>