<?php 
include '../function/in-session.php'; 
require '../connect/connect.php';
ob_start();  

if (isset($_POST['setting'])) {
	$filter = $_POST['filter_1'];
	$month = $_POST['month_1'];

	header("location:monthly.php?date=$month&&filter=$filter");

}

 ?>