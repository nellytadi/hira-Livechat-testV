<?php
session_start();
if (isset($_GET['chattopic']) && isset($_GET['useremail'])) {
	 require 'inc/databaseconn.php';
	 $chattopic=$_GET['chattopic'];
	 $email=$_GET['useremail'];
	 $company=$_SESSION['company'];
	 $query=mysqli_query($conn,"UPDATE chattopic SET activestate=0 WHERE email='$email' AND chattopic='$chattopic' AND company='$company'");
	 $query_1=mysqli_query($conn,"UPDATE chattopic SET logout_time ='$logouttime' WHERE email='$email' AND chattopic='$chattopic' AND company='$company'");
	 $query_table=mysqli_query($conn, "UPDATE chat_messages SET activestate=0 WHERE chattopic='$chattopic' AND company='$company'");
if ($query_table) {
	header("location:".'admin_dashboard.php');
}
}
return false;
?>