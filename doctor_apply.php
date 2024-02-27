<?php
session_start();
include("include/connection.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>HealthCare | Partner with you to enhance the quality of your life</title>
        <meta name="description" content="Partner with you to enhance the quality of your life.">
        <link rel="icon" type="image/icon" href="include/img/logo.png" />
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="include/js/jquery.js"></script>
	<script src="include/js/javascript.js"></script>

	
</head>
<body>
	<?php include("include/topbar.php"); ?>

	<div class="container-fluid">
	
		
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6 my-3 jumbotron">
				<h5 class="text-center">Application Form</h5>
				<form method="post" action="doctor_next.php">

					<div class="form-group">
						<label>Username*</label>
						<input type="text" name="username" placeholder="Enter Username" class="form-control" id="username" required>
						<span id="availability"></span>
					</div>

					
					<div class="form-group">
						<label>Email*</label>
						<input type="email" name="email" placeholder="example@gamil.com" class="form-control" autocomplete="off" required >
						
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label>Password*</label>
                            <input type="password" id="password" name="password"  placeholder="Enter Password"  required onkeyup="check();" class="form-control">


						</div>
						<div class="form-group col-md-6">
							<label>Confirm Password</label>
							<input type="password" name="cpassword" class="form-control" id="confirm_password"autocomplete="off" onkeyup="check();"  placeholder="Confirm Password" required>
							<span id="message"></span>
						</div>
					</div>
					<input type="submit" name="submit" value="Next Step" class="form-control btn-success" id="btn">
					<small>Already have Account ? <a href="doctor_login.php">Login</a> Here </small>
				</form>
			</div>
			<div class="col-md-3"></div>
		</div>

	</div>
<script type="text/javascript">
	
</script>
</body>
</html>
