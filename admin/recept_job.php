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
	<?php include("../include/adminHeader.php"); ?>
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
						<div class="col-md-6">
							<h5 class="text-center text-danger">Job Requests</h5>
			
				<table class="table table-striped text-center">
					<thead><tr>
					<th>Username</th>
                      <th>Name</th> 
                      <th>CNIC</th>
                      <th>Gender</th>
                      <th>Qualification</th>
                      <th>City</th>
                      <th colspan="2">Action</th>
                      </tr>
                      </thead>
		<?php

			$sql="SELECT * FROM recept_detail WHERE status='pendding'";

			$result=mysqli_query($conn,$sql);

			if(mysqli_num_rows($result)>0)
			{
	
               while($row=mysqli_fetch_assoc($result))
               {
              ?>
              <tbody>

                <tr>
                  <td><?php echo $row['username'];?></td>
	              <td><?php echo $row['firstname'];?></td>
	              <td><?php echo $row['lastname'];?></td>
	              <td><?php echo $row['gender'];?></td>
	              <td><?php echo $row['qualification'];?></td>
	              <td><?php echo $row['city'];?></td>
	              <td><a class="btn btn-info text-white" href="recept_approve.php?id=<?php echo $row['username'];?>">Approve</a></td>
	              <td><a class="btn btn-danger text-white" href="recept_reject.php?id=<?php echo $row['username'];?>">Reject</a></td>

               </tr></tbody>
			

               <?php
             	}
               ?>
		    </table>
             <?php
               }

                ?>
						</div>
					</div>
				</div>
			
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	//function approve(id)
	/*{
		if(confirm('are you sure?'))
		{
			$.ajax({
				type:"POST",
				url:"approve_ajax.php",
				data:{id:id},
				success:function(data)
				{
					console.log(data);
				}
			});
		}
	}
	/*$(document).ready(function(){
		function approve(id)
       {
              $.ajax({
				url:"approve_ajax.php",
				type:"POST",
				data:{id:id},
				success:function(data)
				{
					console.log(data)
				}
			});
		}

		function reject(id)
		{
			$.ajax({
				url:"reject_ajax.php",
				type:"POST",
				data:{id:id},
				success:function(data)
				{
					console.log(data)
				}
			});
		}
	});*/
       

	
</script>
</body>
</html>