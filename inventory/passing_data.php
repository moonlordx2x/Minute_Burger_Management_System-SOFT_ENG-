
<?php 
include '../function/in-session.php'; 
require '../connect/connect.php';

if ( isset($_POST['name']) && isset($_POST['category']) && isset($_POST['company']) && isset($_POST['price']) ) {
	$name = $_POST['name'];
	$category = $_POST['category'];
	$company = $_POST['company'];
	$price = $_POST['price'];

	$sql = "INSERT INTO supplier_product(item_name,item_supplier,item_category,item_price)
			values('$name','$company','$category','$price')";
	$result = mysqli_query($connect,$sql);
  if ($result) {
    ?>

        <script type="text/javascript">
          window.location = 'supplier_supplies.php';
        </script>
    <?php
  }
	
}
if (isset($_POST['offset'])) {
$item_sql = "SELECT * FROM supplier_product order by item_id";
$item_result = mysqli_query($connect,$item_sql);
if (mysqli_num_rows($item_result) >=0) {
  while ($item_row = mysqli_fetch_assoc($item_result)) {

  	$id = $item_row['item_id'];
              echo "<tr>";
              echo "<td>".$item_row['item_id']."</td>";
              echo "<td>".$item_row['item_name']."</td>";
              echo "<td>".$item_row['item_category']."</td>";
              echo "<td> &#8369; ".$item_row['item_price']."</td>";
              echo "<td> <a href='#remove$id' data-toggle='modal' data-target='#remove$id'><button class='btn btn-danger'><span class='glyphicon glyphicon-remove'></span></button></a></td>";
           	  echo "</tr>";

  }
}
}

?>
