 <!-- Purpose: Register a new user -->
<?php
session_start();
include 'db_conn.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$query = "INSERT INTO users (name, email, password) VALUES ('$username', '$email', '$password')";
$result = mysqli_query($conn, $query);

if ($result) {
    $_SESSION['u_email'] = $email;
    header("Location: ../index.html");
} else {
    header("Location: ../signUp.html");
    
    // echo $result + "<br>" +  $username + "<br>" +  $email + "<br>" +  $password;

}
?>