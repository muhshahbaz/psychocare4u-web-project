<?php
session_start();

include("include/connection.php");
$Error="";
if(!isset($_SESSION['recept'])){
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
		$q="SELECT * FROM recept_log WHERE username='$uname' AND password='$pass'";

		$result=mysqli_query($conn,$q);

		if(mysqli_num_rows($result)==1)
		{
			$_SESSION['recept']=$uname;
			//echo "<script>alert('invalid credentioals');</script>";
			$q="INSERT INTO reception_log (username,login) VALUES ('".$_SESSION['recept']."','".date('Y-m-d h:i:s')."')";
			$res=mysqli_query($conn,$q);

			header("location:receptionist/index.php");
			$_SESSION['recept']=$uname;
		}
		else
		{
			$Error='<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  <strong>Invalid!</strong> User Name And Password
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>';
		}
	}
}}
else{
    header("Location: receptionist/index.php");
    die();
	
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>HealthCare | Partner with you to enhance the quality of your life</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Partner with you to enhance the quality of your life.">
        <link rel="icon" type="image/icon" href="include/img/logo.png" />
        <link rel="stylesheet" type="text/css" href="include/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="include/css/my-login.css">
</head>
<body>
	<?php
     include("include/header.php");
	?>

	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4 jumbotron my-3">
					<h5 class="text-center my-1 text-info">Receptonist Login</h5>
					<?php echo $Error?>
					<form method="post" class="my-login-validation" novalidate="">
						<div class="form-group">
							<label>Username</label>
							<input type="text" id="password" placeholder="Enter Username" name="username" class="form-control" required autofocus autocomplete="off">
							<div class="invalid-feedback">
								User Name is Required
							</div>
						</div>
						
						<div class="form-group">
							<label>Password</label>
							<input type="password" id="password" placeholder="Enter Password" name="password" class="form-control" required autofocus autocomplete="off">
							<div class="invalid-feedback">
								Password is Required
							</div>
							<a href="./receptionist/resetPassword.php">Forget Password</a>
					</div>
						
						<input type="submit" name="login" value="Login" class="btn btn-block btn-info">
						<small>Don't have an account? <a href="receptionist_apply.php">Apply Now</a></small>
					</form>
				</div>
				<div class="col-md-4"></div>
			</div>
		</div>
	</div>
</body>
<script src="include/js/my-login.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</html>