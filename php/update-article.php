<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    require_once 'connect.php';
    
    $newsID = stripslashes(trim($_POST['uniqueID']));
    $title = stripslashes(trim($_POST['title']));
    $desc = stripslashes(trim($_POST['desc']));
    $url = stripslashes(trim($_POST['url']));
    
    $date_mod = date("Y/m/d");
    $flag = 'Active';
    
    $query = "UPDATE news SET Title = '$title' , Description = '$desc', DateModified = '$date_mod', URL = '$url', Flag = '$flag' "
        . "WHERE NewsID = '$newsID'";
            
    $result = mysqli_query($db_conn, $query);
    
    if (mysqli_affected_rows($db_conn) > 0)
    {
        $success = true;
        mysqli_free_result($result);
        header( 'Location: ../administrator-articles-page.php ' );
    } 
    else 
    {
        header( 'Location: ../errors-administrator-page.php?error_value=Article' );
    }
    
    mysqli_close($db_conn);
?>
