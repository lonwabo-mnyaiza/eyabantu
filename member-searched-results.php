<?php
    session_start();
    if (isset($_SESSION['user_name']) == false && isset($_SESSION['company_name']) == false)
    {
         header('Location: ./errors-page.php');
    }
    
    require_once 'php/connect.php';
    
    $raw_search_query = stripslashes(trim($_GET['search']));
    $search_query = "%" . $raw_search_query . "%";
    
    $query3 = "SELECT Title, Description, URL FROM news WHERE Title LIKE '$search_query' OR Description LIKE '$search_query'";    
    $query5 = "SELECT Name, Description FROM services WHERE Name LIKE '$search_query' OR Description LIKE '$search_query'" or trigger_error(mysqli_error($db_conn));            
    
    
    $result3 = mysqli_query($db_conn, $query3);
    if (mysqli_affected_rows($db_conn) > 0)
    {   
        $news_admin_searched_results = mysqli_fetch_all($result3, MYSQLI_ASSOC); 
    }
    else 
    {
        $success1 = false;
        $news_admin_searched_results = null;
    }
    
    $result5 = mysqli_query($db_conn, $query5);
    if (mysqli_affected_rows($db_conn) > 0)
    {   
        $services_admin_searched_results = mysqli_fetch_all($result5, MYSQLI_ASSOC);   
    }
    else 
    {
        $success2 = false;
        $services_admin_searched_results = null;
    }
    
    mysqli_close($db_conn);   
    
     if (!($success1 && $success2))
    {
        header( 'Location: errors-member-page.php?error_value=Search' );
    }
    
    function searchedArticles()
    {
        global $news_admin_searched_results;
        echo '<h2 class="h2">Article Matches</h2>';            
             
              if ($news_admin_searched_results != null)
              {
                foreach ($news_admin_searched_results as $news_admin_searched_result)
                {
                     echo '<div class="table-responsive">';
            echo '<table class="table table-responsive table-hover table-bordered">';
              echo '<thead>';
                echo '<tr>';                                        
                     echo '<th>';
                     echo $news_admin_searched_result['Title'];
                     echo '</th>';  
                     echo '<th>';
                     echo '<a style="text-decoration:none; color:#5A5A5A;" target="_blank" href="'.$news_admin_searched_result['URL'].'">';
                     echo 'read more';
                     echo '</a>';
                     echo '</th>';  
                echo '</tr>';
              echo '</thead>';
              echo '<tbody>';
                    echo '<tr>';                    
                    echo '<td colspan="2">';
                    echo $news_admin_searched_result['Description'];
                    echo '</td>';                                                         
                    echo '</tr>';                                    
                }                
              }
                echo '</tbody>';
            echo '</table>';
                 echo   '</div>';
    }
    
    function searchedServices()
    {
          global $services_admin_searched_results;
          echo '<h2 class="h2">Service Matches</h2>';
            if ($services_admin_searched_results != null)
            {
                foreach ($services_admin_searched_results as $services_admin_searched_result)
                {
                     echo '<div class="table-responsive">';
          echo  '<table class="table table-responsive table-hover table-bordered">';
          echo    '<thead>';
          echo      '<tr>';                    
          echo      '<th>';          
          echo $services_admin_searched_result['Name'];
          echo      '</th>';              
          echo  '</tr>';
          echo    '</thead>';
          echo '<tbody>';
                    echo '<tr>';
                    echo '<td>';
                    echo $services_admin_searched_result['Description'];
                    echo '</td>';                                       
                    echo '</tr>';                                    
                }
            }
          echo      '</tbody>';
          echo '</table>';          
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

    <title>member service</title>

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
            <li><a href="member-help.php">Help</a></li>
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
            <?php
                if ($news_admin_searched_results != null)
                { searchedArticles();}
                echo '<br />';                
                if ($services_admin_searched_results != null)
                { searchedServices();}
            ?>  
          </div><!--/row-->        

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
