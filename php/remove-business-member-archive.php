<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    require_once 'connect.php';    
        
    $query = "SELECT Email FROM members WHERE TypeID = 1 AND Flag = 'Archived'";
    $result = mysqli_query($db_conn, $query);    
    
    if (mysqli_affected_rows($db_conn) > 0)
    {        
        $archived_results = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($archived_results as $archived_result)
        {
            $query = "DELETE FROM business_members WHERE Email = '".$archived_result['Email']."'" or trigger_error(mysqli_error($db_conn));            
            $result = mysqli_query($db_conn, $query) or trigger_error(mysqli_error($db_conn));
        }        
        $success2 = true;
    }
    else 
    {
        $success2 = false;
        mysqli_free_result($result); 
    }
     
    $query = "DELETE FROM members WHERE Flag = 'Archived'" or trigger_error(mysqli_error($db_conn));            
    $result = mysqli_query($db_conn, $query) or trigger_error(mysqli_error($db_conn));
    
    if (mysqli_affected_rows($db_conn) > 0)
    {
        $success1 = true;
        mysqli_free_result($result);        
    }
    else 
    {        
        $success1 = false;
        mysqli_free_result($result);        
    }
    
    if ($success1 && $success2)
    {
        header( 'Location: ../administrator-members-page.php' );
    }
    else 
    {
        header( 'Location: ../errors-administrator-page.php?error_value=Member' );
    }
    
    mysqli_close($db_conn);
?>