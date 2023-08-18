Keep all the files under htdocs as folder GFC


How the website functions are completely described in the video https://appopener.com/yt/pksix9n9d

You have to change it to use the mailing properly.

Use your personal  details in the SMTP part in Signup.php;

$mail->Username = 'Your Email Id';
$mail->Password = 'Mail app token';
$mail->setFrom('Your Email Id', 'OTP Verification');

Use your personal  details in the SMTP part in Recover_psw.php;

$mail->Username = 'Your Email Id';
$mail->Password = 'Mail app token';
$mail->setFrom('Your Email Id', 'Password Reset');


Use your personal  details in the SMTP part in checkout.php;

$mail->Username = 'Your Email Id';
$mail->Password = 'Mail app token';
$mail->setFrom('Your Email Id', 'Order Details');
