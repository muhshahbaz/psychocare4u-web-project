<!-- Side bar code-->
<?php
if(!isset($_SESSION['admin']))
{
  header("location:../adminlogin.php");
}
?>

				<!--<div class="col-md-2">-->

					<div class="list-group bg-info" style="height: 100vh">
						<a href="index.php" class="list-group-item list-group-item-action bg-info text-center text-white">Dashboard</a>
						<a href="profile.php" class="list-group-item list-group-item-action bg-info text-center text-white">Profile</a>
						<!--<a href="admin.php" class="list-group-item list-group-item-action bg-info text-center text-white">Administrators</a>-->
						<a href="doctors.php" class="list-group-item list-group-item-action bg-info text-center text-white">Doctors</a>
						<!--<a href="" class="list-group-item list-group-item-action bg-info text-center text-white">Patients</a>
						<a href="leave_req.php" class="list-group-item list-group-item-action bg-info text-center text-white">leave Requests</a>-->
						<a href="announcement.php" class="list-group-item list-group-item-action bg-info text-center text-white">Announcements</a>
						<a href="activity.php" class="list-group-item list-group-item-action bg-info text-center text-white">Session logs</a>
					</div>
				<!--</div>-->
				<!-- end sidebar-->