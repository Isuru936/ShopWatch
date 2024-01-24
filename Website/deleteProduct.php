<?php
    include "db_conn.php";

    if(isset($_POST['delete'])){
        $proId = $_POST['product_id'];

        //perform deletion
        $delete_sql = "DELETE FROM products WHERE ID = '$proId'";
        $delete_result = mysqli_query($conn, $delete_sql);

        if($delete_result){
            header("Location:SearchProducts.php");
        } else {
            echo "Error deleting record".mysqli_error($conn);
        }
    }
?>