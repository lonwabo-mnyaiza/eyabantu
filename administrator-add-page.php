<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    session_start();
    if (isset($_SESSION['user_name']) == false)
    {
         header('Location: ./errors-page.php');
    }
    
    if (isset($_GET['category']))
    {        
        $category = stripslashes(trim($_GET['category']));
    }
    
    function loadAdministrators()
    {
        global $uniqueID;        
        require 'php/connect.php';
        
        $query = "SELECT Title, Name, Surname, Gender, Race, PhoneNumber, Email FROM administrators WHERE Email = '$uniqueID'";
        $result = mysqli_query($db_conn, $query) or trigger_error(mysqli_error($db_conn));
        if (mysqli_affected_rows($db_conn) > 0)
        {
            $change_values = mysqli_fetch_array($result, MYSQL_NUM);                
            mysqli_free_result($result);
        }

        mysqli_close($db_conn);   
        
        echo '<h1 class="page-header">Add Administrator</h1>';
        echo  '<div class="featurette">';
        echo '<form action="php/add-administrator.php" method="post">';
        echo      '<table class="table table-responsive table-hover table-bordered">';
        echo '<tr>';
        echo    '<td>Title</td>';
        echo    '<td><select class="input_administrator_controls" name="title"><option>Dr</option><option selected="true">Mr</option><option>Mrs</option><option>Ms</option><option>Miss</option></select></td>';
        echo '</tr>';
        echo '<tr>';
        echo    '<td>Name</td>';
        echo    '<td><input class="input_administrator_controls" name="name" type="text" placeholder="Name*"></td>';
        echo '</tr>';
        echo '<tr>';
        echo    '<td>Surname</td>';
        echo    '<td><input class="input_administrator_controls" name="surname" type="text" placeholder="Surname*"></td>';
        echo '</tr>';
          echo '<tr>';
        echo    '<td>Gender</td>';
        echo    '<td><select class="input_administrator_controls" name="gender"><option selected="true">M</option><option>F</option></select></td>';
        echo '</tr>';
        echo '<tr>';
        echo    '<td>Race</td>';
        echo    '<td><select class="input_administrator_controls" name="race"><option>Asian</option><option>Black</option><option>Coloured</option><option>Indian</option><option>White</option><option selected="true">Not Specified</option></select></td>';
        echo '</tr>';
        echo '<tr>';
        echo    '<td>Phone Number</td>';
        echo    '<td><input class="input_administrator_controls" name="phoneNumber" type="text" placeholder="083 123 4567*"></td>';
        echo '</tr>';
        echo '<tr>';
        echo    '<td>Email</td>';
        echo    '<td><input class="input_administrator_controls" name="email" type="email" placeholder="email@mail.com*"></td>';
        echo '</tr>';
          echo '<tr>';
        echo    '<td>ID Number</td>';
        echo    '<td><input class="input_administrator_controls" name="idNumber" type="text" placeholder="ID*"></td>';
        echo '</tr>';
          echo '<tr>';
        echo    '<td>Date of Birth</td>';
        echo    '<td><input class="input_administrator_controls" name="DOB" type="date" placeholder="dd/mm/yyyy*"></td>';
        echo '</tr>';
        echo '</table>';
        echo        '<button type="submit" class="btn btn-default" formaction="administrator-admin-page.php" >Cancel</button>';
        echo        '<button name="change_article_submit" type="submit" class="btn btn-primary">Save</button>';
        echo '</form>';
        echo '</div>';
    } 
    
    function loadArticles()
    {    
        echo '<h1 class="page-header">Add Article</h1>';
        echo  '<div class="featurette">'; 
        echo    '<form action="php/add-article.php" method="post">';
        echo        '<table class="table table-responsive table-hover table-bordered">';
        echo             '<tr>';
        echo                  '<td>Title</td>';
        echo                  '<td><input class="input_administrator_controls" name="Title" type="text" placeholder="Title*"></td>';
        echo            '</tr>';
        echo            '<tr class="table_administrator_height">';
        echo                   '<td>Description</td>';
        echo                   '<td><textarea class="textarea_size_fixed" name="desc" placeholder="Description*" overflow="scroll"></textarea></td>';
        echo           '</tr>';        
        echo           '<tr>';
        echo                  '<td>URL</td>';
        echo                  '<td><input class="input_administrator_controls" name="url" type="text" placeholder="URL"></td>';
        echo          '</tr>';
        echo      '</table>';
        echo    '<button type="submit" class="btn btn-default" formaction="administrator-articles-page.php" >Cancel</button>';
        echo    '<button name="change_article_submit" type="submit" class="btn btn-primary">Save</button>';
        echo   '</form>';
        echo '</div>';  
    }
    
     function loadEvents()
    {    
        echo '<h1 class="page-header">Add Event</h1>';
        echo  '<div class="featurette">'; 
        echo    '<form action="php/add-event.php" method="post">';
        echo        '<table class="table table-responsive table-hover table-bordered">';
        echo             '<tr>';
        echo                  '<td>Title</td>';
        echo                  '<td><input class="input_administrator_controls" name="title" type="text" placeholder="Title*"></td>';
        echo            '</tr>';
        echo            '<tr class="table_administrator_height">';
        echo                   '<td>Description</td>';
        echo                   '<td><textarea class="textarea_size_fixed" name="desc" placeholder="Description*" overflow="scroll"></textarea></td>';
        echo            '</tr>';
        echo            '<tr>';
        echo                  '<td>URL</td>';
        echo                  '<td><input class="input_administrator_controls" name="url" type="text" placeholder="URL"></td>';
        echo          '</tr>';
        echo            '<tr>';
        echo                  '<td>Image File</td>';
        echo                  '<td><input class="input_administrator_controls" name="image_file" type="text" placeholder="File Location"></td>';
        echo          '</tr>';
        echo      '</table>';
        echo    '<button type="submit" class="btn btn-default" formaction="administrator-events-page.php" >Cancel</button>';
        echo    '<button name="change_article_submit" type="submit" class="btn btn-primary">Save</button>';
        echo   '</form>';
        echo '</div>';  
    }
    
    // not yet implemented..
    function loadProjects()
    {    
        echo '<h1 class="page-header">Add Project</h1>';
        echo  '<div class="featurette">'; 
        echo    '<form action="php/add-project.php" method="post">';
        echo        '<table class="table table-responsive table-hover table-bordered">';
        echo         '<tr>';
        echo                  '<td>Name</td>';
        echo                  '<td><input class="input_administrator_controls" type="text"></td>';
        echo                  '</tr>';
        echo            '<tr>';        
        echo             '<tr>';
        echo                  '<td>Surname</td>';
        echo                  '<td><input class="input_administrator_controls" type="text"></td>';
        echo                  '</tr>';
        echo            '<tr>';
        echo                   '<td>Company Name</td>';
        echo                   '<td><input class="input_administrator_controls" type="text"></td>';
        echo           '</tr>';
        echo           '<tr>';
        echo                  '<td>URL</td>';
        echo                  '<td><input class="input_administrator_controls" type="text"></td>';
        echo          '</tr>';
        echo         '<tr>';
        echo                  '<td>Email</td>';
        echo                  '<td><input class="input_administrator_controls" type="text"></td>';
        echo                  '</tr>';
        echo            '<tr>';        
        echo             '<tr>';
        echo                  '<td>Phone Number</td>';
        echo                  '<td><input class="input_administrator_controls" type="text"></td>';
        echo                  '</tr>';
        echo            '<tr>';
        echo                   '<td>Description</td>';
        echo                   '<td><input class="input_administrator_controls" type="text"></td>';
        echo           '</tr>';
        echo           '<tr>';
        echo                  '<td>URL</td>';
        echo                  '<td><input class="input_administrator_controls" type="text"></td>';
        echo          '</tr>';
        echo         '<tr>';
        echo                  '<td>Title</td>';
        echo                  '<td><input class="input_administrator_controls" type="text"></td>';
        echo                  '</tr>';
        echo            '<tr>';        
        echo             '<tr>';
        echo                  '<td>Title</td>';
        echo                  '<td><input class="input_administrator_controls" type="text"></td>';
        echo                  '</tr>';
        echo            '<tr>';
        echo                   '<td>Description</td>';
        echo                   '<td><input class="input_administrator_controls" type="text"></td>';
        echo           '</tr>';
        echo           '<tr>';
        echo                  '<td>URL</td>';
        echo                  '<td><input class="input_administrator_controls" type="text"></td>';
        echo          '</tr>';
        echo      '</table>';
        echo    '<button type="submit" class="btn btn-default" formaction="administrator-projects-page.php" >Cancel</button>';
        echo    '<button name="change_article_submit" type="submit" class="btn btn-primary">Save</button>';
        echo   '</form>';
        echo '</div>';  
    }
    
    function loadSchedules()    
    {    
        require 'php/connect.php';
        $query3 = 'SELECT Name FROM cities';
        $cities = mysqli_query($db_conn, $query3);

        if (mysqli_affected_rows($db_conn) > 0)
        {
            $city_results = mysqli_fetch_all($cities, MYSQLI_ASSOC);
            mysqli_free_result($cities);
        }
        
        $query = "SELECT Name FROM services WHERE Flag = 'Active'";
        $result = mysqli_query($db_conn, $query) or trigger_error(mysqli_error($db_conn));
        if (mysqli_affected_rows($db_conn) > 0)
        {            
            $project_names = mysqli_fetch_all($result, MYSQLI_ASSOC);            
            mysqli_free_result($result);
        }
        
        mysqli_close($db_conn);
        
        echo '<h1 class="page-header">Add Schedule</h1>';
        echo  '<div class="featurette">'; 
        echo    '<form action="php/add-schedule.php" method="post">';
        echo        '<table class="table table-responsive table-hover table-bordered">';
        echo             '<tr>';
        echo                  '<td>Day</td>';
        echo                  '<td><select class="input_administrator_controls" name="day"><option>Monday</option><option>Tuesday</option><option>Wednesday</option><option>Thursday</option><option>Friday</option></select></td>';
        echo            '</tr>';
        echo            '<tr>';
        echo                   '<td>City</td>';
        echo                   '<td><select class="input_administrator_controls" name="city">';
                                foreach ($city_results as $city_result) {
        echo                    '<option>'.$city_result['Name'].'</option>';
                                }
        echo                    '</select></td>';       
        echo            '</tr>';
        echo            '<tr>';
        echo                  '<td>Technician</td>';
        echo                  '<td><input class="input_administrator_controls" name="url" type="text" placeholder="Technician Name"></td>';
        echo            '</tr>';
        echo            '<tr>';
        echo                  '<td>Task</td>';
        echo                  '<td><select class="input_administrator_controls" name="task">';
                               echo '<option>Available</option>';
                               foreach ($project_names as $project_name)
                               {
                                   echo '<option>'.$project_name['Name'].'</option>';
                               }                               
        echo                  '</select></td>';  
        echo            '</tr>';
        echo      '</table>';
        echo    '<button type="submit" class="btn btn-default" formaction="administrator-schedules-page.php" >Cancel</button>';
        echo    '<button type="submit" class="btn btn-primary">Save</button>';
        echo   '</form>';
        echo '</div>';  
    }
    
    function loadServices()
    {
        global $uniqueID;        
        require 'php/connect.php';
        
        $query = "SELECT * FROM services WHERE ServiceID = '$uniqueID'";
        $result = mysqli_query($db_conn, $query) or trigger_error(mysqli_error($db_conn));
        if (mysqli_affected_rows($db_conn) > 0)
        {
            $change_values = mysqli_fetch_array($result, MYSQL_NUM);                
            mysqli_free_result($result);
        }

        mysqli_close($db_conn);   
        
        echo '<h1 class="page-header">Add Services</h1>';
        echo  '<div class="featurette">';
        echo '<form action="php/add-service.php" method="post">';
        echo      '<table class="table table-responsive table-hover table-bordered">';
        echo '<tr>';
        echo    '<td>Name</td>';
        echo    '<td><input class="input_administrator_controls" name="name" type="text" placeholder="Name*"></td>';
        echo '</tr>';
        echo '<tr class="table_administrator_height">';
        echo    '<td>Description</td>';
        echo    '<td><textarea class="textarea_size_fixed" name="desc" placeholder="Description*" overflow="scroll"></textarea></td>';
        echo '</tr>';  
        echo '<tr>';
        echo    '<td>Image File</td>';
        echo    '<td><input class="input_administrator_controls" name="image_file" type="text" placeholder="image file location"></td>';
        echo '</tr>'; 
        echo '<tr>';
        echo    '<td>Popup Heading</td>';
        echo    '<td><input class="input_administrator_controls" name="value" type="text" placeholder="popup heading"></td>';
        echo '</tr>'; 
        echo '</table>';
        echo        '<button type="submit" class="btn btn-default" formaction="administrator-services-page.php" >Cancel</button>';
        echo        '<button type="submit" class="btn btn-primary">Save</button>';
        echo '</form>';
        echo '</div>';
    } 
    
    function loadTechnicians()
    {
        global $uniqueID;        
        require 'php/connect.php';
        
        $query = 'SELECT Name FROM services';
        $result = mysqli_query($db_conn, $query) or trigger_error(mysqli_error($db_conn));
        if (mysqli_affected_rows($db_conn) > 0)
        {            
            $project_names = mysqli_fetch_all($result, MYSQLI_ASSOC);            
            mysqli_free_result($result);
        }
        
        $query = 'SELECT Name FROM cities';
        $result = mysqli_query($db_conn, $query);
        if (mysqli_affected_rows($db_conn) > 0)
        {
            $cities = mysqli_fetch_all($result, MYSQLI_ASSOC);
            mysqli_free_result($result);
        }

        mysqli_close($db_conn);   
        
        echo '<h1 class="page-header">Add Technician</h1>';
        echo  '<div class="featurette">';
        echo '<form action="php/add-technician.php" method="post">';
        echo      '<table class="table table-responsive table-hover table-bordered">';
        echo '<tr>';
        echo    '<td>Title</td>';
        echo    '<td><select class="input_administrator_controls" name="title"><option>Dr</option><option selected="true">Mr</option><option>Mrs</option><option>Ms</option><option>Miss</option></select></td>';
        echo '</tr>';
        echo '<tr>';
        echo    '<td>Name</td>';
        echo    '<td><input class="input_administrator_controls" name="name" type="text" placeholder="Name*"></td>';
        echo '</tr>';
        echo '<tr>';
        echo    '<td>Surname</td>';
        echo    '<td><input class="input_administrator_controls" name="surname" type="text" placeholder="Surname*"></td>';
        echo '</tr>';
          echo '<tr>';
        echo    '<td>Gender</td>';
        echo    '<td><select class="input_administrator_controls" name="gender"><option selected="true">M</option><option>F</option></select></td>';
        echo '</tr>';
        echo '<tr>';
        echo    '<td>Race</td>';
        echo    '<td><select class="input_administrator_controls" name="race"><option>Asian</option><option>Black</option><option>Coloured</option><option>Indian</option><option>White</option><option selected="true">Not Specified</option></select></td>';
        echo '</tr>';
        echo '<tr>';
        echo    '<td>Phone Number</td>';
        echo    '<td><input class="input_administrator_controls" name="phoneNumber" type="text" placeholder="083 123 4567*"></td>';
        echo '</tr>';
        echo '<tr>';
        echo    '<td>Email</td>';
        echo    '<td><input class="input_administrator_controls" name="email" type="email" placeholder="email@mail.com*"></td>';
        echo '</tr>';
         echo '<tr>';
        echo    '<td>City</td>';
        echo    '<td><select class="input_administrator_controls" name="city">';
        
        foreach ($cities as $city)
        {
            echo '<option>';
            echo $city['Name'];
            echo '</option>';
        }
        
        echo    '</select></td>';
        echo '</tr>';
          echo '<tr>';
        echo    '<td>ID Number</td>';
        echo    '<td><input class="input_administrator_controls" name="idNumber" type="text" placeholder="ID*"></td>';
        echo '</tr>';
          echo '<tr>';
        echo    '<td>Date of Birth</td>';
        echo    '<td><input class="input_administrator_controls" name="DOB" type="date" placeholder="dd/mm/yyyy*"></td>';
        echo '</tr>';
          echo '<tr>';
        echo    '<td>Discipline</td>';
        echo    '<td><select class="input_administrator_controls" name="discipline">';
//        echo    '<option>Project Management</option><option>Renewable Energy</option><option>Energy Efficiency</option><option>Design & Engineering</option>';
//        echo    '<option>Power System Studies</option><option>Commissioning & Testing</option><option>Thermography</option><option>Cable Fault Finding & Location</option>';
//        echo    '<option>Transformer Oil Testing</option><option>Substation And Plant Maintenance</option><option>Construction Management</option>';
//        echo    '<option>Surveying</option>';  
                 
        foreach ($project_names as $project_name)
        {
            echo '<option>';
            echo $project_name['Name'];
            echo '</option>';
        }  
        echo    '</select></td>';        
        echo '</tr>';
        echo '</table>';
        echo        '<button type="submit" class="btn btn-default" formaction="administrator-technicians-page.php" >Cancel</button>';
        echo        '<button name="change_article_submit" type="submit" class="btn btn-primary">Save</button>';
        echo '</form>';
        echo '</div>';
    }
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link href="css/style.css" rel="stylesheet">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="dashboard">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand"><?php echo $_SESSION['user_name']; ?></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">            
            <li class="dropdown" id="admin-profile">                    
                    <a class="dropdown-toggle btn btn-link" data-toggle="dropdown" data-target="#">
                             Profile
                            <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu" style="width: 250px">
                            <div class="container">                                
                                <p><label><?php echo $_SESSION['title'];?></label></p>
                                <p><label><?php echo $_SESSION['user_name'];?></label></p>
                                <p><label><?php echo $_SESSION['surname'];?></label></p>
                                <p><label><?php echo $_SESSION['gender'];?></label></p>
                                <p><label><?php echo $_SESSION['race'];?></label></p>
                                <p><label><?php echo $_SESSION['email'];?></label></p>
                                <a href="administrator-update-profile.php" class="btn btn-primary">Update Profile</a>
                              </div>                                
                            </div> 
                </li> 
                <li><a href="php/logout.php">Log out</a></li>
            <li><a href="administrator-help-page.php">Help</a></li>
          </ul>
          <form class="navbar-form navbar-right navbar-search" action="administrator-searched-results.php" method="get">
                <input id="admin-search" name="admin-search" type="text" class="search-query" autocomplete="off" placeholder="Search...">
          </form>               
        </div>
      </div>
    </div>      
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-2 col-md-1 sidebar">
          <ul class="nav nav-sidebar">
            <?php 
                if ($category == 'administrator')
                {
                    echo '<li><a href="administrator.php">Overview</a></li>';
                    echo '<li class="active"><a href="administrator-admin-page.php">Administrators</a></li>';
                    echo '<li><a href="administrator-articles-page.php">Articles</a></li>';
                    echo '<li><a href="administrator-events-page.php">Events</a></li>';
                    echo '<li><a href="administrator-members-page.php">Members</a></li>';
                    echo '<li><a href="administrator-messages-page.php">Messages</a></li>';
                    echo '<li><a href="administrator-projects-page.php">Projects</a></li>';
                    echo '<li><a href="administrator-schedules-page.php">Schedules</a></li>';
                    echo '<li><a href="administrator-services-page.php">Services</a></li>';
                    echo '<li><a href="administrator-subscribers-page.php">Subscribers</a></li>';
                    echo '<li><a href="administrator-technicians-page.php">Technicians</a></li>';
                    echo '<li><a href="administrator-reports-page.php">Reports</a></li>';
                    echo '<li><a href="https://www.google.com/analytics/web/#home/a53796954w86582926p89836863/" target="_blank">Analytics</a></li>';
                }
                else if ($category == 'article')
                {
                    echo '<li><a href="administrator.php">Overview</a></li>';
                    echo '<li><a href="administrator-admin-page.php">Administrators</a></li>';
                    echo '<li class="active"><a href="administrator-articles-page.php">Articles</a></li>';
                    echo '<li><a href="administrator-events-page.php">Events</a></li>';
                    echo '<li><a href="administrator-members-page.php">Members</a></li>';
                    echo '<li><a href="administrator-messages-page.php">Messages</a></li>';
                    echo '<li><a href="administrator-projects-page.php">Projects</a></li>';
                    echo '<li><a href="administrator-schedules-page.php">Schedules</a></li>';
                    echo '<li><a href="administrator-services-page.php">Services</a></li>';
                    echo '<li><a href="administrator-subscribers-page.php">Subscribers</a></li>';
                    echo '<li><a href="administrator-technicians-page.php">Technicians</a></li>';
                    echo '<li><a href="administrator-reports-page.php">Reports</a></li>';
                    echo '<li><a href="https://www.google.com/analytics/web/#home/a53796954w86582926p89836863/" target="_blank">Analytics</a></li>';
                }
                else if ($category == 'event')
                {
                    echo '<li><a href="administrator.php">Overview</a></li>';
                    echo '<li><a href="administrator-admin-page.php">Administrators</a></li>';
                    echo '<li><a href="administrator-articles-page.php">Articles</a></li>';
                    echo '<li class="active"><a href="administrator-events-page.php">Events</a></li>';
                    echo '<li><a href="administrator-members-page.php">Members</a></li>';
                    echo '<li><a href="administrator-messages-page.php">Messages</a></li>';
                    echo '<li><a href="administrator-projects-page.php">Projects</a></li>';
                    echo '<li><a href="administrator-schedules-page.php">Schedules</a></li>';
                    echo '<li><a href="administrator-services-page.php">Services</a></li>';
                    echo '<li><a href="administrator-subscribers-page.php">Subscribers</a></li>';
                    echo '<li><a href="administrator-technicians-page.php">Technicians</a></li>';
                    echo '<li><a href="#">Reports</a></li>';
                    echo '<li><a href="https://www.google.com/analytics/web/#home/a53796954w86582926p89836863/" target="_blank">Analytics</a></li>';
                }
                else if ($category == 'project')
                {
                    echo '<li><a href="administrator.php">Overview</a></li>';
                    echo '<li><a href="administrator-admin-page.php">Administrators</a></li>';
                    echo '<li><a href="administrator-articles-page.php">Articles</a></li>';
                    echo '<li><a href="administrator-events-page.php">Events</a></li>';
                    echo '<li><a href="administrator-members-page.php">Members</a></li>';
                    echo '<li><a href="administrator-messages-page.php">Messages</a></li>';
                    echo '<li class="active"><a href="administrator-projects-page.php">Projects</a></li>';
                    echo '<li><a href="administrator-schedules-page.php">Schedules</a></li>';
                    echo '<li><a href="administrator-services-page.php">Services</a></li>';
                    echo '<li><a href="administrator-subscribers-page.php">Subscribers</a></li>';
                    echo '<li><a href="administrator-technicians-page.php">Technicians</a></li>';
                    echo '<li><a href="administrator-reports-page.php">Reports</a></li>';
                    echo '<li><a href="https://www.google.com/analytics/web/#home/a53796954w86582926p89836863/" target="_blank">Analytics</a></li>';
                }
                 else if ($category == 'schedule')
                {
                    echo '<li><a href="administrator.php">Overview</a></li>';
                    echo '<li><a href="administrator-admin-page.php">Administrators</a></li>';
                    echo '<li><a href="administrator-articles-page.php">Articles</a></li>';
                    echo '<li><a href="administrator-events-page.php">Events</a></li>';
                    echo '<li><a href="administrator-members-page.php">Members</a></li>';
                    echo '<li><a href="administrator-messages-page.php">Messages</a></li>';
                    echo '<li><a href="administrator-projects-page.php">Projects</a></li>';
                    echo '<li class="active"><a href="administrator-schedules-page.php">Schedules</a></li>';
                    echo '<li><a href="administrator-services-page.php">Services</a></li>';
                    echo '<li><a href="administrator-subscribers-page.php">Subscribers</a></li>';
                    echo '<li><a href="administrator-technicians-page.php">Technicians</a></li>';
                    echo '<li><a href="administrator-reports-page.php">Reports</a></li>';
                    echo '<li><a href="https://www.google.com/analytics/web/#home/a53796954w86582926p89836863/" target="_blank">Analytics</a></li>';
                }
                else if ($category == 'service')
                {
                    echo '<li><a href="administrator.php">Overview</a></li>';
                    echo '<li><a href="administrator-admin-page.php">Administrators</a></li>';
                    echo '<li><a href="administrator-articles-page.php">Articles</a></li>';
                    echo '<li><a href="administrator-events-page.php">Events</a></li>';
                    echo '<li><a href="administrator-members-page.php">Members</a></li>';
                    echo '<li><a href="administrator-messages-page.php">Messages</a></li>';
                    echo '<li><a href="administrator-projects-page.php">Projects</a></li>';
                    echo '<li><a href="administrator-schedules-page.php">Schedules</a></li>';
                    echo '<li class="active"><a href="administrator-services-page.php">Services</a></li>';
                    echo '<li><a href="administrator-subscribers-page.php">Subscribers</a></li>';
                    echo '<li><a href="administrator-technicians-page.php">Technicians</a></li>';
                    echo '<li><a href="administrator-reports-page.php">Reports</a></li>';
                    echo '<li><a href="https://www.google.com/analytics/web/#home/a53796954w86582926p89836863/" target="_blank">Analytics</a></li>';
                }
                else if ($category == 'technician')
                {
                    echo '<li><a href="administrator.php">Overview</a></li>';
                    echo '<li><a href="administrator-admin-page.php">Administrators</a></li>';
                    echo '<li><a href="administrator-articles-page.php">Articles</a></li>';
                    echo '<li><a href="administrator-events-page.php">Events</a></li>';
                    echo '<li><a href="administrator-members-page.php">Members</a></li>';
                    echo '<li><a href="administrator-messages-page.php">Messages</a></li>';
                    echo '<li><a href="administrator-projects-page.php">Projects</a></li>';
                    echo '<li><a href="administrator-schedules-page.php">Schedules</a></li>';
                    echo '<li><a href="administrator-services-page.php">Services</a></li>';
                    echo '<li><a href="administrator-subscribers-page.php">Subscribers</a></li>';
                    echo '<li class="active"><a href="administrator-technicians-page.php">Technicians</a></li>';
                    echo '<li><a href="administrator-reports-page.php">Reports</a></li>';
                    echo '<li><a href="https://www.google.com/analytics/web/#home/a53796954w86582926p89836863/" target="_blank">Analytics</a></li>';
                }
            ?>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
              <?php 
              if ($category == 'administrator')
              {
                  loadAdministrators();
              }
              else if ($category == 'article')
                  { 
                      loadArticles();                         
                  }
                  else if ($category == 'event')
                  { 
                      loadEvents();
                  }
                  else if ($category == 'project')
                  {
                      loadProjects();
                  }
                  else if ($category == 'schedule')
                {
                      loadSchedules();
                }
                  else if ($category == 'service')
              {
                  loadServices();
              }
              else if ($category == 'technician')
                  {
                  loadTechnicians();
                  }
            ?>   
      </div>
    </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/holder.js"></script>     
    <script src="js/jquery.js"></script>
  </body>
</html>

