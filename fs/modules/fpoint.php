<?php
session_start();
require_once("../config.php");
function subpoint()
{
	global $host;
	global $user;
	global $pass;
	global $db;
	$idUser			=	$_POST['idUser'];
	$subpoint			=	$_POST['subpoint'];
	$sidUser		= $_POST['sidUser'];
	$con=mysqli_connect($host,$user,$pass,$db);
	if ($_SESSION['session-user'] !=$_POST['idUser'] || $subpoint < - 20 || !checkSecurityUser($idUser,$sidUser) || !checkSecurityUser($_SESSION['session-user'],$sidUser))
	{
		mysqli_query($con,"UPDATE atw_user set user_status = 6 where user_id=".$_SESSION['session-user']);
		mysqli_close($con);	
		return;
	}
	
	$result=mysqli_query($con,"select * from atw_point where idUser=".$idUser." limit 1");
	$pointOfUser = mysqli_fetch_array($result);
	$point = $subpoint + $pointOfUser['point'];
	if ($result->num_rows>0)
		$result=mysqli_query($con,"UPDATE atw_point set point = ".$point." where idUser=".$idUser); 
	else
		$result=mysqli_query($con,"insert into atw_point (idUser,point) values (".$idUser.",".$point.")");
	echo $point;
	mysqli_close($con);	
}
function subpointPost()
{
	global $host;
	global $user;
	global $pass;
	global $db;
	$idUser			=	$_POST['idUser'];
	$sidUser		= $_POST['sidUser'];

	$con=mysqli_connect($host,$user,$pass,$db);
	if ($_SESSION['session-user'] !=$_POST['idUser']  || !checkSecurityUser($idUser,$sidUser) || !checkSecurityUser($_SESSION['session-user'],$sidUser))
	{
		mysqli_query($con,"UPDATE atw_user set user_status = 6 where user_id=".$_SESSION['session-user']);
		mysqli_close($con);	
		return;
	}
	$result=mysqli_query($con,"select * from atw_point where idUser=".$idUser." limit 1");
	$pointOfUser = mysqli_fetch_array($result);
	$point = -20 + $pointOfUser['point'];
	if ($result->num_rows>0)
		$result=mysqli_query($con,"UPDATE atw_point set point = ".$point." where idUser=".$idUser); 
	else
		$result=mysqli_query($con,"insert into atw_point (idUser,point) values (".$idUser.",".$point.")");
	echo $point;
	mysqli_close($con);	
}
function checkSecurityUser($idUser,$sidUser)
{
	$tmp=MD5(intval($idUser)*1606);
	if ($sidUser == $tmp)
		return true;
	return false;
}
?>