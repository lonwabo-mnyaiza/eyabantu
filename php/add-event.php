<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    require_once 'connect.php';
    
    $title = stripslashes(trim($_POST['title']));
    $desc = stripslashes(trim($_POST['desc']));
    $url = stripslashes(trim($_POST['url']));
    $image_file = stripslashes(trim($_POST['image_file']));
    
    $date_mod = date("Y/m/d");
    $flag = 'Active';
    
    $query = "INSERT INTO events (Title, Description, DateModified, URL, ImageFile, Flag) " . 
            "VALUES ('$title', '$desc', '$date_mod', '$url', '$image_file', '$flag')";
    $result = mysqli_query($db_conn, $query);
    
    if (mysqli_affected_rows($db_conn) > 0)
    {
        $success = true;
        mysqli_free_result($result);
        header( 'Location: ../administrator-events-page.php ' );
    }  
    else 
    {
        header( 'Location: ../errors-administrator-page.php?error_value=Event' );
    }
    
    mysqli_close($db_conn);    
?>