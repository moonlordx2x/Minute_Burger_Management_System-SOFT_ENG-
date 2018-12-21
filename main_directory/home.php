<?php
include '../function/in-session.php'; 
require '../connect/connect.php';

date_default_timezone_set("Asia/Manila");
$time = date("Y-m-d");

$month = date("Y-m");
$mon = date("M");

$week = date('Y-m-d',strtotime('monday this week'));

$weeks = date('Y-m-d',strtotime('sunday this week'));

$select = "SELECT * FROM graph_result where date_1 = '$time'";
$select_result = mysqli_query($connect,$select);
if (mysqli_num_rows($select_result) >=1) {

}
else{

$select_1 = "SELECT * FROM minute_product";
$select_result_1 = mysqli_query($connect,$select_1);
if (mysqli_num_rows($select_result_1) >=1) {
  
    while ($row = mysqli_fetch_assoc($select_result_1)){
          $id = $row['product_id'];
          $name = $row['product_name'];
          $category = $row['product_category'];
          $price = $row['product_price'];


          $insert = "INSERT INTO graph_result(id,name,category,price_1,total,total_cost,date_1,time_1)
                    values ('$id','$name','$category','$price','0','0','$time','0')";
          $insert_result = mysqli_query($connect,$insert);

    }
}


}

$select_v1 = "SELECT * FROM graph_result_week where week_1 = '$week' and week_2 = '$weeks'";
$select_result_v1 = mysqli_query($connect,$select_v1);
if (mysqli_num_rows($select_result_v1) >=1) {

}
else{

$select_2 = "SELECT * FROM minute_product";
$select_result_2 = mysqli_query($connect,$select_2);
if (mysqli_num_rows($select_result_2) >=1) {
    while ($row_1 = mysqli_fetch_assoc($select_result_2)){
          $id1 = $row_1['product_id'];
          $name1 = $row_1['product_name'];
          $category1 = $row_1['product_category'];
          $price1 = $row_1['product_price'];


          $insert1 = "INSERT INTO graph_result_week(id,name,category,price_1,total,total_cost,week_1,week_2)
                      values ('$id1','$name1','$category1','$price1','0','0','$week','$weeks')";
          $insert_result1 = mysqli_query($connect,$insert1);

    }
}
else{
}

}


$select_v2 = "SELECT * FROM graph_result_month where month = '$month'";
$select_result_v2 = mysqli_query($connect,$select_v2);
if (mysqli_num_rows($select_result_v2) >=1) {

}
else{

$select_3 = "SELECT * FROM minute_product";
$select_result_3 = mysqli_query($connect,$select_3);
if (mysqli_num_rows($select_result_3) >=1) {
    while ($row_3 = mysqli_fetch_assoc($select_result_3)){
          $id3 = $row_3['product_id'];
          $name3 = $row_3['product_name'];
          $category3 = $row_3['product_category'];
          $price3 = $row_3['product_price'];


          $insert3 = "INSERT INTO graph_result_month(id,name,category,price_1,total,total_cost,month,month_name)
                      values ('$id3','$name3','$category3','$price3','0','0','$month','$mon')";
          $insert_result3 = mysqli_query($connect,$insert3);
    }
}

}

$sql = "SELECT * FROM graph_result where total !='0' and date_1 = '$time' order by id";
$result = mysqli_query($connect,$sql);
$chart = '';
$name = '';
if (mysqli_num_rows($result) >=1) {
  while ($row = mysqli_fetch_assoc($result)){
     
     
      $chart .= "{ id:".$row['id'].", category:".$row['total'].", cost:".$row['total_cost']."},"; 
}
}

$sql_1 = "SELECT * FROM graph_result_week where week_1 = '$week' and week_2 = '$weeks' order by id";
$result_1 = mysqli_query($connect,$sql);
$chart_1 = '';
$name_1 = '';
if (mysqli_num_rows($result_1) >=1) {
  while ($row = mysqli_fetch_assoc($result_1)){
     $id_1 = $row['id'];
     $name_1 = $row['name'];
     $total_1 = $row['total'];
     $total_cost_1 = $row['total_cost'];

     $array = array('$id_1','$name_1','$total_1','$total_cost_1');
      
    $chart_1 .= "{ id:".$row['id'].", category:".$row['total'].", cost:".$row['total_cost']."},"; 
}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Minute Burger Management System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../bootstrap/js/morris.js-0.5.1/morris.css">
  <script type="text/javascript" src="../bootstrap/js/jquery.min.js.js"></script>
  <script type="text/javascript" src="../bootstrap/js/raphael-master/raphael.min.js"></script>
  <script type="text/javascript" src="../bootstrap/js/morris.js-0.5.1/morris.min.js"></script>
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
  <!--  Navbar-->
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
                <li class="active"><a href="home.php"><span class="fa fa-dashboard"></span> &nbspDASHBOARD</a></li>
                  <li class="dropdown">
                          <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="hover"><span class="fa fa-list-alt">      
                          </span> &nbsp INVENTORY <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                  <li><a href="view_product.php"><span class="fa fa-th-list"></span> &nbsp View Product</a></li>
                                  <li><a href="view_supplier.php"><span class="fa fa-group"></span> &nbsp View Supplier</a></li>
                                  <li><a href="../inventory/view_stock.php"><span class="fa fa-th-list"></span> &nbsp View Stock</a></li>                                   
                              </ul>
                                  </li>
                            <li><a href="../casheir/casheir.php"><span class="fa fa-shopping-cart"></span> &nbsp CASHIER</a></a></li>
    <li><a class="dropdown-toggle" data-toggle="collapse" data-target="#demo1"><span class="fa fa-bar-chart-o"></span> &nbsp SALES REPORT <span class="caret"></span></a></li>
    <div class="collapse collapseable" id="demo1">
         <ul id="links">
            <li id="active"><a href="../sales_report/daily.php"><span class="fa fa-bar-chart-o"></span> &nbspDAILY SALES REPORT</a></li> 
            <li><a href="../sales_report/weekly.php"><span class="fa fa-bar-chart-o"></span> &nbsp WEEKLY SALES REPORT</a>                      
        </ul>
    </div> 
              </ul>
            </div>
          </div>
        </nav>  

 <!--  Navbar END-->


  <!--  Main Content-->

<div class="container-fluid display-table">
  
<div class="row display-table-row">
  
  <div class="col-md-2  display-table-cell valign hidden-xs" id="sidebar">
    
    <ul>

    <li id="active"><a href="home.php"><span class="fa fa-dashboard"></span> &nbsp DASHBOARD</a></li>
    <li><a class="dropdown-toggle" data-toggle="collapse" data-target="#demo"><span class="fa fa-list-alt"></span> &nbsp INVENTORY <span class="caret"></span></a></li>
    <div class="collapse collapseable" id="demo">
         <ul id="links">
            <li><a href="../inventory/view_product.php"><span class="fa fa-th-list"></span> &nbsp View Product</a></li>
            <li><a href="../inventory/view_supplier.php"><span class="fa fa-group"></span> &nbsp View Supplier</a></li>     
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

  <div class="col-md-10 col-lg-10 col-xs-10 col-sm-10 display-table-cell valign">
    
    <div class="well col-xs-6 col-md-12 col-lg-12 col-sm-12">
          <h4><span class="fa fa-dashboard"></span> Dashboard Menu</h4><br>
    
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-4">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h4><span class="fa fa-tags"></span> View Product 
              <a href="#demo_panel" data-toggle="collapse" class="pull-right" style="color: white"><span class="fa fa-chevron-circle-down"></span></a></h4>
            </div>

            <div class="panel-body collapse" id="demo_panel">
              
              <div class="table-responsive">
                <table class="table table-hovered table-bordered">
                  <thead>
                    <tr>
                      <th>Product ID</th>
                      <th>Product Name</th>
                    </tr>
                  </thead>

                  <tbody>
<?php  

          $sql = "SELECT * FROM minute_product order by product_id limit 5";
          $result = mysqli_query($connect,$sql);
          if (mysqli_num_rows($result)) {
              while ($row = mysqli_fetch_assoc($result)) {
          
                echo "<tr>";
                echo "<td>".$row['product_id']."</td>";
                echo "<td>".$row['product_name']."</td>";
                echo "</tr>";

              }
          }



?>
                  </tbody>

                </table>
              </div>

            </div>

            <div class="panel-footer">
               <h5> <a href="../inventory/view_product.php">View More Product <b class="pull-right"><span class="fa fa-chevron-circle-right"></span></b></a></h5>
            </div>

          </div>
        </div>

        <div class="col-md-4">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h4><span class="fa fa-group"></span> View Supplier
              <a href="#demo_panel_1" data-toggle="collapse" class="pull-right" style="color: white"><span class="fa fa-chevron-circle-down"></span></a></h4>
            </div>

            <div class="panel-body collapse" id="demo_panel_1">
              
              <div class="table-responsive">
                <table class="table table-hovered table-bordered">
                  <thead>
                    <tr>
                      <th>Supplier ID</th>
                      <th>Supplier Name</th>
                    </tr>
                  </thead>

                  <tbody>
<?php  

          $sql = "SELECT * FROM minute_supplier order by minute_supplier_id limit 5";
          $result = mysqli_query($connect,$sql);
          if (mysqli_num_rows($result)) {
              while ($row = mysqli_fetch_assoc($result)) {
          
                echo "<tr>";
                echo "<td>".$row['minute_supplier_id']."</td>";
                echo "<td>".$row['minute_supplier_name']."</td>";
                echo "</tr>";

              }
          }



?>
                  </tbody>

                </table>
              </div>

            </div>

            <div class="panel-footer">
        <h5> <a href="../inventory/view_supplier.php">View More Supplier <b class="pull-right"><span class="fa fa-chevron-circle-right"></span></b></a></h5>
            </div>

          </div>
        </div>

        <div class="col-md-4">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h4><span class="fa fa-th-list"></span> View Stock
              <a href="#demo_panel_2" data-toggle="collapse" class="pull-right" style="color: white"><span class="fa fa-chevron-circle-down"></span></a></h4>
            </div>

             <div class="panel-body collapse" id="demo_panel_2">

              <div class="table-responsive">
                <table class="table table-hovered table-bordered">
                  <thead>
                    <tr>
                      <th>Product ID</th>
                      <th>Product Name</th>
                    </tr>
                  </thead>

                  <tbody>
<?php  

          $sql = "SELECT * FROM minute_stock order by stock_id limit 5";
          $result = mysqli_query($connect,$sql);
          if (mysqli_num_rows($result)) {
              while ($row = mysqli_fetch_assoc($result)) {
          
                echo "<tr>";
                echo "<td>".$row['stock_id']."</td>";
                echo "<td>".$row['stock_name']."</td>";
                echo "</tr>";

              }
          }



?>

                  </tbody>

                </table>
              </div>

            </div>

            <div class="panel-footer">
        <h5> <a href="../inventory/view_stock.php">View More Stock <b class="pull-right"><span class="fa fa-chevron-circle-right"></span></b></a></h5>
            </div>

          </div>
        </div>

        <div class="col-md-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h4><span class="fa fa-bar-chart-o"></span> Sales Report Bar Graph (DAILY)</h4>
            </div>

            <div class="panel-body">
              
              <div id="chart"></div>

            </div>
                <div class="panel-footer">
        <h5> <a href="../sales_report/daily.php">View More Sales Report Bar Graph (DAILY) <b class="pull-right"><span class="fa fa-chevron-circle-right"></span></b></a></h5>
            </div>

          </div>
        </div>

         <div class="col-md-6">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h4><span class="fa fa-bar-chart-o"></span> Sales Report Bar Graph (WEEKLY)</h4>
            </div>


            <div class="panel-footer">
        <h5> <a href="../sales_report/weekly.php">View More Sales Report Bar Graph (WEEKLY) <b class="pull-right"><span class="fa fa-chevron-circle-right"></span></b></a></h5>
            </div>

          </div>
        </div>


         <div class="col-md-6">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h4><span class="fa fa-bar-chart-o"></span> Sales Report Bar Graph (MONTHLY)</h4>
            </div>


            <div class="panel-footer">
        <h5> <a href="../sales_report/monthly.php">View More Sales Report Bar Graph (MONTHLY) <b class="pull-right"><span class="fa fa-chevron-circle-right"></span></b></a></h5>
            </div>

          </div>
        </div>
    

     

      </div>
    </div>

    </div>

  </div>

</div>

</div>


  <script type="text/javascript">
  Morris.Bar({
    element : 'chart',
    data : [<?php echo $chart; ?>],
    xkey : 'id',
    ykeys : ['category','cost'],
    labels : ['Total Sold Item','Total Net Income'],
    hideHover : 'auto',
    parseTime: false
  });  



</script>

  <!--  Main Content END-->

</body>
</html>