<?php
session_start();
if(!isset($_SESSION['email'])&& !isset($_SESSION['chattopic'])){
header("location:".'index.php');
}

 
 require 'inc/databaseconn.php';
 //<img id="image" src=uploads/'.$row['passport'].'>
 //implode($_FILES);
 //print_r($_FILES);
if ($_FILES["fileToUpload"]["name"]) {


$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
       // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        //echo "File is not an image.";
        $uploadOk = 0;
    }

// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      $company=$_POST['company'];
  $email=$_POST['email'];
   
  $timeonly=date("H:i:s");
  $date=date("Y-m-d");
   $unix_timestamp=time();
  $chattopic=$_POST['chattopic'];
  $query=mysqli_query($conn,"INSERT INTO chat_messages(id, user_email, dateandtime, images, activestate, chattopic,timeonly,user_email2,company,unix_timestamp) VALUES (NULL,'$email','$date','$target_file',1,'$chattopic','$timeonly','$email','$company','$unix_timestamp')");
       // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

}
else {

$company=$_POST['company'];
  $email=$_POST['email'];
    $message=$_POST['message'];
  $timeonly=date("H:i:s");
  $date=date("Y-m-d");
   $unix_timestamp=time();
  $chattopic=$_POST['chattopic'];
  $query=mysqli_query($conn,"INSERT INTO chat_messages(id, user_email, dateandtime, message, activestate, chattopic,timeonly,user_email2,company,unix_timestamp) VALUES (NULL,'$email','$date','$message',1,'$chattopic','$timeonly','$email','$company','$unix_timestamp')");

}

$company=$_POST['company'];
 $email=$_POST['email'];
  $chattopic=$_POST['chattopic'];

	$chatwidget_query=mysqli_query($conn,"SELECT * FROM chatwidget_customization WHERE company='$company'");
if ($chatwidget_query) {
while ($fetch_query2=mysqli_fetch_array($chatwidget_query,MYSQLI_ASSOC)) {
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
                    if ($fetch_display['Images']) {
                      echo '<div class="bubble">
                      <img src="'.$fetch_display['Images'].'"></div>
                        <span class="datestamp"> '.$fetch_display['timeonly'].'</span>
      ';
                    }
                }
                
                if ($fetch_display['user_email']) {
                  echo ' <!--user response-->
                  <div class="bubble bubble-alt" style="background-color:#'.$fetch_query2['bubbleBackgroundR'].';">
        '.$fetch_display['message'].'
      </div>
      <span class="datestamp  dt-alt"> '.$fetch_display['timeonly'].'</span>
                           
                        
                            <!--user response end-->
                          ';
                           if ($fetch_display['Images']) {
                      echo ' <div class="bubble bubble-alt"><img id="image" width=50 height=50 src="'.$fetch_display['Images'].'"></div>
                       <span class="datestamp  dt-alt"> '.$fetch_display['timeonly'].'</span>' ;
                    }
                }
       
      }

}
}
}
?>
 