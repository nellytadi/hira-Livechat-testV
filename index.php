 <!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Live Chat</title>
    
    
    <link rel="stylesheet" href="css/normalize.css">
       <link rel="stylesheet" href="css/style.css">

    
    
    
  </head>
 <?php include ('inc/stylelink.html');?>
 <style type="text/css">
   #demo,#demo2{
    color: black;
    background-color: #9DABBA;
     font-size: 14px;
     font-family: Lucida Calligraphy;
     display: none;
      box-shadow: 2px 2px 2px #96abc4;
      border-radius: 5px;
      padding:5px;
      
   }

 </style>
<body>
<div class="chat-box" style="color: black; padding-left: 30px; padding-right: 20px;">
   <!--Simple Textfield-->
<div class="page-header">
  <h2>Hira LiveChat</h2>
</div>
<?php
if (isset($_GET['company'])) {
  require 'inc/databaseconn.php';
  $company=$_GET['company'];
  $query=mysqli_query($conn,"SELECT * FROM hira_companies WHERE company='$company' AND payment_status='received'");

  if ($display=mysqli_num_rows($query)) 
  {
echo '<form class="form-horizontal" action="" name="myForm" onsubmit="return validate()" method="POST">
    <label class="control-label" for="inputEmail">Email</label>
  
      <input type="email" class="mdl-textfield__input"  id="inputEmail" name="email" placeholder="Enter email">
    
    <p id="demo"></p>
  
    <label class="control-label">Chat Topic</label>
   
      <input type="text" class="mdl-textfield__input"  id="chattopic" name="chattopic" placeholder="Enter chat topic" style="height: 80px;">
   
    <p id="demo2"></p>
  
    <div class="text-center">
    <input type="submit" name="submit" value="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
  </div>
</form>';
}
else{
  echo '<p style="margin:auto;">Oops something is wrong <a href="#" > click here </a> to contact Hira Live Chat customer care</p> ';
}
}
else{
  echo '<p style="margin:auto;">Oops something is wrong <a href="#" > click here </a> to contact Hira Live Chat customer care</p> ';
}
?>


  </div>
  <div class="mdl-card__actions mdl-card--border">
   
  </div>
 
</div>

<script type="text/javascript">
  function validate(){
    var formvalidate= document.forms["myForm"]["chattopic"].value;
    var formvalidate_2= document.forms["myForm"]["email"].value;
    var text,text2;
    if (formvalidate_2=="") {
      text = "Please Enter Email";
       document.getElementById("demo").style.display="block"
      document.getElementById("demo").innerHTML = text;
      return false;
    }
       
    if (formvalidate=="") {
     text2 = "Please Enter Chat Topic";
     document.getElementById("demo2").style.display="block";
      document.getElementById("demo2").innerHTML = text2;
      return false;
    }

   
    else{
      return true;
    }
  }
</script>
</body>
</html>
<?php
session_start();
if (isset($_POST['submit'])) 
{
	$email=$_POST['email'];
	$chattopic=$_POST['chattopic'];
	$dateandtime=date("Y-m-d H:i:s");
  $unix_timestamp=time();
  $company=$_GET['company'];
	require 'inc/databaseconn.php';
  $first_query=mysqli_query($conn,"SELECT * FROM chattopic WHERE email ='$email' AND activestate=1 AND company='$company'");
  $query_result=mysqli_num_rows($first_query);
  if (!$query_result) {
   $query=mysqli_query($conn,"INSERT INTO chattopic(id,email,chattopic,dateandtime,activestate,company,unix_timestamp) VALUES (null,'$email','$chattopic','$dateandtime',1,'$company','$unix_timestamp')");
   if($query)
    {
      $_SESSION['email']=$email;
      $_SESSION['chattopic']=$chattopic;
      $_SESSION['company']=$company;
      header("location:".'livechat.php');
    }
  return false;
    
  }
  else{
    echo '<script>
    alert("sorry email address is already in use by another user");
    </script>';
  }
	
}
?>