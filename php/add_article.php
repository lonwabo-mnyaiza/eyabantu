<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    require_once 'connect.php';
    
    $title = stripslashes(trim($_POST['title']));
    $desc = stripslashes(trim($_POST['description']));
    $date_mod = date("Y-m-d");
    $url = stripslashes(trim($_POST['url']));
    $flag = "Active";
    
    $query = "INSERT INTO news (Title, Description, DateModified, URL, Flag)"
            . "VALUES ('$title', '$desc', '$date_mod', '$url', '$flag')";
    
    $result = mysqli_query($db_conn, $query);    
    
    if (mysqli_affected_rows($db_conn) > 0) 
    {       
       $success = true;          
       header( 'Location: ../administrator-articles-page.php ' );
       // include '../administrator-articles-page.php';
       // echo '<form action="../administrator-articles-page.php" method="post"></form>';
    } 
    
    mysqli_close($db_conn);
?>
