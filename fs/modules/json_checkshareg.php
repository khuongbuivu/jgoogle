<?php
if(!isset($_SESSION)){
    session_start();
}
require_once("fs_socialcount.php");
require_once("../config.php");
$geturl=$_POST['url'];
$oldnumshare=$_POST['numShare'];
$newnumshare = get_plusandshare($geturl);
$arrOld = split(",",$oldnumshare);
$arrNew = split(",",$newnumshare);
if ($newnumshare!=$oldnumshare)
{
	global $host;
	global $user;
	global $pass;
	global $db;
	$idUser			=	$_SESSION['session-user'];
	if ($arrOld[0]<$arrNew[0] && $arrNew[1]==$arrOld[1])
	{
		$pointbonus		= 	15;
	}
	else if ($arrOld[0]<$arrNew[0] && $arrNew[1]>$arrOld[1])
	{
		$pointbonus		= 	45;
	}
	else if ($arrOld[0]==$arrNew[0] && $arrNew[1]>$arrOld[1])
	{
		$pointbonus		= 	30;
	}
	else if ($arrOld[0]>$arrNew[0] && $arrNew[1]>$arrOld[1])
	{
		$pointbonus		= 	15;
	}	
	else if ($arrOld[0]>$arrNew[0])
	{
		$pointbonus		= 	-15;
	}
	else
	{
		$pointbonus		= 0;
	}	
	$con=mysqli_connect($host,$user,$pass,$db);
	mysqli_set_charset($con, "utf8");
	$result=mysqli_query($con,"select * from atw_point where idUser=".$idUser." limit 1");
	$point=$pointbonus;
	if ($result->num_rows>0)
	{
		$row = mysqli_fetch_array($result);			
		$point = $pointbonus + $row['point'];
		mysqli_query($con,"UPDATE atw_point set point = ".$point." where idUser=".$idUser);	
	}
	else
		mysqli_query($con,"insert into atw_point (idUser,point) values (".$idUser.",".$point.")");
	$result=mysqli_query($con,"select iduser from awt_list_url where url like '%".$geturl."%'");
	if($result->num_rows>0)
	{
		$row = mysqli_fetch_array($result)		;
		$idUserB = $row[0];
		$resultPointB= mysqli_query($con,"select * from atw_point where idUser=".$idUserB." limit 1");
		$point=$pointbonus;
		if ($resultPointB->num_rows>0)
		{
			$row = mysqli_fetch_array($resultPointB);			
			$point = -$pointbonus + $row['point'];
			mysqli_query($con,"UPDATE atw_point set point = ".$point." where idUser=".$idUserB);	
		}
		else
			mysqli_query($con,"insert into atw_point (idUser,point) values (".$idUserB.",".$pointbonus.")");
	}
	mysqli_close($con);
}
?>
