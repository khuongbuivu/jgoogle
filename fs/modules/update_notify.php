<?php
//fix
	include_once("../config.php");
	global $host;
	global $user;
	global $pass;
	global $db;
	$id_user= $_POST['idUser'];
	$con=mysqli_connect($host,$user,$pass,$db);
	$result_id_comment=mysqli_query($con,"select notify_id_comment from atw_notify where notify_user_id=".$id_user. " order by notify_id_comment desc limit 1");		
	$idLastCommentOfUser=0;
	if($result_id_comment->num_rows>0)
	{
		$result_id_comment = mysqli_fetch_array($result_id_comment);
		$idLastCommentOfUser= intval($result_id_comment['notify_id_comment']);
	}	
	//check exist user in table fs_check_notify
	$resulUserInCheckNotify=mysqli_query($con,"select * from fs_check_notify where check_notify_id_user=".$id_user);
	if ($resulUserInCheckNotify->num_rows>0)
	{		
		echo "UPDATE fs_check_notify set check_notify_id_comment = ".$idLastCommentOfUser." where check_notify_id_user=".$id_user;
		$result_check_notify=mysqli_query($con,"UPDATE fs_check_notify set check_notify_id_comment = ".$idLastCommentOfUser." where check_notify_id_user=".$id_user);	
	}
	else
	{
		echo "insert into fs_check_notify (check_notify_id_user,check_notify_id_comment) values ('".$id_user."',".$idLastCommentOfUser.")" ;
		$result_check_notify=mysqli_query($con,"insert into fs_check_notify (check_notify_id_user,check_notify_id_comment) values ('".$id_user."',".$idLastCommentOfUser.")" );														
	}
?>