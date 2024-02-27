<?php
include("../include/connection.php");
session_start();
date_default_timezone_set('Asia/Kolkata');
$doct=$_SESSION['doct'];

$q="UPDATE doctor_log SET logout='".date('Y-m-d h:i:s')."' WHERE username='$doct' AND logout='' ";

$res=mysqli_query($conn,$q);

session_unset();
session_destroy();

header("location:../doctor_login.php");

?>