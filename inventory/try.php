


 <div class="form-group <?=$hidden1?>">
        <label class="control-label">Product <?=$class_2?></label>
        <select class="form-control" name="edit_category_2">
          <option value=""></option>
<?php
      @$sql = "SELECT stock_name FROM minute_stock where stock_category = '$class_2' group by stock_name";
      @$sql_result = mysqli_query($connect,$sql);
      if (@mysqli_num_rows($sql_result) >=1) {
        while (@$row_sql = mysqli_fetch_assoc($sql_result)){
        @$row_category = $row_sql['stock_name'];
        if ($row_category == $patty) {
         echo "<option selected value='$row_category'>$row_category</option>";
        }
        else{
          echo "<option value='$row_category'>$row_category</option>";
        }
      }
      }
      else{
         echo "<option selected value='NONE'>NONE</option>";
      }

?>
        </select>
      </div>

                  <div class="form-group <?=$hidden2?>">
        <label class="control-label">Product <?=$class_2?></label>
        <select class="form-control" name="edit_category_2">
          <option value=""></option>
<?php
      @$sql = "SELECT stock_name FROM minute_stock where stock_category = '$class_3' group by stock_name";
      @$sql_result = mysqli_query($connect,$sql);
      if (@mysqli_num_rows($sql_result) >=1) {
        while (@$row_sql = mysqli_fetch_assoc($sql_result)){
        @$row_category = $row_sql['stock_name'];
        if ($row_category == $dressing) {
         echo "<option selected value='$row_category'>$row_category</option>";
        }
        else{
          echo "<option value='$row_category'>$row_category</option>";
        }
      }
      }
      else{
         echo "<option selected value='NONE'>NONE</option>";
      }

?>
        </select>
      </div>
                       <div class="form-group">
        <label class="control-label">Product1 <?=$class_4?></label>
        <select class="form-control" name="edit_category_2">
          <option value="NONE"></option>
<?php
      @$sql = "SELECT stock_name FROM minute_stock where stock_category = '$class_4' group by stock_name";
      @$sql_result = mysqli_query($connect,$sql);
      if (@mysqli_num_rows($sql_result) >=1){
        while (@$row_sql = mysqli_fetch_assoc($sql_result)){
        @$row_category = $row_sql['stock_name'];
        if ($row_category == $add_on_product){
         echo "<option selected value='$row_category'>$row_category</option>";
        }
        else{
          echo "<option value='$row_category'>$row_category</option>";
        }
      }
      }
      else{
         echo "<option selected value='NONE'>NONE</option>";
      }

?>
        </select>
      </div>