<?php
include("../include/connection.php");

if(isset($_GET['id']))
{
	$name=$_GET['id'];

	
	$query="UPDATE appointment set status='stacked' WHERE id='$name'";

	$result=mysqli_query($conn,$query);

	if($result)
	{
		header("location:online.php");
	}
	else
	{
		echo "fail";
	}
}
?>