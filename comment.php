<?php 
session_start();
require 'config.php';

      if (isset($_POST['comment'])) 
      {
      if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
      {
      echo "<script>window.location.href='login.php';</script>";
      }
      else {
      $id = $_SESSION['id'];  
      $q = "SELECT fname FROM `users` WHERE id = '$id'";
      $query = mysqli_query($conn,$q);
      $result1 = mysqli_fetch_array($query);    
        
        $fname = $result1['fname']; 
        $comment =$_POST['message'];
        $id =$_POST['id'];
        $sql = "INSERT INTO `review`(`ProductID`, `fname`, `comment`) VALUES ('$id','$fname','$comment')";
      $query = mysqli_query($conn,$sql);
      echo "<script>alert('Thanks For Your Review');window.location.href='product.php';</script>";

}
}
?>