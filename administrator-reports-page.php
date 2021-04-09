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

try {    
    require_once 'php/connect.php';
    
    $query1 = 'SELECT * FROM members';    
    $query2 = 'SELECT * FROM subscribers';
    $query3 = "SELECT * FROM members WHERE TypeID = 1";    
    $query4 = "SELECT * FROM members WHERE TypeID = 2";
    
    
    $result1 = mysqli_query($db_conn, $query1);
    $result2 = mysqli_query($db_conn, $query2);
    $result3 = mysqli_query($db_conn, $query3);
    $result4 = mysqli_query($db_conn, $query4);
    
    $no_of_members = mysqli_num_rows($result1);    
    $no_of_subscribers = mysqli_num_rows($result2);
    $no_of_business_members = mysqli_num_rows($result3);    
    $no_of_individual_members = mysqli_num_rows($result4);
        
    mysqli_close($db_conn);
       
    $no_of_members_perc = $no_of_members / 100 * 100;
    $no_of_business_members_perc = $no_of_business_members / 100 * 100;
    $no_of_individual_members_perc = $no_of_individual_members / 100 * 100;
    $no_of_subscribers_perc = $no_of_subscribers / 100 * 100;
}
catch (Exception $e)
{
    echo $e->getMessage();
}
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
    <link rel="stylesheet" href="css/charts.css" type="text/css">

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
            <li><a href="administrator-members-page.php">Members</a></li>
            <li><a href="administrator-messages-page.php">Messages</a></li>
            <li><a href="administrator-projects-page.php">Projects</a></li>
            <li><a href="administrator-schedules-page.php">Schedules</a></li>
            <li><a href="administrator-services-page.php">Services</a></li>            
            <li><a href="administrator-subscribers-page.php">Subscribers</a></li>            
            <li><a href="administrator-technicians-page.php">Technicians</a></li>
            <li class="active"><a href="administrator-reports-page.php">Reports</a></li>
            <li><a href="https://www.google.com/analytics/web/#home/a53796954w86582926p89836863/" target="_blank">Analytics</a></li>       
          </ul>
        </div>
      <div class="col-sm-9 col-sm-offset-5 col-md-10 col-md-offset-4 main">
          <h1 class="page-header">Reports</h1>  
          <h3 class="h3">Total Members</h3>
          <div id="no_of_members" data-dimension="250" data-text="<?= $no_of_members_perc ?>" data-info="New Clients" data-width="30" data-fontsize="38" data-percent="<?= $no_of_members_perc ?>" data-fgcolor="#61a9dc" data-bgcolor="#eee"></div>
          <h3 class="h3">Business Members</h3>
          <div id="no_of_business_members" data-dimension="250" data-text="<?= $no_of_business_members_perc ?>" data-info="New Clients" data-width="30" data-fontsize="38" data-percent="<?= $no_of_business_members_perc ?>" data-fgcolor="#61a9dc" data-bgcolor="#eee"></div>
          <h3 class="h3">Individual Members</h3>
          <div id="no_of_individual_members" data-dimension="250" data-text="<?= $no_of_individual_members_perc ?>" data-info="New Clients" data-width="30" data-fontsize="38" data-percent="<?= $no_of_individual_members_perc ?>" data-fgcolor="#61a9dc" data-bgcolor="#eee"></div>
          <h3 class="h3">Total Subscribers</h3>
          <div id="no_of_subscribers" data-dimension="250" data-text="<?= $no_of_subscribers_perc ?>" data-info="New Clients" data-width="30" data-fontsize="38" data-percent="<?= $no_of_subscribers_perc ?>" data-fgcolor="#61a9dc" data-bgcolor="#eee"></div>            
      </div>  
    </div>
</div>   
      
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/holder.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script>
        (function ($) {

    $.fn.circliful = function (options, callback) {

        var settings = $.extend({
            // These are the defaults.
            fgcolor: "#556b2f",
            bgcolor: "#eee",
            fill: false,
            width: 15,
            dimension: 200,
            fontsize: 15,
            percent: 50,
            animationstep: 1.0,
            iconsize: '20px',
            iconcolor: '#999',
            border: 'default',
            complete: null
        }, options);

        return this.each(function () {
            var customSettings = ["fgcolor", "bgcolor", "fill", "width", "dimension", "fontsize", "animationstep", "endPercent", "icon", "iconcolor", "iconsize", "border"];
            var customSettingsObj = {};
            var icon = '';
            var endPercent = 0;
            var obj = $(this);
            var fill = false;
            var text, info;

            obj.addClass('circliful');

            checkDataAttributes(obj);

            if (obj.data('text') != undefined) {
                text = obj.data('text');

                if (obj.data('icon') != undefined) {
                    icon = $('<i></i>')
                        .addClass('fa ' + $(this).data('icon'))
                        .css({
                            'color': customSettingsObj.iconcolor,
                            'font-size': customSettingsObj.iconsize
                        });
                }

                if (obj.data('type') != undefined) {
                    type = $(this).data('type');

                    if (type == 'half') {
                        addCircleText(obj, 'circle-text-half', (customSettingsObj.dimension / 1.45));
                    } else {
                        addCircleText(obj, 'circle-text', customSettingsObj.dimension);
                    }
                } else {
                    addCircleText(obj, 'circle-text', customSettingsObj.dimension);
                }
            }

            if ($(this).data("total") != undefined && $(this).data("part") != undefined) {
                var total = $(this).data("total") / 100;

                percent = (($(this).data("part") / total) / 100).toFixed(3);
                endPercent = ($(this).data("part") / total).toFixed(3)
            } else {
                if ($(this).data("percent") != undefined) {
                    percent = $(this).data("percent") / 100;
                    endPercent = $(this).data("percent")
                } else {
                    percent = settings.percent / 100
                }
            }

            if ($(this).data('info') != undefined) {
                info = $(this).data('info');

                if ($(this).data('type') != undefined) {
                    type = $(this).data('type');

                    if (type == 'half') {
                        addInfoText(obj, 0.9);
                    } else {
                        addInfoText(obj, 1.25);
                    }
                } else {
                    addInfoText(obj, 1.25);
                }
            }

            $(this).width(customSettingsObj.dimension + 'px');

            var canvas = $('<canvas></canvas>').attr({
			                width: customSettingsObj.dimension,
			                height: customSettingsObj.dimension
			            }).appendTo($(this)).get(0);

            var context = canvas.getContext('2d');
            var x = canvas.width / 2;
            var y = canvas.height / 2;
            var degrees = customSettingsObj.percent * 360.0;
            var radians = degrees * (Math.PI / 180);
            var radius = canvas.width / 2.5;
            var startAngle = 2.3 * Math.PI;
            var endAngle = 0;
            var counterClockwise = false;
            var curPerc = customSettingsObj.animationstep === 0.0 ? endPercent : 0.0;
            var curStep = Math.max(customSettingsObj.animationstep, 0.0);
            var circ = Math.PI * 2;
            var quart = Math.PI / 2;
            var type = '';
            var fireCallback = true;

            if ($(this).data('type') != undefined) {
                type = $(this).data('type');

                if (type == 'half') {
                    startAngle = 2.0 * Math.PI;
                    endAngle = 3.13;
                    circ = Math.PI * 1.0;
                    quart = Math.PI / 0.996;
                }
            }

            /**
             * adds text to circle
             * 
             * @param obj
             * @param cssClass
             * @param lineHeight
             */
            function addCircleText(obj, cssClass, lineHeight) {
                $("<span></span>")
                    .appendTo(obj)
                    .addClass(cssClass)
                    .text(text)
                    .prepend(icon)
                    .css({
                        'line-height': lineHeight + 'px',
                        'font-size': customSettingsObj.fontsize + 'px'
                    });
            }

            /**
             * adds info text to circle
             * 
             * @param obj
             * @param factor
             */
            function addInfoText(obj, factor) {
                $('<span></span>')
                    .appendTo(obj)
                    .addClass('circle-info-half')
                    .css(
                    'line-height', (customSettingsObj.dimension * factor) + 'px'
                );
            }

            /**
             * checks which data attributes are defined
             * @param obj
             */
            function checkDataAttributes(obj) {
                $.each(customSettings, function (index, attribute) {
                    if (obj.data(attribute) != undefined) {
                        customSettingsObj[attribute] = obj.data(attribute);
                    } else {
                        customSettingsObj[attribute] = $(settings).attr(attribute);
                    }

                    if (attribute == 'fill' && obj.data('fill') != undefined) {
                        fill = true;
                    } 
                });
            }

            /**
             * animate foreground circle
             * @param current
             */
            function animate(current) {
                context.clearRect(0, 0, canvas.width, canvas.height);

                context.beginPath();
                context.arc(x, y, radius, endAngle, startAngle, false);

                context.lineWidth = customSettingsObj.width + 1;
                
                context.strokeStyle = customSettingsObj.bgcolor;
                context.stroke();

                if (fill) {
                    context.fillStyle = customSettingsObj.fill;
                    context.fill();
                }

                context.beginPath();
                context.arc(x, y, radius, -(quart), ((circ) * current) - quart, false);

                if (customSettingsObj.border == 'outline') {
                	context.lineWidth = customSettingsObj.width + 13;
                } else if(customSettingsObj.border == 'inline') {
                	context.lineWidth = customSettingsObj.width - 13;
                } 

                context.strokeStyle = customSettingsObj.fgcolor;
                context.stroke();

                if (curPerc < endPercent) {
                    curPerc += curStep;
                    requestAnimationFrame(function () {
                        animate(Math.min(curPerc, endPercent) / 100);
                    }, obj);
                }

                if(curPerc == endPercent && fireCallback && typeof(options) != "undefined") {
                	if($.isFunction( options.complete )) {
		            	options.complete();

		            	fireCallback = false;
		            }
                }
            }

            animate(curPerc / 100);

        });
    };
}(jQuery));

$( document ).ready(function() {
        $('#no_of_members').circliful();
		$('#no_of_business_members').circliful();
		$('#no_of_individual_members').circliful();
		$('#no_of_subscribers').circliful();
    });
    </script>
  </body>
</html>

