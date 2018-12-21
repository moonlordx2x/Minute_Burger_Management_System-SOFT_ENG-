<?php include '../function/in-session.php'; 
      require '../connect/connect.php';
$status = $_GET['status'];

if ($status == "disp") {
$sql = "SELECT * FROM sample";
$result = mysqli_query($connect,$sql);

echo "<table>";
while ($row = mysqli_fetch_array($result)) {

	$id = $row['id'];
	echo "<tr>";

	echo "<td> <div>".$row['id']."</div></td>";
	echo "<td> <div id='name$id'>".$row['name']."</div></td>";
	echo "<td> <div id='city$id'>".$row['city']."</div></td>";
?>
		<td>
	<button class="btn btn-danger" id="<?=$id?>"
	name="<?=$id?>" onClick="delete1(this.id)">Delete</button></td>
<?php


	echo "</tr>";

}

echo "</table>";
}


if ($status == "delete") 
{
	$id = $_GET["id"];


	$sql = "DELETE FROM sample WHERE id =$id";
	$result = mysqli_query($connect,$sql);
}


?>