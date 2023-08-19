<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Courgette' rel='stylesheet'>
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Courgette&family=Satisfy&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Amita&family=Courgette&family=Marck+Script&family=Satisfy&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="CSS/login.css">
	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Courgette&family=Marck+Script&family=Satisfy&display=swap');
		input[type=submit] {
			position: relative;
			background-color: #ff4d4d;
			border: none;
			border-radius: 10px;
			font-size: 20px;
			color: #4d0000;
			padding: 5px;
			width: 100px;
			text-align: center;
			transition-duration: 0.2s;
			text-decoration: none;
			overflow: hidden;
			cursor: pointer;
			box-shadow: 0 8px #664400;
			margin-left:100px;
			margin-top:40px;
			margin-bottom:10px;
			font-family: 'Courgette', cursive;
			|
		}

		input[type=submit]:hover {
			background-color: #ace600;
		}

		input[type=submit]:active {
			background-color: 	 #cc8800;
			box-shadow: 0 5px #000000;
			transform: translateY(4px);
		}
	</style>
</head>

<body>
	<section>
	<video autoplay loop muted plays-inline class="loginback-video">
      <source src="images/bbq.mp4" type="video/mp4">
    </video>
		<div class="form-box"><a href="index.php" class="close"></a>
			<div class="form-value">
				<form action="" method="post">
					<h2>Login</h2>
					<div class="inputbox">
						<ion-icon name="mail-outline"></ion-icon>
						<input type="email" name="mailid" required>
						<label for="">Email</label>
					</div>
					<div class="inputbox">
						<ion-icon name="eye-off" onclick="showPass()"></ion-icon>
						<input type="password" name="password" id="myInput"required>
						<label for="">Password</label>
						
					</div>
					<div class="forget">
						<label for=""><a href="recover_psw.php">Forget Password?</a></label>

					</div>
					<input type="submit" name="submit" value="LogIn">
					<div class="register">
						<p>Don't have an account ? &nbsp;&nbsp; <a href="addingform.php">Register</a></p>
					</div>
				</form>
			</div>
		</div>
	</section>
	<?php
	session_start();
	if (isset($_POST['submit'])) {
		$connection = mysqli_connect("localhost", "root", "");
		$db = mysqli_select_db($connection, "food");
		$query = "select * from customers where mailid = '$_POST[mailid]'";
		$query_run = mysqli_query($connection, $query);
		while ($row = mysqli_fetch_assoc($query_run)) {
			if ($row['mailid'] == $_POST['mailid']) {
				if ($row['confirm_password'] == $_POST['password'] && $row["status"] == 1 ) {

					$_SESSION['first_name'] = $row['first_name'];
					$_SESSION['last_name'] = $row['last_name'];
					$_SESSION['mobile_no'] = $row['mobile_no'];
					$_SESSION['mailid'] = $row['mailid'];
					$_SESSION['address_line1'] = $row['address_line1'];
					$_SESSION['address_line2'] = $row['address_line2'];
					$_SESSION['city'] = $row['city'];
					$_SESSION['state'] = $row['state'];
					$_SESSION['pincode'] = $row['pincode'];
					?>

					<script>
              alert("You have logged in Successfully");
              window.location.href="products.php";
          </script>
		  <?php
				} else {
					?>
					<script>
              alert("email or password invalid or You have not verified, Currently check your mail & please try again.");
          </script>
					<?php
				}
			}
			
		}
	}
	?>
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
	<script>
function showPass() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</body>

</html>