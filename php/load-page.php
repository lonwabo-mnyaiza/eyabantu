<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    function load($page)
    {
        if ($name == 'home')
        {
            /*  NAVBAR
                ================================================== 
             * 
             */
        <div class="navbar-wrapper">
      // Wrap the .navbar in .container to center it within the absolutely positioned parent.
      <div class="container">

        <div class="navbar navbar-inverse">
          <div class="navbar-inner">
            //<!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="brand" href="home.php">Eya Bantu</a>
            //<!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
            <div class="nav-collapse collapse">
              <ul class="nav">
                <li class="active"><a href="home.php">Home</a></li>
                //<!-- Read about Bootstrap dropdowns at http://twbs.github.com/bootstrap/javascript.html#dropdowns -->
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">About <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                      <li><a href="about.php">About Us</a></li>
                    <li><a href="overview.php">Overview</a></li>                    
                    <li><a href="corporate-structure.php">Corporate Structure</a></li>
                    <li><a href="equipment.php">Equipment</a></li>
                    <li><a href="certificates.php">Certificates</a></li>                    
//<!--                    <li class="nav-header">Nav header</li>
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
                         <li><a href="request-services.php">Request Services</a></li>
                         <li><a href="portfolio.php">Our Projects</a></li>
                     </ul>
                 </li>
                 <li><a href="news.php">News</a></li>                            
                <li><a href="contact.php">Contact</a></li>
                //<!--<li><a href="#sign-in" data-toggle="modal">Sign In</a></li>-->                
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
                            <p><label><button class="btn btn-link" data-toggle="modal" data-target="#myModal">Forgot Password?</button></label></p>
                        </div> 
                </li> 
                <li><a href="help.php">Help</a></li>
                <li>
                    <form style="padding-left:100px; padding-top: 4px;" class="navbar-search" action=" " id="searchform" method="get">
                        <input type="text" class="search-query" id="search" name="search" placeholder="search..." autocomplete="off"/>
                    </form>
                </li>
              </ul>   
            </div> //<!--/.nav-collapse -->
          </div> //<!-- /.navbar-inner -->
        </div> //<!-- /.navbar -->

      </div> //<!-- /.container -->
    </div> //<!-- /.navbar-wrapper -->    
    
    /*<!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
     * 
     */
    
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1" class="myCarousel-target"></li>
        <li data-target="#myCarousel" data-slide-to="2" class="myCarousel-target"></li>
    </ol>
      <div class="carousel-inner">
          
        <div id="0" class="item active">
          <img class="carousel-color" src="img/electric6.jpg" alt="">
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
              <h1>Subscribe</h1>
              <p class="lead">Join us, subscribe to get the latest details about project, news, updates and many more.</p>
              <a class="btn btn-large btn-primary" href="subscribe.php">Subscribe &raquo;</a>
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
    /*<!--      <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
      -->
 * 
 */
      
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">&lsaquo;<span class="prev"></span></a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">&rsaquo;<span class="next"></span></a>
      
    </div> //<!-- /.carousel -->
        }
    }
?>