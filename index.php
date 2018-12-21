<?php @include 'function/out-session.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Minute Burger Management System</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap/js/jquery.min.js.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="main_css/style.css">
</head>
<body>
<div class="container-fluid">
	
	<div class="row">
		

		<div class="col-sm-7 part1">

			<h1><center><b><span class="fa fa-desktop"></span> Minute Burger Management System</b></center></h1><br><br>

			<center>
				<img src="logo.png" class="img-rounded" alt="Cinque Terre" width="304" height="236"> 
			</center>

			<center>
				<h3>"<em><b>Taste of World"</b></em></h3> 
			</center>
		</div>

		<div class="col-sm-3 part2">
			<center><h1><b style="color:white">Minute Login <span class="fa fa-arrow-circle-right"></span></b></h1></center>
				<br><br><br>

					<form method="post" class="form-horizontal" autocomplete="off">
						<div class="form-group">
							<label class="col-md-2 control-label"><span style="color:white" class="glyphicon glyphicon-user"></span></label>
					<div class="col-md-9">
						<input type="text" style="box-shadow: 0px 2px 7px 0px black" name="user" placeholder="Username" class="form-control" required></div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label"><span style="color:white" class="glyphicon glyphicon-lock"></span></label>
							<div class="col-md-9">
						<input type="password" style="box-shadow: 0px 2px 7px 0px black" name="pass" placeholder="Password" class="form-control" required></div>
								</div>

						<label class="text-center col-md-offset-5" style="color: white"><span>Login as:</span></label>
					<div class="form-group">
						<label class="col-md-2 control-label"><span style="color:white" class="glyphicon glyphicon-user"></span></label>
							<div class="col-md-9">
							<select class="form-control" name="select" required>
						
							<option></option>
							<option value="admin"><center>ADMIN</center></option>
							<option value="casheir"><center>CASHIER</center></option>

					</select></div>
								</div>
						
				

					<div class="form-group">
							<center>
				<button type="submit" name="login" class="btn btn-warning minute_submit">LOGIN  <span class="fa fa-arrow-circle-right"></span></button>
							</center>
						</div>

<?php 
		require 'connect/connect.php';
		@session_start();
		ob_start();
		if (isset($_POST['login'])) {
			$user = $_POST['user'];
			$pass = $_POST['pass'];
			$select = $_POST['select'];

			$sql = "SELECT * From minute_login where minute_user = '$user' and minute_password = '$pass' and minute_position = '$select'";
			$result = mysqli_query($connect,$sql);
			$row = mysqli_num_rows($result);
			if ($row==1){

				if ($select == 'admin') {
					header("Location:main_directory/home.php");
					$_SESSION['user'] = $user;
					ob_clean();
				}
				else if($select == 'casheir'){
					header("Location:casheir/casheir.php");
					$_SESSION['user'] = $user;
					ob_clean();
				}
			}
			else{
				echo "<div class='modal fade' id='my' role='dialog'>";
				echo "<div class='modal-dialog'>
						<div class='modal-content'>

						<div class='modal-body'>
						  <center><h4>INVALID USER AND PASSWORD</h4></center>
						</div>

						</div>
				</div>";
				echo "</div>";
?>

	<script type="text/javascript">
	$(document).ready(function(){
		$("#my").modal("show");
	});
</script>
<?php

			}
		}
 ?>

			</form>
		</div>

		<div class="col-sm-2"></div>
	</div>
</div>

</body>
</html>