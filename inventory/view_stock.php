<?php include '../function/in-session.php';
require '../connect/connect.php';
$page = '';

if (isset($_GET['page'])) {
  $page = $_GET['page'];
}
else{
  $page = '0';
}

$filter = '';
if (isset($_GET['filter'])) {
  $filter = $_GET['filter'];
}
else{
  $filter = '';
}

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
<?php include '../function/notification.php';?>
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


  <nav class="navbar navbar-inverse visible-xs">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
              </button>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav">
                <li><a href="home.php"><span class="fa fa-dashboard"></span> &nbspDASHBOARD</a></li>
                  <li class="dropdown" id="active">
                          <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="hover"><span class="fa fa-list-alt"></span>  &nbspInventory <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                  <li><a href="../inventory/view_product.php"><span class="fa fa-shopping-cart"></span> &nbspView Product</a></li>
                                  <li id="active"><a href="../inventory/view_supplier.php"><span class="fa fa-group"></span>&nbsp View Supplier</a></li>
                                  <li><a href="../inventory/view_stock.php"><span class="fa fa-th-list"></span> &nbsp View Stock</a></li>                                    
                              </ul>
                                  </li>
                            <li><a href="../casheir/casheir.php"><span class="fa fa-shopping-cart"></span> &nbsp CASHIER</a></a></li>
                              <li><a class="dropdown-toggle" data-toggle="collapse" data-target="#demo1"><span class="fa fa-bar-chart-o"></span> &nbsp SALES REPORT <span class="caret"></span></a></li>
    <div class="collapse collapseable" id="demo1">
         <ul id="links">
            <li><a href="../sales_report/daily.php"><span class="fa fa-bar-chart-o"></span> &nbsp DAILY SALES REPORT</a>  
                 <li><a href="../sales_report/weekly.php"><span class="fa fa-bar-chart-o"></span> &nbsp WEEKLY SALES REPORT</a>
                 <li><a href="../sales_report/monthly.php"><span class="fa fa-bar-chart-o"></span> &nbsp MONTHLY SALES REPORT</a>                                    
        </ul>
    </div>
              </ul>
            </div>
          </div>
        </nav>  

   <!-- Navbar END-->


  <!--  Main Content-->

<div class="container-fluid display-table">
  
<div class="row display-table-row">
  
<div class="col-md-2 display-table-cell valign hidden-xs" id="sidebar">
    					
   <ul>

    <li><a href="../main_directory/home.php"><span class="fa fa-dashboard"></span> &nbspDASHBOARD</a></li>
    <li id="active"><a data-toggle="collapse" data-parent="#accordion" href="#demo">
    <span class="fa fa-list-alt"></span> &nbspInventory <span class="caret"></span></a></li>

    <div class="collapse in" id="demo"">
        <ul id="links">
            <li><a href="../inventory/view_product.php"><span class="fa fa-shopping-cart"></span> &nbspView Product</a></li>
            <li><a href="../inventory/view_supplier.php"><span class="fa fa-group"></span>&nbsp View Supplier</a></li>
            <li id="active"><a href=""><span class="fa fa-th-list"></span> &nbsp View Stock</a></li>                                  
        </ul>
    </div>
        <li><a href="../casheir/casheir.php"><span class="fa fa-shopping-cart"></span> &nbsp CASHIER</a></a></li>
         <li><a class="dropdown-toggle" data-toggle="collapse" data-target="#demo2"><span class="fa fa-bar-chart-o"></span> &nbsp SALES REPORT <span class="caret"></span></a></li>
    <div class="collapse collapseable" id="demo2">
         <ul id="links">
            <li><a href="../sales_report/daily.php"><span class="fa fa-bar-chart-o"></span> &nbsp DAILY SALES REPORT</a>  
                 <li><a href="../sales_report/weekly.php"><span class="fa fa-bar-chart-o"></span> &nbsp WEEKLY SALES REPORT</a>
                 <li><a href="../sales_report/monthly.php"><span class="fa fa-bar-chart-o"></span> &nbsp MONTHLY SALES REPORT</a>      
        </ul>
    </div>
    </ul>
</div>

<div class="col-md-10 display-table-cell valign">
    
    <div class="well col-md-12 col-lg-12 col-xs-5 col-sm-10">


    			<h1 class="text-center"><span class="label label-primary fa fa-th-list"> <b>Stock Management</b></span></h1>
    
                 <form class="form-inline" method="POST" action="redirect.php">
                    
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
      <input type="text" class="form-control" name="search" placeholder="Search" id="search" autocomplete="off">
    </div>

     <div class="form-group">
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
              <input type="hidden" name="minute_supplier_id" value="">
              <button class="btn btn-primary fa fa-search-plus" type="submit" name="filer_submit_3"></button>
      </div>
<a href="add_stock.php">
    <button type="button" class="btn btn-info pull-right" data-target="#minute_add" data-toggle="modal"><span class="fa fa-plus"></span> ADD Stock</button>
</a>

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

  <!--<a href="add_stock.php">
  	<button class="btn btn-info pull-right" data-target="#minute_add" data-toggle="modal"><span class="fa fa-plus"></span> ADD Stock</button>
  </a>
 <br>-->


  <div class="table-responsive">
  	
  	<table class="table table-bordered table-hover table-condensed table-striped">

  		<thead>
  			
  			<tr>
  				
  				<th class='text-center'><span class="label label-default">Minute Stock ID</span></th>
                <th class='text-center'><span class="label label-default">Minute Stock Name</span></th>
                <th class='text-center'><span class="label label-default">Minute Stock Company</span></th>
                <th class='text-center'><span class="label label-default">Minute Stock Category</span></th>
                <th class='text-center'><span class="label label-default">Minute Stock Price</span></th>
                                <th class='text-center'><span class="label label-default">Minute Stock Quantity</span></th>
                <th class='text-center'><span class="label label-primary">Add Quantity</span></th>
                <th class='text-center'><span class="label label-danger">REMOVE</span></th>

  			</tr>

  		</thead>

  		<tbody id="table">
  			
<?php
$MINUTE_PRODUCT = '';

if ($filter == '') {
  $MINUTE_PRODUCT = "SELECT * FROM minute_stock ORDER BY stock_id";
}
else{
  $MINUTE_PRODUCT = "SELECT * FROM minute_stock where stock_category = '$filter' ORDER BY stock_id";
}

$MINUTE_PRODUCT_RESULT = mysqli_query($connect,$MINUTE_PRODUCT);

if (mysqli_num_rows($MINUTE_PRODUCT_RESULT) >=1) {

   while ($minute_row = mysqli_fetch_assoc($MINUTE_PRODUCT_RESULT)) {
    $id = $minute_row['stock_id'];
    $name = $minute_row['stock_name'];
    $supplier = $minute_row['stock_supplier'];
    $category = $minute_row['stock_category'];
    $price = $minute_row['stock_price'];
    $quantity = $minute_row['stock_quantity'];
    $color='';
    if ($quantity <=20) {
       $color = "style='background-color:#BC243C;color:white;'";
    }
    elseif ($quantity >=21 && $quantity <=50) {
      $color = "style='background-color:#D8AE47;color:white;'";
    }
  


?>
    <tr>
      
      <td><?=$id?></td>
      <td><?=$name?></td>
      <td><?=$supplier?></td>
      <td><?=$category?></td>
      <td>&#8369; <?=$price?></td>
      <td <?=$color?> class="text-center"><?=$quantity?></td>
      <td class="text-center"><button class="btn btn-primary" data-target="#add<?=$id?>" data-toggle="modal">
                               <span class="fa fa-plus"></span></button></td>

<?php 

    $sql = "SELECT * FROM minute_product where product_bun = '$name' OR  product_patty = '$name' OR product_dressing = '$name' 
    OR add_on = '$name' ";
    $sql_result = mysqli_query($connect,$sql);
    if(mysqli_num_rows($sql_result) >= 1) {
?>
  <td class="text-center"><label class="label label-success">In Use</label></td>
<?php
    }
    else{
?>
    <td class="text-center"><button class="btn btn-danger" data-target="#remove<?=$id?>" data-toggle="modal">
                              <span class="fa fa-trash"></span></button></td>

<?php

    } 


 ?>
    </tr>


<div class="modal fade" id="add<?=$id?>" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <form class="form" method="POST" action="../stock_process/edit_quantity_main.php">

         <div class="modal-header">
          <h4><span class="fa fa-plus"></span> ADD QUANTITY <label class="label label-primary"><?=$id?></label></h4>
        </div>

         <div class="modal-body">
           
            <div class="form-group">
                <label class="control-label">Supply Name</label>
                <input type="text" class="form-control" value="<?=$name?>" disabled>
                <input type="hidden" name="supply_name" value="<?=$name?>">
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
                <label class="control-label">ADD Quantity</label>
                <input type="number" name="supplier_quantity" class="form-control" placeholder="Quantity" min="1" required>
                <input type="hidden" name="quantity" value="<?=$quantity?>">
            </div>

         </div>


         <div class="modal-footer">
                <button class="btn btn-default fa fa-times" data-dismiss="modal"></button>
                <input type="submit" name="submit_supply" class="btn btn-primary" value="ADD">
         </div>
      </form>
    </div>
  </div> 
</div> 


<div class="modal fade" id="remove<?=$id?>" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <form class="form" method="POST" action="../stock_process/delete_record.php">

         <div class="modal-header">
          <h4><span class="fa fa-times"></span> REMOVE STOCK <label class="label label-danger"><?=$id?></label></h4>
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

  </div>



	</div>
              
</div>

</div>

</div>

 <div class="modal fade" id="success" role="dialog">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
              <div class="modal-header" style="background-color: #006E51">
              <h2 class="text-center" style="color: white"><span class="fa fa-check"></span> Success <span class="fa fa-exclamation"></span></h2>
          </div>
          <div class="modal-body">
                  <h4 class="text-center"><span class="fa fa-info-circle" style="color: #006E51"></span>
                  <i style="text-decoration: underline;">Stock has been Deleted</i></h4>
              </div>
          <div class="modal-footer" style="background-color: #e3e3e4">
                  <button class="btn btn-default fa fa-times" data-dismiss="modal"></button>
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
                  <i style="text-decoration: underline;">New Added Quantity</i></h4>
              </div>
          <div class="modal-footer" style="background-color: #e3e3e4">
                  <button class="btn btn-default fa fa-times" data-dismiss="modal"></button>
              </div>
        </div>
      </div>
</div>

<div class="modal fade" id="remove_failed" role="dialog">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
          <div class="modal-header" style="background-color: #BC243C">
              <h2 class="text-center"><span style="color: white" class="fa fa-times"></span> <b style="color: white">Error Occur</b></h2>
          </div>
            <div class="modal-body">
                  <h4 class="text-center"><span class="fa fa-exclamation-triangle" style="color: #BC243C"></span>
                  <i style="text-decoration: underline;">While Adding Quantity</i></h4>
              </div>
            <div class="modal-footer" style="background-color: #e3e3e4">
                  <button class="btn btn-default" data-dismiss="modal"><span class="fa fa-times" style="color: #BC243C"></span></button>
              </div>
        </div>
      </div>
</div>

<div class="modal fade" id="remove_failed2" role="dialog">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
          <div class="modal-header" style="background-color: #BC243C">
              <h2 class="text-center"><span style="color: white" class="fa fa-times"></span> <b style="color: white">Error Occur</b></h2>
          </div>
            <div class="modal-body">
                  <h4 class="text-center"><span class="fa fa-exclamation-triangle" style="color: #BC243C"></span>
                  <i style="text-decoration: underline;">While Deleting Stock</i></h4>
              </div>
            <div class="modal-footer" style="background-color: #e3e3e4">
                  <button class="btn btn-default" data-dismiss="modal"><span class="fa fa-times" style="color: #BC243C"></span></button>
              </div>
        </div>
      </div>
</div>

<div class="modal fade" id="update_failed" role="dialog">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
          <div class="modal-header" style="background-color: #BC243C">
              <h2 class="text-center"><span style="color: white" class="fa fa-times"></span> <b style="color: white">Error Occur</b></h2>
          </div>
            <div class="modal-body">
                  <h4 class="text-center"><span class="fa fa-exclamation-triangle" style="color: #BC243C"></span>
                  <i style="text-decoration: underline;">Supply From the Supplier didn't exist</i></h4><br>

                  <h5 class="text-center"><span class="fa fa-exclamation-circle" style="color: #BC243C"></span>
                    <i style="text-decoration: underline;">Check Supplier Supply</i></h5>
              </div>
            <div class="modal-footer" style="background-color: #e3e3e4">
                  <button class="btn btn-default" data-dismiss="modal"><span class="fa fa-times" style="color: #BC243C"></span></button>
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
    else if(page == '2') {
      $('#success2').modal('show');
    }
    else if(page == '3') {
      $('#remove_failed').modal('show');
    }
    else if(page == '4') {
      $('#remove_failed2').modal('show');
    }
    else if(page == '5') {
      $('#update_failed').modal('show');
    }


  });

</script>

</body>
</html>