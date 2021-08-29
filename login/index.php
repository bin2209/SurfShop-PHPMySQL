<?php 
session_start();

if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) { 
	header("Location: ../member");
}else {
	header("Location: login.php");
}
?>
