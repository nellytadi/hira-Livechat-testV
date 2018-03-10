<?php
session_start();
if (isset($_SESSION['email'])) {
	require 'inc/databaseconn.php';
	$email=$_SESSION['email'];
$chattopic=$_SESSION['chattopic'];
$company=$_SESSION['company'];
$logouttime=date("Y-m-d H:i:s");
$query=mysqli_query($conn,"UPDATE chattopic SET activestate=0 WHERE email='$email' AND chattopic='$chattopic' AND company='$company'");
$query_1=mysqli_query($conn,"UPDATE chattopic SET logout_time ='$logouttime' WHERE email='$email' AND chattopic='$chattopic' AND company='$company'");
$query_2=mysqli_query($conn,"UPDATE chat_messages SET activestate=0 WHERE chattopic='$chattopic' AND company='$company'");

 	}
 if (isset($_GET['rate'])) {
 	$ratechat=$_GET['rate'];
 	$query=mysqli_query($conn,"UPDATE chattopic SET rate_chat='$ratechat' WHERE email='$email' AND chattopic='$chattopic' AND company='$company'");
 }
 if (isset($_GET['feedback'])) {
 	$feedback=$_GET['feedback'];
 	$query=mysqli_query($conn,"UPDATE chattopic SET customer_feedback='$feedback' WHERE email='$email' AND chattopic='$chattopic' AND company='$company'");	
 }
 mysqli_close($conn);
session_unset();
header("location:".'index.php?company='.$company.'');

?>