<?php 
ob_start();

if (isset($_POST['filer_submit_2'])) {
	$filter_Category = $_POST['filter_Category'];
	$minute_supplier_id = $_POST['minute_supplier_id'];

	header("Location:casheir.php?filter=$filter_Category");
	ob_clean();
}


 ?>