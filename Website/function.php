<?php
include "db_conn.php";
// session_start();

function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}


//total cart price

//total cart price
function total_Cart()
{
    $email = $_SESSION['u_email'];
    global $conn;


    $total = 0;
    $sqlCartQuery = "SELECT * FROM cart_table WHERE email = '$email'";

    $result = mysqli_query($conn, $sqlCartQuery);

    if (!$result) {
        echo "Error in SQL query: " . mysqli_error($conn);
    } else {
        while ($row = mysqli_fetch_array($result)) {
            $proID = $row['proID'];
            $sqlSelectPro = "SELECT * FROM products WHERE ID = $proID";
            $res_prod = mysqli_query($conn, $sqlSelectPro);
            if (!$res_prod) {
                echo "Error in SQL query: " . mysqli_error($conn);
            } else {
                while ($row_pro_price = mysqli_fetch_array($res_prod)) {
                    $pro_price_arr = array($row_pro_price['newPrice']);
                    $pro_price_arr_total = array_sum($pro_price_arr);
                    $total += $pro_price_arr_total;
                }
            }
        }
        echo $total;
    }
}
