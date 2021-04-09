<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    require_once 'connect.php';
    
    if (!$db_conn)
    {
        header( 'Location: ../errors-administrator-page.php?error_value=Schedule' );
    }
    
    $no_week_days = 5;
    $query = 'DELETE FROM schedules';
    $result = mysqli_query($db_conn, $query);
    if (mysqli_affected_rows($db_conn) > 0)
    {
        $result = mysqli_free_result($result);
    }
    
    $query1 = 'SELECT COUNT * FROM technicians';
    $result = mysqli_query($db_conn, $query1);
    $no_technicians = mysqli_num_rows($result);
    
    $query2 = 'SELECT * FROM technicians';
    $technicians = mysqli_query($db_conn, $query2);
    
    if (mysqli_affected_rows($db_conn) > -1)
    {
        $technician_results = mysqli_fetch_array($technicians, MYSQLI_ASSOC);
        mysqli_free_result($technicians);
    }
    
//    $technician_email = array();
//    $technician_names = array();
//    foreach ($technician_results as $technician_result)
//    {
//        $technician_email[] = $technician_result['Email'];
//        $technician_names[] = $technician_result['Name'];
//    }
    
//    $query3 = 'SELECT Name FROM cities';
//    $cities = mysqli_query($db_conn, $query3);
//    
//    if (mysqli_affected_rows($db_conn) > 0)
//    {
//        $city_results = mysqli_fetch_all($cities, MYSQLI_ASSOC);
//        mysqli_free_result($cities);
//    }
//    
//    $city_names = array();
//    foreach ($city_results as $city_result)
//    {
//        $city_names[] = $city_result['Name'];
//    }
    
    $days_of_the_week = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');
    
    for ($i = 0; $i < $no_week_days; $i++)
    {
        // reset the auto incremented primary key..
        $query_reset = "ALTER TABLE schedules AUTO_INCREMENT = 1";
        $result_reset = mysqli_query($db_conn, $query_reset);
        $query = "SELECT CityID FROM cities WHERE Name = '".$technician_results['City']."'";
        $result = mysqli_query($db_conn, $query);
        $cityID = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $query = "INSERT INTO schedules (Day, CityID, City, TechnicianEmail, TechnicianName, Task) "
                . "VALUES ('$days_of_the_week[$i]', '".$cityID['CityID']."', '".$technician_results['City']."', '".$technician_results['Email']."', '".$technician_results['Name']."', '".$technician_results['Discipline']."')";
        $result = mysqli_query($db_conn, $query);
    }
    
//    for ($i = 0; $i < $no_week_days; $i++)
//    {
//        $query4 = "SELECT * FROM technicians WHERE Email = '$technician_email[$i]'";
//        $result4 = mysqli_query($db_conn, $query4);
//        
//        $technician_schedule = mysqli_fetch_array($result4, MYSQLI_ASSOC);
//        mysqli_free_result($result4);
//        
//        $technicianID = $technician_schedule['Email'];
//        $technician_city = $technician_schedule['City'];
//        $technician_name = $technician_schedule['Name'];
//        $technician_discipline = $technician_schedule['Discipline'];
//        for ($j = 0; $j < $no_technicians; $j++)
//        {
//            if ($city_names[$j] == 'Port Elizabeth')
//            {
//                $cityID = 2; 
//                $city_index = 1;
//                $query = "INSERT INTO schedules (Day, CityID, City, TechnicianID, TechnicianName, Task) "
//                    . "VALUES ('$days_of_the_week[$i]]', '$cityID', '$city_names[$city_index]', '$technicianID', '$technician_name', '$technician_discipline')";
//                $result = mysqli_query($db_conn, $query);
//                if (mysqli_affected_rows($db_conn) > 0)
//                {
//                    $success = true;
//                }
//            }            
//        }
//    }
    
    mysqli_close($db_conn);
    
    header('Location: ../administrator-schedules-page.php');
?>