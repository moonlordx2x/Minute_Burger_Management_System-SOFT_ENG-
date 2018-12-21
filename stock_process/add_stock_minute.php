<?php 
include '../function/in-session.php';
require '../connect/connect.php';
ob_start();

if (isset($_POST['submit_stock'])){
		echo "Hello";

	$sql = "INSERT INTO minute_stock(stock_id,stock_name,stock_supplier,stock_category,stock_price,stock_quantity) 
							SELECT 	id,name,supplier,category,price,quantity FROM stock_inventory";
	$result = mysqli_query($connect,$sql);
	if ($result) {

		$delete = "DELETE FROM stock_inventory";
		$delete_record = mysqli_query($connect,$delete);
		if ($delete_record) {
			header("location:../inventory/add_stock.php?page=4");
			ob_clean();
		}
		else{
			echo "Failed to insert";
		}
	}
	else{
		echo "Fail";
	}

}




 ?>