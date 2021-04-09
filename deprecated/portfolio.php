<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    require_once 'php/connect.php';
    $query = 'SELECT CompanyName, WebsiteURL, Email, PhoneNumber, Status FROM projects ORDER BY DateRequested'; 
    $result = mysqli_query($db_conn, $query) or trigger_error(mysqli_error($db_conn));    
    
    if (mysqli_affected_rows($db_conn) > 0)
    {
        $projects = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);        
    }
    mysqli_close($db_conn);
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        <link rel="stylesheet" href="css/style.css" type="text/css"/>
        <link rel="stylesheet" href="css/bootstrap.css" type="text/css"/>
        <link rel="stylesheet" href="css/bootstrap-responsive.css" type="text/css"/>
        <link rel="stylesheet" href="css/carousel.css" type="text/css"/>

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <title>Eya Bantu Service Portfolio</title>
    </head>
    <body>
       <div class="navbar-wrapper">
      <!-- Wrap the .navbar in .container to center it within the absolutely positioned parent. -->
      <div class="container">

        <div class="navbar navbar-inverse">
          <div class="navbar-inner">
            <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="brand" href="home.php">Eya Bantu</a>
            <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
            <div class="nav-collapse collapse">
              <ul class="nav">
                <li><a href="home.php">Home</a></li>                
                <!-- Read about Bootstrap dropdowns at http://twbs.github.com/bootstrap/javascript.html#dropdowns -->
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">About <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="overview.php">Overview</a></li>                    
                    <li><a href="corporate-structure.php">Corporate Structure</a></li>
                    <li><a href="equipment.php">Equipment</a></li>
                    <li><a href="certificates.php">Certificates</a></li>                     
                  </ul>
                </li>                  
                 <li class="dropdown active" id="services">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                         Services<span class="caret"></span>
                     </a>
                     <ul class="dropdown-menu">
                         <li><a href="services.php">Our Services</a></li>
                         <li><a href="all-services.php">Service Details</a></li>
                         <li><a href="request-services.php">Request Services</a></li>
                         <li><a href="portfolio.php">Our Projects</a></li>
                     </ul>
                 </li>
                 <li><a href="news.php">News</a></li>                            
                <li><a href="contact.php">Contact</a></li>                
                <li class="dropdown" id="sign-in">                    
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="icon-user icon-white"></i> Sign In
                            <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu" style="width: 250px">
                            <div class="container">
                                <form name="sign-in-form" class="form-signin" role="form" action="administrator.php" method="post">        
                                <input name="username" type="email" class="form-control" placeholder="Email address" required autofocus />
                                <input name="password" type="password" class="form-control" placeholder="Password" required />
                              <div class="checkbox">
                                  <p><label>
                                    <input type="checkbox" value="remember-me"> Remember me
                                </label></p>
                              </div>
                              <button name="login_submit" class="btn btn-primary" type="submit">Sign in</button>
                            </form>
                          </div>
                            <p><label><a href="#">Forgot Password?</a></label></p>
<!--                            <label><a href="register.html">Register</a></label>-->
                        </div> 
                </li> 
                <li><a href="help.php">Help</a></li>
                <li>
                    <form style="padding-left:100px; padding-top: 4px;" class="navbar-search" action=" " id="searchform" method="get">
                        <input type="text" class="search-query" id="search" name="search" placeholder="search..." autocomplete="off"/>
                    </form>
                </li>
              </ul>
            </div><!--/.nav-collapse -->
          </div><!-- /.navbar-inner -->
        </div><!-- /.navbar -->
      </div> <!-- /.container -->
    </div><!-- /.navbar-wrapper -->
    
    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1" class="myCarousel-target"></li>
        <li data-target="#myCarousel" data-slide-to="2" class="myCarousel-target"></li>
    </ol>
      <div class="carousel-inner">
          
        <div id="0" class="item active">
          <img class="carousel-color" src="img/electric1.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>Welcome</h1>
              <p class="lead">
                  Eya Bantu Your Partner In Power - Established in 1999,
                  is a South African based premium consulting company.
              </p>
              <a class="btn btn-large btn-primary" href="about.php">Learn more &raquo;</a>
            </div>
          </div>
        </div>
          
        <div id="1" class="item">
          <img class="carousel-color" src="img/electric5.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>Subscribe</h1>
              <p class="lead">Join us, subscribe to get the latest details about project, news, updates and many more.</p>
              <a class="btn btn-large btn-primary" href="subscribe.php">Subscribe &raquo;</a>
            </div>
          </div>
        </div>
          
        <div id="2" class="item">
          <img class="carousel-color" src="img/electric9.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>Services</h1>
              <p class="lead">We offer world class services, view our range of services or request a service and experience our great range of services first hand.</p>
              <a class="btn btn-large btn-primary" href="services.php">View Services &raquo;</a>
            </div>
          </div>
        </div>
      </div>
      
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">&lsaquo;<span class="prev"></span></a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">&rsaquo;<span class="next"></span></a>
      
    </div><!-- /.carousel -->

    <div>
        <div class="container marketing">        

        <h2 class="featurette-heading">Our <span class="muted">Projects.</span></h2>
        
      <div class="featurette">
          <?php
            $count = 0;            
                foreach ($projects as $project)
                {
                    if ($count < 10)
                    {
                        echo '<h3 class="h3">';
                        echo $project['CompanyName'];
                        echo '</h3>';
                        echo '<div class="table-responsive">';
                        echo '<table class="table"><tr><th>';                        
                        echo 'Website</th><th>';
                        echo 'Email</th><th>';
                        echo 'Phone Number</th><th>';
                        echo 'Status</th><tr><td>'; 
                        $url = 'http://' . $project['WebsiteURL'];
                        echo '<a href="'.$url.'" target="_blank">';
                        echo $project['WebsiteURL'];
                        echo '</a>';
                        echo '</td><td>';
                        echo $project['Email'];
                        echo '</td><td>';
                        echo $project['PhoneNumber'];
                        echo '</td><td>';
                        echo $project['Status'];
                        echo '</td></table>';
                        echo '<hr class="featurette-divider">';
                    }
                    $count++;
                }
          ?>
        
        <hr class="featurette-divider">
    </div>    
            
        <!-- FOOTER -->
       <footer class="footer">
        <p>
            <span>                
                <a name="footer_subscribe_button" class="btn btn-primary" href="subscribe.php" />Subscribe</a>
                    <br/>
                    <br/>
            </span>
            Eya Bantu - Consulting Engineers and Professional Services.
            <br/>
            www.eyabantu.com &copy; All Rights Reserved 
            <br />         
            <a href="#">Privacy</a>
            &middot; 
            <a href="#">Terms</a>
            <span style="float:right; padding-right: 5%">
                <a href="#">Back to top</a>
                <br/>
                <br/>        
                <a target="_blank" href="https://www.facebook.com/EyaBantu"><img src="img/facebook.jpg"/></a>
                <a target="_blank" href="#"><img src="img/twitter.jpg"/></a>
            </span>
        </p>        
      </footer> 
        
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap-transition.js"></script>
        <script src="js/bootstrap-alert.js"></script>
        <script src="js/bootstrap-modal.js"></script>
        <script src="js/bootstrap-dropdown.js"></script>
        <script src="js/bootstrap-scrollspy.js"></script>
        <script src="js/bootstrap-tab.js"></script>
        <script src="js/bootstrap-tooltip.js"></script>
        <script src="js/bootstrap-popover.js"></script>
        <script src="js/bootstrap-button.js"></script>
        <script src="js/bootstrap-collapse.js"></script>
        <script src="js/bootstrap-carousel.js"></script>
        <script src="js/bootstrap-typeahead.js"></script>
        <script src="js/jquery-1.7.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script>
          !function ($) {
            $(function(){
              // carousel demo
              $('#myCarousel').carousel()          
            })
          }(window.jQuery);
        </script>
        <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-53796954-1', 'auto');
        ga('send', 'pageview');
    </script>
        <script src="js/holder.js"></script>
    </body>
</html>