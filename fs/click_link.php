<?php
//fix
	include("config.php");
	function clickLink()
	{
exit();
		global $host;
		global $user;
		global $pass;
		global $db;
		$idUser	=	$_POST['idUser'];;
		$point	=	$_POST['point'];
		$con=mysqli_connect($host,$user,$pass,$db);
		$result=mysqli_query($con,"select * from atw_point where idUser=".$idUser);
		while ($row = mysqli_fetch_array($result))
		{
			$point = $row[1] + $point;
		}
		if ($result->num_rows>0)
			$result=mysqli_query($con,"UPDATE atw_point set point = ".$point." where idUser=".$idUser);	
		else
			$result=mysqli_query($con,"insert into atw_point (idUser,point) values (".$idUser.",".$point.")");	
		mysqli_close($con);
		echo $point;
		
	}
	clickLink();
?>