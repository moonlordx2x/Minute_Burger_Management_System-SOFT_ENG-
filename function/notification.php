<div class="modal fade" id="modal" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #BC243C">
				<h4 class="text-center"><span class="fa fa-exclamation-triangle" style="color: white"></span> 
					<b style="color: white">WARNING Stock below 50</b></h4></div>

			<div class="modal-body">
						
				<table class="table table-bordered">
							<thead>
								<tr>
									<th>Stock ID</th>
									<th>Stock Name</th>
									<th>Stock Category</th>
									<th>Stock Quantiy</th>
								</tr>
							</thead>
							<tbody>
		<tr>
<?php
		$sql_notification = "SELECT * FROM minute_stock where stock_quantity BETWEEN 0 AND 50 order by stock_id";
		$result_notification = mysqli_query($connect,$sql_notification);
		if (mysqli_num_rows($result_notification) >=1) {
		while ($row_notification = mysqli_fetch_assoc($result_notification)) {
		$id_notification = $row_notification['stock_id'];
		$name_notification = $row_notification['stock_name'];
		$category_notification = $row_notification['stock_category'];
		$price_notification = $row_notification['stock_price'];
		$stock_notification = $row_notification['stock_quantity'];
		$notification = '';
		if ($stock_notification >=0 && $stock_notification <=50) {
			$notification = '1';
		}



?>
		<tr>
			
				<td><?=$id_notification?></td>
				<td><?=$name_notification?></td>
				<td><?=$category_notification?></td>
				<td style="background-color: #BC243C;color: white"><?=$stock_notification?></td>

		</tr>


	<script type="text/javascript">
	$(document).ready(function(){

	var notification = "<?=$notification?>";

	if (notification == '1') {
	$('#modal').modal('show');
	}
	});
</script>

<?php

				}
		}

?>			
		</tr>								
					</tbody>
				</table>

			 </div>
		</div>
	</div>
</div>

<?php


/*

$sql_notification = "SELECT * FROM minute_stock order by stock_id";
$result_notification = mysqli_query($connect,$sql_notification);
if (mysqli_num_rows($result_notification) >=1) {
	while ($row_notification = mysqli_fetch_assoc($result_notification)) {
		$id_notification = $row_notification['stock_id'];
		$name_notification = $row_notification['stock_name'];
		$category_notification = $row_notification['stock_category'];
		$price_notification = $row_notification['stock_price'];
		$stock_notification = $row_notification['stock_quantity'];
		$notification = '';
		if ($stock_notification >=21 && $stock_notification <=50) {
			$notification = '1';

			echo "$notification";
		}
		else{
			echo "$notification";
		}
?>

 		<div class="modal fade" id="modal" role="dialog">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header"><h4 class="text-center">WARNING</h4></div>

					<div class="modal-content">
						
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Stock ID</th>
									<th>Stock Name</th>
									<th>Stock Category</th>
									<th>Stock Quantiy</th>
								</tr>
							</thead>
							<tbody>
		<tr>
<?php			
		$sql_notification_2 = "SELECT * FROM minute_stock where stock_quantity BETWEEN 1 AND 50 order by stock_id";
		$result_notification_2 = mysqli_query($connect,$sql_notification_2);
		if (mysqli_num_rows($result_notification_2) >=1) {
			while ($row_notification_2 = mysqli_fetch_assoc($result_notification_2)) {
				$id_notification_2 = $row_notification['stock_id'];
				$name_notification_2 = $row_notification['stock_name'];
				$category_notification_2 = $row_notification['stock_category'];
				$price_notification_2 = $row_notification['stock_price'];
				$stock_notification_2 = $row_notification['stock_quantity'];

?>

				<td><?=$id_notification_2?></td>
				<td><?=$name_notification_2?></td>
				<td><?=$category_notification_2?></td>
				<td><?=$stock_notification_2?></td>

<?php

			}
		}
?>
		</tr>								
							</tbody>
						</table>

					</div>
				</div>
			</div>
		</div>

<script type="text/javascript">
	$(document).ready(function(){

		var notification = "<?=$notification?>";

		if (notification == '1') {
		$('#modal').modal('show');
		}
	});
</script>


<?php

	}
}
*/

 ?>
