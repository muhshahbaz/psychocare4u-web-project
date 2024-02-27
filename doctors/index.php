<?php
session_start();
include("../include/connection.php");






?>
<!DOCTYPE html>
<html>
<head>
<title>HealthCare | Partner with you to enhance the quality of your life.</title>
        <meta name="description" content="Partner with you to enhance the quality of your life.">
        <link rel="icon" type="image/icon" href="include/img/logo.png" />
	<?php  include("../include/doctorHeader.php"); ?>
</head>
<body>

	<div class="container-fluid">
		<?php

		if(!isset($_SESSION['doct']))
		{
			header("location:../doctor_login.php");
		}
		else
		{
			$uname=$_SESSION['doct'];
		$query="SELECT status FROM doct_detail WHERE username='$uname'";

		$res=mysqli_query($conn,$query);

		if($res)
		{
			$status=mysqli_fetch_assoc($res);

			if($status['status']=='pendding')
			{
				include("unaproved_data.php");

			}
			else
			{
				include("approved_data.php");
			}
		}
		
		}
		
		?>
		
	</div>

</body>
</html>