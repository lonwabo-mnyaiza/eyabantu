<?php 
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    $lifetime = 60 * 60 * 6 * 1; // 6 hours...
    session_set_cookie_params($lifetime, '/');      
    session_start();      
    //session_register('administrator_user_name');
    require_once 'connect.php';

    // stripslashes helps prevent scripts on the website.
    $username = stripslashes(trim(mysqli_real_escape_string($db_conn, $_POST['username'])));
    $password = stripslashes(trim($_POST['password']));

    $encrypted_password = sha1($password);
    
    $_SESSION['user_id'] = $username;
    $_SESSION['user_password'] = $encrypted_password;

    $query = "SELECT Title, Name, Surname, Gender, Race, Email FROM administrators WHERE Flag = 'Active' AND Email = '".$_SESSION['user_id']."' AND Password = '".$_SESSION['user_password']."'";
    $result = mysqli_query($db_conn, $query) or trigger_error(mysqli_error($db_conn));

    if (mysqli_affected_rows($db_conn) == 1)
    {
        $row = mysqli_fetch_array($result, MYSQL_NUM);
        mysqli_free_result($result);
        $_SESSION['title'] = $row[0];
        $_SESSION['user_name'] = $row[1];
        $_SESSION['surname'] = $row[2];
        $_SESSION['gender'] = $row[3];
        $_SESSION['race'] = $row[4];
        $_SESSION['email'] = $row[5];

        $min = 10000;
        $max = 9999999;
        $tokenID = rand($min, $max);
        $query2 = "UPDATE administrators SET TokenID = $tokenID WHERE email = '$_SESSION[email]'";
        $result2 = mysqli_query($db_conn, $query2);
        $_SESSION['tokenID'] = $tokenID;

        session_regenerate_id();
        mysqli_close($db_conn);        
        $logged_in = true;
        header('Location: ../administrator.php');
        die;
    }
    
    $query = "SELECT TypeID FROM members WHERE Email = '".$_SESSION['user_id']."' AND Password = '".$_SESSION['user_password']."'";
    $result = mysqli_query($db_conn, $query);        
    
    if (mysqli_affected_rows($db_conn) == 1)
    {
        $row = mysqli_fetch_array($result, MYSQL_NUM);
        mysqli_free_result($result);
        
        if ($row[0] == 1)
        {
            $query = "SELECT members.Email, PhoneNumber, City, Password, TokenID, TypeID, Flag, CompanyName, WebsiteURL, Industry FROM members, business_members WHERE members.Email = '".$_SESSION['user_id']."' AND business_members.Email = '".$_SESSION['user_id']."'";
            $result = mysqli_query($db_conn, $query);
            
            $companies_info = mysqli_fetch_assoc($result);
            
            $_SESSION['phone_number'] = $companies_info['PhoneNumber'];
            $_SESSION['city'] = $companies_info['City'];
            $_SESSION['company_name'] = $companies_info['CompanyName'];
            $_SESSION['website'] = $companies_info['WebsiteURL'];
            $_SESSION['industry'] = $companies_info['Industry'];
            $_SESSION['email'] = $companies_info['Email'];

            $min = 10000;
            $max = 9999999;
            $tokenID = rand($min, $max);
            $query2 = "UPDATE members SET TokenID = $tokenID WHERE email = '$_SESSION[email]'";
            $result2 = mysqli_query($db_conn, $query2);
            $_SESSION['tokenID'] = $tokenID;

            session_regenerate_id();
            mysqli_close($db_conn);        
            $logged_in = true;
            header('Location: ../member-home.php');
            die;
        }
        else if ($row[0] == 2)
        {
            $query = "SELECT members.Email, PhoneNumber, City, Password, TokenID, TypeID, Flag, Title, Name, Surname, Gender, Race, DateOfBirth FROM members, regular_members WHERE members.Email = '".$_SESSION['user_id']."' AND regular_members.Email = '".$_SESSION['user_id']."'";
            $result = mysqli_query($db_conn, $query);
            
            $members_info = mysqli_fetch_assoc($result);
            
            $_SESSION['title'] = $members_info['Title'];
            $_SESSION['user_name'] = $members_info['Name'];
            $_SESSION['surname'] = $members_info['Surname'];
            $_SESSION['gender'] = $members_info['Gender'];
            $_SESSION['race'] = $members_info['Race'];
            $_SESSION['email'] = $members_info['Email'];

            $min = 10000;
            $max = 9999999;
            $tokenID = rand($min, $max);
            $query2 = "UPDATE members SET TokenID = $tokenID WHERE email = '$_SESSION[email]'";
            $result2 = mysqli_query($db_conn, $query2);
            $_SESSION['tokenID'] = $tokenID;

            session_regenerate_id();
            mysqli_close($db_conn);        
            $logged_in = true;
            header('Location: ../member-home.php');
            die;
        }
    }    
    header('Location: ../errors-public-page.php?error_value=Invalid User');
?>
