<?php
if(!isset($_SESSION)){
    session_start();
}
require_once("../config.php");
$var= array();
function sharePoint()
{
	global $host;
	global $user;
	global $pass;
	global $db;
	global $var;
	$idUserA		=	$_POST['idUserA'];
	$idUserB		=	$_POST['idUserB'];
	$UIDTAGS		=	split(",",$idUserB);
	$subpoint			=	$_POST['subpoint'];
	$sidUser		= $_POST['sidUser'];
	$con=mysqli_connect($host,$user,$pass,$db);
	if ($_SESSION['session-user'] !=$_POST['idUserA'] || !checkSecurityUser($idUserA,$sidUser) || !checkSecurityUser($_SESSION['session-user'],$sidUser))
	{
		mysqli_query($con,"UPDATE atw_user set user_status = 'FPOINT: CHECK SECURITYUSER FAIL' where user_id=".$_SESSION['session-user']);
		mysqli_close($con);	
		return;
	}
	$resultA=mysqli_query($con,"select * from atw_point where idUser=".$idUserA." limit 1");
	$pointOfUserA = mysqli_fetch_array($resultA);
	$pointA = -($subpoint*count($UIDTAGS)) + $pointOfUserA['point'];	
	if ($pointA>0 && count($UIDTAGS)>0 && $idUserB!="")
	{		
		$var['pointA']=$pointA;
		$var['pointShare']=$subpoint;
		if ($resultA->num_rows>0)
			mysqli_query($con,"UPDATE atw_point set point = ".$pointA." where idUser=".$idUserA); 
		else
			mysqli_query($con,"insert into atw_point (idUser,point) values (".$idUserA.",".$pointA.")");			
		for ($jj=0;$jj< count($UIDTAGS);$jj++)
		{
			$idUserB=$UIDTAGS[$jj];			
			$resultB=mysqli_query($con,"select * from atw_point where idUser=".$idUserB." limit 1");
			$pointOfUser = mysqli_fetch_array($resultB);
			$point = $subpoint + $pointOfUser['point'];
			if ($resultA->num_rows>0)
				mysqli_query($con,"UPDATE atw_point set point = ".$point." where idUser=".$idUserB); 
			else
				mysqli_query($con,"insert into atw_point (idUser,point) values (".$idUserB.",".$point.")");
		}		
	}
	else
		$var['pointShare']=0;
	mysqli_close($con);	
}

function checkSecurityUser($idUser,$sidUser)
{
	$tmp=MD5(intval($idUser)*1606);
	if ($sidUser == $tmp)
		return true;
	return false;
}
sharePoint();

echo json_encode($var);
?>