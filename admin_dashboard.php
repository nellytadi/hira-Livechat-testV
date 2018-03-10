  <?php
session_start();
if (!isset($_SESSION['username'])) {
   
    header("location:".'index.php?company='.$_SESSION['company'].'');
}
else{
   session_regenerate_id();
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="livechat, hira live chat, customer service, nigerian livechat, nelly tadi ">
    <meta name="author" content="Hira Live Chat">

    <title>Live Chat</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/startmin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--<iframe src="../customer/livechat.php" align="right" height="600" width="600" style="margin-top: 100px;"></iframe>-->
</head>
<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Live Chat</a>
        </div>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <!-- Top Navigation: Left Menu -->
        <ul class="nav navbar-nav navbar-left navbar-top-links">
            <li><a href="#"><i class="fa fa-home fa-fw"></i><?php if(isset($_SESSION['company'])){$company=$_SESSION['company'];echo $company; }?></a></li>
        </ul>

        <!-- Top Navigation: Right Menu -->
        <ul class="nav navbar-right navbar-top-links">
            <li class="dropdown navbar-inverse">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-comment fa-fw"></i> New Comment
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <?php if (isset($_SESSION['username'])) { echo $_SESSION['username']; }?> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="admin_logout.php" id="openDIalog" ><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">

                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <form action="admin_search.php" method="GET">
                            <input type="text" class="form-control" name="searchquery" placeholder="Search..." style="width: 80%;">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </form>
                        </div>
                    </li>
                    <li>
                        <a href="#" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                     <li><a href="admin_search.php?searchquery=blank"><i class="fa fa-search fa-fw"></i> Search Conversations</a></li>
                     <li><a href="admin_viewuser_ratings.php"><i class="fa fa-star fa-fw"></i> User Ratings </a></li>
                    
                    
                     <li><a href="admin_customizechat.php"><i class="fa fa-edit fa-fw"></i> Customize Chat Widget</a></li>
                      <li><a href="#" class="disabled"><i class="fa fa-plus fa-fw"></i> Create New User </a></li>
                      
                </ul>

            </div>
        </div>
    </nav>

    <!-- Page Content -->

           <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Dashboard</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
              
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">  <?php
                require 'inc/databaseconn.php';
$fetch_info= mysqli_query($conn,"SELECT * FROM chattopic WHERE activestate=1 AND company='$company'");
echo mysqli_num_rows($fetch_info);
$number_of_fetch_info=mysqli_num_rows($fetch_info);
                ?></div>
                                        <div> <?php
                                        if ($number_of_fetch_info==1) {
                                        echo 'Open Conversation!';
                                        }
                                        else{
                                          echo 'Open Conversations!';
                                        }
                                        ?></div>
                                    </div>
                                </div>
                            </div>
                            
                                <div class="panel-footer" title="Details in table below">
                                    <span class="pull-left">Details Below</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-down"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                          
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">12</div>
                                        <div>Website Users!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                          <?php 
                                          $user_ratings= mysqli_query($conn,"SELECT * FROM chattopic WHERE rate_chat != '' AND company='$company'");
                                          echo mysqli_num_rows($user_ratings);
                                          $number_of_user_ratings= mysqli_num_rows($user_ratings);
                                          ?>
                                        </div>
                                        <div> <?php
                                          if ($number_of_user_ratings==1) {
                                           echo ' Chat Rating!';
                                          }
                                          else{
                                            echo ' Chat Ratings!';
                                          }
                                        ?></div>
                                    </div>
                                </div>
                            </div>
                            <a href="admin_viewuser_ratings.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">13</div>
                                        <div>Support Tickets!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

         

</head>
<body>
<!-- Wide card with share menu button -->

<div class="dashboard">

  

<?php


if ($fetch_info) {
echo '<table class="table table-striped" id="myTable" >
<thead style="color: white; background-color:#3F74BC; padding-left: 30px; ">
  <tr>
    <th>CHAT ID</th>
    <th>USER EMAIL</th>
    <th>TOPIC</th>
    <th>TIME OF COMPLAINT</th>
    <th>Respond</th>

  </tr>
  </thead>';

while ($fetch_display=mysqli_fetch_array($fetch_info,MYSQLI_ASSOC)) {
 echo '<tr id='.$fetch_display['id'].'><tbody class="table-items">
    <td> Chat '.$fetch_display['id'].'</td>
    <td>'.$fetch_display['email'].'</td>
    <td>'.$fetch_display['chattopic'].'</td>
    <td>'.$fetch_display['dateandtime'].'</td>
    <td><a href="admin_chat.php?id='.$fetch_display['id'].'&chattopic='.$fetch_display['chattopic'].'&useremail='.$fetch_display['email'].'" target="_blank">  <button type="button" title="Start Conversation" class="btn btn-danger btn-circle btn-lg"><i class="fa fa-edit"></i></button></a></td>
  </tr>';
}
echo '</tbody>
</table>';
}
?>


</div>
 
<!-- jQuery -->
<script src="js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/startmin.js"></script>

</body>
</html>
