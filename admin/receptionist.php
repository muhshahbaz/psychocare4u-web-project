<?php
session_start();
if(!isset($_SESSION['admin']))
{
  header("location:../adminlogin.php");
}
include("../include/connection.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>HealthCare | Partner with you to enhance the quality of your life</title>
        <meta name="description" content="Partner with you to enhance the quality of your life.">
        <link rel="icon" type="image/icon" href="include/img/logo.png" />
	<?php include("../include/adminHeader.php");?>
</head>
<body>



<div class="container-fluid">
	<div class="col-md-12">
		
		<div class="row">
			<div class="col-md-2" style="margin-left: -30px;">
				<?php include("sidebar.php");?>
			</div>
			<div class="col-md-10">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-10">
							<h5 class="text-center text-danger my-4">Approve Doctors</h5>
			<?php

			$sql="SELECT * FROM recept_detail WHERE status='approve'";

			$result=mysqli_query($conn,$sql);

			if($result)
			{
				?>

				<table class="table table-striped text-center">
					<tr>
<th>Name</th>
<th>Phone</th>
<th>Gender</th>
<th>Qualification</th>
<th colspan="2">Action</th>
</tr>

<?php
while($row=mysqli_fetch_assoc($result))
{
?>

<tr>
	<td><?php echo $row['firstname'];?></td>
	<td><?php echo $row['phone'];?></td>
	<td><?php echo $row['gender'];?></td>
	<td><?php echo $row['qualification'];?></td>
	<td><a class="btn btn-info text-white" href="recept_details.php? id=<?php echo $row['username'];?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
	<a class="btn btn-danger text-white" href="recept_reject.php? id=<?php echo $row['username'];?>"><i class="fas fa-trash-alt"></i></a></td>


</tr>
				


<?php
	}
?>
		</table>
<?php
}

?>
						</div>
						<div class="col-md-2"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</body>
</html>