<?php
session_start();
if(!isset($_SESSION['recept']))
{
	header("location:../receptionist_login.php");
}
include("../include/receptHeader.php");
include("../include/connection.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>HealthCare | Partner with you to enhance the quality of your life.</title>
        <meta name="description" content="Partner with you to enhance the quality of your life.">
        <link rel="icon" type="image/icon" href="include/img/logo.png" />
</head>
<body>
<div class="container-fluid">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-2" style="margin-left: -30px">
				<?php
				include("sidebar.php");
				?>
			</div>
			<div class="col-md-10">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6">
							<h5 class="text-success text-center my-2">Stacked Appionments</h5>
				            <table class="table table-bordered">
					            <tr>
					                <th>Token ID</th>
					                <th>Name</th>
					                <th>Phone</th>
					                <th>Doctor</th>
					                <th colspan="2" class="text-center">Action</th>
					            </tr>
					            <?php

					            $query="SELECT * FROM patient INNER JOIN appointment ON patient.username=appointment.pat_username WHERE status='stacked'";

					            $resu=mysqli_query($conn,$query);

					            while($row=mysqli_fetch_assoc($resu))
					            {

					            ?>
					            	<tr>
					            		<td><?php echo $row['username']; ?></td>
					            		<td><?php echo $row['fname']; ?></td>
					            		<td><?php echo $row['phone']; ?></td>
					            		<td><?php echo $row['doct_username']; ?></td>
					            		
					            		<td><a class="btn btn-info text-white" href="app_approve.php? id=<?php echo $row['id'];?> ">approve</a></td>
					            	</tr>
					            	<?php
					            }

					            ?>
				            </table>
						</div>
						<div class="col-md-6">
							<h5 class="text-center my-2 text-info">Search for appoinments</h5>

							<form method="post" action="search.php">
                                <div class="form-group">
                                	<label>Token ID</label>
                                	<input type="text" name="name" placeholder="user name" class="form-control">
                                </div>
                                <div class="form-group">
                                	<label>Phone Number</label>
                                	<input type="text" name="phone" placeholder="phone number" class="form-control">
                                </div>

                                <input type="submit" name="search" class="btn btn-success">

								
								
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