<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
if(!isset($_SESSION['patient']))
header("location:../patientlogin.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>HealthCare | Partner with you to enhance the quality of your life</title>
        <meta name="description" content="Partner with you to enhance the quality of your life.">
        <link rel="icon" type="image/icon" href="include/img/logo.png" />
        
	<?php
      include("../include/patientHeader.php");
    include("../include/connection.php");
	?>

	<script type="text/javascript" src="../include/js/jquery.js"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="margin-left: -30px">
					<?php
					include("sidebar.php");
					?>
				</div>
				<div class="col-md-10">
					<h5 style="color: green" class=" my-4">Welcome to<input style="border-style: hidden; " type="text" id="data" value="<?php echo $_SESSION['patient'];?>" maxlength="10" ></h5>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-3 bg-info mx-2" style="height: 150px">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-8 text-white my-3">
											Medical History
										</div>
										<div class="col-md-4">
											<a href="patient_report.php">
												<i class="fa fa-user-circle fa-3x my-3" style="color: white;"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3"></div>
							<div class="col-md-3 bg-warning mx-2" style="height: 150px">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-8 text-white my-3">
											Book Appoinment
										</div>
										<div class="col-md-4">
											<a href="appoinment.php">
												<i class="fa fa-calendar-check fa-3x my-3" style="color: white;"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-6">
					<h6 class="text-center">Links for meeting</h6>
					<div class="text-center">
					<a href="https://doxy.me/healthcare2" target="_blank" id="link"></a>
					</div>
					</div>
						<div class="col-md-6">
							<?php
							if(isset($_SESSION['patient'])){
								$set=$_SESSION['patient'];
							$today=date('Y-m-d');
							$query="SELECT * FROM appointment WHERE app_date='$today' AND pat_username='$set'";
							$res=mysqli_query($conn,$query);
							if($res)
								{
									$row=mysqli_fetch_assoc($res);
									if($row['status']=='approved')
									{
										echo '<h4 class="text-success">Your Appointment Accepted at '.$row['app_date'].'</h4>';

									}
									
								}
							}
							?>
				</div>
			</div>

				
							
			</div>
		</div>
	</div>
<script type="text/javascript">
	$(document).ready(function(){
		var data=$("#data").val();
		//alert(data);
		$.ajax({
			url:"link_generation.php",
			type:"POST",
			data:{data:data},
			success:function(data)
			{
				$("#link").html(data);
			}
		});
	});
</script>
</body>
</html>