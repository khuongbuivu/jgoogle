<?php
if(!isset($_SESSION)){
    session_start();
}
include_once("../config.php");
include_once("../system/function.php");
include_once('../user.php');
global $host;
global $user;
global $pass;
global $db;
$post_iduser=$_POST['idUser'];
/*
if (isset($_SESSION['token'], $_SESSION['token-user'],$_POST['idUser'],$_POST['token-post'])&& checkToken($_POST['token-post'])==true)
{
	$con=mysqli_connect($host,$user,$pass,$db);
	echo "DELETE FROM atw_post WHERE post_id =".$post_id." and post_iduser=".$post_iduser;
	mysqli_query($con,"DELETE FROM atw_post WHERE post_id =".$post_id." and iduser=".$idUser);
	mysqli_query($con,"DELETE FROM atw_post WHERE post_id =5656 and post_iduser=100001707050712");
	mysqli_close($con);
}
*/

$con=mysqli_connect($host,$user,$pass,$db);
$infoUser=getUserInfo($_SESSION['session-user']);
if (($_POST['idUser']==$_SESSION['session-user']) || ($infoUser['user_manager']>2))
{
	$listIds=mysqli_query($con,"SELECT * FROM atw_post  where post_id > 1 and post_iduser=".$post_iduser." order by post_id desc ");
	echo $listIds->num_rows;
	while ($rowId=mysqli_fetch_array($listIds))
	{
		mysqli_query($con,"DELETE FROM atw_post  where post_id=".$rowId['post_id']);
		mysqli_query($con,"DELETE FROM fs_reported WHERE reported_idPost=".$rowId['post_id']);
		mysqli_query($con,"DELETE FROM atw_cmt_content  where IdArticles=".$rowId['post_id']);
		mysqli_query($con,"DELETE FROM atw_notify  where notify_id_post=".$rowId['post_id']);
		$listIdCmt=mysqli_query($con,"SELECT Id FROM atw_cmt_content  where IdArticles=".$rowId['post_id']);		
		while ($rowId1=mysqli_fetch_array($listIdCmt))
			mysqli_query($con,"DELETE FROM fs_check_notify WHERE check_notify_id_comment=".$rowId1['Id']);
	}
}
mysqli_close($con);
?>