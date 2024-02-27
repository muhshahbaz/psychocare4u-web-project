<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>HealthCare | Partner with you to enhance the quality of your life</title>
        <meta name="description" content="Partner with you to enhance the quality of your life.">
        <link rel="icon" type="image/icon" href="include/img/logo.png" />

        <link rel="stylesheet" type="text/css" href="include/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="include/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="include/bootstrap/css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/css" href="include/bootstrap/css/bootstrap-grid.min.css">
	<script type="text/javascript" src="include/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="include/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="include/bootstrap/js/bootstrap.js"></script>
</head>
<body>
	<?php
include('include/header.php');
?>
	<div style="margin-top: 20px"></div>

	<div class="container">
		<div class="col-sm-12">
			<div class="row">
				<div class="col-sm-4 shadow">
					<img src="include/img/doc1.jpg" style="width: 100%; height: 80%">
					<h5 class="text-center">Our Expert Doctors</h5>
					<a href="doctor_apply.php">
						<button class="btn btn-success" style="margin-left: 30%">Apply Now</button>
					</a>
				</div>
				<div class="col-sm-4 shadow">
					<img src="include/img/call-now.jpg" style="width: 100%; height:80%">
					<h5 class="text-center">Our Expert Receptionists</h5>
					<a href="receptionist_apply.php">
						<button class="btn btn-success" style="margin-left: 27%">Apply Now</button>
					</a>
				</div>
				<div class="col-sm-4 shadow">
					<img src="include/img/patient.jpg" style="width:100%; height: 80%">
					<h5 class="text-center">Take Appointment</h5>
					<a href="#">
						<button class="btn btn-success" style="margin-left: 25%">Get appoinment</button>
					</a>
				</div>
				<!--<div class="col-md-4 mx-1 shadow">
					<img src="include/img/info.png" style="width: 100%">
				</div>-->
			</div>
		</div>
	</div>

</body>
</html>