<?php 
include '../function/in-session.php'; 
require '../connect/connect.php';
ob_start();  

if (isset($_POST['setting'])) {
	$filter = $_POST['filter_1'];
	$time = $_POST['calendar'];
	$time2 = $_POST['calendar_1'];

	header("location:weekly.php?date=$time2&&date2=$time&&filter=$filter");

}

 ?>