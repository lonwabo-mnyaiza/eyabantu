<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    session_start();
//    $to = stripslashes(trim($_POST['to']));
//    $subject = stripslashes(trim($_POST['subject']));
//    $body = stripslashes(trim($_POST['body']));
    $header = 'From: lonwabo.mnyaiza@gmail.com';
    
    $to = 'lonwabo.mnyaiza@gmail.com';
    $subject = 'Test';
    $body = 'Quick Test';
    
    //mail($to, $subject, $body, $header);
    if (mail($to, $subject, $body, $header))
    {
        header( 'Location: ../administrator-members-page.php' );
    }
    else 
    {
        header( 'Location: ../errors-administrator-page.php?error_value=Mail' );
    }
?>