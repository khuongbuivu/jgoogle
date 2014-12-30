<?php
//fix
	include("config.php");
	function getPoint()
	{
		global $host;
		global $user;
		global $pass;
		global $db;
		$idUser	=	$_POST['idUser'];;
		$con=mysqli_connect($host,$user,$pass,$db);
		$result=mysqli_query($con,"select * from atw_point where idUser=".$idUser);
		while ($row = mysqli_fetch_array($result))
		{
			$point = $row['point'];
		}
		if ($result->num_rows>0)
			echo $point;
		else
			echo  0 ;
		
	}
	getPoint();
?>