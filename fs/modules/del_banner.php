<?php
if(!isset($_SESSION)){
    session_start();
}
include_once("../config.php");
include_once("../system/function.php");
global $host;
global $user;
global $pass;
global $db;
$idUser=$_POST['idUser'];
$link= $_POST['link'];
if (isset($_SESSION['token'], $_SESSION['token-user'],$_POST['idUser'],$_POST['token-banner'])&& checkToken($_POST['token-banner'])==true)
{
	$con=mysqli_connect($host,$user,$pass,$db);
	mysqli_query($con,"DELETE FROM fs_banner WHERE banner_link like'%".$link."%' and banner_user_id=".$idUser);
	mysqli_close($con);
}
?>