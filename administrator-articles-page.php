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
    
    require 'php/connect.php';
    
    if (isset($_GET['view']) && $_GET['view'] == 'View All')
    {
        $text = 'View Less';
        $query = "SELECT * FROM news ORDER BY DateModified Desc";
        $result = mysqli_query($db_conn, $query);
    }
    else 
    {
        $text = 'View All';
        $query = "SELECT * FROM news Where Flag='Active' ORDER BY DateModified Desc";
        $result = mysqli_query($db_conn, $query);
    }
    
    if (mysqli_affected_rows($db_conn) > 0)
    {
        $news_results = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);   
    }
    else 
    {
        $news_results = null;
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
            <li class="active"><a href="administrator-articles-page.php">Articles</a></li>
            <li><a href="administrator-events-page.php">Events</a></li>
            <li><a href="administrator-members-page.php">Members</a></li>
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
          <h1 class="page-header">Articles</h1>          
              <a href="administrator-add-page.php?category=article" class="btn btn-primary">Add</a>
              <a href="administrator-articles-page.php?view=<?php echo $text; ?>" class="btn btn-warning"><?php echo $text; ?></a> 
              <a class="btn btn-success" data-toggle="modal" data-target="#remove-article-archive-confirmation">Remove All</a>
              <a class="btn btn-danger" data-toggle="modal" data-target="#clear-article-archive-confirmation">Clear Archive</a> 
          <div class="table-responsive">
            <table class="table table-responsive table-hover">
              <thead>
                <tr>                    
                    <th>Title</th>
                     <th>Description</th>
<!--                     <th>Date Modified</th>
                     <th>URL</th>  -->
                     <th>Edit Data</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                  if ($news_results != null)
                  {
                    foreach ($news_results as $news_result)
                    {
                      echo '<tr>';

                      echo '<td>';
                      echo $news_result['Title'];
                      echo '</td>';

                      echo '<td>';
                      echo $news_result['Description'];
                      echo '</td>';

  //                    echo '<td>';
  //                    echo $news_result['DateModified'];
  //                    echo '</td>';
  //                    
  //                    echo '<td>';
  //                    echo $news_result['URL'];
  //                    echo '</td>';                    

                      $value = $news_result['NewsID'];
                      echo '<td>';                    
                      echo '<a href="administrator-change-page.php?id='.$value.'&amp;category=article" class="btn btn-link">Update</a>'; 
                      if ($news_result['Flag'] == 'Active')
                      {
                          echo '  <a href="administrator-delete-page.php?id='.$value.'&amp;category=article" class="btn btn-link">Remove</a>';
                      }
                      echo '<a href="administrator-view-details.php?id='.$value.'&amp;category=article" class="btn btn-link">View Details</a>';
                      echo '</td>';

                      echo '</tr>'; 
                    }
                  }
                  else 
                  {
                      echo '<h3>No Records Available!</h3>';
                  }
                ?>                  
              </tbody>
            </table>               
          </div>        
      </div>
    </div>
    </div>
      
      <form action="php/insert_article.php" method="post">
      <div class="modal fade modal-form" id="addArticleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Add New Article</h4>
          </div>
          <div class="modal-body">
              <input id="add_article_title" name="title" type="text" class="form-control" placeholder="Title" required="true" />
              <textarea id="add_article_description" name="description" maxlength="500" placeholder="Description" required="true">
                  
              </textarea>
              <input id="add_article_url" name="url" type="text" class="form-control" placeholder="URL" required="true" />              
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button name="article_submit" type="submit" class="btn btn-primary">Add Article</button>
          </div>
        </div>
      </div>
    </div>
    </form>
      
      <form action="php/insert_article.php" method="post">
      <div class="modal fade modal-form" id="changeArticleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Change Article</h4>            
          </div>
            <?php            
                echo $final_value;
                //echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '?value=' . $final_value;
                require 'php/connect.php';
                $query = "SELECT Title, Description, URL FROM news WHERE NewsID = '$value'";
                $result = mysqli_query($db_conn, $query) or trigger_error(mysqli_error($db_conn));
                $change_values = mysqli_fetch_array($result, MYSQL_NUM);                
                mysqli_free_result($result);                        
            
                echo '<div class="modal-body">';
                echo '<input id="add_article_title" name="title" type="text" class="form-control" placeholder="Title" required="true" Value="'.$change_values[0].'" />';
                echo '<textarea id="add_article_description" name="description" maxlength="500" placeholder="Description" required="true">';
                echo $change_values[1];
                echo '</textarea>';
                echo '<input id="add_article_url" name="url" type="text" class="form-control" placeholder="URL" required="true" Value="'.$change_values[2].'" />';
                echo '</div>';
            ?>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button name="article_submit" type="submit" class="btn btn-primary">Change Article</button>
          </div>
        </div>
      </div>
    </div>
    </form>
      
      <form action="php/remove-article-all.php" method="post">
      <div class="modal fade modal-form" id="remove-article-archive-confirmation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Remove All</h4>            
          </div>
            <div class="modal-body">
                <p>Are you sure you wish to remove all data for articles?</p>
            </div>            
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            <button name="article_submit" type="submit" class="btn btn-danger">Yes</button>
          </div>
        </div>
      </div>
    </div>
    </form>
      
      <form action="php/remove-article-archive.php" method="post">
      <div class="modal fade modal-form" id="clear-article-archive-confirmation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Clear Archives</h4>            
          </div>
            <div class="modal-body">
                <p>Are you sure you wish to clear all data for articles?</p>
            </div>            
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            <button name="article_submit" type="submit" class="btn btn-danger">Yes</button>
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
    <script src="js/jquery.js"></script>
  </body>
</html>

