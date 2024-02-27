<?php
session_start();
include("../include/connection.php");


if(!isset($_SESSION['recept']))
{
	header("location:../receptionist_login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php 
include("../include/receptHeader.php");
include("../include/connection.php");
ob_start();
$id="";
$query="SELECT id FROM patient ORDER BY id DESC LIMIT 1";

$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)>=1)
{
	while($row=mysqli_fetch_assoc($result))
	{
		$id=$row['id']+1;
		//echo $id;
	}
}
?>


<div class="container-fluid">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-2" style="margin-left: -30px">
				<?php include("sidebar.php");?>
			</div>
			<div class="col-md-10">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-6 jumbotron my-3">
				<h5 class="text-center text-info">Create Account</h5>

				<form method="post">
					<div class="form-group">
						<label>Patient Token (<small style="color: green"><b>* Token is Username</b></small>) :  &nbsp; PSY</label>
						<input type="text" name="uname" class="" autocomplete="off" style="border-style: hidden; margin-left: -4px; background-color: #eee;" value="<?php echo $id; ?>" size="10" readonly >
					</div>
					<div class="form-group">
						<label>Patient Name</label>
						<input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Patient Name" required>
					</div>
					<div class="form-group">
						<label>Father Name</label>
						<input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Patient Father Name" required >
					</div>
					<div class="form-group">
						<label>CNIC (</label>
						<small style="color: green"><b>* CNIC is Password</b></small>)
						<input type="Number" name="cnic" data-inputmask="'mask': '99999-9999999-9'"  placeholder="XXXXXXXXXXXXX" maxlength="15" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Contact Number</label>
						<input type="Number" name="phone" class="form-control" data-inputmask="'mask': '0399-9999999'" required=""  type = "number" maxlength = "12" placeholder="XXXXXXXXXXX">
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label>Age</label>
          						<input type="text" name="age" class="form-control" autocomplete="off" placeholder="Enter Age" required>
							</div>
							<div class="col-md-6">
								<label>Sex</label>
								<select class="form-control" name="sex" required >
									<option value="none">selct one opton</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									<option value="Other">Other</option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label>Marital Status</label>
          						
          						<select name="ms" id="m_status" class="form-control" required>
<option value="">Select Marital Status</option>
<option value="Single">Single</option>
<option value="Engaged">Engaged</option>
<option value="Married">Married</option>
<option value="Second Marriage"> Second Marriage</option>
<option value="Widowed">Widowed</option>
<option value="Divorced">Divorced</option>
</select>
							</div>
							<div class="col-md-6">
								<label>Blood Group</label>
								<select name="bg" id="b_group" class="form-control" required>
<option value="">Select Blood Group</option>
    <option value="A Positive">A Positive</option>
    <option value="A Negative">A Negative</option>
    <option value="A Unknown">A Unknown</option>
    <option value="B Positive">B Positive</option>
    <option value="B Negative">B Negative</option>
    <option value="B Unknown">B Unknown</option>
    <option value="AB Positive">AB Positive</option>
    <option value="AB Negative">AB Negative</option>
    <option value="AB Unknown">AB Unknown</option>
    <option value="O Positive">O Positive</option>
    <option value="O Negative">O Negative</option>
    <option value="Unknown">Unknown</option>
</select>
							</div>
						</div>
					</div>
					

					<div class="form-group">
						<label>City</label>
								<select class="form-control" name="city" required >
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
    <option value="Kamoke">Kamoke</option>
    <option value="Khanewal">Khanewal</option>
    <option value="Khanpur">Khanpur</option>
    <option value="Kharian">Kharian</option>
    <option value="Khushab">Khushab</option>
    <option value="Kot Adu">Kot Adu</option>
    <option value="Jauharabad">Jauharabad</option>
    <option value="Lahore">Lahore</option>
    <option value="Lalamusa">Lalamusa</option>
    <option value="Layyah">Layyah</option>
    <option value="Liaquat Pur">Liaquat Pur</option>
    <option value="Lodhran">Lodhran</option>
    <option value="Malakwal">Malakwal</option>
    <option value="Mamoori">Mamoori</option>
    <option value="Mailsi">Mailsi</option>
    <option value="Mandi Bahauddin">Mandi Bahauddin</option>
    <option value="mian Channu">Mian Channu</option>
    <option value="Mianwali">Mianwali</option>
    <option value="Multan">Multan</option>
    <option value="Murree">Murree</option>
    <option value="Muridke">Muridke</option>
    <option value="Mianwali Bangla">Mianwali Bangla</option>
    <option value="Muzaffargarh">Muzaffargarh</option>
    <option value="Narowal">Narowal</option>
    <option value="Okara">Okara</option>
    <option value="Renala Khurd">Renala Khurd</option>
    <option value="Pakpattan">Pakpattan</option>
    <option value="Pattoki">Pattoki</option>
    <option value="Pir Mahal">Pir Mahal</option>
    <option value="Qaimpur">Qaimpur</option>
    <option value="Qila Didar Singh">Qila Didar Singh</option>
    <option value="Rabwah">Rabwah</option>
    <option value="Raiwind">Raiwind</option>
    <option value="Rajanpur">Rajanpur</option>
    <option value="Rahim Yar Khan" selected>Rahim Yar Khan</option>
    <option value="Rawalpindi">Rawalpindi</option>
    <option value="Sadiqabad">Sadiqabad</option>
    <option value="Safdarabad">Safdarabad</option>
    <option value="Sahiwal">Sahiwal</option>
    <option value="Sangla Hill">Sangla Hill</option>
    <option value="Sarai Alamgir">Sarai Alamgir</option>
    <option value="Sargodha">Sargodha</option>
    <option value="Shakargarh">Shakargarh</option>
    <option value="Sheikhupura">Sheikhupura</option>
    <option value="Sialkot">Sialkot</option>
    <option value="Sohawa">Sohawa</option>
    <option value="Soianwala">Soianwala</option>
    <option value="Siranwali">Siranwali</option>
    <option value="Talagang">Talagang</option>
    <option value="Taxila">Taxila</option>
    <option value="Toba Tek  Singh">Toba Tek Singh</option>
    <option value="Vehari">Vehari</option>
    <option value="Wah Cantonment">Wah Cantonment</option>
    <option value="Wazirabad">Wazirabad</option>
    <option value="" disabled>Sindh Cities</option>
    <option value="Badin">Badin</option>
    <option value="Bhirkan">Bhirkan</option>
    <option value="Rajo Khanani">Rajo Khanani</option>
    <option value="Chak">Chak</option>
    <option value="Dadu">Dadu</option>
    <option value="Digri">Digri</option>
    <option value="Diplo">Diplo</option>
    <option value="Dokri">Dokri</option>
    <option value="Ghotki">Ghotki</option>
    <option value="Haala">Haala</option>
    <option value="Hyderabad">Hyderabad</option>
    <option value="Islamkot">Islamkot</option>
    <option value="Jacobabad">Jacobabad</option>
    <option value="Jamshoro">Jamshoro</option>
    <option value="Jungshahi">Jungshahi</option>
    <option value="Kandhkot">Kandhkot</option>
    <option value="Kandiaro">Kandiaro</option>
    <option value="Karachi">Karachi</option>
    <option value="Kashmore">Kashmore</option>
    <option value="Keti Bandar">Keti Bandar</option>
    <option value="Khairpur">Khairpur</option>
    <option value="Kotri">Kotri</option>
    <option value="Larkana">Larkana</option>
    <option value="Matiari">Matiari</option>
    <option value="Mehar">Mehar</option>
    <option value="Mirpur Khas">Mirpur Khas</option>
    <option value="Mithani">Mithani</option>
    <option value="Mithi">Mithi</option>
    <option value="Mehrabpur">Mehrabpur</option>
    <option value="Moro">Moro</option>
    <option value="Nagarparkar">Nagarparkar</option>
    <option value="Naudero">Naudero</option>
    <option value="Naushahro Feroze">Naushahro Feroze</option>
    <option value="Naushara">Naushara</option>
    <option value="Nawabshah">Nawabshah</option>
    <option value="Nazimabad">Nazimabad</option>
    <option value="Qambar">Qambar</option>
    <option value="Qasimabad">Qasimabad</option>
    <option value="Ranipur">Ranipur</option>
    <option value="Ratodero">Ratodero</option>
    <option value="Rohri">Rohri</option>
    <option value="Sakrand">Sakrand</option>
    <option value="Sanghar">Sanghar</option>
    <option value="Shahbandar">Shahbandar</option>
    <option value="Shahdadkot">Shahdadkot</option>
    <option value="Shahdadpur">Shahdadpur</option>
    <option value="Shahpur Chakar">Shahpur Chakar</option>
    <option value="Shikarpaur">Shikarpaur</option>
    <option value="Sukkur">Sukkur</option>
    <option value="Tangwani">Tangwani</option>
    <option value="Tando Adam Khan">Tando Adam Khan</option>
    <option value="Tando Allahyar">Tando Allahyar</option>
    <option value="Tando Muhammad Khan">Tando Muhammad Khan</option>
    <option value="Thatta">Thatta</option>
    <option value="Umerkot">Umerkot</option>
    <option value="Warah">Warah</option>
    <option value="" disabled>Khyber Cities</option>
    <option value="Abbottabad">Abbottabad</option>
    <option value="Adezai">Adezai</option>
    <option value="Alpuri">Alpuri</option>
    <option value="Akora Khattak">Akora Khattak</option>
    <option value="Ayubia">Ayubia</option>
    <option value="Banda Daud Shah">Banda Daud Shah</option>
    <option value="Bannu">Bannu</option>
    <option value="Batkhela">Batkhela</option>
    <option value="Battagram">Battagram</option>
    <option value="Birote">Birote</option>
    <option value="Chakdara">Chakdara</option>
    <option value="Charsadda">Charsadda</option>
    <option value="Chitral">Chitral</option>
    <option value="Daggar">Daggar</option>
    <option value="Dargai">Dargai</option>
    <option value="Darya Khan">Darya Khan</option>
    <option value="dera Ismail Khan">Dera Ismail Khan</option>
    <option value="Doaba">Doaba</option>
    <option value="Dir">Dir</option>
    <option value="Drosh">Drosh</option>
    <option value="Hangu">Hangu</option>
    <option value="Haripur">Haripur</option>
    <option value="Karak">Karak</option>
    <option value="Kohat">Kohat</option>
    <option value="Kulachi">Kulachi</option>
    <option value="Lakki Marwat">Lakki Marwat</option>
    <option value="Latamber">Latamber</option>
    <option value="Madyan">Madyan</option>
    <option value="Mansehra">Mansehra</option>
    <option value="Mardan">Mardan</option>
    <option value="Mastuj">Mastuj</option>
    <option value="Mingora">Mingora</option>
    <option value="Nowshera">Nowshera</option>
    <option value="Paharpur">Paharpur</option>
    <option value="Pabbi">Pabbi</option>
    <option value="Peshawar">Peshawar</option>
    <option value="Saidu Sharif">Saidu Sharif</option>
    <option value="Shorkot">Shorkot</option>
    <option value="Shewa Adda">Shewa Adda</option>
    <option value="Swabi">Swabi</option>
    <option value="Swat">Swat</option>
    <option value="Tangi">Tangi</option>
    <option value="Tank">Tank</option>
    <option value="Thall">Thall</option>
    <option value="Timergara">Timergara</option>
    <option value="Tordher">Tordher</option>
    <option value="" disabled>Balochistan Cities</option>
    <option value="Awaran">Awaran</option>
    <option value="Barkhan">Barkhan</option>
    <option value="Chagai">Chagai</option>
    <option value="Dera Bugti">Dera Bugti</option>
    <option value="Gwadar">Gwadar</option>
    <option value="Harnai">Harnai</option>
    <option value="Jafarabad">Jafarabad</option>
    <option value="Jhal Magsi">Jhal Magsi</option>
    <option value="Kacchi">Kacchi</option>
    <option value="Kalat">Kalat</option>
    <option value="Kech">Kech</option>
    <option value="Kharan">Kharan</option>
    <option value="Khuzdar">Khuzdar</option>
    <option value="Killa Abdullah">Killa Abdullah</option>
    <option value="Killa Saifullah">Killa Saifullah</option>
    <option value="Kohlu">Kohlu</option>
    <option value="Lasbela">Lasbela</option>
    <option value="Lehri">Lehri</option>
    <option value="Loralai">Loralai</option>
    <option value="Mastung">Mastung</option>
    <option value="Musakhel">Musakhel</option>
    <option value="Nasirabad">Nasirabad</option>
    <option value="Nushki">Nushki</option>
    <option value="Panjgur">Panjgur</option>
    <option value="Pishin valley">Pishin Valley</option>
    <option value="Quetta">Quetta</option>
    <option value="Sherani">Sherani</option>
    <option value="Sibi">Sibi</option>
    <option value="Sohbatpur">Sohbatpur</option>
    <option value="Washuk">Washuk</option>
    <option value="Zhob">Zhob</option>
    <option value="Ziarat">Ziarat</option>
    <option value="Other">Other</option>
  </select>
					</div>
					<input type="submit" name="create" class="btn btn-info" value="Create Account">
					
				</form>	
			</div>
				<div class="col-md-2"></div>
			</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>


<?php
if(isset($_POST['create']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['sname'];
	$username="PSY".$_POST['uname'];
	$cnic=$_POST['cnic'];
	$age=$_POST['age'];
	$phone=$_POST['phone'];
	$gender=$_POST['sex'];
	$city=$_POST['city'];
    $ms=$_POST['ms'];
    $bg=$_POST['bg'];

	$error=array();

	if(empty($fname))
	{
		$error['create']="Type first name";
	}
	else if(empty($lname))
	{
		$error['create']="Type last name";
	}
	else if(empty($username))
	{
		$error['create']="enter username";
	}
	else if(empty($cnic))
	{
		$error['create']="enter cnic";
	}
	else if(empty($phone))
	{
		$error['create']="enter phone number";
	}
	else if($gender=="none")
	{
		$error['create']="please select your gender";
	}
	else if($city=="none")
	{
		$error['create']="please select your city";
	}

	//echo $error['create'];

	if(count($error)==0)
	{
		$q="INSERT INTO patient (fname,lname,username,cnic,age,phone,gender,city,maritial_status,blood_g) VALUES ('$fname','$lname','$username','$cnic','$age','$phone','$gender','$city','$ms','$bg')";
        $result=mysqli_query($conn,$q);


        if($result)
        {
        	header("location:appoinment.php");
        }
        else
        {
        	echo "fail";
        }
	}
}

ob_end_flush();
?>

</body>
</html>