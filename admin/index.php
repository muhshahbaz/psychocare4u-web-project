<?php 
session_start();
if(!isset($_SESSION['admin']))
{
  header("location:../adminlogin.php");
}
include('../include/connection.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>HealthCare | Partner with you to enhance the quality of your life</title>
        <meta name="description" content="Partner with you to enhance the quality of your life.">
        <link rel="icon" type="image/icon" href="include/img/logo.png" />
	<?php include('../include/adminHeader.php'); ?>
</head>
<body>

	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="margin-left: -30px">
				<?php include("sidebar.php");?>	
				</div>
				
			 <div class="col-md-10">
				<h4 class="my-2 text-center">Admin Dashboard</h4>
				<div class="col-md-12 my-4">
					<div class="row">

					  <div class="col-md-3 bg-success mx-4 my-4" style="height: 130px;">
					  	<div class="col-md-12">
					  		
					  		<div class="row">
					  			<div class="col-md-8">
					  				<h5 class="my-2 text-white" style="font-size: 30px;"></h5>
					  				<h5 class="text-white">Admin</h5>
					  				<h5 class="text-white">Announcment</h5>
					  			</div>
					  			<div class="col-md-4">
					  				<a href="announcement.php"><i class="fa fa-user-cog fa-3x my-4" style="color: white;"></a></i>
					  			</div>
					  		</div>
					  	</div>
					  </div>
					  <div class="col-md-3 bg-info mx-4 my-4" style="height: 130px;">
					  	<div class="col-md-12">
					  		<?php
					  		$sql="SELECT * FROM doct_detail WHERE status='approve'";
					  		$resu=mysqli_query($conn,$sql);
					  		$num=mysqli_num_rows($resu);
					  		?>
					  		<div class="row">
					  			<div class="col-md-8">
					  				<h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num;?></h5>
					  				<h5 class="text-white">Total</h5>
					  				<h5 class="text-white">Doctors</h5>
					  			</div>
					  			<div class="col-md-4">
					  				<a href="doctors.php"><i class="fa fa-user-md fa-3x my-4" style="color: white;"></a></i>
					  			</div>
					  		</div>
					  	</div>
					  </div>
					  <div class="col-md-3 bg-dark mx-4 my-4" style="height: 130px;">
					  	<div class="col-md-12">
					  		<?php
					  		$date=date('Y-m-d');
					  		$sql="SELECT * FROM recept_detail WHERE status='approve'";
					  		$resu=mysqli_query($conn,$sql);

					  		$num=mysqli_num_rows($resu);

					  		?>
					  		<div class="row">
					  			<div class="col-md-8">
					  				<h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num;?></h5>
					  				<h5 class="text-white">Total</h5>
					  				<h5 class="text-white">Repectionist</h5>
					  			</div>
					  			<div class="col-md-4">
					  				<a href="receptionist.php"><i class="fa fa-user-md fa-3x my-4" style="color: white;"></a></i>
					  			</div>
					  		</div>
					  	</div>
					  </div>
					</div>

					<div class="row">
					
					  <div class="col-md-3 bg-warning mx-4 my-4" style="height: 130px;">
					  	<div class="col-md-12">
					  		<?php
					  		$date=date('Y-m-d');
					  		$sql="SELECT * FROM appointment where status='checked'";
					  		$resu=mysqli_query($conn,$sql);

					  		$num=mysqli_num_rows($resu);

					  		?>
					  		<div class="row">
					  			<div class="col-md-8">
					  				<h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num?></h5>
					  				<h5 class="text-white">Total</h5>
					  				<h5 class="text-white">Reports</h5>
					  			</div>
					  			<div class="col-md-4">
					  				<a href="patient_report.php"><i class="fa fa-print fa-3x my-4" style="color: white;"></a></i>
					  			</div>
					  		</div>
					  	</div>
					  </div>
					  <div class="col-md-3 bg-success mx-4 my-4" style="height: 130px;">
					  	<div class="col-md-12">
					  		<div class="row">
					  			<?php

					  			$q=mysqli_query($conn,"select * from doct_detail where status='pendding'");

					  			$num1=mysqli_num_rows($q);

					  			?>
					  			<div class="col-md-8">
					  				<h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num1;?></h5>
					  				<h5 class="text-white">Doctors</h5>
					  				<h5 class="text-white">Job Requests</h5>
					  			</div>
					  			<div class="col-md-4">
					  				<a href="job_req.php" id="showdata"><i class="fa fa-book-open fa-3x my-4" style="color: white;"></a></i>
					  			</div>
					  		</div>
					  	</div>
					  </div>
					  <div class="col-md-3 bg-info mx-4 my-4" style="height: 130px;">
					  	<div class="col-md-12">
					  		<div class="row">
					  			<?php

					  			$q=mysqli_query($conn,"select * from recept_detail where status='pendding'");

					  			$num1=mysqli_num_rows($q);

					  			?>
					  			<div class="col-md-8">
					  				<h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num1;?></h5>
					  				<h5 class="text-white">Receptionist</h5>
					  				<h5 class="text-white">Job Requests</h5>
					  			</div>
					  			<div class="col-md-4">
					  				<a href="recept_Job.php" id="showdata"><i class="fa fa-book-open fa-3x my-4" style="color: white;"></a></i>
					  			</div>
					  		</div>
					  	</div>
					  </div>
					</div>
				</div>
				</div>
			  </div>
		</div>
	</div>
</body>
</html>