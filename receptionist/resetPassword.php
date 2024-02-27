<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require '../include/connection.php';
$error="";
if(isset($_POST['email'])){
		$emailToSend=$_POST['email'];
		$search="SELECT * FROM recept_log where email='$emailToSend'";
		$run=mysqli_query($conn,$search);
		$res=mysqli_num_rows($run);
		if($res==""){
				$error.="User not found";
		}
		else{
	$emailToSend=$_POST['email'];
	$token=uniqid(true);
	$query="INSERT INTO resetpass(token,email) VALUES('$token','$emailToSend')";
	$run=mysqli_query($conn,$query);


// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = '0';                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'd422client@gmail.com';                     // SMTP username
    $mail->Password   = 'client422d@';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('baburali894@gmail.com', 'Reset your password');
    $mail->addAddress($emailToSend);     // Add a recipien       
    $mail->addReplyTo('no-reply@gmail.com', 'No Reply');

    // Content
    $url="http://".$_SERVER["HTTP_HOST"].dirname($_SERVER["PHP_SELF"])."/reset.php?token=$token";
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Reset Your Password';
    $mail->Body    = "<h3>You requested a password reset</h3>
    					Click <a href='$url'>This link</a> to reset your password";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    $error= "<h4 class='text-success'>Reset link has been sent on your email account<h4/>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
        <meta name="description" content="Partner with you to enhance the quality of your life.">
        <link rel="icon" type="image/icon" href="include/img/logo.png" />
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php  include("../include/topbar.php");?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4 jumbotron my-3">
                    <h5 class="text-center my-3">Reset You password</h5>
                    <div></div>
                    <form method="post">
                        <?php echo '<h6 class="text-danger">'.$error.'</h6>'?>
                        <div></div>
                        <div class="form-group">
                            <label>Enter Your Regester Email Address</label>
                            <input name="email" placeholder="Enter Your Email Address" required class="form-control" autocomplete="off">
                        </div>
                        <input type="submit" name="submit" class="btn btn-success">
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-info" href="../receptionist_login.php">Receptionist Login</a>
                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>
</body>
</html>