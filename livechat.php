<?php
session_start();
if(!isset($_SESSION['email'])&& !isset($_SESSION['chattopic'])){

header("location:".'index.php?company='.$_SESSION['company'].'');

}
$company=$_SESSION['company'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" type="text/css" href="style/material design lite/material.min.css">
  <script src="style/material design lite/material.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="css/normalize.css">

        <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
    
   <link rel="stylesheet" type="text/css" href="style/bootstrap/css/bootstrap.min.css">
 
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="js/index.js"></script>
  <script src="style/bootstrap/js/bootstrap.min.js"></script>
  

<title>Live Chat</title>
<link href="../admintemp/css/font-awesome.min.css" rel="stylesheet" type="text/css">
 <style type="text/css">

      .main-dialog-class .ui-widget-header{background: url("css/blur-1889747_960_720.jpg") repeat-x scroll 34px 42px #566573;color:white;font-size:16px;border:0;text-transform:uppercase}
.main-dialog-class .ui-widget-content{background-image:none;background-color:#ABB289;}
 

  </style>
</head>

<body onload="nothing(); scrollDown();">
  <?php
 require 'inc/databaseconn.php';
$chatwidget_query=mysqli_query($conn,"SELECT * FROM chatwidget_customization WHERE company='$company'");
if ($chatwidget_query) {
while ($fetch_query2=mysqli_fetch_array($chatwidget_query,MYSQLI_ASSOC)) {

echo ' <button class="mdl-button" title="Click to maximise" id="maximise" onclick="maximise();" style="background-color:#'.$fetch_query2['headerBackground'].';color:#'.$fetch_query2['headerText'].'; ">Live chat<i class="fa fa-fw" aria-hidden="true">&#xf106</i>
</button> 
   <div class="chat-box" id="chat-box">
 
    <div class="chat-header" style="background-color:#'.$fetch_query2['headerBackground'].';color:#'.$fetch_query2['headerText'].'; ">

  <div class="text-center"><button class="mdl-button" title="minimise"  onclick="minimise();"> <i class="fa fa-fw" aria-hidden="true">&#xf107</i>
</button></div>
<!-- dialog begins here-->
<div id="dialog"  style=" display: none;
  padding: 0.5em 1em;
  background: linear-gradient(40deg, rgba(255, 255, 255, 0.2) 00%, rgba(255, 255, 255, 0.3) 100%);
  border-radius: 3px;
  box-shadow: 0 5px 30px rgba(255, 255, 255, 0.1);">
  <p>Please rate this chat <i style="font-size:20px; color:#1B2631;" class="fa fa-fw" aria-hidden="true"> &#xf118</i></p>

 <form action="livechat_logout.php?feedback=feedback" method="GET"> <input type="text" name="feedback" id="feedback" class="form-control" placeholder="we need your feedback">
    <div style="margin-top: 20px;">
  <a href="livechat_logout.php?rate=1 star"><i class="material-icons" title="very poor" onmouseover="changeClr();" onmouseout="normalClr();" style="font-size:30px;">star</i></a>
<a href="livechat_logout.php?rate=2 stars"><i class="material-icons" title="poor" onmouseover="changeClr1();" onmouseout="normalClr1();" style="font-size:30px;">star</i></a>
<a href="livechat_logout.php?rate=3 stars"><i class="material-icons" title="average" onmouseover="changeClr2();" onmouseout="normalClr2();" style="font-size:30px;">star</i></a>
<a href="livechat_logout.php?rate=4 stars"><i class="material-icons" title="good" onmouseover="changeClr3();" onmouseout="normalClr3();" style="font-size:30px;">star</i></a>
<a href="livechat_logout.php?rate=5 stars"><i class="material-icons" title="excellent" onmouseover="changeClr4();" onmouseout="normalClr4();" style="font-size:30px;">star</i></a>
</div>
<p><a href="livechat_logout.php"> <button class="mdl-button pull-right">Logout</button></a></p></form>
</div>
 

  

<!-- dialog ends here-->
   <h1 style="padding-left: 5px; padding-bottom: 10px;">LiveChat <small style="color: grey; text-align: center;"> </small><button type="button" id="opener" onclick="openDialog();" title="End Conversation" class="mdl-button pull-right"><i class="glyphicon glyphicon-log-out"></i>Close
</button></h1>
   
    </div>
 <div class="chat-container" id="cont1" style="background-color:#'.$fetch_query2['bodyBackground'].'; color:#'.$fetch_query2['bodyText'].';">
';


   
    $email=$_SESSION['email'];
    $chattopic=$_SESSION['chattopic'];
    
    $fetch_info= mysqli_query($conn,"SELECT * FROM chat_messages WHERE chattopic='$chattopic' AND activestate=1 AND user_email2='$email' AND company='$company'");

    if ($fetch_info)
     {
          while ($fetch_display=mysqli_fetch_array($fetch_info,MYSQLI_ASSOC)) 
          {
             if ($fetch_display['admin_username']) 
                {
                   echo ' 
                  
                    <!--admin response-->
                       
                         

      <div class="bubble" style="background-color:#'.$fetch_query2['bubbleBackgroundL'].';">
        '.$fetch_display['message'].'
      </div>
      <span class="datestamp"> '.$fetch_display['timeonly'].'</span>

                        
                    <!--admin response end-->';
                }
                
                if ($fetch_display['user_email']) {
                  echo ' <!--user response-->
                  <div class="bubble bubble-alt" style="background-color:#'.$fetch_query2['bubbleBackgroundR'].';">
        '.$fetch_display['message'].'
      </div>
      <span class="datestamp  dt-alt"> '.$fetch_display['timeonly'].'</span>
                           
                             
                            <!--user response end-->
                          ';
                }
       
      }

}
echo '</div>

  <div class="chat-control" style="background-color:#'.$fetch_query2['inputFieldBackground'].'">';
 }
}
 
?>
<div class="container row">
  <form method="POST" enctype="multipart/form-data" 
  id="fileUploadForm">
   <div class="form-group input-group">
    <input class="form-control"  type="text" placeholder="enter your message" id="message" name="message" onkeyup="userTyping();" onkeydown="nothing();" placeholder="Enter Message"/>
     <?php
echo '<input type="hidden" name="email" id="email" value="'. $email.'" >
<input type="hidden" name="chattopic" id="chattopic" value="'. $chattopic.'" > 
<input type="hidden" name="company" id="company" value="'. $company.'" >';
    ?>
    <span class="input-group-btn">  
   <label class="btn btn-default btn-file" style="width: 70px; height: 35px;" type="button"><i class="fa fa-file"></i><input type="file" style="opacity:0; cursor: inherit;" name="fileToUpload" data-input="#filechosen" id="fileToUpload">
   </label>
   <button onClick ="submitChat();" class="btn mdl-js-ripple-effect" name="submit" id="btnSubmit">submit</button>
    </span>    
     <div id="filechosen">
     </div>
      </div> 
    </form>  
  </div>
</div>

</div>
 
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">

<script src="js/jquery-3.2.1.min.js"></script>


  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
            url: "livechat_submit.php",
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

 $( function() {
    $( "#dialog" ).dialog({
       title: 'Hira Live Chat',
            modal: true,
            resizable: false,
            width: 300,
            maxHeight: 400,
            closeText: 'fechar',
            autoOpen:false,
            show: 'fade',
            hide: 'fade',
            dialogClass: 'main-dialog-class',
    });
 
    $( "#opener" ).on( "click", function() {
      $( "#dialog" ).dialog( "open" );
    });
  } );
 
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

 /* function submitChat()
  {
 scrollDown();
        var messagetext  = document.getElementById("message").value;
        var email= document.getElementById("email").value;
         var chattopic= document.getElementById("chattopic").value;
         var attachedfile=document.getElementById("attachedfile").value;
         var company= document.getElementById("company").value;
           var dataString='message='+messagetext+'&email='+email+'&chattopic='+chattopic+'&company='+company+'&attachedfile='+attachedfile;
      if (messagetext=="") 
      {
      return false;
       }
       else{
        // AJAX code to submit form.
        $.ajax({
        type: "POST",
        url: "livechat_submit.php",
         enctype: 'multipart/form-data',
          processData: false,
        data: dataString,
        cache: false,
        success: function(result) {
           $(".chat-container").html(result);
         scrollDown();
         nothing();
         }
          });
       }
      
   

  }*/

  document.body.addEventListener('keydown', function(e) {
  if (e.keyCode == 13) {
   submitChat();
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
        //alert("5 keys"); 
          }
          });
  }
}
//end user is typing



 function changeClr(){
document.getElementsByClassName("material-icons")[0].style.color = "#EED908";
}
 function changeClr1(){
  document.getElementsByClassName("material-icons")[0].style.color = "#EED908";
document.getElementsByClassName("material-icons")[1].style.color = "#EED908";
}
 function changeClr2(){

  document.getElementsByClassName("material-icons")[0].style.color = "#EED908";
document.getElementsByClassName("material-icons")[1].style.color = "#EED908";
document.getElementsByClassName("material-icons")[2].style.color = "#EED908";
}
 function changeClr3(){

  document.getElementsByClassName("material-icons")[0].style.color = "#EED908";
document.getElementsByClassName("material-icons")[1].style.color = "#EED908";
document.getElementsByClassName("material-icons")[2].style.color = "#EED908";
document.getElementsByClassName("material-icons")[3].style.color = "#EED908";
}
 function changeClr4(){

  document.getElementsByClassName("material-icons")[0].style.color = "#EED908";
document.getElementsByClassName("material-icons")[1].style.color = "#EED908";
document.getElementsByClassName("material-icons")[2].style.color = "#EED908";
document.getElementsByClassName("material-icons")[3].style.color = "#EED908";
document.getElementsByClassName("material-icons")[4].style.color = "#EED908";

 }
 function normalClr(){
document.getElementsByClassName("material-icons")[0].style.color = "#3E364E";
 }
 function normalClr1(){
  document.getElementsByClassName("material-icons")[0].style.color = "#3E364E";

document.getElementsByClassName("material-icons")[1].style.color = "#3E364E";
 }
 function normalClr2(){
  document.getElementsByClassName("material-icons")[0].style.color = "#3E364E";

document.getElementsByClassName("material-icons")[1].style.color = "#3E364E";
document.getElementsByClassName("material-icons")[2].style.color = "#3E364E";
 }
 function normalClr3(){

  document.getElementsByClassName("material-icons")[0].style.color = "#3E364E";

document.getElementsByClassName("material-icons")[1].style.color = "#3E364E";
document.getElementsByClassName("material-icons")[2].style.color = "#3E364E";
document.getElementsByClassName("material-icons")[3].style.color = "#3E364E";
 }
 function normalClr4(){

  document.getElementsByClassName("material-icons")[0].style.color = "#3E364E";

document.getElementsByClassName("material-icons")[1].style.color = "#3E364E";
document.getElementsByClassName("material-icons")[2].style.color = "#3E364E";
document.getElementsByClassName("material-icons")[3].style.color = "#3E364E";
document.getElementsByClassName("material-icons")[4].style.color = "#3E364E";
 }
 function minimise(){
  document.getElementById("chat-box").style.display="none";
  document.getElementById("maximise").style.display="block";
 }
function maximise(){
  document.getElementById("chat-box").style.display="block";

  document.getElementById("maximise").style.display="none";
}
 
</script>
</body>
</html>
 