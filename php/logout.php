<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    session_start();
    $_SESSION = array();
    session_destroy();
    $GLOBALS['username'] = null;
    $GLOBALS['password'] = null;
    header('Location: ../home.php'); 
?>