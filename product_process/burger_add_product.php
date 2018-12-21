<?php 

include '../function/in-session.php';
require '../connect/connect.php';
ob_start();

if (isset($_POST['add_product_submit'])){
	$product_name = strtoupper($_POST['product_name']);
	$product_category = $_POST['product_category'];
	$product_number = $_POST['product_number'];
	$product_bun = $_POST['product_buns'];
	$product_patty = $_POST['product_patty'];
	$product_dressing = $_POST['product_dressing'];
	$add_on = $_POST['add_on'];
	$status = 'AVAILABLE';

	echo $product_name."<br>";
	echo $product_category."<br>";
	echo $product_number."<br>";
	echo $product_bun."<br>";
	echo $product_patty."<br>";
	echo $product_dressing."<br>";
	echo $add_on."<br>";

	$sql = "INSERT INTO minute_product
	(product_name,product_category,product_price,product_bun,product_patty,product_dressing,add_on,status)
	values
	('$product_name','$product_category','$product_number','$product_bun','$product_patty','$product_dressing','$add_on','$status')";
	$result = mysqli_query($connect,$sql);
	if ($result) {
		header("location:../inventory/view_product.php?page=1");
		ob_clean();
	}
	else{
		header("location:../inventory/view_product.php?page=2");
		ob_clean();
	}

}


 ?>