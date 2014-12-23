<?php
if(!isset($_SESSION)){
    session_start();
}
require_once("../config.php");
require_once("../user.php");
function addpointshare()	
{
	global $host;
	global $user;
	global $pass;
	global $db;
	$idUser			=	$_SESSION['session-user'];
	$pointBonus			=	20;
	$link			= 	$_POST['link'];
	$con=mysqli_connect($host,$user,$pass,$db);
	if ($_POST['point']>550 && $_SESSION['session-user']>0 || $_POST['idUser']!=$_SESSION['session-user'])
	{
			mysqli_query($con,"insert into fs_log_del (log_del_user,log_del_user_removed,log_del_id_post,log_del_type) values ('".$_SESSION['session-user']."','0','0',1)");
	}		
	$okshare=mysqli_query($con,"select * from fs_fbshare where fbshare_iduser like '%".$idUser."%' and fbshare_link='".$link."'");
	$result=mysqli_query($con,"select * from atw_point where idUser=".$idUser." limit 1");
	$rsPointA = mysqli_fetch_array($result);
	$pointA = $rsPointA['point'];	
	$timezone  = +7;//+7; //(GMT +7:00) 
	$datetime = gmdate("Y-m-d H:i:s", time() + 3600*($timezone+date("0")));
	$timeCurrent = time() + 3600*($timezone+date("0"));
	if($okshare->num_rows>0)
	{
		$row = mysqli_fetch_array($okshare);
		// find index user
		$users	= $row['fbshare_iduser'];
		$IDU	= find($idUser,$users);
		$times	= $row['fbshare_time'];
		$time	= getTimeSave($times,$IDU)
		$timeSaved=strtotime($time);
		$newtimes= insertStrTime($times,$IDU,$datetime);
		$t =$timeCurrent - $timeSaved;		
		if ($t>7*86400 || ($pointA > -1 && $pointA < 100))
		{
			mysqli_query($con,"UPDATE fs_fbshare set fbshare_time = '".$newtimes."'  where fbshare_iduser like '%".$idUser."%' and fbshare_link='".$link."'");		
			/*$pointrandom=rand (100,200);*/
			$point = $pointBonus + $pointA;
			if ($result->num_rows>0)
				mysqli_query($con,"UPDATE atw_point set point = ".$point." where idUser=".$idUser); 
			else
				mysqli_query($con,"insert into atw_point (idUser,point) values (".$idUser.",".$point.")");
		}
		else
		{
			echo "Mỗi tuần chỉ được share 1link/1lần";
		}	
		
	}
	else
	{
		// check nếu tốn tại link getlink trong database
		mysqli_query($con,"insert into fs_fbshare (fbshare_link,fbshare_iduser,fbshare_time) values ('".$link."',".$idUser.",'".$datetime."')");
		$result=mysqli_query($con,"select * from atw_point where idUser=".$idUser." limit 1");
		$rsPointA = mysqli_fetch_array($result);
		$point = $point + $rsPointA['point'];
		if ($result->num_rows>0)
			mysqli_query($con,"UPDATE atw_point set point = ".$point." where idUser=".$idUser); 
		else
			mysqli_query($con,"insert into atw_point (idUser,point) values (".$idUser.",".$point.")");
	}	
	mysqli_close($con);	
}
addpointshare()	;
/*
check user shared link
Mỗi ngày chỉ được share link 1 lần vì vậy phải check link đã share
Nếu chưa add user thì add user vào list những thành viên đã share
Update string time 2014-04-01 10:14:06
*/
function find($str,$arr)
{
	$l=split(",",$arr);
	for ($i=0;$i<count($l);$i++)
	{
		if($l[$i]==$str)
			return $i;
	}
	return -1;
}
function getTimeSave($strtime,$index)
{
	$start	=$index*20;
	$numchar=19;
	return substr($strtime,$start,$numchar);
}
function insertStrTime($strTime,$i,$currentTime)
{
	return substr_replace($strTime, "$currentTime,", $i, 20);
}
?>