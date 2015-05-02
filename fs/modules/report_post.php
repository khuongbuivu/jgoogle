<?php
if(!isset($_SESSION)){
    session_start();
}
include_once("../config.php");
include_once("../system/function.php");
$var= array();
function reportPost()
{
	global $host;
	global $user;
	global $pass;
	global $db;
	global $var;
	$idUserA		=	$_POST['idUserA'];
	$idUserB		=	$_POST['idUserB'];
	$UIDTAGS		=	split(",",$idUserB);
	if (count($UIDTAGS)>0)
		$idUserB = $UIDTAGS[0];
	$subpoint		=	$_POST['subpoint'];
	$sidUser		= $_POST['sidUser'];
	$idPost			= $_POST['idPost'];
	$typereport		= $_POST['typereport'];
	$con=mysqli_connect($host,$user,$pass,$db);
	if ($_SESSION['session-user'] !=$_POST['idUserA'] || !checkSecurityUser($idUserA,$sidUser) || !checkSecurityUser($_SESSION['session-user'],$sidUser))
	{
		mysqli_query($con,"UPDATE atw_user set user_status = 'FPOINT: CHECK SECURITYUSER FAIL' where user_id=".$_SESSION['session-user']);
		mysqli_close($con);	
		return;
	}
	$resultA=mysqli_query($con,"UPDATE atw_post set type_invalid=".$typereport." where post_id=".$idPost);
	/*fs_reported (reported_id, reported_idUser, reported_idUserPost, reported_idPost)*/
	$maxId=getIdMax("fs_reported","reported_id") + 1;
	mysqli_query($con,"INSERT INTO fs_reported (reported_id, reported_idUser, reported_idUserPost, reported_idPost) values ($maxId,'".$idUserA."','".$idUserB."',".$idPost.")")	;
	mysqli_close($con);	

}

function checkSecurityUser($idUser,$sidUser)
{
	$tmp=MD5(intval($idUser)*1606);
	if ($sidUser == $tmp)
		return true;
	return false;
}
reportPost();

?>