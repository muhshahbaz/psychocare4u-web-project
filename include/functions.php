<?php

function admin_restraction()
{

}

function recept_restraction()
{

}

function doctor_restraction()
{

if(!isset($_SESSION['doct']))
{
	header("location:../doctor_login.php");
}

}
function flash($name,$text=''){
	if(isset($_SESSION[$name])){
		$msg=$_SESSION[$name];
		unset($_SESSION[$name]);
		return $msg;
	}else {
		$_SESSION[$name]=$text;
	}
	return '';
}


?>