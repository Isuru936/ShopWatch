<?php
session_start();

include "db_conn.php";
$email = $_SESSION['u_email'];

$address = $_POST['address'];
$tele = $_POST['tele'];

$sql = "UPDATE users SET address = '$address', telephone = '$tele' WHERE email=$email";
$result = mysqli_query($conn, $sql);


$sqlGetCart = "SELECT* FROM cart_table";
$cartResult = mysqli_query($conn, $sqlGetCart);

while ($cartData = mysqli_fetch_assoc($cartResult)) {
    $proID = $cartData['proID'];
    $quan = $cartData['quantity'];
    $currentDate = date("Y-m-d");
    $fromProductSqlGetQuan = "SELECT * FROM products WHERE ID = $proID";
    $prodTbl = mysqli_query($conn,$fromProductSqlGetQuan);
    $prodTblRes = mysqli_fetch_assoc($prodTbl);
    $prodTblQuan = $prodTblRes['quantity'];

    $newQuan = $prodTblQuan - $quan;

    $sqlAddOrder = "INSERT INTO orders(proID, quantity, email, address,date) VALUES ($proID, $quan, '$email', '$address','$currentDate')";
    if (!mysqli_query($conn, $sqlAddOrder)) {
        echo "Error inserting order details: " . mysqli_error($conn);
    } else {
        $sqlUpdateQuan = "UPDATE products SET quantity = $newQuan WHERE ID = $proID ";
        mysqli_query($conn,$sqlUpdateQuan);
        $delCartSql = "DELETE FROM cart_table";
        mysqli_query($conn,$delCartSql);
         echo 'order placed'; 
    }
}
?>