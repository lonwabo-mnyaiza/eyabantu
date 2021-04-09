<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'connect.php';
    
    $serviceID = stripslashes(trim($_POST['uniqueID']));
    $name = stripslashes(trim($_POST['name']));
    $desc = stripslashes(trim($_POST['desc']));
    $image_file = stripslashes(trim($_POST['image_file']));
    $value = stripslashes(trim($_POST['value']));    
    
    $query = "UPDATE services SET Name = '$name', Description = '$desc', ImageFile = '$image_file', Value = '$value' "
            . "WHERE ServiceID = '$serviceID'"; 
    
    $result = mysqli_query($db_conn, $query);
    
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
