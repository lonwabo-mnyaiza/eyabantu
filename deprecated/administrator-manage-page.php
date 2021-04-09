<?php    
    
    session_start();
    require_once 'php/connect.php';
    //require_once 'php/login.php';
    
    $query = 'SELECT * FROM projects' or trigger_error(mysqli_error($db_conn));
    $result = mysqli_query($db_conn, $query);
    
    if (mysqli_affected_rows($db_conn) > 0)
    {
        $project_results = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
    }
    
    $query = 'SELECT * FROM administrators';
    $result = mysqli_query($db_conn, $query);
    
    if (mysqli_affected_rows($db_conn) > 0)
    {
        $administrator_results = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
    }
    
    $query = 'SELECT * FROM contact';
    $result = mysqli_query($db_conn, $query);
    
    if (mysqli_affected_rows($db_conn) > 0)
    {
        $contact_results = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
    }
    
    $query = 'SELECT * FROM news';
    $result = mysqli_query($db_conn, $query);
    
    if (mysqli_affected_rows($db_conn) > 0)
    {
        $news_results = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
    }
    
    $query = 'SELECT * FROM services';
    $result = mysqli_query($db_conn, $query);
    
    if (mysqli_affected_rows($db_conn) > 0)
    {
        $service_results = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
    }
    
    $query = 'SELECT * FROM subscribers';
    $result = mysqli_query($db_conn, $query);
    
    if (mysqli_affected_rows($db_conn) > 0)
    {
        $subscribers_results = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
    }
    
    function add_article($title, $desc, $dateMod, $url, $flag)
    {
        $query = "INSERT INTO news (Title, Description, DateModified, URL, Flag) "
                . "VALUES ('$title', '$desc', '$dateMod', '$url', '$flag')" or trigger_error(mysqli_error($db_conn));
        $result = mysqli_query($db_conn, $query);
        
        if (mysqli_affected_rows($db_conn) > 0)
        {            
            mysqli_free_result($result);
            return true;
        }
        else 
        {
            mysqli_free_result($result);
            return true;
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

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Administrator</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><?php echo $_SESSION['user_name']; ?></a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="home.php">Log out</a></li>
            <li><a href="#">Help</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
              <li><a href="administrator.php">Overview</a></li>
            <li class="active"><a href="administrator-manage-page.php">Manage</a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Analytics</a></li> 
            <li><a href="#"><?php echo date("d-m-Y"); ?></a></li> 
            <li><a href="#"><?php echo date("l"); ?></a></li> 
          </ul>
            
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Manage</h1>
          
          <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li class="active"><a href="#projects" role="tab" data-toggle="tab">Projects</a></li>
          <li><a href="#services" role="tab" data-toggle="tab">Services</a></li>
          <li><a href="#messages" role="tab" data-toggle="tab">Messages</a></li>
          <li><a href="#subscribers" role="tab" data-toggle="tab">Subscribers</a></li>
          <li><a href="#articles" role="tab" data-toggle="tab">Articles</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active" id="projects">
              <h2 class="sub-header">Projects</h2>
              <button>Add</button>
              <button>View All</button>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>                    
                    <th>Name</th>
                     <th>Company</th>
                     <th>URL</th>
                     <th>Email</th>
                     <th>Contact</th>
                     <th>Budget</th>
                     <th>Timeline</th>
                     <th>Start Date</th>
                     <th>End Date</th>
                     <th>Description</th>
                     <th>Status</th>
                     <th>Quote Status</th>
                </tr>
              </thead>
              <tbody class="table-hover">
                  <?php 
                  foreach ($project_results as $project_result)
                  {
                    echo '<tr>';
                    
                    echo '<td>';
                    echo $project_result['Name'] . ' ' . $project_result['Surname'];
                    echo '</td>';
                    
                    echo '<td>';
                    echo $project_result['CompanyName'];
                    echo '</td>';
                    
                    echo '<td>';
                    echo $project_result['WebsiteURL'];
                    echo '</td>';
                    
                    echo '<td>';
                    echo $project_result['Email'];
                    echo '</td>';
                    
                    echo '<td>';
                    echo $project_result['PhoneNumber'];
                    echo '</td>';
                    
                    echo '<td>';
                    echo $project_result['Budget'];
                    echo '</td>';
                    
                    echo '<td>';
                    echo $project_result['ProjectTimeline'];
                    echo '</td>';
                    
                    echo '<td>';
                    echo $project_result['DateRequested'];
                    echo '</td>';
                    
                    echo '<td>';
                    echo $project_result['DateCompleted'];
                    echo '</td>';
                    
                    echo '<td>';
                    echo $project_result['Description'];
                    echo '</td>';
                    
                    echo '<td>';
                    echo $project_result['Status'];
                    echo '</td>';
                    
                    echo '<td>';
                    echo $project_result['QuoteStatus'];
                    echo '</td>';
                    
                    echo '<td>';
                    echo '<a>Change</a>  <a>Remove</a>';
                    echo '</td>';
                    
                    echo '</tr>'; 
                  }
                ?>
              </tbody>
            </table>
          </div>
          </div>
          <div class="tab-pane" id="services">
              <h2 class="sub-header">Services</h2>
              <button>Add</button>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>                    
                    <th>Name</th>
                     <th>Description</th>                     
                </tr>
              </thead>
              <tbody class="table-hover">
                  <?php 
                  foreach ($service_results as $service_result)
                  {
                    echo '<tr>';
                    
                    echo '<td>';
                    echo $service_result['Name'];
                    echo '</td>';
                    
                    echo '<td>';
                    echo $service_result['Description'];
                    echo '</td>';
                    
                    echo '<td>';
                    echo '<a>Change</a>  <a>Remove</a>';
                    echo '</td>';
                    
                    echo '</tr>'; 
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
            <div class="tab-pane" id="messages">
                <h2 class="sub-header">Messages</h2>
                <button>View All</button>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>                    
                    <th>Name</th>
                     <th>Email</th>
                     <th>Subject</th>
                     <th>Message</th>
                     <th>Status</th>
                </tr>
              </thead>
              <tbody class="table-hover">
                  <?php 
                  foreach ($contact_results as $contact_result)
                  {
                    echo '<tr>';
                    
                    echo '<td>';
                    echo $contact_result['Name'];
                    echo '</td>';
                    
                    echo '<td>';
                    echo $contact_result['Email'];
                    echo '</td>';
                    
                    echo '<td>';
                    echo $contact_result['Subject'];
                    echo '</td>';
                    
                    echo '<td>';
                    echo $contact_result['Message'];
                    echo '</td>';
                    
                    echo '<td>';
                    echo $contact_result['Status'];
                    echo '</td>';
                    
                    echo '<td>';
                    echo '<a>Remove</a>';
                    echo '</td>';
                    
                    echo '</tr>'; 
                  }
                ?>
              </tbody>
            </table>
          </div>
            </div>
            <div class="tab-pane" id="subscribers">
                <h2 class="sub-header">Subscribers</h2>                
                <button>Send Notifications</button>
                <button>View All</button>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>                    
                    <th>Name</th>
                     <th>Email</th>
                </tr>
              </thead>
              <tbody class="table-hover">
                  <?php 
                  foreach ($subscribers_results as $subscribers_result)
                  {
                    echo '<tr>';
                    
                    echo '<td>';
                    echo $subscribers_result['Name'] . ' ' . $subscribers_result['Surname'];
                    echo '</td>';
                    
                    echo '<td>';
                    echo $subscribers_result['Email'];
                    echo '</td>';
                    
                    echo '<td>';
                    echo '<a class="btn btn-link">Remove</a>';
                    echo '</td>';
                    
                    echo '</tr>'; 
                  }
                ?>
              </tbody>
            </table>
          </div>
            </div>
          <div class="tab-pane" id="articles">
               <h2 class="sub-header">Articles</h2>               
               <button class="btn btn-primary" data-toggle="modal" data-target="#articleModal">Add</button>
               <button class="btn btn-warning">View All</button>               
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>                    
                    <th>Title</th>
                     <th>Description</th>
                     <th>Date Modified</th>
                     <th>URL</th>                     
                </tr>
              </thead>
              <tbody class="table-hover">
                  <?php 
                  foreach ($news_results as $news_result)
                  {
                    echo '<tr>';
                    
                    echo '<td>';
                    echo $news_result['Title'];
                    echo '</td>';
                    
                    echo '<td>';
                    echo $news_result['Description'];
                    echo '</td>';
                    
                    echo '<td>';
                    echo $news_result['DateModified'];
                    echo '</td>';
                    
                    echo '<td>';
                    echo $news_result['URL'];
                    echo '</td>';
                    
                    echo '<td>';
                    echo '<a>Change</a>  <a>Remove</a>';
                    echo '</td>';
                    
                    echo '</tr>'; 
                  }
                ?>
              </tbody>
            </table>
          </div>   
        </div>
        </div>
        
        </div>
      </div>
    </div>
      
      
    <div class="modal fade modal-form" id="articleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
            <button name="article_submit" type="submit" class="btn btn-primary" onclick="addArticle()">Add Article</button>
          </div>
        </div>
      </div>
    </div>    

    <script>
        function addArticle()
        {
            var title = document.getElementById("add_article_title").value;
            var desc = document.getElementById("add_article_description").value;
            var dateMod = new Date(year, month, day);
            var url = document.getElementById("add_article_url").value;
            var flag = "Active";            
            
            var dataManipulation = <?php echo add_article(title, desc, dateMod, url, flag); ?>
            if (dataManipulation == true)
            {
                window.alert("Confirmation", "This is how we will submit");
            }
            else 
            {
                window.alert("No!");
            }
        }
    </script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/holder.js"></script>
    <script>  
        $('#projects a').click(function (e) {
            e.preventDefault()
             $(this).tab('show')
        })
        $('#services a').click(function (e) {
            e.preventDefault()
             $(this).tab('show')
        })
        $('#messages a').click(function (e) {
            e.preventDefault()
             $(this).tab('show')
        })
        $('#subscribers a').click(function (e) {
            e.preventDefault()
             $(this).tab('show')
        })
        $('#articles a').click(function (e) {
            e.preventDefault()
             $(this).tab('show')
        })
    </script>
  </body>
</html>


