<?php
if(!isset($_SESSION)){
    session_start();
}
require_once("fs_socialcount.php");
require_once("../config.php");
$geturl=$_POST['url'];
// $geturl='https://plus.google.com/118322503677129379211/posts/KTdLbMd1HeZ';
$newnumshare = get_share_count($geturl);
$oldnumshare=$_POST['numShare'];
if ($newnumshare!=$oldnumshare)
{
	global $host;
	global $user;
	global $pass;
	global $db;
	$idUser			=	$_SESSION['session-user'];
	$pointbonus		= 	30;
	$con=mysqli_connect($host,$user,$pass,$db);
	$result=mysqli_query($con,"select iduser from awt_list_url where url like '%".$geturl."%'");
	
	
	
	$result=mysqli_query($con,"select * from atw_point where idUser=".$idUser." limit 1");
	while ($row = mysqli_fetch_array($result))
	{		
			
			
			$point = -10 + $row['point'];
	}
	if ($result->num_rows>0)
		mysqli_query($con,"UPDATE atw_point set point = ".$point." where idUser=".$idUser);	
	else
		mysqli_query($con,"insert into atw_point (idUser,point) values (".$idUser.",".$pointbonus.")");
	$result=mysqli_query($con,"select iduser from awt_list_url where url like '%".$geturl."%'");
	if($result->num_rows>0)
	{
		$row = mysqli_fetch_array($result)		;
		$idUserB = $row[0];
	}
	if ($result->num_rows>0)
		$result=mysqli_query($con,"UPDATE atw_point set point = ".$pointbonus." where idUser=".$idUser);	
	else
		$result=mysqli_query($con,"insert into atw_point (idUser,point) values (".$idUser.",".$pointbonus.")");
	mysqli_close($con);
}
?>
