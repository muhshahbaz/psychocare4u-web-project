<?php
include("../include/connection.php");
session_start();
$recept=$_SESSION['recept'];

$q="UPDATE reception_log SET logout='".date('Y-m-d h:i:s')."' WHERE username='$recept' AND logout='' ";

$res=mysqli_query($conn,$q);
session_unset();
session_destroy();

header("location:../index.php");

?>