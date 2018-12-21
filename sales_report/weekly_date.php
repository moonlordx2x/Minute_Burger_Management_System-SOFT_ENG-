<?php 
include '../function/in-session.php'; 
require '../connect/connect.php';
ob_start();  

if (isset($_POST['submit'])) {
	$time = $_POST['calendar'];
	$time2 = $_POST['calendar_1'];
	header("location:weekly.php?date=$time&&date2=$time2");
}

 ?>