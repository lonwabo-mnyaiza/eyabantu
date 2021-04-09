<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//$missing = array();
//if (isset($_POST['add_customer']))
//{
//    // ? is used as a placeholder...
//    $required = array('?', '?', '?', '?');
//    // ? should be the registration page...
//    require ('?');   
//    
//    if (!$missing)
//    {
//        require_once ('connection.inc.php');
//        $OK = false;
//        $db_conn = dbConnect();
//        $stmt = $db_conn->stmt_init();
//        $sql = 'INSERT INTO customers (?,?,?,?) VALUES (?,?,?,?)';
//        if ($stmt->prepare($sql))
//        {
//            // ? is used as a placeholder
//            $stmt->bind_param('issddd', $_POST['?'], $_POST['?'],
//                     $_POST['?'], $_POST['?']);
//            $stmt->execute();
//            if ($stmt->affected_rows > 0)
//            {
//                $OK = true;
//            }                    
//        }    
//    }
//    if ($OK)
//    {
//        // redirect to the appropriate page...
//        header('Location:http://localhost/?');
//        exit;
//    }
//    else 
//    {
//        $error = $stmt->error;
//    }
//}
?>
