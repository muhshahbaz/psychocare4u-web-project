<?php
session_start();
if(!isset($_SESSION['recept']))
{
	header("location:../receptionist_login.php");
}
include("../include/receptHeader.php");
include("../include/connection.php");

if(isset($_POST['search']))
{
	$name=$_POST['name'];
	$phone=$_POST['phone'];
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>HealthCare | Partner with you to enhance the quality of your life.</title>
        <meta name="description" content="Partner with you to enhance the quality of your life.">
        <link rel="icon" type="image/icon" href="include/img/logo.png" />
        <style type="text/css">
        	.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  transition: opacity 500ms;
  visibility: hidden;
  opacity: 0;
}
.overlay:target {
  visibility: visible;
  opacity: 1;
}

.popup {
  margin: 70px auto;
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  width: 30%;
  position: relative;
  transition: all 5s ease-in-out;
}
.popup .close {
  position: absolute;
  top: 20px;
  right: 30px;
  transition: all 200ms;
  font-size: 30px;
  text-decoration: none;
  color: #333;
}
.popup .close:hover {
  color: #06D85F;
}
@media screen and (max-width: 700px){
  .box{
    width: 70%;
  }
  .popup{
    width: 70%;
  }
}
        </style>
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
						<div class="col-md-8">
							<h5 class="text-success text-center my-2">Appionments</h5>
				            <table class="table table-bordered">
					            <tr>
					                <th>Token ID</th>
					                <th>Name</th>
					                <th>Phone</th>
					                <th>Doctor</th>
					                <th colspan="2" class="text-center">Action</th>
					            </tr>
					      

					            <?php

					            $query="SELECT * FROM patient INNER JOIN appointment ON patient.username=appointment.pat_username WHERE status='pendding'";

					            $resu=mysqli_query($conn,$query);

					            while($row=mysqli_fetch_assoc($resu))
					            {

					            ?>
					            	<tr>
					            		<td><?php echo $row['username']; ?></td>
					            		<td><?php echo $row['fname']; ?></td>
					            		<td><?php echo $row['phone']; ?></td>
					            		<td><?php echo $row['doct_username']; ?></td>
					            		<td><a class="btn btn-info text-white" href="#popup1">Edit</a></td>
					            		<div id="popup1" class="overlay">
	                                <div class="popup">
	                                	<form method="post">
		                            <h2>Patient Form</h2>
		                            <input type="hidden" name="user" value="<?php echo $row['pat_username'];?>">
		                            Blood Presure <input type="text" name="bp" class="form-control" id="bp">
		                            Weight <input type="text" name="weight" class="form-control" id="weight"><br>
		                            <input type="submit" name="submit" value="add">
		                            <a class="close" href="#">&times;</a>
		                            </div>
	                                </div>
	                                </form>
                                    </div>
					            		<td><a class="btn btn-success text-white" href="app_approve.php? id=<?php echo $row['id'];?>">Aprove</a></td>
					            	</tr>
					            	<?php
					            }

					            ?>
				            </table>
						</div>
						<div class="col-md-4">
							<h5 class="text-center my-2 text-info">Search for appoinments</h5>

							<form>
                                <div class="form-group">
                                	<label>Username</label>
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