<?php include '../function/in-session.php';
require '../connect/connect.php';

if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
else{
  $page = '';
}


if (isset($_GET['filter'])) {
    $filter = $_GET['filter'];
}
else{
  $filter = '';
}

$checking = "SELECT * FROM stock_inventory";
$checking_result = mysqli_query($connect,$checking);


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Minute Burger Management System</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="../bootstrap/js/jquery.min.js.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="../bootstrap/font-awesome/css/font-awesome.min.css">
  	<link rel="stylesheet" type="text/css" href="../main_css/home.css">

  <style type="text/css">
      #links a{
        font-size: 12px;
        margin-left:15px;
      }
  </style>

</head>
<body>

<nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Minute Burger Management System</a>
        </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#logout" data-target="#logout" data-toggle="modal"><span class="glyphicon glyphicon-log-out"></span> Logout <?php echo $_SESSION['user']; ?></a></li>
            </ul>
    </div>
</nav>


    <div class="modal fade" id="logout" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h3 class="modal-title">Confirm Logout <?php echo $_SESSION['user']; ?></h3>
            </div>

             <div class="modal-body">

               <center>
                <a href="../function/minute_logout.php"><button class="btn btn-danger">Confirm</button></a>
                <button class="btn btn-default" data-dismiss="modal">Close</button>
            </center>

          </div>
        </div>
      </div>
    </div>




   <!-- Navbar END-->


  <!--  Main Content-->

<div class="container-fluid display-table">
  
    
<div class="well col-md-12 col-lg-12 col-xs-5 col-sm-10">

<?php 

$return_checking = "SELECT * FROM stock_inventory";
$return_checking_result = mysqli_query($connect,$return_checking);
if (mysqli_num_rows($return_checking_result) >=1) {
    ?>
<button class="btn btn-default" data-target="#alert-stock" data-toggle="modal">Return</button>

<div class="modal fade" id="alert-stock" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #BC243C">
        <h2 class="text-center"><span style="color: white" class="fa fa-times"></span> <b style="color: white">Error Occur</b></h2>
      </div>
      <div class="modal-body">
                  <h4 class="text-center"><span class="fa fa-exclamation-triangle" style="color: #BC243C"></span>
                  <i style="text-decoration: underline;">Unfinished Stock Adding</i></h4>
              </div>
    </div> 
  </div>
</div>



    <?php
}
else{
  ?>
<a href="view_stock.php"><button class="btn btn-default" data-target="#alert-stock" data-toggle="modal">Return</button></a>
  <?php
}


 ?>


<h3 class="text-center"><span class="label label-primary fa fa-th-list"> <b>Stock Management</b></span></h3>

<div class="row">
  

<div class="col-md-7">
  <h3 class="text-center"><span class="fa fa-list-alt"></span> <b>Available Stock</b></h3>

<form class="form-inline" method="POST" action="redirect.php">
                    
 

    <div class="input-group text-center">
      <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
      <input type="text" class="form-control" name="search" placeholder="Search" id="search" autocomplete="off">
    </div>

 <div class="form-group pull-right">
            <label class="control-label">Filter</label>
              <select class="form-control" name="filter_Category">               
                    <option></option>
                    <option value="BUNS"><center>BUNS</center></option>
                    <option value="CUPS"><center>CUPS</center></option>
                    <option value="DRESSING"><center>DRESSING</center></option>
                    <option value="DRINKS"><center>DRINKS</center></option>
                    <option value="HOTDOG"><center>HOTDOGS</center></option>
                    <option value="PATTY"><center>PATTY</center></option>
                    <option value="VEGETABLES"><center>VEGETABLES</center></option>
                    <option value="OTHER"><center>OTHER</center></option>
              </select>
              <button class="btn btn-primary fa fa-search-plus" type="submit" name="filer_submit"></button>
      </div>


<script>
$(document).ready(function(){
  $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#table tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

                 </form><br>

    <div class="table-responsive">
        <table class="table table-condensed table-bordered table-hover table-striped" style="background-color: white">
            <thead>
              <th class="text-center"><label class="label label-default">Supply ID</label></th>
              <th class="text-center"><label class="label label-default">Supply Name</label></th>
              <th class="text-center"><label class="label label-default">Supply Supplier</label></th>
              <th class="text-center"><label class="label label-default">Supply Category</label></th>
              <th class="text-center"><label class="label label-default">Supply Price</label></th>
              <th class="text-center"><label class="label label-primary">Add Stock</label></th>
            </thead>

            <tbody id="table">        
<?php  
    $count = "0";
    $table = '';
    if ($filter == '') {
      $table = "SELECT * FROM minute_supplier_product ORDER BY supply_product_id";
    }
    else{
    $table = "SELECT * FROM minute_supplier_product where supply_product__category ='$filter'";
    }
    $table_result = mysqli_query($connect,$table);
    if (mysqli_num_rows($table_result) >=1) {
          while ($table_row = mysqli_fetch_assoc($table_result)) {
              $id = $table_row['supply_product_id'];
              $name = $table_row['supply_product_name'];
              $supplier = $table_row['supply_product_supplier'];
              $category = $table_row['supply_product__category'];
              $price = $table_row['supply_product_price'];

              $count++;
?>

        <tr>
          <td><?=$id?></td>
          <td><?=$name?></td>
          <td><?=$supplier?></td>
          <td><?=$category?></td>
          <td>&#8369; <?=$price?></td>
          <td class="text-center">
            <button class="btn btn-primary" data-target="#add<?=$id?>" data-toggle="modal"><span class="fa fa-plus"></span></button></td>

<div class="modal fade" id="add<?=$id?>" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form class="form" method="POST" action="../stock_process/add_stock_inventory.php">

         <div class="modal-header">
          <h4><span class="fa fa-plus"></span> ADD STOCK <label class="label label-primary"><?=$id?></label></h4>
        </div>

         <div class="modal-body">
           
            <div class="form-group">
                <label class="control-label">Supply Name</label>
                <input type="text" class="form-control" value="<?=$name?>" disabled>
                <input type="hidden" name="supply_id" value="<?=$id?>">
                <input type="hidden" name="supply_name" value="<?=$name?>">
            </div>

            <div class="form-group">
                <label class="control-label">Supply Supplier</label>
                <input type="text" class="form-control" value="<?=$supplier?>" disabled>
                <input type="hidden" name="supply_supplier" value="<?=$supplier?>">
            </div>

             <div class="form-group">
                <label class="control-label">Supply Category</label>
                <input type="text" class="form-control" value="<?=$category?>" disabled>
                <input type="hidden" name="supply_category" value="<?=$category?>">
            </div>

            <div class="form-group">
                <label class="control-label">Supply Price</label>
                <input type="text" class="form-control" value="<?=$price?>" disabled>
                <input type="hidden" name="supply_price" value="<?=$price?>">
                <input type="hidden" name="filter" value="<?=$filter?>">
            </div>

            <div class="form-group">
                <label class="control-label">Supply Quantity</label>
                <input type="number" name="supplier_quantity" class="form-control" placeholder="Quantity" min="1" required>
            </div>

         </div>


         <div class="modal-footer">
                <button class="btn btn-default fa fa-times" data-dismiss="modal"></button>
                <input type="submit" name="submit_supply" class="btn btn-primary">
         </div>
      </form>
    </div>
  </div>
</div>



        </tr>

<?php
          }
    }

?>

            </tbody>

        </table>
    </div>

</div>





<div class="col-md-5">
        <h3 class="text-center"><span class="fa fa-plus"></span> <b>Stock to be added</b></h3>
  <div class="table-responsive">
        <table class="table table-condensed table-bordered table-hover table-striped" style="background-color: white">
            <thead>
              <th class="text-center"><label class="label label-default">Stock ID</label></th>
              <th class="text-center"><label class="label label-default">Stock Name</label></th>
              <th class="text-center"><label class="label label-default">Stock Price</label></th>
              <th class="text-center"><label class="label label-default">Stock Quantity</label></th>
              <th class="text-center"><label class="label label-primary">Edit Quantity</th>
              <th class="text-center"><label class="label label-danger">Remove</th>
            </thead>

            <tbody>        
<?php  
    $count = "0";
    $table = "SELECT * FROM stock_inventory ORDER BY id";
    $table_result = mysqli_query($connect,$table);
    if (mysqli_num_rows($table_result) >=1) {
          while ($table_row = mysqli_fetch_assoc($table_result)) {
              $id = $table_row['id'];
              $name = $table_row['name'];
              $supplier = $table_row['supplier'];
              $category = $table_row['category'];
              $quantity = $table_row['quantity'];
              $price = $table_row['price'];

              $count++;
?>

        <tr>
          <td><?=$id?></td>
          <td><?=$name?></td>
          <td class="text-center">&#8369; <?=$price?></td>
          <td class="text-center"><?=$quantity?></td>
          <td class="text-center">
            <button class="btn btn-primary" data-target="#edit<?=$id?>" data-toggle="modal"><span class="fa fa-edit"></span></button></td>
          <td class="text-center">
            <button class="btn btn-danger" data-target="#remove<?=$id?>" data-toggle="modal"><span class="fa fa-trash"></span></button></td>



        </tr>
<div class="modal fade" id="edit<?=$id?>" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
       <form class="form" method="POST" action="../stock_process/edit_quantity.php">

         <div class="modal-header">
          <h4><span class="fa fa-edit"></span> Edit Quantity <label class="label label-primary"><?=$id?></label></h4>
        </div>

         <div class="modal-body">
           
            <div class="form-group">
                <label class="control-label">Supply Name</label>
                <input type="text" class="form-control" value="<?=$name?>" disabled>
                <input type="hidden" name="supply_id" value="<?=$id?>">
            </div>

            <div class="form-group">
                <label class="control-label">Supply Supplier</label>
                <input type="text" class="form-control" value="<?=$supplier?>" disabled>
            </div>

             <div class="form-group">
                <label class="control-label">Supply Category</label>
                <input type="text" class="form-control" value="<?=$category?>" disabled>
            </div>

            <div class="form-group">
                <label class="control-label">Supply Price</label>
                <input type="text" class="form-control" value="<?=$price?>" disabled>
            </div>

            <div class="form-group">
                <label class="control-label">Supply Quantity</label>
                <input type="number" name="supplier_quantity" class="form-control" placeholder="Quantity" min="1" value="<?=$quantity?>" required>
            </div>

         </div>


         <div class="modal-footer">
                <button class="btn btn-default fa fa-times" data-dismiss="modal"></button>
                <input type="submit" name="edit_quantity" class="btn btn-primary" value="Edit">
         </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="remove<?=$id?>" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
       <form class="form" method="POST" action="../stock_process/remove_stock.php">

         <div class="modal-header">
          <h4><span class="fa fa-times"></span> REMOVE <label class="label label-danger"><?=$id?></label></h4>
        </div>

         <div class="modal-body">
           
            <div class="form-group">
                <label class="control-label">Supply Name</label>
                <input type="text" class="form-control" value="<?=$name?>" disabled>
                <input type="hidden" name="supply_id" value="<?=$id?>">
            </div>

            <div class="form-group">
                <label class="control-label">Supply Supplier</label>
                <input type="text" class="form-control" value="<?=$supplier?>" disabled>
            </div>

             <div class="form-group">
                <label class="control-label">Supply Category</label>
                <input type="text" class="form-control" value="<?=$category?>" disabled>
            </div>

            <div class="form-group">
                <label class="control-label">Supply Price</label>
                <input type="text" class="form-control" value="<?=$price?>" disabled>
            </div>

            <div class="form-group">
                <label class="control-label">Supply Quantity</label>
                <input type="number" name="supplier_quantity" class="form-control" placeholder="Quantity" min="1" value="<?=$quantity?>" disabled>
            </div>

         </div>


         <div class="modal-footer">
                <button class="btn btn-default fa fa-times" data-dismiss="modal"></button>
                <input type="submit" name="remove_stock" class="btn btn-danger" value="Remove">
         </div>
      </form>
    </div>
  </div>
</div>


<?php
          }
    }

?>

            </tbody>

        </table>

<?php 
  if (mysqli_num_rows($checking_result)) {
?>
<form class="form" method="POST" action="../stock_process/add_stock_minute.php?hello=world">
    <button class='btn btn-primary pull-right' name='submit_stock' type='submit'><span class='fa fa-plus-circle'></span> Add Product</button>
</form>
<?php
  }

?>
    </div>

</div>


</div>


</div>
            
</div>

<!-- Add STOCK -->

<div class="modal fade" id="success" role="dialog">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
              <div class="modal-header" style="background-color: #006E51">
              <h2 class="text-center" style="color: white"><span class="fa fa-check"></span> Success <span class="fa fa-exclamation"></span></h2>
          </div>
          <div class="modal-body">
                  <h4 class="text-center"><span class="fa fa-info-circle" style="color: #006E51"></span>
                  <i style="text-decoration: underline;">New Added Stock in the list</i></h4>
              </div>
          <div class="modal-footer" style="background-color: #e3e3e4">
                  <button class="btn btn-default fa fa-times" data-dismiss="modal"></button>
              </div>
        </div>
      </div>
</div>

<div class="modal fade" id="error" role="dialog">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
          <div class="modal-header" style="background-color: #BC243C">
              <h2 class="text-center"><span style="color: white" class="fa fa-times"></span> <b style="color: white">Error Occur</b></h2>
          </div>
            <div class="modal-body">
                  <h4 class="text-center"><span class="fa fa-exclamation-triangle" style="color: #BC243C"></span>
                  <i style="text-decoration: underline;">Stock Already Exist in the list</i></h4>
              </div>
            <div class="modal-footer" style="background-color: #e3e3e4">
                  <button class="btn btn-default" data-dismiss="modal"><span class="fa fa-times" style="color: #BC243C"></span></button>
              </div>
        </div>
      </div>
</div>

<div class="modal fade" id="error2" role="dialog">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
          <div class="modal-header" style="background-color: #BC243C">
              <h2 class="text-center"><span style="color: white" class="fa fa-times"></span> <b style="color: white">Error Occur</b></h2>
          </div>
            <div class="modal-body">
                  <h4 class="text-center"><span class="fa fa-exclamation-triangle" style="color: #BC243C"></span>
                  <i style="text-decoration: underline;">Stock Already Exist</i></h4>
              </div>
            <div class="modal-footer" style="background-color: #e3e3e4">
                  <button class="btn btn-default" data-dismiss="modal"><span class="fa fa-times" style="color: #BC243C"></span></button>
              </div>
        </div>
      </div>
</div>

<div class="modal fade" id="success2" role="dialog">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
              <div class="modal-header" style="background-color: #006E51">
              <h2 class="text-center" style="color: white"><span class="fa fa-check"></span> Success <span class="fa fa-exclamation"></span></h2>
          </div>
          <div class="modal-body">
                  <h4 class="text-center"><span class="fa fa-info-circle" style="color: #006E51"></span>
                  <i style="text-decoration: underline;">New Added Stock</i></h4>
              </div>
          <div class="modal-footer" style="background-color: #e3e3e4">
                  <button class="btn btn-default fa fa-times" data-dismiss="modal"></button>
              </div>
        </div>
      </div>
</div>

<div class="modal fade" id="success3" role="dialog">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
              <div class="modal-header" style="background-color: #006E51">
              <h2 class="text-center" style="color: white"><span class="fa fa-check"></span> Success <span class="fa fa-exclamation"></span></h2>
          </div>
          <div class="modal-body">
                  <h4 class="text-center"><span class="fa fa-info-circle" style="color: #006E51"></span>
                  <i style="text-decoration: underline;">Quantity Update</i></h4>
              </div>
          <div class="modal-footer" style="background-color: #e3e3e4">
                  <button class="btn btn-default fa fa-times" data-dismiss="modal"></button>
              </div>
        </div>
      </div>
</div>

<div class="modal fade" id="success4" role="dialog">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
              <div class="modal-header" style="background-color: #006E51">
              <h2 class="text-center" style="color: white"><span class="fa fa-check"></span> Success <span class="fa fa-exclamation"></span></h2>
          </div>
          <div class="modal-body">
                  <h4 class="text-center"><span class="fa fa-info-circle" style="color: #006E51"></span>
                  <i style="text-decoration: underline;">STOCK REMOVE</i></h4>
              </div>
          <div class="modal-footer" style="background-color: #e3e3e4">
                  <button class="btn btn-default fa fa-times" data-dismiss="modal"></button>
              </div>
        </div>
      </div>
</div>



<script type="text/javascript">
  
$(document).ready(function(){

  var page = "<?=$page?>";

  if (page == '1') {
    $('#success').modal('show');
  }
  else if (page == '2') {
    $('#error').modal('show');
  }
  else if (page == '3') {
    $('#error2').modal('show');
  }
  else if (page == '4') {
    $('#success2').modal('show');
  }
  else if (page == '5') {
    $('#success3').modal('show');
  }
  else if (page == '6') {
    $('#success4').modal('show');
  }

});



</script>


</body>
</html>