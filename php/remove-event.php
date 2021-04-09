<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    require_once 'connect.php';
    
    $eventID = stripslashes(trim($_POST['uniqueID'])); 
    $title = stripslashes(trim($_POST['title']));
    $desc = stripslashes(trim($_POST['desc']));
    $url = stripslashes(trim($_POST['URL']));
    $image_file = stripslashes(trim($_POST['imageFile']));
    
    $date_mod = date("Y/m/d");
    $flag = 'Archived';
    
    $query = "UPDATE events SET Title = '$title' , Description = '$desc', DateModified = '$date_mod', URL = '$url', ImageFile = '$image_file', Flag = '$flag' "
        . "WHERE EventID = '$eventID'";
            
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
