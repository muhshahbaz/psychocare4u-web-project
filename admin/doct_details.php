<?php 
session_start();
if(!isset($_SESSION['admin']))
{
  header("location:../adminlogin.php");
}
include('../include/connection.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>HealthCare | Partner with you to enhance the quality of your life</title>
        <meta name="description" content="Partner with you to enhance the quality of your life.">
        <link rel="icon" type="image/icon" href="include/img/logo.png" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style type="text/css">
.profile_container,
.back {
	margin: 20px 100px 0px;
	max-width: 900px;
	display: flex;
	overflow-x: hidden;
}
.profile_img-LG {
	height: 400px;
	width: 300px;
	border-radius: 40px;

	object-fit: cover;
	object-position: 50% 50%;

	background-position: 40% 50%;
}

.profile_desc_section {
	display: flex;
	flex-direction: column;

	margin-left: 50px;
}

@media screen and (max-width: 1000px) {
	.profile_container,
	.back {
		margin: 60px 33px 0px;
	}

	.profile_container {
		flex-direction: column;
	}

	.profile_img_section {
		margin: 0 auto;
	}

	.profile_img-LG {
		width: 300px;
		height: 300px;
		border-radius: 100%;
	}
</style>
	<?php include('../include/adminHeader.php'); ?>
</head>
<body>

	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="margin-left: -30px">
				<?php include("sidebar.php");?>	
				</div>
				
			 <div class="col-md-10">
				<?php
			include("../include/connection.php");

			if(isset($_GET['id']))
			{
				$user=$_GET['id'];
				$query="SELECT * FROM doct_detail WHERE username='$user'";
				$result=mysqli_query($conn,$query);
                if(mysqli_num_rows($result)>=1)
                {
                while($row=mysqli_fetch_assoc($result))
                {	
			?>
		<section class="profile_container">
		<div class="profile_img_section">
			<img class="profile_img-LG" src="../doctors/doc_img/<?php echo $row['pic'];?>" />	
		</div>
		<div class="profile_desc_section">

			
		
		<b class="text-info" style=" font-size:30px; "><?php echo $row['firstname']?></b>
		<a><i class="fas fa-graduation-cap text-info" style="font-size:27px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span style=" font-size:27px;"><?php echo $row['qualification']."( ".$row['specilization'].")";?></span></a>
					
		</span>
            <a style="text-decoration: none;" href="tel: <?php echo $row['phone'];?>">
			<i class="fas fa-phone-alt text-info" style="font-size:27px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="text-decoration: none; color:black;font-size:24px;"><?php echo $row['phone'];?></span></a>
			<a>
				<i class="fas fa-home text-info" style="font-size:27px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="text-decoration: none; font-size:24px;"><?php echo $row['city'];?></span></a>
				<br>
				<h4 class="text-info">Profile Summery</h4>
				<span style=" font-size:18px;">
				<?php echo $row['summery'];?></span>
				    </div>
		</div>
	</section>
<?php
}
}
}
?>
				</div>
				</div>
			
		</div>
	</div>
</body>
</html>