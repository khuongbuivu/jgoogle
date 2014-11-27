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
$infoUser=getUserInfo($_SESSION['session-user']);
if ($infoUser['user_manager']!=3)
	exit();
$idBanner= $_POST['idBanner'];
if (isset($_SESSION['token'], $_SESSION['token-user']))
{
	$con=mysqli_connect($host,$user,$pass,$db);
	mysqli_query($con,"DELETE FROM fs_banner WHERE banner_id=".$idBanner);
	mysqli_close($con);
}
?>