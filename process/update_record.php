<?php
	include '../function/in-session.php';
  require '../connect/connect.php';

ob_start();

    if (isset($_POST['submit'])){
          $update_name = strtoupper($_POST['update_name']);
          $update_name_2 = $_POST['update_name_2'];
          $update_category = $_POST['update_category'];
          $update_price = $_POST['update_price'];
          $update_hidden = $_POST['update_hidden'];
          $update_id = $_POST['update_id'];
          $update_supplier = $_POST['update_supplier'];
          $filter = $_POST['filter'];

          echo $update_category."<br>";
          echo $update_name_2;

          $checking = "SELECT * FROM minute_supplier_product WHERE  supply_product_name ='$update_name' 
                       AND supply_product_supplier ='$update_supplier'";
          $checking_result = mysqli_query($connect,$checking);
          if (mysqli_num_rows($checking_result) == 1){
                 header("location:../inventory/supplier_view_product.php?minute_supplier_id=$update_hidden&&status=2&&filter=$filter");
                 ob_clean();
          }
          else{

          $Update = "UPDATE minute_supplier_product SET supply_product_name ='$update_name',
          supply_product__category='$update_category',supply_product_price='$update_price' 
          where supply_product_id ='$update_id'";
          $update_query = mysqli_query($connect,$Update);
          if ($update_query) {
              $Update_2 = "UPDATE minute_stock SET stock_name ='$update_name',
              stock_category='$update_category',stock_price='$update_price' 
              where stock_id ='$update_id'";
              $update_query_2 = mysqli_query($connect,$Update_2);
              if ($update_query_2){
              /* header("location:../inventory/supplier_view_product.php?minute_supplier_id=$update_hidden&&status=1&&filter=$filter");
               ob_clean();*/

                if ($update_category == 'BUNS' || $update_category == 'HOTDOG' || $update_category == 'DRINKS' 
                  || $update_category == 'CUPS' || $update_category == 'DRESSING'|| $update_category == 'OTHER'){
                   $update_product = "UPDATE minute_product SET product_bun ='$update_name' where product_bun ='$update_name_2'";
                   $update_result = mysqli_query($connect,$update_product);

                   $update_product_1 = "UPDATE minute_product SET product_patty ='$update_name' where product_patty ='$update_name_2'";
                   $update_result_1 = mysqli_query($connect,$update_product_1);

                   $update_product_2 = "UPDATE minute_product SET product_dressing ='$update_name' where product_dressing ='$update_name_2'";
                   $update_result_2 = mysqli_query($connect,$update_product_2);

                   $update_product_3 = "UPDATE minute_product SET add_on ='$update_name' where add_on ='$update_name_2'";
                   $update_result_3 = mysqli_query($connect,$update_product_3);

                   if ($update_result_3){
                     header("location:../inventory/supplier_view_product.php?minute_supplier_id=$update_hidden&&status=1&&filter=$filter");
                     ob_clean();
                     echo "Success";
                   }
                else{
                    /*header("location:../inventory/supplier_view_product.php?minute_supplier_id=$update_hidden&&status=1&&filter=$filter");
                    ob_clean();*/
                    echo "Failed";
                   }
                }
                else{
                   /* header("location:../inventory/supplier_view_product.php?minute_supplier_id=$update_hidden&&status=1&&filter=$filter");
                    ob_clean();*/
                }

              }
              else{
                header("location:../inventory/supplier_view_product.php?minute_supplier_id=$update_hidden&&status=2&&filter=$filter");
                ob_clean();
              }
          }
          else{
            
                header("location:../inventory/supplier_view_product.php?minute_supplier_id=$update_hidden&&status=2&&filter=$filter");
                ob_clean(); 
            
          }                     
    
/*
            $Update = "UPDATE minute_supplier_product INNER JOIN minute_stock ON 
            minute_supplier_product.supply_product_id = minute_stock.stock_id 
            SET
            minute_supplier_product.supply_product_name = '$update_name',
            minute_supplier_product.supply_product__category = '$update_category',
            minute_supplier_product.supply_product_price = '$update_price'
            WHERE minute_supplier_product.supply_product_id = '$update_id';
            ";
            $update_query = mysqli_query($connect,$Update);
            if ($update_query) {
              echo "Success";
            }
            else{
              echo "Failed";
            }
*/
        }
}
?>