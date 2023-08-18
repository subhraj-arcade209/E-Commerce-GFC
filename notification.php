<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="shortcut icon" type="image/png" href="../images/favicon.png">
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
    <!------ Include the above in your HEAD tag ---------->
    <title>Notification</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Courgette&family=Marck+Script&family=Satisfy&display=swap');
body{
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}
hr.message-inner-separator
{
    border: 0;
    height: 1px;
}
.card p{
    font-size:20px;
    font-family: 'Satisfy', cursive;
    font-weight:900;
    color:blueviolet;
    letter-spacing:2px;
    
}
.close {
    position: absolute;
    right: 32px;
    top: 32px;
    width: 32px;
    height: 32px;
    opacity: 0.6;
  }
  .close:hover {
    opacity: 1;
  }
  .close:before, .close:after {
    position: absolute;
    left: 20px;
    content: ' ';
    height: 23px;
    width: 4px;
    background-color: #fe0505;
  }
  .close:before {
    transform: rotate(45deg);
  }
  .close:after {
    transform: rotate(-45deg);
  }
</style>
<body style="background-image:url('images/recwall.jpg');">
            <div class="card">
                <div class="alert alert-success" style="  height :200px;width:730px;margin-left:30%;border-radius:20px;margin-top:30%;background-color:white;backdrop-filter: blur(6px);">
                <a href="index.php" class="close"></a>
                   <span class="glyphicon glyphicon-ok"></span> <strong style="font-size:30px;
                   font-family: 'Courgette', cursive;
                   font-weight:900;
                   color:rgb(23, 236, 12);text-shadow:1px 1px black;">Success</strong>
                    <hr class="message-inner-separator">
                    <p>
                        Email sent out !  Kindly check your email inbox to reset your password.  <i class="fas fa-envelope" style="color: black;"></i></p>
            </div>
        </div>
</body>
</html>