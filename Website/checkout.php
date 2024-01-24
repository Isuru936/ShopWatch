<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Out Page</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel=" preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

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
                            <li><a href="#About-us">About Us</a></li>
                        </ul>
                    </nav>
                </div>

                <div class="row">
                    <?php
                    session_start();
                        if(!isset($_SESSION['u_email'])){
                            include "cus_area/cus_login.php"; 
                        } else {
                            header("Location:cus_area/payment.php"); 
                        }

                    ?>
                </div>


                <!--	footer-->
                <div class="footer">
                    <div class="contact">
                        <div class="contact-us">
                            <p>Contact Us</p>
                            <div class="cont-buttons">
                                <a href="facebook.com"><img src="Images/facebook (1).png" width=30px alt=""></a>
                                <a href="instagram.com"><img src="Images/instagram.png" width="30px" alt=""></a>
                                <a href="twitter.com"><img src="Images/twitter.png" width="30px" alt=""></a>
                                <a href="whatsapp.com"><img src="Images/whatsapp.png" width="30px" alt=""></a>
                            </div>
                        </div>
                    </div>

                    <div class="container">

                        <br>
                        <!-- </div> -->
                        <div class="location">

                            <p>
                                <img src="Images/location.png" alt="" width="30px" class="location-point">
                                250/1, Peradeniya, Kandy
                            </p>
                        </div>
                        <hr>
                        <div class="about-us">
                            <p>
                            <ul>
                                <li><a href="">Terms and Conditions</a></li>
                                <li><a href="">About us</a></li>
                            </ul>
                            </p>
                        </div>

                        <!-- <hr> -->
                        <p class="copyright">ShopWatch.com - 2023</p>
                    </div>



                    <!-- add the about page here in the footer -->
                    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
                    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>

</html>