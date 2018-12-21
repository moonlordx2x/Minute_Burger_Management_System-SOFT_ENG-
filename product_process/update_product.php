<?php 

include '../function/in-session.php';
require '../connect/connect.php';
ob_start();

if (isset($_POST['edit_product'])){
	$product_id = $_POST['product_id'];
	$product_name = $_POST['product_name'];//
	$edit_category = $_POST['edit_category'];//
	$product_price = $_POST['product_price'];//
	$edit_category_1 = $_POST['edit_category_1'];//product_bun
	$edit_category_2 = $_POST['edit_category_2'];//product_patty
	$edit_category_3 = $_POST['edit_category_3'];//product_dressing
	$edit_category_4 = $_POST['edit_category_4'];//add_on

	echo $product_id."<br>";
	echo $product_name."<br>";
	echo $edit_category."<br>";
	echo $product_price."<br>";
	echo $edit_category_1."<br>";
	echo $edit_category_2."<br>";
	echo $edit_category_3."<br>";
	echo $edit_category_4."<br>";

	$sql = "UPDATE minute_product SET product_name = '$product_name',
	product_category ='$edit_category',product_price = '$product_price',
	product_bun = '$edit_category_1',product_patty='$edit_category_2',
	product_dressing= '$edit_category_3',add_on = '$edit_category_4'
	where product_id = '$product_id'";
	$result = mysqli_query($connect,$sql);
	if ($result) {
		header("location:../inventory/view_product.php?page=4");
		ob_clean();
	}
	else{
		header("location:../inventory/view_product.php?page=5");
		ob_clean();
	}

}

 ?>