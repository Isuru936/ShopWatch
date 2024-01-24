<?php
include "db_conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Info</title>
    <link rel="stylesheet" href="../CSS/userInfo.css">
</head>

<body>
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="index.html"><img src="../images/logo.png" width="125px" alt=""></a>
                </div>
                <nav>
                    <ul>
                        <li><a href="../index.html">Home</a></li>
                        <li><a href="../products.php">Products</a></li>
                        <li><a href="../index.html#About-us">About Us</a></li>
                    </ul>
                </nav>
                <a href="../cart.php">
                    <ion-icon name="cart-outline"></ion-icon>
                </a>
                <a href="../login.html">
                    <ion-icon name="person-outline"></ion-icon>
                </a>
            </div>
            <hr>
        </div>
    </div>
    
    <!-- END of NAV BAR -->
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="" method="post">
                    <?php
                    session_start();
                    if (isset($_SESSION['u_email'])) {
                        $email = $_SESSION['u_email'];
                        $sql = "SELECT *  FROM users where email = '$email'";
                        $res = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($res) > 0) {
                            while ($dbData = mysqli_fetch_assoc($res)) {
                                $name = $dbData['name'];
                                $address = $dbData['address'];
                                $password = $dbData['password'];
                                $tel = $dbData['telephone']; ?>
                                <h2>User Details</h2>
                                <form method="post" action ="user_info.php">
                                    <div class="inputbox">
                                    <!-- <ion-icon name="people-outline"></ion-icon> -->
                                    <?php echo "<p>Username</p>" . $name ?>
                                </div>
                                <div class="inputbox">
                                    <!-- <ion-icon name="mail-outline"></ion-icon> -->
                                    <!-- <input type="email" id="txtemail" name=email required> -->
                                    <!-- <label for=""> -->
                                    <?php echo "<p>E-mail</p>" . $email ?>
                                    <!-- </label> -->
                                </div>
                                <div class="inputbox">
                                    <!-- <ion-icon name="mail-outline"></ion-icon> -->
                                    <input type="password" id="password" name="pass" value="<?php echo $password ?>" required>
                                    <label for="password"><p>Password</p>
                                    </label>
                                </div>
                                <div class="inputbox">
                                    <!-- <ion-icon name="mail-outline"></ion-icon> -->
                                    <input type="tel" id="tel" name=telephone 
                                    <?php if ($tel === "") { ?>
                                        value = "";
                                    <?php } else { ?>
                                        value= '<?php echo $tel ?>';
                                    <?php } ?>
                                    required>
                                    <label for="telephone">Telephone
                                    </label>
                                </div>
                                <div class="inputbox">
                                    <!-- <ion-icon name="lock-closed-outline"></ion-icon> -->
                                    <input type="text" id = address name = address <?php if ($address === "") { ?>
                                        placeholer='Enter the email'
                                    <?php } else { ?>
                                        value = '<?php echo $address; ?>'
                                    <?php } ?> 
                                    required>
                                    <label for=address>Address

                                    </label>
                                </div>
                                    <div class="register">
                                        <button name = update><p>Update<br></button> <a href="logout.php">Log Out</a></p>
                                    </div>
                                </form>
                            <?php }
                        }
                    } else {
                        header("Location:../login.html");
                    }
                    ?>
                </form>
            </div>
        </div>
    </section>
    <?php
    if (isset($_POST['update'])) {
        $pass = $_POST['pass'];
        $tel = $_POST['telephone'];
        $address = $_POST['address'];

        $sql = "UPDATE users SET password = '$pass', address = '$address', telephone = '$tel' WHERE email = '$email'";
        mysqli_query($conn,$sql)    ;
    }
    ?>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>