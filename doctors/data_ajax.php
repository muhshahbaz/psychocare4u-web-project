<?php
include("../include/connection.php");

if(isset($_GET['id']))
{
	$id=$_GET['id'];

	$query="UPDATE appointment SET status='stacked' WHERE id='$id'";

	$result=mysqli_query($conn,$query);

	if($result)
	{
		header("location:pat_medicine.php");
	}
	else
	{
		echo "fail";
	}
}
?>