<?php 

include '../function/in-session.php';
require '../connect/connect.php';


if (isset($_POST['remove'])) {
	$id = $_POST['id'];
	$remove = $_POST['remove_id'];

	$delete = "DELETE FROM minute_supplier_product where supply_product_id='$id'";
	$delete_sql = mysqli_query($connect,$delete);
	if ($delete_sql){
		header("location:../inventory/supplier_view_product.php?minute_supplier_id=$remove&&status=3");
		/*
		$delete1 = "DELETE FROM minute_stock where stock_id='$id'";
		$delete_sql2 = mysqli_query($connect,$delete1);
		if ($delete_sql2) {
		header("location:../inventory/supplier_view_product.php?minute_supplier_id=$remove&&status=3");
		}
		else{
		header("location:../inventory/supplier_view_product.php?minute_supplier_id=$remove&&status=4");
		}*/
	}
	else{
		header("location:../inventory/supplier_view_product.php?minute_supplier_id=$remove&&status=4");
	}
}

 ?>