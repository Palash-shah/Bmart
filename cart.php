<?php
session_start();
require('config.php');

if (isset($_POST['Add_to_Cart']))
{ 

      if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
      {
      echo "<script>alert('First Create Your Account');
        window.location.href='login.php';</script>";
      }
      else{      
      $username = $_SESSION['username'];
	    $productname = $_POST['productname']; 
	    $price = $_POST['price']; 
      $quantity = $_POST['quantity']; 
      $category = $_POST['category']; 
      
    $q = "SELECT * FROM `cart` WHERE username = '$username' AND productname = '$productname'";
    $query = mysqli_query($conn,$q);
    
    if (mysqli_num_rows($query)>0)
    {
      echo "<script>alert('item already added');window.location.href='mycart.php';</script>";
    }
    else
    {  
      $qd = "INSERT INTO `cart`(`productname`,`price`,`username`,`quantity`,`category`) VALUES ('$productname','$price','$username','$quantity','$category')";
      $query = mysqli_query($conn,$qd);
      echo "<script>alert('item Added Successfully');window.location.href='mycart.php';
         </script>";
    }
  }
}
if (isset($_POST['Remove_Item']))
{
  $id = $_POST['id'];
  $query="DELETE FROM `cart` WHERE id = '$id'";
  mysqli_query($conn,$query);
  echo "<script>alert('item Removed');
        window.location.href='mycart.php';</script>"; 
}
  ?>
