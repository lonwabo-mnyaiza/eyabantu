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
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="css/style.css" type="text/css"/>
        <link rel="stylesheet" href="css/bootstrap.css" type="text/css"/>
        <link rel="stylesheet" href="css/bootstrap-responsive.css" type="text/css"/>      
        <link rel="stylesheet" href="css/carousel.css" type="text/css"/>

        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/libs/jqueryui-1.8.16/jquery-ui.js"></script>
        <script type="text/javascript" src="js/about.js"></script>

<!--        <style type="text/css">
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
        </style>-->

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <title>Eya Bantu Abou Ust</title>
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
                <li class="active dropdown">
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
          <img class="carousel-color" src="img/electric19.jpg" alt="">
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
          <img class="carousel-color" src="img/electric14.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>Become a Member</h1>
              <p class="lead">Join us, become a member to have a customized experience, get the latest details about projects, news, updates and many more.</p>
              <a class="btn btn-large btn-primary" href="register.php">Sign Up Today &raquo;</a>
            </div>
          </div>
        </div>
          
        <div id="2" class="item">
          <img class="carousel-color" src="img/electric17.jpg" alt="">
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
    
    <div class="container marketing"> 
        
        <div class="featurette">       
        <h2 class="featurette-heading">Our<span class="muted"> Vision.</span></h2>
        <div class="lead">
            <ul>
                <li>To uplift, develop and empower our local communities.</li>
                <li>To remain the market leader by constantly focusing on quality, outstanding service, and optimized solutions.</li>
                <li>To exceed the expectations of our clients.</li>
                <li>To generate a climate of trust and integrity with all the people we deal with.</li>
                <li>To enhance the potential of all our employees.</li>
            </ul>
        </div>
      </div>
        <hr class="featurette-divider">

        <div class="featurette">        
        <h2 class="featurette-heading">Eya Bantu<span class="muted"> your partner in power.</span></h2>
        <p class="lead">Eya Bantu, established in 1999, is a South African based premium consulting company, 
                        providing consulting services in the Energy sector. We offer a comprehensive range of tailored consultancy solutions including Project Management, 
                        Renewable Energy, Engineering and Design, Power System Studies, Tendering, Construction Supervision and Advisory Services like Energy Policies,
                        Audits and Due Diligence. Established on the core values of professionalism,
                        commitment, integrity and excellence, Eya Bantu believes in delivering customized and value-added engineering solutions to its quality-conscious customers.
                        We are also one of the largest service providers of secondary plant testing and commissioning in South Africa up to 132kV equipment.
                        We back up our service delivery with a round the clock emergency call out facility for fault finding and emergency repairs. 
                        Our other field services include transformer oil testing, substation maintenance, cabling, thermal imaging and surveying. 
                        Our field services teams consist of highly skilled and specialized personnel, equipped with the highest quality tools and
                        applying latest technologies and techniques to complete the work safely and on time.
                        Eya Bantu head office is located in East London with regional offices in Port Elizabeth and George. With the knowledge- base
                        accrued from experience in diversified project environments,
                        Eya Bantu recognizes the potential to expand its operations into other areas 
                        of South Africa. Its business strategy underlines the importance of setting up
                        regional business hubs to work in close liaison with the local customers 
                        and make them a part of the business process. Eya Bantu is a B-BBEE status company and
                        has a CIDB rating of 5EP. Our multi-cultural work force comprises of highly 
                        qualified, experienced and committed engineers of various specializations. 
                        In addition to our permanent staff members, we employ a variety of freelance 
                        specialist and local experts in our project offices. We aim to offer all 
                        the manpower and technological functions to fulfill the requirements of our 
                        communities and commercial, industrial and corporate clients, while 
                        maintaining the highest standards of design and workmanship in order to meet 
                        their needs and expectations. Our mission is to try to uplift, develop and 
                        empower our local communities, businesses and other organizations by 
                        means of sincere meaningful dedication to their needs. An achievement that
                        we are very proud of was receiving the Certificate of Recognition
                        from Eskom in 2003 for our contribution to customer service. We 
                        invite you to contact us for further details of our company, services 
                        and references. We are your partner in power.</p>
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