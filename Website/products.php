<?php
session_start();
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
                <!-- Inside <body> section -->
                <form action="products.php" method="post">
                    <input type="text" id="searchInput" name="search_query" placeholder="Search products" value="<?php echo isset($_POST['search_query']) ? htmlspecialchars($_POST['search_query']) : ''; ?>">
                    <button type="submit">Search</button>
                </form>
            </div>
        </div>


        <div class="gallery">
            <?php
            if (isset($_POST['search_query'])) {
                $searchQuery = $_POST['search_query'];
                $sql = "SELECT * FROM products WHERE description LIKE '%$searchQuery%' ORDER BY ID DESC";
                
            } else {
                $sql = "SELECT *  FROM products ORDER BY ID DESC";
            }
            $res = mysqli_query($conn, $sql);

            if (mysqli_num_rows($res) > 0) {
                while ($dbData = mysqli_fetch_assoc($res)) {
                    $product_id = $dbData['ID'];
                    $bfore_price = $dbData['price']; ?>
                    <div class="content">
                        <a href="product-desc.php?product_id=<?php echo $product_id ?>">
                            <img src="Uploads/<?= $dbData['imgURL'] ?>">
                            <p>
                                <?= $dbData['proName'] ?>
                            </p>
                            <h6>
                                $
                                <?= $bfore_price - ($bfore_price * $dbData['discount'] / 100) ?>
                            </h6>
                            <small><strike>
                                    $
                                    <?= $bfore_price ?> - <b>(
                                        <?= $dbData['discount'] ?> %)
                                    </b>
                                </strike></small>
                            <button class="buy">Buy Now</button>
                        </a>
                    </div>
                <?php }
            } ?>
        </div>
    </div>

    <!-- calling cart function -->
    <?php
    error_reporting(E_ALL); // Enable error reporting
    
    if (isset($_GET['add_to_cart'])) {
        $email = $_SESSION['u_email'];
        $_SESSION['email'] = "Issa";
        global $conn;
        $mail = $_SESSION['email'];
        $ip = getIPAddress();
        $get_pro_id = $_GET['add_to_cart'];
        $selectsql = "SELECT * FROM cart_table WHERE email = '$email' AND proID = $get_pro_id";

        $results = mysqli_query($conn, $selectsql);
        if (!$results) {
            echo "Error in SELECT query: " . mysqli_error($conn);
        } else {
            $rows = mysqli_num_rows($results);
            if ($rows > 0) {
                echo "<script>alert('The item is already in the cart')</script>";
                header("Location: products.php");
            } else {
                $sqlInsert = "INSERT INTO cart_table VALUES ($get_pro_id, '$email', 1)";
                if (mysqli_query($conn, $sqlInsert)) {
                    header("Location: products.php");
                } else {
                    echo "Error in INSERT query: " . mysqli_error($conn);
                }
            }
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