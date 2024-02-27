<?php

//fetch.php;
$conn=mysqli_connect("localhost","root","","hms_project");

$data = array();

if(isset($_GET["query"]))
{
	$query="SELECT * FROM medicines WHERE medicin LIKE '%".$_GET["query"]."%'";

	$result=mysqli_query($conn,$query);

	if(mysqli_num_rows($result)>=1)
	{
		while ($row=mysqli_fetch_assoc($result)) {
			$data[]= $row["medicin"];
		}
	}
}
echo json_encode($data);