<?php
	include_once("../config.php");
	include_once("../system/function.php");
	global $host;
	global $user;
	global $pass;
	global $db;
	$idUser = $_POST['idUser'];
	$con=mysqli_connect($host,$user,$pass,$db);
	mysqli_set_charset($con, "utf8");
	$result=mysqli_query($con,"select url from awt_list_url where iduser=".$idUser." order by id DESC limit 20");
	$listUrl=array();
	$i=0;
	while ($row = mysqli_fetch_array($result))
	{
		$listUrl[$i]=$row['url'];
		$i++;
	}
	mysqli_close($con);
	// print_r($listUrl);
	echo json_encode($listUrl);
?>	
	