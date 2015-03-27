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
	$issetemailsend=mysqli_query($con,"select * from fs_sendmail where sendmail_email='".$email."'");
	$datetime = gmdate("Y-m-d H:i:s", time() + ($timezone+date("0")));
	$timeCurrent = time() + ($timezone+date("0"));
	if ($issetemailsend->num_rows>0)
	{
		$row = mysqli_fetch_array($issetemailsend);
		$timeSaved=strtotime($row['sendmail_time']);
		$t =$timeCurrent - $timeSaved;
		$day=0;
		if ($t>86400)
				$day=($t/86400);
		// onday reset, send mail one time
		if ($day < 1)
		{
			mysqli_query($con,"UPDATE atw_user set user_pass='".($newpass)."' where user_email='".$email."' and user_tpass='".$newpass."'");
			mysqli_query($con,"UPDATE atw_user set user_tpass='' where user_email='".$email."'");
			$_SESSION['messlogin']='Kích hoạt password thành công';
		}
		else
			$_SESSION['messlogin']='Mã kích hoạt hết hạn.';
	}
	mysqli_close($con);
	if(LOCAL=="TRUE")
		header('Location: http://localhost/'.DOMAIN);
	else
		header('Location: http://'.DOMAIN);
	//test http://localhost/DOMAIN/activep.php?code=e6053eb8d35e02ae40beeeacef203c1a&email=linh.nguyenhong@gameloft.com&token=ee5d4bcc6dc501c89a9883fcf4429ee7
}