<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    $host = 'localhost';
    $user = 'administrator';
    $password = 'eyabantu_admin';
    $db_name = 'eyabantu';    
    
    $db_conn = mysqli_connect($host, $user, $password, $db_name);
    
    if (mysqli_connect_errno())
    {
        // can be redirected to the error page
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>
