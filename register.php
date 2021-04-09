<?php
    require_once 'php/connect.php';
    
    $query = 'SELECT Name FROM industries';
    $result = mysqli_query($db_conn, $query);
    if (mysqli_affected_rows($db_conn) > 0)
    {
        $industries = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
    }
    
    if (isset($_REQUEST['business_member_submit']) || isset($_REQUEST['individual_member_submit'])) 
    {
        if (isset($_REQUEST['business_member_submit']))
        {
            $success1 = false;
            $success2 = false;
            
            $email = stripslashes(trim($_POST['email']));
            $phoneNumber = stripslashes(trim($_POST['phoneNumber']));
            $city = stripslashes(trim($_POST['city']));
            $password = stripslashes(trim($_POST['password']));
            
            $encrypted_password = sha1($password);
            $typeID = 1;
            $flag = 'Active';
            
            $query = "INSERT INTO members (Email, PhoneNumber, City, Password, TypeID, Flag) "
                . "VALUES('$email', '$phoneNumber', '$city', '$encrypted_password', '$typeID', '$flag')" or trigger_error(mysqli_error($db_conn));
            $result = mysqli_query($db_conn, $query);
            
            if (mysqli_affected_rows($db_conn) > 0)
            {
                $success1 = true;
                mysqli_free_result($result);
            }
            
            $company_name = stripslashes(trim($_POST['companyName']));
            $websiteURL = stripslashes(trim($_POST['websiteURL']));
            $industry = stripslashes(trim($_POST['industry']));
            
            
            $query2 = "INSERT INTO business_members (Email, CompanyName, WebsiteURL, Industry) "
                    . "VALUES('$email', '$company_name', '$websiteURL', '$industry')";
            $result2 = mysqli_query($db_conn, $query2);
            
            if (mysqli_affected_rows($db_conn) > 0)
            {
                $success2 = true;
                mysqli_free_result($result2);
            }
            
            if ($success1 && $success2)
            {
                header('Location: ./home.php');
            }
            else 
            {
                header( 'Location: errors-public-page.php?error_value=Member' );
            }
        }   
        else if (isset($_REQUEST['individual_member_submit']))
        {
            $success1 = false;
            $success2 = false;
            
            $email = stripslashes(trim($_POST['email']));
            $phoneNumber = stripslashes(trim($_POST['phoneNumber']));
            $city = stripslashes(trim($_POST['city']));
            $password = stripslashes(trim($_POST['password']));
            
            $encrypted_password = sha1($password);
            $typeID = 2;
            $flag = 'Active';
            
            $query = "INSERT INTO members (Email, PhoneNumber, City, Password, TypeID, Flag) "
                . "VALUES('$email', '$phoneNumber', '$city', '$encrypted_password', '$typeID', '$flag')";
            $result = mysqli_query($db_conn, $query);
            
            if (mysqli_affected_rows($db_conn) > 0)
            {
                $success1 = true;
                mysqli_free_result($result);
            }
            
            $title = stripslashes(trim($_POST['title']));
            $name = stripslashes(trim($_POST['name']));
            $surname = stripslashes(trim($_POST['surname']));
            $gender = stripslashes(trim($_POST['gender']));
            $race = stripslashes(trim($_POST['race']));
            $DOB = stripslashes(trim($_POST['DOB']));            
            
            $query2 = "INSERT INTO regular_members (Email, Title, Name, Surname, Gender, Race, DateOfBirth) "
                    . "VALUES('$email', '$title', '$name', '$surname', '$gender', '$race', '$DOB')";
            $result2 = mysqli_query($db_conn, $query2);
            
            if (mysqli_affected_rows($db_conn) > 0)
            {
                $success2 = true;
                mysqli_free_result($result2);
            }
            
            if ($success1 && $success2)
            {
                header('Location: ./home.php');
            }
            else 
            {
                header( 'Location: errors-public-page.php?error_value=Member' );
            }
        }
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
        <link rel="stylesheet" type="text/css" media="screen"
            href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">

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

        <title>Eya Bantu News</title>
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
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="icon-user icon-white"></i> Sign In
                            <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu" style="width: 250px">
                            <div class="container">
                            <form class="form-signin" role="form">        
                                <input type="email" class="form-control" placeholder="Email address" required autofocus />
                                <input type="password" class="form-control" placeholder="Password" required />
                              <div class="checkbox">
                                  <p><label>
                                    <input type="checkbox" value="remember-me"> Remember me
                                </label></p>
                              </div>
                              <button class="btn btn-primary" type="submit">Sign in</button>
                            </form>
                          </div>
                            <p><label><a href="#">Forgot Password?</a></label></p>
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

      <div class="featurette">
          
          <h2 class="featurette-heading">Registration<span class="muted"> Form.</span></h2>
          
          <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#company-registration" role="tab" data-toggle="tab">Company</a></li>
            <li><a href="#member-registration" role="tab" data-toggle="tab">Individual</a></li>  
          </ul>  
          
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane fade in active" id="company-registration">
            <form action="register.php" method="post">
                <table class="table table-responsive table-hover table-bordered" style="width: 90%">
                <tr>
                    <td>Company Name</td>
                    <td><input class="input_administrator_controls" style="width: 98%;" id="companyName" name="companyName" placeholder="Company Name*" tabindex="11" type="text" value="" /></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td><input class="input_administrator_controls" style="width: 98%;" id="city" name="city" placeholder="City*" tabindex="13" type="text" value="" /></td>
                </tr>          
                <tr>
                    <td>Contact Number</td>
                    <td><input class="input_administrator_controls" style="width: 98%;" id="phoneNumber" name="phoneNumber" placeholder="Phone Number*" tabindex="13" type="tel" value="" /></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input class="input_administrator_controls" style="width: 98%;" id="email" name="email" placeholder="Email*" tabindex="12" type="email" value="" /></td>
                </tr>
                <tr>
                    <td>Website URL</td>
                    <td><input class="input_administrator_controls" style="width: 98%;" id="websiteURL" name="websiteURL" placeholder="Website Url" tabindex="13" type="text" value="" /></td>
                </tr>
            <tr>
                <td>Industry</td>
                <td>
                <select class="input_administrator_controls" name="industry">
                    <?php
                        foreach ($industries as $industry)
                        {
                            echo '<option>'.$industry['Name'].'</option>';
                        }
                    ?>
                </select>
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input class="input_administrator_controls" style="width: 98%;" id="Password" name="password" placeholder="Password*" tabindex="14" type="password" /></td>
            </tr>
            <tr>
                <td>Confirm Password</td>
                <td><input class="input_administrator_controls" style="width: 98%;" id="ConfirmPassword" name="confirmPassword" placeholder="Confirm Password*" tabindex="15" type="password" /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="checkbox" name="terms" tabindex="16" value="">
                    I agree to the <a href="https://store.xamarin.com/terms" target="_blank" tabindex="17">Terms &amp; Conditions</a>
                </td>
            </tr> 
            </table>
            <br />
            <div class="float-right">
                <button name="business_member_submit" type="submit" class="btn btn-primary" tabindex="17">Register</button>
            </div>   
        </form>
        </div> 
        <div class="tab-pane fade" id="member-registration">
            <form action="register.php" method="post">
                <table class="table table-responsive table-hover table-bordered" style="width: 90%">
                <tr>
                     <td>Title</td>
                     <td><select class="input_administrator_controls"  name="title"><option>Dr</option><option selected="true">Mr</option><option>Mrs</option><option>Ms</option><option>Miss</option></select></td>
                 </tr>
                <tr>
                    <td>Name</td>
                    <td><input class="input_administrator_controls" style="width: 98%;" id="FirstName" name="name" placeholder="Name*" tabindex="11" type="text" value="" /></td>
                </tr>
                <tr>
                    <td>Surname</td>
                    <td><input class="input_administrator_controls" style="width: 98%;" id="LastName" name="surname" placeholder="Surname*" tabindex="12" type="text" value="" /></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td><select class="input_administrator_controls" name="gender"><option selected="true">M</option><option>F</option></select></td>
                </tr>
                <tr>
                    <td>Race</td>
                    <td><select class="input_administrator_controls" name="race"><option selected="true">Race</option><option>Asian</option><option>Black</option><option>Coloured</option><option>Indian</option><option>White</option></select></td>
                </tr>                
                <tr>
                    <td>Date of Birth</td>
                    <td><div id="register_member_datetimepicker" class="input-append">
                        <input name="DOB" data-format="yyyy-MM-dd" type="text"></input>
                        <span class="add-on">
                          <i class="glyphicon glyphicon-calenda">
                          </i>
                        </span>
                        </div>
                      </td>
                </tr>                                   
                <tr>
                    <td>Contact Number</td>
                    <td><input class="input_administrator_controls" style="width: 98%;" id="phoneNumber" name="phoneNumber" placeholder="Phone Number*" tabindex="13" type="tel" value="" /></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input class="input_administrator_controls" style="width: 98%;" id="Email" name="email" placeholder="Email*" tabindex="13" type="email" value="" /></td>
                </tr>             
                <tr>
                    <td>City</td>
                    <td><input class="input_administrator_controls" style="width: 98%;" id="city" name="city" placeholder="City*" tabindex="12" type="text" value="" /></td>
                </tr>                     
                <tr>
                    <td>Password</td>
                    <td><input class="input_administrator_controls" style="width: 98%;" id="password" name="password" placeholder="Password*" tabindex="14" type="password" /></td>
                </tr>
                <tr>
                    <td>Confirm Password</td>
                    <td><input class="input_administrator_controls" style="width: 98%;" id="confirmPassword" name="confirmPassword*" placeholder="Confirm Password*" tabindex="15" type="password" /></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="checkbox" name="terms" tabindex="16" value="">
                        I agree to the <a href="" target="_blank" tabindex="17">Terms &amp; Conditions</a>
                    </td>
                </tr> 
            </table>   
            <br />
            <div class="float-right">
                <button name="individual_member_submit" type="submit" class="btn btn-primary" tabindex="17">Register</button>
            </div>
    </form>
    </div>
    </div>    
    </div>
    <hr class="featurette-divider">
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
        <script type="text/javascript"
        src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js">
       </script> 
        <script type="text/javascript"
        src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">
       </script>
       <script type="text/javascript"
        src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js">
       </script>
        <script type="text/javascript">
            $(function() {
              $('#register_member_datetimepicker').datetimepicker({
                pickTime: false
              });
            });
          </script>
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
