<?php
session_start();

include("include/connection.php");
$Error="";
if(!isset($_SESSION['patient'])){
if(isset($_POST['submit']))
{
	$uname=$_POST['uname'];

	$pass=$_POST['pass'];
		$q="SELECT * FROM patient WHERE username='$uname' AND cnic='$pass'";

		$result=mysqli_query($conn,$q);

		if(mysqli_num_rows($result)==1)
		{
			//echo "<script>alert('invalid credentioals');</script>";

			header("location:patient/index.php");
			$_SESSION['patient']=$uname;
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
}
	else{
    header("Location: patient/index.php");
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

<?php include("include/header.php");?>

<div class="container-fluid">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4 jumbotron my-3">
				<h5 class="text-center text-info">Patient Login</h5>
				<?php echo $Error?>
				<form method="post"  class="my-login-validation" novalidate="">
					<div class="form-group">
						<label>Username</label>
						<input type="text" id="password" placeholder="Enter Username" name="uname" class="form-control" required autofocus autocomplete="off">
						<div class="invalid-feedback">
								User Name is Required
							</div>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" id="password" placeholder="Enter Password" name="pass" class="form-control" required autofocus autocomplete="off">
						<div class="invalid-feedback">
								Password is Required
							</div>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" class="btn btn-info btn-block" value="Login">
						<small>Don't have Account ? <a href="account.php">Apply Now</a> </small>
					</div>
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