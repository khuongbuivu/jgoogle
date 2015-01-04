<?php 
require_once("../config.php");	
global $host;
global $user;
global $pass;
global $db;
$qIdUserPost=$_POST['qIdUserPost'];
$con=mysqli_connect($host,$user,$pass,$db);
mysqli_set_charset($con, "utf8");
$rs=mysqli_query($con,"select post_full_url from atw_post where  ".$qIdUserPost." order by post_id desc");
$listIDU = array();
if ($rs-> num_rows>0)
{
	$r = mysqli_fetch_array($rs);
	$tl=$r['post_full_url'];
	$links=explode('····',$tl);
	$links[0]=rtrim($links[0], "/");
	$q=' link =\''.$links[0].'\'';
	for ($ii=1;$ii<count($links);$ii++)
	{
		$links[$ii]=rtrim($links[$ii],  "/");
		$q=$q.' or link=\''.$links[$ii].'\'';
	}
	$currentDay = date("d/m/y");
	$result = mysqli_query($con,"select idUser,timestart from atw_click_link where (".$q.") and timeclose='In view' and timestart like '%".$currentDay."%'  order by id desc ");
	$i=0;
	while ($row = mysqli_fetch_array($result))
	{
		$strTime = substr($row['timestart'], 0, 8);
		$t1 = strtotime($strTime);
		$date = date("H:i:s");
		$currentTime=time($date);
		$view = $currentTime-$t1;
		if ($view<610)
		{
				   $listIDU[$i]=$row['idUser'];
				   $i=$i+1;
		}
		
	}
}
mysqli_close($con);	
// header('Content-type: application/json');
echo json_encode($listIDU);
?>