<?php 
include '../function/in-session.php';
require '../connect/connect.php';
ob_start();
date_default_timezone_set("Asia/Manila");
  $time = date("Y-m-d");
  $time2 = date("Y-M-D");
  $time3 = date("h:i:sA");
  $week = date('Y-m-d',strtotime('monday this week'));
 $month = date("Y-m");
 $mon = date("M");
$weeks = date('Y-m-d',strtotime('sunday this week'));

if (isset($_POST['add_submit'])){

	$burger_id = $_POST['add_id'];
	$burger_name = $_POST['add_name'];
	$burger_category = $_POST['add_category'];
	$burger_price = $_POST['add_price'];

	$burger_bun = $_POST['add_bun'];
	$burger_patty = $_POST['add_patty'];
	$burger_dressing = $_POST['add_dressing'];
	$burger_add_on = $_POST['add_on_add'];
	$burger_order = $_POST['add_total'];
	$burger_order_1 = $_POST['add_total_1'];

	$burger_order_3 = $burger_order + $burger_order_1;

	$order = $burger_order_1 * 2;

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

	$stock = '';
	$stock1 = '';
	$stock2 = '';
	$stock3 = '';

	$server_check = "SELECT * FROM minute_stock where stock_name = '$burger_bun'";
	$server_result = mysqli_query($connect,$server_check);
	if (mysqli_num_rows($server_result) == 1){
		echo "Exist<br>";
		while ($row= mysqli_fetch_assoc($server_result)) {
			$server_quantity = $row['stock_quantity'];
			$order1 = $server_quantity - $order;
			echo "$order1<br>";

			if ($order1 <=0){
				$stock = '0';
			}
			else{
				$stock = '1';
			}
		}
	}
	else{
		echo "None<br>";
	}

	$server_check1 = "SELECT * FROM minute_stock where stock_name = '$burger_patty'";
	$server_result1 = mysqli_query($connect,$server_check1);
	if (mysqli_num_rows($server_result1) == 1){
		echo "Exist<br>";
		while ($row= mysqli_fetch_assoc($server_result1)) {
			$server_quantity1 = $row['stock_quantity'];
			$order2 = $server_quantity1 - $order;
			echo "$order2<br>";

			if ($order2 <=0) {
				$stock1 = '0';
			}
			else{
				$stock1 = '1';
			}
		}
	}
	else{
		echo "None<br>";
	}

	$server_check2 = "SELECT * FROM minute_stock where stock_name = '$burger_dressing'";
	$server_result2 = mysqli_query($connect,$server_check2);
	if (mysqli_num_rows($server_result2) == 1){
		echo "Exist<br>";
		while ($row= mysqli_fetch_assoc($server_result2)) {
			$server_quantity2 = $row['stock_quantity'];
			$order3 = $server_quantity2 - $order;
			echo "$order3<br>";

			if ($order3 <=0) {
				$stock2 = '0';
			}
			else{
				$stock2 = '1';
			}
		}
	}
	else{
		echo "None<br>";
	}

	$server_check3 = "SELECT * FROM minute_stock where stock_name = '$burger_add_on'";
	$server_result3 = mysqli_query($connect,$server_check3);
	if (mysqli_num_rows($server_result3) == 1){
		echo "Exist<br>";
		while ($row= mysqli_fetch_assoc($server_result3)) {
			$server_quantity3 = $row['stock_quantity'];
			$order4 = $server_quantity3 - $order;

			echo "$order4<br>";

			if ($order4 <=0){
				$stock3 = '0';	
			}	
			else{
				$stock3 = '1';
			}
		}
	}
	else{
		echo "None<br>";
	}

	echo "<br<br><br>";

	echo "$stock<br>";
	echo "$stock1<br>";
	echo "$stock2<br>";
	echo "$stock3<br>";
	echo "<br<br><br><br<br><br>";

	if ($stock == '0' || $stock1 == '0' || $stock2 == '0' || $stock3 == '0'){
		header("location:../casheir/casheir.php?page=3");
		ob_clean();
	}

	else{

	echo "<br>$burger_add_on";
	echo "<br>$burger_order<br>";
	echo "$burger_order_1<br>";	
	echo "$burger_price<br>";
	echo "$burger_order_3<br>";	


		
		$graph_checking_exist = "SELECT * FROM graph_result where name ='$burger_name' and date_1 = '$time'";
		$graph_checking_result = mysqli_query($connect,$graph_checking_exist);
		if (mysqli_num_rows($graph_checking_result) == 1) {
				while ($graph_checking_row = mysqli_fetch_assoc($graph_checking_result)) {
					$graph_total_1 = $graph_checking_row['total'];
					$graph_total_cost = $graph_checking_row['total_cost'];

					$graph_sum_total = $graph_total_1 + $burger_order_1;
					$sum = $burger_price * $burger_order_1;
					$graph_sum_cost = $graph_total_cost + $sum;

					$graph_update_total = "UPDATE graph_result SET total = '$graph_sum_total' , total_cost = '$graph_sum_cost'
				    where name ='$burger_name' and date_1 = '$time'";
					$graph_query_1 = mysqli_query($connect,$graph_update_total);

				}
		}

		$graph_checking_exist_2 = "SELECT * FROM graph_result_week where name ='$burger_name' and week_1 = '$week' and week_2 = '$weeks'";
		$graph_checking_result_2 = mysqli_query($connect,$graph_checking_exist_2);
		if (mysqli_num_rows($graph_checking_result_2) == 1) {
				while ($graph_checking_row_2 = mysqli_fetch_assoc($graph_checking_result_2)) {
					$graph_total_2 = $graph_checking_row_2['total'];
					$graph_total_cost_2 = $graph_checking_row_2['total_cost'];

					$graph_sum_total_2 = $graph_total_2 + $burger_order_1;
					$sum_2 = $burger_price * $burger_order_1;
					$graph_sum_cost_2 = $graph_total_cost_2 + $sum_2;

					$graph_update_total = "UPDATE graph_result_week SET total = '$graph_sum_total_2' , total_cost = '$graph_sum_cost_2'
				    where name ='$burger_name' and week_1 = '$week' and week_2 = '$weeks'";
					$graph_query_1 = mysqli_query($connect,$graph_update_total);

				}
		}
	
		$graph_checking_exist_3 = "SELECT * FROM graph_result_month where name ='$burger_name' and month = '$month'";
		$graph_checking_result_3 = mysqli_query($connect,$graph_checking_exist_3);
		if (mysqli_num_rows($graph_checking_result_3) == 1) {
				while ($graph_checking_row_3 = mysqli_fetch_assoc($graph_checking_result_3)) {
					$graph_total_3 = $graph_checking_row_3['total'];
					$graph_total_cost_3 = $graph_checking_row_3['total_cost'];

					$graph_sum_total_3 = $graph_total_3 + $burger_order_1;
					$sum_3 = $burger_price * $burger_order_1;
					$graph_sum_cost_3 = $graph_total_cost_3 + $sum_3;

					$graph_update_total = "UPDATE graph_result_month SET total = '$graph_sum_total_3' , total_cost = '$graph_sum_cost_3'
				   where name ='$burger_name' and month = '$month'";
					$graph_query_1 = mysqli_query($connect,$graph_update_total);

				}
		}
	


	$SELECT = "SELECT * FROM minute_stock where stock_name IN 
	('$burger_bun','$burger_patty','$burger_dressing','$burger_add_on')";
	$result = mysqli_query($connect,$SELECT);

	if (mysqli_num_rows($result) >=1){

	

		@$update_1 = "UPDATE minute_stock SET stock_quantity = '$order1' where stock_name ='$burger_bun'";
		$update_result_1 = mysqli_query($connect,$update_1);
		if ($update_result_1) {echo "Success First Entry<br>";}else{echo "Failed First Entry<br>";}

		@$update_2 = "UPDATE minute_stock SET stock_quantity = '$order2' where stock_name ='$burger_patty'";
		$update_result_2 = mysqli_query($connect,$update_2);
		if ($update_result_2) {echo "Success First Entry<br>";}else{echo "Failed First Entry<br>";}

		@$update_3 = "UPDATE minute_stock SET stock_quantity = '$order3' where stock_name ='$burger_dressing'";
		$update_result_3 = mysqli_query($connect,$update_3);
		if ($update_result_3) {echo "Success First Entry<br>";}else{echo "Failed First Entry<br>";}

		@$update_4 = "UPDATE minute_stock SET stock_quantity = '$order4' where stock_name ='$burger_add_on'";
		$update_result_4 = mysqli_query($connect,$update_4);
		if ($update_result_4) {echo "Success First Entry<br>";}else{echo "Failed First Entry<br>";}

		$update_sql = "UPDATE minute_sales set total='$burger_order_3' where id = '$burger_id'";
		$result_sql = mysqli_query($connect,$update_sql);
		
		header("location:../casheir/casheir.php?page=4");
		ob_clean();

/*
		while ($row = mysqli_fetch_assoc($result)){
			$id_stock = $row['stock_id'];
			$quantity = $row['stock_quantity'];
			echo "$id_stock<br><br>";
			echo "$quantity<br><br>";

			$order_stock = $quantity - $order;
			echo "$order_stock<br>";

			$update = "UPDATE minute_stock set stock_quantity='$order1' where stock_id = '$id_stock'";
			$result_update = mysqli_query($connect,$update);
			if ($result_update){

				$update_sql = "UPDATE minute_sales set total='$burger_order_3' where id = '$burger_id'";
				$result_sql = mysqli_query($connect,$update_sql);
				if ($result_sql) {
					header("location:../casheir/casheir.php?page=4");
					ob_clean();
				}

			}
			else{
				header("location:../casheir/casheir.php?page=2");
				ob_clean();
			}
		}
	*/}


	}
}


 ?>