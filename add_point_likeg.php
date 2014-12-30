<?php
if(!isset($_SESSION)){
    session_start();
}
require_once("../config.php");
function subpoint()	
{
	if (!isset($_SESSION['token']) || $_SESSION['token']=="" || !isset($_POST['point']) || !isset($_POST['idUser']))
	{
		echo "Not access this page";
		exit();
	}
	global $host;
	global $user;
	global $pass;
	global $db;
	$idUser			=	$_POST['idUser'];
	$point			=	$_POST['point'];
	$pointBonus		= 	15;
	$linkClicked	=	$_POST['linkClicked'];
	$con=mysqli_connect($host,$user,$pass,$db);
	$result=mysqli_query($con,"select iduser from awt_list_url where url like '%".$linkClicked."%'");
	
	if($result->num_rows=="")
	{
		mysqli_query($con,"UPDATE atw_user set user_status = 'ADD_POINT_LIKEG: LINK NOT EXIST' where user_id=".$_SESSION['session-user']);
		exit();
	}
	$dm = date("d/m"); 	
	$s1= intval(date("s"));
	$shortDay= str_replace("/","",$dm);
	$User1=intval($_SESSION['session-user']) * intval($shortDay);
	$strtoken1=$_SESSION['session-user'].$shortDay.$User1.$s1;
	$token1 = MD5($strtoken1);
	$okap			= false;
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
		mysqli_close($con);	
		exit();
	}
	if ($point>30 && $point<-30 || $_SESSION['session-user'] !=$_POST['idUser'])
	{
		mysqli_query($con,"UPDATE atw_user set user_status = 'ADD_POINT_LIKEG: HACK LIKE G' where user_id=".$_SESSION['session-user']);
		$point=-500;
	}
	$result=mysqli_query($con,"select * from atw_point where idUser=".$idUser." limit 1");
	$pointOfUser = mysqli_fetch_array($result);
	$point = $point + $pointOfUser['point'];
	$rsgplus = mysqli_query($con," select * from fs_gplus where gplus_link like '".$linkClicked."'");
	if ($rsgplus->num_rows>0)
	{
	}
	else
	{
		mysqli_query($con,"insert into fs_gplus (gplus_link,gplus_iduser) values ('".$linkClicked."','".$idUser."')");		 
	}
	
	if ($result->num_rows>0)
		$result=mysqli_query($con,"UPDATE atw_point set point = ".$point." where idUser=".$idUser); 
	else
		$result=mysqli_query($con,"insert into atw_point (idUser,point) values (".$idUser.",".$point.")");
	mysqli_close($con);	
	
}

function subPoint1()
{
	if (!isset($_SESSION['token']) || $_SESSION['token']=="" || !isset($_POST['point']) || !isset($_POST['idUser']))
	{
		echo "Not access this page";
		exit();
	}
	global $host;
	global $user;
	global $pass;
	global $db;
	$linkClicked	=	$_POST['linkClicked'];
	$linkClicked 	= 	removeSlashEndUrl($linkClicked);
	$idUser			=	$_POST['idUser'];
	$point			=	$_POST['point'];
	$dm = date("d/m");
	$s1= intval(date("s"));
	$shortDay= str_replace("/","",$dm);
	$User1=intval($_SESSION['session-user']) * intval($shortDay);
	$strtoken1=$_SESSION['session-user'].$shortDay.$User1.$s1;
	$token1 = MD5($strtoken1);	
	$okap			= false;
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
		exit();
	$con=mysqli_connect($host,$user,$pass,$db);
	$result=mysqli_query($con,"select iduser from awt_list_url where url like '%".$linkClicked."%'");
	
	if($result->num_rows>0)
	{
		$row = mysqli_fetch_array($result)		;
		$idUserOfUrl = $row[0];
	}
	if ($idUser	!=$idUserOfUrl)
	{
		$idUser	=$idUserOfUrl;
		$result=mysqli_query($con,"select * from atw_point where idUser=".$idUser." limit 1");
		while ($row = mysqli_fetch_array($result))
		{						
				$point = -10 + $row['point'];
		};
		if ($result->num_rows>0)
			$result=mysqli_query($con,"UPDATE atw_point set point = ".$point." where idUser=".$idUser);	
		else
			$result=mysqli_query($con,"insert into atw_point (idUser,point) values (".$idUser.",".$point.")");
	}
	mysqli_close($con);	
};
function removeSlashEndUrl($url)
{
	return rtrim($url, "/");
}

subpoint()	;
subPoint1()	;
?>