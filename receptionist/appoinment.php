<?php
session_start();

if(!isset($_SESSION['recept']))
header("location:../receptionist_login.php");



include("../include/connection.php");
?>
<!DOCTYPE html>
<html>
<head>
	
	
</head>
<body>

	<?php
	include("../include/receptHeader.php");
	if(isset($_POST['appointment']))
	{
		$diases=$_POST['diases'];
		$mode=$_POST['mode'];
		$doct_user=$_POST['doct_name'];
		$date=$_POST['app_date'];
		$today=date('Y-m-d');
		$pat_username=$_SESSION['patient'];


		//echo $date." ".$today;
		//echo $today;

		$query="INSERT INTO appointment (pat_username,doct_username,diases,app_date,app_get_date,status,mode) VALUES ('$pat_username','$doct_user','$diases','$date','$today','pendding','$mode')";
		$res=mysqli_query($conn,$query);

		if($res)
		{
			echo "Success";
		}
		else
		{
			echo "Fail";
		}
	}
	?>

	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="margin-left: -30px">
					  <?php
	                  include("sidebar.php");
	                  ?>
				</div>
				<div class="col-md-10">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-5">
								<h5 class="my-3 text-info text-center">Apointment</h5>
								<form method="post">
									<div class="form-group">
										<label>Diases</label>
										<input type="text" name="diases" placeholder="hint: cough,cold,headeach etc" class="form-control" autocomplete="off">
									</div>
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Appointment mode</label>
													<select class="form-control" name="mode">
														<option value="physical">Physical</option>
														<option value="physical">Online</option>
													</select>
													<!--<input type="text" name="mode" class="form-control" placeholder="hint 1 week,2 month etc" autocomplete="off">-->
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Doctor username</label>
													<input type="text" name="doct_name" class="form-control" placeholder="Dr. Fatima Imtiaz" autocomplete="off">

												</div>
											</div>
										</div>
									</div>
											<div class="form-group">
												<label>Appoinment Date</label>
												<input type="date" name="app_date" class="form-control">
											</div>
										<input type="submit" name="appointment" class="btn btn-info">
								</form>
							</div>
							<div class="col-md-2"></div>
							<div class="col-md-5">
								<h5 class="text-center my-3 text-info">Doctors Profile</h5>
								<div class="col-md-12"id="doct_profile">
									<?php

									$res=mysqli_query($conn,"select * from doct_detail LIMIT 3");
									$num=mysqli_num_rows($res);

									if($num>=1)
									{
										while($row=mysqli_fetch_array($res))
										{
											?>

									<div class="row">
										<div class="col-md-12 text-center">
											<img src="../doctors/doc_img/<?php echo $row['pic']; ?>" style="width: 120px; height: 120px;">
										</div>
									</div>
									<div class="row">
										<div class="col-md-12 text-center"><b>username: <?php echo $row['username'];?></b></div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<?php echo substr($row['summery'],0,100); ?>
											<a href="doct_pages.php? id=<?php echo $row['username'];?>">Read more</a></p>
											
										</div>
									</div>
									<?php

								}}
								?>
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