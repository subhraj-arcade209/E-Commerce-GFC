<?php
session_start();
if($_SESSION['mailid']){
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "food";

$connect = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);


if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;

   $select_cart = mysqli_query($connect, "SELECT * FROM `cart` WHERE name = '$product_name'");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart';
   }else{
      $insert_product = mysqli_query($connect, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
      $message[] = 'product added to cart succesfully';
   }
}
}
else{
   header("location:login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Lugrasimo&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Amita&family=Courgette&family=Grechen+Fuemen&family=Kalam:wght@700&family=Marck+Script&family=Satisfy&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Amita&family=Courgette&family=Marck+Script&family=Satisfy&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Amita&family=Grechen+Fuemen&family=Julee&family=Kalam:wght@700&family=Marck+Script&family=Satisfy&display=swap" rel="stylesheet">
<title>Our Menu</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="CSS/carthead.css">
</head>
<body> 
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>
<?php include 'cartheader.php'; ?>

<div class="search-container">
        <form action="search.php" method="POST">
            <input type="text" name="search" placeholder="Type to search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
<div class="container">
<section class="products">
<div class="headcart">
<h1>
  <span>Our&nbsp;</span>
  <span>Lucious&nbsp;</span>
  <span>Items&nbsp;</span>
  <span></span>

</h1>
    </div>

   <div class="box-container">

      <?php
      
      $select_products = mysqli_query($connect, "SELECT * FROM `products`");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>

      <form action="" method="post">
         <div class="box">
            <img src="images/<?php echo $fetch_product['image']; ?>" alt="">
            <h3><?php echo $fetch_product['name']; ?></h3>
            <div class="price">₹<?php echo $fetch_product['price']; ?>/-</div>
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
            <input type="submit" class="btn" value="add to cart" name="add_to_cart">
         </div>
      </form>

      <?php
         };
      };
      ?>
   </div>

</section>

</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>