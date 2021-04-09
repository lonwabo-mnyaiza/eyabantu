<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */    
// 
//    Validation
// 
//       require_once 'php/connect.php';
//    $websiteErr = null;
//    
//    $website = test_input(trim($_POST["company_url"]));
//    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website))
//    {
//        $websiteErr = "Invalid URL"; 
//    }
//    
//    mysqli_close($db_conn);
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

        <title>Eya Bantu Request Service</title>
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
                <li><a href="help.php">Help</a></li
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
              <h1>Become a Member</h1>
              <p class="lead">Join us, become a member to have a customized experience, get the latest details about projects, news, updates and many more.</p>
              <a class="btn btn-large btn-primary" href="register.php">Sign Up Today &raquo;</a>
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

        <div class="featurette">        
        <h2 class="featurette-heading">Service <span class="muted">Details.</span></h2>
        <div class="row">
            
        <div class="span4">
            <form class="form-control" id="services-form" method="post" action="insert_quote_request.php">
                <input type="hidden" name="form_submitted" value="1" />
                <div class="span10">
                    <h2 class="featurette-heading">Request a <span class="muted">Services.</span></h2>                    
                    <div class="control-group">                        
                        <div class="controls controls-row">
                            <input class="span5" type="text" placeholder="First Name *" name="name" maxlength="50" required="true" />
                            <input class="span5" type="text" placeholder="Last Name *" name="surname" maxlength="50" required="true" />
                        </div>                        
                        <input class="span10" type="text" placeholder="Company Name *" name="company_name" maxlength="100" required="true" />                        
                        <input class="span10" type="text" placeholder="Website URL" name="company_url" maxlength="100" />
                        <!--<span><?php echo $websiteErr; ?></span>-->
                        <div class="controls controls-row">
                            <input class="span5" type="email" placeholder="Email *" name="email" maxlength="100" required="true" />
                            <input class="span5" type="tel" placeholder="Phone Number *" name="phone_number" maxlength="100" required="true" />
                        </div>
                        
                        <select class="span10" name="project_budget">
                          <option value="no_budget">Project Budget</option>
                          <option >R10,000 - R25,000</option>
                          <option >R25,000 - R50,000</option>
                          <option >R50,000 - R100,000</option>
                          <option >Over R100,000</option>
                        </select>
                        <select class="span10" name="project_timeline">
                          <option value="no_timeline">Desired Start Date</option>
                          <option >Immediately</option>
                          <option >1-3 Months</option>
                          <option >3-6 Months</option>
                          <option >6 Months +</option>
                        </select>                       
                        
                        <textarea maxlength="500" class="span10" rows="6" placeholder="Tell us more about your project / additional comments *" name="project_details" ></textarea>
                            <div class="controls controls-row">
                                <div class="span6" style="padding-left: 35%">
                                    <?php
                                        require_once('includes/recaptchalib.php');
                                        $publickey = '6Lc2GvkSAAAAAJaqTPbeGiTA8gC9O_4fKoDXwJeM'; // you got this from the signup page
                                        echo recaptcha_get_html($publickey);
                                    ?>
                                </div>
                            </div> 
<!--                        <div class="controls controls-row">
                            <div id="captcha-container" class="span6">
                                <img src="/CFFileServlet/_cf_captcha/_captcha_img2010509088432046053.png" alt="" height="48" width="242" />

                                    <input type="hidden" name="hash" value="8978CBEF648CE7598F565B14ED15FCEE" />
                                
                            </div>
                           <div class="span6">
                                <input class="span10" type="text" placeholder="Security Code *" name="captcha_text">
                                <a id="captcha-request" href="#captcha-request" onclick="var uniqueNum = new Date().getTime(); $('#captcha-container').load('/modules/captcha.cfm?d='+uniqueNum);">Request a new code.</a>
                            </div>
                        </div> -->   
                        <hr>
                        <input type="submit" class="btn btn-success" style="width: 80%" value="Request A Quote" />
                    </div>
                </div>    
            </form>
        </div><!-- /.span4 -->
        
        
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