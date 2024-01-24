<?php
include "db_conn.php"
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search, Delete, Update PRODUCTS</title>
    <link rel="stylesheet" href="CSS/SearchProduct.css" type = "text/CSS">
</head>

<body>
<div class="header">
        <div class="nav-container">
            <div class="navbar">
                <div class="logo">
                    <a href="index.html"><img src="images/logo.png" width="125px" alt=""></a>
                </div>
                <nav>
                    <ul>
                        <li><a href="dashBoardBackEnd.html">Home</a></li>
                        <li><a href="AddProduct.php">Add Products</a></li>
                        <li><a href="orders.php">Orders</a></li>
                    </ul>
                </nav>
                <a href="cart.html">
                    <ion-icon name="cart-outline"></ion-icon>
                </a>
                <a href="login.html">
                    <ion-icon name="person-outline"></ion-icon>
                </a>

            </div>
            <hr>
        </div>
    </div>

    <div class="container">
        <h1 align = center>SEARCH PRODUCTS </h1>
        <form action="" method="post" class = "search">
            <input type="text" placeholder="Search Item" name=search>
            <button name=submit>Search</button>
        </form>
        <div class="tableCon">
            <table class=table>
                <?php
                if (isset($_POST['submit'])) {
                    $search = $_POST['search'];

                    $sql = "SELECT * FROM products where ID like '%$search%' or proName like '%$search%'";

                    $results = mysqli_query($conn, $sql);

                    if ($results) {

                        if (mysqli_num_rows($results) > 0) {
                            echo '
            <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>imgURL</th>
                <th>quantity</th>
                <th>desciption</th>
                <th>price</th>
                <th>discount</th>
                <th>UPDATE</th>
                <th>DELETE</th>
            </tr>
            </thead>';

                            while ($row = mysqli_fetch_assoc($results)) {
                                echo '
                            <tbody>
                                <tr>
                                        <td>' . $row['ID'] . '</td>
                                        <td>' . $row['proName'] . '</td>
                                        <td> <img src = "Uploads/' . $row['imgURL'] . '"></td>
                                        <td>' . $row['quantity'] . '</td>
                                        <td>' . $row['description'] . '</td>
                                        <td>' . $row['price'] . '</td>
                                        <td>' . $row['discount'] . '%</td>
                                        <form action="UpdateProducts.php" method="post">
                                         <input type="hidden" name="product_id" value="' . $row['ID'] . '">
                                         <td> <button type = "submit" class = "update" name = "update">  Update </button> </td>
                                        </form>
                                    <td>
                                        <form action="deleteProduct.php" method="post">
                                         <input type="hidden" name="product_id" value="' . $row['ID'] . '">
                                         <button type="submit" name="delete" class = "delete">Delete</button>
                                        </form>
                                    </td>
                                    </tr>
                            </tbody>';
                            }
                        } else {
                            echo '<h2 class = "No Data">Product Not Found</h2>';
                        }
                    }
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>