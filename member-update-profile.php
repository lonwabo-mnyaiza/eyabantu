<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */    
    session_start();
    if (isset($_SESSION['user_name']) == false && isset($_SESSION['company_name']) == false)
    {
         header('Location: ./errors-page.php');
    }
    
    require_once 'php/connect.php';
    
    $uniqueID = $_SESSION['email'];
        
    $query = "SELECT TypeID FROM members WHERE Email = '$uniqueID'" or trigger_error(mysqli_error($db_conn));
    $result = mysqli_query($db_conn, $query) or trigger_error(mysqli_error($db_conn));
    if (mysqli_affected_rows($db_conn) > 0)
    {
        $success1 = true;
        $member_results = mysqli_fetch_array($result, MYSQL_NUM);                
        mysqli_free_result($result);
    }
    else 
    {
        $success1 = false;
        mysqli_free_result($result);
    }
    
    if ($member_results[0] == 1)
    {
        $query = "SELECT * FROM members, business_members WHERE members.Email = '$uniqueID'";
        $result = mysqli_query($db_conn, $query);
        if (mysqli_affected_rows($db_conn) > 0)
        {
            $success2 = true;
            $change_values = mysqli_fetch_array($result, MYSQLI_ASSOC);
            mysqli_free_result($result);
        }
        else 
        {
            $success2 = false;            
            mysqli_free_result($result);        
        }
    }
    else if ($member_results[0] == 2)
    {
        $query = "SELECT * FROM members, regular_members WHERE members.Email = '$uniqueID'";
        $result = mysqli_query($db_conn, $query);
        if (mysqli_affected_rows($db_conn) > 0)
        {
            $success2 = true;
            $change_values = mysqli_fetch_array($result, MYSQLI_ASSOC);
            mysqli_free_result($result);        
        }
        else 
        {
            $success2 = false;            
            mysqli_free_result($result);        
        }
    }
    mysqli_close($db_conn);   
    
    if (!($success1 && $success2))
    {
        header( 'Location: errors-member-page.php?error_value=Member' );
    }
    
    function loadRegularMember()
    {
            global $change_values;
           echo '<table class="table table-responsive table-hover table-bordered">';
                        echo '<tr>';
                        echo    '<td>Title</td>';                                             
                                if (substr($change_values['Title'],0,2) == 'Dr')
                                {
                                    echo '<td><select class="input_administrator_controls" name="title"><option selected="true">Dr</option><option>Mr</option><option>Mrs</option><option>Ms</option><option>Miss</option></select></td>';
                                }                                
                                else  if (substr($change_values['Title'],0,2) == 'Mr')
                                {
                                    echo '<td><select class="input_administrator_controls" name="title"><option>Dr</option><option selected="true">Mr</option><option>Mrs</option><option>Ms</option><option>Miss</option></select></td>';
                                }    
                                else  if (substr($change_values['Title'],0,3) == 'Mrs')
                                {
                                    echo '<td><select class="input_administrator_controls" name="title"><option>Dr</option><option>Mr</option><option selected="true">Mrs</option><option>Ms</option><option>Miss</option></select></td>';
                                }     
                                else  if (substr($change_values['Title'],0,2) == 'Ms')
                                {
                                    echo '<td><select class="input_administrator_controls" name="title"><option>Dr</option><option>Mr</option><option>Mrs</option><option selected="true">Ms</option><option>Miss</option></select></td>';
                                }    
                                else  if (substr($change_values['Title'],0,4) == 'Miss')
                                {
                                    echo '<td><select class="input_administrator_controls" name="title"><option>Dr</option><option>Mr</option><option>Mrs</option><option>Ms</option><option selected="true">Miss</option></select></td>';
                                }                                             
                        echo '</tr>';
                        echo '<tr>';
                        echo    '<td>Name</td>';
                        echo    '<td><input class="input_administrator_controls" name="name" type="text" value="'.$change_values['Name'].'"</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo    '<td>Surname</td>';
                        echo    '<td><input class="input_administrator_controls" name="surname" type="text" value="'.$change_values['Surname'].'"</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo    '<td>Gender</td>';
                                if (substr($change_values['Gender'], 0, 1) == 'M')
                                {
                                    echo '<td><select class="input_administrator_controls" name="gender"><option selected="true">M</option><option>F</option></select></td>';
                                }
                                else if (substr($change_values['Gender'], 0, 1) == 'F')
                                {
                                    echo '<td><select class="input_administrator_controls" name="gender"><option>M</option><option selected="true">F</option></select></td>';
                                }                                                            
                        echo '</tr>';
                        echo '<tr>';
                        echo    '<td>Race</td>';
                                if (substr($change_values['Race'], 0, 6) == 'Asian')
                                {
                                    echo '<td><select class="input_administrator_controls" name="race"><option selected="true">Asian</option><option>Black</option><option>Coloured</option><option>Indian</option><option>White</option><option>Not Specified</option></select></td>';
                                }
                                else if (substr($change_values['Race'], 0, 6) == 'Black')
                                {
                                    echo '<td><select class="input_administrator_controls" name="race"><option>Asian</option><option selected="true">Black</option><option>Coloured</option><option>Indian</option><option>White</option><option>Not Specified</option></select></td>';
                                }
                                else if (substr($change_values['Race'], 0, 8) == 'Coloured')
                                {
                                    echo '<td><select class="input_administrator_controls" name="race"><option>Asian</option><option>Black</option><option selected="true">Coloured</option><option>Indian</option><option>White</option><option>Not Specified</option></select></td>';
                                }
                                else if (substr($change_values['Race'], 0, 6) == 'Indian')
                                {
                                    echo '<td><select class="input_administrator_controls" name="race"><option>Asian</option><option>Black</option><option>Coloured</option><option selected="true">Indian</option><option>White</option><option>Not Specified</option></select></td>';
                                }
                                else if (substr($change_values['Race'], 0, 6) == 'White')
                                {
                                    echo '<td><select class="input_administrator_controls" name="race"><option>Asian</option><option>Black</option><option>Coloured</option><option>Indian</option><option selected="true">White</option><option>Not Specified</option></select></td>';
                                }
                                else
                                {
                                    echo '<td><select class="input_administrator_controls" name="race"><option>Asian</option><option>Black</option><option>Coloured</option><option>Indian</option><option>White</option><option selected="true">Not Specified</option></select></td>';
                                }                            
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td>Phone Number</td>';
                        echo    '<td><input class="input_administrator_controls" name="phoneNumber" type="text" value="'.$change_values['PhoneNumber'].'"</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo    '<td>Email</td>';
                        echo    '<td><input class="input_administrator_controls" name="email" type="email" value="'.$change_values['Email'].'"</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td>Date of Birth</td>';
                        echo    '<td><input class="input_administrator_controls" name="idNumber" type="text" value="'.$change_values['DateOfBirth'].'"</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo    '<td>Password</td>';
                        echo    '<td><input class="input_administrator_controls" name="password" type="password" value="'.$change_values['Password'].'"</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo    '<td>Status</td>';
                        echo    '<td><input class="input_administrator_controls" name="status" type="text" value="'.$change_values['Flag'].'"</td>';
                        echo '</tr>';
                        echo '</table>';
    }
    function loadBusinessMember()
    {
         global $change_values;
           echo '<table class="table table-responsive table-hover table-bordered">';
                        echo '<tr>';
                        echo    '<td>Company</td>';                                             
                        echo    '<td><input class="input_administrator_controls" name="name" type="text" value="'.$change_values['CompanyName'].'"</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo    '<td>Website</td>';
                        echo    '<td><input class="input_administrator_controls" name="name" type="text" value="'.$change_values['WebsiteURL'].'"</td>';
                        echo '</tr>';                        
                        echo '<tr>';
                        echo    '<td>Industry</td>';
                                if (substr($change_values['Industry'], 0, 1) == 'M')
                                {
                                    echo '<td><select class="input_administrator_controls" name="gender"><option selected="true">M</option><option>F</option></select></td>';
                                }
                                else if (substr($change_values['Industry'], 0, 1) == 'F')
                                {
                                    echo '<td><select class="input_administrator_controls" name="gender"><option>M</option><option selected="true">F</option></select></td>';
                                }                                                            
                        echo '</tr>';
                        echo '<tr>';
                        echo    '<td>City</td>';
                        echo    '<td><input class="input_administrator_controls" name="phoneNumber" type="text" value="'.$change_values['City'].'"</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td>Phone Number</td>';
                        echo    '<td><input class="input_administrator_controls" name="phoneNumber" type="text" value="'.$change_values['PhoneNumber'].'"</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo    '<td>Email</td>';
                        echo    '<td><input class="input_administrator_controls" name="email" type="email" value="'.$change_values['Email'].'"</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo    '<td>Password</td>';
                        echo    '<td><input class="input_administrator_controls" name="password" type="password" value="'.$change_values['Password'].'"</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo    '<td>Status</td>';
                        echo    '<td><input class="input_administrator_controls" name="status" type="text" value="'.$change_values['Flag'].'"</td>';
                        echo '</tr>';
                        echo '</table>';
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
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>member profile</title>

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
            <li class="dropdown active" id="member-profile">                    
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
           <h1 class="page-header">Update Profile</h1>
            <div class="featurette">                
                <form action="php/update-member.php" method="post">
                    <?php
                        if (isset($_SESSION['user_name']))
                        {
                            loadRegularMember();
                        }
                        else if (isset($_SESSION['company_name']))
                        {
                            loadBusinessMember();
                        }
                    ?>
                    <button type="submit" class="btn btn-default" formaction="member-home.php" >Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
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
