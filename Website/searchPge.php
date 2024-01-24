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
    <title>Products</title>
    <link rel="stylesheet" href="CSS/products.css" type="text/css">
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

    <!-- ------------------------------------------------------------------------------------------------------- -->
    <div class="gal-desc" id="products">
        <h2>Products</h2>
        <div class="searchBar">
            <div class="searchProduct">
                <form action="searchPge.php" method="post">
                    <input type="text" id="searchInput" name="search_query" placeholder="Search products">
                    <button type="submit">Search</button>
                </form>


            </div>
        </div>

        <div class="gallery">
            <?php
            include "db_conn.php";

            // Check if the search form is submitted
            if (isset($_POST['search_query'])) {
                $searchQuery = $_POST['search_query'];

                // Query to search for products based on the input
                $sql = "SELECT * FROM products WHERE description LIKE '%$searchQuery%' ORDER BY ID DESC";
                $res = mysqli_query($conn, $sql);

                if (mysqli_num_rows($res) > 0) {
                    // Display the products matching the search query
                    while ($dbData = mysqli_fetch_assoc($res)) {
                        $product_id = $dbData['ID'];
                        $bfore_price = $dbData['price']; ?>
                        <div class="content">
                            <a href="product-desc.php?product_id=<?php echo $product_id ?>">
                                <img src="Uploads/<?= $dbData['imgURL'] ?>">
                                <p>
                                    <?= $dbData['description'] ?>
                                </p>
                                <h6>
                                    $
                                    <?= $bfore_price - ($bfore_price * $dbData['discount'] / 100) ?>
                                </h6>
                                <small>
                                    <strike>
                                        $
                                        <?= $bfore_price ?> - <b>(
                                            <?= $dbData['discount'] ?> %)
                                        </b>
                                    </strike>
                                </small>
                                <button class="buy">Buy Now</button>
                            </a>
                        </div>
                    <?php }
                } else {
                    // Handle the case where no products match the search query
                    echo "No products found.";
                }
            }
            ?>


            <!-- ------------------------------------------------------------------------------------------------------- -->
            <div class="footer">
                <hr>
                <p class="copyright">ShopWatch.com - 2023</p>
            </div>

            <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


</body>

</html>