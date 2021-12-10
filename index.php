<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bmart</title>
    <link rel="stylesheet" href="css/Style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
<?php include ('header.php'); ?>

<div id="slider">
            <figure>
                <img src="images/offer2.jpg">
                <img src="images/offer3.jpg">
                <img src="images/offer4.jpg">
            </figure>
        </div>

<div class="ad">
  <img src="images/offer1.jpg" style="border:1px solid black; margin-bottom: 1px; margin-top: 1px;">
</div>
<div class="ad">
  <img src="images/paytm1.jpg" style="border:1px solid black;">
</div>
<br>

<div class="small-container">
  <div class="row">
  <?php 
  
                require_once "config.php";
                
                $q1 = "SELECT * FROM `products` WHERE category = 'vegetable' OR category = 'fruits' ORDER BY id DESC LIMIT 8";
                $qd = mysqli_query($conn ,$q1);

                while($result = mysqli_fetch_array ($qd))
                {
                  ?>

  <div class="col-4">
    
    <img src="<?php echo $result['image']; ?>" width="90%"><br>
      <h4><b><?php echo $result['productname'];  ?></b></h4>
      <p class="p1"><s>₹<?php echo $result['mrp'];  ?>/Kg </s></p>
      <p class="p2">₹<?php echo $result['price'];  ?>/Kg </p>
   <form action="single.php" method="POST">
      <input type="hidden" name="productname" value="<?php echo $result['productname']; ?>">
      <button type="submit" class="btn" name="submit">View Detail</button>
    </form>
</div>
  <?php
}
?>
  </div>
</div>


<div class="images">
  <img src="images/offer5.jpg" style="cursor: pointer; width: 100%;">
</div>
<br>
<div class="category-container">
  <h2 class="title">Shop By Categorys</h2>
  <div class="category-img">
    <div class="row">

<?php
                require_once "config.php";
                
                $q1 = "SELECT * FROM `cproducts` LIMIT 20";
                $qd = mysqli_query($conn ,$q1);

                while($result = mysqli_fetch_array ($qd))
                {
                  ?>

            <div class="col-4 col-category">
             <form action="product.php" method="POST">
              <input type="hidden" name="category-name" value="<?php echo $result['cname'];?>"> 
               <button type="submit" name="category">
                <img src="<?php echo $result['image']; ?>" width="90%"> 
              </button>
            </form>
          </div>
         <?php } ?>        
    </div>
 </div>
</div>


<div class="images">
  <img src="images/offer6.jpg">
</div>


<div class="container">
  <h2 class="title"> Brands </h2>
  <div class="row">
    <div class="col-5">
      <form action="product.php" method="POST">
      <input type="hidden" name="brandname" value="cococola" >
      <button type="submit" name="brands" style="outline: none; border: none;">
      <img src="images/coco-cola.jpg"></button>
    </form>
    </div>
    <div class="col-5">
      <form action="product.php" method="POST">
      <input type="hidden" name="brandname" value="amul" >
      <button type="submit" name="brands" style="outline: none; border: none;">
      <img src="images/amul.jpg">
    </button>
  </form>
    </div>
    <div class="col-5">
      <form action="product.php" method="POST">
      <input type="hidden" name="brandname" value="dettol" >
      <button type="submit" name="brands" style="outline: none; border: none;">
      <img src="images/dettol.jpg">
    </button>
  </form>
    </div>
    <div class="col-5">
      <form action="product.php" method="POST">
      <input type="hidden" name="brandname" value="loreal" >
      <button type="submit" name="brands" style="outline: none; border: none;">
      <img src="images/loreal.jpg">
      </button>
    </form>
    </div>
    <div class="col-5">
      <form action="product.php" method="POST">
      <input type="hidden" name="brandname" value="patanjali">
      <button type="submit" name="brands" style="outline: none; border: none; ">
      <img src="images/Patanjali.jpg">
    </button>
  </form>
    </div>
    
  </div>
  
</div>

<?php include ('footer.php'); ?>

  </body>
</html>
