<?php 

include '../function/in-session.php';
require '../connect/connect.php';
ob_start();

if (isset($_POST['remove_submit'])){
	$id = $_POST['id_remove'];


	 $sql = "DELETE FROM minute_product where product_id = '$id'";
	 $result = mysqli_query($connect,$sql);

	 if ($result) {
	 	header("location:../inventory/view_product.php?page=6");
		ob_clean();
	 }
	 else{
	 	header("location:../inventory/view_product.php?page=7");
		ob_clean();
	 }


}

 ?>