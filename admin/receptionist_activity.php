<?php
session_start();
if(!isset($_SESSION['admin']))
{
  header("location:../adminlogin.php");
}
include("../include/connection.php");
$output="";
$sql="SELECT * FROM reception_log LIMIT 5";
$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0)
{
	$output="
	   <thead>
	   <tr>
	   <td>Name</td>
	   <td>Login</td>
	   <td>Logout</td>
	   </tr>
	   </thead>
	   ";

	   while($row=mysqli_fetch_assoc($result))
	   {
	   	$output.="
	   	   <tr>
	   	   <td>{$row['username']}</td>
	   	   <td>{$row['login']}</td>
	   	   <td>{$row['logout']}</td>
	   	   </tr>
	   	";
	   }
}

echo $output;

?>