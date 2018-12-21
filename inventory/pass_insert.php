
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
}

?>
