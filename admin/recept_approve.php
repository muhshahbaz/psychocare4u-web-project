<?php
session_start();
if(!isset($_SESSION['admin']))
{
  header("location:../adminlogin.php");
}
include("../include/connection.php");

$id=$_GET['id'];

$sql="UPDATE recept_detail set status='approve' where username='$id'";

$result=mysqli_query($conn,$sql);

if($result)
{
	header("location:recept_job.php");
}
else
{
	echo "fail";
}
?>