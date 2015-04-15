<?php
if(!isset($_SESSION)){
    session_start();
}
include_once("../config.php");
include_once("../system/function.php");
include_once("../user.php");
global $host;
global $user;
global $pass;
global $db;
$post_iduser=$_POST['idUser'];
$idCmt= $_POST['idCmt'];
$con=mysqli_connect($host,$user,$pass,$db);
$rs=mysqli_query($con,"SELECT userId from atw_cmt_content where Id=".$idCmt);
$okdel=false;
if ($rs->num_rows>0)
{
	$row = mysqli_fetch_array($rs);
	if ($row['userId']==$_SESSION['session-user'])
		$okdel =true;
}
$infoUser=getUserInfo($_SESSION['session-user']);
if ($infoUser['user_manager']!=3 && $okdel==false)
	exit();
mysqli_query($con,"DELETE FROM atw_cmt_content WHERE Id=".$idCmt);
mysqli_query($con,"DELETE FROM atw_notify WHERE notify_id_comment=".$idCmt);
mysqli_query($con,"DELETE FROM fs_check_notify WHERE check_notify_id_comment=".$idCmt." and check_notify_id_user=".$row['userId']);
mysqli_close($con);

// Must check user permission to del comment
?>