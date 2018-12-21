<?php 
require '../connect/connect.php';
date_default_timezone_set("Asia/Manila");
$time = date("Y-m-d");
$sql = "SELECT * FROM graph_result where date_1 = '$time' order by id ";
$result = mysqli_query($connect,$sql);
$chart = '';
$name = '';
if (mysqli_num_rows($result) >=1) {
  while ($row = mysqli_fetch_assoc($result)){
     
     
      $chart .= "{ id:".$row['id'].", category:".$row['total'].", cost:".$row['total_cost']."},"; 
}
}


echo $chart;
echo $time;
 ?>


<!DOCTYPE html>
<html>
<head>
  <title>Minute Burger Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../bootstrap/js/morris.js-0.5.1/morris.css">
  <script type="text/javascript" src="../bootstrap/js/jquery.min.js.js"></script>
  <script type="text/javascript" src="../bootstrap/js/raphael-master/raphael.min.js"></script>
  <script type="text/javascript" src="../bootstrap/js/morris.js-0.5.1/morris.min.js"></script>
  <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../bootstrap/font-awesome/css/font-awesome.min.css">
</head>
<body>
    <h1>hello world</h1>
    <div id="chart">
     
    </div>


<script type="text/javascript">
  Morris.Bar({
    element : 'chart',
    data : [<?php echo $chart; ?>],
    xkey : 'id',
    ykeys : ['category'],
    labels : ['Total Item Sales'],
    hideHover : 'auto',
    parseTime: false
  });  

</script>

</body>
</html>