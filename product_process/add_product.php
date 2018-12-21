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
	$product_dressing_1 = $_POST['product_dressing_1'];
	$product_dressing_2 = $_POST['product_dressing_2'];
	$add_on = $_POST['add_on'];

	echo $product_name."<br>";
	echo $product_category."<br>";
	echo $product_number."<br>";
	echo $product_bun."<br>";
	echo $product_patty."<br>";
	echo $product_dressing_1."<br>";
	echo $product_dressing_2."<br>";
	echo $add_on."<br>";

	if ($product_category != 'DRINKS' && $product_bun != 'NONE' && $product_patty != 'NONE' 
		&& $product_dressing_1 != 'NONE' && $product_dressing_2 != 'NONE' || $add_on != 'NONE'){
		/*header("location:../inventory/view_product.php?page=3");
		ob_clean();*/
		echo "Error 1";
	}
	else if($product_category == 'DRINKS' && $product_bun == 'NONE' && $product_patty == 'NONE' && $product_dressing_1 == 'NONE' && $product_dressing_2 == 'NONE' && $add_on == 'NONE'){
/*		
	$sql = "INSERT INTO minute_product
	(product_name,product_category,product_number,product_bun,
	product_patty,product_dressing_1,product_dressing_2,add_on)
	VALUES 
	('$product_name','$product_category','$product_number','$product_bun','$product_patty','$product_dressing_1',
	'$product_dressing_2','$add_on')";

	$result = mysqli_query($connect,$sql);

	if ($result){
		header("location:../inventory/view_product.php?page=1");
		ob_clean();
	}
	else{
		header("location:../inventory/view_product.php?page=2");
		ob_clean();
	}
*/
	echo "Error 2";
	}
	else if($product_category != 'DRINKS' && $product_bun != 'NONE' && $product_patty != 'NONE' && $product_dressing_1 != 'NONE' && $product_dressing_2 != 'NONE' && $add_on != 'NONE'){
/*
	$sql = "INSERT INTO minute_product
	(product_name,product_category,product_number,product_bun,
	product_patty,product_dressing_1,product_dressing_2,add_on)
	VALUES 
	('$product_name','$product_category','$product_number','$product_bun','$product_patty','$product_dressing_1',
	'$product_dressing_2','$add_on')";

	$result = mysqli_query($connect,$sql);

	if ($result){
		header("location:../inventory/view_product.php?page=1");
		ob_clean();
	}
	else{
		header("location:../inventory/view_product.php?page=2");
		ob_clean();
	}
*/
	}
	else{
		echo "Error 3";
	}
}


 ?>