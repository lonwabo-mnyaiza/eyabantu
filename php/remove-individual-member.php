<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    require_once 'connect.php';
    
    $email = stripslashes(trim($_POST['email'])); 
    $title = stripslashes(trim($_POST['title']));
    $name = stripslashes(trim($_POST['name']));
    $surname = stripslashes(trim($_POST['surname']));
    $gender = stripslashes(trim($_POST['gender']));
    $race = stripslashes(trim($_POST['race']));
    $DOB = stripslashes(trim($_POST['DOB']));
    
    $phone_number = stripslashes(trim($_POST['phoneNumber']));
    $city = stripslashes(trim($_POST['city']));
    $password = stripslashes(trim($_POST['password']));
    $tokenID = stripslashes(trim($_POST['tokenID']));
    $typeID = stripslashes(trim($_POST['typeID']));
    $flag = 'Archived';
    
    $encrypted_password = sha1($password);
    
    $query = "UPDATE members SET Email = '$email' , PhoneNumber = '$phone_number', City = '$city', Password = '$encrypted_password', TokenID = '$tokenID', TypeID = '$typeID', Flag = '$flag' "
        . "WHERE Email = '$email'";
            
    $result = mysqli_query($db_conn, $query);
    
    if (mysqli_affected_rows($db_conn) > 0)
    {
        $success1 = true;
        mysqli_free_result($result);        
    } 
    
//    $query2 = "UPDATE regular_members SET Email = '$email', Title = '$title', Name = '$name', Surname = 'surname', Gender = '$gender', Race = '$race', DateOfBirth = '$DOB' "
//            ."WHERE Email = '$email'";            
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
