<?php
include("../include/connection.php");
session_start();

if(!isset($_SESSION['admin']))
{
  header("location:../adminlogin.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>HealthCare | Partner with you to enhance the quality of your life.</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Partner with you to enhance the quality of your life.">
        <link rel="icon" type="image/icon" href="include/img/logo.png" /></head>
<body>


<?php include("../include/adminHeader.php")?>

<div class="col-md-12">
	<div class="row">
		<div class="col-md-2" style="margin-left: -30px">
			<?php include("sidebar.php")?>
		</div>

		<div class="col-md-10 my-4">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-4">
					<h5 class="text-center">Doctor Login Activities</h5>
					<table class="table table-hover table-primary" id="doct_data"></table>
				</div>
				<div class="col-md-2"></div>
				<div class="col-md-4">
					<h5 class="text-center">Receptionist Login Activities</h5>
					<table class="table table-hover table-secondary text-center" id="recept_data"></table>
				</div>
			</div>
		</div>
		
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		function load_DD(){
			$.ajax({
				url:"doctor_activity.php",
				type:"POST",
				success:function(data)
				{
					$("#doct_data").html(data);
				}
			});
		}

		load_DD();
	});

	$(document).ready(function(){
		function load_RD(){
			$.ajax({
				url:"receptionist_activity.php",
				type:"POST",
				success:function(data)
				{
					$("#recept_data").html(data);
				}
			});
		}

		load_RD();
	});
</script>
</body>
</html>


