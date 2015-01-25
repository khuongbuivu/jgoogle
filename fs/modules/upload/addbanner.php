<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
if(!isset($_SESSION)){
    session_start();
}
	require_once("../../definelocal.php");
	include_once("../../define.php");
	include_once("../../time.php");
	include_once("../../config.php");
	global $host;
	global $user;
	global $pass;
	global $db;
   
	$img=trim($_POST['img']);
	$link=$_POST['link'];
	//params = "idUser=" + idUser + "&img=" + img + "&link=" + link;
	if (!isset($_SESSION['token'], $_SESSION['token-user'],$_POST['idUser'])&& $id_user!="")
	{  
	   
		exit();
	}else
	{
		
		$con=mysqli_connect($host,$user,$pass,$db);
		$con=mysqli_connect($host,$user,$pass,$db);
		mysqli_set_charset($con, "utf8");
		echo "INSERT INTO fs_banner (banner_user_id, 	banner_img, banner_link, banner_status) VALUES ('".$id_user."','".$img."','".$link."',1)";
		mysqli_query($con,"INSERT INTO fs_banner (banner_user_id, 	banner_img, banner_link, banner_status) VALUES ('".$id_user."','".$img."','".$link."',1)" );
		//echo "INSERT INTO fs_banner (banner_user_id, 	banner_img, banner_link, banner_status) VALUES ('".$id_user."','".$img."','".$link."',1)";
		mysqli_close($con);
	}

?>