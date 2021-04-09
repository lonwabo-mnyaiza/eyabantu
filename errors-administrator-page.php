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
    
    if (isset($_GET['error_value']))
    {
        $category = $_GET['error_value'];        
    }
    
    function loadUnsuccessfulAdministrator()
    {
        echo '<div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">';
          echo '<div class="featurette">';
            echo '<h2 class="page-header">Sorry your request to manipulate the administrators table could not be processed at this moment, try again after a moment if problem persists please inform DB administor.</h2>';                
          echo '</div>';
        echo '</div>';
    }
    
    function loadUnsuccessfulArticle()
    {
         echo '<div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">';
          echo '<div class="featurette">';
            echo '<h2 class="page-header">Sorry your request to manipulate the articles table could not be processed at this moment, try again after a moment if problem persists please inform DB administor.</h2>';                
          echo '</div>';
        echo '</div>';
    }
    
    function loadUnsuccessfulEvent()
    {
         echo '<div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">';
          echo '<div class="featurette">';
            echo '<h2 class="page-header">Sorry your request to manipulate the event table could not be processed at this moment, try again after a moment if problem persists please inform DB administor.</h2>';                
          echo '</div>';
        echo '</div>';
    }
    
    function loadUnsuccessfulMember()
    {
         echo '<div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">';
          echo '<div class="featurette">';
            echo '<h2 class="page-header">Sorry your request to manipulate the member table could not be processed at this moment, try again after a moment if problem persists please inform DB administor.</h2>';                
          echo '</div>';
        echo '</div>';
    }
    
    function loadUnsuccessfulProject()
    {
         echo '<div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">';
          echo '<div class="featurette">';
            echo '<h2 class="page-header">Sorry your request to manipulate the project table could not be processed at this moment, try again after a moment if problem persists please inform DB administor.</h2>';                
          echo '</div>';
        echo '</div>';
    }
    
    function loadUnsuccessfulSchedule()
    {
         echo '<div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">';
          echo '<div class="featurette">';
            echo '<h2 class="page-header">Sorry your request to manipulate the schedule table could not be processed at this moment, try again after a moment if problem persists please inform DB administor.</h2>';                
          echo '</div>';
        echo '</div>';
    }
    
    function loadUnsuccessfulService()
    {
         echo '<div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">';
          echo '<div class="featurette">';
            echo '<h2 class="page-header">Sorry your request to manipulate the service table could not be processed at this moment, try again after a moment if problem persists please inform DB administor.</h2>';                
          echo '</div>';
        echo '</div>';
    }
    
    function loadUnsuccessfulSubscriber()
    {
         echo '<div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">';
          echo '<div class="featurette">';
            echo '<h2 class="page-header">Sorry your request to manipulate the subscriber table could not be processed at this moment, try again after a moment if problem persists please inform DB administor.</h2>';                
          echo '</div>';
        echo '</div>';
    }
    
    function loadUnsuccessfulTechnician()
    {
         echo '<div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">';
          echo '<div class="featurette">';
            echo '<h2 class="page-header">Sorry your request to manipulate the technician table could not be processed at this moment, try again after a moment if problem persists please inform DB administor.</h2>';                
          echo '</div>';
        echo '</div>';
    }
    
    function loadUnsuccessfulSearch()
    {
        echo '<div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">';
          echo '<div class="featurette">';
            echo '<h2 class="page-header">No results found or your search could not be processed at this time, try again after a moment if problem persists please inform DB administor.</h2>';                
          echo '</div>';
        echo '</div>';
    }
    
    function loadUnsuccessfulMail()
    {
        echo '<div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">';
          echo '<div class="featurette">';
            echo '<h2 class="page-header">Sorry your request to send mail could not be processed at this moment, try again after a moment if problem persists please inform DB administor.</h2>';                
          echo '</div>';
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
            <li><a href="#">Help</a></li>
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
            <li><a href="#">Reports</a></li>
            <li><a href="https://www.google.com/analytics/web/#home/a53796954w86582926p89836863/" target="_blank">Analytics</a></li>       
          </ul>
        </div>
        <?php 
            if ($category == 'Administrator')
            { loadUnsuccessfulAdministrator(); }
            if ($category == 'Article')
            { loadUnsuccessfulArticle(); }
            if ($category == 'Event')
            { loadUnsuccessfulEvent(); }
            if ($category == 'Member')
            { loadUnsuccessfulMember(); }
            if ($category == 'Message')
            { loadUnsuccessfulMessage(); }
            if ($category == 'Project')
            { loadUnsuccessfulProject(); }
            if ($category == 'Schedule')
            { loadUnsuccessfulSchedule(); }
            if ($category == 'Service')
            { loadUnsuccessfulService(); }
            if ($category == 'Subscriber')
            { loadUnsuccessfulSubscriber(); }
            if ($category == 'Technician')
            { loadUnsuccessfulTechnician(); }
            if ($category == 'Search')
            { loadUnsuccessfulSearch(); }
            if ($category == 'Mail')
            { loadUnsuccessfulMail(); }
        ?>
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

