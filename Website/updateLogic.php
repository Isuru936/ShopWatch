<?php
include "db_conn.php";

if (isset($_POST['update_product'])) {

    $proID = $_POST['product_id'];
    $productName = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];

    $img_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $img_size = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];

    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION); //gets the the ex[entsion]
    $img_ex_lc = strtolower($img_ex); //makes the exntesion to lower case

    $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
    $img_upload_path = 'Uploads/' . $new_img_name;


    // Check if a new image was uploaded
    if ($_FILES['image']['error'] === 0) {

        $img_name = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $img_size = $_FILES['image']['size'];
        $error = $_FILES['image']['error'];

        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION); //gets the the ex[entsion]
        $img_ex_lc = strtolower($img_ex); //makes the exntesion to lower case

        $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
        $img_upload_path = 'Uploads/' . $new_img_name;

        $sqlGetImge = "SELECT imgURL from products WHERE id = $proID";

        $results = mysqli_query($conn, $sqlGetImge);
        $data = mysqli_fetch_assoc($results);
        $pre_img = $data['imgURL'];


        // Update the product details in the database with the new image URL
        $sql = "UPDATE products SET proName = '$productName', imgURL = '$new_img_name', quantity = '$quantity',
    description = '$description', price = '$price', discount = '$discount' WHERE ID = '$proID'";

        if (move_uploaded_file($tmp_name, $img_upload_path)) {
            // File uploaded and moved successfully
            // Perform further operations or validations here
            $imagePath = "Uploads/" . $pre_img; // Replace "image.jpg" with the actual image file name
            unlink($imagePath);  //delete images in uploads
        } else {
            // Error in uploading/moving the file
            // Handle the error case
            $em = "Error uploading/moving the file.";
        }

    } else {
        // No new image uploaded, keep the previous image URL in the database
        $sql = "UPDATE products SET proName = '$productName', quantity = '$quantity',
                description = '$description', price = '$price', discount = '$discount' WHERE ID = '$proID'";
    }


    if (mysqli_query($conn, $sql)) {
        header("Location:SearchProducts.php?$em;");
    } else {
        echo "Error updating product: " . mysqli_error($conn);
    }
}
?>