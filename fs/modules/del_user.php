<?php
session_start();
include_once("../config.php");
include_once("../user.php");
include_once("../system/function.php");
global $host;
global $user;
global $pass;
global $db;

$post_iduser=$_POST['idUser'];
$post_id= $_POST['post_id'];
if ($_SESSION['session-user']>0)
{
	$con=mysqli_connect($host,$user,$pass,$db);
	$result=mysqli_query($con,"Select post_iduser from atw_post where post_id=".$_POST['post_id'] );
	if($result->num_rows>0)
	{
		
		$row = mysqli_fetch_array($result);
		$infosUser1=getUserInfo($row['post_iduser']);
		$user1 = $infosUser1['user_manager'];
		$infosUser2=getUserInfo($_SESSION['session-user']);
		$user2 = $infosUser2['user_manager'];
		if($row['post_iduser']==$post_iduser && $user2>$user1)
		{
			mysqli_query($con,"UPDATE atw_user set user_status = 0 where user_id=".$row['post_iduser']); 
			mysqli_query($con,"DELETE FROM atw_post  where post_iduser=".$row['post_iduser']);		
			mysqli_query($con,"DELETE FROM atw_cmt_content  where userId=".$row['post_iduser']);
			mysqli_query($con,"insert into fs_log_del (log_del_user,log_del_user_removed,log_del_id_post,log_del_type) values ('".$_SESSION['session-user']."','".$row['post_iduser']."','".$_POST['post_id']."',1)");
		}
	}
}

mysqli_close($con);
?>