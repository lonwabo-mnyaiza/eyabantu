<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    require_once 'connect.php';
    
    if (!$db_conn)
    {
        header( 'Location: ../errors-administrator-page.php?error_value=Message' );
    }
    
    $query = "SELECT ContactID FROM contact WHERE Flag = 'Active'";
    $result = mysqli_query($db_conn, $query);
    $keys = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    $IDs = array(0);
    foreach ($keys as $key)
    {
        $IDs[] = $key['ContactID'];
    }
    
    for ($i = 1; $i < sizeof($IDs); $i++)
    {                  
        $date_mod = date("Y/m/d");
        $flag = 'Archived';

        $query = "UPDATE contact SET Flag = '$flag' WHERE ContactID = '$IDs[$i]'"; 
        $result = mysqli_query($db_conn, $query);
    }
    
//    for ($j = 1; $j < sizeof($IDs); $j++)
//    {
//        echo $IDs[$j];
//    }
    
    $success = true;
    mysqli_free_result($result);
    mysqli_close($db_conn);
    header( 'Location: ../administrator-messages-page.php ' );        
?>