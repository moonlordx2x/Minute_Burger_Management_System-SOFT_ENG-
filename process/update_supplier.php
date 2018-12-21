<?php 
include '../function/in-session.php';
require '../connect/connect.php';

if (isset($_POST['update_record'])) {
		  $update_id = $_POST['update_id'];
		  $update_name = ucwords($_POST['update_name']);
		  $update_num = $_POST['update_num'];
		  $update_company = ucwords($_POST['update_company']);
		  $update_address = ucwords($_POST['update_address']);
		  $update_company_2 = ucwords($_POST['update_company_2']);

  		  $added = '';

		  echo "$update_company<br>";
		  echo "$update_company_2<br>";

if ($update_company == $update_company_2){
		$update_record = "UPDATE minute_supplier SET minute_supplier_name = '$update_name',minute_supplier_number='$update_num', 
  		minute_supplier_company = '$update_company',minute_supplier_address='$update_address' where minute_supplier_id = '$update_id'";
  		$update_record_query = mysqli_query($connect,$update_record);

  		if ($update_record_query) {
  			header("location:../inventory/view_supplier.php?page=3");
  		}
  		else{
  			header("location:../inventory/view_supplier.php?page=2");
  		}
	}


else{
	$select = "SELECT * FROM minute_supplier WHERE minute_supplier_company = '$update_company'";
	$result = mysqli_query($connect,$select);
	if (mysqli_num_rows($result) == 1){
		header("location:../inventory/view_supplier.php?page=2");
	}
	else{

		$checking_1 = "UPDATE minute_stock SET stock_supplier = '$update_company' 
  				    	WHERE stock_supplier='$update_company_2'";
  		$checking_result_1 = mysqli_query($connect,$checking_1);
  		if ($checking_result_1) {
  			$checking = "UPDATE minute_supplier_product SET supply_product_supplier = '$update_company' 
  				     WHERE supply_product_supplier='$update_company_2'";
	  		$checking_result = mysqli_query($connect,$checking);

	  		$update_record = "UPDATE minute_supplier SET minute_supplier_name = '$update_name',minute_supplier_number='$update_num', 
	  		minute_supplier_company = '$update_company',minute_supplier_address='$update_address' where minute_supplier_id = '$update_id'";
	  		$update_record_query = mysqli_query($connect,$update_record);
	  		header("location:../inventory/view_supplier.php?page=3");
  		}
  		else{
  			echo "failed";
  		}
		/*

		$checking = "UPDATE minute_supplier_product SET supply_product_supplier = '$update_company' 
  				     WHERE supply_product_supplier='$update_company_2'";
  		$checking_result = mysqli_query($connect,$checking);

  		$update_record = "UPDATE minute_supplier SET minute_supplier_name = '$update_name',minute_supplier_number='$update_num', 
  		minute_supplier_company = '$update_company',minute_supplier_address='$update_address' where minute_supplier_id = '$update_id'";
  		$update_record_query = mysqli_query($connect,$update_record);
*/
  		//header("location:../inventory/view_supplier.php?page=3");

		
	}
}


/*

	$select = "SELECT * FROM minute_supplier WHERE minute_supplier_company = '$update_company'";
	$result = mysqli_query($connect,$select);
	if (mysqli_num_rows($result) == 1){
		header("location:../inventory/view_supplier.php?page=2");
	}
	else{
		

		$checking = "UPDATE minute_supplier_product SET supply_product_supplier = '$update_company' 
  				     WHERE supply_product_supplier='$update_company_2'";
  		$checking_result = mysqli_query($connect,$checking);

  		$update_record = "UPDATE minute_supplier SET minute_supplier_name = '$update_name',minute_supplier_number='$update_num', 
  		minute_supplier_company = '$update_company',minute_supplier_address='$update_address' where minute_supplier_id = '$update_id'";
  		$update_record_query = mysqli_query($connect,$update_record);

  		header("location:../inventory/view_supplier.php?page=3");

		
	}
*/


}



 ?>