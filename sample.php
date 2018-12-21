<?php 

		$success = 1;

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>sample</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap/js/jquery.min.js.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>

<div class="container-fluid display-table">
	
<div class="row display-table-row">
	
	<div class="col-md-2 display-table-cell" id="sidebar">
		<h1>Navigation</h1>
		<ul>

				<li><a href="#">DASHBOARD</a></li>
				<li><a href="#">DASHBOARD</a></li>
				<li><a href="#">DASHBOARD</a></li>
				<li><a href="#">DASHBOARD</a></li>
				<li><a href="#">DASHBOARD</a></li>

		</ul>
	</div>

	<div class="col-md-10 display-table-cell box">
<div class="modal fade" id="modal" role="dialog">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
              <div class="modal-header">
              <h4><span class='alert alert-success' id="text"></span></h4>
          </div>
        </div>
      </div>
</div>

<script type="text/javascript">

$(document).ready(function(){
var success = "<?=$success?>";
if (success == '1') {
    $('#text').text("Updated Successfully!");
    $('#modal').modal('show');
 }

});




</script>

	</div>

</div>

</div>

</body>
</html>