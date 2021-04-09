<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    require_once 'connect.php';
    
    if (isset($_POST['article_view_all_btn']))
    {
        $query = "SELECT * FROM news";
    }
    
    mysqli_close($db_conn);
?>
