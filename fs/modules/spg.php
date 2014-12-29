<?php
if(!isset($_SESSION)){
    session_start();
}
require_once("../config.php");
function spg()
{
	global $host;
	global $user;
	global $pass;
	global $db;
	$idUser	= $_POST['idUser'];
	if ($_SESSION['session-user'] != $_POST['idUser'] || $_POST['point']< -20 )
	{
		$con=mysqli_connect($host,$user,$pass,$db);
		mysqli_query($con,"UPDATE atw_user set user_status = 'SPG: SPG() HACK POINT' where user_id=".$_SESSION['session-user']);
		mysqli_close($con);	
		exit();
	}
	$dm = date("d/m"); 	
	$s1= intval(date("s"));
	$shortDay= str_replace("/","",$dm);
	$User1=intval($_SESSION['session-user']) * intval($shortDay);
	$strtoken1=$_SESSION['session-user'].$shortDay.$User1.$s1;
	$token1 = MD5($strtoken1);	
	$okap	= false;
	for ($i = 1; $i <= 10; $i++) {
		$s1 = $s1 + 1;
		$strtoken1=$_SESSION['session-user'].$shortDay.$User1.$s1;
		$token1 = MD5($strtoken1);
		if ($token1==$_POST['tk1'])
		{
					$okap=true;
					break;
		}	
	}	
	if ( $okap==false)
	{
		exit();
	}
	$con=mysqli_connect($host,$user,$pass,$db);
	$result=mysqli_query($con,"select * from atw_point where idUser=".$_SESSION['session-user']);
	while ($row = mysqli_fetch_array($result))
	{					
			$point = -20 + $row['point'];
	}	
	if ($result->num_rows>0)
		$result=mysqli_query($con,"UPDATE atw_point set point = ".$point." where idUser=".$_SESSION['session-user']);	
	else
		$result=mysqli_query($con,"insert into atw_point (idUser,point) values (".$_SESSION['session-user'].",".$point.")");
	mysqli_close($con);		
}
function removeSlashEndUrl($url)
{
	return rtrim($url, "/");
}
spg();
?>