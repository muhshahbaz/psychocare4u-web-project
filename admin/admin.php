<?php
session_start();
include('../include/adminHeader.php');
include("../include/connection.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>


<div class="container-fluid">
	<div class="col-md-12" style="margin-left: -30px;">
		<div class="row">
			<div class="col-md-2">
				<?php include('sidebar.php');?>
			</div>
			<div class="col-md-10">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6">
							<h5 class="text-center">All Admins</h5>
							<?php

							$ad=$_SESSION['admin'];

							$q=mysqli_query($conn,"select * from admin where username!='$ad'");

							$result=mysqli_num_rows($q);

							if($result<1)
							{
								echo "no additional admin";
							}

							while($row=mysqli_fetch_assoc($q))
							{
								$id1=$row['id'];




							?>
							<table class="table table-bordered text-center">
								
								<th>ID</th>
								<th>UserName</th>
								<th>Action</th>

								

								<tr>
									<td><?php echo $row['id'];?></td>
									<td><?php echo $row['username'];?></td>
									<td><a href="admin.php?id=<?php echo $id1; ?>"><button id="<?php $id1 ?>" class="btn btn-danger">Remove</button></a></td>
								</tr>
							</table>
						<?php } ?>
						</div>


						<?php

						if(isset($_GET['id']))
						{
							$id2=$_GET['id'];

							$result=mysqli_query($conn,"delete from admin where id='$id2'");
						}


						?>

                    <!-- ADD Admin Module -->

						<div class="col-md-6">

							<?php

							if(isset($_POST['add']))
							{
								$username=htmlentities($_POST['uname']);
								$password=htmlentities($_POST['upass']);
								$image=$_FILES['uimage']['name'];

								$error=array();

								if(empty($username))
								{
									$error['user']="enter user name";
								}
								else if(empty($password))
								{
									$error['user']= "enter password";
								}
								else if(empty($image))
								{
									$error['user']="Please Upload image";
								}



								if(count($error)==0)
								{
									$password=md5($password);
									$query="insert into admin(username,password,profile) values ('$username','$password','$image')";
									$result=mysqli_query($conn,$query);

									if($result)
									{
										move_uploaded_file($_FILES['uimage']['tmp_name'], "admin_img/$image");
									}
								}

							}

							if(isset($error['user']))
								{
									$err=$error['user'];
									$show="<h5 class='text-center alert alert-danger'>$err</h5>";
								}
								else
								{
									$show="";
								}


							?>

							<h5 class="text-center">ADD Admin</h5>
							<form method="post" enctype="multipart/form-data">
								<div>
									<?php echo $show; ?>
								</div>
								<div class="form-group">
									<label>UserName</label>
									<input type="text" name="uname" class="form-control">
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="password" name="upass" class="form-control">
								</div>
								<div class="form-group">
									<label>Upload Image</label>
									<input type="file" name="uimage" class="form-control">
									<span>Acceptable type .jpg,.png only</span>
								</div>
								<input type="submit" name="add" value="ADD ADMIN" class="btn btn-success">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>