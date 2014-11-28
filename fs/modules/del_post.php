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
$post_iduser=$_POST['idUser'];
$post_id= $_POST['post_id'];
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
mysqli_query($con,"DELETE FROM atw_post WHERE post_id=".$post_id." and post_iduser=".$post_iduser);
mysqli_query($con,"DELETE FROM atw_cmt_content WHERE IdArticles=".$post_id);
mysqli_query($con,"DELETE FROM atw_notify  where notify_id_post=".$post_id);
mysqli_close($con);

?>