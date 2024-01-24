<?php
include "db_conn.php";
include "function.php";

// Check if the "Confirm Quan" button is clicked
if (isset($_POST['confirmQuan'])) {
    $pro_id = $_POST['pro_id'];
    $new_quantity = $_POST['quantity'];
    $price = $_POST['pro_price'];

    // Update the quantity in the cart_table
    $sqlUpdateQuantity = "UPDATE cart_table SET quantity = $new_quantity WHERE proID = $pro_id";
    if (mysqli_query($conn, $sqlUpdateQuantity)) {
        // Quantity updated successfully
        header("Location: cart.php");
        exit();
    } else {
        echo "Error updating quantity: " . mysqli_error($conn);
    }
}
?>