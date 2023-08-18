<link rel="stylesheet" href="CSS/cartheading.css">
<header class="header" style="background-color:rgba(20,0,0,0.4);">


   <div class="flex" style="margin-bottom:-15px;">

      <?php
      $dbServername = "localhost";
      $dbUsername = "root";
      $dbPassword = "";
      $dbName = "food";
      
      $connect = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);
      $select_rows = mysqli_query($connect, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);
      

      ?>

      <center style="background:transparent;text-transform: lowercase;font-family: 'Amita', cursive;font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email:  &nbsp;&nbsp;<?php echo $_SESSION['mailid'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name:&nbsp;&nbsp;<?php echo $_SESSION['first_name'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		<a href="logout.php" style="background:none;font-family: 'Amita', cursive;font-weight: 600; color:#99ffcc;text-decoration:underline;">Logout</a>
		</center>

      <a href="cart.php" class="cart" style="background:none;font-family: 'Amita', cursive;font-weight: 200;">cart <span><?php echo $row_count; ?></span> </a>

      <div id="menu-btn" class="fas fa-bars"></div>

   </div>

</header>