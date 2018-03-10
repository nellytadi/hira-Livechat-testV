<?php
session_start();
if(!isset($_SESSION['email'])){
return false;
}
if (isset($_POST['message'])) 
	{
	require 'inc/databaseconn.php';
	 $email=$_SESSION['email'];
	 $company=$_POST['company'];
	  $fetch_info=mysqli_query($conn,"SELECT * FROM chat_usertyping WHERE username='$email' AND company='$company'");
	$fetch_display=mysqli_num_rows($fetch_info);
	if ($fetch_display>0) {
		$query=mysqli_query($conn,"UPDATE chat_usertyping SET typingstatus='user is typing...' WHERE username='$email' AND company='$company'");
	}
	else{
	 $query=mysqli_query($conn,"INSERT INTO chat_usertyping(id, username, typingstatus,company) VALUES (NULL,'$email','user is typing...','$company')");
	 }
}
?>
