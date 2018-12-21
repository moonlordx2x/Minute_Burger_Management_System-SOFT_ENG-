<?php include '../function/in-session.php';
      require '../connect/connect.php'; 
if (isset($_GET['minute_supplier_id'])) {
    $minute_supplier_id = $_GET['minute_supplier_id'];
}
else{
    if (isset($_GET['update_hidden'])) {
      $update_hidden = $_GET['update_hidden'];
      $minute_supplier_id = $update_hidden;
    }
}


if (isset($_GET['status'])) {
    $status = $_GET['status'];
}
else{
    $status = '0';
}


if (isset($_GET['filter'])) {
    $filter = $_GET['filter'];
}
else{
  $filter = '';
}


$supplier_sql = "SELECT * FROM minute_supplier where minute_supplier_id = '$minute_supplier_id' ";
  $supplier_result = mysqli_query($connect,$supplier_sql);

  if (mysqli_num_rows($supplier_result) >=0) {
      while ($supplier_row = mysqli_fetch_assoc($supplier_result)) {
             $minute_supplier_id= $supplier_row['minute_supplier_id'];
             $minute_supplier_name = $supplier_row['minute_supplier_name'];
             $minute_supplier_number = $supplier_row['minute_supplier_number'];
             $minute_supplier_company = $supplier_row['minute_supplier_company'];
             $minute_supplier_address = $supplier_row['minute_supplier_address'];

      }
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
      a{
        text-decoration: none;
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
      <a class="navbar-brand" href="#">Logo</a>
  </div>

  <div class="collapse navbar-collapse" id="myNavbar">

    <ul class="nav navbar-nav">
        <li class="active"><a href="#"><span class="fa fa-th-list"></span> &nbspSupplies</a></li>
        <li><a href="supplier_add_product.php?minute_supplier_id=<?=$minute_supplier_id?>"><span class="fa fa-plus"></span> &nbsp Add Supplies</a></li>
        <li><a href="#info" data-toggle="modal" data-target="#info"><span class="fa fa-group"></span> &nbsp Supplier Info</a></li>
        <li><a href="view_supplier.php"><span class="glyphicon glyphicon-circle-arrow-left"></span> &nbspReturn</a></li>
    </ul>
  </div>

</div>

</nav>

   <!-- Navbar END-->


  <!--  Main Content-->

<div class="container-fluid display-table">
  
<div class="row display-table-row">
  
  <div class="col-md-2 display-table-cell valign hidden-xs" id="sidebar">
    <h1>Navigation</h1>
    <ul>

   <li id="active"><a href="#"><span class="fa fa-th-list"></span> &nbsp View Supplies</a></li>
   <li><a href="supplier_add_product.php?minute_supplier_id=<?=$minute_supplier_id?>"><span class="fa fa-plus"></span> &nbsp Add Supplies</a></li>
   <li><a href="#info" data-toggle="modal" data-target="#info"><span class="fa fa-group"></span>&nbsp Supplier Info</a></li>
   <li><a href="view_supplier.php"><span class="glyphicon glyphicon-circle-arrow-left"></span> &nbspReturn</a></li>

    </ul>

<div class="modal fade" id="info" role="dialog">
  
  <div class="modal-dialog modal-sm">
      
      <div class="modal-content">
        
        <form class="form">
          
          <div class="modal-header" style="background-color: #006699">
              <h2 class="text-center"><span style="color: white" class="fa fa-user"></span> <b style="color: white">Suppliers info</b></h2>
          </div>

          <div class="modal-body">
            
            <div class="form-group">
              <label class="control-label">Suppliers ID</label>
              <input type="text" value="<?=$minute_supplier_id?>" disabled class="form-control">
            </div>

            <div class="form-group">
              <label class="control-label">Suppliers Name</label>
              <input type="text" value="<?=$minute_supplier_name?>" disabled class="form-control">
            </div>

            <div class="form-group">
              <label class="control-label">Suppliers Number</label>
              <input type="text" value="<?=$minute_supplier_number?>" disabled class="form-control">
            </div>

            <div class="form-group">
              <label class="control-label">Suppliers Company</label>
              <input type="text" value="<?=$minute_supplier_company?>" disabled class="form-control">
            </div>

            <div class="form-group">
              <label class="control-label">Suppliers Address</label>
              <input type="text" value="<?=$minute_supplier_address?>" disabled class="form-control">
            </div>


          </div>

          <div class="modal-footer">
            <button class="btn btn-default fa fa-times" data-dismiss="modal"></button>
          </div>

        </form>


      </div>

  </div>

</div>


<!--SIDE BAR END-->

<!--MAIN CONTENT-->

</div>

  <div class="col-md-10 display-table-cell valign">   
         <div class="well col-md-12 col-lg-12 col-xs-5 col-sm-12">
                    <h2 class="text-center"><b class="label label-primary">Supplier Management</b></h2>
        
                 <form class="form-inline" method="POST" action="redirect.php">
                    
    <div class="input-group">
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
              <input type="hidden" name="minute_supplier_id" value="<?=$minute_supplier_id?>">
              <button class="btn btn-primary fa fa-search-plus" type="submit" name="filer_submit_2"></button>
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

                 </form>     <br>

            <div class="table-responsive">
              <table class="table table-condensed table-bordered table-hover table-striped" style="background-color: white">
                  <thead>
                      <th class='text-center'><b class="label label-info">Product ID </b></th>
                      <th class='text-center'><b class="label label-info">Product Name</b></th>
                      <th class='text-center'><b class="label label-info">Product Supplier</b></th>
                      <th class='text-center'><b class="label label-info">Product Category</b></th>
                      <th class='text-center'><b class="label label-info">Product Price</b></th>
                      <th class='text-center'><b class="label label-info">Action</b></th>
                  </thead>

                  <tbody id="table">
<?php
$query = '';
if ($filter == '') {
    $query = "SELECT * FROM minute_supplier_product where supply_product_supplier ='$minute_supplier_company' ORDER BY supply_product_id";
}
else{
    $query = "SELECT * FROM minute_supplier_product where supply_product_supplier ='$minute_supplier_company' 
              and supply_product__category='$filter'";
}  
$result = mysqli_query($connect,$query);
if (mysqli_num_rows($result)) {
  while ($row = mysqli_fetch_assoc($result)) {
      $id_row      = $row['supply_product_id'];
      $id_name     = $row['supply_product_name'];
      $id_supplier = $row['supply_product_supplier'];
      $id_category = $row['supply_product__category'];
      $id_price    = $row['supply_product_price'];
      $select = $id_category;
      
  echo "<tr class='warning'>";

  echo "<td><b>".$row['supply_product_id']."</b></td>";
  echo "<td><b>".$row['supply_product_name']."</b></td>";
  echo "<td><b>".$row['supply_product_supplier']."</b></td>";
  echo "<td><b>".$row['supply_product__category']."</b></td>";
  echo "<td><b>  &#8369; ".$row['supply_product_price']."</b></td>";
  ?>
      <td class="text-center">
        <a href="#update<?=$id_row?>" data-target="#update<?=$id_row?>" data-toggle="modal">
            <button class="btn btn-primary">
            <span class="fa fa-edit"></span></button>
        </a>

        <a href="#remove<?=$id_row?>" data-target="#remove<?=$id_row?>" data-toggle="modal">
            <button class="btn btn-danger">
            <span class="fa fa-times"></span></button>
        </a>
      </td>


      <div class="modal fade" id="update<?=$id_row?>" role="dialog">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
        <form class="form-inline" method="POST" action="../process/update_record.php">
              <div class="modal-header">
                <h4><span class="fa fa-pencil"></span> Product Update <b class="label label-primary"><?=$id_row?></b>
                <input type="hidden" name="filter" value="<?=$filter?>">
              </h4>
            </div>

      <div class="modal-body">
              <div class="form-group">
                    <label class="control-label" for="name">Product Name</label>
                    <input type="text" name="update_name" value="<?=$id_name?>" class="form-control" id="name">
                    <input type="hidden" name="update_name_2" value="<?=$id_name?>">
              </div>

              <div class="form-group">
                  <label class="control-label" for="name">Product Supplier</label>
                  <input type="text" value="<?=$id_supplier?>" class="form-control" id="name" disabled>
                  <input type="hidden" name="update_supplier" value="<?=$id_supplier?>">
              </div>

              <div class="form-group">
                  <label class="control-label">Product Category </label>
                  
                  <select class="form-control" name="update_category"> 
      <?php
     
                  if ($select=="BUNS") {echo "<option  selected value='BUNS'><center>BUNS</center></option>";}
                  elseif ($select!="BUNS"){echo "<option value='BUNS'><center>BUNS</center></option>";}

                  if ($select=="CUPS") {echo "<option selected value='CUPS'><center>CUPS</center></option>";}
                  elseif ($select!="CUPS"){echo "<option value='CUPS'><center>CUPS</center></option>";}

                  if ($select=="DRESSING") {echo "<option selected value='DRESSING'><center>DRESSING</center></option>";}
                    elseif ($select!="DRESSING"){echo "<option value='DRESSING'><center>DRESSING</center></option>";}

                  if ($select=="DRINKS") {echo "<option selected value='DRINKS'><center>DRINKS</center></option>";}
                  elseif ($select!="DRINKS"){echo "<option value='DRINKS'><center>DRINKS</center></option>";}

                    if ($select=="HOTDOG") {echo "<option selected value='HOTDOG'><center>HOTDOG</center></option>";}
                    elseif ($select!="HOTDOG"){echo "<option value='HOTDOG'><center>HOTDOG</center></option>";}

                    if ($select=="PATTY") {echo "<option selected value='PATTY'><center>PATTY</center></option>";}
                    elseif ($select!="PATTY"){echo "<option value='PATTY'><center>PATTY</center></option>";}

                    if ($select=="VEGETABLE") {echo "<option selected value='VEGETABLE'><center>VEGETABLE</center></option>";}
                    elseif ($select!="VEGETABLE"){echo "<option value='VEGETABLE'><center>VEGETABLE</center></option>";}

                    if ($select=="OTHER") {echo "<option selected value='OTHER'><center>OTHER</center></option>";}
                    elseif ($select!="OTHER"){echo "<option value='OTHER'><center>OTHER</center></option>";}  
      ?>
               </select>
           </div>

        <div class="form-group">
                    <label class="control-label" for="name">Product Price</label>
                    <input type="number" name="update_price" value="<?=$id_price?>" class="form-control" id="name">
                    <input type="hidden" name="update_hidden" value="<?=$minute_supplier_id?>" class="form-control" id="name">
                    <input type="hidden" name="update_id" value="<?=$id_row?>" class="form-control" id="name">
        </div>
  
      </div>
             <div class="modal-footer">
                  <button class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>
                  <input type="submit" name="submit" value="Save Changes" class="btn btn-primary">

             </div>
      </form>
    </div>
  </div>
</div>


      <div class="modal fade" id="remove<?=$id_row?>" role="dialog">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <form class="form" method="POST" action="../process/remove_record.php">
                    <div class="modal-header"><h4><span class="fa fa-times"></span> Product Remove <b class="label label-danger"><?=$id_row?></b></div>

            <div class="modal-body">
              <div class="form-group">
                    <label class="control-label" for="name">Product Name</label>
                    <input type="text" name="" value="<?=$id_name?>" class="form-control" id="name" disabled>
              </div>

              <div class="form-group">
                  <label class="control-label" for="name">Product Supplier</label>
                  <input type="text" name="" value="<?=$id_supplier?>" class="form-control" id="name" disabled>
              </div>

              <div class="form-group">
                  <label class="control-label">Product Category </label>
                  <select class="form-control" name="" disabled> 
      <?php
     
                  if ($select=="BUNS") {echo "<option  selected value='BUNS'><center>BUNS</center></option>";}
                  elseif ($select!="BUNS"){echo "<option value='BUNS'><center>BUNS</center></option>";}

                  if ($select=="CUPS") {echo "<option selected value='CUPS'><center>CUPS</center></option>";}
                  elseif ($select!="CUPS"){echo "<option value='CUPS'><center>CUPS</center></option>";}

                  if ($select=="DRESSING") {echo "<option value='DRESSING'><center>DRESSING</center></option>";}
                    elseif ($select!="DRESSING"){echo "<option value='DRESSING'><center>DRESSING</center></option>";}

                  if ($select=="DRINKS") {echo "<option selected value='DRINKS'><center>DRINKS</center></option>";}
                  elseif ($select!="DRINKS"){echo "<option value='DRINKS'><center>DRINKS</center></option>";}

                    if ($select=="HOTDOG") {echo "<option selected value='HOTDOG'><center>HOTDOG</center></option>";}
                    elseif ($select!="HOTDOG"){echo "<option value='HOTDOG'><center>HOTDOG</center></option>";}

                    if ($select=="PATTY") {echo "<option selected value='PATTY'><center>PATTY</center></option>";}
                    elseif ($select!="PATTY"){echo "<option value='PATTY'><center>PATTY</center></option>";}

                    if ($select=="VEGETABLE") {echo "<option selected value='VEGETABLE'><center>VEGETABLE</center></option>";}
                    elseif ($select!="VEGETABLE"){echo "<option value='VEGETABLE'><center>VEGETABLE</center></option>";}

                    if ($select=="OTHER") {echo "<option selected value='OTHER'><center>OTHER</center></option>";}
                    elseif ($select!="OTHER"){echo "<option value='OTHER'><center>OTHER</center></option>";}  
      ?>
               </select>
           </div>

        <div class="form-group">
                    <label class="control-label" for="name">Product Price</label>
                    <input type="number" name="update_price" value="<?=$id_price?>" class="form-control" disabled>
                    <input type="hidden" name="remove_id" value="<?=$minute_supplier_id?>" class="form-control">
        </div>
                    </div>

                    <div class="modal-footer">
                      <input type="hidden" name="id" value="<?=$id_row?>">
                      <button class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-danger" name="remove"> Remove </button>
                    </div>
                </form>
            </div>
          </div>
      </div>
    <?php
    echo "</tr>";
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

<!-- UPDATE-->
 <div class="modal fade" id="success" role="dialog">
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

 <div class="modal fade" id="error" role="dialog">
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

<!-- UPDATE END-->


<!-- REMOVE-->

 <div class="modal fade" id="remove_success" role="dialog">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header" style="background-color: #006E51">
              <h2 class="text-center" style="color: white;"><span class="fa fa-check"></span> Success <span class="fa fa-exclamation"></span></h2>
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

<div class="modal fade" id="error_remove" role="dialog">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
          <div class="modal-header" style="background-color: #BC243C">
              <h2 class="text-center"><span style="color: white" class="fa fa-times"></span> <b style="color: white">Error Occur</b></h2>
          </div>
            <div class="modal-body">
                  <h4 class="text-center"><span class="fa fa-exclamation-triangle" style="color: #BC243C"></span>
                  <i style="text-decoration: underline;">Delete Product Data</i></h4>
              </div>
            <div class="modal-footer" style="background-color: #e3e3e4">
                  <button class="btn btn-default" data-dismiss="modal"><span class="fa fa-times" style="color: #BC243C"></span></button>
              </div>
        </div>
      </div>
</div>

<!-- REMOVE END-->

<script type="text/javascript">
$(document).ready(function(){

  var status = '<?=$status?>';
  if (status == '1') {
    $('#success').modal('show');
  }
  else if(status == '2') {
    $('#error').modal('show');
  }
  else if(status == '3') {
    $('#remove_success').modal('show');
  }
  else if(status == '4') {
    $('#error_remove').modal('show');
  }

});

</script>

</body>
</html>