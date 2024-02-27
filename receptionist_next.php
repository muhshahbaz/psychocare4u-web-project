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
                /*$query="INSERT INTO recept_log(username,email,password) VALUES ('$username','$email','$password')";
                $res=mysqli_query($conn,$query);
                if($res)
                {
                    echo "suces";
                    $_SESSION['recept_log']=$username;
                    header("location:receptionist_next.php");

                }
                else
                {
                    echo "wrong";
                }*/
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
							<label>Name*</label>
							<input requried type="text" name="fname" class="form-control" autocomplete="off">
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
									<input type="radio" checked name="gender" value="Male">
								</div>
								<div class="form-group col-md-6">
									<label>Female</label>
									<input type="radio" name="gender" value="Female" autocomplete="off">
								</div>
							</div>
						</div>
						<div class="form-group col-md-6">
							<label>City</label>
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
    <option value="Daska">Daska</option>
    <option value="Darya Khan">Darya Khan</option>
    <option value="Dera Ghazi Khan">Dera Ghazi Khan</option>
    <option value="Dhaular">Dhaular</option>
    <option value="Dina">Dina</option>
    <option value="Dinga">Dinga</option>
    <option value="Dipalpur">Dipalpur</option>
    <option value="Faisalabad">Faisalabad</option>
    <option value="Fateh Jhang">Fateh Jang</option>
    <option value="Ghakhar Mandi">Ghakhar Mandi</option>
    <option value="Gojra">Gojra</option>
    <option value="Gujranwala">Gujranwala</option>
    <option value="Gujrat">Gujrat</option>
    <option value="Gujar Khan">Gujar Khan</option>
    <option value="Hafizabad">Hafizabad</option>
    <option value="Haroonabad">Haroonabad</option>
    <option value="Hasilpur">Hasilpur</option>
    <option value="Haveli">Haveli</option>
    <option value="Islamabad">Islamabad</option>
    <option value="Lakha">Lakha</option>
    <option value="Jalalpur">Jalalpur</option>
    <option value="Jattan">Jattan</option>
    <option value="Jampur">Jampur</option>
    <option value="Jaranwala">Jaranwala</option>
    <option value="Jhang">Jhang</option>
    <option value="Jhelum">Jhelum</option>
    <option value="Kalabagh">Kalabagh</option>
    <option value="Karor Lal Esan">Karor Lal Esan</option>
    <option value="Kasur">Kasur</option>
    <option value="Kamalia">Kamalia</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label>Phone Number*</label>
						<input type="number" required name="phone" placeholder="Enter phone number" class="form-control" autocomplete="off">
					</div>
					<div class="form-group">
						<label>Qualification*</label>
						<input type="text" required name="qualification" placeholder="Enter last degree" class="form-control" autocomplete="off">
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
    $username=$_SESSION['username'];
    $email=$_SESSION['email'];
    $password=$_SESSION['password'];


    $query="INSERT INTO recept_log(username,email,password) VALUES ('$username','$email','$password')";
    $res=mysqli_query($conn,$query);
    if($res)
    {
        echo "suces";
        $_SESSION['recept_log']=$username;
        $username=$_SESSION['recept_log'];
    $firstname=$_POST['fname'];
    $surname=$_POST['sname'];
    $gender=$_POST['gender'];
    $city=$_POST['city'];
    $phone=$_POST['phone'];
    $qualification=$_POST['qualification'];

        $query="INSERT INTO recept_detail(username,firstname,lastname,gender,qualification,phone,city,status) VALUES ('$username','$firstname','$surname','$gender','$qualification','$phone','$city','pendding')";
        $resu=mysqli_query($conn,$query);
        
        if($resu)
        {
            echo "<script>alert('Your account created successfuly please login and update your profile ');</script>";
            header("location:receptionist_login.php");
        }
        else
        {
           echo "<script>alert('data not inserted ');</script>";
        }
        //header("location:receptionist_processing.php");

    }
    else
    {
        echo "wrong";
    }
}
ob_end_flush();
?>