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
    <meta name="description" content="">
    <meta name="author" content="">

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
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
                        <a href="admin_dashboard.php" ><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                     <li><a href="admin_search.php?searchquery=blank"><i class="fa fa-search fa-fw"></i> Search Conversations</a></li>
                     <li><a href="#" class="active"><i class="fa fa-star fa-fw"></i> User Ratings </a></li>
                    
                    
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
                        <h1 class="page-header">User Ratings</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                 
                <!-- /.row -->
              
 
<?php
    require 'inc/databaseconn.php';
/*$fetch_info= mysqli_query($conn,"SELECT * FROM chattopic WHERE rate_chat != ''");
if ($fetch_info) {
   while ( $display_result=mysqli_fetch_array($fetch_info, MYSQLI_ASSOC)) {
     
     if ($display_result['rate_chat']=='1 star') {
        $onestar= count($display_result['rate_chat']);
     }
      if ($display_result['rate_chat']=='2 stars') {
        $twostars= count($display_result['rate_chat']);
     }
      if ($display_result['rate_chat']=='3 stars') {
        $threestars= count($display_result['rate_chat']);
     }
      if ($display_result['rate_chat']=='4 stars') {
        $fourstars= count($display_result['rate_chat']);
     }
      if ($display_result['rate_chat']=='5 stars') {
         $fivestars=count($display_result['rate_chat']);
     }
    
   }
}

echo $onestar;
echo $twostars;
echo $threestars;
*/

$fetch_onestar= mysqli_query($conn,"SELECT * FROM chattopic WHERE rate_chat = '1 star' AND company='$company'");
$fetch_twostar= mysqli_query($conn,"SELECT * FROM chattopic WHERE rate_chat = '2 stars' AND company='$company'");
$fetch_threestar= mysqli_query($conn,"SELECT * FROM chattopic WHERE rate_chat = '3 stars' AND company='$company'");
$fetch_fourstar= mysqli_query($conn,"SELECT * FROM chattopic WHERE rate_chat = '4 stars' AND company='$company'");
$fetch_fivestar= mysqli_query($conn,"SELECT * FROM chattopic WHERE rate_chat = '5 stars' AND company='$company'");

$onestar=mysqli_num_rows($fetch_onestar);
$twostars=mysqli_num_rows($fetch_twostar);
$threestars=mysqli_num_rows($fetch_threestar);
$fourstars=mysqli_num_rows($fetch_fourstar);
$fivestars=mysqli_num_rows($fetch_fivestar);


    $dataPoints = array(
        array("y" => $onestar, "name" => "One Star Ratings", "exploded" => true),
        array("y" => $twostars, "name" => "Two Star Ratings"),
        array("y" => $threestars, "name" => "Three Star Ratings"),
        array("y" => $fourstars, "name" => "Four Star Ratings"),
        array("y" => $fivestars, "name" => "Five Star Ratings"),
        //array("y" => 7, "name" => "Real Estate")
    );
?>   
 
<div id="chartContainer"></div>
<script type="text/javascript">
$(function () {
var chart = new CanvasJS.Chart("chartContainer", {
    theme: "theme2",
    title:{
        text: "User's Ratings For Chat"
    },
    exportFileName: "chat rating",
    exportEnabled: true,
    animationEnabled: true,     
    data: [
    {       
        type: "pie",
        showInLegend: true,
        toolTipContent: "{name}: <strong>{y}%</strong>",
        indexLabel: "{name} {y}%",
        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
    }]
});
chart.render();
});
</script>
</body>
 
</html>


</div>


<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/startmin.js"></script>

</body>
</html>
