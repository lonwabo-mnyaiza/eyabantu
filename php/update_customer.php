<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'connection.inc.php';

//$OK = false;
//$done = false;
//
//$db_conn = dbConnect();
//
//$stmt = $db_conn->stmt_init();
//
//if (isset($_GET['?']) && !$_POST)
//{
//    $sql = 'SELECT ?,?,?,? FROM customers WHERE id = ?';
//    
//    if ($stmt->prepare($sql))
//    {
//        $stmt->bind_param('i', $_GET['id']);
//        $stmt->bind_result('?', '?', '?', '?');
//        $OK = true;
//        $stmt->fetch();
//    }
//}
//
//if (isset($_POST['update_customer']))
//{
//    $sql = 'UPDATE customers SET ?,?,? WHERE id=?';
//    
//    if ($stmt->prepare($sql))
//    {
//        $stmt->bind_param('issddd', $_POST['?'], $_POST['?'],
//                     $_POST['?'], $_POST['?']);
//        $done = $stmt->execute();
//    }
//}
//
//// remember to replace every instance of id with more descriptive id.
//if ($done || !isset($_GET['id']))
//{
//    // redirect to the appropriate page...
//    header('Location:http://localhost/?');
//    exit;
//}
//
//if (isset($stmt) && !$OK && !$done)
//{
//    $error = $stmt->error;
//}

?>

