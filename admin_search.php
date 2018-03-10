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
    <!--<iframe src="../customer/livechat.php" align="right" height="600" width="600"></iframe>-->

     <style type="text/css">

      .main-dialog-class .ui-widget-header{background: url("css/blur-1889747_960_720.jpg") repeat-x scroll 34px 42px #566573;color:white;font-size:16px;border:0;text-transform:uppercase}
.main-dialog-class .ui-widget-content{background-image:none;background-color:#ABB289;}
.ui-dialog{z-index:1040 !important;}
  </style>
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
                            <input type="search" class="form-control" name="searchquery" placeholder="Search..." style="width: 80%;">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </form>
                        </div>
                    </li>
                    <li>
                        <a href="admin_dashboard.php" ><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                     <li><a href="admin_search.php?searchquery=blank" class="active"><i class="fa fa-search fa-fw"></i> Search Conversations</a></li>
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
                    <div class="col-lg-12" >
                     

                        <form class="form-inline pull-right" action="admin_search.php" method="GET">
                            <div class="alert alert-info" style="margin-top: 40px; margin-right:30px;">
                                 
  <label>From:</label><input type="time" class="input-small form-control" name="fromtime" value="00:00">

  <input type="text" class="input-small form-control datepicker" name="fromdate" placeholder="mm/dd/yy">
 <label>To:</label><input type="time" class="input-small form-control" name="totime" value="00:00">

  <input type="text" class="input-small form-control datepicker" placeholder="mm/dd/yy" name="todate">
  <button type="submit" class="btn">Submit</button>
                                </div>
</form>
                          
                   
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                 <!-- /.col-lg-12 -->
                        <div class="row">
                            <div class="container">
                                <div class="col-lg-11">
                                  
                                       
                            <!-- /.panel-heading -->
                                         
                                            <?php

                                              require 'inc/databaseconn.php';
                                             
                                             if (isset($_GET['fromtime'])&& isset($_GET['fromdate'])) {
                                               $fromtime=$_GET['fromtime'];
                                               $fromdate=$_GET['fromdate'];
                                               $totime=$_GET['totime'];
                                                $todate=$_GET['todate'];
                                               //echo $fromtime;
                                                $fromtimedate=strtotime($fromdate.' '.$fromtime);
                                                $totimedate=strtotime($todate.' '.$totime);

                                            $query=mysqli_query($conn,"SELECT * FROM chat_messages WHERE unix_timestamp>=$fromtimedate AND unix_timestamp<=$totimedate");
                                            $query_2=mysqli_query($conn,"SELECT * FROM chattopic WHERE unix_timestamp>=$fromtimedate AND unix_timestamp<=$totimedate");
                                             $num_searchtable=mysqli_num_rows($query);
                                             $num_searchtable2=mysqli_num_rows($query_2);
                                             if ($num_searchtable==0) {
                                                 echo '<div class="panel panel-default"> <div class="panel-heading">
                                           Search results for Chat Topic

                                        </div><div class="panel-body"> No results</div></div>';
                                             }

                                     if ($num_searchtable>0) {
                                           
                                                echo '<div class="panel panel-default"> <div class="panel-heading">
                                           Search results for Chat Topic<button class="btn-primary pull-right" id="buttonExtract"> Export</button>

                                        </div><div class="panel-body">
                                        <div class="table-responsive table-bordered" style="overflow-y: scroll; height: 200px;">
                                            <table class="table" id="table2excel">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Email</th>
                                                <th>Chat Topic</th>
                                                <th>Login Time</th>
                                                <th>Logout Time</th>
                                            </tr>
                                        </thead>';
                        while ( $search_result=mysqli_fetch_array($query_2,MYSQLI_ASSOC)) 
                        {
                          echo ' <tbody>
                                            <tr>
                                                <td>'.$search_result['id'].'</td>
                                                <td>'. $search_result['email'].'</td>
                                                <td>'.$search_result['chattopic'] .' </td>
                                                <td>'.$search_result['dateandtime'].'</td>
                                                <td>'.$search_result['logout_time'].'</td>
                                            </tr>';
                        }  echo '</tbody>
                                    </table>
                                </div></div>';
                                        }
                                                if ($num_searchtable2==0) {
                                                 echo '<div class="panel panel-default"> <div class="panel-heading">
                                          Search results for Conversations

                                        </div><div class="panel-body"> No results</div></div>';
                                             }
                                     if ($num_searchtable2>0) {
                                               
                                              echo ' <div class="panel panel-default">
                                        <div class="panel-heading">
                                           Search results for Conversations<button class="btn-primary pull-right" id="buttonExtract1"> Export</button>
                                        </div>
                          
                                    <div class="panel-body">
                                        <div class="table-responsive table-bordered" style="overflow-y: scroll; height: 200px;">
                                            <table class=" table" id="table2excel1" ><thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Responded by</th>
                                                <th>Responded to</th>
                                                <th>Chat Topic</th>
                                                <th>Message</th>
                                                <th>Date and Time</th>
                                            </tr>
                                        </thead>';
                        while ( $search_result=mysqli_fetch_array($query,MYSQLI_ASSOC)) 
                        {
                          echo ' <tbody>
                                            <tr>
                                                <td>'.$search_result['id'].'</td>
                                                <td>'. $search_result['admin_username'].'</td>
                                                <td>'.$search_result['user_email'].' </td>
                                                <td>'.$search_result['chattopic'].' </td>
                                                <td>'.$search_result['message'].'</td>
                                                <td>'.$search_result['dateandtime'].' '.$search_result['timeonly'].'</td>
                                            </tr>';
                        }
                        echo '</tbody>
                                    </table>
                                </div>';
                                            }
                                              

                                             }
                                              
                                               if (isset($_GET['searchquery']))
                                            {
                                                  $searchquery=$_GET['searchquery'];
                                              
                                              if ($searchquery=='blank' || $searchquery=='') {

                                                 echo '<div id="dialog_1" style="display: none; " title="Basic dialog">
                                              
                                               <h4>Search using text</h4>
                            <form action="admin_search.php" method="GET">

                              <div class="col-lg-12">
                                   <div class="col-lg-2">
                                   <label>Text:</label>
                                   </div>
                                   <div class="col-lg-6">
                            <input type="search" class="form-control" name="searchquery" placeholder="Text">
                               </div>
                                 <div class="col-lg-4"></div>
                                    <button class="btn btn-primary" type="submit" style="margin-left:220px; margin-top:20px;">
                                        submit
                                    </button>
                            </form>
                 
                                               <h4>Search using date and time</h4>
                            <form action="admin_search.php" method="GET">

                            <div class="col-lg-12">
                                   <div class="col-lg-2">
                                   <label>From:</label>
                                   </div>
                                    <div class="col-lg-4">
                                    <input type="time" class="form-control" name="fromtime" value="00:00">
                                    </div> 
                            <div class="col-lg-6">
                                <input type="text" class="form-control datepicker" name="fromdate" placeholder="mm/dd/yy" >
                            </div>
                            </div> <div class="col-lg-12">
                                   <div class="col-lg-2">
                                   <label>To:</label>
                                   </div>
                                    <div class="col-lg-4">
                                    <input type="time" class="form-control" name="totime" value="00:00">
                                    </div> 
                            <div class="col-lg-6">
                                <input type="text" class="form-control datepicker" name="todate" placeholder="mm/dd/yy" >

                            </div>
                            </div>
                            <button class="btn btn-primary" type="submit" style="margin-left:220px; margin-top:20px;">
                                        submit
                                    </button>
                            </form>
                       </div>';
                                              }
                                              else{
                                            //  echo $searchquery;
                     $search_table= mysqli_query($conn,"SELECT * FROM chattopic WHERE chattopic LIKE  '%$searchquery%' AND company='$company'");
                    $num_searchtable=mysqli_num_rows($search_table);
                        if ($num_searchtable==0) {
                                                 echo '<div class="panel panel-default"> <div class="panel-heading">
                                           Search results for Chat Topic

                                        </div><div class="panel-body"> No results</div></div>';
                                             }
                     if ($num_searchtable>0) {
                    echo '    <div class="panel panel-default"> <div class="panel-heading">
                                           Search results for Chat Topic <button class="btn-primary pull-right" id="buttonExtract2"> Export</button>
                                        </div><div class="panel-body">
                                        <div class="table-responsive table-bordered" style="overflow-y: scroll; height: 200px;">
                                           <table class="table" id="table2excel2" >
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Email</th>
                                                <th>Chat Topic</th>
                                                <th>Login Time</th>
                                                <th>Logout Time</th>
                                            </tr>
                                        </thead>';
                        while ( $search_result=mysqli_fetch_array($search_table,MYSQLI_ASSOC)) 
                        {
                          echo ' <tbody>
                                            <tr>
                                                <td>'.$search_result['id'].'</td>
                                                <td>'. $search_result['email'].'</td>
                                                <td>'.$search_result['chattopic'] .' </td>
                                                <td>'.$search_result['dateandtime'].'</td>
                                                <td>'.$search_result['logout_time'].'</td>
                                            </tr>';
                        }
                        echo '</tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>';
                     }
                    
                    ?>

                            <!-- /.panel-body -->
                      
                <!-- /.row -->
            
                                                
                                    
                                                                
                                            <?php
                                           
                     $search_table2= mysqli_query($conn,"SELECT * FROM chat_messages WHERE message LIKE  '%$searchquery%' AND company='$company'");
                    $num_searchtable2=mysqli_num_rows($search_table2);
                        if ($num_searchtable2==0) {
                                                   echo '<div class="panel panel-default"> <div class="panel-heading">
                                           Search results for Conversations

                                        </div><div class="panel-body"> No results</div></div>';
                                             }
                     if ($num_searchtable2>0) {
                    echo '  <div class="panel panel-default">
                                        <div class="panel-heading">
                                           Search results for Conversations <button class="btn-primary pull-right" id="buttonExtract3"> Export</button>
                                        </div>
                            <!-- /.panel-heading -->
                                    <div class="panel-body">
                                        <div class="table-responsive table-bordered" style="overflow-y: scroll; height: 200px;">
                                            <table class="table" id="table2excel3" >
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Responded by</th>
                                                <th>Responded to</th>
                                                <th>Chat Topic</th>
                                                <th>Message</th>
                                                <th>Date and Time</th>
                                            </tr>
                                        </thead>';
                        while ( $search_result=mysqli_fetch_array($search_table2,MYSQLI_ASSOC)) 
                        {
                          echo ' <tbody>
                                            <tr>
                                                <td>'.$search_result['id'].'</td>
                                                <td>'. $search_result['admin_username'].'</td>
                                                <td>'.$search_result['user_email'].' </td>
                                                <td>'.$search_result['chattopic'].' </td>
                                                <td>'.$search_result['message'].'</td>
                                                <td>'.$search_result['dateandtime'].' '.$search_result['timeonly'].'</td>
                                            </tr>';
                        }
                     }
}
                      }
                    ?>
</tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                <!-- /.row -->
              </div>
          </div></div>
      </body>

 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
 
<!-- jQuery -->
<script src="js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/startmin.js"></script>


  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="Export-Html-Table-To-Excel-Spreadsheet-using-jQuery-table2excel/src/jquery.table2excel.js"></script>
  <script>
  $( function() {
    $( "#dialog_1" ).dialog({
        title: 'Hira Search',
            modal: true,
            resizable: false,
            width: 530,
            height:350,
            maxHeight: 400,
            closeText: 'fechar',
            draggable: true,
            autoOpen:true,
            show: 'fade',
            hide: 'fade',
            dialogClass: 'main-dialog-class',
      
    });
 
    $( "#opener" ).on( "click", function() {
      $( "#dialog_1" ).dialog( "open" );
    });
  } );

    $( function() {
    $( ".datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
$("#buttonExtract").click(function(){

  $("#table2excel").table2excel({
    exclude: ".noExl",
    name: "Chattopic date and time",
    filename: "dtchattopic_Hira" //do not include extension
  });
});
$("#buttonExtract1").click(function(){

  $("#table2excel1").table2excel({
    exclude: ".noExl",
    name: "Worksheet Name",
    filename: "dtConversation_Hira" //do not include extension
  });
});
$("#buttonExtract2").click(function(){

  $("#table2excel2").table2excel({
    exclude: ".noExl",
    name: "Worksheet Name",
    filename: "textchattopic_Hira" //do not include extension
  });
});
$("#buttonExtract3").click(function(){
$("#table2excel3").table2excel({
    exclude: ".noExl",
    name: "Worksheet Name",
    filename: "textconversation_Hira" //do not include extension
  });
});

  </script>
  </html>