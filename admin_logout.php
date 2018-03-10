<?php
session_start();
if(!isset($_SESSION['username'])){
return false;
}
$username=$_SESSION['username'];
$company=$_SESSION['company'];
require 'inc/databaseconn.php';
$query=mysqli_query($conn,"UPDATE staff_login_information SET active_state=1 WHERE username='$username' AND company='$company'");
if($query){
session_unset();
 header("location:".'index.php?company='.$company.'');
 session_destroy();
}
?>