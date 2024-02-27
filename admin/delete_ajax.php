<?php
include("../include/connection.php");
if(!isset($_SESSION['admin']))
{
  header("location:../adminlogin.php");
}
if(isset($_GET['id']))
{
	$user=$_GET['id'];
	$query="DELETE doct_log, doct_detail
FROM doct_log
INNER JOIN doct_detail ON doct_log.username = doct_detail.username
WHERE doct_log.username='$user'";

$res=mysqli_query($conn,$query);

if($res)
{
	header("location:doctors.php");
}
else
{
	echo "fail";
}
}

?>