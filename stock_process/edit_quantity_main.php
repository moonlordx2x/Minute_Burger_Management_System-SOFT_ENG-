<?php 
include '../function/in-session.php';
require '../connect/connect.php';

ob_start();

if (isset($_POST['submit_supply'])) {
	echo "hello world";
	$supply_id = $_POST['supply_id'];
	$supply_name = $_POST['supply_name'];
	$quantity = $_POST['supplier_quantity'];
	$quantity2 = $_POST['quantity'];

	$total = $quantity + $quantity2;
	echo $supply_id;
	echo $quantity;
	echo $quantity2;

	$checking = "SELECT * FROM minute_supplier_product where supply_product_name ='$supply_name'";
	$checking_result = mysqli_query($connect,$checking);
	if (mysqli_num_rows($checking_result) == 1) {

	$sql = "UPDATE minute_stock SET stock_quantity = '$total' WHERE stock_id ='$supply_id' ";
	$result = mysqli_query($connect,$sql);
	if ($result) {
		header("location:../inventory/view_stock.php?page=2");
		ob_clean();
	}
	else{
		header("location:../inventory/view_stock.php?page=3");
		ob_clean();
	}
		
	}
	else{
		header("location:../inventory/view_stock.php?page=5");
		ob_clean();
	}
}



 ?>