<?php 
include '../function/in-session.php';
require '../connect/connect.php';

ob_start();

if (isset($_POST['remove_stock'])) {
	echo "hello world";
	$supply_id = $_POST['supply_id'];


	echo $supply_id;


	$sql = "DELETE FROM stock_inventory WHERE id ='$supply_id'";
	$result = mysqli_query($connect,$sql);
	if ($result) {
		header("location:../inventory/add_stock.php?page=6");
		ob_clean();
	}
	else{
		echo "Failed";
	}
}



 ?>