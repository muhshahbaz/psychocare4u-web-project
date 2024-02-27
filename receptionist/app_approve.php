<?php
session_start();
if(!isset($_SESSION['recept']))
{
	header("location:../receptionist_login.php");
}
include("../include/connection.php");
$name=$_GET['id'];

$query="UPDATE appointment set status='approved' WHERE id='$name'";

$res=mysqli_query($conn,$query);

if($res)
{
	header("location:appoinment_req.php");
}
else
{
	echo "Sorry not approved";
}
?>