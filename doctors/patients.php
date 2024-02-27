<?php
include("../include/connection.php");
session_start();
date_default_timezone_set('Asia/Kolkata');
if(!isset($_SESSION['doct']))
{
	header("location:../doctor_login.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Patient's</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.slim.js" integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js"></script>
</head>
<body>
	<?php include("../include/topbarDoc.php");

	$uname=$_SESSION['doct'];

	?>

	<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="margin-left: -30px">
					<?php include("sidebar.php");?>
				</div>
				<div class="col-md-10">
				<h4 class="my-3 text-center">Doctor Dashboard</h4>
				<div class="col-md-12 my-4">
					<div class="row">

						
					  
					  <div class="col-md-3 bg-info mx-2" style="height: 130px;">
					  	<div class="col-md-12">
					  		<div class="row">
					  			<div class="col-md-8">
					  				<?php
					  				$date=date('Y-m-d');
					  				$q="SELECT * FROM appointment WHERE doct_username='$uname' AND status='approved' AND app_date='$date' AND mode='physical'";

					  				$res=mysqli_query($conn,$q);

					  				$no=mysqli_num_rows($res);

					  				?>
					  				<h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $no;?></h5>
					  				<h5 class="text-white">Remaining</h5>
					  				<h5 class="text-white">Patients</h5>
					  			</div>
					  			<div class="col-md-4">
					  				<a href="remaining.php"><i class="fa fa-procedures fa-3x my-4" style="color: white;"></a></i>
					  			</div>
					  		</div>
					  	</div> 
					  	

					  </div>

					  <div class="col-md-3 bg-info" style="height: 130px;">
					  	<div class="col-md-12">
					  		<div class="row">
					  			<div class="col-md-8">
					  				<?php
					  				$date=date('Y-m-d');
					  				$q="SELECT * FROM appointment WHERE doct_username='$uname' AND status='checked' AND app_date='$date' ";

					  				$res=mysqli_query($conn,$q);

					  				$no=mysqli_num_rows($res);

					  				?>
					  				<h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $no;?></h5>
					  				<h5 class="text-white">Checked</h5>
					  				<h5 class="text-white">Patients</h5>
					  			</div>
					  			<div class="col-md-4">
					  				<a href="checked.php"><i class="fa fa-procedures fa-3x my-4" style="color: white;"></a></i>
					  			</div>
					  		</div>
					  	</div> 
					  	

					  </div>
					  <div class="col-md-2"></div>


					  <div class="col-md-3 bg-success" style="height: 130px;">
					  	<div class="col-md-12">
					  		<div class="row">
					  			<div class="col-md-8">
					  				<?php
					  				$date=date('Y-m-d');
					  				$q="SELECT * FROM appointment WHERE doct_username='$uname' AND status='checked'";

					  				$res=mysqli_query($conn,$q);

					  				$no=mysqli_num_rows($res);

					  				?>
					  				<h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $no;?></h5>
					  				<h5 class="text-white">Total</h5>
					  				<h5 class="text-white">Patients</h5>
					  			</div>
					  			<div class="col-md-4">
					  				<a href="total.php"><i class="fa fa-procedures fa-3x my-4" style="color: white;"></a></i>
					  			</div>
					  		</div>
					  	</div> 
					  	
					  	<?php
                        ?>

					  </div>
					  
					</div>

				</div>
			

			</div>

		</div>



</body>
</html>