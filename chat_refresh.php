<?php
if (isset($_POST['company']) && isset($_POST['chattopic'])) {
require 'inc/databaseconn.php';
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
         $admin_username= $fetch_display['admin_username'];
      }
      if (!isset($admin_username)) {
       return false;
      }
  else {
    $useristyping=mysqli_query($conn,"SELECT * FROM chat_usertyping WHERE admin= '$admin_username' AND typingstatus ='admin is typing...' AND company='$company'");
                    $display_typing_status=mysqli_fetch_array($useristyping,MYSQLI_ASSOC);
                    if ($display_typing_status)
                    {
                     echo '<p  style="float:left;
  width: auto;
  max-width: 80%;
  position: relative;
  clear: both; 
 
  padding: 0.5em 1em;
  background-color:#'.$fetch_query2['bubbleBackgroundL'].';
  border-radius: 3px;
  box-shadow: 0 5px 30px rgba(255, 255, 255, 0.1);
  margin-bottom: 10px;
  word-wrap: break-word;
  font-size: 1em;
  margin-top: 30px;">'.$display_typing_status['typingstatus'].'</p>';
                    }
                    return false;

  }
      




}
}
}
}
?>
