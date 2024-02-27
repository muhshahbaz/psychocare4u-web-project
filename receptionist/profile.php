<?php
session_start();
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

	include("../include/receptHeader.php");

	include("../include/connection.php");

	$recept=@$_SESSION['recept'];

	$query="select * from recept_detail where username='$recept'";

	$result=mysqli_query($conn,$query);

	while($row=mysqli_fetch_array($result))
	{
		$id=$row['id'];
		$username=$row['username'];

		$profile1=$row['pic'];
	}

	?>

	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="margin-left: -30px;">
					<?php
					include("sidebar.php");
					?>
				</div>
				<div class="col-md-10 my-4">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6">
								<h4>Username: <?php echo $username;?></h4>

								<?php

								if(isset($_POST['update']))
								{
									$profile=$_FILES['profile']['name'];

									if(empty($profile))
									{
										$show="<h5 class='alert alert-danger'>Please Upload pic first</h5>";
									}
									
										$query="update recept_detail set pic='$profile' where username='$recept' and id='$id'";
										$result=mysqli_query($conn,$query);

										if($result)
										{
											move_uploaded_file($_FILES['profile']['tmp_name'],"recept_img/$profile");
											echo "<script>alert('Profile Updated');</script>";
										}
									
								}
								$query="select * from recept_detail where username='$recept'";

	$result=mysqli_query($conn,$query);

	while($row=mysqli_fetch_array($result))
	{
		$id=$row['id'];
		$username=$row['username'];

		$profile1=$row['pic'];
	} 


								?>
								<form method="post" enctype="multipart/form-data">
									<img src="recept_img/<?php echo $profile1; ?>" style="height: 50%; width: 50%; object-fit: cover;" class="col-md-12">
									<br><br>
									<div class="form-group">
										<label>Update Profile</label>
										<input type="file" name="profile" class="form-control">
									</div>
									<div> <?php echo @$show;?></div>
									<input type="submit" name="update" value="Update Profile" class="btn btn-success">
								</form>
							</div>
							<div class="col-md-6 my-4">

								<!-- Passward reset System -->
								<form method="post">
									<div class="form-group">
										<label>Old Password</label>
										<input type="text" name="old" class="form-control" autocomplete="off" placeholder="enter your old Password">
									</div>

									<div class="form-group">
										<label>New Password</label>
										<input type="text" name="new" class="form-control" autocomplete="off" placeholder="enter your new Password">
									</div>

									<div class="form-group">
										<label>Re-write Password</label>
										<input type="text" name="re-write" class="form-control" autocomplete="off" placeholder="enter your new Password">
									</div>

									<input type="submit" name="up_password" class="btn btn-success" value="update Password">
									
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>

	<?php

	if(isset($_POST['up_password']))
	{
		$old=$_POST['old'];
		$new=$_POST['new']; 
		//echo $ad;
		//echo $old;
		//echo $new;

		$query="SELECT password FROM recept_log WHERE username='$recept'";

		$result=mysqli_query($conn,$query);
		$old_pass=mysqli_fetch_array($result);
		$old_pass['password'];

		if($old_pass['password']==$old)
		{
			$q="UPDATE recept_log SET password='$new' WHERE username='$recept'"; 
			$res=mysqli_query($conn,$q);

			if($res)
			{
				echo "<script>alert('password updated');</script>";
			}
		}
		else
		{
			echo "<script>alert('Your old password is wrong');</script>";
		}
	}

	?>

</body>
</html>