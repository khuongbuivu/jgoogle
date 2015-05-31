<?php
$timese=$_GET['t'];
$congroup=mysqli_connect("localhost","chatgroup","faceseovn@","chatgroup") or die("Không kết nối được");
mysqli_set_charset($congroup, "utf8");
$query='SELECT iduser1 as id,username1 as username,msg,time_chat,timestamp FROM chattext WHERE iduser2 ="group" and timestamp >='.$timese.' order by chattext.id asc';
$array_content_group=array();
$array_content_group['users']=array();
$array_content_group['msgs']=array();
$data=mysqli_query($congroup,$query);
$i=0;
 while($row=mysqli_fetch_array($data))
{
	$array_content_group['users'][$i]['id']=$row['id'];
	$array_content_group['users'][$i]['username']=$row['username'];
	$array_content_group['users'][$i]['thumbimg']=$row['id'];
	$array_content_group['msgs'][$i]['ib']=$row['id'];
	$array_content_group['msgs'][$i]['id']=$i;
	$array_content_group['msgs'][$i]['msg']=$row['msg'];
	$array_content_group['msgs'][$i]['timestamp']=$row['timestamp'];
	$array_content_group['msgs'][$i]['time_chat']=$row['time_chat'];
	$thoigianchat=date('h:i A',$row['timestamp']);
	$array_content_group['msgs'][$i]['giochat']=$thoigianchat;
	$i=$i+1;
	}

echo json_encode($array_content_group);
?>