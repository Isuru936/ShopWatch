<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Products</title>
    <link rel="stylesheet" href="CSS/addProduct.css" type="text/css">
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
                        <li><a href="dashBoardBackEnd.html">Home</a></li>
                        <li><a href="SearchProducts.php">Search Products</a></li>
                        <li><a href="orders.php">Orders</a></li>
                    </ul>
                </nav>
            </div>
            <hr>
        </div>
    </div>

    <div class="addProducts">
        <?php if (isset($_GET['error'])): ?>
            <p>
                <?php echo $_GET['error'] ?>
            </p>
        <?php endif ?>
        <div class="formbox">
            <div class="topic">
                <h1 style='text-align:center'>Add Products</h1>
            </div>
            <form action="upload.php" method="post" enctype="multipart/form-data">

                <label for="name">Name: </label>
                <input type="text" name="namePro" id="">

                <label for="name">Price: </label>
                <input type="text" name="price" id="">

                <label for="name">Discount: </label>
                <input type="text" name="discount" placeholder="using percentage">

                <label for="name">Quantity: </label>
                <input type="text" name="quantity" id="">

                <label for="name">Description: </label>
                <textarea name="description" id="" cols="30" rows="10"></textarea>
                <small>Please note that the files should be at 1:1 ratio</small>
                <input type="file" name="my_image" required>

                <input type="submit" name="submit" value=upload>
            </form>
        </div>
    </div>
    </div>




</body>

</html>