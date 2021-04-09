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
    
    if (isset($_GET['company_view']) && $_GET['company_view'] == 'View All')
    {
        $company_text = 'View Less';        
        $query = "SELECT members.Email, PhoneNumber, City, Password, TokenID, TypeID, Flag, CompanyName, WebsiteURL, Industry FROM members, business_members WHERE members.Email = business_members.Email";
        $result = mysqli_query($db_conn, $query);
    }
    else
    {
        $company_text = 'View All'; 
        $query = "SELECT members.Email, PhoneNumber, City, Password, TokenID, TypeID, Flag, CompanyName, WebsiteURL, Industry FROM members, business_members WHERE members.Email = business_members.Email AND Flag = 'Active'";
        $result = mysqli_query($db_conn, $query);
    }
    
    if (mysqli_affected_rows($db_conn) > 0)
    {
        $business_member_results = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
    }
    else 
    {
        $business_member_results = null;
    }
    
    if (isset($_GET['individual_view']) && $_GET['individual_view'] == 'View All')
    {
        $individual_text = 'View Less';
        $query = "SELECT members.Email, PhoneNumber, City, Password, TokenID, TypeID, Flag, Title, Name, Surname, Gender, Race, DateOfBirth FROM members, regular_members WHERE members.Email = regular_members.Email";
        $result = mysqli_query($db_conn, $query);
    }
    else 
    {
        $individual_text = 'View All'; 
        $query = "SELECT members.Email, PhoneNumber, City, Password, TokenID, TypeID, Flag, Title, Name, Surname, Gender, Race, DateOfBirth FROM members, regular_members WHERE members.Email = regular_members.Email AND Flag = 'Active'";
        $result = mysqli_query($db_conn, $query);
    }
    
    if (mysqli_affected_rows($db_conn) > 0)
    {
        $regular_member_results = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
    }
    else 
    {
        $regular_member_results = null;
    }
    
     mysqli_close($db_conn);
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
            <li class="active"><a href="administrator-members-page.php">Members</a></li>
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
          <h1 class="page-header">Members</h1> 
          <h3 class="page-header">Business Members</h3> 
              <button class="btn btn-info" data-toggle="modal" data-target="#mail_business_members">Send Notifications</button>   
              <a href="administrator-members-page.php?company_view=<?php echo $company_text; ?>" class="btn btn-warning"><?php echo $company_text; ?></a>                 
                <a class="btn btn-warning" data-toggle="modal" data-target="#remove-business-member-archive-confirmation">Remove All</a> 
                <a class="btn btn-danger" data-toggle="modal" data-target="#clear-business-member-archive-confirmation">Clear Archive</a> 
          <?php 
                  if ($business_member_results != null)
                  {
                    echo '<div class="table-responsive">';
                    echo '<table class="table table-responsive table-hover">';
                    echo '<thead>';
                    echo '<tr>';                    
                    echo    '<th>Company</th>';
                    echo     '<th>Website</th>';
                    echo    '<th>Email</th>';
                    echo    '<th>Edit Data</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                  
                  foreach ($business_member_results as $business_member_result)
                  {
                    echo '<tr>';
                    
                    echo '<td>';
                    echo $business_member_result['CompanyName'];
                    echo '</td>';
                    
                    echo '<td>';
                    echo $business_member_result['WebsiteURL'];
                    echo '</td>';
                    
                    echo '<td>';
                    echo $business_member_result['Email'];
                    echo '</td>';
                    
                    $value = $business_member_result['Email'];
                    echo '<td>';
                    if ($business_member_result['Flag'] == 'Active')
                    {
                        echo '<a href="administrator-delete-page.php?id='.$value.'&amp;category=business_member" class="btn btn-link">Remove</a>'; 
                    }                    
                    echo '<a href="administrator-view-details.php?id='.$value.'&amp;category=business_member" class="btn btn-link">View Details</a>';
                    echo '</td>';
                    
                    echo '</tr>'; 
                  }
                    echo '</tbody>';
                    echo '</table>'; 
                    echo '</div>';
                  }
                  else 
                  {
                    echo '<div class="table-responsive">';
                    echo '<table class="table table-responsive table-hover">';
                    echo '<thead>';
                    echo '<tr>';                    
                    echo    '<th>Company</th>';
                    echo     '<th>Website</th>';
                    echo    '<th>Email</th>';
                    echo    '<th>Edit Data</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    
                      echo '<tr>';
                      echo '<td colspan="3">';
                      echo 'No Records Available!';
                      echo '</td>';
                      echo '</tr>';
                      
                       echo '</tbody>';
                    echo '</table>'; 
                    echo '</div>';
                  }
                  ?>
                <hr class="featurette-divider">
                  <h3 class="page-header">Individual Members</h3> 
                  <button class="btn btn-info" data-toggle="modal" data-target="#mail_individual_members">Send Notifications</button>
                  <a href="administrator-members-page.php?individual_view=<?php echo $individual_text; ?>" class="btn btn-warning"><?php echo $individual_text; ?></a>                
                <a class="btn btn-warning" data-toggle="modal" data-target="#remove-individual-member-archive-confirmation">Remove All</a> 
                <a class="btn btn-danger" data-toggle="modal" data-target="#clear-individual-member-archive-confirmation">Clear Archive</a> 
                <?php 
                  if ($regular_member_results != null)
                  {
                    echo '<div class="table-responsive">';
                    echo '<table class="table table-responsive table-hover">';
                    echo '<thead>';
                    echo '<tr>';                    
                    echo   '<th>Name</th>';
                    echo   '<th>City</th>';
                    echo   '<th>Email</th>';
                    echo   '<th>Edit Data</th>';
                    echo'</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                  
                  foreach ($regular_member_results as $regular_member_result)
                  {
                    echo '<tr>';
                    
                    echo '<td>';
                    echo $regular_member_result['Name'] . ' ' . $regular_member_result['Surname'];
                    echo '</td>';
                    
                    echo '<td>';
                    echo $regular_member_result['City'];
                    echo '</td>';
                    
                    echo '<td>';
                    echo $regular_member_result['Email'];
                    echo '</td>';
                    
                    $value = $regular_member_result['Email'];
                    echo '<td>';
                    if ($regular_member_result['Flag'] == 'Active')
                    {
                        echo '<a href="administrator-delete-page.php?id='.$value.'&amp;category=regular_member" class="btn btn-link">Remove</a>'; 
                    }                    
                    echo '<a href="administrator-view-details.php?id='.$value.'&amp;category=regular_member" class="btn btn-link">View Details</a>';
                    echo '</td>';
                    
                    echo '</tr>'; 
                  }
                    echo '</tbody>';
                    echo '</table>'; 
                    echo '</div>';
                  }
                  else 
                  {
                      echo '<div class="table-responsive">';
                    echo '<table class="table table-responsive table-hover">';
                    echo '<thead>';
                    echo '<tr>';                    
                    echo   '<th>Name</th>';
                    echo   '<th>City</th>';
                    echo   '<th>Email</th>';
                    echo   '<th>Edit Data</th>';
                    echo'</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    
                      echo '<tr>';
                      echo '<td colspan="3">';
                      echo 'No Records Available!';
                      echo '</td>';
                      echo '</tr>';
                      
                    echo '</tbody>';
                    echo '</table>'; 
                    echo '</div>';
                  }
                  ?> 
      </div>
          
    <form action="php/remove-business-member-all.php" method="post">
      <div class="modal fade modal-form" id="remove-business-member-archive-confirmation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Remove All</h4>            
          </div>
            <div class="modal-body">
                <p>Are you sure you wish to remove all data for business members?</p>
            </div>            
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            <button name="article_submit" type="submit" class="btn btn-danger">Yes</button>
          </div>
        </div>
      </div>
    </div>
    </form>
      
    <form action="php/remove-business-member-archive.php" method="post">
      <div class="modal fade modal-form" id="clear-business-member-archive-confirmation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Clear Archives</h4>            
          </div>
            <div class="modal-body">
                <p>Are you sure you wish to clear all data for business members?</p>
            </div>            
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            <button name="article_submit" type="submit" class="btn btn-danger">Yes</button>
          </div>
        </div>
      </div>
    </div>
    </form>   
          
    <form action="php/remove-individual-member-all.php" method="post">
      <div class="modal fade modal-form" id="remove-individual-member-archive-confirmation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Remove All</h4>            
          </div>
            <div class="modal-body">
                <p>Are you sure you wish to remove all data for individual members?</p>
            </div>            
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            <button name="article_submit" type="submit" class="btn btn-danger">Yes</button>
          </div>
        </div>
      </div>
    </div>
    </form>
      
    <form action="php/remove-individual-member-archive.php" method="post">
      <div class="modal fade modal-form" id="clear-individual-member-archive-confirmation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Clear Archives</h4>            
          </div>
            <div class="modal-body">
                <p>Are you sure you wish to clear all data for individual members?</p>
            </div>            
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            <button name="article_submit" type="submit" class="btn btn-danger">Yes</button>
          </div>
        </div>
      </div>
    </div>
    </form>   
          
    
      <form action="php/mail-business-members.php" method="post">
      <div class="modal fade modal-form" id="mail_business_members" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Send Notifications to Business Members</h4>            
          </div>
            <div class="modal-body">                
                <label>Subject</label><input type="text" name="subject">
                <br />
                <br />
                <label>Message</label><textarea name="body"></textarea>
            </div>            
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-danger">Send</button>
          </div>
        </div>
      </div>
    </div>
    </form>
          
    <form action="php/mail-individual-members.php" method="post">
      <div class="modal fade modal-form" id="mail_individual_members" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Send Notifications to Individual Members</h4>            
          </div>
            <div class="modal-body">                
                <label>Subject</label><input type="text" name="subject">
                <br />
                <br />
                <label>Message</label><textarea name="body"></textarea>
            </div>            
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-danger">Send</button>
          </div>
        </div>
      </div>
    </div>
    </form>
    

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/holder.js"></script>
    <script> 
        function buttonPresentation()
        {
            var buttonValue = document.getElementById("view-all-subscribers").innerHTML;                  
            if (buttonValue == "View All")
                document.getElementById("view-all-subscribers").innerHTML = "View Less";
            else 
                document.getElementById("view-all-subscribers").innerHTML = "View All";
        }
    </script>
  </body>
</html>

