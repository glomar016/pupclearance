<?php 

include ('dbconnection.php');
session_start();

$username = $_POST['log_username'];
$password = $_POST['log_password'];

if($_POST['log_username'] == ""){
    $_SESSION['failed'] = "Enter your username.";
    header('location: ../login.php');
}
else if($_POST['log_password'] == ""){
    $_SESSION['failed'] = "Enter your password.";
    header('location: ../login.php');
}
else{
    $e_password = md5($password);

    $result = mysqli_query($conn, "SELECT * FROM r_user WHERE user_username = '$username' && user_password = '$e_password'") 
            or die("Failed to query database".mysqli_error($conn));

    $row = mysqli_fetch_array($result);

    if ($row['user_username'] == $username && $row['user_password'] == $e_password){
        header('location: ../../index.html');
    }
    else{
        $_SESSION['failed'] = "Your password is incorrect";
        header('location: ../login.php');
    }
}