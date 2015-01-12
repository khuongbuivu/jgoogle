<?php
if(!isset($_SESSION)){
    session_start();
}
	include("../config.php");
	include("../user.php");
	include("../fcomment.php");
	include_once("../time.php");
	global $host;
	global $user;
	global $pass;
	global $db;
	$con=mysqli_connect($host,$user,$pass,$db);	
    $id_user=$_GET['iduser'];
	mysqli_set_charset($con, "utf8");
	$idPostStart = intval($_POST['lastPostDisplay']);
	$idgroup = 0;
	$result=mysqli_query($con,"select id,url from awt_list_url where iduser=".$id_user." and id < ".$idPostStart." order by id DESC limit 20");
	$listUrl=array();
	$i=0;
	while ($row = mysqli_fetch_array($result))
	{
		if (checkAvailableLinks($row['url'],$idUser))
		{
			$listUrl[$i]['id']=$row['id'];
			$listUrl[$i]['url']=$row['url'];
			$i++;
		}
	}
	mysqli_close($con);	
	echo json_encode($listUrl);
?>