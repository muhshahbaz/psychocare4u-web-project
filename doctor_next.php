<?php
ob_start();
session_start();
include("include/header.php");
include("include/connection.php");
?>
<?php

        if(isset($_POST['submit']))
        {
    
            $username=($_POST['username']);
            $email=($_POST['email']);
            $password=($_POST['password']);

            $error=array();

            if(empty($username))
            {
                $error['recept_log']="please type username";
            }
            else if(empty($email))
            {
                $error['recept_log']="please type email";
            }
            
            if(count($error)==0)
            {

                $_SESSION['username']=$username;
                $_SESSION['email']=$email;
                $_SESSION['password']=$password;
                
            }
        }
    

?>
<!DOCTYPE html>
<html>
<head>
	<title>HealthCare | Partner with you to enhance the quality of your life</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Partner with you to enhance the quality of your life.">
        <link rel="icon" type="image/icon" href="include/img/logo.png" />
</head>
<body>


     <div class="container-fluid">
		
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6 my-3 jumbotron">
				<h5 class="text-center">Complete Application Form</h5>
				<form method="post">
					
					<div class="form-row">
						<div class="form-group col-md-6">
							<label>Doctor Name*</label>
							<input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Doctor Name" required>
						</div>
						<div class="form-group col-md-6">
							<label>CNIC*</label>
							<input type="number" name="sname"  autocomplete="off" data-inputmask="'mask': '99999-9999999-9'"  placeholder="XXXXXXXXXXXXX" maxlength="15" class="form-control" required>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label>Gender</label>
							<div class="row">
								<div class="form-group col-md-6">
									<label>Male</label>
									<input type="radio" checked selected name="gender" value="Male" >
								</div>
								<div class="form-group col-md-6">
									<label>Female</label>
									<input type="radio" name="gender" value="Female" autocomplete="off">
								</div>
							</div>
						</div>
						<div class="form-group col-md-6">
							<label>City*</label>
							<select class="form-control" name="city" required>
								<option value="" disabled>Punjab Cities</option>
                                <option value="Ahmed Nager Chatha">Ahmed Nager Chatha</option>
                                <option value="Ahmadpur East">Ahmadpur East</option>
                                <option value="Ali Khan Abad">Ali Khan Abad</option>
                                <option value="Alipur">Alipur</option>
                                <option value="Arifwala">Arifwala</option>
                                <option value="Attock">Attock</option>
                                <option value="Bhera">Bhera</option>
                                <option value="Bhalwal">Bhalwal</option>
                                <option value="Bahawalnagar">Bahawalnagar</option>
                                <option value="Bahawalpur">Bahawalpur</option>
                                <option value="Bhakkar">Bhakkar</option>
                                <option value="Burewala">Burewala</option>
                                <option value="Chillianwala">Chillianwala</option>
                                <option value="Chakwal">Chakwal</option>
                                <option value="Chichawatni">Chichawatni</option>
                                <option value="Chiniot">Chiniot</option>
                                <option value="Chishtian">Chishtian</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label>Contact Number*</label>
						<input type="number" name="phone" class="form-control" data-inputmask="'mask': '0399-9999999'" required=""  type = "number" maxlength = "12" placeholder="XXXXXXXXXXX" required>
					</div>
					<div class="form-group">
						<label>Qualification*</label>
						<input type="text" name="qualification" placeholder="Last Degree" class="form-control" autocomplete="off" required>
					</div>
					<div class="form-group">
						<label>Specilization*</label>
						<input type="text" name="specilization" class="form-control" placeholder="Enter Specilization" autocomplete="off" required>
					</div>
					<div class="form-group">
						<label>Profile Summery*</label>
						<textarea cols="5" rows="3" class="form-control" name="summery" placeholder="Profile Summery..." maxlength="1000" minlength="" autocomplete="off" required></textarea>
					</div>

					<input type="submit" name="finalsubmission" value="Next Step" class="form-control btn-success">
				</form>
			</div>
			<div class="col-md-3"></div>
		</div>

	  </div>
	</body>
</html>
<?php
if(isset($_POST['finalsubmission']))
{
    //$username=$_SESSION['doct_log'];
    $firstname=$_POST['fname'];
    $surname=$_POST['sname'];
    $gender=$_POST['gender'];
    $city=$_POST['city'];
    $phone=$_POST['phone'];
    $qualification=$_POST['qualification'];
    $specilization=$_POST['specilization'];
    $summery=$_POST['summery'];

    $username=$_SESSION['username'];
    $email=$_SESSION['email'];
    $password=$_SESSION['password'];

    $error=array();

    if(empty($firstname))
    {
        $error['doct_detail']="please enter firstname";
    }
    else if(empty($surname))
    {
        $error['doct_detail']="please enter surname";
    }
    else if(empty($gender))
    {
        $error['doct_detail']="please select a gender";
    }
    else if(empty($city))
    {
        $error['doct_detail']="please select a city";
    }
    else if(empty($phone))
    {
        $error['doct_detail']="please enter a valid phone number";
    }
    else if(empty($qualification))
    {
        $error['doct_detail']="please enter your last degree";
    }
    else if(empty($specilization))
    {
        $error['doct_detail']="please enter your specilization";
    }


    if(count($error)==0)
    {
        $query="INSERT INTO doct_log(username,email,password) VALUES ('$username','$email','$password')";
        $res=mysqli_query($conn,$query);

        if($res)
        {
            $query="INSERT INTO doct_detail(username,firstname,lastname,gender,qualification,specilization,phone,city,summery,status) VALUES ('$username','$firstname','$surname','$gender','$qualification','$specilization','$phone','$city','$summery','pendding')";
            $resu=mysqli_query($conn,$query);

            if($resu)
            {
                echo "<script>alert('You are registered sucesssfully please login and upload profile photo');</script>";
                header("location:doctor_login.php");

            }
            else
            {
                echo "<script>alert('System testing fail');</script>";
                echo mysqli_error($conn);
            }

        }
         
    }
    ob_end_flush();

}
?>
