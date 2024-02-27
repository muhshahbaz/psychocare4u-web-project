<?php
include("../include/connection.php");
date_default_timezone_set('Asia/Kolkata');
if(isset($_POST['data']))
{
	$user=$_POST['data'];
	$date=date("Y-m-d");

	$query="UPDATE appointment SET link='https://doxy.me/healthcare2' WHERE pat_username='$user' AND app_date='$date'";

	$result=mysqli_query($conn,$query);

	if($result)
	{
		echo "<script>alert('Video Link Sent to Patient Success');</script>";
	}
	else
	{
		echo "operation fail";
	}
}

?>