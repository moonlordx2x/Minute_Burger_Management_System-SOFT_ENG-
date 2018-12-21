
<?php 
include '../function/in-session.php';
require '../connect/connect.php';
ob_start();
date_default_timezone_set("Asia/Manila");
  $time = date("Y-m-d");
  $time2 = date("Y-M-D");
  $time3 = date("h:i:sA");
  $mon = date("M");
if (isset($_POST['amount_submit'])) {
	$pay_amount = $_POST['pay_amount'];
	$total = $_POST['total'];

	$total2 = $total;

	$change = $pay_amount - $total;

	echo "$pay_amount<br><br>";
	echo "$total<br>";
	echo "$change";

	$sample = "SELECT * FROM minute_sales order by id";
	$sample_result = mysqli_query($connect,$sample);
	if (mysqli_num_rows($sample_result) >=1) {
		while ($row = mysqli_fetch_assoc($sample_result)){
			$id = $row['id'];
			$name = $row['name'];
			$category = $row['category'];
			$price = $row['price'];
			$total = $row['total'];

			$total_all = $price * $total;
		
			echo "$id<br>";
			echo "$name<br>";
			echo "$category<br>";
			echo "$price<br>";
			echo "$total<br>";
			echo "$total_all<br>";

		$insert = "INSERT INTO minute_sales_report
				  (id,name,category,price,total,total_cost,date_1,time_1,month_name)
				  values 
				  ('$id','$name','$category','$price','$total','$total_all','$time','$time3','$mon')";
		$insert_result = mysqli_query($connect,$insert);
		if ($insert_result){

			$delete = "DELETE FROM minute_sales";
			$delete_result = mysqli_query($connect,$delete);
			if ($delete_result) {
				header("location:../casheir/casheir.php?page=7&&amount=$pay_amount&&total=$total2&&change=$change&&new=1");
				ob_clean();
			}
			
		}			  
		else{
			echo "Failed";
		}

		}
	}
		}



 ?>
 </table>