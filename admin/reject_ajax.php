<?php
include("../include/connection.php");
if(!isset($_SESSION['admin']))
{
  header("location:../adminlogin.php");
}
$username=$_GET['id'];

$sql="UPDATE doct_detail set status='reject' where username='$username'";

$result=mysqli_query($conn,$sql);

if($result)
{
	header("location:job_req.php");
}
else
{
	echo "fail";
}

?>