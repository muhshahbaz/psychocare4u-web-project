<?php

$conn=mysqli_connect("localhost","root","","hms_project");

//$conn=mysqli_select_db($conn,"hms_project");

if(mysqli_connect_error())
{
	echo "found error ".mysqli_connect_error();
}
else
{
	//echo "connection sucess";
}


?>