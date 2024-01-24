<?php

if (isset($_POST['submit']) && isset($_FILES['my_image'])) {

    include "db_conn.php";

    echo "<pre>";
    print_r($_FILES['my_image']);
    echo "</pre>";

    $pro_name = $_POST['namePro'];
    $pro_price = $_POST['price'];
    $pro_quan = $_POST['quantity'];
    $pro_desc = $_POST['description'];
    $pro_dis = $_POST['discount'];
    $pro_new_price = $pro_price - ($pro_price * $pro_dis / 100);

    $img_name = $_FILES['my_image']['name'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $img_size = $_FILES['my_image']['size'];
    $error = $_FILES['my_image']['error'];

    if ($error === 0) {
        if ($img_size > 12500000) {  //set the files size u want
            $em = "Sorry ur file is too large!!";
            header("Location: AddProduct.php?error=$em");
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION); //gets the the ex[entsion]
            $img_ex_lc = strtolower($img_ex); //makes the exntesion to lower case

            $allowed_exs = array("jpg", "jpeg", "png","webp");

            if (!in_array($img_ex_lc, $allowed_exs)) {
                $em = "Sorry, only JPG, JPEG, and PNG files are allowed.";
                header("Location: AddProduct.php?error=$em");
                exit();
            }

            // Check the image resolution
            $image_info = getimagesize($_FILES['my_image']['tmp_name']);
            $image_width = $image_info[0];
            $image_height = $image_info[1];

            $aspect_ratio = $image_height / $image_width;
            $target_ratio = 1;

            if (abs($target_ratio - $aspect_ratio > 0.01)) {
                $em = "Sorry, the image resolution should be 1:1!";
                header("Location: AddProduct.php?error=$em");
                exit();
            }

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'Uploads/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                //insert into DB
                $sql = "INSERT INTO 
                products(proName, imgURL, price, discount, quantity, description, newPrice) 
                 VALUES('$pro_name',
                 '$new_img_name',
                 '$pro_price',
                 '$pro_dis',
                 '$pro_quan',
                 '$pro_desc',
                 '$pro_new_price'
                 )";

                mysqli_query($conn, $sql);
                $em = "Product Added!";
                header("Location: AddProduct.php?success=$em");

            } else {
                $em = "You cant upoad the files of this type";
                header("Location: AddProduct.php?error=$em");
            }

        }
    } else {
    }

} else {
    header("Location: AddProduct.php");
    echo "Not uploaded";
}
?>