<?php
//fix
	include_once("../config.php");
	global $host;
	global $user;
	global $pass;
	global $db;
	$id_user= $_POST['idUser'];
	$con=mysqli_connect($host,$user,$pass,$db);
	$result_id_comment=mysqli_query($con,"select message_id_post from fs_message where message_user_id=".$id_user. " order by message_id desc limit 1");		
	$idLastCommentOfUser=0;
	if($result_id_comment->num_rows>0)
	{
		$result_id_comment = mysqli_fetch_array($result_id_comment);
		$idLastCommentOfUser= intval($result_id_comment['message_id_post']);
	}	
	//check exist user in table fs_check_notify
	$resulUserInCheckNotify=mysqli_query($con,"select * from fs_check_message where check_ms_id_user=".$id_user);
	if ($resulUserInCheckNotify->num_rows>0)
	{		
		$result_check_notify=mysqli_query($con,"UPDATE fs_check_message set check_ms_id_post = ".$idLastCommentOfUser." where check_ms_id_user=".$id_user);	
	}
	else
	{
		$result_check_notify=mysqli_query($con,"insert into fs_check_message (check_ms_id_user,check_ms_id_post) values ('".$id_user."',".$idLastCommentOfUser.")" );														
	}
?>