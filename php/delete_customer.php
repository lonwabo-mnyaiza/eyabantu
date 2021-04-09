<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//require_once 'connection.inc.php';
//$db_conn = dbConnect();
//
//$OK = false;
//$deleted = false;
//
//$stmt = $db_conn->stmt_init();
//
//if (isset($_GET['id']) && !$_POST)
//{
//    $sql = 'SELECT ?, ?, ?, ? FROM customers WHERE id = ?';
//    
//    if ($stmt->prepare($sql))
//    {
//        $stmt->bind_param('i', $_GET['id']);
//        
//        $stmt->bind_result(?, ?, ?, ?);
//        $OK = $stmt->execute();
//        $stmt->fetch();
//    }
//}
//
//if (isset($_POST['delete']))
//{
//    $sql = 'DELETE FROM customers WHERE id = ?';
//    
//    if ($stmt->prepare($sql))
//    {
//        $stmt->bind_param('i', $_POST['id']);
//        $stmt->execute();
//        if ($stmt->affected_rows > 0)
//        {
//            $deleted = true;
//        }
//        else
//        {
//            $error = 'There was a problem deleting the record.';
//        }
//    }    
//}
//
//if ($deleted || isset($_POST['delete']) || !isset($_GET['id']))
//{
//    // redirect to the appropriate page...
//    header('Location:http://localhost/?');
//    exit;
//}
//
//if (isset($stmt) && !OK && !$deleted)
//{
//    $error = $stmt->error;
//}
?>

