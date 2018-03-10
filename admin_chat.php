<?php
session_start();
if(!isset($_SESSION['username'])){
header("location:".'index.php?company='.$company.'');
}
else{
  session_regenerate_id();
}
if (!isset($_GET['id'])) {
  header("location:".'admin_dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

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


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body onload="nothing(); scrollDown();">

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
<div id="dialog" style="display: none;" title="LiveChat ">
          <p>Are you sure you want to Logout?</p>
          
        <p><button class="mdl-button">Cancel</button>
          <a href="admin_logout.php"> <button class="mdl-button pull-right">Logout</button></a></p>

        </div>
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
                        <a href="admin_dashboard.php" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
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
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" >
  Chat Topic: <small><?php echo ucwords($_GET['chattopic']);?></small></h1>
                </div>
            

            <!-- ... Your content goes here ... -->

<h4 style="color: grey;  padding-left: 15px;"><?php if (isset($_GET['chattopic'])) {
     echo '<a href="admin_endconversation.php?chattopic='.$_GET['chattopic'].' &useremail='.$_GET['useremail'].'"> <button style="margin-left:350px;" class="btn" title="click to end conversation">  <i class="fa fa-close"></i> End conversation</button></a></h4>';
    $chattopic=$_GET['chattopic'];
   // $_SESSION['chattopic']=$chattopic;
    }?>
    </div>
  <div class="chat-box">
   
   
   <!-- Left aligned menu below button -->


    
    
 
    
    <div class="chat-container active" id='cont1' >
      <?php
          require 'inc/databaseconn.php';
          $email=$_GET['useremail'];
          //$_SESSION['email']=$email;
         // $chattopic=$_SESSION['chattopic'];
          $fetch_info= mysqli_query($conn,"SELECT * FROM chat_messages WHERE chattopic='$chattopic' AND activestate=1 AND user_email2='$email' AND company='$company'");

          if ($fetch_info)
           {
                while ($fetch_display=mysqli_fetch_array($fetch_info,MYSQLI_ASSOC)) 
                {
                       if ($fetch_display['user_email']) 
                          {
                             echo ' 
                          <!--admin response-->
                           <div class="bubble">
        '.$fetch_display['message'].'
      </div>
      <span class="datestamp">'.$fetch_display['timeonly'].'</span>
                          
                          <!--admin response end-->';
                          }
                          if ($fetch_display['admin_username']) 
                           {
                           echo ' <!--user response-->
                  <div class="bubble bubble-alt">
        '.$fetch_display['message'].'
      </div>
      <span class="datestamp  dt-alt">'.$fetch_display['timeonly'].'</span>
                           
                             
                            <!--user response end-->
                                    ';
                          }
                 
                }
          }
        
          ?>
      
  </div>
  <div class="chat-control">
   
      <div class="container row col-md-12 col-sm-12 col-lg-12">
<form method="POST" enctype="multipart/form-data" id="fileUploadForm">
<div class="form-group input-group">
    <input class="form-control"  type="text" placeholder="enter your message" id="message" name="message" onkeyup="userTyping();" onkeydown="nothing();" placeholder="Enter Message"/>
     <?php
echo '<input type="hidden" name="email" id="email" value="'. $email.'" >
<input type="hidden" name="chattopic" id="chattopic" value="'. $chattopic.'" > 
<input type="hidden" name="company" id="company" value="'. $company.'" >';
    ?>
    <span class="input-group-btn">  
   <label class="btn btn-default btn-file" style="width: 70px; height: 35px;" type="button"><i class="fa fa-file"></i><input type="file" style="opacity:0; cursor: inherit;" name="fileToUpload" data-input="#filechosen" id="fileToUpload"></label>
   <button onClick ="submitChat();" class="btn mdl-js-ripple-effect" name="submit" id="btnSubmit">submit</button>
    </span>    
    <div id="filechosen">
      
    </div>
        </div> 
        </form>  
 
        </div>
    </div>

</div>

<!-- jQuery -->
<script src="js/jquery.min.js"></script>
  <script src="js/index.js"></script>

<script type="text/javascript">
   $(document).ready(function () {

    $("#btnSubmit").click(function (event) {

        //stop submit the form, we will post it manually.
        event.preventDefault();

        // Get form
        var form = $('#fileUploadForm')[0];

    // Create an FormData object
        var data = new FormData(form);

    // If you want to add an extra field for the FormData
        data.append("CustomField", "This is some extra data, testing");

    // disabled the submit button
        $("#btnSubmit").prop("disabled", true);

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "admin_livechat_submit.php",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function (data) {
              $(".chat-container").html(data);
                $("#btnSubmit").prop("disabled", false);
                 document.getElementById("message").value='';
                 scrollDown();
            },
            error: function (e) {

                $("#btnSubmit").prop("disabled", false);

            }
        });

    });
});
  //code to fill text field with name of file
$(function() {

  // We can attach the `fileselect` event to all file inputs on the page
  $(document).on('change', ':file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });

  // We can watch for our custom `fileselect` event like this
  $(document).ready( function() {
      $(':file').on('fileselect', function(event, numFiles, label) {

          var input = $(this).parents('.input-group').find(':text'),
              log = numFiles > 1 ? numFiles + ' files selected' : label;

          if( input.length ) {
              input.val(log);

           
          } else {
           
              if( log ) alert(log);
          }

      });
  });
  
});

  function scrollDown(){
    var chatHistory = document.getElementById("cont1");
chatHistory.scrollTop = chatHistory.scrollHeight;
  
  }
//to implement user not typing
function nothing(){
  var messagetext = document.getElementById("message").value;
var company= document.getElementById("company").value;
 var dataString='message='+messagetext+'&company='+company;
   if (document.getElementById('message').value.length<=1) {
    
     $.ajax({
        type: "POST",
        url: "userisnottyping.php",
        data: dataString,
        cache: false,
        success: function(html) {
       // alert("0 keys"); 
          }
          });
  }
  }
  //end user is not typing

  document.body.addEventListener('keydown', function(e) {
  if (e.keyCode == 13) {
   submitChat();
    document.getElementById("message").value = '';
  }
});
 var messagetext  = document.getElementById("message").value;
        var email= document.getElementById("email").value;
         var chattopic= document.getElementById("chattopic").value;
           var company= document.getElementById("company").value;
           var dataString='message='+messagetext+'&email='+email+'&chattopic='+chattopic+'&company='+company;
      
setInterval( function(){
        scrollDown();
        $.ajax({
        type: "POST",
        url: "chat_refresh.php",
        data: dataString,
        cache: false,
        success: function(result) {
        $(".chat-container").html(result);
        scrollDown();
         }
          });
        
    }, 250000);
//to implement user is typing
    function userTyping(){
      var messagetext = document.getElementById("message").value;
       var company= document.getElementById("company").value;
 var dataString='message='+messagetext+'&company='+company;
  if (document.getElementById('message').value.length==5) {
   
     $.ajax({
        type: "POST",
        url: "useristyping.php",
        data: dataString,
        cache: false,
        success: function(html) {
      //  alert("5 keys"); 
          }
          });
  }
}
//end user is typing



</script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/startmin.js"></script>

</body>
</html>
