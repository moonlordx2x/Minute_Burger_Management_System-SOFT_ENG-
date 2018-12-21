<?php 
include '../function/in-session.php'; 
require '../connect/connect.php';
$status = $_GET['status'];

//if ($status == 'display') {
$item_sql = "SELECT * FROM supplier_product order by id";
$item_result = mysqli_query($connect,$item_sql);

  while ($item_row = mysqli_fetch_array($item_result)){
              $id = $item_row['id'];
              echo "<tr>";
              echo "<td>".$item_row['id']."</td>";
              echo "<td>".$item_row['item_name']."</td>";
              echo "<td>".$item_row['item_category']."</td>";
              echo "<td> &#8369; ".$item_row['item_price']."</td>";
            //echo "<td class='text-center'> <a href='#remove$id' data-toggle='modal' data-target='#remove$id'><button class='btn btn-danger'><span class='glyphicon glyphicon-remove'></span></button></a></td>";
              //echo "<td><button class='btn btn-danger' id='$item_id' name=' $item_id' onClick='delete1(this.item_id)'><span class='glyphicon glyphicon-remove'></span></button></td>";
?>
      <td>
            <button class="btn btn-danger" id="<?=$id?>" name="<?=$id?>" onClick="delete1(this.id)"><span class='glyphicon glyphicon-remove'></span></button>
      </td>
<?php

              echo "</tr>";
  }

//}


if ($status == "delete") {
      $id = $_GET["id"];
     
  $sql = "DELETE FROM supplier_product WHERE id =$id";
  $result = mysqli_query($connect,$sql);


}

?>
