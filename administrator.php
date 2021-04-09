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

try {    
    require_once 'php/connect.php';
    $query = 'SELECT * FROM administrators';
    $query1 = 'SELECT * FROM members';
    $query2 = 'SELECT * FROM services';
    $query3 = 'SELECT * FROM subscribers';
    $query4 = 'SELECT * FROM technicians';
    
    $result = mysqli_query($db_conn, $query);
    $result1 = mysqli_query($db_conn, $query1);
    $result2 = mysqli_query($db_conn, $query2);
    $result3 = mysqli_query($db_conn, $query3);
    $result4 = mysqli_query($db_conn, $query4);
    
    $no_of_administrators = mysqli_num_rows($result);
    $no_of_members = mysqli_num_rows($result1);
    $no_of_services = mysqli_num_rows($result2);
    $no_of_subscribers = mysqli_num_rows($result3);
    $no_of_technicians = mysqli_num_rows($result4);
    
    mysqli_close($db_conn);
}
catch (Exception $e)
{
    echo $e->getMessage();
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
            <li class="active"><a href="administrator.php">Overview</a></li>
            <li><a href="administrator-admin-page.php">Administrators</a></li>
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
          <h1 class="page-header">Dashboard</h1>
          <div class="featurette">        
            <h2 class="page-header">Today</h2>
            <p class="lead"> 
                <div id="time">
                    <script>
                        <span class="lead">startTime();</span>
                    </script>
                </div>
                <?php                    
                    echo date("l");
                    echo '<span style="padding-right: 8px;"></span>';
                    echo date("d/m/Y");                    
                ?>            
            </p>
          </div>
        </div>
      </div>
    </div>
      
      <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main" id="manage">
          <h1 class="page-header">Manage</h1>

          <h2 class="sub-header">Tables</h2>
          <div class="table-responsive">
            <table class="table table-responsive table-hover">
              <thead>
                <tr>
                  <th>Administrators</th>
                  <th>Members</th>
                  <th>Services</th>
                  <th>Subscribers</th>
                  <th>Technicians</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    echo '<tr>';
                    echo '<td>';
                    echo $no_of_administrators;
                    echo '</td>';
                    echo '<td>';
                    echo $no_of_members;
                    echo '</td>';
                    echo '<td>';
                    echo $no_of_services;
                    echo '</td>';
                    echo '<td>';
                    echo $no_of_subscribers;
                    echo '</td>';
                    echo '<td>';
                    echo $no_of_technicians;
                    echo '</td>';
                    echo '</tr>';
                ?>           
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div> 
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/holder.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script>
        var updateClock = function() {
    function pad(n) {
        return (n < 10) ? '0' + n : n;
    }

    var now = new Date();
    var s = pad(now.getUTCHours()) + ':' +
            pad(now.getUTCMinutes()) + ':' +
            pad(now.getUTCSeconds());

    $('#clock').html(s);

    var delay = 1000 - (now % 1000);
    setTimeout(updateClock, delay);
};
    </script>
    <script>
        function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}

function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    // add a zero in front of numbers<10
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('time').innerHTML = h + ":" + m + ":" + s;
    t = setTimeout(function () {
        startTime()
    }, 500);
}
startTime();
    </script>
  </body>
</html>

