<?php
require '../include/connection.php';
$success="";
if(!isset($_GET['token'])){
exit("Token Not set.Please GO to Password Rest Page And Generate A New Token");
}
$token=$_GET['token'];
$getEmail=mysqli_query($conn, "SELECT email from resetpass where token='$token'");
if(mysqli_num_rows($getEmail)==0){
	exit("Token Not set.Please GO to Password Rest Page And Generate A New Token");
}
if(isset($_POST['password'])){
$pass=$_POST['password'];
$row=mysqli_fetch_array($getEmail);
$email=$row['email'];
$query=mysqli_query($conn,"UPDATE doct_log set password='$pass' where email='$email'");
if($query){
	$delete=mysqli_query($conn,"DELETE FROM resetpass where token='$token'");
	$success="New password has been generated";
}
else {exit("Your password not updated");}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Reset Now</title>
	<link rel="icon" type="image/icon" href="include/img/logo.png" />
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
 <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4 jumbotron my-3">
                    <div></div>
                    <form method="post">
                        <?php echo '<h6 class="text-success">'.$success.'</h6>';?>
                        <div></div>
                        <div class="form-group">
                            <label>Enter Your New Password</label>
                            <input name="password" type="password" placeholder="Enter Your New Password" required class="form-control" autocomplete="off">
                        </div>
                        <input type="submit" name="submit" class="btn btn-info">&nbsp;&nbsp;&nbsp;
                        <a class="btn btn-info" href="../doctor_login.php">Doctor Login</a>
                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>
</body>
</html>