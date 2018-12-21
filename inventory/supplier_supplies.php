<?php 
include '../function/in-session.php'; 
require '../connect/connect.php';

if (isset($_GET['minute_supplier_id'])) {
    $minute_supplier_id = $_GET['minute_supplier_id'];
}

$supplier_sql = "SELECT * FROM minute_supplier where minute_supplier_id = '$minute_supplier_id' ";
  $supplier_result = mysqli_query($connect,$supplier_sql);

  if (mysqli_num_rows($supplier_result) >=0) {
      while ($supplier_row = mysqli_fetch_assoc($supplier_result)) {
             $minute_supplier_id= $supplier_row['minute_supplier_id'];
             $minute_supplier_name = $supplier_row['minute_supplier_name'];
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
  <link rel="stylesheet" type="text/css" href="../main_css/menu.css">

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
                <li class="active"><a href=""><span class="glyphicon glyphicon-list-alt"></span> &nbspSupplies</a></li>
                  <li><a href="view_supplier.php"><span class="glyphicon glyphicon-circle-arrow-left"></span> &nbspReturn</a></li>
              </ul>
            </div>
          </div>
        </nav>

        <div class="container-fluid">
          <div class="row content">


            <div class="col-sm-1 sidenav hidden-xs">
              <h2 class="center-text">Logo</h2>
              <ul class="nav nav-pills nav-stacked">
                  <li class="active"><a href=""><span class="glyphicon glyphicon-list-alt"></span> &nbspSupplies</a></li>
                  <li><a href="view_supplier.php"><span class="glyphicon glyphicon-circle-arrow-left"></span> &nbspReturn</a></li>
              </ul><br>
            </div><br>


<div class="col-sm-10">
    <div class="well">
        <h4 class="text-center"><span class="label label-primary">Supplier Product Management</span></h4>

          <ul class="nav nav-tabs">
      <li class="active"><a href="#add_product" data-toggle="tab"><b class="glyphicon glyphicon-plus"></b> ADD Product</a></li>
      <li><a href="#view_product" data-toggle="tab"><b class="glyphicon glyphicon-eye-open"></b> View Product</a></li>
      <li><a href="#supplier" data-toggle="tab"><b class="glyphicon glyphicon-info-sign"></b> Supplier Info</a></li>

          </ul>

<div class="tab-content">

  <div class="tab-pane fade in active" id="add_product">   <!-- ADD PRODUCT TAB-->
    <div class="row content">
      <br>
      <div class="col-sm-6">

        <div class="panel panel-primary" id="panel">
            <div class="panel-heading"><h5>Product Detail</h5></div>

            <div class="panel-body">
<script type="text/javascript">
  
  function add_new_product()
        {
          var Supplier_Name = document.getElementById('Supplier_Name').value;
          var Supplier_Category = document.getElementById('Supplier_Category').value;
          var Supplier_company = document.getElementById('Supplier_company').value;
          var Supplier_Price = document.getElementById('Supplier_Price').value;

          if (Supplier_Name && Supplier_Category && Supplier_company && Supplier_Price ) {
          $.ajax({
            type:"post",
            url: 'pass_insert.php',
            data:{
                name : Supplier_Name,
                category : Supplier_Category,
                company : Supplier_company,
                price : Supplier_Price
            },
            success : function(response)
            {
              document.getElementById("status").innerHTML = "<span class='alert alert-success'>Successfully Added</span>";;
            }
          });
        }
          return false;
        }
       add_new_product();
       setInterval(add_new_product,(1 * 1000));

</script>


               <form class="form-horizontal" method="POST" autocomplete="off" onsubmit="return add_new_product();">

                  <div class="form-group">
                      <label class="col-sm-4 control-label">Product Name :</label>
                      <div class="col-sm-7"><input type="text" id="Supplier_Name" name="Supplier_Name" placeholder="Product Name" required class="form-control"></div>
                  </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">Product Category :</label>
                        <div class="col-sm-7">
                              <select class="form-control" name="Supplier_Category" id="Supplier_Category" required>               
                                      <option></option>
                                      <option value="BUNS"><center>BUNS</center></option>
                                      <option value="CUPS"><center>CUPS</center></option>
                                      <option value="DRINKS"><center>DRINKS</center></option>
                                      <option value="HOTDOG"><center>HOTDOGS</center></option>
                                      <option value="PASTA"><center>PASTA</center></option>
                                      <option value="PATTY"><center>PATTY</center></option>
                                      <option value="VEGETABLES"><center>VEGETABLES</center></option>
                                      <option value="OTHER"><center>OTHER</center></option>
                              </select>
                        </div>
                </div>

              
                  
         <input type="hidden" name="Supplier_company" id="Supplier_company" value="<?=$minute_supplier_company?>">
              

                <div class="form-group">
                      <label class="col-sm-4 control-label">Product Price :</label>
                      <div class="col-sm-7"><input type="number" name="Supplier_Price" id="Supplier_Price" placeholder="Product Price" required class="form-control"></div>
                </div>

                  <center>
              
                  <input type="submit" name="Supplier_submit" class="btn btn-success" value="Add to list">

                  </center><br><br>

                  <p class="text-center" id="status"></p>


                </form>

            </div>

        </div>
      </div>
  

      <div class="col-sm-6">
        <div class="panel panel-primary" id="panel">
          <div class="panel-heading"><h5>Product to be Added</h5></div>
          <div class="panel-body" id="panel2">
                <div class="table-responsive">
                  <table class="table table-hover table-condensed table-bordered">
                    <thead>
                      <th class='text-center'>Product ID</th>
                      <th class='text-center'>Product Name</th>
                      <th class='text-center'>Product Category</th>
                      <th class='text-center'>Product Price</th>
                      <th class='text-center'>Action</th>
                    </thead>

                    <tbody id="tbody">

<script type="text/javascript">
                     // view data// 
      view_table();
       setInterval(view_table,(1 * 1000));

      function view_table(){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","pass_view.php?status=display",false);
        xmlhttp.send(null);
        document.getElementById("tbody").innerHTML=xmlhttp.responseText;
      }


      function delete1(id){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","pass_view.php?id="+id+"&status=delete",false);
        xmlhttp.send(null);
        view_table();
      }
   
               // view data  end // 
</script>

                    
                    </tbody>
                  </table>

                </div>
                 <form class="form-horizontal"  method="POST">
                   <input class="btn btn-primary pull-right" type="submit" name="add_inventory" value="Add to Inventory">
<?php 


      if (isset($_POST['add_inventory'])) {

        $supplier_product_sql = "SELECT * FROM supplier_product";
        $supplier_product_result = mysqli_query($connect,$supplier_product_sql);
        if (mysqli_num_rows($supplier_product_result) >=1) {
            while ($supplier_product_row = mysqli_fetch_assoc($supplier_product_result)) {
                $supplier_product_id =$supplier_product_row['id'];
                $supplier_product_name =$supplier_product_row['item_name'];
                $supplier_product_supplier =$supplier_product_row['item_supplier'];
                $supplier_product_category =$supplier_product_row['item_category'];
                $supplier_product_price =$supplier_product_row['item_price'];

        $add_inventory_sql = "INSERT INTO minute_supplier_product(supply_product_id,supply_product_name,supply_product_supplier,supply_product__category,supply_product_price)
                              values('$supplier_product_id','$supplier_product_name','$supplier_product_supplier','$supplier_product_category','$supplier_product_price')";
        $add_inventory_result = mysqli_query($connect,$add_inventory_sql);


        $delete_inventory_sql = "DELETE from supplier_product";
        $delete_inventory_result = mysqli_query($connect,$delete_inventory_sql);                    

            }
        }
      }


 ?>

                 </form>
          </div>
        </div>
      </div>
    </div>
</div>    <!-- ADD PRODUCT TAB END-->





<div class="tab-pane fade" id="view_product">
    <div class="table-responsive" id="pagination_data">
<script type="text/javascript">        
  $(document).ready(function(){

      database_data();
        function database_data(page)
        { 
                  $.ajax({
                      type:'post',
                      url:'pagination.php?company=<?=$minute_supplier_company?>',
                      data:{
                        page:page
                        },
                      success:function(data){
                          $('#pagination_data').html(data);
                      }
                  });
        }

        $(document).on('click','.pagination',function(){
            var page = $(this).attr("id");
            database_data(page);
        });
    
  });
</script>
    </div>
  
</div>


<div class="tab-pane fade" id="supplier"><br>
                      
<div class="panel panel-primary">
    <div class="panel-heading"><h4 class="text-center"><span class="glyphicon glyphicon-user"></span> Supplier Info</h4></div>
            <div class="panel-body">
                  <div class="table-responsive">
                      <table class="table table-bordered table-condensed">
                          <tbody>
      <tr>
        <td class="text-left"><b class="label label-primary">Supplier ID</b></td>
        <td class="text-left"><?=$minute_supplier_id?></td>
      </tr>

      <tr>
        <td class="text-left"><b class="label label-primary">Supplier Name</b></td>
        <td class="text-left"><?=$minute_supplier_name?></td>
      </tr>

      <tr>
        <td class="text-left"><b class="label label-primary">Supplier Company</b></td>
        <td class="text-left"><?=$minute_supplier_company?></td>
      </tr>

      <tr>
        <td class="text-left"><b class="label label-primary">Supplier Address</b></td>
        <td class="text-left"><?=$minute_supplier_address?></td>
      </tr>
          </tbody>
      </div>
    </div>
  </div>
</div>



</div>

                </div>
            </div>  

        </div>
    </div>

</body>
</html>