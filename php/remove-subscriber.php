<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    require_once 'connect.php';
    
    $name = stripslashes(trim($_POST['name']));
    $surname = stripslashes(trim($_POST['surname']));
    $email = stripslashes(trim($_POST['email']));
    $date_subscribed = stripslashes(trim($_POST['date_subscribed']));
    $date_unsubscribed = date("Y/m/d");
    $flag = 'Archived';
    
    $query = "UPDATE subscribers SET Name = '$name', Surname = '$surname', Email = '$email', DateSubscribed = '$date_subscribed', DateUnsubscribed = '$date_unsubscribed', Flag = '$flag' WHERE Email = '$email'" or trigger_error(mysqli_error($db_conn));
    $result = mysqli_query($db_conn, $query);
    
    if (mysqli_affected_rows($db_conn) > 0)
    {
        $success = true;
        mysqli_free_result($result);
        header('Location: ../administrator-subscribers-page.php');
    }
    else 
    {
        $success = false;
        mysqli_free_result($result);
        header( 'Location: ../errors-administrator-page.php?error_value=Subscriber' );
    }
    
    mysqli_close($db_conn);
?>
