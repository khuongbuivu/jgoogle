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
if (isset($_SESSION['token'], $_SESSION['token-user'],$_POST['idUser'],$_POST['token-link'])&& checkToken($_POST['token-link'])==true)
{
	$con=mysqli_connect($host,$user,$pass,$db);
	echo "DELETE FROM awt_list_url WHERE url like'%".$link."%' and iduser=".$idUser;
	mysqli_query($con,"DELETE FROM awt_list_url WHERE url like'%".$link."%' and iduser=".$idUser);
	mysqli_close($con);
}
?>