<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    require_once 'connect.php';
    $title = stripslashes(trim($_POST['title']));
    $name = stripslashes(trim($_POST['name']));
    $surname = stripslashes(trim($_POST['surname']));
    $gender = stripslashes(trim($_POST['gender']));
    $race = stripslashes(trim($_POST['race']));
    $phoneNumber = stripslashes(trim($_POST['phoneNumber']));
    $email = stripslashes(trim($_POST['email']));
    $city = stripslashes(trim($_POST['city']));;
    $idNumber = stripslashes(trim($_POST['idNumber']));
    $DOB = stripslashes(trim($_POST['DOB']));
    $discipline = stripslashes(trim($_POST['discipline']));;    
    $flag = 'Active';
    
    $query = "INSERT INTO technicians (Title, Name, Surname, Gender, Race, PhoneNumber, Email, City, IDNumber, DateOfBirth, Discipline, Flag) " . 
            "VALUES ('$title' , '$name', '$surname', '$gender', '$race', '$phoneNumber', '$email', '$city', '$idNumber', '$DOB', '$discipline', '$flag')";
    
    $result = mysqli_query($db_conn, $query);
    
    if (mysqli_affected_rows($db_conn) > 0)
    {
        $success = true;
        mysqli_free_result($result);
        header( 'Location: ../administrator-technicians-page.php ' );
    }
    else 
    {
        header( 'Location: ../errors-administrator-page.php?error_value=Technician' );
    }    
    
    mysqli_close($db_conn);
?>
