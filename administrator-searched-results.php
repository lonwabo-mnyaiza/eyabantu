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
    
    $raw_search_query = stripslashes(trim($_GET['admin-search']));
    $search_query = "%" . $raw_search_query . "%";
    
    $query1 = "SELECT Title, Name, Surname, Gender, Race, PhoneNumber, Email FROM administrators WHERE Name LIKE '$search_query' OR Surname LIKE '$search_query'";
    $query2 = "SELECT Name, Email, Subject, Message FROM contact WHERE Subject LIKE '$search_query'";
    $query3 = "SELECT Title, Description, URL FROM news WHERE Title LIKE '$search_query' OR Description LIKE '$search_query'";
    $query4 = "SELECT CompanyName, WebsiteURL, Email, PhoneNumber FROM projects WHERE CompanyName LIKE '$search_query'";
    $query5 = "SELECT Name, Description FROM services WHERE Name LIKE '$search_query' OR Description LIKE '$search_query'" or trigger_error(mysqli_error($db_conn));        
    $query6 = "SELECT Name, Surname, Email FROM subscribers WHERE Name LIKE '$search_query' OR Surname LIKE '$search_query'";    
    
    $result1 = mysqli_query($db_conn, $query1) or trigger_error(mysqli_error($db_conn));    
    if (mysqli_affected_rows($db_conn) > 0)
    {   
        $administrators_admin_searched_results = mysqli_fetch_all($result1, MYSQLI_ASSOC);   
    }
    else 
    {
        $success1 = false;
        $administrators_admin_searched_results = null;
    }
    
    $result2 = mysqli_query($db_conn, $query2);
    if (mysqli_affected_rows($db_conn) > 0)
    {   
        $contacts_admin_searched_results = mysqli_fetch_all($result2, MYSQLI_ASSOC);
    }
    else 
    {
        $success2 = false;
        $contacts_admin_searched_results = null;
    }
    
    $result3 = mysqli_query($db_conn, $query3);
    if (mysqli_affected_rows($db_conn) > 0)
    {           
        $news_admin_searched_results = mysqli_fetch_all($result3, MYSQLI_ASSOC); 
    }
    else 
    {
        $success3 = false;
        $news_admin_searched_results = null;
    }
    
    $result4 = mysqli_query($db_conn, $query4);
    if (mysqli_affected_rows($db_conn) > 0)
    {   
        $projects_admin_searched_results = mysqli_fetch_all($result4, MYSQLI_ASSOC);
    }
    else 
    {
        $success4 = false;
        $projects_admin_searched_results = null;
    }
    
    $result5 = mysqli_query($db_conn, $query5);
    if (mysqli_affected_rows($db_conn) > 0)
    {   
        $services_admin_searched_results = mysqli_fetch_all($result5, MYSQLI_ASSOC);   
    }
    else 
    {
        $success5 = false;
        $services_admin_searched_results = null;
    }
    
    $result6 = mysqli_query($db_conn, $query6);
    if (mysqli_affected_rows($db_conn) > 0)
    {   
        $subscribers_admin_searched_results = mysqli_fetch_all($result6, MYSQLI_ASSOC);   
    }
    else 
    {
        $success6 = false;
        $subscribers_admin_searched_results = null;
    }
    
    mysqli_close($db_conn);
    
    if (!($success1 && $success2 && $success3 && $success4 && $success5 && $success6))
    {
        header( 'Location: errors-administrator-page.php?error_value=Search' );
    }
    
    function searchedAdministrators()
    {
        echo '<h2 class="h2">Administrator Matches</h2>';
            echo  '<div class="table-responsive">';
            echo '<table class="table table-responsive table-hover">';
            echo  '<thead>';
            echo    '<tr>';                                        
            echo         '<th>Name</th>';                     
            echo         '<th>Gender</th>';                        
            echo         '<th>Email</th>'; 
            echo    '</tr>';
            echo  '</thead>';
            echo  '<tbody>';
            
            global $administrators_admin_searched_results;
            if ($administrators_admin_searched_results != null)
            {
                foreach ($administrators_admin_searched_results as $administrators_admin_searched_result)
                {
                    echo '<tr>';                    
                    echo '<td>';
                    echo $administrators_admin_searched_result['Title'] . ' ' . $administrators_admin_searched_result['Name'] . ' ' . $administrators_admin_searched_result['Surname'];
                    echo '</td>';   
                    echo '<td>';
                    echo $administrators_admin_searched_result['Gender'];
                    echo '</td>';                       
                    echo '<td>';
                    echo $administrators_admin_searched_result['Email'];
                    echo '</td>';
                    echo '</tr>';
                }
            }
            echo    '</tbody>';
            echo '</table>';
            echo '</div>';
    }
    
    function searchedArticles()
    {
        echo '<h2 class="h2">Article Matches</h2>';
             echo '<div class="table-responsive">';
            echo '<table class="table table-responsive table-hover">';
              echo '<thead>';
                echo '<tr>';                                        
                     echo '<th>Description</th>';                     
                     echo '<th>URL</th>';                     
                echo '</tr>';
              echo '</thead>';
              echo '<tbody>';
              
              global $news_admin_searched_results;
              if ($news_admin_searched_results != null)
              {
                foreach ($news_admin_searched_results as $news_admin_searched_result)
                {
                    echo '<tr>';                    
                    echo '<td>';
                    echo $news_admin_searched_result['Description'];
                    echo '</td>';                    
                    echo '<td>';
                    echo $news_admin_searched_result['URL'];
                    echo '</td>';                    
                    echo '</tr>';                                    
                }                
              }
                echo '</tbody>';
            echo '</table>';
                 echo   '</div>';
    }
    
    function searchedMessages()
    {
        echo '<h2 class="h2">Contact Messages Matches</h2>';
         echo       '<div class="table-responsive">';
         echo       '<table class="table table-responsive table-hover">';
         echo     '<thead>';
         echo       '<tr>';                    
         echo           '<th>Name</th>';
         echo            '<th>Email</th>';
         echo            '<th>Subject</th>';
             echo        '<th>Message</th>';                     
             echo   '</tr>';
             echo '</thead>';
              echo '<tbody>';  
              
              global $contacts_admin_searched_results;
              if ($contacts_admin_searched_results != null)
              {
                foreach ($contacts_admin_searched_results as $contacts_admin_searched_result)
                {
                    echo '<tr>';
                    echo '<td>';
                    echo $contacts_admin_searched_result['Name'];
                    echo '</td>';
                    echo '<td>';
                    echo $contacts_admin_searched_result['Email'];
                    echo '</td>';                    
                    echo '<td>';
                    echo $contacts_admin_searched_result['Subject'];
                    echo '</td>';
                    echo '<td>';
                    echo $contacts_admin_searched_result['Message'];
                    echo '</td>';
                    echo '</tr>';                                    
                }    
              }
                 echo    '</tbody>';
            echo '</table>';          
          echo '</div>';  
    }
    
    function searchedProjects()
    {
        echo '<h2 class="h2">Project Matches</h2>';
           echo   '<div class="table-responsive">';
           echo '<table class="table table-responsive table-hover">';
           echo   '<thead>';
           echo     '<tr>';
           echo          '<th>Company</th>';
           echo          '<th>URL</th>';
           echo          '<th>Email</th>';
           echo          '<th>Contact</th>';                                        
           echo     '</tr>';
           echo   '</thead>';
           echo   '<tbody>'; 
           
           global $projects_admin_searched_results;
           if ($projects_admin_searched_results != null)
           {
                foreach ($projects_admin_searched_results as $projects_admin_searched_result)
                {
                    echo '<tr>';
                    echo '<td>';
                    echo $projects_admin_searched_result['CompanyName'];
                    echo '</td>';
                    echo '<td>';
                    echo $projects_admin_searched_result['WebsiteURL'];
                    echo '</td>';                    
                    echo '<td>';
                    echo $projects_admin_searched_result['Email'];
                    echo '</td>';
                    echo '<td>';
                    echo $projects_admin_searched_result['PhoneNumber'];
                    echo '</td>';
                    echo '</tr>';                                    
                }   
           }
            echo   '</tbody>';
            echo   '</table>';          
            echo '</div>';
    }
    
    function searchedServices()
    {
          echo '<div class="table-responsive">';
          echo  '<table class="table table-responsive table-hover">';
          echo    '<thead>';
          echo      '<tr>';                    
              echo      '<th>Name</th>';
              echo       '<th>Description</th>';
              echo  '</tr>';
            echo    '</thead>';
              echo '<tbody>';
                echo '<h2 class="h2">Service Matches</h2>';                
                  
                global $services_admin_searched_results;
                if ($services_admin_searched_results != null)
                {
                    foreach ($services_admin_searched_results as $services_admin_searched_result)
                    {
                        echo '<tr>';
                        echo '<td>';
                        echo $services_admin_searched_result['Name'];
                        echo '</td>';
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
    
    function searchedSubscribers()
    {
      echo '<div class="table-responsive">';
      echo      '<table class="table table-responsive table-hover">';
      echo        '<thead>';
      echo          '<tr>';                    
      echo              '<th>Name</th>';
      echo               '<th>Email</th>';
      echo          '</tr>';
      echo        '</thead>';
      echo        '<tbody>';
      echo          '<h2 class="h2">Subscribers Matches</h2>';
      
            global $subscribers_admin_searched_results;
            if ($subscribers_admin_searched_results != null)
            {
                foreach ($subscribers_admin_searched_results as $subscribers_admin_searched_result)
                {
                    echo '<tr>';
                    echo '<td>';
                    echo $subscribers_admin_searched_result['Name'] . ' ' . $subscribers_admin_searched_result['Surname'];
                    echo '</td>';                    
                    echo '<td>';
                    echo $subscribers_admin_searched_result['Email'];
                    echo '</td>';   
                    echo '</tr>';                                    
                }
            }
            echo '</tbody>';
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
            <li><a href="administrator.php">Overview</a></li>
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
            <h1 class="page-header">Searched Results</h1>                            
            <?php
                if ($administrators_admin_searched_results != null)
                { searchedAdministrators();}
                echo '<br />';
                if ($contacts_admin_searched_results != null)
                { searchedMessages();}
                echo '<br />';
                if ($news_admin_searched_results != null)
                { searchedArticles();}
                echo '<br />';
                if ($projects_admin_searched_results != null)
                { searchedProjects();}
                echo '<br />';
                if ($services_admin_searched_results != null)
                { searchedServices();}
                echo '<br />';
                if ($subscribers_admin_searched_results != null)
                { searchedSubscribers();}
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
  </body>
</html>


