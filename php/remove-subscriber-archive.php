<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    require_once 'connect.php';
    
    $query = "DELETE FROM subscribers WHERE Flag = 'Archived'";
    $result = mysqli_query($db_conn, $query);
    
    if (mysqli_affected_rows($db_conn) > 0)
    {
        $success = true;
        mysqli_free_result($result);
        header('Location: ../administrator-subscribers-page.php');
    }
    else
    {
        $success = false;
        mysqli_free_result($result);
        header( 'Location: ../errors-administrator-page.php?error_value=Subscriber' );
    }
    
    mysqli_close($db_conn);
?>
