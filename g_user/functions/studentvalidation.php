<?php 
include ('dbconnection.php');
session_start();
    $studentNumber = $_POST['studentNumber'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];


    $result = mysqli_query($conn, "SELECT * FROM r_student WHERE student_studNo = '$studentNumber'") 
            or die("Failed to query database".mysqli_error($conn));

    $row = mysqli_fetch_array($result);

    if ($_POST['studentNumber'] == ""){
        $_SESSION['failed'] = "Enter student number.";
        header('location: ../validation.php');
    }
    else if ($_POST['firstName'] == ""){
        $_SESSION['failed'] = "Enter your first name.";
        header('location: ../validation.php');
    }
    else if ($_POST['middleName'] == ""){
        $_SESSION['failed'] = "Enter your middle name.";
        header('location: ../validation.php');
    }
    else if ($_POST['lastName'] == ""){
        $_SESSION['failed'] = "Enter last name.";
        header('location: ../validation.php');
    }
    else if ($row['student_fName'] == $firstName && $row['student_mName'] == $middleName && $row['student_lName'] == $lastName){
        $_SESSION['studentNumber'] = $studentNumber;
        header('location: ../validation_2.php');
    }
    else{
        $_SESSION['failed'] = "Student does not exist!";
        header('location: ../validation.php');
    } 



?>