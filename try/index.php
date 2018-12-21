<?php include '../function/in-session.php'; 
      require '../connect/connect.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>sample</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="../bootstrap/js/jquery.min.js.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../main_css/menu.css">
</head>
<body>

<div id="disp_data"></div>


<script type="text/javascript">

disp_data();
setInterval(disp_data,(1 * 1000));

function disp_data()
{
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","update.php?status=disp",false);
	xmlhttp.send(null);

	document.getElementById("disp_data").innerHTML = xmlhttp.responseText;

}
/*
function aa(a)
{
	nameid = "name"+a;
	txtnameid = "txtname"+a;
	var name = document.getElementById(nameid).innerHTML;
	document.getElementById(nameid).innerHTML="<input type='text' value='"+name+"' id='"+txtnameid+"' >";

	cityid = "city"+a;
	txtcityid = "txtcity"+a;
	var city = document.getElementById(cityid).innerHTML;
	document.getElementById(cityid).innerHTML="<input type='text' value='"+city+"' id='"+txtcityid+"' >";

	updateid="update"+al
	document.getElementById(a).style.visibility="hidden";
	document.getElementById(updateid).style.visibility="visible";
}

function bb(b)
{
	var nameid = "txtname"+b;
	var name = document.getElementById(nameid).value;

	var cityid = "txtcity"+b;
	var city = document.getElementById(cityid).value;

	update_value(b,name,city);


	document.getElementById(b).style.visibility="visible";
	document.getElementById("update"+b).style.visibility="hidden";

	document.getElementById("name"+b).innerHTML=name;
	document.getElementById("name"+b).innerHTML=city;
}

function update_value(ids,name,city)
{
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","update.php?id="+id+"&name="+name+"&city="+city+"&status=update",false);
	xmlhttp.send(null);
}*/

function delete1(id){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","update.php?id="+id+"&status=delete",false);
	xmlhttp.send(null);
	disp_data();
}
 
</script>


</body>
</html>