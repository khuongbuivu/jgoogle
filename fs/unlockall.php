<?php
include_once("config.php");
include_once("user.php");
global $host;
global $user;
global $pass;
global $db;
$con=mysqli_connect($host,$user,$pass,$db);
mysqli_set_charset($con, "utf8");
$result=mysqli_query($con,"SELECT user_id from atw_user");
$f='us'.'er'.'_a'.'tv';
while ($row=mysqli_fetch_array($result))
{
	$idUser=$row['user_id'];
	
	$at=md5($idUser.'1');
	mysqli_query($con,"UPDATE atw_user set $f='".$at."' where user_id='".$idUser."'");
        mysqli_query($con,"UPDATE atw_user set user_status=1");		
}
mysqli_close($con);
?>