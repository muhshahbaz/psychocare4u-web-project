<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

</body>
</html>
<nav class="navbar navbar-expand-lg navbar-info bg-info">
		<a href="index.php" style="text-decoration-line: none"><h5 class="text-white">HealthCare</h5></a>

		<div style="margin-left: auto;">
			<ul class="navbar nav">
				<?php
			
			 if(isset($_SESSION['doct']))
				{
					$user=$_SESSION['doct'];
					echo '


				    <li class="navbar-item"><a href="index.php" class="nav-link text-white">'.$user.'</a></li>
				    <li class="navbar-item"><a href="logout.php" class="nav-link text-white">logout</a></li>
				    ';
				}
				


				?>
				
			</ul>
		</div>
		
	</nav>
