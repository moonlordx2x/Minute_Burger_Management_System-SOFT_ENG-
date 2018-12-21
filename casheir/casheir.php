<?php 
include '../function/in-session.php';
require '../connect/connect.php';

date_default_timezone_set("Asia/Manila");
  $time = date("Y-m-d");
  $time2 = date("Y-M-D");
  $time3 = date("h:i:sA");
  $page = '';

$week = date('Y-m-d',strtotime('monday this week'));

$weeks = date('Y-m-d',strtotime('sunday this week'));

if (isset($_GET['filter'])) {
    $filter = $_GET['filter'];
}
else{
  $filter = '';
}

$page = '';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
else{
  $page = '';
}
$hello = '';
$amount = '';
if (isset($_GET['amount'])) {
    $amount = $_GET['amount'];
    $hello = 'result';
}
else{
 $amount = '';
}

$total = '';
if (isset($_GET['total'])) {
    $total = $_GET['total'];
    $hello = 'result';
}
else{
 $total = '';
}

$change = '';
if (isset($_GET['change'])) {
    $change = $_GET['change'];
    $hello = 'result';
}
else{
 $change = '';
}

$new = '';
if (isset($_GET['new'])) {
    $new = $_GET['new'];
}
else{
 $new = '';
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
<body>

<script type="text/javascript">
  $(document).ready(function(){
      $(".show1").hide();

      $("#hide").click(function(){
      $(".show1").show();
      $(".hide1").hide();
      });

      $("#show").click(function(){
      $(".hide1").show();
      $(".show1").hide();
      });

  });
</script>

  <!--  Navbar-->
<nav class="navbar navbar-inverse navbar-static-top hide1" role="navigation" style="margin-bottom: 0" id="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Minute Burger Management System</a>
        </div>

<?php 

  if ($_SESSION['user'] != 'admin') {
?>
  <ul class="nav navbar-nav hidden-xs">
      <li class="active"><a href="#"><span class="fa fa-shopping-cart"></span> &nbsp CASHIER</a></li>
  </ul>
<?php  
  }
  else{
?>

        <ul class="nav navbar-nav hidden-xs">
            <li><a href="../main_directory/home.php"><span class="fa fa-dashboard"></span> &nbsp DASHBOARD</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-list-alt"></span> &nbsp INVENTORY <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="../inventory/view_product.php"><span class="fa fa-th-list"></span> &nbsp View Product</a></li>
                  <li><a href="../inventory/view_supplier.php"><span class="fa fa-group"></span> &nbsp View Supplier</a></li>     
                  <li><a href="../inventory/view_stock.php"><span class="fa fa-th-list"></span> &nbsp View Stock</a></li>              
                </ul>
            </li> 
             <li class="active"><a href="#"><span class="fa fa-shopping-cart"></span> &nbsp CASHIER</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-bar-chart-o"></span> &nbsp SALES REPORT <span class="caret"></span></a>
                <ul class="dropdown-menu">
                <li><a href="../sales_report/daily.php"><span class="fa fa-bar-chart-o"></span> &nbsp DAILY SALES REPORT</a>  
                 <li><a href="../sales_report/weekly.php"><span class="fa fa-bar-chart-o"></span> &nbsp WEEKLY SALES REPORT</a>
                 <li><a href="../sales_report/monthly.php"><span class="fa fa-bar-chart-o"></span> &nbsp MONTHLY SALES REPORT</a>                        
                </ul>
            </li> 
    
         
        </ul>

<?php
  }
 ?>

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
                <li class="active"><a href="../main_directory/home.php"><span class="fa fa-dashboard"></span> &nbspDASHBOARD</a></li>
                  <li class="dropdown">
                          <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="hover"><span class="fa fa-list-alt">      
                          </span> &nbspInventory <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                  <li><a href="view_product.php"><span class="fa fa-th-list"></span> &nbsp View Product</a></li>
                                  <li><a href="view_supplier.php"><span class="fa fa-group"></span> &nbsp View Supplier</a></li>
                                  <li><a href="../inventory/view_stock.php"><span class="fa fa-th-list"></span> &nbsp View Stock</a></li>                                   
                              </ul>
                                  </li>
                            <li><a href="#">Casheir</a></li>
                            <li><a href="#">Menu 3</a></li>
              </ul>
            </div>
          </div>
        </nav>  

 <!--  Navbar END-->


  <!--  Main Content-->

<div class="container-fluid display-table">

<div class="well">

<div class="row">

<div class="col-md-5">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h4 class="text-center"><span class="fa fa-th-list"></span> Product Menu</h4>
       <form class="form-inline" method="POST" action="redirect.php">
                    
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
      <input type="text" class="form-control" name="search" placeholder="Search" id="search" autocomplete="off">
    </div>

     <div class="form-group pull-right">
            <label class="control-label">Filter</label>
              <select class="form-control" name="filter_Category">               
                    <option></option>
                    <option value="BURGER"><center>BURGER</center></option>
                    <option value="HOTDOG"><center>HOTDOG</center></option>
                    <option value="DRINKS"><center>DRINKS</center></option>
                    <option value="OTHER"><center>OTHER</center></option>
              </select>
              <button class="btn btn-default fa fa-search-plus" type="submit" name="filer_submit_2"></button>
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

                 </form> 
    </div>
      <table class="table">
       <thead>
              <tr>
                <th id="head">Product Name</th>
                <th id="head1">Product Category</th>
                <th id="head2">Product Price</th>
                <th id="head3">ADD</th>
              </tr>
     </thead>
    </table>

  <div class="panel-body">
     <div class="table-responsive" id="cool">
    <table class="table">
    <div class="table-responsive" id="cool">
             <tbody id="table">
<?php 
$sql = '';

if ($filter == '') {
  $sql = "SELECT * FROM minute_product order by product_category";
}
else{
  $sql = "SELECT * FROM minute_product where product_category='$filter'";
}

  
  $result = mysqli_query($connect,$sql);
  if (mysqli_num_rows($result) >=1){
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['product_id'];
        $name = $row['product_name'];
        $category = $row['product_category'];
        $price = $row['product_price']; 
        $bun = $row['product_bun']; 
        $patty = $row['product_patty']; 
        $dressing = $row['product_dressing'];
        $add_on = $row['add_on'];  

?>
<tr>
  <td width="35%"><?=$name?></td>
  <td width="35%"><?=$category?></td>
  <td width="35%">&#8369; <?=$price?></td>
  <td width="35%"><button type="button" class="btn btn-primary fa fa-plus" data-toggle="modal" data-target="#burger<?=$id?>"></button></td>
</tr>

<div class="modal fade" id="burger<?=$id?>" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form class="form" method="POST" action="../cashier_process/process.php">
      <div class="modal-header"><h4><span class="fa fa-plus"></span> Add this to List</h4></div>

      <div class="modal-body">

        <div class="form-group">
          <label class="control-label">Product Name</label>
          <input type="text" class="form-control" value="<?=$name?>" disabled>
          <input type="hidden" name="burger_name" value="<?=$name?>">
          <input type="hidden" name="burger_id" value="<?=$id?>">
          <input type="hidden" name="burger_bun" value="<?=$bun?>">
          <input type="hidden" name="burger_patty" value="<?=$patty?>">
          <input type="hidden" name="burger_dressing" value="<?=$dressing?>">
          <input type="hidden" name="burger_add_on" value="<?=$add_on?>">
        </div>

        <div class="form-group">
          <label class="control-label">Product Category</label>
          <input type="text" class="form-control" value="<?=$category?>" disabled>
          <input type="hidden" name="burger_category" value="<?=$category?>">
        </div>

        <div class="form-group">
          <label class="control-label">Product Price</label>
          <input type="text" class="form-control" value="<?=$price?>" disabled>
          <input type="hidden" name="burger_price" value="<?=$price?>">
        </div>

          <div class="form-group">
          <label class="control-label">Product Order</label>
          <input type="number" class="form-control" name="burger_order" placeholder="Product Order...">
        </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default fa fa-times" data-dismiss="modal"></button>
        <button type="submit" class="btn btn-primary" name="burger_submit">Add</button>
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
      </div>
    </table>
  </div>
  </div>

  </div>
</div>    

<div class="col-md-7">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h4 class="text-center"><span class="fa fa-user"></span> Cashier Mode</h4>
       <form class="form-inline" method="POST" action="redirect.php">
                    
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
      <input type="text" class="form-control" name="search1" placeholder="Search" id="search1" autocomplete="off">
    </div>

    <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#view_stock_1">
    <span class="fa fa-list-alt"></span> Stock</button>


    <div class="modal fade" id="view_stock_1" role="dialog">
      <div class="modal-dialog modal-lg">
       <div class="modal-content">
              <div class="modal-header" style="background-color: #006E51">
              <h2 class="text-center" style="color: white">Available Stock </h2>
          </div>
          <div class="modal-body" style="color:#3e4444">
              
              <table class="table table-hover table-condensed table-striped table-bordered">
                
                  <thead>
                <tr>
                  <th>Stock ID</th>
                  <th>Stock Name</th>
                  <th>Stock Category</th>
                  <th>Stock Quantiy</th>
                </tr>
              </thead>

    <tbody>
          
<?php
  $sql_notification = "SELECT * FROM minute_stock order by stock_id";
  $result_notification = mysqli_query($connect,$sql_notification);
  if (mysqli_num_rows($result_notification) >=1) {
    while ($row_notification = mysqli_fetch_assoc($result_notification)) {
    $id_notification = $row_notification['stock_id'];
    $name_notification = $row_notification['stock_name'];
    $category_notification = $row_notification['stock_category'];
    $price_notification = $row_notification['stock_price'];
    $stock_notification = $row_notification['stock_quantity'];
    $color = '';
    if ($stock_notification >=35 && $stock_notification <=55) {
        $color = "style='background-color:#D8AE47;color:black;'";
    }
    else if($stock_notification >=0 && $stock_notification <= 34) {
         $color = "style='background-color:#BC243C;color:white;'";
    }

?>

    <tr>
        <td><?=$id_notification?></td>
        <td><?=$name_notification?></td>
        <td><?=$category_notification?></td>
        <td <?=$color?> ><?=$stock_notification?></td>
    </tr>


<?php


    }

  }


?>


    </tbody>


              </table>


              </div>
          <div class="modal-footer" style="background-color: #e3e3e4">
                  <button class="btn btn-default fa fa-times" data-dismiss="modal"></button>
              </div>
        </div>
      </div>
    </div>



<script>
$(document).ready(function(){
  $("#search1").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#table1 tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

                 </form> 
    </div>


<div class="panel-body">
  <div class="table-responsive" id="cool">

<table class="table table-bordered table-hover table-condensed table-striped">
    
  <div class="table-responsive" id="cool">
         <thead>
              <tr>
                <th>Product Name</th>
                <th>Product Category</th>
                <th>Product Price</th>
                <th>Product Total</th>
                <th class="text-center">Action</th>
                <th class="text-center">Remove</th>
              </tr>
     </thead>
    <tbody id="table1">     
    
<?php
      
  $minute_sales = "SELECT * FROM minute_sales INNER JOIN minute_product 
                ON minute_sales.id=minute_product.product_id order by minute_sales.id";

  $minute_sales_result = mysqli_query($connect,$minute_sales);
  $product_total2 = '';
  if (mysqli_num_rows($minute_sales_result) >=1){
      while ($minute_sales_row = mysqli_fetch_assoc($minute_sales_result)) {

          //minute_sales

          $id_1 = $minute_sales_row['id'];
          $name_1 = $minute_sales_row['name'];
          $category_1 = $minute_sales_row['category'];
          $price_1 = $minute_sales_row['price'];
          $total_1 = $minute_sales_row['total'];


          //minute_product

          $bun_1 = $minute_sales_row['product_bun'];
          $patty_1 = $minute_sales_row['product_patty'];
          $dressing_1 = $minute_sales_row['product_dressing'];
          $add_on_1 = $minute_sales_row['add_on'];


          $product_total = $price_1 * $total_1;
          $product_total2+=$product_total;

?>
      <tr>
        <td><?=$name_1?></td>
        <td><?=$category_1?></td>
        <td>&#8369; <?=$price_1?></td>
        <td><?=$total_1?></td>
        <td class="text-center">
          <button type="button" class="btn btn-primary fa fa-plus-square" 
                  data-toggle="modal" data-target="#add<?=$id_1?>"></button>
          <button type="button" class="btn btn-warning fa fa-minus-square"
                  data-toggle="modal" data-target="#minus<?=$id_1?>"></button>
        </td>
        <td class="text-center">
          <button type="button" class="btn btn-danger fa fa-trash"
                  data-toggle="modal" data-target="#trash<?=$id_1?>"></button>
        </td>
      </tr>

      <div class="modal fade" id="add<?=$id_1?>" role="dialog">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
              <form class="form" method="POST" action="../cashier_process/add_process.php">
                <div class="modal-header"><h4><span class="fa fa-plus"></span> ADD MORE PRODUCT</h4></div>
                <div class="modal-body">
                    <div class="form-group">
                          <label class="control-label">Product Name</label>
                          <input type="text" class="form-control" value="<?=$name_1?>" disabled>
                    </div>


                    <div class="form-group">

                       <input type="hidden" name="add_id" value="<?=$id_1?>">
                       <input type="hidden" name="add_name" value="<?=$name_1?>">
                       <input type="hidden" name="add_category" value="<?=$category_1?>">
                       <input type="hidden" name="add_price" value="<?=$price_1?>">
                       <input type="hidden" name="add_total" value="<?=$total_1?>">


                       <input type="hidden" name="add_bun" value="<?=$bun_1?>">
                       <input type="hidden" name="add_patty" value="<?=$patty_1?>">
                       <input type="hidden" name="add_dressing" value="<?=$dressing_1?>">
                       <input type="hidden" name="add_on_add" value="<?=$add_on_1?>">

                    </div>

                     <div class="form-group">
                          <label class="control-label">Add Total Product</label>
                          <input type="number" class="form-control" name="add_total_1" min="1">
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default fa fa-times" data-dismiss="modal"></button>
                  <button type="submit" class="btn btn-primary" name="add_submit">Add</button>
                </div>
              </form>
          </div>
        </div>
      </div>


       <div class="modal fade" id="minus<?=$id_1?>" role="dialog">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
              <form class="form" method="POST" action="../cashier_process/minus_process.php">
                <div class="modal-header"><h4><span class="fa fa-minus"></span> Decrease PRODUCT</h4></div>
                <div class="modal-body">
                    <div class="form-group">
                          <label class="control-label">Product Name</label>
                          <input type="text" class="form-control" value="<?=$name_1?>" disabled>
                    </div>


                    <div class="form-group">

                       <input type="hidden" name="minus_id" value="<?=$id_1?>">
                       <input type="hidden" name="minus_name" value="<?=$name_1?>">
                       <input type="hidden" name="minus_category" value="<?=$category_1?>">
                       <input type="hidden" name="minus_price" value="<?=$price_1?>">
                       <input type="hidden" name="minus_total" value="<?=$total_1?>">


                       <input type="hidden" name="minus_bun" value="<?=$bun_1?>">
                       <input type="hidden" name="minus_patty" value="<?=$patty_1?>">
                       <input type="hidden" name="minus_dressing" value="<?=$dressing_1?>">
                       <input type="hidden" name="minus_on_add" value="<?=$add_on_1?>">

                    </div>

                     <div class="form-group">
                          <label class="control-label">Minus Total Product</label>
                          <input type="number" class="form-control" name="minus_total_1" min='1' max="<?=$total_1?>">
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default fa fa-times" data-dismiss="modal"></button>
                  <button type="submit" class="btn btn-warning" name="minus_submit">Decrease</button>
                </div>
              </form>
          </div>
        </div>
      </div>

      <div class="modal fade" id="trash<?=$id_1?>" role="dialog">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
              <form class="form" method="POST" action="../cashier_process/remove_process.php">
                <div class="modal-header"><h4><span class="fa fa-trash"></span> Remove PRODUCT</h4></div>
                <div class="modal-body">
                    <div class="form-group">
                          <label class="control-label">Product Name</label>
                          <input type="text" class="form-control" value="<?=$name_1?>" disabled>
                    </div>


                    <div class="form-group">

                       <input type="hidden" name="trash_id" value="<?=$id_1?>">
                       <input type="hidden" name="trash_name" value="<?=$name_1?>">
                       <input type="hidden" name="trash_category" value="<?=$category_1?>">
                       <input type="hidden" name="trash_price" value="<?=$price_1?>">
                       <input type="hidden" name="trash_total" value="<?=$total_1?>">

                       <input type="hidden" name="trash_bun" value="<?=$bun_1?>">
                       <input type="hidden" name="trash_patty" value="<?=$patty_1?>">
                       <input type="hidden" name="trash_dressing" value="<?=$dressing_1?>">
                       <input type="hidden" name="trash_on_add" value="<?=$add_on_1?>">

                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default fa fa-times" data-dismiss="modal"></button>
                  <button type="submit" class="btn btn-danger" name="minus_submit">Remove</button>
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
  </div>

</table>

  </div>
</div>

  <div class="panel-footer">
    <div class="row">
      
      <div class="col-md-6">
        
        <div class="panel panel-primary">
      
      <div class="panel-heading"><h3><span class="fa fa-pencil-square-o"></span> <b>Payment</b></h3></div>

      <div class="panel-body">
          <form class="form-inline" action="../cashier_process/submit.php" method="POST">
            
            <div class="form-group">
              <label class="control-label"><h2><b>Enter Amount :</b></h2></label>
              <input type="number" name="pay_amount" class="form-control input-lg" min="<?=$product_total2?>" required>
              <input type="hidden" name="total" value="<?=$product_total2?>">
            </div><br><br>

           
<?php 

  $amount_checking = "SELECT * FROM minute_sales";
  $amount_checking_result = mysqli_query($connect,$amount_checking);
  if (mysqli_num_rows($amount_checking_result) >=1) {
?>
   <button type="submit" class="btn btn-primary btn-block" name="amount_submit">SUBMIT</button>
<?php
  }
  else{
?>
   <button type="button" class="btn btn-primary btn-block">SUBMIT</button>
<?php  
  }

 ?>

           



          </form>
      </div>

    </div>

      </div>

      <div class="col-md-6">
        
                <div class="panel panel-primary">
      <div class="panel-heading"><h3><span class="fa fa-pencil-square-o"></span> <b>RESULT</b></h3></div>

      <div class="panel-body">
          
          <table class="table table-condensed table-striped table-hover">
            
              <tbody>
                <tr>
                  <td><H3>TOTAL AMOUNT :</H3></td>
                  <td><H3> &#8369; <?=$amount?></H3></td>
                </tr>
                 <tr>
                  <td><H3>TOTAL  COST &nbsp&nbsp&nbsp&nbsp&nbsp:</H3></td>
  <?php 
    $sales_report = "SELECT * FROM minute_sales";
    $sales_report_result = mysqli_query($connect,$sales_report);
    if (mysqli_num_rows($sales_report_result) >=1) {
     echo " <td><H3> &#8369; $product_total2</H3></td>";
    }
    else{
     echo " <td><H3> &#8369; $total</H3></td>";
    }

   ?>            
                 
                </tr>
                 <tr>
                  <td><H3>TOTAL CHANGE :</H3></td>
                   <td><H3> &#8369; <?=$change?></H3></td>
                </tr>
              </tbody>



          </table>
    </div>

    <div class="panel-footer">

<?php 
if ($hello == 'result'){
  echo "
  <a href='casheir.php'>
        <button type='button' class='btn btn-primary btn-block'>New Transaction</button>
  </a>";
}
else{

}


?>
    </div>

      </div>

    </div>
    
  </div>

  </div>
</div>   

</div>

</div> 

  </div>

</div>

  <!--  Main Content END-->


 <div class="modal fade" id="success" role="dialog">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
              <div class="modal-header" style="background-color: #006E51">
              <h2 class="text-center" style="color: white"><span class="fa fa-check"></span> Success <span class="fa fa-exclamation"></span></h2>
          </div>
          <div class="modal-body">
                  <h4 class="text-center"><span class="fa fa-info-circle" style="color: #006E51"></span>
                  <i style="text-decoration: underline;">Product has been Added</i></h4>
              </div>
          <div class="modal-footer" style="background-color: #e3e3e4">
                  <button class="btn btn-default fa fa-times" data-dismiss="modal"></button>
              </div>
        </div>
      </div>
</div>

 <div class="modal fade" id="success1" role="dialog">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
              <div class="modal-header" style="background-color: #006E51">
              <h2 class="text-center" style="color: white"><span class="fa fa-check"></span> Success <span class="fa fa-exclamation"></span></h2>
          </div>
          <div class="modal-body">
                  <h4 class="text-center"><span class="fa fa-info-circle" style="color: #006E51"></span>
                  <i style="text-decoration: underline;">Product Total has been Added</i></h4>
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
                  <i style="text-decoration: underline;">Product Total has been Decreased</i></h4>
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
                  <i style="text-decoration: underline;">Product has been Removed</i></h4>
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
                  <i style="text-decoration: underline;">Product Already Exist in the list</i></h4>
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
                  <i style="text-decoration: underline;">Insufficient Stock for this product</i></h4>
              </div>
            <div class="modal-footer" style="background-color: #e3e3e4">
                  <button class="btn btn-default" data-dismiss="modal"><span class="fa fa-times" style="color: #BC243C"></span></button>
              </div>
        </div>
      </div>
</div>


<script type="text/javascript">
$(document).ready(function(){

  var status = '<?=$page?>';
  if (status == '1') {
    //$('#success').modal('show');
  }
  else if(status == '2') {
    $('#error').modal('show');
  }
  else if(status == '3') {
    $('#error2').modal('show');
  }
  else if(status == '4') {
    //$('#success1').modal('show');
  }
   else if(status == '5') {
   // $('#success2').modal('show');
  }
    else if(status == '6') {
    $('#success3').modal('show');
  }


});

</script>


</body>
</html>