
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="CSS/recpas.css">

    <link rel="icon" href="Favicon.png">

    <title>Reset Your Password</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Courgette&family=Marck+Script&family=Satisfy&display=swap');
	 @import url('https://fonts.googleapis.com/css2?family=Cookie&family=Lugrasimo&display=swap');
        input[type=submit] {
			position: relative;
			background-color: #ff4d4d;
			border: none;
			border-radius: 10px;
			font-size: 18px;
			color: black;
			padding: 5px;
			width: 100px;
			text-align: center;
			transition-duration: 0.2s;
			text-decoration: none;
			overflow: hidden;
			cursor: pointer;
			box-shadow: 0 8px #664400;
			margin-bottom:10px;
			font-family: 'Courgette', cursive;
            font-weight:900;
			margin-left: -20px;
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
<body style="background-image:url('images/recwall.jpg');">
<center>
    <div class="cotainer-pass">
                <div class="card" style="margin-right:60%;">
                    <div class="card-header">Reset Your Password</div>
					<form action="" method="POST" name="login">
                    
					<div class="inputbox">
					<ion-icon name="mail-outline"></ion-icon>
						<input type="email" name="mailid" required>
						<label for="">Email</label>
					</div>
                    <div class="inputbox">
						<input type="password" name="password" id="myInput" required >
						<label for="password">New Password</label><ion-icon name="eye-off" onclick="showPass()"></ion-icon>
					</div>

                    <div class="submission">
                                <input type="submit" value="Reset" name="reset">
                            </div>
                    </div>
                    </form>
                </div>
    </div>
	</div>
		</center>

		<?php
		error_reporting(0);
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"food");
	$ma= $_POST["mailid"];

	$password_hash = password_hash($_POST["password"], PASSWORD_BCRYPT);
	if (isset($_POST["reset"])) {
	$query = "update customers set password='$password_hash ',confirm_password='$_POST[password]' where mailid = '$ma'";
	$query_run = mysqli_query($connection,$query);
 ?>
	<script>
	alert("Your Password have been Updated");
	  window.location.replace("login.php");
    </script>
	<?php
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

