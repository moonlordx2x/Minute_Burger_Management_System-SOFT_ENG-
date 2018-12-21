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

$category_product = '';

if (isset($_GET['category'])) {
  $category_product = $_GET['category'];
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
            <li id="active"><a href=""><span class="fa fa-shopping-cart"></span> &nbspView Product</a></li>
            <li><a href="../inventory/view_supplier.php"><span class="fa fa-group"></span>&nbsp View Supplier</a></li>
            <li><a href="../inventory/view_stock.php"><span class="fa fa-th-list"></span> &nbsp View Stock</a></li>                                  
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


          <h1 class="text-center"><span class="label label-primary fa fa-tag"> <b>Product Management</b></span></h1>
          <form class="form-inline" method="POST" action="redirect.php">
                    
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
      <input type="text" class="form-control" name="search" placeholder="Search" id="search" autocomplete="off">
    </div>

     <div class="form-group">
            <label class="control-label">Filter</label>
              <select class="form-control" name="filter_Category">               
                    <option></option>
                    <option value="BURGER"><center>BURGER</center></option>
                    <option value="HOTDOG"><center>HOTDOG</center></option>
                    <option value="DRINKS"><center>DRINKS</center></option>
                    <option value="OTHER"><center>OTHER</center></option>
              </select>
              <button class="btn btn-primary fa fa-search-plus" type="submit" name="filer_submit_4"></button>
      </div>
  <button type="button" class="btn btn-info pull-right" data-target="#product" data-toggle="modal">
    <span class="fa fa-plus"></span> ADD PRODUCT</button>

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
<div class="modal fade" id="product" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form class="form" method="POST" action="redirect.php">
      <div class="modal-header"><h4><span class="fa fa-plus"></span> Add New Product</h4></div>
      <div class="modal-body">
        <div class="form-group">
          <label class="control-label">Select Product Type</label>
            <select class="form-control" name="product_category" required>
                    <option></option>
                    <option value="BURGER">BURGERS</option>
                    <option value="HOTDOG">HOTDOGS</option>
                    <option value="DRINKS">DRINKS</option>
                    <option value="OTHER">EXTRA</option>
            </select>
        </div>
      </div>
       <div class="modal-footer">
          <button class="btn btn-default fa fa-times" data-dismiss="modal"></button>
          <button class="btn btn-primary" type="submit" name="category">Proceed</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="table-responsive">

  <table class="table table-hover table-bordered table-condensed table-striped">
    <thead>
      <tr>
        <th class="text-center"><label class="label label-default">Product ID</label></th>
        <th class="text-center"><label class="label label-default">Product Name</label></th>
        <th class="text-center"><label class="label label-default">Product Category</label></th>
        <th class="text-center"><label class="label label-default">Product Price</label></th>
        <th class="text-center"><label class="label label-primary">Edit</label></th>
        <th class="text-center"><label class="label label-danger">Remove</label></th>
      </tr>
    </thead>
    <tbody id="table">
      
<?php  
$product_table = '';

if ($filter == '') {
  $product_table = "SELECT * FROM minute_product ORDER BY product_id";
}
else{
  $product_table = "SELECT * FROM minute_product where product_category= '$filter' ORDER BY product_id";
}

$product_table_result = mysqli_query($connect,$product_table);
if (mysqli_num_rows($product_table_result) >=1) {
  while ($product_row = mysqli_fetch_assoc($product_table_result)) {
     $id = $product_row['product_id'];
     $name = $product_row['product_name'];
     $category_1 = $product_row['product_category'];
     $category = $product_row['product_category'];
     $price = $product_row['product_price'];
     $bun = $product_row['product_bun'];
     $patty = $product_row['product_patty'];
     $dressing = $product_row['product_dressing'];
     $add_on_product = $product_row['add_on'];

     $class = '';
     $class_2 = '';
     $class_3 = '';
     $class_4 = '';

     $hidden = '';
     $hidden1 = '';
     $hidden2 = '';
     $hidden3 = '';

     if ($category == 'BURGER') {
       $class = 'BUNS';
       $class_2 = 'PATTY';
       $class_3 = 'DRESSING';
       $class_4 = 'OTHER';
     }
     else if($category == 'HOTDOG'){
      $class = 'BUNS';
      $class_2 = 'HOTDOG';
      $class_3 = 'DRESSING';
      $class_4 = 'OTHER';
     }
     else if ($category == 'DRINKS') {
       $class = 'DRINKS';
       $class_2 = 'CUPS';
      $hidden2 = 'hidden';
      $hidden3 = 'hidden';
     }
     else if ($category == 'OTHER') {
       $hidden = 'hidden';
       $hidden1 = 'hidden';
       $hidden2 = 'hidden';
       $class_4 = 'OTHER';
     }

      ?>
      <tr>
        
        <td class="text-center"><?=$product_row['product_id']?></td>
        <td class="text-center"><?=$product_row['product_name']?></td>
        <td class="text-center"><?=$product_row['product_category']?></td>
        <td class="text-center">&#8369; <?=$product_row['product_price']?></td>
        <td class="text-center"><button class="btn btn-primary" data-toggle='modal' data-target='#edit<?=$id?>'><span class="fa fa-edit"></span></button></td>
        <td class="text-center"><button class="btn btn-danger" data-toggle='modal' data-target='#remove<?=$id?>'><span class="fa fa-trash"></span></button></td>


<div class="modal fade" id="remove<?=$id?>">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form class="form" method="POST" action="../product_process/remove_product.php">
      <div class="modal-header"><h4><span class="fa fa-times"></span> Edit Product <span class="label label-danger"><?=$id?></span></h4></div>

      <div class="modal-body">

        <div class="form-group">
          <label class="control-label">Product Name</label>
          <input type="text" value="<?=$name?>" class="form-control" disabled>
          <input type="hidden" name="id_remove" value="<?=$id?>">
        </div>
        <div class="form-group">
          <label class="control-label">Product Category</label>
          <input type="text" value="<?=$category?>" class="form-control" disabled>
        </div>
        <div class="form-group">
          <label class="control-label">Product Price</label>
          <input type="text" value="<?=$price?>" class="form-control" disabled>
        </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default fa fa-times" data-dismiss="modal"></button>
        <button type="submit" class="btn btn-danger fa" name="remove_submit">Remove</button>
      </div>
      </form>
    </div>
  </div>
</div>



<div class="modal fade" id="edit<?=$id?>" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
    <form class="form" method="POST" action="../product_process/update_product.php">
    <div class="modal-header"><h4><span class="fa fa-pencil"></span> Edit Product <span class="label label-primary"><?=$id?></span></h4></div>
    <div class="modal-body">

      <div class="form-group">
        <label class="control-label">Product Name</label>
        <input type="text" name="product_name" value="<?=$name?>" class="form-control">
        <input type="hidden" name="product_id" value="<?=$id?>">
      </div>

      <div class="form-group">
        <label class="control-label">Product Category</label>
        <input type="hidden" name="edit_category" value="<?=$category?>">
        <select class="form-control" name="edit_category" disabled>
          <option value="NONE"></option>
<?php
      @$sql = "SELECT product_category FROM minute_product group by product_category";
      @$sql_result = mysqli_query($connect,$sql);
      if (@mysqli_num_rows($sql_result) >=1) {
        while (@$row_sql = mysqli_fetch_assoc($sql_result)){
        @$row_category = $row_sql['product_category'];
        if ($row_category == $category_1){
         echo "<option selected value='$row_category'>$row_category</option>";
        }
        else{
          echo "<option value='$row_category'>$row_category</option>";
        }
      }
      }


?>
        </select>
      </div>

      <div class="form-group">
        <label class="control-label">Product Price</label>
        <input type="number" name="product_price" value="<?=$price?>" class="form-control">
      </div>


        <div class="form-group <?=$hidden?>">
        <label class="control-label">Product <?=$class?></label>
        <select class="form-control" name="edit_category_1">

<?php
if ($bun == 'NONE') {
 echo "<option selected value='NONE'>NONE</option>";
}
else{
  @$sql = "SELECT stock_name FROM minute_stock where stock_category = '$class' group by stock_name";
  @$sql_result = mysqli_query($connect,$sql);
  if(@mysqli_num_rows($sql_result) >=1){
  while (@$row_sql = mysqli_fetch_assoc($sql_result)){
  @$row_category = $row_sql['stock_name'];
  if ($row_category == $bun){
  echo "<option selected value='$row_category'>$row_category</option>";
  }
  else{
  echo "<option value='$row_category'>$row_category</option>";
  }
 }
}
}

?>
        </select>
      </div>


  <div class="form-group <?=$hidden1?>">
        <label class="control-label">Product <?=$class?></label>
        <select class="form-control" name="edit_category_2">

<?php
if ($bun == 'NONE') {
 echo "<option selected value='NONE'>NONE</option>";
}
else{
  @$sql = "SELECT stock_name FROM minute_stock where stock_category = '$class_2' group by stock_name";
  @$sql_result = mysqli_query($connect,$sql);
  if(@mysqli_num_rows($sql_result) >=1){
  while (@$row_sql = mysqli_fetch_assoc($sql_result)){
  @$row_category = $row_sql['stock_name'];
  if ($row_category == $patty){
  echo "<option selected value='$row_category'>$row_category</option>";
  }
  else{
  echo "<option value='$row_category'>$row_category</option>";
  }
 }
}
}

?>
        </select>
      </div>

        <div class="form-group <?=$hidden2?>">
        <label class="control-label">Product <?=$class?></label>
        <select class="form-control" name="edit_category_3">

<?php
if ($bun == 'NONE') {
 echo "<option selected value='NONE'>NONE</option>";
}
else{
  @$sql = "SELECT stock_name FROM minute_stock where stock_category = '$class_3' group by stock_name";
  @$sql_result = mysqli_query($connect,$sql);
  if(@mysqli_num_rows($sql_result) >=1){
  while (@$row_sql = mysqli_fetch_assoc($sql_result)){
  @$row_category = $row_sql['stock_name'];
  if ($row_category == $dressing){
  echo "<option selected value='$row_category'>$row_category</option>";
  }
  else{
  echo "<option value='$row_category'>$row_category</option>";
  }
 }
}
}

?>
        </select>
      </div>

              <div class="form-group <?=$hidden3?>">
        <label class="control-label">Product Add-on</label>
        <select class="form-control" name="edit_category_4">
          <option selected value='NONE'>NONE</option>
<?php


  @$sql = "SELECT stock_name FROM minute_stock where stock_category = '$class_4' group by stock_name";
  @$sql_result = mysqli_query($connect,$sql);
  if(@mysqli_num_rows($sql_result) >=1){
  while (@$row_sql = mysqli_fetch_assoc($sql_result)){
  @$row_category = $row_sql['stock_name'];
  if ($row_category == $add_on_product){
  echo "<option selected value='$row_category'>$row_category</option>";
  }
  else{
  echo "<option value='$row_category'>$row_category</option>";
  }
 }
}


?>
        </select>
      </div>


           


    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default fa fa-times" data-dismiss="modal"></button>
      <button class="btn btn-primary" type="submit" name="edit_product">Edit Product</button>
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
                  <i style="text-decoration: underline;">New Added Product</i></h4>
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
                  <i style="text-decoration: underline;">Product Already Exist</i></h4>
              </div>
            <div class="modal-footer" style="background-color: #e3e3e4">
                  <button class="btn btn-default" data-dismiss="modal"><span class="fa fa-times" style="color: #BC243C"></span></button>
              </div>
        </div>
      </div>
</div>

<div class="modal fade" id="error1" role="dialog">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
          <div class="modal-header" style="background-color: #BC243C">
              <h2 class="text-center"><span style="color: white" class="fa fa-times"></span> <b style="color: white">Error Occur</b></h2>
          </div>
            <div class="modal-body">
                  <h4 class="text-center"><span class="fa fa-exclamation-triangle" style="color: #BC243C"></span>
                  <i style="text-decoration: underline;">While Adding Drink</i></h4>
              </div>
            <div class="modal-footer" style="background-color: #e3e3e4">
                  <button class="btn btn-default" data-dismiss="modal"><span class="fa fa-times" style="color: #BC243C"></span></button>
              </div>
        </div>
      </div>
</div>

<div class="modal fade" id="sucess1" role="dialog">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
              <div class="modal-header" style="background-color: #006E51">
              <h2 class="text-center" style="color: white"><span class="fa fa-check"></span> Success <span class="fa fa-exclamation"></span></h2>
          </div>
          <div class="modal-body">
                  <h4 class="text-center"><span class="fa fa-info-circle" style="color: #006E51"></span>
                  <i style="text-decoration: underline;">Product has been Updated</i></h4>
              </div>
          <div class="modal-footer" style="background-color: #e3e3e4">
                  <button class="btn btn-default fa fa-times" data-dismiss="modal"></button>
              </div>
        </div>
      </div>
</div>

<div class="modal fade" id="error1" role="dialog">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
          <div class="modal-header" style="background-color: #BC243C">
              <h2 class="text-center"><span style="color: white" class="fa fa-times"></span> <b style="color: white">Error Occur</b></h2>
          </div>
            <div class="modal-body">
                  <h4 class="text-center"><span class="fa fa-exclamation-triangle" style="color: #BC243C"></span>
                  <i style="text-decoration: underline;">Product Name Already Exist</i></h4>
              </div>
            <div class="modal-footer" style="background-color: #e3e3e4">
                  <button class="btn btn-default" data-dismiss="modal"><span class="fa fa-times" style="color: #BC243C"></span></button>
              </div>
        </div>
      </div>
</div>

<div class="modal fade" id="sucess2" role="dialog">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
              <div class="modal-header" style="background-color: #006E51">
              <h2 class="text-center" style="color: white"><span class="fa fa-check"></span> Success <span class="fa fa-exclamation"></span></h2>
          </div>
          <div class="modal-body">
                  <h4 class="text-center"><span class="fa fa-info-circle" style="color: #006E51"></span>
                  <i style="text-decoration: underline;">Product has been Deleted</i></h4>
              </div>
          <div class="modal-footer" style="background-color: #e3e3e4">
                  <button class="btn btn-default fa fa-times" data-dismiss="modal"></button>
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
                  <i style="text-decoration: underline;">While Deleting the Product</i></h4>
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
      else if (page == '2') {
        $('#error').modal('show');
      }
      else if (page == '3') {
        $('#error1').modal('show');
      }
      else if (page == '4') {
        $('#sucess1').modal('show');
      }
      else if (page == '5') {
        $('#error1').modal('show');
      }
      else if (page == '6') {
        $('#sucess2').modal('show');
      }
      else if (page == '7') {
        $('#error2').modal('show');
      }


      var category = "<?=$category_product?>";

      if (category == 'BURGER') {
        $('#BURGER').modal('show');
      }
      else if (category == 'HOTDOG') {
        $('#HOTDOG').modal('show');
      }
      else if (category == 'DRINKS') {
        $('#DRINKS').modal('show');
      }
      else if (category == 'OTHER') {
        $('#OTHER').modal('show');
      }
  });
</script>

<!--BURGER TYPE PRODUCT-->

<div class="modal fade" id="BURGER" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form class="form" method="POST" action="../product_process/burger_add_product.php">
           <div class="modal-header"><h4><span class="fa fa-plus"></span> Add New BURGER</h4></div>
           <div class="modal-body">

              <div class="form-group">
                  <label class="control-label">Product Name</label>
                  <input type="text" name="product_name" placeholder="Product Name.." class="form-control" required
                  autocomplete="off">
                  <input type="hidden" name="product_category" value="<?=$category_product?>">
              </div>

               <div class="form-group">
                  <label class="control-label">Product Price</label>
                  <input type="number" name="product_number" placeholder="Product Number.." class="form-control" autocomplete="off" required>
              </div>

              <div class="form-group">
                  <label class="control-label">BUNS TYPE</label>
                  <select class="form-control" name="product_buns">
                    <option></option>
                    <option value="NONE">NONE</option>
<?php  

$sql = "SELECT * FROM minute_stock where stock_category='BUNS' AND stock_name NOT LIKE '%HOTDOG%'";
$result = mysqli_query($connect,$sql);
if (mysqli_num_rows($result) >=1) {
  while ($row = mysqli_fetch_assoc($result)) {
    $category = $row['stock_name'];
    ?>
      <option value="<?=$category?>"><?=$category?></option>

    <?php
  }
}


?>
                  </select>
              </div>

                  <div class="form-group">
                  <label class="control-label">PATTY TYPE</label>
                  <select class="form-control" name="product_patty" required>
                    <option></option>
                    <option value="NONE">NONE</option>
<?php  

$sql = "SELECT * FROM minute_stock where stock_category='PATTY'";
$result = mysqli_query($connect,$sql);
if (mysqli_num_rows($result) >=1) {
  while ($row = mysqli_fetch_assoc($result)) {
    $category = $row['stock_name'];
    ?>
      <option value="<?=$category?>"><?=$category?></option>

    <?php
  }
}


?>
                  </select>
              </div>

              <div class="form-group">
                  <label class="control-label">DRESSING</label>
                  <select class="form-control" name="product_dressing" required>
                    <option></option>
                    <option value="NONE">NONE</option>
<?php  

$sql = "SELECT * FROM minute_stock where stock_category='DRESSING'";
$result = mysqli_query($connect,$sql);
if (mysqli_num_rows($result) >=1) {
  while ($row = mysqli_fetch_assoc($result)) {
    $category = $row['stock_name'];
    ?>
        <option value="<?=$category?>"><?=$category?></option>

    <?php
  }
}

?>
                  </select>
              </div>

              <div class="form-group">
                  <label class="control-label">ADD-ON</label>
                  <select class="form-control" name="add_on" required>
                    <option></option>
                    <option value="NONE">NONE</option>
<?php  

$sql = "SELECT * FROM minute_stock where stock_category='OTHER'";
$result = mysqli_query($connect,$sql);
if (mysqli_num_rows($result) >=1) {
  while ($row = mysqli_fetch_assoc($result)) {
    $category = $row['stock_name'];
    ?>
        <option value="<?=$category?>"><?=$category?></option>

    <?php
  }
}


?>
                  </select>
              </div>


           </div>
           <div class="modal-footer">
             <button class="btn btn-default fa fa-times" data-dismiss="modal"></button>
             <button class="btn btn-primary" type="submit" name="add_product_submit">ADD PRODUCT</button>
           </div>
      </form>
    </div>
  </div>
</div>


<!--HOTDOG TYPE PRODUCT-->

<div class="modal fade" id="HOTDOG" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form class="form" method="POST" action="../product_process/hotdog_add_product.php">
           <div class="modal-header"><h4><span class="fa fa-plus"></span> Add New HOTDOG</h4></div>
           <div class="modal-body">

              <div class="form-group">
                  <label class="control-label">Product Name</label>
                  <input type="text" name="product_name" placeholder="Product Name.." class="form-control" required
                  autocomplete="off">
                  <input type="hidden" name="product_category_add" value="<?=$category_product?>">
              </div>

               <div class="form-group">
                  <label class="control-label">Product Price</label>
                  <input type="number" name="product_number" placeholder="Product Number.." class="form-control" autocomplete="off" required>
              </div>

              <div class="form-group">
                  <label class="control-label">BUNS TYPE</label>
                  <select class="form-control" name="product_buns" required>
                    <option></option>
                    <option value="NONE">NONE</option>
<?php  

$sql = "SELECT * FROM minute_stock where stock_category='BUNS' AND stock_name LIKE '%HOTDOG%'";
$result = mysqli_query($connect,$sql);
if (mysqli_num_rows($result) >=1) {
  while ($row = mysqli_fetch_assoc($result)) {
    $category = $row['stock_name'];
    ?>
      <option value="<?=$category?>"><?=$category?></option>

    <?php
  }
}


?>
                  </select>
              </div>

                  <div class="form-group">
                  <label class="control-label">HOTDOG TYPE</label>
                  <select class="form-control" name="product_patty" required>
                    <option></option>
                    <option value="NONE">NONE</option>
<?php  

$sql = "SELECT * FROM minute_stock where stock_category='HOTDOG'";
$result = mysqli_query($connect,$sql);
if (mysqli_num_rows($result) >=1) {
  while ($row = mysqli_fetch_assoc($result)) {
    $category = $row['stock_name'];
    ?>
      <option value="<?=$category?>"><?=$category?></option>

    <?php
  }
}


?>
                  </select>
              </div>

              <div class="form-group">
                  <label class="control-label">DRESSING</label>
                  <select class="form-control" name="product_dressing" required>
                    <option></option>
                    <option value="NONE">NONE</option>
<?php  

$sql = "SELECT * FROM minute_stock where stock_category='DRESSING'";
$result = mysqli_query($connect,$sql);
if (mysqli_num_rows($result) >=1) {
  while ($row = mysqli_fetch_assoc($result)) {
    $category = $row['stock_name'];
    ?>
        <option value="<?=$category?>"><?=$category?></option>

    <?php
  }
}

?>
                  </select>
              </div>

              <div class="form-group">
                  <label class="control-label">ADD-ON</label>
                  <select class="form-control" name="add_on" required>
                    <option></option>
                    <option value="NONE">NONE</option>
<?php  

$sql = "SELECT * FROM minute_stock where stock_category='OTHER'";
$result = mysqli_query($connect,$sql);
if (mysqli_num_rows($result) >=1) {
  while ($row = mysqli_fetch_assoc($result)) {
    $category = $row['stock_name'];
    ?>
        <option value="<?=$category?>"><?=$category?></option>

    <?php
  }
}


?>
                  </select>
              </div>


           </div>
           <div class="modal-footer">
             <button class="btn btn-default fa fa-times" data-dismiss="modal"></button>
             <button class="btn btn-primary" type="submit" name="add_product_submit">ADD PRODUCT</button>
           </div>
      </form>
    </div>
  </div>
</div>

<!--DRINKS TYPE PRODUCT-->

<div class="modal fade" id="DRINKS" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form class="form" method="POST" action="../product_process/drink_add_product.php">
           <div class="modal-header"><h4><span class="fa fa-plus"></span> Add New DRINKS</h4></div>
           <div class="modal-body">

              <div class="form-group">
                  <label class="control-label">Product Name</label>
                  <input type="text" name="product_name" placeholder="Product Name.." class="form-control" required
                  autocomplete="off">
                  <input type="hidden" name="product_category" value="<?=$category_product?>">
              </div>

               <div class="form-group">
                  <label class="control-label">Product Price</label>
                  <input type="number" name="product_number" placeholder="Product Number.." class="form-control" autocomplete="off" required>
              </div>

<div class="form-group">
                  <label class="control-label">Product Type</label>
                  <select class="form-control" name="drink" required>
                    <option></option>
                    <option value="NONE">NONE</option>
<?php  

$sql = "SELECT * FROM minute_stock where stock_category='DRINKS'";
$result = mysqli_query($connect,$sql);
if (mysqli_num_rows($result) >=1) {
  while ($row = mysqli_fetch_assoc($result)) {
    $category = $row['stock_name'];
    ?>
        <option value="<?=$category?>"><?=$category?></option>

    <?php
  }
}


?>
                  </select>
              </div>

<div class="form-group">
                  <label class="control-label">Drink Cup Type</label>
                  <select class="form-control" name="cups" required>
                    <option></option>
                    <option value="NONE">NONE</option>
<?php  

$sql = "SELECT * FROM minute_stock where stock_category='CUPS'";
$result = mysqli_query($connect,$sql);
if (mysqli_num_rows($result) >=1) {
  while ($row = mysqli_fetch_assoc($result)) {
    $category = $row['stock_name'];
    ?>
        <option value="<?=$category?>"><?=$category?></option>

    <?php
  }
}


?>
                  </select>
              </div>

           </div>
           <div class="modal-footer">
             <button class="btn btn-default fa fa-times" data-dismiss="modal"></button>
             <button class="btn btn-primary" type="submit" name="add_product_submit">ADD PRODUCT</button>
           </div>
      </form>
    </div>
  </div>
</div>

<!--OTHER TYPE PRODUCT-->

<div class="modal fade" id="OTHER" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form class="form" method="POST" action="../product_process/other_add_product.php">
           <div class="modal-header"><h4><span class="fa fa-plus"></span> Add New EXTRAS</h4></div>
           <div class="modal-body">

              <div class="form-group">
                  <label class="control-label">Product Name</label>
                  <input type="text" name="product_name" placeholder="Product Name.." class="form-control" required
                  autocomplete="off">
                  <input type="hidden" name="product_category" value="<?=$category_product?>">
              </div>

               <div class="form-group">
                  <label class="control-label">Product Price</label>
                  <input type="number" name="product_number" placeholder="Product Number.." class="form-control" autocomplete="off" required>
              </div>
              
          <div class="form-group">
                  <label class="control-label">ADD-ON</label>
                  <select class="form-control" name="add_on" required>
                    <option></option>
                    <option value="NONE">NONE</option>
<?php  

$sql = "SELECT * FROM minute_stock where stock_category='OTHER'";
$result = mysqli_query($connect,$sql);
if (mysqli_num_rows($result) >=1) {
  while ($row = mysqli_fetch_assoc($result)) {
    $category = $row['stock_name'];
    ?>
        <option value="<?=$category?>"><?=$category?></option>

    <?php
  }
}


?>
                  </select>
              </div>

           </div>
           <div class="modal-footer">
             <button class="btn btn-default fa fa-times" data-dismiss="modal"></button>
             <button class="btn btn-primary" type="submit" name="add_product_submit">ADD PRODUCT</button>
           </div>
      </form>
    </div>
  </div>
</div>



</body>
</html>