<?php  
session_start();
include('include/connection.php');
?>
<?php
$Error="";
if(!isset($_SESSION['admin'])){
if(isset($_POST['login']))
{
	$username=$_POST['uname'];
	$password=$_POST['upass'];
	$error=array();
	if(count($error)==0){
		$query="select * from admin where username='$username' AND password='$password'";
		$result=mysqli_query($conn,$query);
		if(mysqli_num_rows($result)==1)
		{
			echo "<script>alert('Login Sucess');</script>";
			$_SESSION['admin']=$username;
			header('xampp/htdocs/Healthcare/admin/index.php');
			exit();
		}
		else{
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
    header("Location: admin/index.php");
    die();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>HealthCare | Partner with you to enhance the quality of your life</title>
        <meta name="description" content="Partner with you to enhance the quality of your life.">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
        <link rel="icon" type="image/icon" href="include/img/logo.png" />
        <link rel="stylesheet" type="text/css" href="include/css/my-login.css">
        <link rel="stylesheet" type="text/css" href="toast/toastr.min.css">
	<?php include('include/header.php');?>
</head>
<body>
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4 col-sm-12 jumbotron my-3">
					<h5 class="text-center my-1 text-info">Admin Login</h5>
					<form method="POST" class="my-login-validation" novalidate="">
								<?php echo '<strong class="text-danger">'.$Error.'</strong>';?>
						<div class="form-group">
									<label for="email">Username</label>
									<input id="password" type="text" placeholder="Enter your username" class="form-control" name="uname" value="" required autofocus>
									<div class="invalid-feedback">
										Username is Required
									</div>
								</div>
								<div class="form-group">
									<label for="password">Password</label>
									<input id="password" type="password" placeholder="Enter your password" class="form-control" name="upass" required data-eye>
								    <div class="invalid-feedback">
								    	Password is required
							    	</div>
								</div>
						<input type="submit"  id="but" name="login" value="Login" class="btn btn-info btn-block">
					</form>
				</div>
				<div class="col-md-4"></div>
			</div>
		</div>
	</div>
</body>

<script src="include/js/my-login.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="toast/toastr.min.js"></script>
</html>
<?php

// used to destroy all sessions before start new session

session_unset();
session_destroy();
?>
