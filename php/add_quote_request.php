<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'connect.php';

    $name = trim($_POST['name']);
    $surname = trim($_POST['surname']);
    $company_name = trim($_POST['company_name']);
    $url = trim($_POST['url']);
    $email = trim($_POST['email']);
    $phone_number = trim($_POST['phone_number']);
    $budget = trim($_POST['budget']);
    $start_date = trim($_POST['start_date']);
    $description = trim($_POST['description']);
    $status = 'current';
    
    $sql = 'INSERT INTO projects (Name, Surname, CompanyName, WebsiteURL, Email, PhoneNumber, Budget, StartDate, EndDate, Description, Status) '
            . "VALUES ($name, $surname, $company_name, $url, $email, $phone_number, $budget, $start_date, '', $description, $status)";

?>