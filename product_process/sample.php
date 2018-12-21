<form method="POST">
	<input type="text" name="sample">
	<input type="submit" name="submit" value="try">
</form>


<?php 

include '../function/in-session.php';
require '../connect/connect.php';


if (isset($_POST['submit'])) {
	$sample = $_POST['sample'];
	$sql = "UPDATE minute_product SET product_bun where "
}

 ?>