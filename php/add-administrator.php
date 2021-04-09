<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    require_once 'connect.php';
    $title = stripslashes(trim($_POST['title']));
    $name = stripslashes(trim($_POST['name']));
    $surname = stripslashes(trim($_POST['surname']));
    $gender = stripslashes(trim($_POST['gender']));
    $race = stripslashes(trim($_POST['race']));
    $phoneNumber = stripslashes(trim($_POST['phoneNumber']));
    $email = stripslashes(trim($_POST['email']));
    $idNumber = stripslashes(trim($_POST['idNumber']));
    $DOB = stripslashes(trim($_POST['DOB']));
    
    $password = 'password';
    $encrypted_password = sha1($password);
    $flag = 'Active';
    
    $query = "INSERT INTO administrators (Title, Name, Surname, Gender, Race, PhoneNumber, Email, IDNumber, DateOfBirth, Password, Flag) " . 
            "VALUES ('$title' , '$name', '$surname', '$gender', '$race', '$phoneNumber', '$email', '$idNumber', '$DOB', '$encrypted_password', '$flag')";
    
    $result = mysqli_query($db_conn, $query);
    
    if (mysqli_affected_rows($db_conn) > 0)
    {
        $success = true;
        mysqli_free_result($result);
        header( 'Location: ../administrator-admin-page.php ' );
    }
    else 
    {
        header( 'Location: ../errors-administrator-page.php?error_value=Administrator' );
    }
    
    mysqli_close($db_conn);
    
//    function isValidCellNumber($phone_number)
//    {
//    
//            $cell_prefix = array("084", "083", "082", "081", "079", "078", "076", "074", "073", "072", "041" );
//            $bool isValid = false;
//            if (count($phone_number) == 10)
//            {
//                for ($i = 0; $i < cellPrefix; $i++)
//                {
//                    if (contactNumber.Substring(0, 3) == cellPrefix[i])
//                    {
//                        isValid = true;
//                    }
//                }
//            }
//            return isValid;
//        }
    }
?>
