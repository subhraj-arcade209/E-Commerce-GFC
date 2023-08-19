<?php
session_start();
if($_SESSION['mailid']){
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "food";

$connect = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($connect, "UPDATE `cart` SET quantity = '$update_value' WHERE id = '$update_id'");
   if($update_quantity_query){
      header('location:cart.php');
   };
};

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($connect, "DELETE FROM `cart` WHERE id = '$remove_id'");
   header('location:cart.php');
};

if(isset($_GET['delete_all'])){
   mysqli_query($connect, "DELETE FROM `cart`");
   header('location:cart.php');
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
   <title>Shopping Cart</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cookie&family=Courgette&family=Lugrasimo&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Amita&family=Courgette&family=Grechen+Fuemen&family=Kalam:wght@700&family=Marck+Script&family=Satisfy&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Amita&family=Courgette&family=Marck+Script&family=Satisfy&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Amita&family=Grechen+Fuemen&family=Julee&family=Kalam:wght@700&family=Marck+Script&family=Satisfy&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Rancho&display=swap" rel="stylesheet">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="CSS/carthead.css">

</head>
<body>
<?php include 'cartheader.php'; ?>
<div class="container">

<section class="shopping-cart">

<div class="headcart" style="margin-left:80px;">
<h1>
  <span>Shopping&nbsp;</span>
  <span>Cart&nbsp;</span>
  <span></span>

</h1>
    </div>

   <table>

      <thead>
         <th>image</th>
         <th>name</th>
         <th>price</th>
         <th>quantity</th>
         <th>total price</th>
         <th>action</th>
      </thead>

      <tbody>
         <?php 
         
         $select_cart = mysqli_query($connect, "SELECT * FROM `cart`");
         $grand_total = 0;
         $pay_total=0;
         $delivery_charge=50;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
         ?>

         <tr>
            <td><img src="images/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
            <td><?php echo $fetch_cart['name']; ?></td>
            <td>₹<?php echo number_format($fetch_cart['price']); ?>/-</td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['id']; ?>">
                  <input type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['quantity']; ?>" >
                  <input type="submit" value="update" name="update_update_btn">
               </form>   
            </td>
            <td>₹<?php echo $sub_total = number_format($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</td>
            <td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a></td>
         </tr>
         <?php
           $grand_total += $sub_total;  
           $pay_total=$grand_total+$grand_total*0.05+$delivery_charge;
            };
         };
         ?>
         <tr class="table-bottom">
            <td><a href="products.php" class="option-btn" style="margin-top: 0;">continue shopping</a></td>
            <td colspan="3">grand total</td>
            <td>₹<?php echo $pay_total; ?>/-<p style="color:white;font-size:15px;font-weight:600;font-family: Garamond, serif;">(*Delivery Charges 50 and GST 5%*)</p></td>
            <td><a href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> delete all </a></td>
         </tr>

      </tbody>

   </table>

   <div class="checkout-btn">
      <a href="checkout.php" class="btn <?= ($pay_total > 1)?'':'disabled'; ?>">procced to checkout</a>
   </div>

</section>

</div>
   
<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>