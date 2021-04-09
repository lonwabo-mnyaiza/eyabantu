<?php
    session_start();
    if (isset($_SESSION['user_name']) == false && isset($_SESSION['company_name']) == false)
    {
         header('Location: ./errors-page.php');
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

    <title>member help</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/offcanvas.css" rel="stylesheet">    

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <?php
                if (isset($_SESSION['user_name']))
                {
                    echo '<a class="navbar-brand" href="member-home.php">'.$_SESSION['user_name'].'</a>';
                }
                else if (isset($_SESSION['company_name']))
                {
                    echo '<a class="navbar-brand" href="member-home.php">'.$_SESSION['company_name'].'</a>';
                }
            ?>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
              <li><a href="member-home.php">Home</a></li>
            <li><a href="member-projects.php">Projects</a></li>
            <li class="dropdown" id="services">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                         Services<span class="caret"></span>
                     </a>
                     <ul class="dropdown-menu">
                         <li><a href="member-services.php">Services</a></li>
                         <li><a href="member-service-details.php">Service Details</a></li>
                         <li><a href="member-service-request.php">Service Quote</a></li>
                     </ul>
                 </li>
            <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">News <span class="caret"></span></a>
                     <ul class="dropdown-menu">
                         <li><a href="member-news.php">Articles</a></li>
                         <li><a href="member-events.php">Events</a></li>
                     </ul>
                 </li>
            <li class="dropdown" id="member-profile">                    
                    <a class="dropdown-toggle btn btn-link" data-toggle="dropdown" data-target="#">
                             Profile
                            <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu" style="width: 250px">
                            <div class="container">                                                                
                                <?php 
                                    if (isset($_SESSION['user_name']))
                                    {
                                        echo '<p><label>'.$_SESSION['title'].'</label></p>';
                                        echo '<p><label>'.$_SESSION['user_name'].'</label></p>';
                                        echo '<p><label>'.$_SESSION['surname'].'</label></p>';
                                        echo '<p><label>'.$_SESSION['gender'].'</label></p>';
                                        echo '<p><label>'.$_SESSION['race'].'</label></p>';
                                        echo '<p><label>'.$_SESSION['email'].'</label></p>';
                                    }
                                    else if (isset($_SESSION['company_name']))
                                    {
                                        echo '<p><label>'.$_SESSION['company_name'].'</label></p>';
                                        echo '<p><label>'.$_SESSION['website'].'</label></p>';
                                        echo '<p><label>'.$_SESSION['industry'].'</label></p>';
                                        echo '<p><label>'.$_SESSION['phone_number'].'</label></p>';
                                        echo '<p><label>'.$_SESSION['city'].'</label></p>';
                                        echo '<p><label>'.$_SESSION['email'].'</label></p>';
                                    }
                                ?>
                                <a href="member-update-profile.php" class="btn btn-primary">Update Profile</a>
                              </div>                                
                            </div> 
                </li> 
            <li><a href="php/logout.php">Log out</a></li>
            <li class="active"><a href="member-help.php">Help</a></li>
            <li>
                <form style="padding-left:45%; padding-top: 5%;" class="navbar-search" action="member-searched-results.php" id="member-searchform" method="get">
                    <input type="text" class="search-query" id="search" name="search" placeholder="search..." autocomplete="off"/>
                </form>
            </li>
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </div><!-- /.navbar -->

    <div class="container">
    <div class="container marketing">

        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <div class="jumbotron">
             <h1>Help</h1>
              <p class="lead">
                  ...
              </p>
          </div>
           <div class="row">
            <div class="col-6 col-sm-6 col-lg-4">
                <img src="img/Screenshots/user website home.png" width="800px" height="500px"  alt="home image" />
                <img src="img/Screenshots/user website projects.png" width="800px" height="500px" alt="project image" />
                <img src="img/Screenshots/user website services.png" width="800px" height="500px" alt="service image" />
                <img src="img/Screenshots/user website news.png" width="800px" height="500px" alt="news image" />
                <img src="img/Screenshots/user website profile.png" width="800px" height="500px" alt="profile image" />
                <img src="img/Screenshots/user website logout.png" width="800px" height="500px" alt="logout image" />
                <img src="img/Screenshots/user website help.png" width="800px" height="500px" alt="help image" />
                Once the user has successfully registered themselves, they can then log in. The user has seven tabs namely Home, Projects, Services, News, Profile, Log out and Help. On the user’s home page they will get a basic guide on what each tab heading is about. The format of every page is as follows there are tabs on top, content and every page will have a downloads section where the user can view and download the technician schedule and view quotes


 
The projects is where the use can view all the projects that they have done with the company.

 
The services tab is where the user can view the company services and also request a quotation.


 

The news tab is where the user can view the current news.

 
The profile tab is where the user can change they profile details or event de activate their account.

 

The log out tab is self-explanatory (The user clicks here when they wish to log out)

 
If the user experiences any trouble they can come here to get help on how the system works, they can also search the website via the search box.

              <p><a class="btn btn-default" href="member-projects.php" role="button">View details &raquo;</a></p>
            </div><!--/span-->
            </div><!--/span-->
        </div>      
                
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
          <div class="list-group">
            <h4 class="h4">Downloads</h4>
             <h5 class="h5">Schedule</h5>
             <a href="files/schedules/technician schedule.pdf" target="_blank" class="list-group-item">Technician Schedule</a>
            <h5 class="h5">Quotes</h5>
            <?php
                require 'php/connect.php';
                $query = 'SELECT * FROM quotes WHERE Email = "'.$_SESSION['email'].'"';
                $result = mysqli_query($db_conn, $query);
                if (mysqli_affected_rows($db_conn) > 0)
                {
                    echo '<a href="#" class="list-group-item">Link</a>';
                    echo '<a href="#" class="list-group-item">Link</a>';                        
                }
                else 
                {
                    echo '<a href="#" class="list-group-item active">No Quotes</a>';
                }
                mysqli_close($db_conn);
            ?>
          </div>
        </div>
        </div>
    </div>

      <hr class="featurette-divider">

      <footer class="footer">
        <p>Eya Bantu - Consulting Engineers and Professional Services. &copy; 2014</p>
      </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script src="js/offcanvas.js"></script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');        
        // 'auto' can be changed to eyabantu.co.za
        ga('create', 'UA-53796954-1', 'auto');
        ga('send', 'pageview');
    </script>
  </body>
</html>
