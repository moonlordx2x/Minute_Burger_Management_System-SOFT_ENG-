<?php 

include '../function/in-session.php'; 
require '../connect/connect.php';

$record_per_page = '5';
$page = '';
$output = '';

if (isset($_GET['company'])) {
	$company = $_GET['company'];
}

if (isset($_POST['page'])) {
	$page = $_POST['page'];
}
else{
	$page = 1;
}


$start_from = ($page - 1 ) * $record_per_page;

echo " <table class='table table-condensed table-bordered table-hover' style='background-color: white'>";
echo "

		<thead>
              <tr>
                  <th>Product ID</th>
                  <th>Product Name</th>
                  <th>Product Supplier</th>
                  <th>Product Category</th>
                  <th>Product Price</th>
                  <th>Action</th>
              </tr>
          </thead>
";

echo "<tbody>";

$query = "SELECT * FROM minute_supplier_product where supply_product_supplier='$company' ORDER BY supply_product_id LIMIT $start_from,$record_per_page";
$result = mysqli_query($connect,$query);

while ($row = mysqli_fetch_assoc($result)) {
	
	echo "<tr>";

	echo "<td>".$row['supply_product_id']."</td>";
	echo "<td>".$row['supply_product_name']."</td>";
	echo "<td>".$row['supply_product_supplier']."</td>";
	echo "<td>".$row['supply_product__category']."</td>";
	echo "<td>  &#8369; ".$row['supply_product_price']."</td>";
	?>
		<td>
			<button class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span></button>
			<button class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button>
		</td>

	<?php

	echo "</tr>";
}

echo "</tbody>";
echo "</table>";



$page_query = "SELECT * FROM minute_supplier_product where supply_product_supplier='$company' ORDER BY supply_product_id";
$page_result = mysqli_query($connect,$page_query);
$page_record = mysqli_num_rows($page_result);
$page_total = ceil($page_record/$record_per_page);

for ($i=1; $i<=$page_total; $i++) { 
	$output .=	"<span class='pagination' style='cursor:pointer;margin-left:5px;padding:10px;border:1px solid #ccc;' id='".$i."'>".$i."</span>";

}

echo $output;



 ?>