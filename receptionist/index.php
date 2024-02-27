<?php
include("../include/connection.php");
session_start();

//if(!isset($_SESSION['recept']))
//{
//	header("location:../receptionist_login.php");
//}


include("../include/receptHeader.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>HealthCare | Partner with you to enhance the quality of your life.</title>
        <meta name="description" content="Partner with you to enhance the quality of your life.">
        <link rel="icon" type="image/icon" href="include/img/logo.png" />
</head>
<body>

	<div class="container-fluid">
		<?php
		if(!isset($_SESSION['recept']))
		{
			header("location:../receptionist_login.php");
		}
		else
		{
		  $uname=$_SESSION['recept'];
		  $query="SELECT status FROM recept_detail WHERE username='$uname'";

		  $res=mysqli_query($conn,$query);

		  if($res)
		  {
			$status=mysqli_fetch_assoc($res);

			if($status['status']=='pendding')
			{
				include("unapprove_data.php");

			}
			else
			{
				include("approve_data.php");
			}
		  }
			
		}
		
		?>
		
	</div>

</body>
</html>