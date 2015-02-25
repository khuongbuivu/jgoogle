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
	$idUser			=	$_POST['idUser'];
	$point			=	1000;
	$con=mysqli_connect($host,$user,$pass,$db);
	if ($_POST['point']>1050 && $_SESSION['session-user']>0 || $_POST['idUser']!=$_SESSION['session-user'])
	{
			mysqli_query($con,"insert into fs_log_del (log_del_user,log_del_user_removed,log_del_id_post,log_del_type) values ('".$_SESSION['session-user']."','0','0',1)");
			mysqli_query($con,"UPDATE atw_user set user_status = 'ADD_POINT_SHARE: HACK POINT SHARE' where user_id=".$_SESSION['session-user']);
	}
		
	$okshare=mysqli_query($con,"select * from fs_share where share_iduser=".$idUser);
	$result=mysqli_query($con,"select * from atw_point where idUser=".$idUser." limit 1");
	$pointOfUser = mysqli_fetch_array($result);
	$pointCurrent = $pointOfUser['point'];	
	$timezone  = +7;
	$datetime = gmdate("Y-m-d H:i:s", time() + 3600*($timezone+date("0")));
	$timeCurrent = time() + 3600*($timezone+date("0"));
	$share_num=0;	
	$infoUser=getUserInfo($idUser);
	if($infoUser['user_gender']=="male")
		$textReply="Cảm ơn anh ".$infoUser['user_name']." đã chia sẻ. Tặng anh ";
	else
		$textReply="Cảm ơn chị ".$infoUser['user_name']." đã chia sẻ. Tặng chị ";
	if($okshare->num_rows>0)
	{
		$row = mysqli_fetch_array($okshare);
		$share_num= $row['share_num'] + 1;		
		$timeSaved=strtotime($row['share_time']);
		$t =$timeCurrent - $timeSaved;		
		$day=0;
		if ($t>86400 && $t < 86400*12)
			$day=(int)($t/86400);
		mysqli_query($con,"UPDATE fs_share set share_time = '".$share_time."',share_num=".$share_num."  where share_iduser=".$idUser);		
		if ($pointCurrent > -1 && $pointCurrent < 100 && $day > 1 )
		{
			$pointrandom=rand (100,200);
			echo $textReply.$pointrandom." điểm";
			$point = $pointrandom + $pointCurrent;
			if ($result->num_rows>0)
				mysqli_query($con,"UPDATE atw_point set point = ".$point." where idUser=".$idUser); 
			else
				mysqli_query($con,"insert into atw_point (idUser,point) values (".$idUser.",".$point.")");
		}
		else
		{
			echo "Bạn đã share rồi share lại không được cộng điểm";
		}		
	}
	else
	{
		echo $textReply."1000 điểm";
		mysqli_query($con,"insert into fs_share (share_iduser,share_num,share_time) values (".$idUser.",".$share_num.",'".$datetime."')");
		$result=mysqli_query($con,"select * from atw_point where idUser=".$idUser." limit 1");
		$pointOfUser = mysqli_fetch_array($result);
		$point = $point + $pointOfUser['point'];
		if ($result->num_rows>0)
			mysqli_query($con,"UPDATE atw_point set point = ".$point." where idUser=".$idUser); 
		else
			mysqli_query($con,"insert into atw_point (idUser,point) values (".$idUser.",".$point.")");
	}	
	mysqli_close($con);	
}
addpointshare()	;
?>