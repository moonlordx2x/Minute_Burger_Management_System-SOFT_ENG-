<?php 
session_start();
if (isset($_SESSION['user'])) {
	header("location:../Minute_Burger/main_directory/home.php");
	exit();
}
?>