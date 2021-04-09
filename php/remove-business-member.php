<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    require_once 'connect.php';              
    
    $email = stripslashes(trim($_POST['email'])); 
    $company_name = stripslashes(trim($_POST['company']));
    $url = stripslashes(trim($_POST['website']));
    $industry = stripslashes(trim($_POST['industry']));
    
    $phone_number = stripslashes(trim($_POST['phoneNumber']));
    $city = stripslashes(trim($_POST['city']));
    $password = stripslashes(trim($_POST['password']));
    $tokenID = stripslashes(trim($_POST['tokenID']));
    $typeID = stripslashes(trim($_POST['typeID']));
    $flag = 'Archived';
    
    $encrypted_password = sha1($password);
    
    $query = "UPDATE members SET Email = '$email' , PhoneNumber = '$phone_number', City = '$city', Password = '$encrypted_password', TokenID = '$tokenID', TypeID = '$typeID', Flag = '$flag' "
        . "WHERE Email = '$email'" or trigger_error(mysqli_error($db_conn));
            
    $result = mysqli_query($db_conn, $query);
    
    if (mysqli_affected_rows($db_conn) > 0)
    {
        $success1 = true;
        mysqli_free_result($result);        
    } 
    
//    $query2 = "UPDATE business_members SET Email = '$email', CompanyName = '$company_name', WebsiteURL = '$url', Industry = '$industry' WHERE Email = '$email'" or trigger_error(mysqli_error($db_conn));
//    $result2 = mysqli_query($db_conn, $query2);
//    
//    if (mysqli_affected_rows($db_conn) > 0)
//    {
//        $success2 = true;
//        mysqli_free_result($result2);        
//    } 
    
    if ($success1)        
    {
        header( 'Location: ../administrator-members-page.php ' );
    }
    else 
    {
        header( 'Location: ../errors-administrator-page.php?error_value=Member' );
    }
    
    mysqli_close($db_conn);
?>
