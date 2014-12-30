<?php
include("config.php");
function functionname()
{
	global $host;
	global $user;
	global $pass;
	global $db;
	$a1	=	$_POST['a1'];
	$con=mysqli_connect($host,$user,$pass,$db);
	$result=mysqli_query($con,"select * from awt_list_url where iduser='".$idUser."' and url='".$linkClicked."'");
	//mysqli_query($con,"INSERT INTO atw_click_link (link) VALUES ('".$urlClicked."')");
	//$result=mysqli_query($con,"UPDATE atw_point set point = ".$point." where idUser=".$idUser);	
	//if ($result->num_rows>0)
	//echo "select * from awt_list_url where iduser='".$idUser."' and url='".$linkClicked."'";
	mysqli_close($con);
	
	
}
/*
process user have multi link we must call while to check all user in list link
*/
?>