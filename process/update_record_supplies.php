<?php 
include '../function/in-session.php';
require '../connect/connect.php';


 if (isset($_POST['submit_supplies'])){

        $update_supplies_name = strtoupper($_POST['update_supplies_name']);
        $update_supplies_supplier = $_POST['update_supplies_supplier'];
        $update_supplies_category = $_POST['update_supplies_category'];
        $update_supplies_price = $_POST['update_supplies_price'];
        $update_supplies_hidden = $_POST['update_supplies_hidden'];
        $update_supplies_id = $_POST['update_supplies_id'];

        $added = '';
  
        echo "$update_supplies_name<br>";
        echo "$update_supplies_supplier<br>";
        echo "$update_supplies_category<br>";
        echo "$update_supplies_price<br>";
        echo "$update_supplies_hidden<br>";
        echo "$update_supplies_id<br>";

      	$checking = "SELECT * FROM minute_supplier_product where supply_product_name = '$update_supplies_name' 
      				 and supply_product_supplier = '$update_supplies_supplier'";
      	$checking_result = mysqli_query($connect,$checking);
   		if (mysqli_num_rows($checking_result) == 1) {
      		header("location:../inventory/supplier_add_product.php?minute_supplier_id=$update_supplies_hidden&&added=2");
      	}
      	else{
      		$sql = "UPDATE supplier_product SET item_name ='$update_supplies_name',item_supplier ='$update_supplies_supplier',
      				item_category ='$update_supplies_category',item_price='$update_supplies_price' 
      				where id='$update_supplies_id'";
      		$result = mysqli_query($connect,$sql);
      		if ($result) {
      				header("location:../inventory/supplier_add_product.php?minute_supplier_id=$update_supplies_hidden&&added=1");		
      		}
      		else{
      				header("location:../inventory/supplier_add_product.php?minute_supplier_id=$update_supplies_hidden&&added=3");
      		}			
      	}



    }


 ?>