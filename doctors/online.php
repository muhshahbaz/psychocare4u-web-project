<?php
session_start();
include("../include/connection.php");
date_default_timezone_set('Asia/Kolkata');
if(!isset($_SESSION['doct']))
{
  header("location:../doctor_login.php");
}
$doct=$_SESSION['doct'];
$app_date='';
?>
<!DOCTYPE html>
<html>
<head>
	<title>HealthCare | Partner with you to enhance the quality of your life.</title>
        <meta name="description" content="Partner with you to enhance the quality of your life.">
        <link rel="icon" type="image/icon" href="include/img/logo.png" />
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>

</head>
<body>
	<?php
	ob_start();
include("../include/topbar.php");

?>
<div class="col-md-12">
	<div class="row">
		<div class="col-md-2" style="margin-left: -30px">
			<?php include("sidebar.php");?>
		</div>
		<div class="col-md-10">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-2 my-4">
						<?php
						$date=date('Y-m-d');
						$q="SELECT * FROM appointment WHERE doct_username='$doct' AND app_date='$date' AND status='approved' AND mode='online'";

						$res=mysqli_query($conn,$q);

						$no=mysqli_num_rows($res);
						?>
						<div class="row">
							<div class="col-md-12">
								<?php echo " Total Patient: ".$no; ?>
							</div>
							<div class="col-md-12"><button><a href="https://doxy.me/account/dashboard" target="_blank">Go for Meeting</a></button></div>
						</div>

					</div>
					<div class="col-md-5 my-4">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12">
									<?php

									$q="SELECT * FROM patient,appointment WHERE appointment.doct_username='$doct' AND appointment.status='approved' AND appointment.app_date='$date' AND patient.username=appointment.pat_username AND appointment.mode='online'";
									$result=mysqli_query($conn,$q);
									while($row=mysqli_fetch_assoc($result))
									{
										$user=$row['pat_username'];
									?>
									<div class="row">
										<div class="col-md-12">
											
											<div class="row">
												<div class="col-md-10">
													id:<input style="border-style:hidden "type="text" name="u_id" size="4" value="<?php echo $row['pat_username'];?>" id="p_id" readonly>
													<?php echo $row['fname'];?><br>
													diases: <?php echo $row['diases'];?> BP: <?php echo $row['blood'];?> weight: <?php echo $row['weight'];?>

													
								
												</div>
												<div class="col-md-2">
													<a class="btn btn-info" href="data_ajax_online.php?id=<?php echo $row['id'];?>">Stack</a>
												</div>
											</div>
											
											
										</div>
									</div>
									<?php
								}
								?>
								</div>
								<!--<div class="col-md-12">this is also another</div>-->
							</div>
							<div class="row">
								<form id="form" method="post">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label>Diaseas</label>
													<input type="text" name="diases" class="form-control">
												</div>
											</div>
											<div class="col-md-12">
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
                                                             <label>Enter Multiple Medicines Name</label>
                                                              <div class="input-group">
                                                                 <input type="text" id="search_data" placeholder="" autocomplete="off" class="form-control" name="medi" />
                                                  
                                                               </div>
                                                               <br />
                                                               <span id="country_name"></span>
                                                        </div>

													</div>
												</div>
											</div>
											<div class="col-md-12">
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label>Doctor Remarks</label>
															<textarea name="remark" class="form-control" cols="7" rows="6"></textarea>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-12">
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label>Next Session</label>
															<input  class="form-control" type="date" name="app_date"  id="app_date" title="Choose your desired date" min="<?php echo date('Y-m-d'); ?>"/>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<input type="submit" name="input" class="btn btn-info">
											</div>
											<div class="col-md-6">
												<button id="btn-patient">Sent Link to patient</button>
												<small id="result"></small>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<!--<div class="col-md-12">this is another div</div>-->
					</div>
					<div class="col-md-4 my-4">
						<h5>Previous History of patient </h5>
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12">
									<div class="col-md-6" id="pat_data"></div>
								</div>
								<div class="col-md-12"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
  $(document).ready(function(){
      
    $('#search_data').tokenfield({
        autocomplete :{
            source: function(request, response)
            {
                jQuery.get('med_ajax.php', {
                    query : request.term
                }, function(data){
                    data = JSON.parse(data);
                    response(data);
                });
            },
            delay: 100
        }
    });

    $('#search').click(function(){
        $('#country_name').text($('#search_data').val());
    });

    function data()
    {
    	var data=$("#p_id").val();
    	//alert(data);

    	$.ajax({
    		url:"history_ajax.php",
    		type:"POST",
    		data:{data:data},
    		success:function(data)
    		{
    			$("#pat_data").html(data);
    		}
    	});
    }

    data();

    $("#btn-patient").click(function(){
    	var data=$("#p_id").val();
    	$.ajax({
    		url:"link.php",
    		type:"POST",
    		data:{data:data},
    		success:function(data)
    		{
    			$("#result").html(data);
    		}
    	});
    });

  });
</script>

</body>
</html>
<?php

if(isset($_POST['input']))
{
	$diases=$_POST['diases'];
	$date=$_POST['app_date'];
	$med_name=$_POST['medi'];
	$remarks=$_POST['remark'];
	$doct=$_SESSION['doct'];

	$app_date=$date;


	$save="INSERT INTO pat_med(pat_username,diases,medician,remarks,next_app_date,checked_by) VALUES ('$user','$diases','$med_name','$remarks','$date','$doct')";

	$res=mysqli_query($conn,$save);	

	if($res)
	{
		echo $user;
		$query="UPDATE appointment SET status='checked' WHERE pat_username='$user'";

	    $result=mysqli_query($conn,$query);


	    if($result)
	    {
	    	header("location:diagnose_med.php");
	    }
	    else
	    {
	    	echo "fail";
	    }
	}
	else
	{
	   echo"<scritp>alert('fail');</script>";	
	}

	//header("location:dignose_med.php");
     ob_end_flush();
}

?>

