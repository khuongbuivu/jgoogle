<?php 
if(!isset($_SESSION)){
    session_start();
}
	require_once("config.php");	
	function addPoint()
	{
		global $host;
		global $user;
		global $pass;
		global $db;
		$linkClicked	=	$_POST['linkClicked'];
		$linkClicked 	= 	removeSlashEndUrl($linkClicked);
		$idUser			=	$_POST['idUser'];
		$point			=	$_POST['point'];
		$okap			= false;
		$con=mysqli_connect($host,$user,$pass,$db);
		if ($idUser=="100001790943200" || $idUser=="100001655675884" || $idUser=="100002442662639")
		{			
			mysqli_query($con,"UPDATE atw_user set user_status = 'ADD_POINT_BANNER: DISABLE SOME ID' where user_id=".$_SESSION['session-user']);
			exit();
		}
		$result=mysqli_query($con,"select * from atw_point where idUser=".$idUser." limit 1");
		$result1=mysqli_query($con,"select * from awt_list_url where iduser='".$idUser."' and url='".$linkClicked."'");	
		$ctime = mysqli_query($con," select timeview, timeclose from atw_click_link where timeview > 0 and idUser=".$idUser." order by id desc");
		if($ctime->num_rows>0)
		{
			$rts = mysqli_fetch_array($ctime);
			$timeSaved= substr($rts['timeclose'],0,8);
			$oldday=substr($rts['timeclose'],9);
			$currentTime=date("H:i:s");
			$t2 = strtotime($currentTime);
			$t1 = strtotime($timeSaved);
			$t= $t2 - $t1;
			$dayTime=date("d/m/y");
			if ( ($t>5 && $oldday==$dayTime) || $oldday!=$dayTime)
			{
				$okap = true;
			}
			else
			{
				$okap = false;
				exit();
				mysqli_query($con,"UPDATE atw_user set user_status = 'ADD_POINT_BANNER: AUTO ADD POINT BANNER' where user_id=".$_SESSION['session-user']);
			}	
		}
		
		while ($row = mysqli_fetch_array($result))
		{
			if(!($result1->num_rows>0))
			{
				
				$minuteView = (int)((intval($point)-600)/60) ; 
				if($minuteView < 5)
				{
					$point = 0 + $row['point'];
				}
				else
				{
					$minuteView = $minuteView > 10? 10 : $minuteView;
					$point = $minuteView + $row['point'];
				}
			}
			else
			{
				$point = $row['point'];
			}
		}	
		if ($result->num_rows>0)
			$result=mysqli_query($con,"UPDATE atw_point set point = ".$point." where idUser=".$idUser); 
		else
			$result=mysqli_query($con,"insert into atw_point (idUser,point) values (".$idUser.",".$point.")");
		echo $point;
		mysqli_close($con);	
	}
	function subPoint()
	{
		global $host;
		global $user;
		global $pass;
		global $db;
		$linkClicked	=	$_POST['linkClicked'];
		$linkClicked 	= 	removeSlashEndUrl($linkClicked);
		$idUser			=	$_POST['idUser'];
		$point			=	$_POST['point'];
		$con=mysqli_connect($host,$user,$pass,$db);
		$result=mysqli_query($con,"select banner_user_id from fs_banner where banner_link like '%".$linkClicked."%'");
		if($result->num_rows>0)
		{
			$row = mysqli_fetch_array($result)		;
			$idUserOfUrl = $row[0];
		}
		if ($idUser	!=$idUserOfUrl)
		{
			$idUser	=$idUserOfUrl;
			$result=mysqli_query($con,"select * from atw_point where idUser=".$idUser);
			while ($row = mysqli_fetch_array($result))
			{		
					$minuteView = (int)(intval($point)/60) ; 
					$point=$minuteView > 4 ? $minuteView : 0 ;
					$point = -$point + $row['point'];
			}	
			if ($result->num_rows>0)
			{
				$result=mysqli_query($con,"UPDATE atw_point set point = ".$point." where idUser=".$idUser);	
			}
			else
				$result=mysqli_query($con,"insert into atw_point (idUser,point) values (".$idUser.",".$point.")");
		}
		mysqli_close($con);	
	}
	function removeSlashEndUrl($url)
	{
		return rtrim($url, "/");
	}
	addPoint();
	subPoint();

?>