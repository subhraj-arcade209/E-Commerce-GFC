<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "food";

$connect = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);
session_start();
if($_SESSION['mailid']){

if(isset($_POST['order_btn'])){

      $first_name =  $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $mailid =  $_POST['mailid'];
		$mobile_no = $_POST['mobile_no'];
      $method = $_POST['method'];
		$address_line1 = $_POST['address_line1'];
		$address_line2 = $_POST['address_line2'];
		$state = $_POST['state'];
		$city = $_POST['city'];
		$pincode = $_POST['pincode'];

   $cart_query = mysqli_query($connect, "SELECT * FROM `cart`");
   $total=0;
   $pay_total=0;
   $delivery_charge=50;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
         $product_price = number_format($product_item['price'] * $product_item['quantity']);
         $grand_total = $total += $product_price;
         $pay_total=$grand_total+$grand_total*0.05+$delivery_charge;
      };
   };

   $total_product = implode(', ',$product_name);
   $detail_query = mysqli_query($connect, "INSERT INTO orders (id,first_name, last_name, mailid, mobile_no, method, address_line1, address_line2, state, city, pincode, total_products, total_price) VALUES ('','$first_name','$last_name','$mailid','$mobile_no', '$method','$address_line1','$address_line2','$state','$city','$pincode','$total_product','$pay_total')") or die('query failed');

   if($cart_query && $detail_query){
     
      $_SESSION['mailid'] = $mailid;
      $_SESSION['first_name']=$first_name;
      require "Mail/phpmailer/PHPMailerAutoload.php";
      $mail = new PHPMailer;

      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->Port = 587;
      $mail->SMTPAuth = true;
      $mail->SMTPSecure = 'tls';

      $mail->Username = 'manna80gita@gmail.com';
      $mail->Password = 'wumqwwkginyczcvg';

      $mail->setFrom('manna80gita@gmail.com', 'Order Details');
      $mail->addAddress($_POST["mailid"]);

      $mail->isHTML(true);
      $mail->Subject = "Your Order has been Confirmed By GFC";
      $mail->Body = "<div class='order-message-container'>
      <div class='message-container' style='background-color:orange;border:1px solid black;border-radius:20px; padding-left:20px;padding-bottom:20px;'>
         <h3 style='font-size: 2rem;color:black;font-family: Georgia, serif;'>thank you for shopping!</h3>
         <div class='order-detail'>
            <h5 style='font-family: Georgia, serif;font-size:15px;'>You have Ordered&nbsp;<span>".$total_product."</span></h5>
            <h5 style='font-family: Georgia, serif;font-size:15px;'><span class='total'> total : ₹".$pay_total."/-  </span></h5>
         </div>
         <div class='customer-details' style='font-family: Georgia, serif;'>
            <h6 style='color:black;font-size:15px;'> Your Name : <span>".$first_name."</span> </h6>
            <h6 style='color:black;font-size:15px;'> Your Number : <span>".$mobile_no."</span> </h6>
            <h6 style='color:black;font-size:15px;'> Your Email : <span>".$mailid."</span> </h6>
            <h6 style='color:black;font-size:15px;'> Your Address : <span>".$address_line1."</span><span>, ".$address_line2.", ".$state.", ".$city.", ".$pincode."</span> </h6>
            <h6 style='color:black;font-size:15px;'> Your Payment Mode : <span>".$method."</span> </h6>
            <h6 style='color:black;font-size:15px;'>(*Pay When Product Arrives*)</h6>
         </div>
            <a href='http://localhost/GFC/products.php' class='btn'style='background:green;color:black;padding:5px auto;font-size:20px;'>Continue Shopping</a>
         </div>
      </div>";

  if($mail->send()){
   $detail_query = mysqli_query($connect, "TRUNCATE TABLE cart") or die('query failed');

   ?>
       <script>
           alert("Your Order has been confirmed,Kindly Check your Mail for Further Information.");
           window.location.replace("products.php")
       </script>
       <?php
  }
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
   <title>Checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Lugrasimo&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Amita&family=Courgette&family=Grechen+Fuemen&family=Kalam:wght@700&family=Marck+Script&family=Satisfy&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Amita&family=Courgette&family=Marck+Script&family=Satisfy&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Amita&family=Grechen+Fuemen&family=Julee&family=Kalam:wght@700&family=Marck+Script&family=Satisfy&display=swap" rel="stylesheet">


   <!-- custom css file link  -->
   <link rel="stylesheet" href="CSS/carthead.css">

</head>
<body>
<?php include 'cartheader.php'; ?>
<div class="container">

<section class="checkout-form">

<div class="headcart">
<h1>
  <span>Complete&nbsp;</span>
  <span>Your&nbsp;</span>
  <span>Order&nbsp;</span>
  <span></span>

</h1>
    </div>

   <form action="" method="post" style="background-image:url('images/checkwal.jpg');">

   <div class="display-order">
      <?php
         $select_cart = mysqli_query($connect, "SELECT * FROM `cart`");
         $total = 0;
         $grand_total = 0;
         $pay_total=0;
         $delivery_charge=50;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = number_format($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total = $total += $total_price;
            $pay_total=$grand_total+$grand_total*0.05+$delivery_charge;
      ?>
      <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total"> grand total : ₹&nbsp;<?= $pay_total; ?>/- </span>
   </div>

      <div class="flex">
         <div class="inputBox">
            <span>your first name</span>
            <input type="text"  name="first_name" value="<?php echo $_SESSION['first_name']?>"required>
            <label for="">your first name</label>
         </div>
         <div class="inputBox">
            <span>your last name</span>
            <input type="text" name="last_name" value="<?php echo $_SESSION['last_name']?>"required>
         </div>
         <div class="inputBox">
            <span>your email</span>
            <input type="email" name="mailid" value="<?php echo $_SESSION['mailid']?>"required>
         </div>
         <div class="inputBox">
            <span>your number</span>
            <input type="number" name="mobile_no" value="<?php echo $_SESSION['mobile_no']?>"required>
         </div>
         <div class="inputBox">
            <span>payment method</span>
            <select name="method">
               <option value="cash on delivery" selected>Cash on Devlivery</option>
               <option value="credit cart">Credit Card</option>
               <option value="paypal">UPI</option>
            </select>
         </div>
         <div class="inputBox">
            <span>address line 1</span>
            <input type="text" name="address_line1" value="<?php echo $_SESSION['address_line1']?>"required>
         </div>
         <div class="inputBox">
            <span>address line 2</span>
            <input type="text" name="address_line2"  value="<?php echo $_SESSION['address_line2']?>"required>
         </div>
         <div class="inputBox">
            <span>city</span>
            <input type="text" name="city"  value="<?php echo $_SESSION['city']?>"required>
         </div>
         <div class="inputBox">
            <span>state</span>
            <input type="text" name="state"  value="<?php echo $_SESSION['state']?>"required>
         </div>
         <div class="inputBox">
            <span>pin code</span>
            <input type="text" name="pincode"  value="<?php echo $_SESSION['pincode']?>" required>
         </div>
      </div>
      <input type="submit" value="order now" name="order_btn" class="btn" style="width:20%;margin-left:30%;">
   </form>

</section>

</div>


<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>