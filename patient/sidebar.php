<?php
if(!isset($_SESSION['patient']))
header("location:../patientlogin.php");
?>
		<div class="list-group bg-info" style="height: 100vh">
						<a href="index.php" class="list-group-item list-group-item-action bg-info text-center text-white">Dashboard</a>
						<a href="appoinment.php" class="list-group-item list-group-item-action bg-info text-center text-white">Appointment</a>
						<a href="patient_report.php" class="list-group-item list-group-item-action bg-info text-center text-white">Medical History</a>
					</div>