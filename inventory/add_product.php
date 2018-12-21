<?php include '../function/in-session.php'; 
      require '../connect/connect.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>Minute Burger Management System</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="../bootstrap/js/jquery.min.js.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../main_css/menu.css">

  <style type="text/css">
    
    #button{
      float: right;
    }
    @media only screen and (max-width: 355px){
      #button{
      float: left;
      padding-top: 5px;
      padding-bottom: 5px;
    }
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
                     <li><a href="#logout" data-target="#logout" data-toggle="modal"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                </ul>
          </div>
</nav>


      <!-- LOGOUT  -->

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

    <!-- LOGOUT  -->

        <nav class="navbar navbar-inverse visible-xs">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
              </button>
              <a class="navbar-brand" href="#">Logo</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav">
                <li><a href="../main_directory/home.php"><span class="glyphicon glyphicon-home"></span> &nbspDASHBOARD</a></li>
                      <li class="dropdown active">
                          <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="hover"><span class="glyphicon glyphicon-shopping-cart"></span> &nbspInventory <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                  <li><a href="view_product.php">View Product</a></li>
                                  <li><a href="view_supplier.php">View Supplier</a></li>
                                  <li class="active"><a href="add_product.php">ADD Product</a></li>      
                                  <li><a href="#" id="hover">ADD New Supplier</a></li>                                 
                              </ul>
                                  </li>
                            <li><a href="#">Menu 2</a></li>
                            <li><a href="#">Menu 3</a></li>
              </ul>
            </div>
          </div>
        </nav>

        <div class="container-fluid">
          <div class="row content">
            <div class="col-sm-1 sidenav hidden-xs">
              <h2>Logo</h2>
              <ul class="nav nav-pills nav-stacked">
                  <li><a href="../main_directory/home.php"><span class="glyphicon glyphicon-home"></span> &nbspDASHBOARD</a></li>
                      <li class="dropdown active">
                          <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="hover"><span class="glyphicon glyphicon-shopping-cart"></span> &nbspInventory <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                  <li><a href="view_product.php">View Product</a></li>
                                  <li><a href="view_supplier.php">View Supplier</a></li>
                                  <li class="active"><a href="add_product.php">ADD Product</a></li>      
                                  <li><a href="#" id="hover">ADD New Supplier</a></li>                                 
                              </ul>
                                  </li>
                            <li><a href="#">Menu 2</a></li>
                            <li><a href="#">Menu 3</a></li>
              </ul><br>
            </div><br>

            <div class="col-sm-10">
              <div class="well">
                    <h4><span class="glyphicon glyphicon-th-list"></span> PRODUCT
                    <button class="btn btn-info" id="button" data-toggle="collapse" data-target="#add_product"><span class="glyphicon glyphicon-plus"></span> ADD PRODUCT</button></h4><br>

<div id="add_product" class="collapse">
    <div class="panel panel-info">

          <div class="panel-body">
            <form class="form-horizontal" method="POST" autocomplete="off"> 
                      <div class="form-group">
                            <label class="col-sm-2 control-label">Product Name :</label>
                            <div class="col-sm-4"><input type="text" name="myInput" id="myInput" placeholder="Product Name" required class="form-control"></div>
                      </div>
              </form>

              <div class="table-responsive">
                    <table class="table table-bordered table-condensed table-hover">
                         <thead>
                <tr>
                    <th class="text-center"><span class="label label-default">Product ID #</span></th>
                    <th class="text-center"><span class="label label-default">Product Name</span></th>
                    <th class="text-center"><span class="label label-default">Product Supplier</span></th>
                    <th class="text-center"><span class="label label-default">Product Category</span></th>
                    <th class="text-center"><span class="label label-default">Product Price</span></th>
                    <th class="text-center"><span class="label label-primary">Action</span></th>
                </tr>

                  <tbody id="myTable">
<?php  

$MINUTE_PRODUCT = "SELECT * FROM minute_supplier_product ORDER BY supply_product_id";
$MINUTE_PRODUCT_RESULT = mysqli_query($connect,$MINUTE_PRODUCT);
  if (mysqli_num_rows($MINUTE_PRODUCT_RESULT) >=0) {

        while ($MINUTE_PRODUCT_ROW = mysqli_fetch_assoc($MINUTE_PRODUCT_RESULT)) {
                $MINUTE_PRODUCT_ID = $MINUTE_PRODUCT_ROW['supply_product_id'];
                $MINUTE_PRODUCT_NAME = $MINUTE_PRODUCT_ROW['supply_product_name'];
                $MINUTE_PRODUCT_SUPPLIER = $MINUTE_PRODUCT_ROW['supply_product_supplier'];
                $MINUTE_PRODUCT_CATEGORY = $MINUTE_PRODUCT_ROW['supply_product__category'];
                $MINUTE_PRODUCT_PRICE = $MINUTE_PRODUCT_ROW['supply_product_price'];

                ?>
  <tr>
    <td class="text-center"><?=$MINUTE_PRODUCT_ID?></td>
    <td class="text-center"><?=$MINUTE_PRODUCT_NAME?></td>
    <td class="text-center"><?=$MINUTE_PRODUCT_SUPPLIER?></td>
    <td class="text-center"><?=$MINUTE_PRODUCT_CATEGORY?></td> 
    <td class="text-center">&#8369;<?=$MINUTE_PRODUCT_PRICE?></td>
    <td class="text-center"><a href=""><button class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span></button></a></td>
 </tr>
                <?php
        }

}

?>
                  </tbody>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
               </thead>     
                    </table>
              </div>
          </div>
    </div>
</div>

                    <!--ADD PRODUCT -->

                        <div class="modal fade" id="">
                          <div class="modal-dialog">
                            <div class="modal-content">

                                  <div class="modal-header">
                                    <h4><span class="glyphicon glyphicon-plus"></span> ADD PRODUCT</h4>
                                  </div>

                                  <div class="modal-body">
                                    <form class="form-horizontal" method="POST" autocomplete="off">

                                        <div class="form-group">
                                              <label class="col-sm-4 control-label">Product Name :</label>
                                              <div class="col-sm-7"><input type="text" name="Product_Name" placeholder="Product Name" required class="form-control"></div>
                                        </div>

                                        <div class="form-group">
                                              <label class="col-sm-4 control-label">Product Category :</label>
                                              <div class="col-sm-7">
                                                  <select class="form-control" name="Product_Category" required>               
                                                                  <option></option>
                                                                  <option value="BUNS"><center>BUNS</center></option>
                                                                  <option value="PATTY"><center>PATTY</center></option>
                                                                  <option value="HOTDOG"><center>HOTDOG</center></option>
                                                                  <option value="OTHER"><center>OTHER</center></option>
                                                  </select>
                                              </div>
                                        </div>

                                        <div class="form-group">
                                              <label class="col-sm-4 control-label">Product Quantity :</label>
                                              <div class="col-sm-7"><input type="number" name="Product_Quantity" placeholder="Product Quantity" required class="form-control"></div>
                                        </div>

                                        <div class="form-group">
                                              <label class="col-sm-4 control-label">Product Price :</label>
                                              <div class="col-sm-7"><input type="number" name="Product_Price" placeholder="Product Price" required class="form-control"></div>
                                        </div>

                                              <center><input type="submit" name="Product_submit" class="btn btn-success" value="Add Product">
                                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button></center>
                                      </form>
                                  </div>
                            </div>
                          </div>
                        </div>
<?php 

if (isset($_POST['Product_submit'])) {
    $Product_Name = $_POST['Product_Name'];
    $Product_Category = $_POST['Product_Category'];
    $Product_Quantity = $_POST['Product_Quantity'];
    $Product_Price = $_POST['Product_Price'];

    $Product_SQL = "INSERT INTO minute_inventory(minute_inventory_name,minute_inventory_category,minute_inventory_quantity,minute_inventory_price) 
                    VALUES ('$Product_Name','$Product_Category','$Product_Quantity','$Product_Price')";
    $PRODUCT_RESULT = mysqli_query($connect,$Product_SQL);
}

?>                        

                    <!--ADD PRODUCT end-->


    <div class="table-responsive">
        <table class="table table-bordered table-condensed table-hover">
              <thead>
                    <tr>
                        <th>Product ID #</th>
                        <th>Product Name</th>
                        <th>Product Supplier</th>
                        <th>Product Category</th>
                        <th>Product Quantity</th>
                        <th>Product Price</th>
                        <th>Product Update</th>
                  </tr>
               </thead>

               <tbody>
                      
<?php 

$MINUTE_PRODUCT = "SELECT * FROM minute_inventory ORDER BY minute_inventory_id";
$MINUTE_PRODUCT_RESULT = mysqli_query($connect,$MINUTE_PRODUCT);

if (mysqli_num_rows($MINUTE_PRODUCT_RESULT) >=0) {

        while ($MINUTE_PRODUCT_ROW = mysqli_fetch_assoc($MINUTE_PRODUCT_RESULT)) {
                $MINUTE_PRODUCT_ID = $MINUTE_PRODUCT_ROW['minute_inventory_id'];
                $MINUTE_PRODUCT_NAME = $MINUTE_PRODUCT_ROW['minute_inventory_name'];
                $MINUTE_PRODUCT_SUPPLIER = $MINUTE_PRODUCT_ROW['minute_inventory_supplier'];
                $MINUTE_PRODUCT_CATEGORY = $MINUTE_PRODUCT_ROW['minute_inventory_category'];
                $MINUTE_PRODUCT_QUANTITY = $MINUTE_PRODUCT_ROW['minute_inventory_quantity'];
                $MINUTE_PRODUCT_PRICE = $MINUTE_PRODUCT_ROW['minute_inventory_price'];

                if ($MINUTE_PRODUCT_QUANTITY >=50) {
                      $color = 'success';
                }
                else if ($MINUTE_PRODUCT_QUANTITY >=20 and $MINUTE_PRODUCT_QUANTITY <=49) {
                       $color = 'warning';
                }
                else if ($MINUTE_PRODUCT_QUANTITY <=19) {
                       $color = 'danger';
                }

                ?>
                  <tr>
                    <td class="<?=$color?>"><?=$MINUTE_PRODUCT_ID?></td>
                    <td class="<?=$color?>"><?=$MINUTE_PRODUCT_NAME?></td>
                    <td class="<?=$color?>"><?=$MINUTE_PRODUCT_SUPPLIER?></td>
                    <td class="<?=$color?>"><?=$MINUTE_PRODUCT_CATEGORY?></td> 
                    <td class="<?=$color?>"><?=$MINUTE_PRODUCT_QUANTITY?></td>
                    <td class="<?=$color?>">&#8369;<?=$MINUTE_PRODUCT_PRICE?></td>
                    <td>
                        <button class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span></button>
                        <button class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span></button>
                        <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                    </td>
                   
                
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


</body>
</html>