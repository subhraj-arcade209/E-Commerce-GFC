<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Search your Desire</title>
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Lugrasimo&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Amita&family=Courgette&family=Grechen+Fuemen&family=Kalam:wght@700&family=Marck+Script&family=Satisfy&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Amita&family=Courgette&family=Marck+Script&family=Satisfy&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Amita&family=Grechen+Fuemen&family=Julee&family=Kalam:wght@700&family=Marck+Script&family=Satisfy&display=swap" rel="stylesheet">

   <link rel="stylesheet" href="CSS/carthead.css">
</head>
<body>
<?php
session_start();
error_reporting(E_ERROR|E_PARSE);
try{
   $db=new PDO("mysql:host=localhost;dbname=food;charset=utf8","root","");
   $connection = mysqli_connect("localhost","root","");
   $conn = mysqli_connect('localhost','root','','food') or die('connection failed');
   $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');

}catch(PDOException $e){
   echo $e->getMessage();
};

if($_POST["search"]==""){
   echo"<h2> No results Found</h2>";
   echo"<a href='products.php'>Exit</a>";

}else if($_POST["search"]!=""){
   $search=trim($_POST["search"]);
   
   $query=$db->prepare("SELECT * FROM products WHERE name like '%$search%' OR price like '%$search%'");
   $query->execute(array());
   $control=$query->fetchAll(PDO::FETCH_OBJ);
   $count=$query->rowCount();
   if($count>0){ ?>
<div class="container">
<div class="headcart">
<h1 style="margin-top:30px;">
  <span>Related&nbsp;</span>
  <span>Items&nbsp;</span>
  <span></span>

</h1>
    </div>
<section class="products">
<div class="box-container">

   <?php
   foreach($control as $fetch_product){?>
   <form action="" method="post">
         <div class="box">
            <img src="images/<?php echo $fetch_product->image; ?>" alt="">
            <h3><?php echo $fetch_product->name; ?></h3>
            <div class="price">$<?php echo $fetch_product->price; ?>/-</div>
            <input type="hidden" name="product_name" value="<?php echo $fetch_product->name; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product->price; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product->image; ?>">
            <input type="submit" class="btn" value="add to cart" name="add_to_cart">
         </div>
      </form>
<?php

} ?>
   </div>
   </div>
      </div>
<?php }else{
    echo"<h2> No results Found</h2>";
    echo"<a href='products.php'>Exit</a>";

   }
}

?>

<?php
if(isset($_POST['add_to_cart'])){

$product_name = $_POST['product_name'];
$product_price = $_POST['product_price'];
$product_image = $_POST['product_image'];
$product_quantity = 1;


$select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");

if($count> 0){
   $message[] = 'product already added to cart';
}else{
   $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
   header("Location:products.php");
}
}
?>

   
</body>
</html>