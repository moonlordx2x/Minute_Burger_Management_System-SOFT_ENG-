<?php
include '../function/in-session.php'; 
require '../connect/connect.php';
date_default_timezone_set("Asia/Manila");
$time = '';
$time3 = date("h:i:sA");
$total_result1 = '';
$week = '';

$weeks = '';
$month  = '';

if (isset($_GET['date'])) {
   $month = $_GET['date'];
}
else{
   $month  = date("M");
}

$mon = date("M");
$filter = '';
if (isset($_GET['filter'])){
  $filter = $_GET['filter'];
}

if ($filter == '') {
  $sql = "SELECT * FROM graph_result_month where month_name= '$month' order by id";
}
else{
  $sql = "SELECT * FROM graph_result_month where category = '$filter' and month_name= '$month' order by id";
}


$result = mysqli_query($connect,$sql);
$chart = '';
$name = '';
if (mysqli_num_rows($result) >=1) {
  while ($row = mysqli_fetch_assoc($result)){
     $id_1 = $row['id'];
     $name_1 = $row['name'];
     $total_1 = $row['total'];
     $total_cost_1 = $row['total_cost'];

     $array = array('$id_1','$name_1','$total_1','$total_cost_1');
      
    $chart .= "{ id:".$row['id'].", category:".$row['total'].", cost:".$row['total_cost']."},"; 
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

<script>
$(document).ready(function(){
    $("#hide").click(function(){
        $("p").hide();
    });
    $("#show").click(function(){
        $("p").show();
    });
});
</script>

  <!--  Navbar-->
<nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Minute Burger Management System</a>
        </div>

        <ul class="nav navbar-nav hidden-xs">
            <li><a href="../main_directory/home.php"><span class="fa fa-dashboard"></span> &nbspDASHBOARD</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-list-alt"></span> &nbsp INVENTORY <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="../inventory/view_product.php"><span class="fa fa-th-list"></span> &nbsp View Product</a></li>
                  <li><a href="../inventory/view_supplier.php"><span class="fa fa-group"></span> &nbsp View Supplier</a></li>     
                  <li><a href="../inventory/view_stock.php"><span class="fa fa-th-list"></span> &nbsp View Stock</a></li>              
                </ul>
            </li> 
             <li><a href="../casheir/casheir.php"><span class="fa fa-shopping-cart"></span> &nbsp CASHIER</a></a></li>
              <li class="dropdown active">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-bar-chart-o"></span> &nbsp SALES REPORT <span class="caret"></span></a>
                <ul class="dropdown-menu">
                 <li><a href="../sales_report/daily.php"><span class="fa fa-bar-chart-o"></span> &nbsp DAILY SALES REPORT</a>
                  <li><a href="../sales_report/weekly.php"><span class="fa fa-bar-chart-o"></span> &nbsp WEEKLY SALES REPORT</a>
                  <li class="active"><a href=""><span class="fa fa-bar-chart-o"></span> &nbsp MONTHLY SALES REPORT</a>
                </ul>
            </li> 
    
         
        </ul>

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
                <li><a href="../main_directory/home.php"><span class="fa fa-dashboard"></span> &nbspDASHBOARD</a></li>
                  <li class="dropdown">
                          <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="hover"><span class="fa fa-list-alt">      
                          </span> &nbspInventory <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                  <li><a href="view_product.php"><span class="fa fa-th-list"></span> &nbsp View Product</a></li>
                                  <li><a href="view_supplier.php"><span class="fa fa-group"></span> &nbsp View Supplier</a></li>
                                  <li><a href="../inventory/view_stock.php"><span class="fa fa-th-list"></span> &nbsp View Stock</a></li>                                   
                              </ul>
                                  </li>
                            <li><a href="../casheir/casheir.php"><span class="fa fa-shopping-cart"></span> &nbsp CASHIER</a></a></li>
                              <li id="active"><a class="dropdown-toggle" data-toggle="collapse" data-target="#demo1"><span class="fa fa-bar-chart-o"></span> &nbsp SALES REPORT <span class="caret"></span></a></li>
                              <div class="collapse collapseable" id="demo1">
                                   <ul id="links">
                                    <li id="active"><a href="../sales_report/daily.php"><span class="fa fa-bar-chart-o"></span> &nbsp DAILY SALES REPORT</a></li>                              
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
 <!-- 
  <div class="col-md-2 display-table-cell valign hidden-xs" id="sidebar">
    <h1>Navigation</h1>
    <ul>

    <li class="active"><a href="../main_directory/home.php"><span class="fa fa-dashboard"></span> &nbspDASHBOARD</a></li>
    <li><a class="dropdown-toggle" data-toggle="collapse" data-target="#demo"><span class="fa fa-list-alt"></span> &nbspInventory <span class="caret"></span></a></li>
    <div class="collapse collapseable" id="demo">
         <ul id="links">
            <li><a href="../inventory/view_product.php"><span class="fa fa-th-list"></span> &nbsp View Product</a></li>
            <li><a href="../inventory/view_supplier.php"><span class="fa fa-group"></span> &nbsp View Supplier</a></li>     
            <li><a href="../inventory/view_stock.php"><span class="fa fa-th-list"></span> &nbsp View Stock</a></li>                                 
        </ul>
    </div>
      <li><a href="../casheir/casheir.php"><span class="fa fa-shopping-cart"></span> &nbsp CASHIER</a></a></li>
    <li id="active"><a class="dropdown-toggle" data-toggle="collapse" data-target="#demo2"><span class="fa fa-bar-chart-o"></span> &nbsp SALES REPORT <span class="caret"></span></a></li>
    <div class="collapse collapseable" id="demo2">
         <ul id="links">
            <li id="active"><a href="#"><span class="fa fa-bar-chart-o"></span> &nbsp DAILY SALES REPORT</a></li>                              
        </ul>
    </div>

    </ul>
  </div> -->

  <div class="col-md-12 col-lg-12 col-xs-10 col-sm-10 display-table-cell valign">
    <div class="well col-xs-6 col-md-12 col-lg-12 col-sm-12">
      <h2 class="text-center"><span class="label label-primary fa fa-bar-chart-o"> <b>MONTHLY SALES REPORT</b></span></h2><br>

    

  <div id="chart"></div>




      <div class="col-md-9">
      
      <div class="panel panel-primary">

        <div class="panel-heading">
            <h4 class="text-left"><span class="fa fa-tags"></span> Product Item Sold</h4>
        </div>

        <div class="panel-body">
          
          <div class="table-responsive" id="cool">
            <table class="table table-bordered table-striped table-hovered table-condensed">
              <thead>
                <tr>
                  <th class="text-center"><b class="label label-default">Product ID</b></th>
                  <th class="text-center"><b class="label label-default">Product Name</b></th>
                  <th class="text-center"><b class="label label-default">Product Category</b></th>
                  <th class="text-center"><b class="label label-default">Product Price</b></th>
                  <th class="text-center"><b class="label label-default">Total Item</b></th>
                  <th class="text-center"><b class="label label-default">Total Cost</b></th>
                  <th class="text-center"><b class="label label-default">DATE</b></th>
                  <th class="text-center"><b class="label label-default">TIME</b></th>
                </tr>
            </thead>

                <tbody>
            
<?php 

    if ($filter == '') {
      $sql = "SELECT * FROM minute_sales_report where month_name = '$month' order by time_1 desc";
    }
    else{

      $sql = "SELECT * FROM minute_sales_report where category = '$filter' and  month_name = '$month' order by time_1 desc";
    }
      $result = mysqli_query($connect,$sql);
      if (mysqli_num_rows($result)) {
          while ($row = mysqli_fetch_assoc($result)) {
            $total_result = $row['total_cost'];
            $total_result1 +=$total_result;
  ?>
        <tr>
          
            <td><?=$row['id']?></td>
            <td><?=$row['name']?></td>
            <td><?=$row['category']?></td>
            <td>&#8369; <?=$row['price']?></td>
            <td><?=$row['total']?></td>
            <td>&#8369; <?=$row['total_cost']?></td>
            <td><?=$row['date_1']?></td>
            <td><?=$row['time_1']?></td>


        </tr>

  <?php          

          }
      }
    

 ?>

    </tbody>



          </table>
        </div>

        </div>

        <div class="panel-footer">
           <h2 class="text-right"><span class="label label-primary"> Total Net Income: &#8369; <?=$total_result1?></span></h2>
        </div>


      </div>

    </div>
   <div class="col-md-3">
      
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h4 class="text-left"><span class="fa fa-gear"></span> SETTING</h4>
        </div>

        <form class="form" action="month.php" method="POST">

        <div class="panel-body">
          
        
          <label class="text-left">Month Picker :</label><br>
          <select class="form-control" name="month_1">
            

<?php
if ($month == 'Jan') {echo "<option selected value='Jan'><center>January</center></option>";}else{echo "<option value='Jan'><center>January</center></option>";}
if ($month == 'Feb') {echo "<option selected value='Feb'><center>February</center></option>";}else{echo "<option value='Feb'><center>February</center></option>";}
if ($month == 'Mar') {echo "<option selected value='Mar'><center>March</center></option>";}else{echo "<option value='Mar'><center>March</center></option>";}

if ($month == 'Apr') {echo "<option selected value='Apr'><center>April</center></option>";}else{echo "<option value='Apr'><center>April</center></option>";}
if ($month == 'May') {echo "<option selected value='May'><center>May</center></option>";}else{echo "<option value='May'><center>May</center></option>";}
if ($month == 'Jun') {echo "<option selected value='Jun'><center>June</center></option>";}else{echo "<option value='Jun'><center>June</center></option>";}

if ($month == 'Jul') {echo "<option selected value='Jul'><center>July</center></option>";}else{echo "<option value='Jul'><center>July</center></option>";}
if ($month == 'Aug') {echo "<option selected value='Aug'><center>August</center></option>";}else{echo "<option value='Aug'><center>August</center></option>";}
if ($month == 'Sep') {echo "<option selected value='Sep'><center>September</center></option>";}else{echo "<option value='Sep'><center>September</center></option>";}

if ($month == 'Oct') {echo "<option selected value='Oct'><center>October</center></option>";}else{echo "<option value='Oct'><center>October</center></option>";}
if ($month == 'Nov') {echo "<option selected value='Nov'><center>November</center></option>";}else{echo "<option value='Nov'><center>November</center></option>";}
if ($month == 'Dec') {echo "<option selected value='Dec'><center>December</center></option>";}else{echo "<option value='Dec'><center>December</center></option>";}
?>
            
        </select>
          <br>
            
          <label class="text-left">CATEGORY :</label><br>

              <select class="form-control" name="filter_1">
            
            <option></option>
             <option value="BURGER"><center>BURGER</center></option>
             <option value="HOTDOG"><center>HOTDOG</center></option>
             <option value="DRINKS"><center>DRINKS</center></option>
             <option value="OTHER"><center>OTHER</center></option>
        </select><br>

        </div>

        <div class="panel-footer">
          
          <button type="submit" name="setting" class="btn btn-primary btn-block">PROCEED</button>
        </div>
          
          </form>

      </div>

    </div>


    </div>

  </div>

</div>

</div>

  <!--  Main Content END-->


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

</body>
</html>