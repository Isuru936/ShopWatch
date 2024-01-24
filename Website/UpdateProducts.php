<?php
include "db_conn.php";

if (isset($_POST['update'])) {
    $proID = $_POST['product_id'];

    // Retrieve the product details from the database based on the ID
    $sql = "SELECT * FROM products WHERE ID = '$proID'";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        $productName = $row['proName'];
        $quantity = $row['quantity'];
        $description = $row['description'];
        $price = $row['price'];
        $discount = $row['discount'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update products</title>
    <link rel="stylesheet" href="CSS/UploadProduct.css">
</head>

<body>
    <div class="container">
        <h1>Update Product</h1>
        <form action="updateLogic.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="product_id" value="<?php echo $proID; ?>">
            <label for="product_name">Product Name:</label>
            <input type="text" name="product_name" id="product_name" value="<?php echo $productName; ?>" required><br>


            <label for="quantity">Quantity:</label>
            <input type="text" name="quantity" id="quantity" value="<?php echo $quantity; ?>" required><br>

            <label for="description">Description:</label>
            <textarea name="description" id="description" required><?php echo $description; ?></textarea><br>
            <label for="price">Price:</label>
            <input type="text" name="price" id="price" value="<?php echo $price; ?>" required><br>

            <label for="discount">Discount:</label>
            <input type="text" name="discount" id="discount" value="<?php echo $discount; ?>" required><br>

            <label for="image">Image :</label>
            <input type="file" name="image" id="image"> <br>

            <button type="submit" name="update_product">Update</button>
        </form>
    </div>
</body>

</html>