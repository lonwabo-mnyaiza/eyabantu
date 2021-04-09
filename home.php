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

<html lang="en" id="eyabantu">
  <head>    
    <meta name="robots" content="noodp,noydir"/>
    <link rel="canonical" href="http://www.eyabantu.co.za" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Home" />
    <meta property="og:url" content="http://www.eyabantu.co.za" />
    <meta property="og:site_name" content="Eya Bantu" />
    <!-- / Yoast WordPress SEO plugin. -->
    
    <meta charset="utf-8">   
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Eya Bantu consulting engineers and technical services">
    <meta name="author" content="">
    <meta name="keywords" 
        content="Eya Bantu, consulting engineers, technical services, technical, engineering, electrical services, engineering consultancy"/>
    

    <!-- Le styles -->
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css"/>
    <link rel="stylesheet" href="css/bootstrap-responsive.css" type="text/css"/>
    <link rel="stylesheet" href="css/carousel.css" type="text/css"/>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <!--different size images for different platforms-->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">
    
    <title>Eya Bantu Home</title>
  </head>

  <body>
    <!-- NAVBAR
    ================================================== -->
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
                <li class="active"><a href="home.php">Home</a></li>
                <!-- Read about Bootstrap dropdowns at http://twbs.github.com/bootstrap/javascript.html#dropdowns -->
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">About <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                      <li><a href="about.php">About Us</a></li>
                    <li><a href="overview.php">Overview</a></li>                    
                    <li><a href="corporate-structure.php">Corporate Structure</a></li>
                    <li><a href="equipment.php">Equipment</a></li>
                    <li><a href="certificates.php">Certificates</a></li>                    
<!--                    <li class="nav-header">Nav header</li>
                    <li><a href="#">Separated link</a></li>
                    <li><a href="#">One more separated link</a></li>-->
                    <!--<li class="divider"></li>-->
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
                <!--<li><a href="#sign-in" data-toggle="modal">Sign In</a></li>-->                
                <li class="dropdown" id="sign-in">                    
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#">
                             Sign In
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
        <li data-target="#myCarousel" data-slide-to="2" ></li>
    </ol>
      <div class="carousel-inner">
          
        <div id="0" class="item active">
          <img class="carousel-color" src="img/electric8.jpg" alt="">
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
          <img class="carousel-color" src="img/electric1.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>Become a Member</h1>
              <p class="lead">Join us, become a member to have a customized experience, get the latest details about projects, news, updates and many more.</p>
              <a class="btn btn-large btn-primary" href="register.php">Sign Up Today &raquo;</a>
            </div>
          </div>
        </div>
          
        <div id="2" class="item">
          <img class="carousel-color" src="img/electric5.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>Services</h1>
              <p class="lead">We offer world class services, view our range of services or request a service and experience our great range of services first hand.</p>
              <a class="btn btn-large btn-primary" href="services.php">View Services &raquo;</a>
            </div>
          </div>
        </div>
          
      </div>
<!--      <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
      -->
      
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">&lsaquo;<span class="prev"></span></a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">&rsaquo;<span class="next"></span></a>
      
    </div><!-- /.carousel -->



    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <!-- START THE FEATURETTES -->
      <div class="featurette">        
        <h2 class="featurette-heading">Engineering News 2013<span class="muted"> | Electricity.</span></h2>
        <p class="lead"> 
            Detailed news on electricity sector, including, regulations, nuclear and renewable energy.</p>
      </div>
      
      <div class="featurette">       
        <h2 class="featurette-heading">Unions reach wage agreement <span class="muted">with Eskom.</span></h2>
        <p class="lead"> 
            Trade union Solidarity, the National Union of Mineworkers and the National Union of Metalworkers of South Africa on Friday inked a two-year 
            8.5% wage deal with State-owned power utility Eskom. 
            Solidarity said in a statement that the agreement held a protective clause to reopen wage negotiations should the inflation rate rise above 8.5% 
            during the next two years.
        </p>
      </div>
      
      <div class="featurette">        
        <h2 class="featurette-heading">First hydropower to be generated from <span class="muted">Ingula in May 2015.</span></h2>
        <p class="lead">             
            After last year suffering delays as a result of an accident that claimed the lives of six people, progress is now being made on the 
            development of energy utility Eskom’s Ingula pumped storage scheme, located between Ladysmith and Harrismith, in the Little Drakensberg. 
            Once completed, Ingula, now in its seventh year of construction, would be a peaking hydropower station comprising an upper and lower dam or 
            reservoir, separated in elevation by 480 m and boasting an underground powerhouse housing four 333 MW pump turbines 116 storeys below 
            surface in two excavated underground caverns.
        </p>
      </div>
      
      <div class="featurette">        
        <h2 class="featurette-heading">Medupi Unit 6 boiler on track for year-end <span class="muted">synchronisation.</span></h2>
        <p class="lead">  
            State-owned power utility Eskom on Friday reported that work was progressing well on preparing the first boiler unit of the Medupi 
            power station for synchronisation at the end of this year. Eskom said good progress had already been made on the chemical 
            cleaning of the Unit 6 boiler, with the chemical cleaning medium injection scheduled for August 15.
        </p>
      </div>
      
            <hr class="featurette-divider">
      
      <h2 class="featurette-heading">Eya Bantu is accredited <span class="muted">with.</span></h2>
      <div class="row">
        <div class="span4">
          <!--this tag is purposely here to help with alignment-->
        </div> <!--/.span4 -->
        
        <div class="span4">
            <img class="img-circle" src="img/ecsa.png" data-src="holder.js/140x140">
          <h2>ECSA</h2>
          <p></p>
          <p><a class="btn btn-primary" href="https://www.ecsa.co.za/default.aspx">View details &raquo;</a></p>
        </div><!-- /.span4 -->
        
        <div class="span4">
          <img class="img-circle" src="img/saiee.jpg" data-src="holder.js/140x140">
          <h2>SAIEE</h2>
          <p></p>
          <p><a class="btn btn-primary" href="http://www.saiee.org.za/Default.aspx">View details &raquo;</a></p>
        </div><!-- /.span4 -->        
        
      </div><!-- /.row -->
      
      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->


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

    </div><!-- /.container -->
    
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
    
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
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
        // 'auto' can be changed to eyabantu.co.za
        ga('create', 'UA-53796954-1', 'auto');
        ga('send', 'pageview');
    </script>
    <script src="js/holder.js"></script>
    <script>$("div.navbar-fixed-top").autoHidingNavbar();</script>
  </body>
</html>
