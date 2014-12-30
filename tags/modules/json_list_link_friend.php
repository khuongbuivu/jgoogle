<?php
	include_once("../config.php");
	include_once("../system/function.php");
	global $host;
	global $user;
	global $pass;
	global $db;
	$idUser = $_POST['idUser'];
	/*
	$link = mysql_connect($host,$user,$pass,$db) or die ("can not connect");
	mysql_select_db($db,$link);
	mysql_query("SET NAMES 'utf8'"); 
	$result=mysql_query("select id from awt_list_url where iduser=".$idUser." order by id desc limit 2" );
	*/
	$con=mysqli_connect($host,$user,$pass,$db);
	mysqli_set_charset($con, "utf8");
	$result=mysqli_query($con,"select id from awt_list_url where iduser=".$idUser." order by id desc limit 2");
	
	$listUrl=array();
	$i=0;
	while ($row = mysqli_fetch_array($result))
	{
		$q="select link, url from atw_click_link,awt_list_url where atw_click_link.idUser != ".$idUser." and awt_list_url.iduser=atw_click_link.idUser  and click_link_idlink =".$row['id']." limit 0,3" ;
		$links=mysqli_query($con,$q);		
		while ($link = mysqli_fetch_array($links))
		{
			$listUrl[$i]=$link[1];
			$i++;
		}		
	}
	mysqli_close($con);	
	// print_r($listUrl);
	echo json_encode($listUrl);
?>