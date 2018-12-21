<?php include '../function/in-session.php'; ?>
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
                <li class="active"><a href="#">Dashboard</a></li>
                <li><a href="#">Age</a></li>
                <li><a href="#">Gender</a></li>
                <li><a href="#">Geo</a></li>
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
                                  <li><a href="add_product.php">ADD Product</a></li>      
                                  <li><a href="#" id="hover">ADD New Supplier</a></li>                                 
                              </ul>
                                  </li>
                            <li><a href="#">Menu 2</a></li>
                            <li><a href="#">Menu 3</a></li>
              </ul><br>
            </div>
            <br>
          
          </div>
        </div>



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

    <!-- LOGOUT  -->

<!--
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
<!--
    <div class="container-fluid">
          <div class="side-bar" style=" margin-top: 0;">
                <ul class="nav nav-pills nav-stacked">
                      <li><a href="../main_directory/home.php"><span class="glyphicon glyphicon-home"></span> &nbspDASHBOARD</a></li>
                            <li class="dropdown">
                              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="hover"><span class="glyphicon glyphicon-shopping-cart"></span> &nbspInventory <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                  <li><a href="view_product.php">View Product</a></li>
                                  <li><a href="view_supplier.php">View Supplier</a></li>
                                  <li><a href="add_product.php">ADD Product</a></li>      
                                  <li><a href="#" id="hover">ADD New Supplier</a></li>                        
                              </ul>
                          </li>
                        <li><a href="#">Menu 2</a></li>
                      <li><a href="#">Menu 3</a></li>
                </ul>
          </div>
    </div>
-->
</body>
</html>