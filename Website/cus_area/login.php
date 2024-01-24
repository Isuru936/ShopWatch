<?php
session_start();
include 'db_conn.php';

$u_email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE email='$u_email' AND password='$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $_SESSION['u_email'] = $u_email; // Store the user's email in the session
    // $_SESSION['username'] = $username; //pass the username to the next page
    header("Location: ../index.html");
} else {
    header("Location: ../login.html");
}
?>