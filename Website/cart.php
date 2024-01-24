<?php
session_start();
include "db_conn.php";
include "function.php";
?>

<!-- removes data from the cart  -->
<?php
if (isset($_GET['remove'])) {
    $remove_pro_id = $_GET['remove'];
    $sqlRemove = "DELETE FROM cart_table WHERE proID = $remove_pro_id";
    if (mysqli_query($conn, $sqlRemove)) {
        header("Location: cart.php");
    } else {
        echo "Error removing item from cart: " . mysqli_error($conn);
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart|ShopWatch</title>
    <link rel="stylesheet" href="CSS/cartCSS.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel=" preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Foldit:wght@200;300;500&family=Montserrat:wght@100;400&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<body>

    <div class="full-page">
        <div class="header">
            <div class="container">
                <div class="navbar">
                    <div class="logo">
                        <a href="index.html"><img src="images/logo.png" width="125px" alt=""></a>
                    </div>
                    <nav>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><a href="products.php">Products</a></li>
                            <li><a href="index.html#About-us">About Us</a></li>
                        </ul>
                    </nav>
                    <a href="cart.php">
                        <ion-icon name="cart-outline"></ion-icon>
                    </a>
                    <a href="cus_area/user_info.php">
                        <ion-icon name="person-outline"></ion-icon>
                    </a>
                </div>
            </div>
        </div>
        <hr>
        <!-- END OF NAV BAR -->




        <div class="small-container">

            <table>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Sub Total</th>
                </tr>

                <?php
                if (isset($_SESSION['u_email'])) {
                    $email = $_SESSION['u_email'];
                    $sql = "SELECT c.proID, p.proName, p.newPrice, p.imgURL, c.quantity AS cartQuantity
            FROM products p
            LEFT JOIN cart_table c ON p.ID = c.proID
            WHERE c.email = '$email'";
                    $res = mysqli_query($conn, $sql);

                    if ($res && mysqli_num_rows($res) > 0) {
                        while ($proDetails = mysqli_fetch_assoc($res)) {
                            $pro_id = $proDetails['proID'];
                            $pro_name = $proDetails['proName'];
                            $unitPrice = $proDetails['newPrice'];
                            $quan = $proDetails['cartQuantity'];
                            $pro_img = $proDetails['imgURL'];
                            $subTotal = $unitPrice * $quan;
                            // $total += $subTotal;
                            ?>
                            <tr>
                                <td>
                                    <div class="cart-details">
                                        <img src="Uploads/<?php echo $pro_img ?>" width="150px" alt="">
                                        <div>
                                            <p><?php echo $pro_name ?></p>
                                            <small>Price: $<?php echo $unitPrice ?></small>
                                            <br>
                                            <a href="cart.php?remove=<?php echo $pro_id ?>">Remove</a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <input type="number" value="<?php echo $quan; ?>" name="quantity" min="1" onchange="updateSubTotal(this)">
                                </td>
                                <td>$<?php echo $unitPrice ?></td>
                                <td class="subTot">$<?php echo $subTotal; ?></td>
                            </tr>
                <?php }
                    } else {
                        echo '<tr><td colspan="4" style="text-align: center;">Your cart is empty.</td></tr><tr></tr><tr></tr>';
                    }
                } else {
                    header("Location: login.html");
                }
                ?>

            </table>

            <div class="total-price">
                <table>
                    <tr>
                        <td>Total Price</td>
                        <td id = "total">
                        </td>
                    </tr>
                </table>
            </div>
            <form method="post" action="checkout.php">
                <a href="checkout.php">
                    <button type="submit" name="buy-all" class="validBut">Check Out</a></button>
            </form>

        </div>

        <br><br><br> <!-- footer -->

        <div class="footer">
            <hr>
            <p class="copyright">ShopWatch.com - 2023</p>
        </div>

        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
   
        <script>
        function updateSubTotal(input) {
        const row = input.closest("tr");
        const unitPrice = parseFloat(row.querySelector("td:nth-child(3)").innerText.slice(1));
        const quantity = parseInt(input.value);
        const subTotal = unitPrice * quantity;
        row.querySelector(".subTot").innerText = "$" + subTotal.toFixed(2);

        // Recalculate the total
        let total = 0;
        const subTotalElements = document.querySelectorAll(".subTot");
        subTotalElements.forEach(element => {
            total += parseFloat(element.innerText.slice(1));
        });

        // Update the total
        document.getElementById("total").innerText = total.toFixed(2);
    }

</script>

</body>

</html>