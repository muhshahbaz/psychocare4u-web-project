<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
if(!isset($_SESSION['patient']))
header("location:../patientlogin.php");

include("../include/connection.php");
?>
<!DOCTYPE html>
<html>
<head>
	
	
</head>
<body>

	<?php
	include("../include/patientHeader.php");
	if(isset($_POST['appointment']))
	{
		$diases=$_POST['diases'];
		$mode=$_POST['mode'];
		$doct_user=$_POST['username'];
		$date=$_POST['app_date'];
		$today=date('Y-m-d');
		$pat_username=$_SESSION['patient'];


		//echo $date." ".$today;
		//echo $today;

		$query="INSERT INTO appointment (pat_username,doct_username,diases,app_date,app_get_date,status,mode) VALUES ('$pat_username','$doct_user','$diases','$date','$today','pendding','$mode')";
		$res=mysqli_query($conn,$query);

		if($res)
		{
			$_SESSION['alert'] = "Apointment Request Sent Success";
     		$_SESSION['alert_code'] = "success";
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
						<div class="row">
							<div class="col-md-6">
								<h5 class="my-3 text-info text-center">Apointment</h5>
								<form method="post">
									<div class="form-group">
										<label>Diases</label>
										<input type="text" required name="diases" placeholder="hint: cough,cold,headeach etc" class="form-control" autocomplete="off">
									</div>
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Appointment mode</label>
													<select class="form-control" name="mode">
														<option value="physical" selected="physical">Physical</option>
														<option value="online">Online</option>
													</select>
													<!--<input type="text" name="mode" class="form-control" placeholder="hint 1 week,2 month etc" autocomplete="off">-->
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Doctor username</label>
													<select class="form-control" name="username" required>
														<option value="" readonly>Select Doctor</option>
														<?php

													$res=mysqli_query($conn,"select * from doct_detail");
													$num=mysqli_num_rows($res);

													if($num>=1)
													{
														while($row=mysqli_fetch_array($res))
														{
															?>

														
														<option value="<?php echo $row['username']?>"><?php echo $row['username']; ?></option>
													<?php }}
													?>
														
													</select>

												</div>
											</div>
										</div>
									</div>
											<div class="form-group">
												<label>Appoinment Date</label>
												<input required class="form-control" type="date" name="app_date"  id="app_date" title="Choose your desired date" min="<?php echo date('Y-m-d'); ?>"/>
											</div>
										<input type="submit" name="appointment" class="btn btn-info">
								</form>
							</div>
						</div>
			
				</div>
			</div>
		</div>
	</div>
</body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
if (isset($_SESSION['alert']) && $_SESSION['alert'] !='') 
{
 ?>
<script>
    swal({
        title: "Success!",
        text: "<?php echo $_SESSION['alert']; ?>",
    });
</script>

 <?php
    unset($_SESSION['alert']);
}
?>
</html>