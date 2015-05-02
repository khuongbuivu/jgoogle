<?php
if(!isset($_SESSION)){
    session_start();
}
require_once("../config.php");
require_once("../user.php");
$var= array();
function getNumReport()
{
	global $host;
	global $user;
	global $pass;
	global $db;
	$con=mysqli_connect($host,$user,$pass,$db);
	$rs=mysqli_query($con,"select reported_id from fs_reported");
	mysqli_close($con);
	$infoUser = getUserInfo($_SESSION['session-user']);
	if($infoUser['user_manager']>2)
		return $rs->num_rows;
	else return 0;
}

function checkSecurityUser($idUser,$sidUser)
{
	$tmp=MD5(intval($idUser)*1606);
	if ($sidUser == $tmp)
		return true;
	return false;
}
$var['numReport']=getNumReport();
echo json_encode($var);


?>