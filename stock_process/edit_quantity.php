<?php 
include '../function/in-session.php';
require '../connect/connect.php';

ob_start();

if (isset($_POST['edit_quantity'])) {
	echo "hello world";
	$supply_id = $_POST['supply_id'];
	$quantity = $_POST['supplier_quantity'];


	echo $supply_id;
	echo $quantity;



	$sql = "UPDATE stock_inventory SET quantity = '$quantity' WHERE id ='$supply_id' ";
	$result = mysqli_query($connect,$sql);
	if ($result) {
		header("location:../inventory/add_stock.php?page=5");
		ob_clean();
	}
	else{
		echo "Failed";
	}
}



 ?>