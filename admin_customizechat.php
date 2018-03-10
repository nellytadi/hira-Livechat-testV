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
<link rel="stylesheet" type="text/css" href="css/style.css">
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

    <!--<iframe src="../customer/livechat.php" align="right" height="600" width="600"></iframe>-->
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
                     <li><a href="admin_viewuser_ratings.php"><i class="fa fa-star fa-fw"></i> User Ratings </a></li>
                    
                    
                     <li><a href="#" class="active"><i class="fa fa-edit fa-fw"></i> Customize Chat Widget</a></li>
                      <li><a href="#" class="disabled"><i class="fa fa-plus fa-fw"></i> Create New User </a></li>
                      
                </ul>

            </div>
        </div>
    </nav>
  <div id="page-wrapper">
    <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Customize Chat Widget <small> to suit your website </small></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

<!--<p>onFineChange gets executed more often, even on the finest change
    as we move mouse over the picker controls.-->
    <?php
  require 'inc/databaseconn.php';
  $query=mysqli_query($conn,"SELECT * FROM chatwidget_customization WHERE company = '$company'");
  $first_query1 =mysqli_num_rows($query);
if ($first_query1 > 0) {
   while( $fetch_query2=mysqli_fetch_array($query,MYSQLI_ASSOC))
    {
     ?>
      <form action="" method="POST" onsubmit="return popUp()">
            <div class="col-lg-3 col-md-3 col-sm-3">
               <label>Pick chat header background color:</label>
                <input class="form-control jscolor {onFineChange:'update(this)'}" value=<?php echo $fetch_query2['headerBackground'];?> name="headerBackground" >

                <label>Pick chat header text color:</label>
                <input class="form-control jscolor {onFineChange:'update1(this)'}" value=<?php echo $fetch_query2['headerText'];?> name="headerText">

                  <label>Pick chat body background color:</label>
<input class="form-control jscolor {onFineChange:'update2(this)'}" value=<?php echo $fetch_query2['bodyBackground'];?> name="bodyBackground" >
<label>Pick chat body text color:</label>
                <input class="form-control jscolor {onFineChange:'update3(this)'}" value=<?php echo $fetch_query2['bodyText'];?>  name="bodyText">

  <label>Pick bubble background color(right):</label>
<input class="form-control jscolor {onFineChange:'update5(this)'}" value=<?php echo $fetch_query2['bubbleBackgroundR'];?> name="bubbleBackgroundR">
  <label>Pick bubble background color(left):</label>
<input class="form-control jscolor {onFineChange:'update4(this)'}" value=<?php echo $fetch_query2['bubbleBackgroundL'];?> name="bubbleBackgroundL" >

  <label>Pick text field background color:</label>
<input class="form-control jscolor {onFineChange:'update6(this)'}" value=<?php echo $fetch_query2['inputFieldBackground'];?> name="inputFieldBackground">

<button class="btn pull-right" name="submit" style="margin-top: 20px;"> SAVE</button>
            </div>
         </form>  
             <div class="col-lg-8 col-md-8 col-sm-8">
    
         <div class="chat-box">
                <div class="chat-header"  id="rect" style=" background-color:#<?php echo $fetch_query2['headerBackground'].';color:#'.$fetch_query2['headerText']; ?>;">
                    <h2>Website</h2>
                </div>
                <div class="chat-container" id="chat-container" style="background-color:#<?php echo $fetch_query2['bodyBackground'].'; color:#'.$fetch_query2['bodyText'];?>;">
                    

                    <div class="bubble bubble-alt" id="bubble-alt" style="background-color:#<?php echo $fetch_query2['bubbleBackgroundL'];?>;">
                       
                        Hello Ayra Stark
                    </div>
                     <span class="datestamp dt-alt">12:01</span>
                      <div class="bubble" id="bubble" style="background-color:#<?php echo $fetch_query2['bubbleBackgroundR'];?>;">
                       Congrats on a job well done!Congrats on a job well done!Congrats on a job well done!
                       Congrats on a job well done!Congrats on a job well done!Congrats on a job well done!
                       Congrats on a job well done!Congrats on a job well done!Congrats on a job well done!
                    </div>
                   
                      <span class="datestamp">12:02</span>

                </div>
                 <div class="chat-control" id="chat-control" style="background-color:#<?php echo $fetch_query2['inputFieldBackground'];?>;">
           
                <div class="col-lg-10 col-md-10 col-sm-10">
                    <input class="form-control" type="text" placeholder="enter your message" id="message" name="message" placeholder="Enter Message"/>
             
                </div>
                  <button class="btn pull-right">submit</button>
                      
          </div>

</div>
 
</div>
   <?php 
    }
}
else{
?>
   
   <form action="" method="POST" onsubmit=" return popUp()" >
            <div class="col-lg-3 col-md-3 col-sm-3">
               <label>Pick chat header background color:</label>
                <input class="form-control jscolor {onFineChange:'update(this)'}" value="FFFFFF" name="headerBackground" >

                <label>Pick chat header text color:</label>
                <input class="form-control jscolor {onFineChange:'update1(this)'}" value="000000" name="headerText">

                  <label>Pick chat body background color:</label>
<input class="form-control jscolor {onFineChange:'update2(this)'}" value="282B59" name="bodyBackground" >
<label>Pick chat body text color:</label>
                <input class="form-control jscolor {onFineChange:'update3(this)'}" value="FFFFFF"  name="bodyText">

  <label>Pick bubble background color(right):</label>
<input class="form-control jscolor {onFineChange:'update5(this)'}" value="595B75" name="bubbleBackgroundR">
  <label>Pick bubble background color(left):</label>
<input class="form-control jscolor {onFineChange:'update4(this)'}" value="595B75" name="bubbleBackgroundL" >

  <label>Pick text field background color:</label>
<input class="form-control jscolor {onFineChange:'update6(this)'}" value="282B59" name="inputFieldBackground">

<button class="btn pull-right" name="submit" style="margin-top: 20px;"> SAVE</button>
            </div>
         </form> 
          <div class="col-lg-8 col-md-8 col-sm-8">
    
         <div class="chat-box">
                <div class="chat-header"  id="rect"style=" background-color:#<?php echo $fetch_query2['headerBackground'].';color:#'.$fetch_query2['headerText']; ?>">
                    <h2>Website</h2>
                </div>
                <div class="chat-container" id="chat-container" style="color: white;">
                    

                    <div class="bubble bubble-alt" id="bubble-alt">
                       
                        Hello Ayra Stark
                    </div>
                     <span class="datestamp dt-alt">12:01</span>
                      <div class="bubble" id="bubble">
                       Congrats on a job well done!Congrats on a job well done!Congrats on a job well done!
                       Congrats on a job well done!Congrats on a job well done!Congrats on a job well done!
                       Congrats on a job well done!Congrats on a job well done!Congrats on a job well done!
                    </div>
                   
                      <span class="datestamp">12:02</span>

                </div>
                 <div class="chat-control" id="chat-control">
           
                <div class="col-lg-10 col-md-10 col-sm-10">
                    <input class="form-control" type="text" placeholder="enter your message" id="message" name="message" placeholder="Enter Message"/>
             
                </div>
                  <button class="btn pull-right">submit</button>
                      
          </div>

</div>
 
</div> 
         <?php
     }
         ?>
   





<script>
  function popUp(){
 var x= confirm('Are you sure you are satisfied with your settings?');
 if (x==false) {
  return false;
 }
}
function update(jscolor) {
    // 'jscolor' instance can be used as a string
document.getElementById('rect').style.backgroundColor = '#' + jscolor;

}
function update1(jscolor) {
    // 'jscolor' instance can be used as a string
document.getElementById('rect').style.color = '#' + jscolor;
}
function update2(jscolor) {
    // 'jscolor' instance can be used as a string
document.getElementById('chat-container').style.backgroundColor = '#' + jscolor;
    
}
function update3(jscolor) {
    // 'jscolor' instance can be used as a string
document.getElementById('chat-container').style.color = '#' + jscolor;
    
}
function update4(jscolor) {
    
document.getElementById('bubble').style.backgroundColor = '#' + jscolor;
}
function update5(jscolor) {
    // 'jscolor' instance can be used as a string
document.getElementById('bubble-alt').style.backgroundColor = '#'+ jscolor;
}
function update6(jscolor) {
    // 'jscolor' instance can be used as a string
document.getElementById('chat-control').style.backgroundColor = '#'+jscolor;
}


</script>
             
 <script src="jscolor/jscolor.js"></script>
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
<?php 
if (isset($_POST['submit'])) {
   
  $headerBackground= $_POST['headerBackground'];
  $headerText= $_POST['headerText'];
  $bodyBackground= $_POST['bodyBackground'];
  $bodyText= $_POST['bodyText'];
  $bubbleBackgroundR=$_POST['bubbleBackgroundR'];
  $bubbleBackgroundL= $_POST['bubbleBackgroundL'];
  $inputFieldBackground= $_POST['inputFieldBackground'];

$first_query=mysqli_query($conn,"SELECT * FROM chatwidget_customization WHERE company = '$company'");
$first_query_result=mysqli_num_rows($first_query);
if ($first_query_result==0) {
   $second_query= mysqli_query($conn, "INSERT INTO chatwidget_customization(id,company,headerBackground,headerText,bodyBackground,bodyText,bubbleBackgroundR,bubbleBackgroundL,inputFieldBackground) VALUES (NULL, '$company','$headerBackground','$headerText','$bodyBackground','$bodyText','$bubbleBackgroundR','$bubbleBackgroundL','$inputFieldBackground')");

}
else if ($first_query_result>0) {
   $second_query=mysqli_query($conn,"UPDATE chatwidget_customization SET headerBackground='$headerBackground' WHERE company='$company'");
   $second_query_one=mysqli_query($conn,"UPDATE chatwidget_customization SET headerText='$headerText' WHERE company='$company'");
   $second_query_two=mysqli_query($conn,"UPDATE chatwidget_customization SET bodyBackground='$bodyBackground' WHERE company='$company'");
   $second_query_three=mysqli_query($conn,"UPDATE chatwidget_customization SET bodyText='$bodyText' WHERE company='$company'");
   $second_query_four=mysqli_query($conn,"UPDATE chatwidget_customization SET bubbleBackgroundR='$bubbleBackgroundR' WHERE company='$company'");
   $second_query_five=mysqli_query($conn,"UPDATE chatwidget_customization SET bubbleBackgroundL='$bubbleBackgroundL' WHERE company='$company'");
   $second_query_six=mysqli_query($conn,"UPDATE chatwidget_customization SET inputFieldBackground='$inputFieldBackground' WHERE company='$company'"); 
}

}
?>