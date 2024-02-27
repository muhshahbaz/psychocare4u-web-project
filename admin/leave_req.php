<?php
session_start();
include("../include/connection.php");

if(!isset($_SESSION['admin']))
{
  header("location:../adminlogin.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>HealthCare | Partner with you to enhance the quality of your life</title>
        <meta name="description" content="Partner with you to enhance the quality of your life.">
        <link rel="icon" type="image/icon" href="include/img/logo.png" />
</head>
<body>

<?php
include("../include/adminHeader.php");
?>

<div class="container-fluid">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-2" style="margin-left: -30px">
				<?php include("sidebar.php"); ?>
			</div>
			<div class="col-md-10 my-4">
				<div class="col-md-12">
					<h5 class="text-center text-info"> Leave Requests</h5>
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-3 bg-info my-2" style="height: 120px">
							<?php
							$query="SELECT * FROM tblleave WHERE status='pendding' AND role='doctor'";

							$res=mysqli_query($conn,$query);

							$num=mysqli_num_rows($res);

							?>
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-8">
										<h5 class="text-white my-2"><?php echo $num;?></h5>
										<h5 class="text-white">Doctor</h5>
										<h5 class="text-white">Requests</h5>
									</div>
									<div class="col-md-4">
										<a href="doct_leaves.php"><i class="fa fa-user-md fa-3x my-4" style="color: white;"></a></i>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-2"></div>
						<div class="col-md-3 bg-info my-2" style="height: 120px">
							<?php
							$query="SELECT * FROM tblleave WHERE status='pendding' AND role='receptionist'";

							$res=mysqli_query($conn,$query);

							$num=mysqli_num_rows($res);

							?>
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-8">
										<h5 class="text-white my-2"><?php echo $num;?></h5>
										<h5 class="text-white">Receptionist</h5>
										<h5 class="text-white">Requests</h5>
									</div>
									<div class="col-md-4"></div>
								</div>
							</div>
						</div>
						<div class="col-md-2"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>