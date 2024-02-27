<?php
session_start();

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
							<h5 class="text-success text-center my-2">Appionments</h5>
							<form method="post">
				            <table class="table table-bordered">
					            <tr>
					                <th>ID</th>
					                <th>Name</th>
					                <th>Phone</th>
					                <th>Action</th>
					            </tr>
					            <?php
					            $id=$_GET['id'];

					            $query="SELECT * FROM patient WHERE fee='unpaid' AND id='$id'";

					            $resu=mysqli_query($conn,$query);

					            while($row=mysqli_fetch_array($resu))
					            {

					            ?>
					            	<tr>
					            		<td><?php echo $row['id']; ?></td>
					            		<td><?php echo $row['username']; ?></td>
					            		<td><?php echo $row['phone']; ?></td>
					            		<td><button class="btn btn-info text-white" name="fee">Collect fee</button></td>
					            	</tr>
					            	<?php
					            }

					            

					            ?>
				            </table>
				            </form>
				            <?php

				            if(isset($_POST['fee']))
					            {
					            	$q="UPDATE patient SET fee='paid' where id='$id'";
					            	$result=mysqli_query($conn,$q);
					            	if($result)
					            	{
					            	   header("location:appoinment_req.php");	
					            	}
					            	
					            }

				            ?>
						</div>
						<div class="col-md-6"></div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>
</body>
</html>