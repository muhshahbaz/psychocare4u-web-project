<?php
include("../include/connection.php");

if(isset($_POST['submit']))
{
	$user=$_POST['user'];
	$bp=$_POST['bp'];
	$weight=$_POST['weight'];

	$query="UPDATE appointment SET blood='$bp', weight='$weight' WHERE pat_username='$user'";

	$res=mysqli_query($conn,$query);

	if($res)
	{
		echo "<script>alert('data updated');</script>";
		header("location:appoinment_req.php");
	}
	else
	{
		echo "not updated";
	}
}
?>