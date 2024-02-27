<?php
if(!isset($_SESSION['doct']))
header("location:../doctor_login.php");
?>

<div class="col-md-12">
	<div class="row">
		<div class="col-md-2" style="margin-left: -30px">
			<div class="list-group bg-info" style="height: 100vh">
						<a href="index.php" class="list-group-item list-group-item-action bg-info text-center text-white">Dashboard</a>
						<a href="profile1.php" class="list-group-item list-group-item-action bg-info text-center text-white">Profile</a>
						<a href="logout.php" class="list-group-item list-group-item-action bg-info text-center text-white">LOGOUT</a>
			</div>
	    </div>
		<div class="col-md-10">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-5 bg-info my-4"><h5 class="text-center">You are not approved by admin</h5></div>
					<div class="col-md-2"></div>
				</div>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-3 bg-info my-4">
					<div class="row">
						<div class="col-md-8 my-4">
					  		<h5 class="text-white">Doctor</h5>
					  		<h5 class="text-white">Profile</h5>
						</div>
						<div class="col-md-4">
							<a href="profile1.php"><i class="fa fa-user-md fa-3x my-4" style="color: white;"></a></i>
						</div>
					</div>
				</div>
				<div class="col-md-4"></div>
			</div>
			</div>
		</div>
	</div>
</div>