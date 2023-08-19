<?php session_start() ?>

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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="CSS/recpas.css">
    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Courgette&family=Marck+Script&family=Satisfy&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Cookie&family=Lugrasimo&display=swap');
        input[type=submit] {
			position:absolute;
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
			margin-left:250px;
			margin-top:40px;
			margin-bottom:10px;
			font-family: 'Courgette', cursive;
            font-weight:900;
            outline:3px solid #330000;
            outline-offset:-4px;
            transition:0.2s;
			
		}

		input[type=submit]:hover {
			background-color: #ace600;
		}

		input[type=submit]:active {
			background-color: 	 #cc8800;
			box-shadow: 0 5px #000000;
            outline-offset:6px;
			transform: translateY(4px);
		}
        </style>
    <title>Verify Your Account</title>
</head>
<body style="background-image:url('images/recwall.jpg');">

<main class="login-form">
    <div class="cotainer-pass">
                <div class="card" style=" border:4px solid rgb(253, 122, 0);
    background:transparent;
    border-style: dotted;
    border-radius:20px;
    backdrop-filter: blur(6px);
    box-shadow: 15px 15px 15px rgba(4, 182, 114, 0.6);">
                    <div class="card-header">Verification Account</div>
                    <div class="card-body">
                        <form action="#" method="POST">
                        <div class="inputbox">
                        
                                    <input type="text" id="otp"  name="otp_code" required autofocus>
                                    <label for="">OTP Code</label>
                                
                            </div>

                            <div class="submission">
                                <input type="submit" value="Verify" name="verify">
                            </div>
                    </div>
                    </form>
                </div>
    </div>
    </div>

</main>
</body>
</html>
<?php 
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "food";
    
    $connect = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);
    if(isset($_POST["verify"])){
        $otp = $_SESSION['otp'];
        $mailid = $_SESSION['mailid'];
        $otp_code = $_POST['otp_code'];

        if($otp != $otp_code){
            ?>
           <script>
               alert("Invalid OTP code");
           </script>
           <?php
        }else{
            mysqli_query($connect, "UPDATE customers SET status='1' WHERE mailid = '$mailid'");
            ?>
             <script>
                 alert("Verfiy account done, you may sign in now");
                   window.location.replace("index.php");
             </script>
             <?php
        }

    }

?>