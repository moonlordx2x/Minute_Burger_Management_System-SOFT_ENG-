<?php 
include '../function/in-session.php'; 
require '../connect/connect.php';
ob_start();  

if (isset($_POST['setting'])) {
	$filter = $_POST['filter_1'];
	$time = $_POST['calendar'];
	

	header("location:daily.php?date=$time&&filter=$filter");

}

 ?>