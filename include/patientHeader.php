<?php
//session_start();
date_default_timezone_set('Asia/Kolkata');
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.slim.js" integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js"></script>

	<!--<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-grid.min.css">
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>-->
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-info bg-info">
		<a href="index.php" style="text-decoration-line: none"><h5 class="text-white">HealthCare</h5></a>

		<div style="margin-left: auto;">
			<ul class="navbar nav">
				<?php
				if(isset($_SESSION['patient']))
				{
					$user=$_SESSION['patient'];

					echo '


				<li class="navbar-item"><a href="index.php" class="nav-link text-white">'.$user.'</a></li>
				<li class="navbar-item"><a href="logout.php" class="nav-link text-white">logout</a></li>
				    ';
				}
				else if(isset($_SESSION['patient']))
				{
					$user=$_SESSION['patient'];
					echo '


				<li class="navbar-item"><a href="index.php" class="nav-link text-white">'.$user.'</a></li>
				<li class="navbar-item"><a href="logout.php" class="nav-link text-white">logout</a></li>
				    ';
				}
				else if(isset($_SESSION['recept']))
				{
					$user=$_SESSION['recept'];
					echo '


				    <li class="navbar-item"><a href="index.php" class="nav-link text-white">'.$user.'</a></li>
				    <li class="navbar-item"><a href="logout.php" class="nav-link text-white">logout</a></li>
				    ';
				}
				else
				{

					echo '
                 <li class="navbar-item"><a href="adminlogin.php" class="nav-link text-white">Admin</a></li>
				<li class="navbar-item"><a href="doctor_login.php" class="nav-link text-white">Doctor</a></li>
				<li class="navbar-item"><a href="patientlogin.php" class="nav-link text-white">Patient</a></li>
				<li class="navbar-item"><a href="receptionist_login.php" class="nav-link text-white">Receptionist</a></li>
					';
				}


				?>
				
			</ul>
		</div>
		
	</nav>

</body>
</html>