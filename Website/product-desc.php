<?php
include "db_conn.php";
include "function.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Description</title>
    <link rel="stylesheet" href="CSS/productCSS.css">
</head>

<body>
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
            <hr>
        </div>
    </div>

    <?php
    if (isset($_GET['product_id'])) {
        $pro_ID = $_GET['product_id'];
        $sql = "SELECT * FROM products WHERE ID = $pro_ID";
        $results = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($results);
        $quan = $data['quantity'];
        $desc = $data['description'];
        $ori_price = $data['price'];
        $discount = $data['discount'];
        $price = $ori_price * $discount / 100;
    }
    ?>

    <div class="container2">
        <div class="product-image">
            <img src="Uploads/<?= $data['imgURL'] ?>" alt="Product Image">
        </div>
        <div class="product-details">
            <h2 class="product-title">
                <?= $data['proName'] ?>
            </h2>
            <p class="product-description">
                <?= $data['description'] ?>
            </p>
            <p class="product-price">
                <?php echo $data['newPrice'] ?>
            </p>
            <p class="">
                <strike>
                    <?php echo $ori_price ?>
                </strike>
            </p>
            <div class="quantity">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" min="1" value="1">
            </div>
             <a href="products.php?add_to_cart=<?php echo $pro_ID ?>"> <button class="add-to-cart"> Add to Cart</button></a>
            <!-- <button class="buy-now">Buy Now</button> -->
        </div>
    </div>

    <div class="footer">
        <hr>
        <p class="copyright">ShopWatch.com - 2023</p>
    </div>
    <!-- add to cart -->
    

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>

