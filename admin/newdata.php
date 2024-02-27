<?php

if(!isset($_SESSION['admin']))
{
  header("location:../adminlogin.php");
}

include('../include/connection.php');
?>
<h5 class="text-center text-danger">Job Requests</h5>
			<?php

			$sql="SELECT * FROM doct_permission INNER JOIN doct_detail ON doct_permission.username=doct_detail.username WHERE doct_permission.status='pendding'";

			$result=mysqli_query($conn,$sql);

			if(mysqli_num_rows($result)>0)
			{
				?>

				<table class="table table-striped text-center">
					<tr>
<th>Firstname</th> 
<th>Surname</th>
<th>User Name</th>
<th>Gender</th>
<th>Qualification</th>
<th>Specilization</th>
<th>city</th>
<th colspan="2">Action</th>
</tr>

<?php
while($row=mysqli_fetch_assoc($result))
{
?>

<tr>
	<td><?php echo $row['firstname'];?></td>
	<td><?php echo $row['lastname'];?></td>
	<td><?php echo $row['username'];?></td>
	<td><?php echo $row['gender'];?></td>
	<td><?php echo $row['qualification'];?></td>
	<td><?php echo $row['specilization'];?></td>
	<td><?php echo $row['city'];?></td>
	<td><button class="btn btn-success" onclick="approve(<?php echo $row['id'];?>)">Approve</button></td>
	<td><button class="btn btn-danger" onclick="reject(<?php echo $row['id'];?>)">Reject</button></td>

</tr>
			

<?php
	}
?>
		</table>
<?php
}

?>
				