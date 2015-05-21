<?php 
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
require_once('classdata.php');
require_once('classdatarieng.php');
$fchat=new faceseochat();
$fchat2=new faceseochatrieng();
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
	
}


$allcontent=file_get_contents('chat.txt');
$all=json_decode($allcontent);
$chatusers=$all->chatuser;
$idcurrent=$useractive['id'];

if($chatusers->$idcurrent!=null)$array_content['users']=$chatusers->$idcurrent->users;
else $array_content['users']=array();
if($chatusers->$idcurrent!=null)$array_content['msgs']=$chatusers->$idcurrent->msgs;
else $array_content['msgs']=array();

$array_content['group']=$all->group;
$array_content['timenows']=$timestamp;
$array_content['listuser']=$all->onlineuser;
$array_content['ur']['username']=$useractive['username'];
$array_content['ur']['thumbimg']=$useractive['id'];
mysqli_close($con);
echo json_encode( $array_content);
?>