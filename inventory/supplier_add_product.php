<?php include '../function/in-session.php';
      require '../connect/connect.php';
ob_start();

if (isset($_GET['minute_supplier_id'])) {
    $minute_supplier_id = $_GET['minute_supplier_id'];
}
else{
    if (isset($_GET['update_hidden'])) {
      $update_hidden = $_GET['update_hidden'];
      $minute_supplier_id = $update_hidden;
    }
}


if (isset($_GET['added'])) {
    $added = $_GET['added'];
}
else{
    $added = '0';
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
	<meta name="viewport" content="width=device-width, initial-scale=1">
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

<!-- SIDE BAR-->

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

              <?php

$inventory_check = "SELECT * FROM supplier_product where item_supplier = '$minute_supplier_company'";
$inventory_result = mysqli_query($connect,$inventory_check);
if (mysqli_num_rows($inventory_result) >=1) {
?>

<li><a href="#inventory"  data-toggle="modal" data-target="#inventory"><span class="fa fa-th-list"></span> &nbsp View Supplies</a></li>
<li id="active"><a href="#"><span class="fa fa-plus"></span> &nbsp Add Supplies</a></li>
<li><a href="#info" data-toggle="modal" data-target="#info"><span class="fa fa-group"></span>&nbsp Supplier Info</a></li>
<li><a href="#inventory_1" data-toggle="modal" data-target="#inventory_1"><span class="glyphicon glyphicon-circle-arrow-left"></span> &nbspReturn</a></li>


<?php 
}

else{
?>

<li><a href="supplier_view_product.php?minute_supplier_id=<?=$minute_supplier_id?>"><span class="fa fa-th-list"></span> &nbsp View Supplies</a></li>
<li id="active"><a href="#"><span class="fa fa-plus"></span> &nbsp Add Supplies</a></li>
<li><a href="#info" data-toggle="modal" data-target="#info"><span class="fa fa-group"></span>&nbsp Supplier Info</a></li>
<li><a href="view_supplier.php"><span class="glyphicon glyphicon-circle-arrow-left"></span> &nbspReturn</a></li>

<?php
}

?>
              
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

<?php

$inventory_check = "SELECT * FROM supplier_product where item_supplier = '$minute_supplier_company'";
$inventory_result = mysqli_query($connect,$inventory_check);
if (mysqli_num_rows($inventory_result) >=1) {
?>

<li><a href="#inventory"  data-toggle="modal" data-target="#inventory"><span class="fa fa-th-list"></span> &nbsp View Supplies</a></li>
<li id="active"><a href="#"><span class="fa fa-plus"></span> &nbsp Add Supplies</a></li>
<li><a href="#info" data-toggle="modal" data-target="#info"><span class="fa fa-group"></span>&nbsp Supplier Info</a></li>
<li><a href="#inventory_1" data-toggle="modal" data-target="#inventory_1"><span class="glyphicon glyphicon-circle-arrow-left"></span> &nbspReturn</a></li>

<?php 
}

else{
?>

<li><a href="supplier_view_product.php?minute_supplier_id=<?=$minute_supplier_id?>"><span class="fa fa-th-list"></span> &nbsp View Supplies</a></li>
<li id="active"><a href="#"><span class="fa fa-plus"></span> &nbsp Add Supplies</a></li>
<li><a href="#info" data-toggle="modal" data-target="#info"><span class="fa fa-group"></span>&nbsp Supplier Info</a></li>
<li><a href="view_supplier.php"><span class="glyphicon glyphicon-circle-arrow-left"></span> &nbspReturn</a></li>

<?php
}

?>
    </ul>
  </div>

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


<!-- SIDE BAR END --->

<!-- MAIN CONTENT-->



  <div class="col-md-10 col-xs-12 col-sm-12 display-table-cell valign">   
    <div class="well col-md-12 col-lg-12 col-xs-7 col-sm-12">
            <h2 class="text-center"><b class="label label-primary">Supplier Management</b></h2>

                             <br><br>

            <div class="row content">
              <div class="col-md-4">
        

  <form class="form" method="POST" autocomplete="off" action="../process/add_record.php">
      <div class="panel panel-warning">
          <div class="panel-heading">
              <h4 class="text-center"><span class="fa fa-info-circle"></span> Supplies Detail</h4>
          </div>

    <div class="panel-body">
                
      <div class="form-group">
        <label class="control-label" for="name">Supplies Name</label>
        <input type="text" name="Supplier_Name" placeholder="Product Name" 
        required class="form-control">
      </div>

      <div class="form-group">
            <label class="control-label">Supplies Category </label>
              <select class="form-control" name="Supplier_Category" required>               
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
      </div>

      <div class="form-group">
          <label class="control-label" for="name">Supplies Price</label>
          <input type="number" name="Supplier_Price" id="Supplier_Price" 
          placeholder="Product Price" required class="form-control">
      </div>       

    </div>
          

            <div class="panel-footer">
                <center>
                <input type="hidden" name="hiddenz" value="<?=$minute_supplier_id?>">
                <input type="hidden" name="company" value="<?=$minute_supplier_company?>">  
                <button type="submit" name="Supplier_submit" class="btn btn-success">
                  <span class="fa fa-plus"></span> Add to list              
                </button>
    
              </center>
            </div>
        </div> 
    </form>
</div>

    <div class="col-md-8 col-lg-8 col-xs-12 col-sm-12">

      <div class="panel panel-warning">
          <div class="panel-heading">
            <h4 class="text-center"><span class="fa fa-plus-square"></span> Supplies to be Added</h4>
          </div>

          <div class="panel-body">
            
            <div class="table-responsive">
              <table class="table table-condensed table-bordered table-hover table-striped">
                <thead>
                  <tr>
                    <th>Supplies ID</th>
                    <th>Supplies Name</th>
                    <th>Supplies Supplier</th>
                    <th>Supplies Category</th>
                    <th>Supplies Price</th>
                    <th class="text-center">Edit</th>
                    <th class="text-center">Remove</th>
                  </tr>
                </thead>

                <tbody>
 <?php 

    $added_sql = "SELECT * FROM supplier_product where item_supplier='$minute_supplier_company'";
    $added_result = mysqli_query($connect,$added_sql);
      if (mysqli_num_rows($added_result) >=1) {
              while ($row = mysqli_fetch_assoc($added_result)) {

                $id = $row['id'];
                $select = $row['item_category'];

                echo "<tr>";
                  echo "<td>".$row['id']."</td>";
                  echo "<td>".$row['item_name']."</td>";
                  echo "<td>".$row['item_supplier']."</td>";
                  echo "<td>".$row['item_category']."</td>";
                  echo "<td> &#8369; ".$row['item_price']."</td>";
                  echo "<td class='text-center'>
                             <button class='btn btn-primary' data-toggle='modal' data-target='#update$id'><span class='fa fa-edit'></span></button>
                             
                       </td>";
                  echo "<td class='text-center'>
                        <button class='btn btn-danger'  data-toggle='modal' data-target='#remove$id'><span class='fa fa-times'></span></button>
                  </td>";

?>

  <div class="modal fade" id="update<?=$id?>" role="dialog">
    
    <div class="modal-dialog modal-sm">
      
      <div class="modal-content">

        <form class="form" method="POST" action="../process/update_record_supplies.php">

        <div class="modal-header">
            <h4><span class="fa fa-pencil"></span> Supplies Update <b class="label label-primary"><?=$id?></b>
        </div>

        <div class="modal-body">
          
          <div class="form-group">
              <label class="control-label">Supplies Name</label>
              <input type="text" name="update_supplies_name" class="form-control" required value="<?=$row['item_name']?>">
          </div>

           <div class="form-group">
              <label class="control-label">Supplies Supplier</label>
              <input type="text" name="" class="form-control" required value="<?=$row['item_supplier']?>" disabled>
              <input type="hidden" name="update_supplies_supplier" value="<?=$row['item_supplier']?>">
          </div>

          <div class="form-group">
              <label class="control-label">Supplies Category </label>
              <select class="form-control" name="update_supplies_category"> 
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
              <label class="control-label">Supplies Price</label>
              <input type="text" name="update_supplies_price" class="form-control" required value="<?=$row['item_price']?>">
              <input type="hidden" name="update_supplies_hidden" value="<?=$minute_supplier_id?>">
              <input type="hidden" name="update_supplies_id" value="<?=$id?>">
          </div>

        </div>

        <div class="modal-footer">
          
          <button class="btn btn-default fa fa-times" data-dismiss="modal"></button>
          <button type="submit" class="btn btn-primary" name="submit_supplies">Save Changes</button>

        </div>
        </form>

      </div>

    </div>

  </div>

  <div class="modal fade" id="remove<?=$id?>" role="dialog">
    
    <div class="modal-dialog modal-sm">
      
      <div class="modal-content">

        <form class="form" method="POST" action="../process/remove_record_supplies.php">

        <div class="modal-header">
            <h4><span class="fa fa-times"></span> Supplies Remove <b class="label label-danger"><?=$id?></b>
        </div>

        <div class="modal-body">
          
          <div class="form-group">
              <label class="control-label">Supplies Name</label>
              <input type="text" class="form-control" required value="<?=$row['item_name']?>" disabled>
          </div>

           <div class="form-group">
              <label class="control-label">Supplies Supplier</label>
              <input type="text" name="" class="form-control" required value="<?=$row['item_supplier']?>" disabled>
              <input type="hidden" name="update_supplies_supplier" value="<?=$row['item_supplier']?>" >
          </div>

          <div class="form-group">
              <label class="control-label">Supplies Category </label>
              <select class="form-control" disabled> 
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
              <label class="control-label">Supplies Price</label>
              <input type="text" class="form-control" required value="<?=$row['item_price']?>" disabled>
              <input type="hidden" name="remove_supplies_hidden" value="<?=$minute_supplier_id?>">
              <input type="hidden" name="remove_supplies_id" value="<?=$id?>">
          </div>

        </div>

        <div class="modal-footer">
          
          <button class="btn btn-default fa fa-times" data-dismiss="modal"></button>
          <button type="submit" class="btn btn-danger" name="submit_remove">Remove</button>

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
          <form class="form" method="POST" action="../process/submit_record_supplies.php">
        
  <?php 
  
    $added_product = "SELECT * FROM supplier_product where item_supplier='$minute_supplier_company'";
    $added_result = mysqli_query($connect,$added_product);
    if (mysqli_num_rows($added_result) >=1) {
       echo "<input type='hidden' name='add_product' value='$minute_supplier_id'>";
       echo "<button class='btn btn-primary pull-right' name='add_product_submit' type='submit'><span class='fa fa-plus-circle'></span> Add Product</button>";
    }

   ?>            
          </form>
   </div>

    </div>            
  </div>

</div>

</div>

<div class="modal fade" id="text-suc" role="dialog">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header" style="background-color: #006E51">
              <h2 class="text-center" style="color: white"><span class="fa fa-check"></span> Success <span class="fa fa-exclamation"></span></h2>
          </div>

              <div class="modal-footer" style="background-color: #e3e3e4">
                  <button class="btn btn-default fa fa-times" data-dismiss="modal"></button>
              </div>
        </div>
      </div>
</div>

<div class="modal fade" id="text-fail" role="dialog">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
              <div class="modal-header" style="background-color: #BC243C">
        <h2 class="text-center"><span style="color: white" class="fa fa-times"></span> <b style="color: white">Error Occur</b></h2>
              </div>

              <div class="modal-body">
                  <h4 class="text-center"><span class="fa fa-exclamation-triangle" style="color: #BC243C"></span>
                  <i style="text-decoration: underline;">Supplies Name Already Exist in the Supplier</i></h4>
              </div>

              <div class="modal-footer" style="background-color: #e3e3e4">
                  <button class="btn btn-default" data-dismiss="modal"><span class="fa fa-times" style="color: #BC243C"></span></button>
              </div>

        </div>
      </div>
</div>


<div class="modal fade" id="text-fail2" role="dialog">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
              <div class="modal-header" style="background-color: #BC243C">
        <h2 class="text-center"><span style="color: white" class="fa fa-times"></span> <b style="color: white">Error Occur</b></h2>
              </div>

              <div class="modal-body">
                  <h4 class="text-center"><span class="fa fa-exclamation-triangle" style="color: #BC243C"></span>
                  <i style="text-decoration: underline;">Supplies Name Already Exist in the list</i></h4>
              </div>

              <div class="modal-footer" style="background-color: #e3e3e4">
                  <button class="btn btn-default" data-dismiss="modal"><span class="fa fa-times" style="color: #BC243C"></span></button>
              </div>

        </div>
      </div>
</div>


<div class="modal fade" id="text-fail3" role="dialog">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
              <div class="modal-header" style="background-color: #BC243C">
        <h2 class="text-center"><span style="color: white" class="fa fa-times"></span> <b style="color: white">Error Occur</b></h2>
              </div>

              <div class="modal-body">
                  <h4 class="text-center"><span class="fa fa-exclamation-triangle" style="color: #BC243C"></span>
                  <i style="text-decoration: underline;">Deleting Supplies Entered</i></h4>
              </div>

              <div class="modal-footer" style="background-color: #e3e3e4">
                  <button class="btn btn-default" data-dismiss="modal"><span class="fa fa-times" style="color: #BC243C"></span></button>
              </div>

        </div>
      </div>
</div>


<script type="text/javascript">
$(document).ready(function(){

  var added = '<?=$added?>';
  if (added == '1') {
    $('#text-suc').modal('show');
  }
  else if(added == '2') {
    $('#text-fail').modal('show');
  }
  else if(added == '3') {
    $('#text-fail2').modal('show');
  }
   else if(added == '4') {
    $('#text-fail3').modal('show');
  }
});

</script>


<!--ALERT-->


<div class="modal fade" id="inventory_1" role="dialog">
  
  <div class="modal-dialog modal-sm">
    
    <div class="modal-content">
      
      <div class="modal-header" style="background-color: #BC243C">
        <h2 class="text-center"><span style="color: white" class="fa fa-times"></span> <b style="color: white">Error Occur</b></h2>
      </div>

       <div class="modal-body">
              <h4 class="text-center"><span class="fa fa-exclamation-triangle" style="color: #BC243C"></span>
              <i style="text-decoration: underline;">Unfinished Adding Product</i></h4>
      </div>

      <div class="modal-footer" style="background-color: #e3e3e4">
                  
          <form class="form" method="POST">
                  <button class="btn btn-danger" type="submit" name="delete_1">Cancel Supplies</button>
                  <button class="btn btn-default" data-dismiss="modal"><span class="fa fa-times" style="color: #BC243C"></span></button>
          </form>
      </div>

    </div>

  </div>

</div>


<div class="modal fade" id="inventory" role="dialog">
  
  <div class="modal-dialog modal-sm">
    
    <div class="modal-content">
      
      <div class="modal-header" style="background-color: #BC243C">
        <h2 class="text-center"><span style="color: white" class="fa fa-times"></span> <b style="color: white">Error Occur</b></h2>
      </div>

       <div class="modal-body">
              <h4 class="text-center"><span class="fa fa-exclamation-triangle" style="color: #BC243C"></span>
              <i style="text-decoration: underline;">Unfinished Adding Product</i></h4>
      </div>

      <div class="modal-footer" style="background-color: #e3e3e4">
                  
          <form class="form" method="POST">
                  <button class="btn btn-danger" type="submit" name="delete_2">Cancel Supplies</button>
                  <button class="btn btn-default" data-dismiss="modal"><span class="fa fa-times" style="color: #BC243C"></span></button>
                  
          </form>
      </div>

    </div>

  </div>

</div>

<?php 
if (isset($_POST['delete_1'])){
  $delete = "DELETE FROM supplier_product";
  $delete_result = mysqli_query($connect,$delete);
  if ($delete_result){
    header("location:view_supplier.php");
    ob_clean();
  }
  else{
    header("Location:redirect.php");
    ob_clean();
  }
}

if (isset($_POST['delete_2'])){
  $delete = "DELETE FROM supplier_product";
  $delete_result = mysqli_query($connect,$delete);
  if ($delete_result) {
    header("location:supplier_view_product.php?minute_supplier_id=$minute_supplier_id");
    ob_clean();
  }
  else{
    header("Location:redirect.php");
    ob_clean();
  }
}



?>


</body>
</html>