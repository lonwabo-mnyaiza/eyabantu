<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    require_once 'connect.php';
    
    $contactID = stripslashes(trim($_POST['uniqueID']));
    $name = stripslashes(trim($_POST['name']));
    $email = stripslashes(trim($_POST['email']));
    $subject = stripslashes(trim($_POST['subject']));
    $message = stripslashes(trim($_POST['message']));
    $status = stripslashes(trim($_POST['status']));
    $flag = 'Archived';
    
    $query = "UPDATE contact SET Name = '$name', Email = '$email', Subject = '$subject', Message = '$message', Status = '$status', Flag = '$flag' WHERE ContactID = '$contactID'";
    $result = mysqli_query($db_conn, $query);
    
    if (mysqli_affected_rows($db_conn) > 0)
    {
        $success = true;
        mysqli_free_result($result);
        header('Location: ../administrator-messages-page.php');
    }
    else 
    {
        header( 'Location: ../errors-administrator-page.php?error_value=Message' );
    }
    
    mysqli_close($db_conn);
?>

