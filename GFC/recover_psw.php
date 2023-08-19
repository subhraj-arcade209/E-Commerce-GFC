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
    <link rel="stylesheet" href="CSS/recpas.css">
    

    <!-- Bootstrap CSS -->
    <title>Password Recovery</title>
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
			|
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
</head>

<body style="background-image:url('images/recwall.jpg');">

<main class="login-form">
    <div class="cotainer-pass">
                <div class="card">
                    <div class="card-header">Password Recovery</div>
                    <div class="card-body">
                        <form action="#" method="POST" name="recover_psw">
                        
                            <div class="inputbox">
						<ion-icon name="mail-outline"></ion-icon>
						<input type="email" name="mailid" required autofocus>
						<label for="">Email Address</label>
					</div>

                            <div class="submission">
                                <input type="submit" value="Recover" name="recover">
                            </div>
                    </div>
                    </form>
                </div>
            </div>
    </div>

</main>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>

<?php 
    if(isset($_POST["recover"])){
        $dbServername = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "food";
        
        $connect = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);
        $mailid= $_POST["mailid"];

        $sql = mysqli_query($connect, "SELECT * FROM customers WHERE mailid='$mailid'");
        $query = mysqli_num_rows($sql);
  	    $fetch = mysqli_fetch_assoc($sql);

        if(mysqli_num_rows($sql) <= 0){
            ?>
            <script>
                alert("<?php  echo "Sorry, no emails exists "?>");
            </script>
            <?php
        }else if($fetch["status"] == 0){
            ?>
               <script>
                   alert("Sorry, your account must verify first, before you recover your password !");
                   window.location.replace("index.php");
               </script>
           <?php
        }else{
            // generate token by binaryhexa 
            $token = bin2hex(random_bytes(50));

            //session_start ();
            $_SESSION['token'] = $token;
            $_SESSION['mailid'] = $mailid;

            require "Mail/phpmailer/PHPMailerAutoload.php";
            $mail = new PHPMailer;

            $mail->isSMTP();
            $mail->Host='smtp.gmail.com';
            $mail->Port=587;
            $mail->SMTPAuth=true;
            $mail->SMTPSecure='tls';

            // h-hotel account
            $mail->Username='manna80gita@gmail.com';
            $mail->Password='wumqwwkginyczcvg';

            // send by h-hotel email
            $mail->setFrom('manna80gita@gmail.com', 'Password Reset');
            // get email from input
            $mail->addAddress($_POST["mailid"]);
            //$mail->addReplyTo('lamkaizhe16@gmail.com');

            // HTML body
            $mail->isHTML(true);
            $mail->Subject="Recover your password";
            $mail->Body="<b>Dear User</b>
            <h3>We received a request to reset your password.</h3>
            <p>Kindly click the below link to reset your password</p>
            http://localhost/GFC/reset_psw.php
            <br><br>
            <p>With regrads,</p>
            <b>Programming with Lam</b>";

            if(!$mail->send()){
                ?>
                    <script>
                        alert("<?php echo " Invalid Email "?>");
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        window.location.replace("notification.php");
                    </script>
                <?php
            }
        }
    }


?>
