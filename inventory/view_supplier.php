<?php include '../function/in-session.php';
require '../connect/connect.php';
if (isset($_GET['page'])) {
  $page = $_GET['page'];
}
else{
  $page = '';
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
                                  <li><a href="../inventory/view_stock.php"><span class="fa fa-plus"></span> &nbsp View Stock</a></li>                                    
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
    <li id="active"><a data-toggle="collapse" data-parent="#accordion" href="#demo"><span class="fa fa-list-alt"></span> &nbspInventory <span class="caret"></span></a></li>
    <div class="collapse in" id="demo"">
          <ul id="links">
            <li><a href="../inventory/view_product.php"><span class="fa fa-shopping-cart"></span> &nbspView Product</a></li>
            <li id="active"><a href="../inventory/view_supplier.php"><span class="fa fa-group"></span>&nbsp View Supplier</a></li>
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


                  <h1 class="text-center"><span class="label label-primary fa fa-group"> Supplier Management</span></h1>

          <h4><span class="label label-primary">Available Supplier</span> 
  <button class="btn btn-info pull-right" data-target="#minute_add" data-toggle="modal"><span class="fa fa-user-plus"></span> ADD Supplier</button>
                </h4><br>

      
                       <div class="modal fade" role="dialog" id="minute_add">
                          <div class="modal-dialog modal-sm">
                            <div class="modal-content">
      <form class="form" method="POST" autocomplete="off" action="../process/add_supplier.php">
          
          <div class="modal-header"><h4><span class="fa fa-user-plus"></span> ADD New Supplier</h4></div>

          <div class="modal-body">
            
            <div class="form-group">
                <label class="control-label">Supplier Name</label>
                <input type="text" name="supplier_name" placeholder="Supplier Name" required class="form-control">
            </div>

            <div class="form-group">
                <label class="control-label">Supplier Number</label>
                <input type="number" name="supplier_number" placeholder="Supplier Number" required class="form-control">
            </div>

            <div class="form-group">
                <label class="control-label">Supplier Company</label>
                <input type="text" name="supplier_company" placeholder="Supplier Company" required class="form-control">
            </div>

            <div class="form-group">
                <label class="control-label">Supplier Address</label>
                <input type="text" name="supplier_address" placeholder="Supplier Address" required class="form-control">
            </div>

          </div>

          <div class="modal-footer">
                  <button type="button" class="btn btn-default fa fa-times" data-dismiss="modal"></button>
                  <input type="submit" name="submit" class="btn btn-success" value="Add Supplier">
          </div>


      </form>

                            </div>
                          </div>
                       </div> 
                
                  <div class="table-responsive">
                  <table class="table table-condensed table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                              <th class='text-center'><span class="label label-default">Minute Supplier ID</span></th>
                              <th class='text-center'><span class="label label-default">Minute Supplier Name</span></th>
                              <th class='text-center'><span class="label label-default">Minute Supplier Number</span></th>
                              <th class='text-center'><span class="label label-default">Minute Supplier Company</span></th>
                              <th class='text-center'><span class="label label-default">Minute Supplier Address</span></th>
                              <th class='text-center'><span class="label label-success">UPDATE</span></th>
                              <th class='text-center'><span class="label label-danger">REMOVE</span></th>
                              <th class='text-center'><span class="label label-warning">Supplies</span></th>
                            </tr>
                        </thead> 

                          <tbody>
                            <?php

                            $table_content = "SELECT * from minute_supplier group by minute_supplier_id order by minute_supplier_id";
                            $table_result = mysqli_query($connect,$table_content);
                            if (mysqli_num_rows($table_result) >=0) {
                              while ($row=mysqli_fetch_assoc($table_result)){
                                $id = $row['minute_supplier_id'];
                                $name = $row['minute_supplier_name'];
                                $num = $row['minute_supplier_number'];
                                $company = $row['minute_supplier_company'];
                                $address = $row['minute_supplier_address'];
                                echo "<tr>";
                                echo "<td class='text-center'>".$row['minute_supplier_id']."</td>";
                                echo "<td class='text-center'>".$row['minute_supplier_name']."</td>";
                                echo "<td class='text-center'>".$row['minute_supplier_number']."</td>";
                                echo "<td class='text-center'>".$row['minute_supplier_company']."</td>";
                                echo "<td class='text-center'>".$row['minute_supplier_address']."</td>";
                                echo "<td class='text-center'>
                                <a href='#update$id' data-target='#update$id' data-toggle='modal'><button class='btn btn-success'><span class='fa fa-edit'></span></button></a>
                                </td>";
                                echo "<td class='text-center'>
                                <a href='#remove$id' data-target='#remove$id' data-toggle='modal'><button class='btn btn-danger'><span class='fa fa-times'></span></button></a>

                                </td>";
                                echo "<td class='text-center'><a href='supplier_view_product.php?minute_supplier_id=$id'><button class='btn btn-warning'><span class='glyphicon glyphicon-list-alt'></span></button></a></td>";
                                echo "</tr>";
?>
                       
                 
                  <div class='modal fade' role='dialog' id='update<?=$id;?>'>
                    <div class='modal-dialog modal-sm'>
                      <div class='modal-content'>
                        <form class="form" method="POST" action="../process/update_supplier.php" autocomplete="off">
                          <div class='modal-header'>
                              <h4><span class="fa fa-edit"></span> Update Supplier <label class="label label-success"><?=$id;?></label></h4>
                          </div>

                          <div class="modal-body">

                            <div class="form-group">
                              <label class="control-label">Supplier Name </label>
                              <input type="text" name="update_name" placeholder="Supplier Name" value="<?=$name;?>" required class="form-control">
                            </div>

                            <div class="form-group">
                              <label class="control-label">Supplier Number </label>
                              <input type="number" name="update_num" placeholder="Supplier Name" value="<?=$num;?>" required class="form-control">
                            </div>

                             <div class="form-group">
                              <label class="control-label">Supplier Company </label>
                              <input type="text" name="update_company" placeholder="Supplier Company" value="<?=$company;?>" required class="form-control">
                              <input type="hidden" name="update_company_2" value="<?=$company;?>">
                            </div>

                             <div class="form-group">
                              <label class="control-label">Supplier Address </label>
                              <input type="text" name="update_address" placeholder="Supplier Address" value="<?=$address;?>" required class="form-control">
                            </div>

                          </div>

                          <div class="modal-footer">
                              <input type="hidden" name="update_id" value="<?=$id;?>">
                              <button type="button" class="btn btn-default fa fa-times" data-dismiss="modal"></button>
                              <input type="submit" name="update_record" class="btn btn-success" value="Update Record">

                          </div>

                        </form>
                      </div>
                    </div>
                  </div>

                  <div class='modal fade' role='dialog' id='remove<?=$id;?>'>
                    <div class='modal-dialog modal-sm'>
                      <div class='modal-content'>
                        <form class="form" method="POST" action="../process/remove_supplier.php" autocomplete="off">
                          <div class='modal-header'>
                              <h4><span class="fa fa-times"></span> Remove Supplier <label class="label label-danger"><?=$id;?></label></h4>
                          </div>

                          <div class="modal-body">

                            <div class="form-group">
                              <label class="control-label">Supplier Name </label>
                              <input type="text"  placeholder="Supplier Name" value="<?=$name;?>" class="form-control" disabled>
                            </div>

                            <div class="form-group">
                              <label class="control-label">Supplier Number </label>
                              <input type="text"  placeholder="Supplier Name" value="<?=$num;?>" class="form-control" disabled>
                            </div>

                             <div class="form-group">
                              <label class="control-label">Supplier Company </label>
                              <input type="text" value="<?=$company;?>" disabled class="form-control">
                              <input type="hidden" name="remove_company_2" value="<?=$company;?>">
                            </div>

                             <div class="form-group">
                              <label class="control-label">Supplier Address </label>
                              <input type="text" value="<?=$address;?>" disabled class="form-control">
                            </div>

                          </div>

                          <div class="modal-footer">
                              <input type="hidden" name="remove_id" value="<?=$id;?>">
                              <button type="button" class="btn btn-default fa fa-times" data-dismiss="modal"></button>
                              <input type="submit" name="remove_record" class="btn btn-danger" value="Remove Record">
                          </div>

                        </form>
                      </div>
                    </div>
                  </div>
  
        
                  <div class='modal fade' role='dialog' id='remove<?=$id;?>'>
                    <div class='modal-dialog modal-sm'>
                      <div class='modal-content'>
                          <div class='modal-header'>
                              <h4>Remove <?=$id;?></h4>
                          </div>
                          

                          <div class="modal-footer">
                              <center>
                                <form action="" method="POST">
                                        <input type="hidden" name="remove_id" value="<?=$id;?>">
                                        <input type="submit" name="delete_record" class="btn btn-danger" value="Remove">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </form>    
                              </center>

<?php 
if (isset($_POST['delete_record'])) {
  $remove_id = $_POST['remove_id'];
  $remove_record = "DELETE FROM minute_supplier where minute_supplier_id = $remove_id";
  $remove_record_query = mysqli_query($connect,$remove_record);
  if ($remove_record_query){
        echo "<script>";
  echo "window.location = 'view_supplier.php'";
  echo "</script>";
  }
}
?>


                          </div>
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

<!--ADD SUPPLIER-->

 <div class="modal fade" id="success" role="dialog">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
              <div class="modal-header" style="background-color: #006E51">
              <h2 class="text-center" style="color: white"><span class="fa fa-check"></span> Success <span class="fa fa-exclamation"></span></h2>
          </div>
          <div class="modal-body">
                  <h4 class="text-center"><span class="fa fa-info-circle" style="color: #006E51"></span>
                  <i style="text-decoration: underline;">New Added Supplier</i></h4>
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
                  <i style="text-decoration: underline;">Supplier Already Exist</i></h4>
              </div>
            <div class="modal-footer" style="background-color: #e3e3e4">
                  <button class="btn btn-default" data-dismiss="modal"><span class="fa fa-times" style="color: #BC243C"></span></button>
              </div>
        </div>
      </div>
</div>


<!--ADD SUPPLIER END-->


<!--Update SUPPLIER-->

 <div class="modal fade" id="update_success" role="dialog">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
              <div class="modal-header" style="background-color: #006E51">
              <h2 class="text-center" style="color: white"><span class="fa fa-check"></span> Success <span class="fa fa-exclamation"></span></h2>
          </div>
          <div class="modal-body">
                  <h4 class="text-center"><span class="fa fa-info-circle" style="color: #006E51"></span>
                  <i style="text-decoration: underline;">Supplier has been updated</i></h4>
              </div>
          <div class="modal-footer" style="background-color: #e3e3e4">
                  <button class="btn btn-default fa fa-times" data-dismiss="modal"></button>
              </div>
        </div>
      </div>
</div>


<!--Update SUPPLIER END-->


<!--Remove SUPPLIER-->

 <div class="modal fade" id="remove_success" role="dialog">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
              <div class="modal-header" style="background-color: #006E51">
              <h2 class="text-center" style="color: white"><span class="fa fa-check"></span> Success <span class="fa fa-exclamation"></span></h2>
          </div>
          <div class="modal-body">
                  <h4 class="text-center"><span class="fa fa-info-circle" style="color: #006E51"></span>
                  <i style="text-decoration: underline;">Supplier has been removed</i></h4>
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
                  <i style="text-decoration: underline;">While Deleting Supplier</i></h4>
              </div>
            <div class="modal-footer" style="background-color: #e3e3e4">
                  <button class="btn btn-default" data-dismiss="modal"><span class="fa fa-times" style="color: #BC243C"></span></button>
              </div>
        </div>
      </div>
</div>


<!--Remove SUPPLIER END-->

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
        $('#update_success').modal('show');
      }
      else if (page == '4') {
        $('#remove_success').modal('show');
      }
      else if (page == '5') {
        $('#remove_failed').modal('show');
      }
      

  });
</script>

</body>
</html>