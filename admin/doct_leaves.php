<?php
session_start();
include("../include/connection.php");

if(!isset($_SESSION['admin']))
{
  header("location:../adminlogin.php");
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
<?php include("../include/adminHeader.php");?>
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="margin-left: -30px;">
					<?php include("sidebar.php");?>
				</div>
				<div class="col-md-10">
					<div class="col-md-12 my-4">
						<div class="row">
							<?php
							$q="SELECT * FROM tblleave INNER JOIN doct_detail ON tblleave.username=doct_detail.username WHERE role='doctor'";
							$res=mysqli_query($conn,$q);
							if($res)
								{
									while($row=mysqli_fetch_assoc($res))
									{
										?>
										<div class="col-md-8 text-center">
											<h5>Application</h5>
										<h7><b>Applied by:</b><?php echo " ".$row['firstname']." ".$row['lastname'];?></h7><br>
										<h7><b>Subject:</b><?php echo " ". $row['subject'];?></h7>
										<br>
										<p><?php echo $row['reason'];?></p>
										</div>

										<div class="col-md-4">
											<h5>Applied by:<?php echo " ".$row['firstname']." ".$row['lastname']?></h5>
										</div>

									<?php
								}
								}
								?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>