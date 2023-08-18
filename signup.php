<!DOCTYPE html>
<html>

<head>
    <title>Insert Page</title>
</head>

<body>
    <center>
        <?php 
        
        session_start();
        $dbServername = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "food";
        
        $connect = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

        if (isset($_POST["register"])) {
            $mailid = $_POST["mailid"];
            $password = $_POST["password"];

            $check_query = mysqli_query($connect, "SELECT * FROM customers where mailid ='$mailid'");
            $rowCount = mysqli_num_rows($check_query);

            if (!empty($mailid) && !empty($password)) {
                if ($rowCount > 0) {
                    ?>
                    <script>
                        alert("User with email already exist!");
                        window.location.replace('addingform.php');

                    </script>
                    <?php
                } else {
                    $first_name = $_REQUEST['first_name'];
                    $last_name = $_REQUEST['last_name'];
                    $mailid = $_REQUEST['mailid'];
                    $password = $_REQUEST['password'];
                    $confirm_password = $_REQUEST['confirm_password'];
                    $mobile_no = $_REQUEST['mobile_no'];
                    $address_line1 = $_REQUEST['address_line1'];
                    $address_line2 = $_REQUEST['address_line2'];
                    $state = $_REQUEST['state'];
                    $city = $_REQUEST['city'];
                    $pincode = $_REQUEST['pincode'];
                    $password_hash = password_hash($password, PASSWORD_BCRYPT);

                    $result = mysqli_query($connect, "INSERT INTO customers  VALUES ('','$first_name','$last_name','$mailid','$password_hash','$confirm_password','$mobile_no','$address_line1','$address_line2','$state','$city','$pincode','')");


                    if ($result) {
                        $otp = rand(100000, 999999);
                        $_SESSION['otp'] = $otp;
                        $_SESSION['mailid'] = $mailid;
                        require "Mail/phpmailer/PHPMailerAutoload.php";
                        $mail = new PHPMailer;

                        $mail->isSMTP();
                        $mail->Host = 'smtp.gmail.com';
                        $mail->Port = 587;
                        $mail->SMTPAuth = true;
                        $mail->SMTPSecure = 'tls';

                        $mail->Username = 'manna80gita@gmail.com';
                        $mail->Password = 'wumqwwkginyczcvg';

                        $mail->setFrom('manna80gita@gmail.com', 'OTP Verification');
                        $mail->addAddress($_POST["mailid"]);

                        $mail->isHTML(true);
                        $mail->Subject = "Your verify code";
                        $mail->Body = "<p>Dear user, </p> <h3>Your verify OTP code is $otp <br></h3>
                    <br><br>
                    <p>With regrads,</p>
                    <h3 style='color:yellow;'>GFC</h3>";

                    if (!$mail->send()) {
                        ?>
                        <script>
                            alert("<?php echo "Register Failed, Invalid Email " ?>");
                        </script>
                        <?php
                    } else {
                        ?>
                        <script>
                            alert("<?php echo "Register Successfully, OTP sent to " . $mailid ?>");
                            window.location.replace('verification.php');
                        </script>
                        <?php
                    }
                }
            }
        }
    }
        ?>
    </center>
</body>

</html>