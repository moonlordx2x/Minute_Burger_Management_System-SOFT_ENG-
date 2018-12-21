<?php 
include '../function/in-session.php';
require '../connect/connect.php';
ob_start();

if (isset($_POST['remove_stock'])){
		echo "Hello";
		$id = $_POST['supply_id'];

	$sql = "DELETE FROM minute_stock WHERE stock_id=$id";
	$result = mysqli_query($connect,$sql);
	if ($result) {

		$delete = "DELETE FROM stock_inventory";
		$delete_record = mysqli_query($connect,$delete);
		if ($delete_record) {
			header("location:../inventory/view_stock.php?page=1");
			ob_clean();
		}
		else{
			header("location:../inventory/view_stock.php?page=4");
			ob_clean();
		}
	}
	else{
			header("location:../inventory/view_stock.php?page=4");
			ob_clean();
	}

}




 ?>