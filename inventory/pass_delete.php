<?php 

$item_sql =  "SELECT * FROM supplier_product order by item_id";
$item_result = mysqli_query($connect,$item_sql);

  if (mysqli_num_rows($item_result) >=0) {
      while ($item_row = mysqli_fetch_assoc($item_result)) {
              $id = $item_row['item_id'];
              $item_main_name = $item_row['item_name'];

?>
         <div class="modal fade" id="remove<?=$id;?>" role='dialog'>
              <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                        <div class="modal-header">
                            <h4>Remove <?=$item_main_name;?></h4>
                        </div>

                        <div class="modal-body">

                            <center>
                                <form action="" method="POST">
                                        <input type="hidden" name="remove_id" value="<?=$id;?>">
                                        <input type="submit" name="delete_record" class="btn btn-danger" value="Remove">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </form>    
                            </center>

<?php 

if (isset($_POST['delete_record'])) {

  $id_remove = $_POST['remove_id'];

  $delete_id = "DELETE from supplier_product where  item_id = '$id_remove'";
  $delete_result = mysqli_query($connect,$delete_id);
}


?>
                        </div>
                    </div>
              </div>
        </div>

<?php
              
      }
  }

 ?> 