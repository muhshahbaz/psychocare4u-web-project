<?php
session_start();
if(!isset($_SESSION['patient']))
header("location:../patientlogin.php");

include("../include/connection.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>HealthCare | Partner with you to enhance the quality of your life</title>
        <meta name="description" content="Partner with you to enhance the quality of your life.">
        <link rel="icon" type="image/icon" href="include/img/logo.png" />
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php
	include("../include/patientHeader.php");
	?>

<div class="container-fluid">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-2" style="margin-left: -30px">
				<?php
				include("sidebar.php");
				?>
			</div>
			<div class="col-md-10">
				<?php

                  	$username=$_GET['id'];

	                $query="SELECT * FROM doct_detail INNER JOIN doct_permission ON doct_detail.username=doct_permission.username WHERE doct_permission.status='approve' AND doct_permission.username='$username'";

	                $run=mysqli_query($conn,$query);

	                while($row=mysqli_fetch_array($run))
                    {
	                 $id=$row['id'];
	                 $fname=$row['firstname'];
	                 $lname=$row['lastname'];
	                 $qualification=$row['qualification'];
	                 $specilization=$row['specilization'];
	                 $image=$row['pic'];
	                 $detail=$row['summery'];

                ?>
                    <h2>
                    <?php echo $fname." ".$lname; ?>
                    </h2>
                    <p>Qualification: <?php echo $qualification;?></p>
                    
                    <img src="../doctors/doc_img/<?php echo $image; ?>" width="200" height="200"/>
                    <p align="justify"><?php echo $detail; ?></p>
              <?php } ?>
            </div>
        </div>
    </div>
</div>

</body>
</html>