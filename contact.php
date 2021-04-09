<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_REQUEST['submit'])) 
{
    require_once 'php/connect.php';
    
    $name = stripslashes(trim($_POST['name']));
    $email = stripslashes(trim(mysqli_real_escape_string($db_conn, $_POST['email'])));
    $subject = stripslashes(trim($_POST['subject']));
    $message = stripslashes(trim($_POST['message']));
    $status = 'Not Read';
    $flag = 'Active';
    
    $query = "INSERT INTO contact (Name, Email, Subject, Message, Status, Flag) "
            . "VALUES ('$name', '$email', '$subject', '$message', '$status', '$flag')";
    
    $result = mysqli_query($db_conn, $query);    
    
    if (mysqli_affected_rows($db_conn) > 0) 
    {  
       // use modal instead..
       // echo '<div class="alert alert-success alert-dismissable">Your message has been successfully uploaded.</div>';
       // echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
    } 
    else 
    {
        header( 'Location: errors-public-page.php?error_value=Contact' ); 
    }
    
    mysqli_close($db_conn);
}
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

        <title>Eya Bantu Contact</title>
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
                 <li class="dropdown" id="services">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                         Services<span class="caret"></span>
                     </a>
                     <ul class="dropdown-menu">
                         <li><a href="services.php">Our Services</a></li>
                         <li><a href="all-services.php">Service Details</a></li>                         
                     </ul>
                 </li>
                 <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">News <span class="caret"></span></a>
                     <ul class="dropdown-menu">
                         <li><a href="news.php">Articles</a></li>
                         <li><a href="events.php">Events</a></li>
                     </ul>
                 </li>                                                            
                <li class="active"><a href="contact.php">Contact</a></li>                
                <li class="dropdown" id="sign-in">                    
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#">
                            <i class="icon-user icon-white"></i> Sign In
                            <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu" style="width: 250px">
                            <div class="container">
                                <form name="sign-in-form" class="form-signin" role="form" action="php/login.php" method="post">        
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
                            <p><label><button class="btn btn-link" data-toggle="modal" data-target="#myModal">Forgot Password?</button></label></p>
                            <p><label><a class="btn btn-link" href="register.php">Register</a></label></p>
                        </div> 
                </li>  
                <li><a href="help.php">Help</a></li>
               <li>
                    <form style="padding-left:100px; padding-top: 4px;" class="navbar-search" action="searched-results.php" id="searchform" method="get">
                        <input type="text" class="search-query" id="search" name="search" placeholder="search..." autocomplete="off"/>
                    </form>
                </li>
              </ul>
            </div><!--/.nav-collapse -->
          </div><!-- /.navbar-inner -->
        </div><!-- /.navbar -->
      </div> <!-- /.container -->
    </div><!-- /.navbar-wrapper --> 
    
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3346.448052450704!2d27.909082!3d-32.991960999999996!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e66e033bcb6dc69%3A0x97f0c03aa247efe6!2sEya+Bantu+Professional+Services+Cc!5e0!3m2!1sen!2sza!4v1408811120267" width="100%" height="500px" frameborder="0" style="border:0"></iframe>
    
    <div class="container marketing">
        <!-- START THE FEATURETTES -->   

      <div class="featurette">        
        <h2 class="featurette-heading">Please feel free to <span class="muted">contact us.</span></h2>
        <p class="lead"></p>
        <div class="well" style="float: right;">
            <!--<h2 class="h2">Contact Info</h2>-->
            <h3 class="h3">Our Address:</h3>
            <p>
                
            </p>
            <h3 class="h3">Email:</h3>
            <p>
                
            </p>
            <h3 class="h3">Contact Details:</h3>
            <p>
                <label>Mike Brown - Consulting</label>
                <label>Tel: +27 (43) 726 2726</label>
                <label>Mobile: +27 82 371 2963</label>
            </p>
            <p>
                <label>Jeff Richter - Emergency Services</label>
                <label>Tel: +27 (43) 726 2726</label>
                <label>Mobile: +27 83 294 4353</label>
            </p>
        </div>
        
        <div class="span2">
<!--            <h2 class="h2">Contact Us</h2>-->
                    <form action="contact.php" method="post">
                        <div class="form">
                        <label for="name">Name</label>
                        <input class="text" name="name" id="name" type="text" placeholder="name *" required="true" autofocus="true" />
                        <div class="clear2"></div>

                        <label for="email">Email</label>
                        <input class="text" name="email" id="email" type="text" placeholder="email *" required="true" />
                        <div class="clear2"></div>

                         <label for="website">Subject</label>
                        <input class="text" name="subject" id="subject" type="text" placeholder="subject *" required="true" />
                        <div class="clear2"></div>

                        <label for="message">Message</label>
                        <textarea class="text" name="message" id="message" cols="45" rows="5" maxlength="200" placeholder="please leave a comment here..." required="true"></textarea>
                        <div class="clear2"></div>

                        <input class="button btn-info" name="reset" type="reset" value="Clear" />
                        <input class="button btn-primary" name="submit" type="submit" value="Post" />                        
                        </div>
                    </form>
                    
        </div>
      </div>
       
     <hr class="featurette-divider">
     </div>
    
        <!-- FOOTER -->
      <footer class="footer">
        <p>
            <span>                
                <a name="footer_sign-up_button" class="btn btn-primary" href="register.php" />Sign Up</a>
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
        
        <!-- Modal -->
    <form action="mail.php" method="post">
    <div class="modal fade modal-form" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
<!--            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>-->
            <h4 class="modal-title" id="myModalLabel">Enter Email Address</h4>
          </div>
          <div class="modal-body">
              <input name="forgot-details" type="email" class="form-control Center" placeholder="Email address" required="true" />
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Send</button>
          </div>
        </div>
      </div>
    </div>
    </form>
        
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