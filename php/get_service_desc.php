<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    require 'php/connect.php';
    $query = 'SELECT Name, Description, Value FROM services';
    $result = mysqli_query($db_conn, $query);

    if (mysqli_affected_rows($db_conn) > 0)
    {
        $services = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
    }        
    mysqli_close($db_conn);
    
    