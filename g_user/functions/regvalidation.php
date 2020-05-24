<?php

include ('dbconnection.php');
session_start();

$reg_username = $_POST['reg_username'];
$reg_password = $_POST['reg_password'];
$reg_password2 = $_POST['reg_password2'];
$reg_email = $_POST['reg_email'];


if ($_POST['reg_username'] == ""){
    $_SESSION['failed'] = "Enter username.";
    header('location: ../register.php');
}
else if ($_POST['reg_password'] == ""){
    $_SESSION['failed'] = "Enter password.";
    header('location: ../register.php');
}
else if ($_POST['reg_password2'] == ""){
    $_SESSION['failed'] = "Enter password.";
    header('location: ../register.php');
}
else if ($_POST['reg_email'] == ""){
    $_SESSION['failed'] = "Enter email.";
    header('location: ../register.php');
}

else if($reg_password != $reg_password2){
    $_SESSION['failed'] = "Password do not match.";
    header('location: ../register.php');
}

else{
    if($reg_password == $reg_password2){
    $password = md5($reg_password);
    $sql = "INSERT INTO r_user (user_username, user_password, user_email) 
            VALUES ('$reg_username', '$password', '$reg_email')";
    mysqli_query($conn, $sql);
    header('location: ../login.php');
    }
    else{
        echo "error";
    }
}

