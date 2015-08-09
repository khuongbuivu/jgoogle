<?php
	include("../../config.php");
	include("../../user.php");
	include("../../system/function.php");
	global $host;
	global $user;
	global $pass;
	global $db;
	$con = mysqli_connect($host,$user,$pass,$db);
	$date = date('d/m/y');
	$d = date('d');
	// $idUser = '100001707050712';
	// query all user active 
	$resultU= mysqli_query($con,"select * from atw_user");
	while($rowU=mysqli_fetch_array($resultU))
	{
		$idUser = $rowU['user_id'];
		$resultMyView = mysqli_query($con,"select * from fs_chart_view where chart_view_iduser=".$idUser);
		if ($resultMyView->num_rows>0)
		{
			$row= mysqli_fetch_array($resultMyView);
			if ($d!=$row['chart_view_day'])
			{
				$newListView= $row['chart_view_num'].','.getStringView($idUser);
				mysqli_query($con,"UPDATE fs_chart_view set chart_view_num =  \"".$newListView."\" where chart_view_iduser=".$idUser);
			}
		}	
		else
		{
			$newListView= getStringView($idUser);
			mysqli_query($con,"insert into fs_chart_view (chart_view_iduser, chart_view_day, chart_view_num) values ('".$idUser."',".$d.",\"".$newListView."\")");
		}
	}	
	mysqli_query($con,"DELETE FROM atw_click_link where timestart not like '%".$date."%'");
	mysqli_query($con,"DELETE FROM fs_click_backlink where timestart not like '%".$date."%'");
	mysqli_close($con);
?>