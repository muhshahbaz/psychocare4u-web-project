<?php
session_start();
include("../include/adminHeader.php");
include("../include/connection.php");
if(!isset($_SESSION['admin']))
{
  header("location:../adminlogin.php");
}
	
	if(isset($_POST['submit']))
	{
		$title=$_POST['title'];
		$target=$_POST['target_aud'];
		$message=$_POST['message'];

		$q="insert into announcement(title,audience,message) values ('$title','$target','$message')";

		$resu=mysqli_query($conn,$q);

		if($resu>=1)
		{
			 $_SESSION['alert'] = "Announcements Created.";
     		$_SESSION['alert_code'] = "success";
		}
		else
		{
			echo "<script>alert('fail');</acript>";
		}

	}
	?>



<!DOCTYPE html>
<html>
<head>
	<title>HealthCare | Partner with you to enhance the quality of your life</title>
        <meta name="description" content="Partner with you to enhance the quality of your life.">
        <link rel="icon" type="image/icon" href="include/img/logo.png" />
</head>
<body>


	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="margin-left: -30px">
					<?php include("sidebar.php");?>
				</div>
				<div class="col-md-10">
					<h5 class="text-center text-info my-4">
						Announcements
					</h5>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6">
								<form method="post">
						            <div class="form-group">
							            <label>Title</label>
							                <input required type="text" name="title" class="form-control" autocomplete="off" placeholder="Enter Announcement Title">
						            </div>
						            <div class="form-group">
						            	<label>Select Audience</label>
						            	<select required class="form-control" name="target_aud">
						            		<option value="doctor">Doctors</option>
						            		<option value="receptionist">Receptionist</option>
						            		<option value="both">Both Doct & Recept</option>
						            	</select>
						            </div>
						            <div class="form-group">
						            	<label>Message</label>
						            	<textarea required cols="5" rows="7" class="form-control" name="message"></textarea>
						            </div>
						            <input type="submit" name="submit" class="btn btn-info" value="Announce">
					   </form>
							</div>
							<div class="col-md-3"></div>
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