<?php 
ob_start();
if (isset($_POST['filer_submit'])) {
	$filter_Category = $_POST['filter_Category'];

	header("Location:add_stock.php?filter=$filter_Category");
	ob_clean();
}

if (isset($_POST['filer_submit_2'])) {
	$filter_Category = $_POST['filter_Category'];
	$minute_supplier_id = $_POST['minute_supplier_id'];

	header("Location:supplier_view_product.php?minute_supplier_id=$minute_supplier_id&&filter=$filter_Category");
	ob_clean();
}

if (isset($_POST['filer_submit_3'])) {
	$filter_Category = $_POST['filter_Category'];

	header("Location:view_stock.php?filter=$filter_Category");
	ob_clean();
}

if (isset($_POST['filer_submit_4'])) {
	$filter_Category = $_POST['filter_Category'];

	header("Location:view_product.php?filter=$filter_Category");
	ob_clean();
}

if (isset($_POST['category'])) {
	$product_category = $_POST['product_category'];
	header("Location:view_product.php?category=$product_category");
	ob_clean();
}


 ?>