<?php
include("../include/connection.php");
date_default_timezone_set('Asia/Kolkata');
if(isset($_POST['data']))
{
	$user=$_POST['data'];
	$date=date("Y-m-d");

	$query="SELECT link FROM appointment WHERE app_date='$date' AND pat_username='$user' LIMIT 1";
	$result=mysqli_query($conn,$query);

	if($result)
	{
		while($row=mysqli_fetch_assoc($result))
		echo $row['link'];
	}
	else
	{
		echo "fail";
	}
}

?>