<?php 

include '../function/in-session.php';
require '../connect/connect.php';

if (isset($_POST['remove_record'])) {
	$remove_company_2 = $_POST['remove_company_2'];

	echo "$remove_company_2";


	$sql = "DELETE FROM minute_supplier_product WHERE 	supply_product_supplier = '$remove_company_2'";
	$result = mysqli_query($connect,$sql);
	if ($result) {
		$sql_2 = "DELETE FROM minute_supplier WHERE minute_supplier_company = '$remove_company_2'";
		$result_2 = mysqli_query($connect,$sql_2);
		if ($result_2) {
			header("location:../inventory/view_supplier.php?page=4");
		}
		else{
			header("location:../inventory/view_supplier.php?page=5");
		}
	}
	else{
		echo "Reject";
	}
}


 ?>