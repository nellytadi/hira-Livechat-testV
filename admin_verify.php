<?php
session_start();

if(isset($_POST['submit']))
{	
	require 'inc/databaseconn.php';
	$username=$_POST['username'];
	$password=$_POST['password'];
	$company=$_GET['company'];
	

	$query=mysqli_query($conn,"SELECT * FROM staff_login_information WHERE username='$username' AND active_state=1 AND company='$company'");

	if ($display=mysqli_num_rows($query)) 
	{
		$query_2=mysqli_query($conn,"UPDATE staff_login_information SET active_state=0 WHERE username='$username' AND company='$company'");
	
		$_SESSION['username']=$username;
		$_SESSION['company']=$company;
	  header("location:".'admin_dashboard.php?company='.$company.'');
	}
	else
	{
	 header("location:".'index.php?company='.$company.'');
	 }

	mysqli_close($conn);

}
else{
	  header("location:".'index.php?company='.$company.'');
}

?>
<?php
/*session_start();
if (isset($_POST['submit'])) 
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	$company=$_GET['company'];
	require 'inc/databaseconn.php';

	$query=mysqli_query($conn,"SELECT * FROM staff_login_information WHERE username='$username' AND active_state=1 AND company='$company'");
	$result=mysqli_fetch_array($query,MYSQLI_ASSOC);
	if(password_verify($password,$result['password']))
		{
      $_SESSION['username']=$username;
		 header("location:".'admin_dashboard');	
		}
	else
		{
			echo '<script>return false;</script>';
		}
}
?>