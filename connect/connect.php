<?php 
$connect = mysqli_connect('localhost','root','');
if (!$connect) {
	echo "Error Connection";
}

if (!mysqli_select_db($connect,'minute_burger')) {
	echo "Database Error Connection";
}
 ?>