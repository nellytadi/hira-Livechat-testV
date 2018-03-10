<?php
session_start();
if (!isset($_SESSION['username'])) {
	
	header("location:".'index.php');
}
else{
	session_regenerate_id();
}
require 'inc/databaseconn.php';
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
        echo "File is not an image.";
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
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}
else if (isset($_POST['message'])) {
	

  $username=$_SESSION['username'];
  $message=$_POST['message'];
   $timeonly=date("H:i:s");
  $date=date("Y-m-d");

   $unix_timestamp=time();
  $chattopic=$_POST['chattopic'];
  $company=$_POST['company'];
  $email=$_POST['email'];
  $query=mysqli_query($conn,"INSERT INTO chat_messages(id, admin_username, dateandtime, message, activestate, chattopic,timeonly,user_email2,company,unix_timestamp) VALUES (NULL,'$username','$date','$message',1,'$chattopic','$timeonly','$email','$company','$unix_timestamp')");

}


$chattopic=$_POST['chattopic'];
  $email=$_POST['email'];
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
      <span class="datestamp"> '.$fetch_display['timeonly'].'</span>
                          
                          <!--admin response end-->';
                           if ($fetch_display['Images']) {
                      echo ' <div class="bubble "><img id="image" width=50 height=50 src="'.$fetch_display['Images'].'"></div>
                       <span class="datestamp"> '.$fetch_display['timeonly'].'</span>' ;
                    }
                          }
                          if ($fetch_display['admin_username']) 
                           {
                           echo ' <!--user response-->
                  <div class="bubble bubble-alt">
        '.$fetch_display['message'].'
      </div>
      <span class="datestamp  dt-alt"> '.$fetch_display['timeonly'].'</span>
                           
                             
                            <!--user response end-->
                                    ';
                                     if ($fetch_display['Images']) {
                      echo '<div class="bubble bubble-alt">
                      <img src="'.$fetch_display['Images'].'"></div>
                        <span class="datestamp dt-alt"> '.$fetch_display['timeonly'].'</span>
      ';
                    }
                          }
                 
                }

          }
else{
	header("location:".'admin_chat.php');
}

?>