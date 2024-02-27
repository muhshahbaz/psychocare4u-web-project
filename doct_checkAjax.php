<?php
include("include/connection.php");

if(isset($_POST['user_name']))
{
	$user=$_POST['user_name'];

	$query="SELECT * FROM doct_log WHERE username='$user'";

	$res=mysqli_query($conn,$query);

	if(mysqli_num_rows($res)>0)
	{
		echo '<span class="text-danger">Username not available</span>';
	}
	else
	{
	   echo '<span class="text-success">Username available</span>';	
	}
}

?>