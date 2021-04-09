<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    require_once 'connect.php';
    
    $name = stripslashes(trim($_POST['name']));
    $desc = stripslashes(trim($_POST['desc']));
    $image_file = stripslashes(trim($_POST['image_file']));
    $value = stripslashes(trim($_POST['value']));
    $flag = 'Active';
    
    $query = "INSERT INTO services (Name, Description, ImageFile, Value, Flag) "
        . "VALUES ('$name', '$desc', '$image_file', '$value', '$flag')";
    
    if (mysqli_affected_rows($db_conn) > 0)
    {
        $success = true;
        mysqli_free_result($result);
        header('Location: ../administrator-services-page.php');
    }
    else 
    {
        header( 'Location: ../errors-administrator-page.php?error_value=Service' );
    }
    
    mysqli_close($db_conn);
?>
