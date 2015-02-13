<?php
if(!isset($_SESSION)){
    session_start();
}
include("config.php");
require_once('system/function.php');
$_SESSION['ip'] = getUserIP();
function saveClick()
{
	global $host;
	global $user;
	global $pass;
	global $db;	
	//var params = "urlClicked="+urlClicked + "&idUser=" + idUser + "&timeOpend=" + timeOpend + "&timeClose="+ timeClose + "&timeView="+timeView;
	$urlClicked	=	$_POST['urlClicked'];
	$urlClicked=rtrim($urlClicked, "/");
	$idUser		=	$_POST['idUser'];
	$timeOpendClient	=	$_POST['timeOpend'];
	$timeOpend = 	date("H:i:s d/m/y");
	$timeClose	=	$_POST['timeClose'];
	$typebrowser	=	$_POST['typebrowser'];
	
	if ($timeClose!="In view")
		$timeClose	=	date("H:i:s d/m/y");
	$timeView	=	$_POST['timeView'];
	$con=mysqli_connect($host,$user,$pass,$db);
	$result=mysqli_query($con,"select * from atw_click_link where iduser='".$idUser."' and link like '%".$urlClicked."%' and timeclienttmp='".$timeOpendClient."'");
	
	$result11=mysqli_query($con,"select id from awt_list_url where url like '%".$urlClicked."%' limit 1");
	$idlink=-1;
	if ($result11->num_rows>0)
	{
		$row11 = mysqli_fetch_array($result11);
		$idlink=$row11[id];
	}
	if ($result->num_rows>0)
	{
		mysqli_query($con,"UPDATE atw_click_link set timeclose = '".$timeClose."' ,timeview=".$timeView." where iduser='".$idUser."' and link like '%".$urlClicked."%' and timeclienttmp='".$timeOpendClient."'");
		$resultIP=mysqli_query($con,"select ip_click_link_numview from fs_ip_click_link where ip_click_link_url='".$urlClicked."' and ip_click_link_id_user='".$idUser."' and ip_click_link_ip='".$_SESSION['ip']."'" );
		if ($resultIP->num_rows>0)
		{
			$row = mysqli_fetch_array($resultIP);
			$numview=intval($row['ip_click_link_numview']);
			$numview = $numview + 1;
			if ($numview>0)
			{
				mysqli_query($con,"UPDATE fs_ip_click_link set ip_click_link_numview = '".$numview."'  where ip_click_link_url='".$urlClicked."' and ip_click_link_id_user='".$idUser."' and ip_click_link_ip='".$_SESSION['ip']."'");
			}	
		}
		else
		{
			mysqli_query($con,"INSERT INTO fs_ip_click_link (ip_click_link_url,ip_click_link_id_user,ip_click_link_ip,ip_click_link_numview,ip_click_link_time) VALUES ('".$urlClicked."','".$idUser."','".$_SESSION['ip']."',1,".$timeView.")");
		}
	}
	else
	{	
		mysqli_query($con,"INSERT INTO atw_click_link (link,iduser,timestart,timeclose,timeview,timeclienttmp,click_link_idlink,device) VALUES ('".$urlClicked."','".$idUser."','".$timeOpend."','".$timeClose."','".$timeView."','".$timeOpendClient."',".$idlink.",'".$typebrowser."')");
	}
	mysqli_close($con);
}
saveClick();
?>