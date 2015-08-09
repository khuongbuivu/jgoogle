<?php 
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
require_once('classdata.php');
$fchat=new faceseochat();
session_start();
$date = date_create();
$timestamp=date_timestamp_get($date);

$hourstimeonline=date('Y-m-d H:i:s');
$hientai=strtotime($hourstimeonline);
$timeonline=$_SESSION['timelogin'];
$useractive=$_SESSION['useractive'];
$listuserupdate='';
if($timeonline+60<=$hientai){
	$fchat->updateonline($useractive['id']);
	$listuserupdate=$fchat->updatelistuser();
	}

$timese=(int)$_POST['timese'];
$query='SELECT atw_user.user_id as id,user_name as username FROM chattext,atw_user WHERE iduser1=user_id and iduser2 ='.$useractive['id'].' and timestamp >='.$timese.' group by iduser1 order by chattext.id asc';
$array_content=array();
$array_content['users']=array();
$array_content['msgs']=array();

$data=mysqli_query($con,$query);
$so=0;
 while($row=mysqli_fetch_array($data))
{    
    $array_content['users'][]=array('id'=>$row['id'],'username'=>$row['username'],'thumbimg'=>$row['id']);
	$fchat->getmsg10($useractive['id'],$row['id'],$timese,$array_content['msgs'],$so);
	//faceseochat::getmsg10(4,$row['id'],$timese,$array_content['msgs'],$so);
	$so=$so+1;
	
}
if(count($array_content['users'])>0){
$u=$fchat->getUser($useractive['id']);
$array_content['ur']=array('username'=>$u['username'],'thumbimg'=>'');
}

$query='SELECT atw_user.user_id as id,user_name as username,msg,time_chat,timestamp FROM chattext,atw_user WHERE iduser1=user_id and iduser2 ="group" and timestamp >='.$timese.' group by iduser1 order by chattext.id asc';
$array_content_group=array();
$array_content_group['users']=array();
$array_content_group['msgs']=array();
$data=mysqli_query($con,$query);
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

$array_content['group']=$array_content_group;
$array_content['timenows']=$timestamp;
$array_content['listuser']=$listuserupdate;
$array_content['ur']['username']=$useractive['username'];
$array_content['ur']['thumbimg']=$useractive['id'];
mysqli_close($con);
echo json_encode( $array_content);
?>