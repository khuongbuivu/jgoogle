<?php
	include_once("../config.php");
	include_once("../system/function.php");
	global $host;
	global $user;
	global $pass;
	global $db;
	$idUser = $_POST['idUser'];
	$link = mysql_connect($host,$user,$pass,$db) or die ("can not connect");
	mysql_select_db($db,$link);
	mysql_query("SET NAMES 'utf8'"); 
	$result=mysql_query("select url from awt_list_url where iduser=".$idUser." order by id DESC limit 20");
	$listUrl=array();
	$i=0;
	while ($row = mysql_fetch_array($result))
	{
		$listUrl[$i]=$row['url'];
		$i++;
	}
	 // print_r($listUrl);
	echo json_encode($listUrl);
	?>	
	