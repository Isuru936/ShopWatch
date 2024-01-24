<?php
session_start();

if (isset($_SESSION['u_email'])) {
    $email = $_SESSION['u_email'];
    echo $email;
    // Rest of your code
} else {
    echo "Session u_email not set. Check your authentication.";
}

?>