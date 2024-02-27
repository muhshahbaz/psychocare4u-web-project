<!-- Side bar code-->
<?php
if(!isset($_SESSION['recept']))
{
	header("location:../receptionist_login.php");
}
?>

				<!--<div class="col-md-2">-->

					<div class="list-group bg-info" style="height: 110vh">
						<a href="index.php" class="list-group-item list-group-item-action bg-info text-center text-white">Dashboard</a>
						<a href="profile.php" class="list-group-item list-group-item-action bg-info text-center text-white">Profile</a>
						<a href="appoinment_req.php" class="list-group-item list-group-item-action bg-info text-center text-white">Patient Appionments</a>
						<a href="perscription_generat.php" class="list-group-item list-group-item-action bg-info text-center text-white">Generate Perscription</a>
					</div>
				<!--</div>-->
				<!-- end sidebar-->