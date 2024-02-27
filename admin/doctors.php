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
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
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

			$sql="SELECT * FROM doct_detail WHERE status='approve'";

			$result=mysqli_query($conn,$sql);

			if($result)
			{
				?>

				<table class="table table-striped text-center" >
					<thead>
					<tr>
						<th>Username</th> 
						<th>Name</th>
						<th>Gender</th>
						<th>Qualification</th>
						<th>Specilization</th>
						<th colspan="2">Action</th>
					</tr>
					</thead>

<?php
while($row=mysqli_fetch_assoc($result))
{
?>
<tbody>
<tr>
	<td><?php echo $row['username'];?></td>
	<td><?php echo $row['firstname'];?></td>
	<td><?php echo $row['gender'];?></td>
	<td><?php echo $row['qualification'];?></td>
	<td><?php echo $row['specilization'];?></td>
	<td><a class="btn btn-info" href="doct_details.php?id=<?php echo $row['username'];?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
		<a class="btn btn-danger" href="delete_ajax.php?id=<?php echo $row['username'];?>"><i class="fas fa-trash-alt" aria-hidden="true"></i></a>
	</td>
	


</tr>
	</tbody>			


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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script>
	$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
</html>