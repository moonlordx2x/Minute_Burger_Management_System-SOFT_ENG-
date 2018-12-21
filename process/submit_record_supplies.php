<?php 

include '../function/in-session.php';
require '../connect/connect.php';



if (isset($_POST['add_product_submit'])) {
		$id_supplier = $_POST['add_product'];

		$sql = "SELECT * FROM supplier_product";
		$result = mysqli_query($connect,$sql);
		$added = '';

		if (mysqli_num_rows($result)) {
			while ($row = mysqli_fetch_assoc($result)) {
				$id = $row['id'];
				$item_name = $row['item_name'];
				$item_supplier = $row['item_supplier'];
				$item_category = $row['item_category'];
				$item_price = $row['item_price'];

				echo "string";

				$sql_insert = "INSERT INTO minute_supplier_product
							   (supply_product_id,supply_product_name,supply_product_supplier,supply_product__category,supply_product_price)
							   values
							   ('$id','$item_name','$item_supplier','$item_category','$item_price')";
				$result_insert = mysqli_query($connect,$sql_insert);
				if ($result_insert) {

					$sql_delete = "DELETE FROM supplier_product ORDER by id";
					$sql_result = mysqli_query($connect,$sql_delete);
					if ($sql_result) {
						header("location:../inventory/supplier_add_product.php?minute_supplier_id=$id_supplier&&added=1");
					}
					else{
						echo "Failed 2";
					}
					}
				else{
					echo "Failed";
				}	   
			}
		}
}


 ?>