<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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

        <style type="text/css">
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
        </style>

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <title>Eya Bantu Help</title>
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="home.php">Eya Bantu</a>
                    
                    <div class="nav-collapse">
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
                <li><a href="contact.php">Contact</a></li>                
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
                    <form style="padding-left:100px; padding-top: 4px;" class="navbar-search" action=" " id="searchform" method="get">
                        <input type="text" class="search-query" id="search" name="search" placeholder="search..." autocomplete="off"/>
                    </form>
                </li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>
        
        <div class="container marketing">
        <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">

      <div class="featurette">        
        <h2 class="featurette-heading">Eya Bantu<span class="muted"> your partner in power.</span></h2>
        <img src="img/Screenshots/public website home.png" height="500px" width="500px" alt="home image" />
        <img src="img/Screenshots/public website about.png" height="500px" width="500px" alt="about image" />
        <img src="img/Screenshots/public website services.png" height="500px" width="500px" alt="services image" />
        <img src="img/Screenshots/public website news.png" height="500px" width="500px" alt="news image" />
        <img src="img/Screenshots/public website contact.png" height="500px" width="500px" alt="contact image" />
        <img src="img/Screenshots/public website sign in.png" height="500px" width="500px" alt="sign in image" />
        <img src="img/Screenshots/public website help.png" height="500px" width="500px" alt="help image" />    
        The main website has seven tabs namely Home, About, Services, News, Contact, Sign In and Help. The home page has some basic details about the company. On every page the user will find a familiar format which includes the tabs on top, a carousel, content and a footer.
 
The about page has some sub sections namely about the company, company overview, corporate structure, equipment and certificates.
 
The services page is where the user can view all the services on offer by the company. The services page also has some sub sections namely services and service details

 
The news section is where users can stay abreast with the latest news. The news page has some sub sections namely news articles, events

 
The contact page is used to contact the company, users will be able to stay in touch with the company as all the contact details will be listed here.

 

Users can register themselves by clicking on the register link and them providing their details. Administrators will be added by existing administrators. Registered users and administrators will be authenticated here a correct username and password combination will gain a user entry to the system. Note that users can also subscribe to the company’s newsletter.

 
If the user experiences any trouble they can come here to get help on how the system works, they can also search the website via the search box.

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
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-53796954-1', 'auto');
            ga('send', 'pageview');
        </script>
    </body>
</html>
