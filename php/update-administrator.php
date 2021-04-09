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
    $idNumber = stripslashes(trim($_POST['idNumber']));
    $DOB = stripslashes(trim($_POST['DOB']));
    $password = stripslashes(trim($_POST['password']));
    $flag = stripslashes(trim($_POST['status']));
    
    $encrypted_password = sha1($password);
    
    $query = "UPDATE administrators SET Title = '$title', Name = '$name', Surname = '$surname', Gender = '$gender', Race = '$race', PhoneNumber = '$phoneNumber', Email = '$email', IDNumber = '$idNumber', DateOfBirth = '$DOB', Password = '$encrypted_password', Flag = '$flag' " .
            "WHERE Email = '$email'";
    $result = mysqli_query($db_conn, $query);
    
    if (mysqli_affected_rows($db_conn) > 0)
    {
        $success = true;
        mysqli_free_result($result);
        header( 'Location: ../administrator-admin-page.php ' );
    }
    else 
    {
        header( 'Location: ../errors-administrator-page.php?error_value=Administrator' );
    }
    
    mysqli_close($db_conn);


?>