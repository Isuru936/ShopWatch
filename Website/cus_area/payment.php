<?php
include "db_conn.php"

    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment</title>
    <link rel="stylesheet" href="../CSS/payment.css">
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION['u_email'])) {
        $email = $_SESSION['u_email'];
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $results = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($results);
        $address = $data['address'];
        $tele = $data['telephone']; ?>
    
        <section>
            <div class="form-box">
                <div class="form-value">
                    <form action="paymentLogic.php" method="post">
                        <h1>Confirm the Details</h1>
                        <div class="inputbox">
                            <ion-icon name="mail-outline"></ion-icon>
                            <input type="text" id="txtAddress" name="address" value="<?php echo $address ?>" required>
                            <label for="">Address</label>
                        </div>
                        <div class="inputbox">
                        <ion-icon name="call"></ion-icon>
                        <input type="tele" id="tele" name="tele" value="<?php echo $tele ?>" required>
                        <label for="">Telephone</label>
                        </div>
                        <h2>Select payment method</h2><br>
                        <input type="radio" id="paypal" name="payment_method" value="paypal" required>
                        <label for="paypal"><ion-icon name="card"></ion-icon>   PayPal</label><br>
                        <input type="radio" id="cod" name="payment_method" value="cash_on_delivery" required>
                        <label for="cod"><ion-icon name="wallet"></ion-icon>  Cash on Delivery</label><br><br>
                        <button type="submit">Proceed to Payment</button>
                    </form>
                </div>
            </div>
        </section>
<?php } ?>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>

</html>