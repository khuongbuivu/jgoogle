<?php
/*
if(!isset($_SESSION)){
    session_start();
}
require_once('../definelocal.php');
require_once('../system/function.php');
require_once('../config.php');
require_once('../user.php');
global $host;
global $user;
global $pass;
global $db;
$con=mysqli_connect($host,$user,$pass,$db);
mysqli_set_charset($con, "utf8");
$listTags	= $_POST['listTags'];
if ($listTags!=null || $listTags!="")
	$UIDTAGS=split(",",$listTags);
$f='us'.'er'.'_a'.'tv';
echo $f;
for ($jj=0;$jj< count($UIDTAGS);$jj++)
{
	$idUser=$UIDTAGS[$jj];
	$at=md5($idUser.'1');
	echo "UPDATE atw_user set $f=".$at." where user_id='".$idUser."'"
	mysqli_query($con,"UPDATE atw_user set $f=".$at." where user_id='".$idUser."'");		
}
mysqli_close($con);
*/
echo 'ccccc';
?>