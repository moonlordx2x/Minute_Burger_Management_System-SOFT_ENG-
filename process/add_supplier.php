<?php 
      require '../connect/connect.php';
      include '../function/in-session.php';

        ob_start();
            if (isset($_POST['submit'])) {
                $supplier_name = ucwords($_POST['supplier_name']);
                $supplier_number = $_POST['supplier_number'];
                $supplier_company = ucwords($_POST['supplier_company']);
                $supplier_address = ucwords($_POST['supplier_address']);

                $add_supplier = "INSERT INTO minute_supplier(minute_supplier_name,minute_supplier_number,minute_supplier_company,minute_supplier_address) values ('$supplier_name','$supplier_number','$supplier_company','$supplier_address')";
                $add_supplier_result = mysqli_query($connect,$add_supplier);

                if (!$add_supplier_result) {
                    header("location:../inventory/view_supplier.php?page=2");
                    ob_clean();
                }

                else{
                        header("location:../inventory/view_supplier.php?page=1");
                        ob_clean();
                    }
        }
?>