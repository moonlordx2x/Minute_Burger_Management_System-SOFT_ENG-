<!--
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
                <li><a href="../main_directory/home.php"><span class="glyphicon glyphicon-home"></span> &nbspDASHBOARD</a></li>
                      <li class="dropdown active">
                          <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="hover"><span class="glyphicon glyphicon-shopping-cart"></span> &nbspInventory <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                  <li><a href="view_product.php">View Product</a></li>
                                  <li class="active"><a href="view_supplier.php">View Supplier</a></li>
                                  <li><a href="add_product.php">ADD Product</a></li>      
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
                                  <li class="active"><a href="view_supplier.php">View Supplier</a></li>
                                  <li><a href="add_product.php">ADD Product</a></li>      
                                  <li><a href="#" id="hover">ADD New Supplier</a></li>                                 
                              </ul>
                                  </li>
                            <li><a href="#">Menu 2</a></li>
                            <li><a href="#">Menu 3</a></li>
              </ul><br>
            </div>
            <br>

            <div class="col-md-10">

              <div class="well">

                <h4><span class="label label-primary">Available Supplier</span> 
  <button class="btn btn-info" data-target="#minute_add" data-toggle="modal" id="button"><span class="glyphicon glyphicon-plus"></span> ADD Supplier</button>
                </h4><br>

      

                       <div class="modal fade" role="dialog" id="minute_add">
                          <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                        <h4>ADD New Supplier</h4>
                                </div>
                                <div class="modal-body">
                                      <form class="form-horizontal" method="POST" autocomplete="off">
                                        <div class="form-group">
                                              <label class="col-sm-3 control-label">Supplier Name :</label>
                                              <div class="col-sm-8"><input type="text" name="supplier_name" placeholder="Supplier Name" required class="form-control"></div>
                                        </div>
                                        <div class="form-group">
                                              <label class="col-sm-3 control-label">Supplier Company :</label>
                                              <div class="col-sm-8"><input type="text" name="supplier_company" placeholder="Supplier Company" required class="form-control"></div>
                                        </div>
                                        <div class="form-group">
                                              <label class="col-sm-3 control-label">Supplier Address :</label>
                                              <div class="col-sm-8"><input type="text" name="supplier_address" placeholder="Supplier Address" required class="form-control"></div>
                                        </div>
                                              <center><input type="submit" name="submit" class="btn btn-success" value="Add Product">
                                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button></center>
                                      </form>
                               </div>
                            </div>
                          </div>
                       </div> 

<?php 
      require '../connect/connect.php';
        ob_start();
            if (isset($_POST['submit'])) {
                $supplier_name = $_POST['supplier_name'];
                $supplier_company = $_POST['supplier_company'];
                $supplier_address = $_POST['supplier_address'];

                $add_supplier = "INSERT INTO minute_supplier(minute_supplier_name,minute_supplier_company,minute_supplier_address) values ('$supplier_name','$supplier_company','$supplier_address')";
                $add_supplier_result = mysqli_query($connect,$add_supplier);

                if (!$add_supplier_result) {echo "Error";}

                else{
                        header("location:redirect.php");
                        ob_clean();
                    }
                  }
?>

                
                  <div class="table-responsive">
                  <table class="table table-condensed table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                              <th class='text-center'><span class="label label-default">Minute Supplier ID</span></th>
                              <th class='text-center'><span class="label label-default">Minute Supplier Name</span></th>
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
                                $company = $row['minute_supplier_company'];
                                $address = $row['minute_supplier_address'];
                                echo "<tr>";
                                echo "<td class='text-center'>".$row['minute_supplier_id']."</td>";
                                echo "<td class='text-center'>".$row['minute_supplier_name']."</td>";
                                echo "<td class='text-center'>".$row['minute_supplier_company']."</td>";
                                echo "<td class='text-center'>".$row['minute_supplier_address']."</td>";
                                echo "<td class='text-center'>
                                <a href='#update$id' data-target='#update$id' data-toggle='modal'><button class='btn btn-success'><span class='glyphicon glyphicon-pencil'></span></button></a>
                                </td>";
                                echo "<td class='text-center'>
                                <a href='#remove$id' data-target='#remove$id' data-toggle='modal'><button class='btn btn-danger'><span class='glyphicon glyphicon-remove'></span></button></a>

                                </td>";
                                echo "<td class='text-center'><a href='supplier_supplies.php?minute_supplier_id=$id'><button class='btn btn-warning'><span class='glyphicon glyphicon-list-alt'></span></button></a></td>";
                                echo "</tr>";
?>
                       
                 
                  <div class='modal fade' role='dialog' id='update<?=$id;?>'>
                    <div class='modal-dialog'>
                      <div class='modal-content'>
                          <div class='modal-header'>
                              <h4>Update Record ID: <?=$id;?></h4>
                          </div>
                          <div class="modal-body">
                              <form class="form-horizontal" method="POST" autocomplete="off">
                                        <div class="form-group">
                                              <label class="col-sm-4 control-label">Supplier Name :</label>
                                              <div class="col-sm-7"><input type="text" name="update_name" placeholder="Supplier Name" value="<?=$name;?>" required class="form-control"></div>
                                        </div><br>
                                        <div class="form-group">
                                              <label class="col-sm-4 control-label">Supplier Company :</label>
                                              <div class="col-sm-7"><input type="text" name="update_company" placeholder="Supplier Company" value="<?=$company;?>" required class="form-control"></div>
                                        </div>
                                        <div class="form-group">
                                              <label class="col-sm-4 control-label">Supplier Address :</label>
                                              <div class="col-sm-7"><input type="text" name="update_address" placeholder="Supplier Address" value="<?=$address;?>" required class="form-control"></div>
                                        </div>  
                                  <center>
                                    <input type="hidden" name="update_id" value="<?=$id;?>">
                                    <input type="submit" name="update_record" class="btn btn-success" value="Update Record">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                  </center>
                              </form>
                          </div>
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

if (isset($_POST['update_record'])) {
  $update_id = $_POST['update_id'];
  $update_name = $_POST['update_name'];
  $update_company = $_POST['update_company'];
  $update_address = $_POST['update_address'];

  $update_record = "UPDATE minute_supplier SET minute_supplier_name = '$update_name', minute_supplier_company = '$update_company',minute_supplier_address='$update_address' where minute_supplier_id = '$update_id'";
  $update_record_query = mysqli_query($connect,$update_record);
  if ($update_record_query){
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
-->