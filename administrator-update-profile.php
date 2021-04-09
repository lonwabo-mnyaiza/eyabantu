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
    
    require_once 'php/connect.php';
    
    $uniqueID = $_SESSION['email'];
        
    $query = "SELECT * FROM administrators WHERE Email = '$uniqueID'";
    $result = mysqli_query($db_conn, $query) or trigger_error(mysqli_error($db_conn));
    if (mysqli_affected_rows($db_conn) > 0)
    {
        $change_values = mysqli_fetch_array($result, MYSQL_NUM);                
        mysqli_free_result($result);
    }
    else 
    {
        $change_values = array(10);
        for ($i = 0; $i < 10; $i++)
        {
            $change_values[$i] = 'user not found';
        }
    }

    mysqli_close($db_conn);   
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
    <!--<link rel="stylesheet" href="css/bootstrap.css" type="text/css"/>
    <link rel="stylesheet" href="css/bootstrap-responsive.css" type="text/css"/>-->    
    <link rel="stylesheet" href="css/datetimepicker.css" type="text/css"/>
     <link rel="stylesheet" type="text/css" media="screen"
            href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">    

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
                    <a class="dropdown-toggle btn btn-linik" data-toggle="dropdown" data-target="#">
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
            <li><a href="administrator.php">Overview</a></li>
            <li class="active"><a href="administrator-admin-page.php">Administrators</a></li>
            <li><a href="administrator-articles-page.php">Articles</a></li>
            <li><a href="administrator-events-page.php">Events</a></li>
            <li><a href="administrator-members-page.php">Members</a></li>
            <li><a href="administrator-messages-page.php">Messages</a></li>
            <li><a href="administrator-projects-page.php">Projects</a></li>
            <li><a href="administrator-schedules-page.php">Schedules</a></li>
            <li><a href="administrator-services-page.php">Services</a></li>
            <li><a href="administrator-subscribers-page.php">Subscribers</a></li>
            <li><a href="administrator-technicians-page.php">Technicians</a></li>
            <li><a href="administrator-reports-page.php">Reports</a></li>
            <li><a href="https://www.google.com/analytics/web/#home/a53796954w86582926p89836863/" target="_blank">Analytics</a></li>
          </ul>
        </div>
          
        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">          
           <h1 class="page-header">Update Profile</h1>
            <div class="featurette">                
                <form action="php/update-administrator.php" method="post">
                    <table class="table table-responsive table-hover table-bordered">
                        <tr>
                            <td>Title</td>
                            <?php                             
                                if (substr($change_values[0],0,2) == 'Dr')
                                {
                                    echo '<td><select class="input_administrator_controls" name="title"><option selected="true">Dr</option><option>Mr</option><option>Mrs</option><option>Ms</option><option>Miss</option></select></td>';
                                }                                
                                else  if (substr($change_values[0],0,2) == 'Mr')
                                {
                                    echo '<td><select class="input_administrator_controls" name="title"><option>Dr</option><option selected="true">Mr</option><option>Mrs</option><option>Ms</option><option>Miss</option></select></td>';
                                }    
                                else  if (substr($change_values[0],0,3) == 'Mrs')
                                {
                                    echo '<td><select class="input_administrator_controls" name="title"><option>Dr</option><option>Mr</option><option selected="true">Mrs</option><option>Ms</option><option>Miss</option></select></td>';
                                }     
                                else  if (substr($change_values[0],0,2) == 'Ms')
                                {
                                    echo '<td><select class="input_administrator_controls" name="title"><option>Dr</option><option>Mr</option><option>Mrs</option><option selected="true">Ms</option><option>Miss</option></select></td>';
                                }    
                                else  if (substr($change_values[0],0,2) == 'Miss')
                                {
                                    echo '<td><select class="input_administrator_controls" name="title"><option>Dr</option><option>Mr</option><option>Mrs</option><option>Ms</option><option selected="true">Miss</option></select></td>';
                                }    
                            ?>                            
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td><input class="input_administrator_controls" name="name" type="text" value="<?php echo $change_values[1]; ?>"</td>
                        </tr>
                        <tr>
                            <td>Surname</td>
                            <td><input class="input_administrator_controls" name="surname" type="text" value="<?php echo $change_values[2]; ?>"</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <?php
                                if (substr($change_values[3], 0, 1) == 'M')
                                {
                                    echo '<td><select class="input_administrator_controls" name="gender"><option selected="true">M</option><option>F</option></select></td>';
                                }
                                else if (substr($change_values[3], 0, 1) == 'F')
                                {
                                    echo '<td><select class="input_administrator_controls" name="gender"><option>M</option><option selected="true">F</option></select></td>';
                                }                                
                            ?>
                        </tr>
                        <tr>
                            <td>Race</td>
                            <?php 
                                if (substr($change_values[4], 0, 6) == 'Asian')
                                {
                                    echo '<td><select class="input_administrator_controls" name="race"><option selected="true">Asian</option><option>Black</option><option>Coloured</option><option>Indian</option><option>White</option><option>Not Specified</option></select></td>';
                                }
                                else if (substr($change_values[4], 0, 6) == 'Black')
                                {
                                    echo '<td><select class="input_administrator_controls" name="race"><option>Asian</option><option selected="true">Black</option><option>Coloured</option><option>Indian</option><option>White</option><option>Not Specified</option></select></td>';
                                }
                                else if (substr($change_values[4], 0, 8) == 'Coloured')
                                {
                                    echo '<td><select class="input_administrator_controls" name="race"><option>Asian</option><option>Black</option><option selected="true">Coloured</option><option>Indian</option><option>White</option><option>Not Specified</option></select></td>';
                                }
                                else if (substr($change_values[4], 0, 6) == 'Indian')
                                {
                                    echo '<td><select class="input_administrator_controls" name="race"><option>Asian</option><option>Black</option><option>Coloured</option><option selected="true">Indian</option><option>White</option><option>Not Specified</option></select></td>';
                                }
                                else if (substr($change_values[4], 0, 6) == 'White')
                                {
                                    echo '<td><select class="input_administrator_controls" name="race"><option>Asian</option><option>Black</option><option>Coloured</option><option>Indian</option><option selected="true">White</option><option>Not Specified</option></select></td>';
                                }
                                else
                                {
                                    echo '<td><select class="input_administrator_controls" name="race"><option>Asian</option><option>Black</option><option>Coloured</option><option>Indian</option><option>White</option><option selected="true">Not Specified</option></select></td>';
                                }
                            ?>
                        </tr>
                        <tr>
                            <td>Phone Number</td>
                            <td><input class="input_administrator_controls" name="phoneNumber" type="text" value="<?php echo $change_values[5]; ?>"</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input class="input_administrator_controls" name="email" type="email" value="<?php echo $change_values[6]; ?>"</td>
                        </tr>
                         <tr>
                            <td>ID Number</td>
                            <td><input class="input_administrator_controls" name="idNumber" type="text" value="<?php echo $change_values[7]; ?>"</td>
                        </tr>
                        <tr>
                            <td>Date of Birth</td>
                            <td>
                               <input class="input_administrator_controls" type="date">    
                            </td>                
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input class="input_administrator_controls" name="password" type="password" value="<?php echo $change_values[9]; ?>"</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                                <?php
                                if (substr($change_values[11], 0, 6) == 'Active')
                                {
                                    echo '<td><select class="input_administrator_controls" name="status"><option selected="true">Active</option><option>De-active</option></select></td>';
                                }
                                else
                                {
                                    echo '<td><select class="input_administrator_controls" name="status"><option">Active</option><option selected="true>De-active</option></select></td>';
                                }
                                ?>                            
                        </tr>
                    </table>
                    <button type="submit" class="btn btn-default" formaction="administrator-admin-page.php" >Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
        </div>
      </div>
    </div>
    </div>        
  </body>
</html>

