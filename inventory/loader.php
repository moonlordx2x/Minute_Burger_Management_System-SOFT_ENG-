<!DOCTYPE html>
<html>
<head>
  <title>Way Forever</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
  <script type="text/javascript" src="../bootstrap/js/jquery.min.js.js"></script>
  <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../main_css/menu.css">
</head>
<body>
    <div class="container">
  <h2>Modal Methods</h2>
  <p>The <strong>toggle</strong> method toggles the modal manually.</p>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-md" id="myBtn">Toggle Modal</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Methods</h4>
        </div>
        <div class="modal-body">
          <p>The toggle method toggles the modal manually.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
</div>
 
<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal("toggle");
    });
});
</script>

</body>
</html>