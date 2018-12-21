<?php 

include '../function/in-session.php';
require '../connect/connect.php';

if (isset($_POST['Supplier_submit'])) {

		$Supplier_Name = strtoupper($_POST['Supplier_Name']);
		$Supplier_Category = strtoupper($_POST['Supplier_Category']);
		$hiddenz = $_POST['hiddenz'];
		$Supplier_Price = $_POST['Supplier_Price'];
		$company = $_POST['company'];

		$added = '';

		$checking = "SELECT * FROM minute_supplier_product where supply_product_name = '$Supplier_Name' 
					 and supply_product_supplier = '$company' ";
		$checking_result = mysqli_query($connect,$checking);

		if (mysqli_num_rows($checking_result) == 1) {
		header("location:../inventory/supplier_add_product.php?minute_supplier_id=$hiddenz&&added=2");
		}

		else{
		$sql = "INSERT INTO supplier_product(item_name,item_supplier,item_category,item_price)
				VALUES ('$Supplier_Name','$company','$Supplier_Category','$Supplier_Price')";
		$result = mysqli_query($connect,$sql);
		if ($result) {
				header("location:../inventory/supplier_add_product.php?minute_supplier_id=$hiddenz&&added=1");
		}
		else{
				header("location:../inventory/supplier_add_product.php?minute_supplier_id=$hiddenz&&added=3");
		}
}



}

 ?>