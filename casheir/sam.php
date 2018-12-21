<?php 
include '../function/in-session.php';
require '../connect/connect.php';
ob_start();



$sql = "UPDATE minute_stock SET status='GOOD'";
$result = mysqli_query($connect,$sql);
if ($result) {
	echo "Success";
}
else{
	echo "Fail";
}



 ?>