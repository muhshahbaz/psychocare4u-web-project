
<title>HealthCare | Partner with you to enhance the quality of your life.</title>
        <meta name="description" content="Partner with you to enhance the quality of your life.">
        <link rel="icon" type="image/icon" href="include/img/logo.png" />

<?php
if(!isset($_SESSION['doct']))
{
	header("location:../doctor_login.php");
}
else
{
?>
  <div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="margin-left: -30px">
					<?php include("sidebar.php");?>
				</div>
				<div class="col-md-10">
				<h4 class="my-3 text-center">Doctor Dashboard</h4>
				<div class="col-md-12 my-4">
					<div class="row">

						
					  
					  <div class="col-md-3 bg-success mx-5" style="height: 130px;">
					  	<div class="col-md-12">
					  		<div class="row">
					  			<div class="col-md-8">
					  				<?php
					  				date_default_timezone_set('Asia/Kolkata');
					  				$date=date('Y-m-d');

					  				$q="SELECT * FROM appointment WHERE doct_username='$uname' AND status='approved' AND app_date='$date' AND mode='physical'";

					  				$res=mysqli_query($conn,$q);

					  				$no=mysqli_num_rows($res);

					  				?>
					  				<h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $no;?></h5>
					  				<h5 class="text-white">Physical</h5>
					  				<h5 class="text-white">Patients</h5>
					  			</div>
					  			<div class="col-md-4">
					  				<a href="pat_medicine.php"><i class="fa fa-procedures fa-3x my-4" style="color: white;"></a></i>
					  			</div>
					  		</div>
					  	</div> 
					  	<?php
}
?>

					  </div>

					  <div class="col-md-2">
					  </div>

					  <div class="col-md-3 bg-success mx-5" style="height: 130px;">
					  	<div class="col-md-12">
					  		<div class="row">
					  			<div class="col-md-8">
					  				<?php
					  				$date=date('Y-m-d');
					  				$q="SELECT * FROM appointment WHERE doct_username='$uname' AND status='approved' AND app_date='$date' AND mode='online'";

					  				$res=mysqli_query($conn,$q);

					  				$no=mysqli_num_rows($res);

					  				?>
					  				<h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $no;?></h5>
					  				<h5 class="text-white">Remote</h5>
					  				<h5 class="text-white">Patients</h5>
					  			</div>
					  			<div class="col-md-4">
					  				<a href="online.php"><i class="fa fa-procedures fa-3x my-4" style="color: white;"></a></i>
					  			</div>
					  		</div>
					  	</div> 
					  	
					  	<?php
                        ?>

					  </div>
					  <div class="col-md-2">
					  </div>
					</div>

				</div>
				<hr class="my-4">
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-6">
							<h5 class="text-center text-info">Announcements</h5>
							<?php
                              $query="select * from announcement where audience='receptionist' or audience='both'";
                              $result=mysqli_query($conn,$query);

                              if(mysqli_num_rows($result)>=1)
                              {
                              	?>
                              	<table class="table table-boardered">
                              		<tr>
                              			<td>Title</td>
                              			<td>Message</td>
                              		</tr>
                              	<?php

                              	while($row=mysqli_fetch_assoc($result))
                              	{
                              		?>
                              		<tr>
                              			<td><?php echo $row['title'];?></td>
                              			<td><?php echo $row['message'];?></td>
                              		</tr>
                              	
                              		<?php
                              	}
                              	?>

                              	</table>
                              	<?php

                              }
                              else
                              {
                              	echo "<h4 class='text-center'>Not announed anything yet</h4>";
                              }

							?>
						</div>
						<div class="col-md-3"></div>
				</div>
				</div>

			</div>

		</div>

