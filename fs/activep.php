<?php
if(!isset($_SESSION)){
    session_start();
}
require_once("definelocal.php");
include_once("define.php");
include_once("config.php");
include_once("system/function.php");
global $host;
global $user;
global $pass;
global $db;
if(isset($_GET[email]))
{
	$con=mysqli_connect($host,$user,$pass,$db);
	mysqli_set_charset($con, "utf8");
	$email=$_GET['email'];
	$newpass=$_GET['code'];
	mysqli_query($con,"UPDATE atw_user set user_pass='".($newpass)."' where user_email='".$email."' and user_tpass='".$newpass."'");
	mysqli_query($con,"UPDATE atw_user set user_tpass='' where user_email='".$email."'");
	mysqli_close($con);
	$_SESSION['messlogin']='Kích hoạt password thành công';
	if(LOCAL=="TRUE")	
		header('Location: http://localhost/faceseo.vn/');
	else
		header('Location: http://faceseo.vn/');
	//test http://localhost/faceseo.vn/activep.php?code=e6053eb8d35e02ae40beeeacef203c1a&email=linh.nguyenhong@gameloft.com&token=ee5d4bcc6dc501c89a9883fcf4429ee7
}