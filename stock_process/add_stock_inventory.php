<?php 
include '../function/in-session.php';
require '../connect/connect.php';
ob_start();

if (isset($_POST['submit_supply'])) {
	$id = $_POST['supply_id'];
	$name  = $_POST['supply_name'];
	$supplier  = $_POST['supply_supplier'];
	$category  = $_POST['supply_category'];
	$price  = $_POST['supply_price'];
	$quantity  = $_POST['supplier_quantity'];
	$filter = $_POST['filter'];
	echo "$id<br>";
	echo "$name<br>";
	echo "$supplier<br>";
	echo "$category<br>";
	echo "$price<br>";
	echo "$quantity<br>";

	$stock = "SELECT * FROM minute_stock WHERE stock_id ='$id' AND stock_name = '$name'";
	$stock_result = mysqli_query($connect,$stock);
	if (mysqli_num_rows($stock_result) == 1) {
		header("location:../inventory/add_stock.php?page=3&&filter=$filter");
		ob_clean();
	}
	else{

	$sql = "INSERT INTO stock_inventory(id,name,supplier,category,price,quantity)
			values('$id','$name','$supplier','$category','$price','$quantity')";
	$result = mysqli_query($connect,$sql);
	if ($result) {
		header("location:../inventory/add_stock.php?page=1&&filter=$filter");
		ob_clean();
	}
	else{
		header("location:../inventory/add_stock.php?page=2&&filter=$filter");
		ob_clean();
	}

	}

}




 ?>