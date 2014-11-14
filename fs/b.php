<?php 
require_once("config.php");	
global $host;
global $user;
global $pass;
global $db;
$con=mysqli_connect($host,$user,$pass,$db);
mysqli_set_charset($con, "utf8");
$rs=mysqli_query($con,"select post_full_url from atw_post where  post_id=107013 order by post_id desc limit 1");
$r = mysqli_fetch_array($rs);
$tl=$r['post_full_url'];
echo $tl."<br/>";
$links=explode('····',$tl);
$links[0]=rtrim($links[0], "/");
$q=' link =\''.$links[0].'\'';
for ($ii=1;$ii<count($links);$ii++)
{
	$links[$ii]=substr($links[$ii], 0, -1);
	$q=$q.' or link=\''.$links[$ii].'\'';
}
$result = mysqli_query($con,"select idUser,timestart from atw_click_link where (".$q.") and timeclose='In view'  order by id desc ");
echo "select idUser from atw_click_link where (".$q.") and timeclose='In view'  order by id desc ";
$listIDU = array();
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
		echo $row['idUser']."<br/>";
	}
}
//echo json_encode($listIDU);
?>