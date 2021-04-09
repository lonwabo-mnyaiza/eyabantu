<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    
    $project_budget = trim($_POST['project_budget']);
    $project_timeline = trim($_POST['project_timeline']);
    
    if ($project_budget == 'Project Budget')
    {
        echo '<h4>Please choose the budget for the project on the previous page.</h4>';
        exit();
    }
    
    if ($project_timeline == 'Desired Start Date')
    {
        echo '<h4>Please choose the timeline for the project on the previous page.</h4>';
        exit();
    }  
    
    require_once('../includes/recaptchalib.php');
    $privatekey = "6Lc2GvkSAAAAAJYWgxN5422lcN0GZo1OLuDezJOY";
    $resp = recaptcha_check_answer ($privatekey,
                                  $_SERVER["REMOTE_ADDR"],
                                  $_POST["recaptcha_challenge_field"],
                                  $_POST["recaptcha_response_field"]);

    if (!$resp->is_valid) {
      // What happens when the CAPTCHA was entered incorrectly
        include '../request-services.php';
      die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
           "(reCAPTCHA said: " . $resp->error . ")");
    } else {
      // Your code here to handle a successful verification
        require_once 'connect.php';
        $name = stripslashes(trim($_POST['name']));
        $surname = stripslashes(trim($_POST['surname']));
        $company_name = stripslashes(trim($_POST['company_name']));
        $company_url = stripslashes(trim($_POST['company_url']));
        $email = stripslashes(trim($_POST['email']));
        $phone_number = stripslashes(trim($_POST['phone_number']));
        $current_date = date('Y-m-d');
        $project_details = stripslashes(trim($_POST['project_details']));
        $status = 'Current';
         
        $query = "INSERT INTO projects (Name, Surname, CompanyName, WebsiteURL, Email, PhoneNumber, Budget, ProjectTimeline, DateRequested, Description, Status)"
                . " VALUES ('$name', '$surname', '$company_name', '$company_url', '$email', '$phone_number', '$project_budget', '$project_timeline', '$current_date', '$project_details', '$status')" 
                or trigger_error(mysqli_error($db_conn));
        
        $result = mysqli_query($db_conn, $query) or trigger_error(mysqli_error($db_conn));
        if (mysqli_affected_rows($db_conn) > 0)
        {
            mysqli_close($db_conn);
            header("Location:http://localhost:8080/eyabantu/request-services.php");
            //$_SERVER['SCRIPT_URI'] = eyabantu/request-services.php;
            exit();
        }
        else 
        {
            echo '<h4>We are having trouble saving your request.<h4>';
        }
    }
  ?>
