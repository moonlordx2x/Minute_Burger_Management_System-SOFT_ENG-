<?php 

include '../function/in-session.php';
require '../connect/connect.php';


if (isset($_POST['submit_remove'])) {
	$id = $_POST['remove_supplies_id'];
	$remove = $_POST['remove_supplies_hidden'];

	$delete = "DELETE FROM supplier_product where id='$id'";
	$delete_sql = mysqli_query($connect,$delete);
	if ($delete_sql) {
		header("location:../inventory/supplier_add_product.php?minute_supplier_id=$remove&&added=1");
	}
	else{
		header("location:../inventory/supplier_add_product.php?minute_supplier_id=$remove&&added=4");
	}


}

 ?>