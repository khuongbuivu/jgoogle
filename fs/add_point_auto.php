<?php 
//fix
	require_once("config.php");	
	function addPoint()
	{
		exit();
		global $host;
		global $user;
		global $pass;
		global $db;
		$linkClicked	=	$_POST['linkClicked'];
		$linkClicked 	= 	removeSlashEndUrl($linkClicked);
		$idUser			=	$_POST['idUser'];
		$point			=	$_POST['point'];
		$con=mysqli_connect($host,$user,$pass,$db);
		$result=mysqli_query($con,"select * from atw_point where idUser=".$idUser." limit 1");
		$result1=mysqli_query($con,"select * from awt_list_url where iduser='".$idUser."' and url='".$linkClicked."'");	
		while ($row = mysqli_fetch_array($result))
		{
			$minuteView = (int)(intval($point)/60) ;
			if(!($result1->num_rows>0) && $minuteView >0 )
			{
				$point = 1 + $row['point'];
			}
			else
			{
				$point = $row['point'];
			}
		}	
		if ($result->num_rows>0)
			$result=mysqli_query($con,"UPDATE atw_point set point = ".$point." where idUser=".$idUser); 
		else
			$result=mysqli_query($con,"insert into atw_point (idUser,point) values (".$idUser.",".$point.")");
		echo $point;
		mysqli_close($con);	
	}
	function subPoint()
	{
		exit();
		global $host;
		global $user;
		global $pass;
		global $db;
		$linkClicked	=	$_POST['linkClicked'];
		$linkClicked 	= 	removeSlashEndUrl($linkClicked);
		$idUser			=	$_POST['idUser'];
		$point			=	$_POST['point'];
		$minuteView = (int)(intval($point)/60) ; 
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
			$result=mysqli_query($con,"select * from atw_point where idUser=".$idUser);
			while ($row = mysqli_fetch_array($result))
			{		
					if ($minuteView>4)
						$point = -1 + $row['point'];
					else 
						$point = $row['point'];
			}	
			if ($result->num_rows>0)
				$result=mysqli_query($con,"UPDATE atw_point set point = ".$point." where idUser=".$idUser);	
			else
			{
				$result=mysqli_query($con,"insert into atw_point (idUser,point) values (".$idUser.",".$point.")");
			}
		}
		mysqli_close($con);
		
		
	}
	function removeSlashEndUrl($url)
	{
		return substr("$url", 0, -1);
	}
	addPoint();
	subPoint();
	
?>