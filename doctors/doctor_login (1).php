<?php
session_start();
include("include/connection.php");

if(isset($_POST['login']))
{
	$uname=$_POST['username'];

	$pass=$_POST['password'];

	if(empty($uname))
	{
		echo "<script>alert('enter username');</script>";
	}
	else if(empty($pass))
	{
		echo "<script>alert('enter password');</script>";
	}
	else
	{
		$q="SELECT * FROM doct_log WHERE username='$uname' AND password='$pass'";

		$result=mysqli_query($conn,$q);

		if(mysqli_num_rows($result)==1)
		{
			$_SESSION['doct']=$uname;
			//echo "<script>alert('invalid credentioals');</script>";
			$q="INSERT INTO doctor_log (username,login) VALUES ('".$_SESSION['doct']."','".date('Y-m-d h:i:s')."')";
			$res=mysqli_query($conn,$q);

			header("location:doctors/index.php");
			$_SESSION['doct']=$uname;
		}
		else
		{
			echo "<script>alert('invalid credentioals');</script>";
		}
	}
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
	<?php
     include("include/doctorHeader.php");
	?>

	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 jumbotron my-3">
					<h5 class="text-center my-3">Doctor Login</h5>
					<div></div>
					<form method="post">
						<div></div>
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="username" class="form-control" autocomplete="off">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" autocomplete="off">
						</div>
						<input type="submit" name="login" value="Login" class="btn btn-success"><br>
						<small>Don't have an account? <a href="doctor_apply.php">Apply Now</a></small><br>
						<a href="./doctors/resetPassword.php">Reset Your Password</a></small>
					</form>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
	</div>
</body>
</html>