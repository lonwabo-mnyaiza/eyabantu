<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    require_once 'connect.php';
    
    if (!$db_conn)
    {
        header( 'Location: ../errors-administrator-page.php?error_value=Member' );
    }
    
    $query = "SELECT Email FROM members WHERE TypeID = 2 AND Flag = 'Active'";
    $result = mysqli_query($db_conn, $query);
    $keys = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    $IDs = array(0);
    foreach ($keys as $key)
    {
        $IDs[] = $key['Email'];
    }
    
    for ($i = 1; $i < sizeof($IDs); $i++)
    {                         
        $flag = 'Archived';

        $query = "UPDATE members SET Flag = '$flag' WHERE Email = '$IDs[$i]'"; 
        $result = mysqli_query($db_conn, $query);
    }
    
    $success = true;
    mysqli_free_result($result);
    mysqli_close($db_conn);
    header( 'Location: ../administrator-members-page.php ' );        
?>