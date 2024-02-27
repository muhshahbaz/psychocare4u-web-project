<?php
session_start();
include("../include/connection.php");
if(!isset($_SESSION['doct']))
{
  header("location:../doctor_login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>HealthCare | Partner with you to enhance the quality of your life.</title>
        <meta name="description" content="Partner with you to enhance the quality of your life.">
        <link rel="icon" type="image/icon" href="include/img/logo.png" />
</head>
<body>

	<?php include("../include/doctorHeader.php");?>

	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="margin-left: -30px">
					<?php include("sidebar.php");?>
				</div>
				<div class="col-md-10 my-4">
					<h5 class="text-center">Application for Leave</h5>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6">
								<form method="post">
									<div class="form-group">
										<label>Application Subject</label>
										<input type="text" name="subject" class="form-control" autocomplete="off">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-md-6">
												<label>From</label>
												<input type="date" name="from" class="form-control" autocomplete="off">
											</div>
											<div class="col-md-6">
												<label>To</label>
												<input type="date" name="to" class="form-control" autocomplete="off">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label>Reason for leave</label>
										<textarea cols="5" rows="7" name="reason" class="form-control"></textarea>
									</div>
									<input type="submit" name="leave" class="btn btn-info">

								</form>
							</div>
							<div class="col-md-3"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php

	if(isset($_POST['leave']))
	{
		$subject=$_POST['subject'];
		$reason=$_POST['reason'];
		$from=$_POST['from'];
        $to=$_POST['to'];
        $username=$_SESSION['doct'];


        $query="INSERT INTO tblleave (username,subject,reason,role,from_date,to_date) VALUES ('$username','$subject','$reason','doctor','$from','$to')";

        $result=mysqli_query($conn,$query);

        if($result)
        {
        	echo "success";
        }
        else
        {
        	echo "fail";
        }
	}


	?>

</body>
</html>