<?php 
include '../function/in-session.php';
require '../connect/connect.php';
ob_start();
date_default_timezone_set("Asia/Manila");
  $time = date("Y-m-d");
  $time2 = date("Y-M-D");
  $time3 = date("h:i:sA");
  $page = '';
if (isset($_POST['burger_submit'])){
	$burger_id = $_POST['burger_id'];
	$burger_name = $_POST['burger_name'];
	$burger_category = $_POST['burger_category'];
	$burger_price = $_POST['burger_price'];
	$burger_bun = $_POST['burger_bun'];
	$burger_patty = $_POST['burger_patty'];
	$burger_dressing = $_POST['burger_dressing'];
	$burger_add_on = $_POST['burger_add_on'];
	$burger_order = $_POST['burger_order'];
	$order = $burger_order * 2;

	echo "$burger_id<br>";
	echo "$burger_name<br>";
	echo "$burger_category<br>";
	echo "$burger_price<br>";
	echo "$burger_bun<br>";
	echo "$burger_patty<br>";
	echo "$burger_dressing<br>";
	echo "$burger_add_on<br>";
	echo "$burger_order<br>";

	echo "$order<br><br>";


	$checking = "SELECT * FROM minute_sales where id ='$burger_id' and name = '$burger_name'";
	$checking_result = mysqli_query($connect,$checking);
	if (mysqli_num_rows($checking_result) == 1){
		header("location:../casheir/casheir.php?page=2");
		ob_clean();
	}
	else
	{
		
	$sql_insert = "INSERT INTO minute_sales(id,name,category,price,date,time)
				   values ('$burger_id','$burger_name','$burger_category',
						'$burger_price','$time','$time3')";
	$sql_result = mysqli_query($connect,$sql_insert);

	$SELECT = "SELECT * FROM minute_stock where stock_name IN 
	('$burger_bun','$burger_patty','$burger_dressing','$burger_add_on')";
	$result = mysqli_query($connect,$SELECT);
	if (mysqli_num_rows($result) >=1){
		while ($row = mysqli_fetch_assoc($result)){
			$id_stock = $row['stock_id'];
			$quantity = $row['stock_quantity'];
			echo "$id_stock<br><br>";
			echo "$quantity<br><br>";

			$order1 = $quantity - $order;

			if ($order1 <=0){
				echo "ERROR";
			}
			else{
				echo "Success";
			}
			
			echo "$order1<br>";
			
			$update = "UPDATE minute_stock set stock_quantity='$order1' where stock_id = '$id_stock'";
			$result_update = mysqli_query($connect,$update);
			if ($result_update){
				header("location:../casheir/casheir.php?page=1");
				ob_clean();
			}
			else{
				header("location:../casheir/casheir.php?page=2");
				ob_clean();
			}
				
		}
	}
	else{
		echo "Filed";
	}



	}

}
/*IN 
			(SELECT * FROM minute_stock where stock_name IN 
			('$burger_bun','$burger_patty','$burger_dressing','$burger_add_on'))";
*/
 ?>