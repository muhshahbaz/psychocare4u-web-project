
<title>HealthCare | Partner with you to enhance the quality of your life.</title>
        <meta name="description" content="Partner with you to enhance the quality of your life.">
        <link rel="icon" type="image/icon" href="include/img/logo.png" />

<?php
if(!isset($_SESSION['recept']))
{
	header("location:../receptionist_login.php");
}
?>
<div class="col-md-12">
		<div class="row">
			<div class="col-md-2" style="margin-left: -30px">
				<?php include("sidebar.php"); ?>
			</div>
			<div class="col-md-10">
				<h5 class="my-4 text-info text-center">Appionments</h5>
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-4 bg-success mx-3" style="height: 130px">
							<div class="col-md-12">
									<div class="row">
										<div class="col-md-8 text-white my-3">
											Patient's Appoinment
										</div>
										<div class="col-md-4">
											<a href="appoinment_req.php">
												<i class="fa fa-calendar-check fa-3x my-3" style="color: white;"></i>
											</a>
										 </div>
									</div>
							</div>
						</div>
						<div class="col-md-2"></div>
						<div class="col-md-4 bg-success mx-3" style="height: 130px">
							<div class="col-md-12">
									<div class="row">
										<div class="col-md-8 text-white my-3">
											Patient's Stacked
										</div>
										<div class="col-md-4">
											<a href="patient_stacked.php">
												<i class="fa fa-calendar-check fa-3x my-3" style="color: white;"></i>
											</a>
										 </div>
									</div>
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
	</div>