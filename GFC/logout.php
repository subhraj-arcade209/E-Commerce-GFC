<?php
session_start();
	unset($_SESSION['mailid']);
	session_destroy();
	header("Location: index.php");
?>